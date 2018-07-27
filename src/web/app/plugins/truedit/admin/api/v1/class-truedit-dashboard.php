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
class TruEdit_ApiRoute_Dashboard implements TruEdit_ApiRoute {

	private $plugin_name;
	private $version;

	private $route_version;
	private $route;
	private $routes;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->route         = 'dashboard';
		$this->route_version = 1;

		$this->routes = [
			'read' => [
				'route'   => $this->route . '/(?P<type>\d+)',
				'options' => [
					'methods'  => WP_REST_Server::READABLE,
					'callback' => [
						$this,
						'read',
					],
				],
			],
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

			$dashboard = [
				'has'         => [
					'verified' => TruEdit_Has::verified(),
				],
				'automations' => $this->getAutos( 5 ),
				'logs'        => $this->getLogs(),
			];

			return new WP_REST_Response( $dashboard, 200 );

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

	private function getLogs() {
		return TruEdit_ApiRoute_Log::getComments( 1, 5 );
	}

	private function getAutos( $count = 5 ) {

		$posts = get_posts(
			[
				'post_type'   => 'automation',
				'post_status' => 'draft',
				'numberposts' => $count,
			// 'order'    => 'ASC'
			]
		);

		foreach ( $posts as $post ) {
			$post_id                  = $post->ID;
			$post_meta                = new stdClass();
			$post_meta->json          = get_post_meta( $post_id, 'json', true );
			$post_meta->automation_id = get_post_meta( $post_id, 'automation_id', true );

			$post->post_meta = $post_meta;
		}

		return $posts;

	}

}
