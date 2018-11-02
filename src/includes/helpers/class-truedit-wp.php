<?php

class TruEdit_Wp {

	private static $version;
	private static $plugin_name;

	public function __construct( $plugin_name, $version ) {

		$plugin_name = $plugin_name;
		$version     = $version;

	}

	public static function get_post_meta( $post_id, $key, $single, $default = null ) {

		$value = get_post_meta( $post_id, $key, $single );

		if ( empty( $value ) ) {
			return $default;
		} else {
			return $value;
		}

	}

	public static function get_option( $key ) {

		return TruEdit_Option::get( $key );

	}

	/**
	 *
	 */
	public static function get_general_settings() {

		// These values cannot be retreived by get_site_option for some reason.
		return [

			'gmt_offset'      => self::get_option( 'gmt_offset' ),
			'timezone_string' => self::get_option( 'timezone_string' ),
			'date_format'     => self::get_option( 'date_format' ),
			'time_format'     => self::get_option( 'time_format' ),

		];

	}

}

