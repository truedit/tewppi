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
	public static function allowTruEditIframe() {
		header_remove( 'X-Frame-Options' );
		header( 'X-Frame-Options: *' );
	}

	/**
	 * Parses a URL and returns just the domain
	 * @param $url string
	 * @return string
	 */
	private static function parseUrlForDomain( $url ) {
		$urlParts = parse_url( $url );
		return $urlParts['host'];
	}

	/**
	 * Parses a URL and returns just the domain
	 * @param $url string
	 * @return string
	 */
	private static function parseUrlForHost( $url ) {
		$urlParts = parse_url( $url );
		return $urlParts['scheme'] . '://' . $urlParts['host'] . '/';
	}

}
