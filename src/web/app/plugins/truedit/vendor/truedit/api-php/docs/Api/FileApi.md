# Swagger\Client\FileApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**retrieveFileUsingGET**](FileApi.md#retrieveFileUsingGET) | **GET** /1/file/{id} | Fetch a specific file
[**retrieveJobOutputFileUsingGET**](FileApi.md#retrieveJobOutputFileUsingGET) | **GET** /1/file/job/{jobID}/outputType/{outputTypeID} | Fetch a specific output file for a specific job
[**retrieveJobWorkingFileUsingGET**](FileApi.md#retrieveJobWorkingFileUsingGET) | **GET** /1/file/job/{jobID} | Fetch the working file for a specific job


# **retrieveFileUsingGET**
> retrieveFileUsingGET($id, $dl, $x_api_key, $x_app_api_key, $accept_language)

Fetch a specific file

This API is used for fetching a file by fileId.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\FileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$dl = false; // bool | dl
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $apiInstance->retrieveFileUsingGET($id, $dl, $x_api_key, $x_app_api_key, $accept_language);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->retrieveFileUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| id |
 **dl** | **bool**| dl | [optional] [default to false]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveJobOutputFileUsingGET**
> retrieveJobOutputFileUsingGET($job_id, $output_type_id, $dl, $x_api_key, $x_app_api_key, $accept_language)

Fetch a specific output file for a specific job

This API is used for fetching a specific output file by outputTypeId for a specific job by jobId.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\FileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$job_id = 789; // int | jobID
$output_type_id = 789; // int | outputTypeID
$dl = false; // bool | dl
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $apiInstance->retrieveJobOutputFileUsingGET($job_id, $output_type_id, $dl, $x_api_key, $x_app_api_key, $accept_language);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->retrieveJobOutputFileUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **job_id** | **int**| jobID |
 **output_type_id** | **int**| outputTypeID |
 **dl** | **bool**| dl | [optional] [default to false]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveJobWorkingFileUsingGET**
> retrieveJobWorkingFileUsingGET($job_id, $dl, $version, $x_api_key, $x_app_api_key, $accept_language)

Fetch the working file for a specific job

This API is used for fetching the working file for a specific job by jobId.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\FileApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$job_id = 789; // int | jobID
$dl = false; // bool | dl
$version = "version_example"; // string | version
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $apiInstance->retrieveJobWorkingFileUsingGET($job_id, $dl, $version, $x_api_key, $x_app_api_key, $accept_language);
} catch (Exception $e) {
    echo 'Exception when calling FileApi->retrieveJobWorkingFileUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **job_id** | **int**| jobID |
 **dl** | **bool**| dl | [optional] [default to false]
 **version** | **string**| version | [optional]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

