<?php

class TruEdit_Option {

	private static $version;
	private static $plugin_name;

	public function __construct( $plugin_name, $version ) {

		self::$plugin_name = $plugin_name;
		self::$version     = $version;

	}

	public static function get_all( $list ) {

		$opts = new stdClass();

		foreach ( $list as $opt ) {
			$opts->{$opt} = self::get( $opt );
		}

		return $opts;

	}

	/**
	 * Alias for WordPress get_site_option
	 * Will get the current site option if multisite
	 * @param $key string Key that the option is stored as
	 * @param null $default Default value, null by default
	 * @return mixed
	 */
	public static function get( $key, $default = null ) {
		return get_option( $key, $default );
	}

	public static function save_all( $list ) {

		$opts = new stdClass();

		foreach ( $list as $key => $value ) {
			$opts->{$key} = self::save( $key, $value );
		}

		return $opts;
	}

	/**
	 * Alias for WordPress update_option
	 * Will update the current site option if multi-site
	 * @param $key string Key that the option will be stored as
	 * @param $value mixed Value that will be stored in the database
	 * @return bool
	 */
	public static function save( $key, $value ) {
		// If saving the option was a success or not
		$result = update_option( $key, $value );

		// Return the saved value, if not successful returns null
		if ( $result ) {
			return $value;
		} else {
			// TODO: Consider throwing an exception instead. This would require a refactor of some of the parent methods.
			return null;
		}
	}

}

