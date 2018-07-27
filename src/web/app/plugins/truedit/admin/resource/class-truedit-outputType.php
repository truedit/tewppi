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
class TruEdit_Resource_OutputType extends TruEdit_Resource {

	public function __construct() {

		parent::__construct();

		$this->api = new Swagger\Client\Api\OutputTypeApi(
			$this->getClient(),
			$this->getConfig()
		);

	}

	public function read() {

		$accept_language = 'application/json'; // string |

		try {
			return $this->api->fetchOutputTypesUsingGET( $this->x_api_key, $this->x_app_api_key, $accept_language, null );

		} catch ( Exception $e ) {
			throw $e;
		}

	}

	public function create( $name = '', $profile_name = '' ) {

	}

	public function update() {

	}

	public function delete() {

	}

}
