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
class TruEdit_Resource_Profile extends TruEdit_Resource {

	public function __construct() {

		parent::__construct();

		$this->api = new Swagger\Client\Api\ProfileApi(
			$this->getClient(),
			$this->getConfig()
		);

	}

	public function read() {

		$minimal         = false; // bool | minimal
		$page_number     = 1; // int | pageNumber
		$page_size       = 100; // int | pageSize
		$order_by        = array( 'name asc' ); // string[] | orderBy
		$accept_language = 'application/json'; // string |

		try {
			return $this->api->fetchAllUsingGET4( $minimal, $page_number, $page_size, $order_by, null, $this->x_api_key, $this->x_app_api_key, $accept_language );

		} catch ( Exception $e ) {
			throw $e;
		}

	}

	public function create( $name = '', $profile_name = '' ) {

		$apiInstance = new Swagger\Client\Api\AutomationApi(
			// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
			// This is optional, `GuzzleHttp\Client` will be used as default.
			new GuzzleHttp\Client()
		);

		$automations     = new \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_(); // \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_ | automations
		$x_api_key       = TruEdit_Option::get( 'truedit_apiKey' );
		$accept_language = 'application/json';

		try {

			return $apiInstance->saveUsingPOST( $automations, $x_api_key, $accept_language );

		} catch ( Exception $e ) {

			throw $e;

		}

	}

	public function update() {

	}

	public function delete() {

	}

}
