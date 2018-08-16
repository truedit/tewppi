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
class TruEdit_ApiRoute_Option implements TruEdit_ApiRoute {

	private $plugin_name;
	private $version;

	private $route_version;
	private $route;
	private $routes;

	private $valid_opts;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->route         = 'option';
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

		$this->valid_opts = [
			'replace_non_breaking_space' => [
				'read'  => true,
				'write' => true,
			],
			'replace_carriage_return'    => [
				'read'  => true,
				'write' => true,
			],
			'last_verification'          => [
				'read' => true,
			],
			'api_key'                    => [
				'read'  => true,
				'write' => true,
			],
			'app_api_key'                => [
				'read'  => true,
				'write' => true,
			],
			'namespace'                  => [
				'read'  => true,
				'write' => true,
			],
			'last_tested'                => [
				'read' => true,
			],
			'server'                     => [
				'read'  => true,
				'write' => true,
			],
			'tenant'                     => [
				'read'  => true,
				'write' => true,
			],
			'host'                       => [
				'read'              => true,
				'write'             => true,
				'validate_callback' => function( $url ) {

					/**
					 * Works
					 * - example.com
					 * - optional.example.com
					 * - optional.example.com:80
					 * Does not work
					 * - example.com:
					 * - example.com:80/
					 * - example.com/
					 * - example.com/route
					 * - .example.com
					 * - https://example.com
					 */
					$pattern = '/^(([a-zA-Z0-9])+([.]))?([a-zA-Z0-9])+([.])+([a-zA-Z]{1,10})+(\:[0-9]+)?$/';
					if ( ! preg_match( $pattern, $url ) ) {
						throw new TruEdit_Exception( 'INCORRECT_HOST' );
					}

					/**
					 * If its in our required format, double check that it works if we add https://
					 */
					if ( ! filter_var( 'https://' . $url, FILTER_VALIDATE_URL ) ) {
						throw new TruEdit_Exception( 'INCORRECT_HOST' );
					}
				},
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

		$opts = $this->get_opts();
		return new WP_REST_Response( $opts, 200 );

	}

	public function create( WP_REST_Request $request ) {

		try {

			$this->save_opts( json_decode( $request->get_body() ) );

			$opts = $this->get_opts();

			return new WP_REST_Response( $opts, 200 );

		} catch ( TruEdit_Exception $e ) {

			return TruEdit_Handle::truedit_exception( $e );

		} catch ( Exception $e ) {

			return TruEdit_Handle::exception( $e );

		}

	}

	public function update( WP_REST_Request $request ) {

		return $this->create( $request );

	}

	public function delete( WP_REST_Request $request ) {

	}

	/**
	 * Privates
	 * --------------------------------------------
	 */

	private function get_opts() {

		$opts = new stdClass();

		foreach ( $this->valid_opts as $opt => $settings ) {
			// check for read === true

			if ( isset( $settings['default'] ) ) {
				$opts->{$opt} = $this->get_opt( $opt, $settings['default'] );
			} else {
				$opts->{$opt} = $this->get_opt( $opt );
			}
		}

		return $opts;

	}

	private function get_opt( $key, $default = null ) {

		$value = '';

		if ( ! empty( $this->valid_opts[ $key ]['read'] ) ) {
			$value = TruEdit_Option::get( $key );
		}

		if ( ! $value && ! is_null( $default ) ) {
			$value = $default;
		}

		return $value;

	}

	/**
	 * Save the body
	 */
	private function save_opts( $list ) {

		if ( ! TruEdit_Has::https() ) {
			throw new TruEdit_Exception( 'NO_HTTPS' );
		}

		if ( ! TruEdit_Has::zipArchive() ) {
			throw new TruEdit_Exception( 'NO_ZIP_ARCHIVE' );
		}

		if ( ! TruEdit_Has::json() ) {
			throw new TruEdit_Exception( 'NO_JSON' );
		}

		if ( ! TruEdit_Has::correctPhpVersion() ) {
			throw new TruEdit_Exception( 'INCORRECT_PHP_VERSION' );
		}

		if ( ! TruEdit_Has::correctWpVersion() ) {
			throw new TruEdit_Exception( 'INCORRECT_WP_VERSION' );
		}

		$opts = new stdClass();

		foreach ( $list as $key => $value ) {

			if ( isset( $this->valid_opts[ $key ] ) &&
				! empty( $this->valid_opts[ $key ]['write'] ) &&
				$this->valid_opts[ $key ]['write']
				) {

				if ( isset( $this->valid_opts[ $key ]['validate_callback'] ) ) {

					call_user_func( $this->valid_opts[ $key ]['validate_callback'], $value );
					$opts->{$key} = $this->save_opt( $key, $value );

				} else {

					$opts->{$key} = $this->save_opt( $key, $value );

				}
			} else {
				$opts->{$key} = 'not_available';
			}
		}

		return $opts;

	}

	/**
	 * Save a single option
	 */
	private function save_opt( $key, $value ) {

		if (
			$key === 'api_key' &&
			TruEdit_Option::get( 'api_key' ) !== $value
			) {

			$this->save_opt( 'last_tested', -1 );
			TruEdit_Log::info( 'API key was updated.' );

		}

		if (
			$key === 'app_api_key' &&
			TruEdit_Option::get( 'app_api_key' ) !== $value
			) {

			$this->save_opt( 'last_tested', -1 );
			TruEdit_Log::info( 'Application key was updated.' );

		}

		if ( $key === 'host' &&
			TruEdit_Option::get( 'host' ) !== $value ) {

			$this->save_opt( 'last_tested', -1 );
			TruEdit_Log::info( 'Host was updated.' );

		}

		return TruEdit_Option::save( $key, $value );

	}

}
