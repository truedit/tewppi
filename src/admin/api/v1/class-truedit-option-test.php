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
class TruEdit_ApiRoute_OptionTest implements TruEdit_ApiRoute {

	private $plugin_name;
	private $version;

	private $route_version;
	private $route;
	private $routes;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->route         = 'option/test';
		$this->route_version = 1;

		$this->routes = [
			'read'   => [
				'route'   => $this->route,
				'options' => [
					'methods'  => WP_REST_Server::READABLE,
					'callback' => [
						$this,
						'read',
					],
				],
			],
			'create' => [
				'route'   => $this->route,
				'options' => [
					'methods'  => WP_REST_Server::CREATABLE,
					'callback' => [
						$this,
						'create',
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
	 * --------------------------------------------
	 */
	public function get_route_version() {
		return $this->route_version;
	}

	public function get_routes() {
		return $this->routes;
	}

	/**
	 * CRUD
	 * --------------------------------------------
	 */
	public function read( WP_REST_Request $request ) {

	}

	public function create( WP_REST_Request $request ) {

		try {

			$resource = new TruEdit_Resource_Check();
			$res      = $resource->check();

			if($res['status_code'] !== 0 || $res['result'] === null) {
                throw new Exception($res['error_message']);
            }

            $session_info = $res->getResult();

			TruEdit_Option::save( 'verified', 1 );

			TruEdit_Log::info( 'Verification successful! We were able to successfully connect to TruEdit\'s tenant ' . $session_info['tenant_name'] . '.' );

			return new WP_REST_Response(
				[
					'verified'     => 1,
					'tenantName' => $session_info->getTenantName(),
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

	public function update( WP_REST_Request $request ) {

	}

	public function delete( WP_REST_Request $request ) {

	}

	private function error( $message ) {
		TruEdit_Option::save( 'verified', -1 );
		TruEdit_Log::error( $message );
	}

}
