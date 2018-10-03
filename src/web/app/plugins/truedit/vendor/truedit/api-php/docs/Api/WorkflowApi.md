# Swagger\Client\WorkflowApi

All URIs are relative to *https://tech.truedit.com/api*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createNewWorkflowsUsingPOST**](WorkflowApi.md#createNewWorkflowsUsingPOST) | **POST** /1/workflow | Create one or more Workflows
[**createTransitionsUsingPOST**](WorkflowApi.md#createTransitionsUsingPOST) | **POST** /1/workflow/{workflowID}/status/{statusID}/transition | Create Transitions of one specified Applied Status of a specified Workflow.
[**createWorkstepsUsingPOST**](WorkflowApi.md#createWorkstepsUsingPOST) | **POST** /1/workflow/{workflowID}/status | Create one or more Applied Statuses in a specified Workflow
[**deleteOneTransitionUsingDELETE**](WorkflowApi.md#deleteOneTransitionUsingDELETE) | **DELETE** /1/workflow/{workflowID}/status/{statusID}/transition/{destinationID} | Delete one Transition of one specified Applied Status of a specified Workflow.
[**deleteOneWorkstepUsingDELETE**](WorkflowApi.md#deleteOneWorkstepUsingDELETE) | **DELETE** /1/workflow/{workflowID}/status/{statusID} | Delete one Applied Status in a specified Workflow
[**fetchAllWorkflowsUsingGET**](WorkflowApi.md#fetchAllWorkflowsUsingGET) | **GET** /1/workflow | Fetch all available Workflow objects
[**fetchAppliedStatusesOfWorkflowUsingGET**](WorkflowApi.md#fetchAppliedStatusesOfWorkflowUsingGET) | **GET** /1/workflow/{workflowID}/status | Fetch the Applied Status objects that belong to a specified Workflow.
[**fetchOneAppliedStatusOfWorkflowUsingGET**](WorkflowApi.md#fetchOneAppliedStatusOfWorkflowUsingGET) | **GET** /1/workflow/{workflowID}/status/{statusID} | Fetch one Applied Status object that belongs to a specified Workflow, specified by Status ID.
[**fetchOneTransitionUsingGET**](WorkflowApi.md#fetchOneTransitionUsingGET) | **GET** /1/workflow/{workflowID}/status/{statusID}/transition/{destinationID} | Fetch one Transition of one specified Applied Status of a specified Workflow.
[**fetchOneWorkflowUsingGET**](WorkflowApi.md#fetchOneWorkflowUsingGET) | **GET** /1/workflow/{id} | Fetch a single Workflow object
[**fetchTransitionsOfOneAppliedStatusUsingGET**](WorkflowApi.md#fetchTransitionsOfOneAppliedStatusUsingGET) | **GET** /1/workflow/{workflowID}/status/{statusID}/transition | Fetch the Transitions from one specified Applied Status of a specified Workflow.
[**updateOneWorkflowUsingPUT**](WorkflowApi.md#updateOneWorkflowUsingPUT) | **PUT** /1/workflow/{id} | Update one Workflow
[**updateOneWorkstepUsingPUT**](WorkflowApi.md#updateOneWorkstepUsingPUT) | **PUT** /1/workflow/{workflowID}/status/{statusID} | Update one Applied Status in a specified Workflow


# **createNewWorkflowsUsingPOST**
> \Swagger\Client\Model\API1ResultListResponseWorkflowV1TO_ createNewWorkflowsUsingPOST($new_workflows, $x_api_key, $x_app_api_key, $accept_language)

Create one or more Workflows

This API is used for creating Workflows.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$new_workflows = new \Swagger\Client\Model\WorkflowV1ListTO(); // \Swagger\Client\Model\WorkflowV1ListTO | newWorkflows
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->createNewWorkflowsUsingPOST($new_workflows, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->createNewWorkflowsUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **new_workflows** | [**\Swagger\Client\Model\WorkflowV1ListTO**](../Model/WorkflowV1ListTO.md)| newWorkflows |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseWorkflowV1TO_**](../Model/API1ResultListResponseWorkflowV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createTransitionsUsingPOST**
> \Swagger\Client\Model\API1ResultListResponseTransitionV1TO_ createTransitionsUsingPOST($workflow_id, $status_id, $incoming_transitions, $x_api_key, $x_app_api_key, $accept_language)

Create Transitions of one specified Applied Status of a specified Workflow.

This API is used for creating Transitions of an Applied Status of a Workflow.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$workflow_id = 789; // int | workflowID
$status_id = 789; // int | statusID
$incoming_transitions = new \Swagger\Client\Model\TransitionV1ListTO(); // \Swagger\Client\Model\TransitionV1ListTO | incomingTransitions
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->createTransitionsUsingPOST($workflow_id, $status_id, $incoming_transitions, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->createTransitionsUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **workflow_id** | **int**| workflowID |
 **status_id** | **int**| statusID |
 **incoming_transitions** | [**\Swagger\Client\Model\TransitionV1ListTO**](../Model/TransitionV1ListTO.md)| incomingTransitions |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseTransitionV1TO_**](../Model/API1ResultListResponseTransitionV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createWorkstepsUsingPOST**
> \Swagger\Client\Model\API1ResultListResponseAppliedStatusV1TO_ createWorkstepsUsingPOST($workflow_id, $incoming_worksteps, $x_api_key, $x_app_api_key, $accept_language)

Create one or more Applied Statuses in a specified Workflow

This API is used for creating Applied Statuses in Workflows.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$workflow_id = 789; // int | workflowID
$incoming_worksteps = new \Swagger\Client\Model\AppliedStatusV1ListTO(); // \Swagger\Client\Model\AppliedStatusV1ListTO | incomingWorksteps
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->createWorkstepsUsingPOST($workflow_id, $incoming_worksteps, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->createWorkstepsUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **workflow_id** | **int**| workflowID |
 **incoming_worksteps** | [**\Swagger\Client\Model\AppliedStatusV1ListTO**](../Model/AppliedStatusV1ListTO.md)| incomingWorksteps |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseAppliedStatusV1TO_**](../Model/API1ResultListResponseAppliedStatusV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteOneTransitionUsingDELETE**
> \Swagger\Client\Model\API1ResponseMessage deleteOneTransitionUsingDELETE($workflow_id, $status_id, $destination_id, $x_api_key, $x_app_api_key, $accept_language)

Delete one Transition of one specified Applied Status of a specified Workflow.

This API is used for deleting a Transition of an Applied Status of a Workflow.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$workflow_id = 789; // int | workflowID
$status_id = 789; // int | statusID
$destination_id = 789; // int | destinationID
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->deleteOneTransitionUsingDELETE($workflow_id, $status_id, $destination_id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->deleteOneTransitionUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **workflow_id** | **int**| workflowID |
 **status_id** | **int**| statusID |
 **destination_id** | **int**| destinationID |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResponseMessage**](../Model/API1ResponseMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteOneWorkstepUsingDELETE**
> \Swagger\Client\Model\API1ResponseMessage deleteOneWorkstepUsingDELETE($workflow_id, $status_id, $x_api_key, $x_app_api_key, $accept_language)

Delete one Applied Status in a specified Workflow

This API is used for deleting an Applied Status in a Workflow.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$workflow_id = 789; // int | workflowID
$status_id = 789; // int | statusID
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->deleteOneWorkstepUsingDELETE($workflow_id, $status_id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->deleteOneWorkstepUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **workflow_id** | **int**| workflowID |
 **status_id** | **int**| statusID |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResponseMessage**](../Model/API1ResponseMessage.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchAllWorkflowsUsingGET**
> \Swagger\Client\Model\API1ResultListResponseWorkflowV1TO_ fetchAllWorkflowsUsingGET($minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language, $if_modified_since)

Fetch all available Workflow objects

This API is used for fetching all available Workflow objects.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
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
    $result = $apiInstance->fetchAllWorkflowsUsingGET($minimal, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language, $if_modified_since);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->fetchAllWorkflowsUsingGET: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1ResultListResponseWorkflowV1TO_**](../Model/API1ResultListResponseWorkflowV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchAppliedStatusesOfWorkflowUsingGET**
> \Swagger\Client\Model\API1ResultListResponseAppliedStatusV1TO_ fetchAppliedStatusesOfWorkflowUsingGET($workflow_id, $minimal, $x_api_key, $x_app_api_key, $accept_language)

Fetch the Applied Status objects that belong to a specified Workflow.

This API is used for fetching the Applied Statuses of a Workflow.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$workflow_id = 789; // int | workflowID
$minimal = false; // bool | minimal
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchAppliedStatusesOfWorkflowUsingGET($workflow_id, $minimal, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->fetchAppliedStatusesOfWorkflowUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **workflow_id** | **int**| workflowID |
 **minimal** | **bool**| minimal | [optional] [default to false]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseAppliedStatusV1TO_**](../Model/API1ResultListResponseAppliedStatusV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchOneAppliedStatusOfWorkflowUsingGET**
> \Swagger\Client\Model\API1SingleResultResponseAppliedStatusV1TO_ fetchOneAppliedStatusOfWorkflowUsingGET($workflow_id, $status_id, $minimal, $x_api_key, $x_app_api_key, $accept_language)

Fetch one Applied Status object that belongs to a specified Workflow, specified by Status ID.

This API is used for fetching a single Applied Statuses of a Workflow by Status ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$workflow_id = 789; // int | workflowID
$status_id = 789; // int | statusID
$minimal = false; // bool | minimal
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchOneAppliedStatusOfWorkflowUsingGET($workflow_id, $status_id, $minimal, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->fetchOneAppliedStatusOfWorkflowUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **workflow_id** | **int**| workflowID |
 **status_id** | **int**| statusID |
 **minimal** | **bool**| minimal | [optional] [default to false]
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseAppliedStatusV1TO_**](../Model/API1SingleResultResponseAppliedStatusV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchOneTransitionUsingGET**
> \Swagger\Client\Model\API1SingleResultResponseTransitionV1TO_ fetchOneTransitionUsingGET($workflow_id, $status_id, $destination_id, $x_api_key, $x_app_api_key, $accept_language)

Fetch one Transition of one specified Applied Status of a specified Workflow.

This API is used for fetching a Transition of an Applied Status of a Workflow.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$workflow_id = 789; // int | workflowID
$status_id = 789; // int | statusID
$destination_id = 789; // int | destinationID
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchOneTransitionUsingGET($workflow_id, $status_id, $destination_id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->fetchOneTransitionUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **workflow_id** | **int**| workflowID |
 **status_id** | **int**| statusID |
 **destination_id** | **int**| destinationID |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseTransitionV1TO_**](../Model/API1SingleResultResponseTransitionV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchOneWorkflowUsingGET**
> \Swagger\Client\Model\API1SingleResultResponseWorkflowV1TO_ fetchOneWorkflowUsingGET($id, $x_api_key, $x_app_api_key, $accept_language)

Fetch a single Workflow object

This API is used for fetching a single Workflow object specified by its ID.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchOneWorkflowUsingGET($id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->fetchOneWorkflowUsingGET: ', $e->getMessage(), PHP_EOL;
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

[**\Swagger\Client\Model\API1SingleResultResponseWorkflowV1TO_**](../Model/API1SingleResultResponseWorkflowV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **fetchTransitionsOfOneAppliedStatusUsingGET**
> \Swagger\Client\Model\API1ResultListResponseTransitionV1TO_ fetchTransitionsOfOneAppliedStatusUsingGET($workflow_id, $status_id, $x_api_key, $x_app_api_key, $accept_language)

Fetch the Transitions from one specified Applied Status of a specified Workflow.

This API is used for fetching the Transitions of an Applied Status of a Workflow.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$workflow_id = 789; // int | workflowID
$status_id = 789; // int | statusID
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->fetchTransitionsOfOneAppliedStatusUsingGET($workflow_id, $status_id, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->fetchTransitionsOfOneAppliedStatusUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **workflow_id** | **int**| workflowID |
 **status_id** | **int**| statusID |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1ResultListResponseTransitionV1TO_**](../Model/API1ResultListResponseTransitionV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateOneWorkflowUsingPUT**
> \Swagger\Client\Model\API1SingleResultResponseWorkflowV1TO_ updateOneWorkflowUsingPUT($id, $updated_workflow, $x_api_key, $x_app_api_key, $accept_language)

Update one Workflow

This API is used for updating Workflow objects.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = 789; // int | id
$updated_workflow = new \Swagger\Client\Model\WorkflowV1TO(); // \Swagger\Client\Model\WorkflowV1TO | updatedWorkflow
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->updateOneWorkflowUsingPUT($id, $updated_workflow, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->updateOneWorkflowUsingPUT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **int**| id |
 **updated_workflow** | [**\Swagger\Client\Model\WorkflowV1TO**](../Model/WorkflowV1TO.md)| updatedWorkflow |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseWorkflowV1TO_**](../Model/API1SingleResultResponseWorkflowV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateOneWorkstepUsingPUT**
> \Swagger\Client\Model\API1SingleResultResponseAppliedStatusV1TO_ updateOneWorkstepUsingPUT($workflow_id, $status_id, $incoming_workstep, $x_api_key, $x_app_api_key, $accept_language)

Update one Applied Status in a specified Workflow

This API is used for updating an Applied Status in a Workflow.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Swagger\Client\Api\WorkflowApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$workflow_id = 789; // int | workflowID
$status_id = 789; // int | statusID
$incoming_workstep = new \Swagger\Client\Model\AppliedStatusV1TO(); // \Swagger\Client\Model\AppliedStatusV1TO | incomingWorkstep
$x_api_key = "x_api_key_example"; // string | 
$x_app_api_key = "x_app_api_key_example"; // string | 
$accept_language = "accept_language_example"; // string | 

try {
    $result = $apiInstance->updateOneWorkstepUsingPUT($workflow_id, $status_id, $incoming_workstep, $x_api_key, $x_app_api_key, $accept_language);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkflowApi->updateOneWorkstepUsingPUT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **workflow_id** | **int**| workflowID |
 **status_id** | **int**| statusID |
 **incoming_workstep** | [**\Swagger\Client\Model\AppliedStatusV1TO**](../Model/AppliedStatusV1TO.md)| incomingWorkstep |
 **x_api_key** | **string**|  | [optional]
 **x_app_api_key** | **string**|  | [optional]
 **accept_language** | **string**|  | [optional]

### Return type

[**\Swagger\Client\Model\API1SingleResultResponseAppliedStatusV1TO_**](../Model/API1SingleResultResponseAppliedStatusV1TO_.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

