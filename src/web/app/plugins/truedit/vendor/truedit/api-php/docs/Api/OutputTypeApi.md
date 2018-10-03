# Swagger\Client\OutputTypeApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**fetchOutputTypesUsingGET**](OutputTypeApi.md#fetchOutputTypesUsingGET) | **GET** /1/outputType | Fetches all OutputTypes


# **fetchOutputTypesUsingGET**
> \Swagger\Client\Model\API1ResultListResponseOutputTypeV1TO_ fetchOutputTypesUsingGET($x_api_key, $x_app_api_key, $accept_language, $if_modified_since)

Fetches all OutputTypes

This API is used for fetching all OutputTypes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\OutputTypeApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 
$if_modified_since = new \DateTime("2013-10-20"); // \DateTime | 

try {
    $result = $apiInstance->fetchOutputTypesUsingGET($x_api_key, $x_app_api_key, $accept_language, $if_modified_since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OutputTypeApi->fetchOutputTypesUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]
 **if_modified_since** | **\DateTime**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseOutputTypeV1TO_**](../Model/API1ResultListResponseOutputTypeV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

