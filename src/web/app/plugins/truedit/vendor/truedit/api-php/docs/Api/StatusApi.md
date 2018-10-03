# Swagger\Client\StatusApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createNewUsingPOST**](StatusApi.md#createNewUsingPOST) | **POST** /1/status | Create one or more Status
[**deleteOneUsingDELETE**](StatusApi.md#deleteOneUsingDELETE) | **DELETE** /1/status/{id} | Delete a single Status object.
[**fetchAllUsingGET5**](StatusApi.md#fetchAllUsingGET5) | **GET** /1/status | Fetch all available Status objects.
[**fetchOneUsingGET1**](StatusApi.md#fetchOneUsingGET1) | **GET** /1/status/{id} | Fetch a single Status object.
[**updateOneUsingPUT**](StatusApi.md#updateOneUsingPUT) | **PUT** /1/status/{id} | Update one Status


# **createNewUsingPOST**
> \Swagger\Client\Model\API1ResultListResponseStatusV1TO_ createNewUsingPOST($new_status, $x_api_key, $x_app_api_key, $accept_language)

Create one or more Status

This API is used for creating Statuses.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StatusApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$new_status = new \Swagger\Client\Model\StatusV1ListTO(); // \Swagger\Client\Model\StatusV1ListTO | newStatus
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->createNewUsingPOST($new_status, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatusApi->createNewUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **new_status** | [**\Swagger\Client\Model\StatusV1ListTO**](../Model/StatusV1ListTO.md)| newStatus |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseStatusV1TO_**](../Model/API1ResultListResponseStatusV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteOneUsingDELETE**
> \Swagger\Client\Model\API1ResponseMessage deleteOneUsingDELETE($id, $x_api_key, $x_app_api_key, $accept_language)

Delete a single Status object.

This API is used for deleting a single Status object specified by its ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StatusApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->deleteOneUsingDELETE($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatusApi->deleteOneUsingDELETE: ', $e->getMessage(), PHP_EOL;
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

# **fetchAllUsingGET5**
> \Swagger\Client\Model\API1ResultListResponseStatusV1TO_ fetchAllUsingGET5($minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language, $if_modified_since)

Fetch all available Status objects.

This API is used for fetching all available Status objects.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StatusApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$minimal = false; // bool | minimal
$page_number = 1; // int | pageNumber
$page_size = 100; // int | pageSize
$order_by = array("name asc"); // string[] | orderBy
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 
$if_modified_since = new \DateTime("2013-10-20"); // \DateTime | 

try {
    $result = $apiInstance->fetchAllUsingGET5($minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language, $if_modified_since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatusApi->fetchAllUsingGET5: ', $e->getMessage(), PHP_EOL;
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
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]
 **if_modified_since** | **\DateTime**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseStatusV1TO_**](../Model/API1ResultListResponseStatusV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchOneUsingGET1**
> \Swagger\Client\Model\API1SingleResultResponseStatusV1TO_ fetchOneUsingGET1($id, $x_api_key, $x_app_api_key, $accept_language)

Fetch a single Status object.

This API is used for fetching a single Status object specified by its ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StatusApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchOneUsingGET1($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatusApi->fetchOneUsingGET1: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1SingleResultResponseStatusV1TO_**](../Model/API1SingleResultResponseStatusV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateOneUsingPUT**
> \Swagger\Client\Model\API1SingleResultResponseStatusV1TO_ updateOneUsingPUT($id, $updated_status, $x_api_key, $x_app_api_key, $accept_language)

Update one Status

This API is used for updating Status objects.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\StatusApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$updated_status = new \Swagger\Client\Model\StatusV1TO(); // \Swagger\Client\Model\StatusV1TO | updatedStatus
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->updateOneUsingPUT($id, $updated_status, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling StatusApi->updateOneUsingPUT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| id |
 **updated_status** | [**\Swagger\Client\Model\StatusV1TO**](../Model/StatusV1TO.md)| updatedStatus |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseStatusV1TO_**](../Model/API1SingleResultResponseStatusV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

