# Swagger\Client\TargetMediaApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createNewUsingPOST1**](TargetMediaApi.md#createNewUsingPOST1) | **POST** /1/targetMedia | Create one or more Target Media
[**deleteOneUsingDELETE1**](TargetMediaApi.md#deleteOneUsingDELETE1) | **DELETE** /1/targetMedia/{id} | Delete a single Target Media object.
[**fetchAllUsingGET6**](TargetMediaApi.md#fetchAllUsingGET6) | **GET** /1/targetMedia | Fetch all available Target Media objects.
[**fetchIntentValuesUsingGET**](TargetMediaApi.md#fetchIntentValuesUsingGET) | **GET** /1/targetMedia/intent | Fetches all Target Media Intent values
[**fetchOneUsingGET2**](TargetMediaApi.md#fetchOneUsingGET2) | **GET** /1/targetMedia/{id} | Fetch a single Target Media object.
[**fetchOrientationValuesUsingGET**](TargetMediaApi.md#fetchOrientationValuesUsingGET) | **GET** /1/targetMedia/orientation | Fetches all Target Media Orientation values
[**updateOneUsingPUT1**](TargetMediaApi.md#updateOneUsingPUT1) | **PUT** /1/targetMedia/{id} | Update one Target Media


# **createNewUsingPOST1**
> \Swagger\Client\Model\API1ResultListResponseTargetMediaV1TO_ createNewUsingPOST1($new_media, $x_api_key, $x_app_api_key, $accept_language)

Create one or more Target Media

This API is used for creating Target Media.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TargetMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$new_media = new \Swagger\Client\Model\TargetMediaV1ListTO(); // \Swagger\Client\Model\TargetMediaV1ListTO | newMedia
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->createNewUsingPOST1($new_media, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TargetMediaApi->createNewUsingPOST1: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **new_media** | [**\Swagger\Client\Model\TargetMediaV1ListTO**](../Model/TargetMediaV1ListTO.md)| newMedia |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseTargetMediaV1TO_**](../Model/API1ResultListResponseTargetMediaV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteOneUsingDELETE1**
> \Swagger\Client\Model\API1ResponseMessage deleteOneUsingDELETE1($id, $x_api_key, $x_app_api_key, $accept_language)

Delete a single Target Media object.

This API is used for deleting a single Target Media object specified by its ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TargetMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->deleteOneUsingDELETE1($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TargetMediaApi->deleteOneUsingDELETE1: ', $e->getMessage(), PHP_EOL;
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

# **fetchAllUsingGET6**
> \Swagger\Client\Model\API1ResultListResponseTargetMediaV1TO_ fetchAllUsingGET6($minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language, $if_modified_since)

Fetch all available Target Media objects.

This API is used for fetching all available Target Media objects.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TargetMediaApi(
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
    $result = $apiInstance->fetchAllUsingGET6($minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language, $if_modified_since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TargetMediaApi->fetchAllUsingGET6: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1ResultListResponseTargetMediaV1TO_**](../Model/API1ResultListResponseTargetMediaV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchIntentValuesUsingGET**
> \Swagger\Client\Model\API1ResultListResponseReferenceV1TO_ fetchIntentValuesUsingGET($x_api_key, $x_app_api_key, $accept_language)

Fetches all Target Media Intent values

This API is used for fetching all Intent values that may be referenced from a Target Media.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TargetMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchIntentValuesUsingGET($x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TargetMediaApi->fetchIntentValuesUsingGET: ', $e->getMessage(), PHP_EOL;
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

# **fetchOneUsingGET2**
> \Swagger\Client\Model\API1SingleResultResponseTargetMediaV1TO_ fetchOneUsingGET2($id, $x_api_key, $x_app_api_key, $accept_language)

Fetch a single Target Media object.

This API is used for fetching a single Target Media object specified by its ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TargetMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchOneUsingGET2($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TargetMediaApi->fetchOneUsingGET2: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1SingleResultResponseTargetMediaV1TO_**](../Model/API1SingleResultResponseTargetMediaV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchOrientationValuesUsingGET**
> \Swagger\Client\Model\API1ResultListResponseReferenceV1TO_ fetchOrientationValuesUsingGET($x_api_key, $x_app_api_key, $accept_language)

Fetches all Target Media Orientation values

This API is used for fetching all Orientation values that may be referenced from a Target Media.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TargetMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchOrientationValuesUsingGET($x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TargetMediaApi->fetchOrientationValuesUsingGET: ', $e->getMessage(), PHP_EOL;
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

# **updateOneUsingPUT1**
> \Swagger\Client\Model\API1SingleResultResponseTargetMediaV1TO_ updateOneUsingPUT1($id, $new_media, $x_api_key, $x_app_api_key, $accept_language)

Update one Target Media

This API is used for updating Target Media objects.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\TargetMediaApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$new_media = new \Swagger\Client\Model\TargetMediaV1TO(); // \Swagger\Client\Model\TargetMediaV1TO | newMedia
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->updateOneUsingPUT1($id, $new_media, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TargetMediaApi->updateOneUsingPUT1: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| id |
 **new_media** | [**\Swagger\Client\Model\TargetMediaV1TO**](../Model/TargetMediaV1TO.md)| newMedia |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseTargetMediaV1TO_**](../Model/API1SingleResultResponseTargetMediaV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

