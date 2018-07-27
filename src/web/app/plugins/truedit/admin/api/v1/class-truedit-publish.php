<?php

class TruEdit_ApiRoute_Publish implements TruEdit_ApiRoute {

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->route         = 'publish';
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

			$opts = json_decode( $request->get_body() );

			$automation_id = (int) $opts->id; // int
			$job_id        = (int) $opts->uniqueIdentifier; // 17
			$output_id     = 2; // html zip package

			if ( ! $job_id ) {
				throw new TruEdit_Exception( 'NO_JOB_ID_FOUND' );
			}

			$parse   = new TruEdit_Publish( $automation_id, $job_id, $output_id, $opts );
			$post_id = -1;

			switch ( TruEdit_Wp::get_post_meta( $automation_id, 'publish_action', true, 'create_update' ) ) {
				case 'create_update':
					$post_id = $parse->create_update();
					break;
				case 'delete':
					break;
				default:
					$post_id = $parse->create_update();
					break;
			}

			if ( $post_id === -1 ) {
				throw new TruEdit_Exception( 'NOT_PUBLISHED' );
			}

			// TODO: Update to make it easier.
			// $resource = new TruEdit_Resource_Automation();
			// $res = $resource->read($automation_id);
			// $automation->saveJson(json_decode($res->getResult()));

			return new WP_REST_Response(
				[
					'post_id' => $post_id,
				], 200
			);

		} catch ( \Swagger\Client\ApiException $e ) {

			return TruEdit_Handle::swagger_exception( $e, 'publish' );

		} catch ( TruEdit_Exception $e ) {

			return TruEdit_Handle::truedit_exception( $e, 'publish' );

		} catch ( Exception $e ) {

			return TruEdit_Handle::exception( $e, 'publish' );

		}

	}

	public function update( WP_REST_Request $request ) {

	}

	public function delete( WP_REST_Request $request ) {

	}

}
