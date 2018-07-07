# Swagger\Client\SystemInfoApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**verifyTokenUsingPOST**](SystemInfoApi.md#verifyTokenUsingPOST) | **POST** /1/info/verifytoken | verifyToken


# **verifyTokenUsingPOST**
> \Swagger\Client\Model\API1ResponseMessage verifyTokenUsingPOST($token)

verifyToken

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\SystemInfoApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$token = "token_example"; // string | token

try {
    $result = $apiInstance->verifyTokenUsingPOST($token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling SystemInfoApi->verifyTokenUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **token** | **string**| token |

### Return type

[**\Swagger\Client\Model\API1ResponseMessage**](../Model/API1ResponseMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

