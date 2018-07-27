<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://truedit.github.com/
 * @since      1.0.0
 *
 * @package    TruEdit
 * @subpackage TruEdit/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    TruEdit
 * @subpackage TruEdit/includes
 * @author     TruEdit <test@test.com>
 */
class TruEdit_Resource_SystemInfo extends TruEdit_Resource {

	public function __construct() {

		parent::__construct();

		$this->api = new Swagger\Client\Api\SystemInfoApi(
			$this->getClient(),
			$this->getConfig()
		);

	}

	public function test( $token ) {

		try {
			return $this->api->verifyTokenUsingPOST( $token );
		} catch ( Exception $e ) {
			throw $e;
		}

	}

}
