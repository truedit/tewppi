<?php
/**
 * PreviewApi
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * getNEXT REST API
 *
 * Welcome to the getNEXT Platform REST API Reference! You can use this REST API to develop integrations between getNEXT and other applications or script interactions with getNEXT.
 *
 * OpenAPI spec version: 1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Api;

use \Swagger\Client\ApiClient;
use \Swagger\Client\ApiException;
use \Swagger\Client\Configuration;
use \Swagger\Client\ObjectSerializer;

/**
 * PreviewApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PreviewApi
{
    /**
     * API Client
     *
     * @var \Swagger\Client\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \Swagger\Client\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\Swagger\Client\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \Swagger\Client\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \Swagger\Client\ApiClient $apiClient set the API client
     *
     * @return PreviewApi
     */
    public function setApiClient(\Swagger\Client\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation addPreviewUsingPOST
     *
     * Add a Preview image for a specified Job's current Revision
     *
     * @param int $job_id jobID (required)
     * @param \SplFileObject $file file (required)
     * @param int $kind kind (required)
     * @param int $page_number pageNumber (optional)
     * @param string $page_label pageLabel (optional)
     * @param string $section section (optional)
     * @param int $width width (optional)
     * @param int $height height (optional)
     * @param string $compression compression (optional)
     * @param string $x_api_key  (optional)
     * @param string $x_app_api_key  (optional)
     * @param string $accept_language  (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\API1SingleResultResponsePreviewV1TO_
     */
    public function addPreviewUsingPOST($job_id, $file, $kind, $page_number = null, $page_label = null, $section = null, $width = null, $height = null, $compression = null, $x_api_key = null, $x_app_api_key = null, $accept_language = null)
    {
        list($response) = $this->addPreviewUsingPOSTWithHttpInfo($job_id, $file, $kind, $page_number, $page_label, $section, $width, $height, $compression, $x_api_key, $x_app_api_key, $accept_language);
        return $response;
    }

    /**
     * Operation addPreviewUsingPOSTWithHttpInfo
     *
     * Add a Preview image for a specified Job's current Revision
     *
     * @param int $job_id jobID (required)
     * @param \SplFileObject $file file (required)
     * @param int $kind kind (required)
     * @param int $page_number pageNumber (optional)
     * @param string $page_label pageLabel (optional)
     * @param string $section section (optional)
     * @param int $width width (optional)
     * @param int $height height (optional)
     * @param string $compression compression (optional)
     * @param string $x_api_key  (optional)
     * @param string $x_app_api_key  (optional)
     * @param string $accept_language  (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\API1SingleResultResponsePreviewV1TO_, HTTP status code, HTTP response headers (array of strings)
     */
    public function addPreviewUsingPOSTWithHttpInfo($job_id, $file, $kind, $page_number = null, $page_label = null, $section = null, $width = null, $height = null, $compression = null, $x_api_key = null, $x_app_api_key = null, $accept_language = null)
    {
        // verify the required parameter 'job_id' is set
        if ($job_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $job_id when calling addPreviewUsingPOST');
        }
        // verify the required parameter 'file' is set
        if ($file === null) {
            throw new \InvalidArgumentException('Missing the required parameter $file when calling addPreviewUsingPOST');
        }
        // verify the required parameter 'kind' is set
        if ($kind === null) {
            throw new \InvalidArgumentException('Missing the required parameter $kind when calling addPreviewUsingPOST');
        }
        // parse inputs
        $resourcePath = "/1/job/{jobID}/preview";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['*/*']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['multipart/form-data']);

        // query params
        if ($kind !== null) {
            $queryParams['kind'] = $this->apiClient->getSerializer()->toQueryValue($kind);
        }
        // query params
        if ($page_number !== null) {
            $queryParams['pageNumber'] = $this->apiClient->getSerializer()->toQueryValue($page_number);
        }
        // query params
        if ($page_label !== null) {
            $queryParams['pageLabel'] = $this->apiClient->getSerializer()->toQueryValue($page_label);
        }
        // query params
        if ($section !== null) {
            $queryParams['section'] = $this->apiClient->getSerializer()->toQueryValue($section);
        }
        // query params
        if ($width !== null) {
            $queryParams['width'] = $this->apiClient->getSerializer()->toQueryValue($width);
        }
        // query params
        if ($height !== null) {
            $queryParams['height'] = $this->apiClient->getSerializer()->toQueryValue($height);
        }
        // query params
        if ($compression !== null) {
            $queryParams['compression'] = $this->apiClient->getSerializer()->toQueryValue($compression);
        }
        // header params
        if ($x_api_key !== null) {
            $headerParams['x-api-key'] = $this->apiClient->getSerializer()->toHeaderValue($x_api_key);
        }
        // header params
        if ($x_app_api_key !== null) {
            $headerParams['x-app-api-key'] = $this->apiClient->getSerializer()->toHeaderValue($x_app_api_key);
        }
        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = $this->apiClient->getSerializer()->toHeaderValue($accept_language);
        }
        // path params
        if ($job_id !== null) {
            $resourcePath = str_replace(
                "{" . "jobID" . "}",
                $this->apiClient->getSerializer()->toPathValue($job_id),
                $resourcePath
            );
        }
        // form params
        if ($file !== null) {
            // PHP 5.5 introduced a CurlFile object that deprecates the old @filename syntax
            // See: https://wiki.php.net/rfc/curl-file-upload
            if (function_exists('curl_file_create')) {
                $formParams['file'] = curl_file_create($this->apiClient->getSerializer()->toFormValue($file));
            } else {
                $formParams['file'] = '@' . $this->apiClient->getSerializer()->toFormValue($file);
            }
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\API1SingleResultResponsePreviewV1TO_',
                '/1/job/{jobID}/preview'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\API1SingleResultResponsePreviewV1TO_', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\API1SingleResultResponsePreviewV1TO_', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getPreviewsForCurrentRevisionUsingGET
     *
     * Fetch information about the Previews of a specified Job's current Revision.
     *
     * @param int $job_id jobID (required)
     * @param int $page_number pageNumber (optional, default to 1)
     * @param int $page_size pageSize (optional, default to 100)
     * @param string[] $order_by orderBy (optional, default to previewKind asc,pageNumber asc)
     * @param string $x_api_key  (optional)
     * @param string $x_app_api_key  (optional)
     * @param string $accept_language  (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\API1ResultListResponsePreviewV1TO_
     */
    public function getPreviewsForCurrentRevisionUsingGET($job_id, $page_number = '1', $page_size = '100', $order_by = 'previewKind asc,pageNumber asc', $x_api_key = null, $x_app_api_key = null, $accept_language = null)
    {
        list($response) = $this->getPreviewsForCurrentRevisionUsingGETWithHttpInfo($job_id, $page_number, $page_size, $order_by, $x_api_key, $x_app_api_key, $accept_language);
        return $response;
    }

    /**
     * Operation getPreviewsForCurrentRevisionUsingGETWithHttpInfo
     *
     * Fetch information about the Previews of a specified Job's current Revision.
     *
     * @param int $job_id jobID (required)
     * @param int $page_number pageNumber (optional, default to 1)
     * @param int $page_size pageSize (optional, default to 100)
     * @param string[] $order_by orderBy (optional, default to previewKind asc,pageNumber asc)
     * @param string $x_api_key  (optional)
     * @param string $x_app_api_key  (optional)
     * @param string $accept_language  (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\API1ResultListResponsePreviewV1TO_, HTTP status code, HTTP response headers (array of strings)
     */
    public function getPreviewsForCurrentRevisionUsingGETWithHttpInfo($job_id, $page_number = '1', $page_size = '100', $order_by = 'previewKind asc,pageNumber asc', $x_api_key = null, $x_app_api_key = null, $accept_language = null)
    {
        // verify the required parameter 'job_id' is set
        if ($job_id === null) {
            throw new \InvalidArgumentException('Missing the required parameter $job_id when calling getPreviewsForCurrentRevisionUsingGET');
        }
        // parse inputs
        $resourcePath = "/1/job/{jobID}/preview";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['*/*']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType([]);

        // query params
        if ($page_number !== null) {
            $queryParams['pageNumber'] = $this->apiClient->getSerializer()->toQueryValue($page_number);
        }
        // query params
        if ($page_size !== null) {
            $queryParams['pageSize'] = $this->apiClient->getSerializer()->toQueryValue($page_size);
        }
        // query params
        if (is_array($order_by)) {
            $order_by = $this->apiClient->getSerializer()->serializeCollection($order_by, 'multi', true);
        }
        if ($order_by !== null) {
            $queryParams['orderBy'] = $this->apiClient->getSerializer()->toQueryValue($order_by);
        }
        // header params
        if ($x_api_key !== null) {
            $headerParams['x-api-key'] = $this->apiClient->getSerializer()->toHeaderValue($x_api_key);
        }
        // header params
        if ($x_app_api_key !== null) {
            $headerParams['x-app-api-key'] = $this->apiClient->getSerializer()->toHeaderValue($x_app_api_key);
        }
        // header params
        if ($accept_language !== null) {
            $headerParams['Accept-Language'] = $this->apiClient->getSerializer()->toHeaderValue($accept_language);
        }
        // path params
        if ($job_id !== null) {
            $resourcePath = str_replace(
                "{" . "jobID" . "}",
                $this->apiClient->getSerializer()->toPathValue($job_id),
                $resourcePath
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\Swagger\Client\Model\API1ResultListResponsePreviewV1TO_',
                '/1/job/{jobID}/preview'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\API1ResultListResponsePreviewV1TO_', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\API1ResultListResponsePreviewV1TO_', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}
