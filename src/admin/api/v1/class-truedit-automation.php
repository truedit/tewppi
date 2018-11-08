<?php /** @noinspection PhpCSValidationInspection */
/** @noinspection PhpCSValidationInspection */
/** @noinspection PhpCSValidationInspection */

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://truedit.github.com/
 * @since      1.0.0
 *
 * @package    TruEdit
 * @subpackage TruEdit/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    TruEdit
 * @subpackage TruEdit/includes
 * @author     TruEdit <test@test.com>
 */
class TruEdit_ApiRoute_Automation implements TruEdit_ApiRoute {

    private $plugin_name;
    private $version;

    private $route_version;
    private $route;
    private $routes;
    private $identifier = 'com.getnext.wordpress';

    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

        $this->route         = 'automation';
        $this->route_version = 1;

        $this->routes = [
            'read'   => [
                'route'   => $this->route . '/(?P<id>\d+)',
                'options' => [
                    'methods'  => WP_REST_Server::READABLE,
                    'callback' => [
                        $this,
                        'read',
                    ],
                    'args'     => [
                        'id' => [
                            'validate_callback' => function( $param, $request, $key ) {
                                return is_numeric( $param );
                            },
                        ],
                    ],
                ],
            ],
            'create' => [
                'route'   => $this->route,
                'options' => [
                    [
                        'methods'  => WP_REST_Server::CREATABLE,
                        'callback' => [
                            $this,
                            'create',
                        ],
                    ],
                    [
                        'methods'  => WP_REST_Server::READABLE,
                        'callback' => [
                            $this,
                            'read',
                        ],
                    ],
                ],
            ],
            'update' => [
                'route'   => $this->route . '/(?P<id>\d+)',
                'options' => [
                    'methods'  => WP_REST_Server::EDITABLE,
                    'callback' => [
                        $this,
                        'update',
                    ],
                    'args'     => [
                        'id' => [
                            'validate_callback' => function( $param, $request, $key ) {
                                return is_numeric( $param );
                            },
                        ],
                    ],
                ],
            ],
            'delete' => [
                'route'   => $this->route . '/(?P<id>\d+)',
                'options' => [
                    'methods'  => WP_REST_Server::DELETABLE,
                    'callback' => [
                        $this,
                        'delete',
                    ],
                    'args'     => [
                        'id' => [
                            'validate_callback' => function( $param, $request, $key ) {
                                return is_numeric( $param );
                            },
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since    1.0.0
     */
    public function load_dependencies() {}

    /**
     * Get/Set
     */
    public function get_route_version() {
        return $this->route_version;
    }

    public function get_routes() {
        return $this->routes;
    }

    /**
     * CRUD
     */
    public function read( WP_REST_Request $request ) {

        try {

            $resource = new TruEdit_Resource_Automation();
            $resource->read();

            if ( $request['id'] ) {

                $post = new TruEdit_Post_Automation();
                $post->setPost( $request['id'] );
                return new WP_REST_Response( $post->getPost(), 200 );

            } else {

                $automations = [];
                $posts       = get_posts(
                    [
                        'post_type'   => 'automation',
                        'post_status' => 'draft',
                        'suppress_filters' => false,
                        'numberposts' => 20,
                    ]
                );

                foreach ( $posts as $post ) {
                    $automation = new TruEdit_Post_Automation();
                    $automation->setPost( $post->ID );
                    $automations[] = $automation->getPost();
                }

                return new WP_REST_Response( $automations, 200 );

            }
        } catch ( \Swagger\Client\ApiException $e ) {

            return TruEdit_Handle::swagger_exception( $e );

        } catch ( TruEdit_Exception $e ) {

            return TruEdit_Handle::truedit_exception( $e );

        } catch ( Exception $e ) {

            return TruEdit_Handle::exception( $e );

        }

    }

    public function create( WP_REST_Request $request ) {

        $post_id = -1;

        try {

            /**
             * $post_ids = [];
             */

            $form = json_decode( $request->get_body() );

            $this->validate_name_length( $form->name );
            $this->validate_if_exists( $form->name );

            $automation = new TruEdit_Post_Automation();

            /**
             * Validate the inputs and if successfully check.
             * We just want to save the details if all passes.
             * --------------------------------------------------
             */

            $errors = [];

            foreach ( $automation->getPublishOpts() as $key => $settings ) {
                try {
                    $automation->validate( $key, $form->{$key}, $form );
                } catch ( TruEdit_Exception $e ) {
                    $errors[ $key ] = $e->getMessage();
                }
                unset( $settings );
            }

            if ( count( $errors ) ) {
                return new WP_Error(
                    'TR_ERROR', 'There were errors saving the automation.', [
                        'status'   => 400,
                        'warnings' => $errors,
                    ]
                );
            }

            /**
             * Lets add a post so we can have an id
             * --------------------------------------------------
             */
            $post_id = wp_insert_post(
                [
                    'post_title'    => $form->name,
                    'post_type'     => 'automation',
                    //'post_status'   => 'publish',
                ]
            );
            $automation->setPost( $post_id );

            /**
             * If the errors above passed, then we can safely proceed ot save.
             * --------------------------------------------------
             */
            foreach ( $automation->getPublishOpts() as $key => $settings ) {
                $automation->saveMeta( $key, $form->{$key} );
                unset( $form->{$key} );
            }

            $url = get_permalink($post_id);
            $urlOptions = ['view' => 'publish', 'automation_post_id' => $post_id];
            $newUrl = add_query_arg($urlOptions, $url);

            $form->url = $newUrl;

            $automationForm = $this->convertFormIntoApiForm($form);

            $resource = new TruEdit_Resource_Automation();
            $automationList = new \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_();
            $automationList->setAutomations([$automationForm]);
            $res = $resource->create($automationList);

            /**
             * Get the id from the url in the reponses
             * --------------------------------------------------
             */
            if($res->getResults() !== null && count($res->getResults()) > 0) {
                $result = $res->getResults()[0];

                $automation->saveAutomationId( $result->getId() );
                $automation->saveJson( json_decode( $result->__toString() ) );

                TruEdit_Log::info( 'Automation ' . $result->getName() . ' created.' );

                return new WP_REST_Response( $automation->getPost(), 200 );
            } else {
                throw new TruEdit_Exception($res->getErrorMessage());
            }


        } catch ( \Swagger\Client\ApiException $e ) {

            // Clear the post
            wp_delete_post( $post_id );
            return TruEdit_Handle::swagger_exception( $e );

        } catch ( TruEdit_Exception $e ) {

            // Clear the post
            wp_delete_post( $post_id );
            return TruEdit_Handle::truedit_exception( $e );

        } catch ( Exception $e ) {

            // Clear the post
            wp_delete_post( $post_id );
            return TruEdit_Handle::exception( $e );

        }

    }

    public function update( WP_REST_Request $request ) {

        try {

            $body = json_decode( $request->get_body() );

            $automation = new TruEdit_Post_Automation();
            $automation->setPost( $request['id'] );

            $this->validate_name_length( $body->name );
            $this->validate_if_exists( $body->name, $automation->json->id );

            /**
             * Validate the inputs and if succesfully check.
             * We just want to save the details if all passes.
             * --------------------------------------------------
             */

            $errors = [];

            foreach ( $automation->getPublishOpts() as $key => $settings ) {
                try {
                    $automation->validate( $key, $body->{$key}, $body );
                } catch ( TruEdit_Exception $e ) {
                    $errors[ $key ] = $e->getMessage();
                }
                unset( $settings );
            }

            if ( count( $errors ) ) {
                return new WP_Error(
                    'TR_ERROR', 'There were errors saving the automation.', [
                        'status'   => 400,
                        'warnings' => $errors,
                    ]
                );
            }

            /**
             * Prepare form
             * --------------------------------------------------
             */

            $form                         = new stdClass();
            $form->name                   = $body->name;
            $form->action                 = $body->action;
            $form->profiles               = $body->profiles;
            $form->config                 = $automation->json->config;
            $form->config->formRemote     = true;
            $form->config->externalConfig = true;
            $form->integrationIdentifier  = $this->identifier;

            $automationForm = $this->convertFormIntoApiForm($form);

            $auto_id = $automation->post_meta->automation_id;

            $resource = new TruEdit_Resource_Automation();
            $res      = $resource->update( $auto_id, $automationForm );

            /**
             * Success
             * --------------------------------------------------
             */
            $automation->saveJson( json_decode( $res->getResult() ) );

            /**
             * Loop through and save the values now because we know it good with TruEdit.
             * --------------------------------------------------
             */
            foreach ( $automation->getPublishOpts() as $key => $settings ) {
                $automation->saveMeta( $key, $body->{$key} );
            }

            TruEdit_Log::info( 'Automation ' . $automation->post_meta->json->name . ' updated.' );

            return new WP_REST_Response( $automation->getPost(), 200 );

        } catch ( \Swagger\Client\ApiException $e ) {

            return TruEdit_Handle::swagger_exception( $e );

        } catch ( TruEdit_Exception $e ) {

            return TruEdit_Handle::truedit_exception( $e );

        } catch ( Exception $e ) {

            return TruEdit_Handle::exception( $e );

        }

    }

    public function delete( WP_REST_Request $request ) {

        try {

            $params  = $request->get_params();
            $id      = $params['id'];
            $post    = get_post( $id );
            $auto_id = get_post_meta( $id, 'automation_id', true );
            $json    = get_post_meta( $id, 'json', true );

            if ( ! $post ) {
                throw new TruEdit_Exception( 'AUTOMATION_DOES_NOT_EXIST' );
            }

            if ( ! wp_delete_post( $id ) || empty( $auto_id ) ) {
                throw new TruEdit_Exception( 'AUTOMATION_COULD_NOT_BE_DELETE' );
            }

            $resource = new TruEdit_Resource_Automation();
            $resource->delete( $auto_id );

            TruEdit_Log::info( 'Automation ' . $json->name . ' deleted.' );

            return new WP_REST_Response(
                [
                    'success' => true,
                ], 200
            );

        } catch ( \Swagger\Client\ApiException $e ) {

            return TruEdit_Handle::swagger_exception( $e );

        } catch ( TruEdit_Exception $e ) {

            return TruEdit_Handle::truedit_exception( $e );

        } catch ( Exception $e ) {

            return TruEdit_Handle::exception( $e );

        }

    }

    private function validate_name_length( $name ) {

        // TODO: add it to a list instead.
        if ( strlen( $name ) < 1 ) {
            throw new TruEdit_Exception( 'AUTOMATION_NAME_GREATER_1' );
        }

        // TODO: add it to a list instead.
        if ( strlen( $name ) > 255 ) {
            throw new TruEdit_Exception( 'AUTOMATION_NAME_TOO_LONG' );
        }

    }

    private function validate_if_exists( $name, $id = -1 ) {
        $resource = new TruEdit_Resource_Automation();
        $res      = $resource->read();

        foreach ( $res->getResults() as $auto ) {

            if ( $auto->getName() === $name && $auto->getId() !== $id && $id !== -1 ) {

                throw new TruEdit_Exception(
                    'AUTOMATION_NAME_EXISTS', [
                        'name' => $name,
                    ]
                );

            }
        }

    }

    /**
     * @param stdClass $form
     * @return \Swagger\Client\Model\AutomationV1TO
     */
    private function convertFormIntoApiForm($form) {
        $automationConfig = new \Swagger\Client\Model\Config();
        $automationConfig->setFormUrl($form->url);
        $automationConfig->setFormRemote(true);
        $automationConfig->setExternalConfig(true);

        $automationProfiles = [];

        foreach($form->profiles as $profile) {
            $automationProfile = new \Swagger\Client\Model\ReferenceV1TO();
            $automationProfile->setId($profile->id);
            $automationProfiles[] = $automationProfile;
        }

        $automationForm = new \Swagger\Client\Model\AutomationV1TO();
        $automationForm->setName($form->name);
        $automationForm->setConfig($automationConfig);
        $automationForm->setIntegrationIdentifier($this->identifier);
        $automationForm->setProfiles($automationProfiles);
        return $automationForm;
    }

}
