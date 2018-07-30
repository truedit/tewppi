<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://truedit.github.com/
 * @since      1.0.0
 *
 * @package    TruEdit
 * @subpackage TruEdit/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    TruEdit
 * @subpackage TruEdit/includes
 * @author     TruEdit <test@test.com>
 */
class TruEdit {

	private $truedit_admin;
	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      TruEdit_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	private static $instance;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	private function __construct() {
		if ( defined( 'PLUGIN_NAME_VERSION' ) ) {
			$this->version = PLUGIN_NAME_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'truedit';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_helpers();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->define_api();
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new TruEdit();
		}

		return self::$instance;
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - TruEdit_Loader. Orchestrates the hooks of the plugin.
	 * - TruEdit_i18n. Defines internationalization functionality.
	 * - TruEdit_Admin. Defines all hooks for the admin area.
	 * - TruEdit_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * Base
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-truedit-levels.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-truedit-exception.php';

		/**
		 * Static helpers
		 */
		foreach ( glob( dirname( __FILE__ ) . '/helpers/*.php' ) as $filename ) {
			require_once $filename;
		}

		/**
		 * Interfaces
		 */
		foreach ( glob( dirname( __FILE__ ) . '/interfaces/*.php' ) as $filename ) {
			require_once $filename;
		}

		/**
		 * Models
		 */
		foreach ( glob( dirname( __FILE__ ) . '/models/*.php' ) as $filename ) {
			require_once $filename;
		}

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-truedit-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-truedit-i18n.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-truedit-publish.php';

		/**
		 * Rest Api
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-truedit-api.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-truedit-client.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-truedit-configuration.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-truedit-resource.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-truedit-admin-api.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-truedit-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-truedit-public.php';

		$this->loader = new TruEdit_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the TruEdit_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new TruEdit_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	private function define_helpers() {

		new TruEdit_Has( $this->get_plugin_name(), $this->get_version() );
		new TruEdit_Option( $this->get_plugin_name(), $this->get_version() );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$this->truedit_admin = new TruEdit_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $this->truedit_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $this->truedit_admin, 'enqueue_scripts' );

		$this->loader->add_action( 'init', $this->truedit_admin, 'post_types' );
		$this->loader->add_action( 'admin_menu', $this->truedit_admin, 'menu' );

		$this->loader->add_filter( 'query_vars', $this->truedit_admin, 'query_vars' );
		$this->loader->add_action( 'init', $this->truedit_admin, 'custom_template' );
		$this->loader->add_action( 'tiny_mce_before_init', $this->truedit_admin, 'tiny_mce_settings' );

		$this->loader->add_filter( 'comments_clauses', $this->truedit_admin, 'truedit_comments_clauses' );

		$this->loader->add_action( 'init', $this->truedit_admin, 'truedit_modify_headers' );
		$this->loader->add_action( 'admin_init', $this->truedit_admin, 'truedit_modify_headers' );
		$this->loader->add_action( 'login_init', $this->truedit_admin, 'truedit_modify_headers' );
		/**
		* $this->loader->add_filter( 'login_redirect ', $this->truedit_admin, 'truedit_modify_headers' );
		*/

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new TruEdit_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	private function define_api() {

		$plugin_api = new TruEdit_Api( $this->get_plugin_name(), $this->get_version() );

		$apis = [
			new TruEdit_Admin_Api( $this->get_plugin_name(), $this->get_version() ),
		];

		foreach ( $apis as $api ) {
			$plugin_api->add_apis( $api->get_apis() );
		}

		$this->loader->add_action( 'init', $plugin_api, 'init' );
		$this->loader->add_action( 'rest_api_init', $plugin_api, 'rest_api_init' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    TruEdit_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	public function getTrueditAdmin() {
		return $this->truedit_admin;
	}

}
