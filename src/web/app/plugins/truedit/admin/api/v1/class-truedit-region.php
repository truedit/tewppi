<?php

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
class TruEdit_ApiRoute_Region implements TruEdit_ApiRoute {

	private $plugin_name;
	private $version;

	private $route_version;
	private $route;
	private $routes;

	private $link;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->route         = 'region';
		$this->route_version = 1;

		$this->routes = [
			'read' => [
				'route'   => $this->route,
				'options' => [
					'methods'  => WP_REST_Server::READABLE,
					'callback' => [
						$this,
						'read',
					],
				],
			],
		];

		$this->link = 'https://s3.amazonaws.com/TruEdit-plugin/TruEditRegions.xml';
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

			$xml  = simplexml_load_file( $this->link );
			$json = json_encode( $xml );

			$regions = [];

			foreach ( json_decode( $json, true )['region'] as $region ) {
				$regions[] = [
					'domain' => parse_url( $region['domain'] )['host'],
					'label'  => $region['label']['en'],
				];
			}

			$regions[] = [
				'domain' => 'Other',
				'label'  => 'Other',
			];

			return new WP_REST_Response( $regions, 200 );

		} catch ( \Swagger\Client\ApiException $e ) {

			return TruEdit_Handle::swagger_exception( $e );

		} catch ( TruEdit_Exception $e ) {

			return TruEdit_Handle::truedit_exception( $e );

		} catch ( Exception $e ) {

			return TruEdit_Handle::exception( $e );

		}

	}

	public function create( WP_REST_Request $request ) {

	}

	public function update( WP_REST_Request $request ) {

	}

	public function delete( WP_REST_Request $request ) {

	}

}


