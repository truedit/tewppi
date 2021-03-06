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
class TruEdit_ApiRoute_Prerequisites implements TruEdit_ApiRoute {

	private $plugin_name;
	private $version;

	private $route_version;
	private $route;
	private $routes;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->route         = 'prerequisites';
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

			$prerequisites = [
				'hasHttps'             => [
					'name'    => 'HTTPS',
					'boolean' => TruEdit_Has::https(),
				],
				'hasJson'              => [
					'name'    => 'JSON Extension',
					'boolean' => TruEdit_Has::json(),
				],
				'writableFolder'       => [
					'name'    => 'Uploads Folder Writable',
					'boolean' => TruEdit_Has::writableFolder(),
				],
				'hasZipArchive'        => [
					'name'    => 'ZIP Archive Extension',
					'boolean' => TruEdit_Has::zipArchive(),
				],
				'hasCorrectWpVersion'  => [
					'name'    => 'Wordpress 4.7+',
					'boolean' => TruEdit_Has::correctWpVersion(),
				],
				'hasCorrectPhpVersion' => [
					'name'    => 'PHP 5.5+',
					'boolean' => TruEdit_Has::correctPhpVersion(),
				],
			];

			if ( TruEdit_Has::debugOn() ) {
				$prerequisites['hasDebugOn'] = [
					'name'    => 'Debug Mode',
					'boolean' => TruEdit_Has::debugOn(),
				];
			}

			return new WP_REST_Response( $prerequisites, 200 );

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

	private function getLogs( $count = 5 ) {

		$query    = new WP_Comment_Query;
		$comments = $query->query(
			[
				'number'        => $count,
				'comment_agent' => 'TruEdit',
				'order'         => 'DESC',
			]
		);

		return $comments;

	}

	private function getAutos( $count = 5 ) {

		$posts = get_posts(
			[
				'post_type'   => 'automation',
				'post_status' => 'draft',
				'numberposts' => $count,
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
