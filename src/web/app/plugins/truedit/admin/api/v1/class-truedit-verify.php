<?php

class TruEdit_ApiRoute_Verify implements TruEdit_ApiRoute {

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->route         = 'verify';
		$this->route_version = 1;

		$this->routes = [
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
	 */
	public function get_route_version() {
		return $this->route_version;
	}

	public function get_routes() {
		return $this->routes;
	}

	public function read( WP_REST_Request $request ) {

	}

	public function create( WP_REST_Request $request ) {

		try {

			$token = $request['token'];

			$resource = new TruEdit_Resource_SystemInfo( $this->version, $this->plugin_name );
			$res      = $resource->test( $token );

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

	public function update( WP_REST_Request $request ) {

	}

	public function delete( WP_REST_Request $request ) {

	}

}
