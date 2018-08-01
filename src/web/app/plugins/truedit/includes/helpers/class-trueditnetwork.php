<?php

class TruEditNetwork {

	private static $version;
	private static $plugin_name;

	public function __construct( $plugin_name, $version ) {

		self::$plugin_name = $plugin_name;
		self::$version     = $version;

	}

	/**
	 * Removes limitations on iframes while plugin is installed and activated
	 */
	public static function allow_tru_edit_iframe() {
		header_remove( 'X-Frame-Options' );
		header( 'X-Frame-Options: *' );
	}

	/**
	 * Parses a URL and returns just the domain
	 * @param $url string
	 * @return string
	 */
	private static function parse_url_for_domain( $url ) {
		$url_parts = wp_parse_url( $url );
		return $url_parts['host'];
	}

	/**
	 * Parses a URL and returns just the domain
	 * @param $url string
	 * @return string
	 */
	private static function parse_url_for_host( $url ) {
		$url_parts = wp_parse_url( $url );
		return $url_parts['scheme'] . '://' . $url_parts['host'] . '/';
	}

}
