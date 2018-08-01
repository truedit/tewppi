<?php

class TruEdit_Has {

	private static $version;
	private static $plugin_name;

	private static $ignore = [
		'__construct',
		'passed_all_requirements',
		'debug_on',
	];

	public function __construct( $plugin_name, $version ) {

		self::$plugin_name = $plugin_name;
		self::$version     = $version;

	}

	public static function methods() {

		$methods = [];

		foreach ( get_class_methods( __CLASS__ ) as $method ) {
			if ( ! in_array( $method, self::$ignore, true ) ) {
				$methods[] = $method;
			}
		}

		return $methods;

	}

	public static function passed_all_requirements() {

		$tis_good = false;
		$methods  = self::methods();

		foreach ( $methods as $method ) {
			$tis_good = call_user_func( 'self::' . $method );
		}

		return $tis_good;

	}

	public static function debug_on() {

		if ( getenv( 'WP_ENV' ) === 'development' ) {
			return true;
		}
		return false;

	}

	public static function writable_folder() {
		return ! wp_upload_dir()['error'];
	}

	public static function correct_php_version() {

		$current  = phpversion();
		$required = '5.5';

		if ( version_compare( $current, $required ) >= 0 ) {
			return true;
		}

		return false;

	}

	public static function correct_wp_version() {

		global $wp_version;
		$required = '4.7';

		if ( version_compare( $wp_version, $required ) >= 0 ) {
			return true;
		}

		return false;

	}

	public static function verified() {

		// Reset the value if nothing is set.
		if ( TruEdit_Option::get( 'verified' ) === '' ) {
			TruEdit_Option::save( 'verified', -1 );
		}

		if ( TruEdit_Option::get( 'verified' ) === '-1' ) {
			return false;
		} else {
			return true;
		}
	}

	public static function user_logged_in() {
		return is_user_logged_in();
	}

	public static function json() {

		return function_exists( 'json_encode' ) &&
			function_exists( 'json_decode' );

	}

	public static function zip_archive() {

		return class_exists( 'ZipArchive' );

	}

	public static function api_key() {

		return ! empty( TruEdit_Option::get( 'api_key' ) );

	}

	public static function app_api_key() {

		return ! empty( TruEdit_Option::get( 'app_api_key' ) );

	}

	public static function https() {

		if ( self::debug_on() ) {
			return true;
		}

		if ( ! empty( $_SERVER['HTTPS'] ) && 'off' !== $_SERVER['HTTPS'] ) { // Input var okay.
			return true;
		} else {
			return false;
		}

	}

}
