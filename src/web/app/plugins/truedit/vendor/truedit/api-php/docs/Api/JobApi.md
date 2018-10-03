# Swagger\Client\JobApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**fetchAllUsingGET3**](JobApi.md#fetchAllUsingGET3) | **GET** /1/job/{jobID}/revision | Fetch all available Revision objects for a Job.
[**fetchOneUsingGET**](JobApi.md#fetchOneUsingGET) | **GET** /1/job/{jobID}/revision/{revID} | Fetch a single specicified Revision from a specified Job.
[**retrieveJobWorkingFileUsingGET1**](JobApi.md#retrieveJobWorkingFileUsingGET1) | **GET** /1/job/{jobID}/workingFile | Fetch the working file for a specific job


# **fetchAllUsingGET3**
> \Swagger\Client\Model\API1ResultListResponseRevisionV1TO_ fetchAllUsingGET3($job_id, $minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language)

Fetch all available Revision objects for a Job.

This API is used for fetching all available Revision objects for a Job.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\JobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$job_id = 789; // int | jobID
$minimal = false; // bool | minimal
$page_number = 1; // int | pageNumber
$page_size = 100; // int | pageSize
$order_by = array("name asc"); // string[] | orderBy
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchAllUsingGET3($job_id, $minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobApi->fetchAllUsingGET3: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **job_id** | **int**| jobID |
 **minimal** | **bool**| minimal | [optional] [default to false]
 **page_number** | **int**| pageNumber | [optional] [default to 1]
 **page_size** | **int**| pageSize | [optional] [default to 100]
 **order_by** | [**string[]**](../Model/string.md)| orderBy | [optional] [default to name asc]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseRevisionV1TO_**](../Model/API1ResultListResponseRevisionV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchOneUsingGET**
> \Swagger\Client\Model\API1SingleResultResponseRevisionV1TO_ fetchOneUsingGET($job_id, $rev_id, $x_api_key, $x_app_api_key, $accept_language)

Fetch a single specicified Revision from a specified Job.

This API is used for fetching one Revision object for a Job.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\JobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$job_id = 789; // int | jobID
$rev_id = 789; // int | revID
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchOneUsingGET($job_id, $rev_id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling JobApi->fetchOneUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **job_id** | **int**| jobID |
 **rev_id** | **int**| revID |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseRevisionV1TO_**](../Model/API1SingleResultResponseRevisionV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **retrieveJobWorkingFileUsingGET1**
> retrieveJobWorkingFileUsingGET1($job_id, $dl, $version, $x_api_key, $x_app_api_key, $accept_language)

Fetch the working file for a specific job

This API is used for fetching the working file for a specific job by jobId.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\JobApi(
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
    $apiInstance->retrieveJobWorkingFileUsingGET1($job_id, $dl, $version, $x_api_key, $x_app_api_key, $accept_language);
} catch (Exception $e) {
    echo 'Exception when calling JobApi->retrieveJobWorkingFileUsingGET1: ', $e->getMessage(), PHP_EOL;
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

