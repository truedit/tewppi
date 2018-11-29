<?php

class TruEditNetwork {

	private static $version;
	private static $plugin_name;

	public function __construct( $plugin_name, $version ) {

		self::$plugin_name = $plugin_name;
		self::$version     = $version;

	}

	/**
	 * Parses a URL and returns just the domain
	 * @param $url string
	 * @return string
	 */
	private static function parseUrlForDomain( $url ) {
		$urlParts = wp_parse_url( $url );
		return $urlParts['host'];
	}

	/**
	 * Parses a URL and returns just the domain
	 * @param $url string
	 * @return string
	 */
	private static function parseUrlForHost( $url ) {
		$urlParts = wp_parse_url( $url );
		return $urlParts['scheme'] . '://' . $urlParts['host'] . '/';
	}

}
