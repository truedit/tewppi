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
class TruEdit_Resource_Automation extends TruEdit_Resource {

	public function __construct() {

		parent::__construct();

		$this->api = new Swagger\Client\Api\AutomationApi(
			$this->getClient(),
			$this->getConfig()
		);

	}

	public function getFiltered() {

		$automations     = new \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_(); // \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_ | automations
		$minimal         = false; // bool | minimal
		$page_number     = 1; // int | pageNumber
		$page_size       = 100; // int | pageSize
		$order_by        = array( 'name asc' ); // string[] | orderBy
		$accept_language = 'accept_language_example'; // string |

		try {
			return $this->api->fetchWithCriteriaUsingPOST( $automations, $minimal, $page_number, $page_size, $order_by, $this->x_api_key, $this->x_app_api_key, $accept_language );
		} catch ( Exception $e ) {
			throw $e;
		}

	}

	public function getActions() {

		$accept_language = 'accept_language_example'; // string |

		try {
			return $this->api->fetchActionsUsingGET( $this->x_api_key, $this->x_app_api_key, $accept_language );
		} catch ( Exception $e ) {
			throw $e;
		}

	}

	public function read( $id = -1 ) {

		$minimal         = false; // bool | minimal
		$page_number     = 1; // int | pageNumber
		$page_size       = 100; // int | pageSize
		$order_by        = array( 'name asc' ); // string[] | orderBy
		$accept_language = 'application/json';

		try {
			if ( $id === -1 ) {
				return $this->api->fetchAllUsingGET( $minimal, $page_number, $page_size, $order_by, null, $this->x_api_key, $this->x_app_api_key, $accept_language );
			} else {
				return $this->api->fetchUsingGET( $id, $this->x_api_key, $this->x_app_api_key, $accept_language );
			}
		} catch ( Exception $e ) {
			throw $e;
		}

	}

	public function create( $automations ) {

		// $automations = new \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_([
		//     'automations' => $list
		// ]); // \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_ | automations
		$accept_language = 'application/json';

		try {
			return $this->api->saveUsingPOST( $automations, $this->x_api_key, $this->x_app_api_key, $accept_language );
		} catch ( Exception $e ) {
			throw $e;
		}

	}

	public function update( $id, $automation ) {

		// $automation = new \Swagger\Client\Model\AutomationV1TO(); // \Swagger\Client\Model\AutomationV1TO | automationV1TO
		$accept_language = 'application/json'; // string |

		try {
			return $this->api->updateUsingPUT( $id, $automation, $this->x_api_key, $this->x_app_api_key, $accept_language );
		} catch ( Exception $e ) {
			throw $e;
		}

	}

	public function delete( $id ) {

		$accept_language = 'application/json'; // string |

		try {
			return $this->api->deleteUsingDELETE( $id, $this->x_api_key, $this->x_app_api_key, $accept_language );
		} catch ( Exception $e ) {
			throw $e;
		}

	}

}
