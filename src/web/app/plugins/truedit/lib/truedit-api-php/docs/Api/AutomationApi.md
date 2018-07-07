# Swagger\Client\AutomationApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteUsingDELETE**](AutomationApi.md#deleteUsingDELETE) | **DELETE** /1/automation/{id} | Deletes an Automation
[**fetchActionsUsingGET**](AutomationApi.md#fetchActionsUsingGET) | **GET** /1/automation/action | Fetches Automation Actions
[**fetchAllUsingGET**](AutomationApi.md#fetchAllUsingGET) | **GET** /1/automation | Fetches all Automations
[**fetchUsingGET**](AutomationApi.md#fetchUsingGET) | **GET** /1/automation/{id} | Fetch a specific Automation
[**fetchWithCriteriaUsingPOST**](AutomationApi.md#fetchWithCriteriaUsingPOST) | **POST** /1/automation/filter | Fetches filtered Automations
[**saveUsingPOST**](AutomationApi.md#saveUsingPOST) | **POST** /1/automation | Create one or more Automations
[**updateUsingPUT**](AutomationApi.md#updateUsingPUT) | **PUT** /1/automation/{id} | Updates an Automation


# **deleteUsingDELETE**
> \Swagger\Client\Model\API1ResponseMessage deleteUsingDELETE($id, $x_api_key, $x_app_api_key, $accept_language)

Deletes an Automation

This API is used for deleting a specific Automation.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AutomationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->deleteUsingDELETE($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AutomationApi->deleteUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| id |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResponseMessage**](../Model/API1ResponseMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchActionsUsingGET**
> \Swagger\Client\Model\API1ResultListResponseReferenceV1TO_ fetchActionsUsingGET($x_api_key, $x_app_api_key, $accept_language)

Fetches Automation Actions

This API is used for fetching Automation Actions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AutomationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchActionsUsingGET($x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AutomationApi->fetchActionsUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseReferenceV1TO_**](../Model/API1ResultListResponseReferenceV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchAllUsingGET**
> \Swagger\Client\Model\API1ResultListResponseAutomationV1TO_ fetchAllUsingGET($minimal, $page_number, $page_size, $order_by, $if_modified_since, $x_api_key, $x_app_api_key, $accept_language)

Fetches all Automations

This API is used for fetching all Automations.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AutomationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$minimal = false; // bool | minimal
$page_number = 1; // int | pageNumber
$page_size = 100; // int | pageSize
$order_by = array("name asc"); // string[] | orderBy
$if_modified_since = "if_modified_since_example"; // string | If-Modified-Since
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchAllUsingGET($minimal, $page_number, $page_size, $order_by, $if_modified_since, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AutomationApi->fetchAllUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **minimal** | **bool**| minimal | [optional] [default to false]
 **page_number** | **int**| pageNumber | [optional] [default to 1]
 **page_size** | **int**| pageSize | [optional] [default to 100]
 **order_by** | [**string[]**](../Model/string.md)| orderBy | [optional] [default to name asc]
 **if_modified_since** | **string**| If-Modified-Since | [optional]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseAutomationV1TO_**](../Model/API1ResultListResponseAutomationV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchUsingGET**
> \Swagger\Client\Model\API1SingleResultResponseAutomationV1TO_ fetchUsingGET($id, $x_api_key, $x_app_api_key, $accept_language)

Fetch a specific Automation

This API is used for fetching a specific Automation.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AutomationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchUsingGET($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AutomationApi->fetchUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| id |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseAutomationV1TO_**](../Model/API1SingleResultResponseAutomationV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchWithCriteriaUsingPOST**
> \Swagger\Client\Model\API1ResultListResponseAutomationV1TO_ fetchWithCriteriaUsingPOST($automations, $minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language)

Fetches filtered Automations

This API is used for fetching all Automations that match a specific filter.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AutomationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$automations = new \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_(); // \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_ | automations
$minimal = false; // bool | minimal
$page_number = 1; // int | pageNumber
$page_size = 100; // int | pageSize
$order_by = array("name asc"); // string[] | orderBy
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchWithCriteriaUsingPOST($automations, $minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AutomationApi->fetchWithCriteriaUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **automations** | [**\Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_**](../Model/AutomationV1ListTOAutomationV1TO_.md)| automations |
 **minimal** | **bool**| minimal | [optional] [default to false]
 **page_number** | **int**| pageNumber | [optional] [default to 1]
 **page_size** | **int**| pageSize | [optional] [default to 100]
 **order_by** | [**string[]**](../Model/string.md)| orderBy | [optional] [default to name asc]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseAutomationV1TO_**](../Model/API1ResultListResponseAutomationV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **saveUsingPOST**
> \Swagger\Client\Model\API1ResultListResponseAutomationV1TO_ saveUsingPOST($automations, $x_api_key, $x_app_api_key, $accept_language)

Create one or more Automations

This API is used for creating Automations.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AutomationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$automations = new \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_(); // \Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_ | automations
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->saveUsingPOST($automations, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AutomationApi->saveUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **automations** | [**\Swagger\Client\Model\AutomationV1ListTOAutomationV1TO_**](../Model/AutomationV1ListTOAutomationV1TO_.md)| automations |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseAutomationV1TO_**](../Model/API1ResultListResponseAutomationV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateUsingPUT**
> \Swagger\Client\Model\API1SingleResultResponseAutomationV1TO_ updateUsingPUT($id, $automation_v1_to, $x_api_key, $x_app_api_key, $accept_language)

Updates an Automation

This API is used for updating a specific Automation.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\AutomationApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$automation_v1_to = new \Swagger\Client\Model\AutomationV1TO(); // \Swagger\Client\Model\AutomationV1TO | automationV1TO
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->updateUsingPUT($id, $automation_v1_to, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AutomationApi->updateUsingPUT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| id |
 **automation_v1_to** | [**\Swagger\Client\Model\AutomationV1TO**](../Model/AutomationV1TO.md)| automationV1TO |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseAutomationV1TO_**](../Model/API1SingleResultResponseAutomationV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

