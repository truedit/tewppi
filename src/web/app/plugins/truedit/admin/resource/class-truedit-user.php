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
class TruEdit_Resource_User extends TruEdit_Resource {

	public function __construct() {

		parent::__construct();

		$this->api = new Swagger\Client\Api\UserApi(
			$this->getClient(),
			$this->getConfig()
		);

	}

	public function session_info() {

		$accept_language = 'application/json'; // string |

		try {
			return $this->api->getSessionInfoUsingGET( $this->x_api_key, $this->x_app_api_key, $accept_language );
		} catch ( Exception $e ) {
			throw $e;
		}

	}

}
