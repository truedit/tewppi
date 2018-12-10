<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/truedit/tewppi
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
 * @author     TruEdit <sdk@truedit.com>
 */
class TruEdit_Api {

	protected $plugin_name;
	protected $version;
	protected $apis;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->apis = [];

	}

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_dependencies() {

	}

	/** Type class for arg[0] */
	public function add_apis( $apis ) {

		$this->apis = array_merge( $this->apis, $apis );

	}

	public function rest_api_init() {

		foreach ( $this->apis as $api ) {

			$routes = $api->get_routes();

			// Add option to change this truedit url

			foreach ( $routes as $route ) {

				register_rest_route(
					'truedit/v' . $api->get_route_version(),
					$route['route'],
					$route['options']
				);

			}
		}

	}

}
