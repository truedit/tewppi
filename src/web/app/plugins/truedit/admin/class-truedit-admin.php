<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://truedit.github.com/
 * @since      1.0.0
 *
 * @package    TruEdit
 * @subpackage TruEdit/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    TruEdit
 * @subpackage TruEdit/admin
 * @author     TruEdit <test@test.com>
 */
class TruEdit_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in TruEdit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The TruEdit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$deps = [
			'dashicons',
			'common',
			'forms',
			'buttons',
			'edit',
		];

		foreach ( glob( dirname( __FILE__ ) . '/static/css/*' ) as $i => $filename ) {
			$filename = plugin_dir_url( __FILE__ ) . 'static/css/' . substr( $filename, strrpos( $filename, '/' ) + 1 );
			wp_enqueue_style( $this->plugin_name . '-' . $i, $filename, $deps, $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in TruEdit_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The TruEdit_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		foreach ( glob( dirname( __FILE__ ) . '/static/js/*' ) as $filename ) {
			$filename = plugin_dir_url( __FILE__ ) . 'static/js/' . substr( $filename, strrpos( $filename, '/' ) + 1 );
			wp_enqueue_script( $this->plugin_name, $filename, [], $this->version, true );
		}

	}

	/**
	 *  Register admin menus
	 */
	public function menu() {

		add_menu_page(
			'TruEdit',
			'TruEdit',
			'manage_options',
			'TruEdit',
			[ $this, 'page_welcome' ],
			plugins_url( '/assets/images/truedit-icon.png', __FILE__ )
		);
		add_submenu_page(
			'TruEdit',
			'Configuration',
			'Configuration',
			'manage_options',
			'TruEdit-options', [
				$this,
				'page_options',
			]
		);
		add_submenu_page(
			'TruEdit',
			'Automations',
			'Automations',
			'manage_options',
			'TruEdit-automations', [
				$this,
				'page_automations',
			]
		);
		add_submenu_page(
			'TruEdit',
			'Logs',
			'Logs',
			'manage_options',
			'TruEdit-logs', [
				$this,
				'page_logs',
			]
		);
		/*
		// add_submenu_page(
		// 	'TruEdit',
		// 	'Help',
		// 	'Help',
		// 	'manage_options',
		// 	'TruEdit-options', [
		// 		$this,
		// 		'page_options'
		// 	]
		// );
		*/
	}

	/**
	 * Filter comments
	 */
	public function truedit_comments_clauses( $clauses ) {

		$clauses['where'] .= ( $clauses['where'] ? ' AND ' : '' ) . " comment_agent != 'TruEdit' ";
		return $clauses;

	}

	public function post_types() {

		register_post_type(
			'truedit_automation', [
				'labels'      => [
					'name'          => 'Automations',
					'singular_name' => 'Automation',
				],
				'public'      => false,
				'has_archive' => true,
			]
		);

		register_post_type(
			'truedit_log', [
				'labels'      => [
					'name'          => 'Logs',
					'singular_name' => 'Log',
				],
				'public'      => false,
				'has_archive' => true,
			]
		);

	}

	public function page_welcome() {
		include_once( 'partials/truedit-admin-display.php' ); }
	public function page_automations() {
		include_once( 'partials/truedit-admin-display.php' ); }
	public function page_options() {
		include_once( 'partials/truedit-admin-display.php' ); }
	public function page_logs() {
		include_once( 'partials/truedit-admin-display.php' ); }

	public function custom_template() {

		if (
			isset( $_GET['truedit'] ) && 'true' === $_GET['truedit'] &&
			isset( $_GET['type'] ) && 'automation' === $_GET['type'] ) {
			echo "Developer is tweaking";
			exit;
			$this->enqueue_styles();
			$this->enqueue_scripts();

			include_once( 'partials/truedit-admin-callback.php' );

			exit();

		}

	}

	/**
	 * Ads the args that can be detected
	 */
	public function query_vars( $vars ) {

		$vars[] = 'truedit';
		$vars[] = 'type';
		$vars[] = 'id';

		return $vars;

	}

	/**
	 * Disable auto p
	 */
	public function tiny_mce_settings( $in ) {

		if ( isset( $_GET['truedit'] ) && 'true' === $_GET['truedit'] ) {
			$in['wpautop'] = false;
		}

		return $in;

	}

	public function truedit_modify_headers() {
		TruEditNetwork::allowTruEditIframe();

	}

}


