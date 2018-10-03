# Swagger\Client\UserApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**fetchAllUsingGET7**](UserApi.md#fetchAllUsingGET7) | **GET** /1/user | Fetches all Global Users.
[**fetchUsingGET4**](UserApi.md#fetchUsingGET4) | **GET** /1/user/{id} | Fetch a specific Global User.
[**getSessionInfoUsingGET**](UserApi.md#getSessionInfoUsingGET) | **GET** /1/user/sessionInfo | Fetches sessionInfo
[**tickleUsingGET**](UserApi.md#tickleUsingGET) | **GET** /1/user/idle | No-op to reset the session timer


# **fetchAllUsingGET7**
> \Swagger\Client\Model\API1ResultListResponseUserV1TO_ fetchAllUsingGET7($minimal, $page_number, $page_size, $quick_search, $order_by, $x_api_key, $x_app_api_key, $accept_language)

Fetches all Global Users.

This API is used for fetching all Global Users, with pagincation support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$minimal = false; // bool | minimal
$page_number = 1; // int | pageNumber
$page_size = 100; // int | pageSize
$quick_search = "quick_search_example"; // string | quickSearch
$order_by = array("email asc"); // string[] | orderBy
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchAllUsingGET7($minimal, $page_number, $page_size, $quick_search, $order_by, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->fetchAllUsingGET7: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **minimal** | **bool**| minimal | [optional] [default to false]
 **page_number** | **int**| pageNumber | [optional] [default to 1]
 **page_size** | **int**| pageSize | [optional] [default to 100]
 **quick_search** | **string**| quickSearch | [optional]
 **order_by** | [**string[]**](../Model/string.md)| orderBy | [optional] [default to email asc]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseUserV1TO_**](../Model/API1ResultListResponseUserV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchUsingGET4**
> \Swagger\Client\Model\API1SingleResultResponseUserV1TO_ fetchUsingGET4($id, $x_api_key, $x_app_api_key, $accept_language)

Fetch a specific Global User.

This API is used for fetching details for a specific Global User by ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchUsingGET4($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->fetchUsingGET4: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1SingleResultResponseUserV1TO_**](../Model/API1SingleResultResponseUserV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSessionInfoUsingGET**
> \Swagger\Client\Model\API1SingleResultResponseSessionInfoTO_ getSessionInfoUsingGET($x_api_key, $x_app_api_key, $accept_language)

Fetches sessionInfo

This API is used for fetching the sessionInfo.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->getSessionInfoUsingGET($x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->getSessionInfoUsingGET: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1SingleResultResponseSessionInfoTO_**](../Model/API1SingleResultResponseSessionInfoTO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **tickleUsingGET**
> \Swagger\Client\Model\API1ResponseMessage tickleUsingGET()

No-op to reset the session timer

This API is used to reset the session timer.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\UserApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);

try {
    $result = $apiInstance->tickleUsingGET();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserApi->tickleUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Swagger\Client\Model\API1ResponseMessage**](../Model/API1ResponseMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

