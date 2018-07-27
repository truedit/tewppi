<?php
/*
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://truedit.github.com/
 * @since             1.0.13
 * @package           TruEdit
 *
 * @wordpress-plugin
 * Plugin Name:       TruEdit
 * Plugin URI:        https://truedit.github.com/
 * Description:       TruEdit® is the secure, cloud-based content and workflow management system, that centralizes content creation and manages workflows for mobile, print, and web publishing.
 * Version:           1.0.13
 * Author:            TruEdit
 * Author URI:        https://truedit.github.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       truedit
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.13 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.13' );

/**
 * Libs
 */
require_once( __DIR__ . '/vendor/autoload.php' );
include_once( ABSPATH . 'wp-includes/pluggable.php' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-truedit-activator.php
 */
function activate_truedit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-truedit-activator.php';
	TruEdit_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-truedit-deactivator.php
 */
function deactivate_truedit() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-truedit-deactivator.php';
	TruEdit_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_truedit' );
register_deactivation_hook( __FILE__, 'deactivate_truedit' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-truedit.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.13
 */
function run_truedit() {
	Truedit::instance()->run();
}
run_truedit();
