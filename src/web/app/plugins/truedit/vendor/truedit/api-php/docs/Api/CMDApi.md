# Swagger\Client\CMDApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteUsingDELETE1**](CMDApi.md#deleteUsingDELETE1) | **DELETE** /1/cmd/{id} | Delete a single CMD Field Object.
[**fetchAllUsingGET1**](CMDApi.md#fetchAllUsingGET1) | **GET** /1/cmd | Fetches all CMD Fields.
[**fetchDataTypesUsingGET**](CMDApi.md#fetchDataTypesUsingGET) | **GET** /1/cmd/dataType | Fetches CMD Field data types.
[**fetchUIDataTypesUsingGET**](CMDApi.md#fetchUIDataTypesUsingGET) | **GET** /1/cmd/dataType/ui | Fetches CMD Field UI data types.
[**fetchUsingGET1**](CMDApi.md#fetchUsingGET1) | **GET** /1/cmd/{id} | Fetch a specific CMD Field.
[**saveUsingPOST1**](CMDApi.md#saveUsingPOST1) | **POST** /1/cmd | Create one or more CMD Fields.
[**setFormFileUsingPOST**](CMDApi.md#setFormFileUsingPOST) | **POST** /1/cmd/{id}/file | Set a form file to a CMD Field.
[**updateUsingPUT1**](CMDApi.md#updateUsingPUT1) | **PUT** /1/cmd/{id} | Update one CMD Field.


# **deleteUsingDELETE1**
> \Swagger\Client\Model\API1ResponseMessage deleteUsingDELETE1($id, $x_api_key, $x_app_api_key, $accept_language)

Delete a single CMD Field Object.

This API is used for deleting a single CMD Field Object specified by its ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\CMDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->deleteUsingDELETE1($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CMDApi->deleteUsingDELETE1: ', $e->getMessage(), PHP_EOL;
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

# **fetchAllUsingGET1**
> \Swagger\Client\Model\API1ResultListResponseCMDFieldV1TO_ fetchAllUsingGET1($minimal, $page_number, $page_size, $order_by, $if_modified_since, $x_api_key, $x_app_api_key, $accept_language)

Fetches all CMD Fields.

This API is used for fetching all CMD Fields, with pagination support.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\CMDApi(
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
    $result = $apiInstance->fetchAllUsingGET1($minimal, $page_number, $page_size, $order_by, $if_modified_since, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CMDApi->fetchAllUsingGET1: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1ResultListResponseCMDFieldV1TO_**](../Model/API1ResultListResponseCMDFieldV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchDataTypesUsingGET**
> \Swagger\Client\Model\API1ResultListResponseReferenceV1TO_ fetchDataTypesUsingGET($x_api_key, $x_app_api_key, $accept_language)

Fetches CMD Field data types.

This API is used for fetching CMD Field data types.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\CMDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchDataTypesUsingGET($x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CMDApi->fetchDataTypesUsingGET: ', $e->getMessage(), PHP_EOL;
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

# **fetchUIDataTypesUsingGET**
> \Swagger\Client\Model\API1ResultListResponseReferenceV1TO_ fetchUIDataTypesUsingGET($x_api_key, $x_app_api_key, $accept_language)

Fetches CMD Field UI data types.

This API is used for fetching CMD Field UI data types.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\CMDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchUIDataTypesUsingGET($x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CMDApi->fetchUIDataTypesUsingGET: ', $e->getMessage(), PHP_EOL;
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

# **fetchUsingGET1**
> \Swagger\Client\Model\API1SingleResultResponseCMDFieldV1TO_ fetchUsingGET1($id, $x_api_key, $x_app_api_key, $accept_language)

Fetch a specific CMD Field.

This API is used for fetching details for a specific CMD Field.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\CMDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchUsingGET1($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CMDApi->fetchUsingGET1: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1SingleResultResponseCMDFieldV1TO_**](../Model/API1SingleResultResponseCMDFieldV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **saveUsingPOST1**
> \Swagger\Client\Model\API1ResultListResponseCMDFieldV1TO_ saveUsingPOST1($cmd_fields, $x_api_key, $x_app_api_key, $accept_language)

Create one or more CMD Fields.

This API is used for creating CMD Fields.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\CMDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$cmd_fields = new \Swagger\Client\Model\CMDFieldV1ListTO(); // \Swagger\Client\Model\CMDFieldV1ListTO | cmdFields
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->saveUsingPOST1($cmd_fields, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CMDApi->saveUsingPOST1: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **cmd_fields** | [**\Swagger\Client\Model\CMDFieldV1ListTO**](../Model/CMDFieldV1ListTO.md)| cmdFields |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseCMDFieldV1TO_**](../Model/API1ResultListResponseCMDFieldV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **setFormFileUsingPOST**
> \Swagger\Client\Model\API1SingleResultResponseCMDFieldV1TO_ setFormFileUsingPOST($id, $x_api_key, $x_app_api_key, $accept_language)

Set a form file to a CMD Field.

This API is used for setting form file to CMD Field.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\CMDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->setFormFileUsingPOST($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CMDApi->setFormFileUsingPOST: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1SingleResultResponseCMDFieldV1TO_**](../Model/API1SingleResultResponseCMDFieldV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateUsingPUT1**
> \Swagger\Client\Model\API1SingleResultResponseCMDFieldV1TO_ updateUsingPUT1($id, $cmd_field_v1_to, $x_api_key, $x_app_api_key, $accept_language)

Update one CMD Field.

This API is used for updating CMD Fields.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\CMDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$cmd_field_v1_to = new \Swagger\Client\Model\CMDFieldV1TO(); // \Swagger\Client\Model\CMDFieldV1TO | cmdFieldV1TO
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->updateUsingPUT1($id, $cmd_field_v1_to, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CMDApi->updateUsingPUT1: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| id |
 **cmd_field_v1_to** | [**\Swagger\Client\Model\CMDFieldV1TO**](../Model/CMDFieldV1TO.md)| cmdFieldV1TO |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseCMDFieldV1TO_**](../Model/API1SingleResultResponseCMDFieldV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

