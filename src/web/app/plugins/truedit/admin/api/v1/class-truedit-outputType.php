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
class TruEdit_ApiRoute_OutputType implements TruEdit_ApiRoute {

	protected $plugin_name;
	protected $version;

	protected $route;
	protected $route_version;
	protected $routes;

	protected $active_routes = [
		'read',
	];

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->route         = 'outputType/type';
		$this->route_version = 1;
		$this->routes        = [];
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

		// Do stuff
		$resource = new TruEdit_Resource_OutputType( $this->version, $this->plugin_name );

		try {

			$response = $resource->show();

			// ///
			// $text = '{"statusCode":0,"errorMessage":null,"warnings":null,"developerMessage":null,"moreInfo":null,"results":[{"name":"Article","id":13,"profileType":{"name":"ARTICLE","id":14},"automations":[],"truAuthor":false},{"name":"General Folder","id":7,"profileType":{"name":"CONTAINER_ONLY","id":2},"automations":[],"truAuthor":false},{"name":"Images","id":11,"profileType":{"name":"FILE","id":1},"automations":[],"truAuthor":false},{"name":"Layout","id":9,"profileType":{"name":"FILE","id":1},"automations":[],"truAuthor":false},{"name":"Project Folder","id":8,"profileType":{"name":"CONTAINER_ONLY","id":2},"automations":[],"truAuthor":false},{"name":"Story","id":14,"profileType":{"name":"FILE","id":1},"automations":[],"truAuthor":false},{"name":"TruAuthor Document","id":6,"profileType":{"name":"HTML","id":3},"automations":[],"truAuthor":true},{"name":"TruAuthor HTML","id":4,"profileType":{"name":"HTML_COMPONENT","id":8},"automations":[],"truAuthor":false},{"name":"TruAuthor Image","id":2,"profileType":{"name":"IMAGE_COMPONENT","id":5},"automations":[],"truAuthor":false},{"name":"TruAuthor Page Resource","id":5,"profileType":{"name":"PAGE_RESOURCES_COMPONENT","id":9},"automations":[],"truAuthor":false},{"name":"TruAuthor Text","id":1,"profileType":{"name":"TEXT_COMPONENT","id":4},"automations":[{"name":"test","id":5}],"truAuthor":false},{"name":"TruAuthor Video","id":3,"profileType":{"name":"VIDEO_COMPONENT","id":7},"automations":[],"truAuthor":false},{"name":"Video","id":12,"profileType":{"name":"FILE","id":1},"automations":[],"truAuthor":false},{"name":"Word Documents","id":10,"profileType":{"name":"FILE","id":1},"automations":[],"truAuthor":false}],"pageSize":100,"pageNumber":1,"totalItems":14}';
			// return new WP_REST_Response(json_decode($text)->results, 200);
			// ///

			return new WP_REST_Response( $response, 200 );

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
