# Swagger\Client\ProfileApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**fetchAllUsingGET4**](ProfileApi.md#fetchAllUsingGET4) | **GET** /1/profile | Fetches all profiles
[**fetchProfileIconsUsingGET**](ProfileApi.md#fetchProfileIconsUsingGET) | **GET** /1/profile/icon | Fetches all supported profile icons.
[**fetchProfileTypesUsingGET**](ProfileApi.md#fetchProfileTypesUsingGET) | **GET** /1/profile/type | Fetches all profileTypes
[**fetchUsingGET3**](ProfileApi.md#fetchUsingGET3) | **GET** /1/profile/{id} | Fetch a specific profile
[**fetchWithCriteriaUsingPOST1**](ProfileApi.md#fetchWithCriteriaUsingPOST1) | **POST** /1/profile/filter | Fetch filtered profiles.
[**saveUsingPOST2**](ProfileApi.md#saveUsingPOST2) | **POST** /1/profile | Create one or more profiles.
[**updateUsingPUT2**](ProfileApi.md#updateUsingPUT2) | **PUT** /1/profile/{id} | Updates a Profile


# **fetchAllUsingGET4**
> \Swagger\Client\Model\API1ResultListResponseProfileV1TO_ fetchAllUsingGET4($minimal, $page_number, $page_size, $order_by, $if_modified_since, $x_api_key, $x_app_api_key, $accept_language)

Fetches all profiles

This API is used for fetching all profiles.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\ProfileApi(
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
    $result = $apiInstance->fetchAllUsingGET4($minimal, $page_number, $page_size, $order_by, $if_modified_since, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->fetchAllUsingGET4: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1ResultListResponseProfileV1TO_**](../Model/API1ResultListResponseProfileV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchProfileIconsUsingGET**
> \Swagger\Client\Model\API1ResultListResponseString_ fetchProfileIconsUsingGET($x_api_key, $x_app_api_key, $accept_language)

Fetches all supported profile icons.

This API is used for fetching all profile icons.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\ProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchProfileIconsUsingGET($x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->fetchProfileIconsUsingGET: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1ResultListResponseString_**](../Model/API1ResultListResponseString_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchProfileTypesUsingGET**
> \Swagger\Client\Model\API1ResultListResponseReferenceV1TO_ fetchProfileTypesUsingGET($x_api_key, $x_app_api_key, $accept_language)

Fetches all profileTypes

This API is used for fetching all profileTypes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\ProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchProfileTypesUsingGET($x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->fetchProfileTypesUsingGET: ', $e->getMessage(), PHP_EOL;
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

# **fetchUsingGET3**
> \Swagger\Client\Model\API1SingleResultResponseProfileV1TO_ fetchUsingGET3($id, $x_api_key, $x_app_api_key, $accept_language)

Fetch a specific profile

This API is used for fetching a specific profile by profileId.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\ProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchUsingGET3($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->fetchUsingGET3: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1SingleResultResponseProfileV1TO_**](../Model/API1SingleResultResponseProfileV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchWithCriteriaUsingPOST1**
> \Swagger\Client\Model\API1ResultListResponseProfileV1TO_ fetchWithCriteriaUsingPOST1($profiles, $minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language)

Fetch filtered profiles.

This API is used for fetching profiles that match a specific filter.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\ProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$profiles = new \Swagger\Client\Model\ProfileV1ListTO(); // \Swagger\Client\Model\ProfileV1ListTO | profiles
$minimal = false; // bool | minimal
$page_number = 1; // int | pageNumber
$page_size = 100; // int | pageSize
$order_by = array("name asc"); // string[] | orderBy
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchWithCriteriaUsingPOST1($profiles, $minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->fetchWithCriteriaUsingPOST1: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **profiles** | [**\Swagger\Client\Model\ProfileV1ListTO**](../Model/ProfileV1ListTO.md)| profiles |
 **minimal** | **bool**| minimal | [optional] [default to false]
 **page_number** | **int**| pageNumber | [optional] [default to 1]
 **page_size** | **int**| pageSize | [optional] [default to 100]
 **order_by** | [**string[]**](../Model/string.md)| orderBy | [optional] [default to name asc]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseProfileV1TO_**](../Model/API1ResultListResponseProfileV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **saveUsingPOST2**
> \Swagger\Client\Model\API1ResultListResponseProfileV1TO_ saveUsingPOST2($profiles, $x_api_key, $x_app_api_key, $accept_language)

Create one or more profiles.

This API is used for creating Profiles.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\ProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$profiles = new \Swagger\Client\Model\ProfileV1ListTO(); // \Swagger\Client\Model\ProfileV1ListTO | profiles
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->saveUsingPOST2($profiles, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->saveUsingPOST2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **profiles** | [**\Swagger\Client\Model\ProfileV1ListTO**](../Model/ProfileV1ListTO.md)| profiles |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseProfileV1TO_**](../Model/API1ResultListResponseProfileV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateUsingPUT2**
> \Swagger\Client\Model\API1SingleResultResponseProfileV1TO_ updateUsingPUT2($id, $profile_v1_to, $x_api_key, $x_app_api_key, $accept_language)

Updates a Profile

This API is used for updating a specific Profile.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\ProfileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$profile_v1_to = new \Swagger\Client\Model\ProfileV1TO(); // \Swagger\Client\Model\ProfileV1TO | profileV1TO
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->updateUsingPUT2($id, $profile_v1_to, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProfileApi->updateUsingPUT2: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| id |
 **profile_v1_to** | [**\Swagger\Client\Model\ProfileV1TO**](../Model/ProfileV1TO.md)| profileV1TO |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseProfileV1TO_**](../Model/API1SingleResultResponseProfileV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

