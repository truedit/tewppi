<?php

class TruEdit_Has {

	private static $version;
	private static $plugin_name;

	private static $ignore = [
		'__construct',
		'passedAllRequirements',
		'debugOn',
	];

	public function __construct( $plugin_name, $version ) {

		self::$plugin_name = $plugin_name;
		self::$version     = $version;

	}

	public static function methods() {

		$methods = [];

		foreach ( get_class_methods( __CLASS__ ) as $method ) {
			if ( ! in_array( $method, self::$ignore ) ) {
				$methods[] = $method;
			}
		}

		return $methods;

	}

	public static function passedAllRequirements() {

		$tisGood = false;
		$methods = self::methods();

		foreach ( $methods as $method ) {
			$tisGood = call_user_func( 'self::' . $method );
		}

		return $tisGood;

	}

	public static function debugOn() {

		if ( getenv( 'WP_ENV' ) === 'development' ) {
			return true;
		}
		return false;

	}

	public static function writableFolder() {
		return ! wp_upload_dir()['error'];
	}

	public static function correctPhpVersion() {

		$current  = phpversion();
		$required = '5.5';

		if ( version_compare( $current, $required ) >= 0 ) {
			return true;
		}

		return false;

	}

	public static function correctWpVersion() {

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

	public static function userLoggedIn() {
		return is_user_logged_in();
	}

	public static function json() {

		return function_exists( 'json_encode' ) &&
			function_exists( 'json_decode' );

	}

	public static function zipArchive() {

		return class_exists( 'ZipArchive' );

	}

	public static function apiKey() {

		return ! empty( TruEdit_Option::get( 'api_key' ) );

	}

	public static function appApiKey() {

		return ! empty( TruEdit_Option::get( 'app_api_key' ) );

	}

	public static function https() {

		if ( self::debugOn() ) {
			return true;
		}

		if ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ) {
			return true;
		} else {
			return false;
		}

	}

}
