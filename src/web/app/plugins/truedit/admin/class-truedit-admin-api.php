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
class TruEdit_Admin_Api {

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

	protected $apis;

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

		$this->load_dependencies();
		$this->apis = [
			new TruEdit_ApiRoute_Log( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_Option( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_OptionTest( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_Automation( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_AutomationAction( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_Profile( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_Dashboard( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_Verify( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_Region( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_Publish( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_Prerequisites( $this->plugin_name, $this->version ),
			new TruEdit_ApiRoute_User( $this->plugin_name, $this->version ),
		];

	}

	public function load_dependencies() {

		foreach ( glob( dirname( __FILE__ ) . '/api/**/*.php' ) as $filename ) {
			require_once $filename;
		}
		foreach ( glob( dirname( __FILE__ ) . '/resource/*.php' ) as $filename ) {
			require_once $filename;
		}

	}

	public function get_apis() {
		return $this->apis;
	}

}
