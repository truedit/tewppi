<?php
/**
 * ProfileApi
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

/**
 * ProfileApi Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ProfileApi
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
     * Operation fetchAllUsingGET8
     *
     * Fetches all profiles
     *
     * @param bool $minimal minimal (optional, default to false)
     * @param int $page_number pageNumber (optional, default to 1)
     * @param int $page_size pageSize (optional, default to 100)
     * @param string[] $order_by orderBy (optional, default to name asc)
     * @param string $if_modified_since If-Modified-Since (optional)
     * @param string $x_api_key  (optional)
     * @param string $x_app_api_key  (optional)
     * @param string $accept_language  (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return \Swagger\Client\Model\API1ResultListResponseProfileV1TO_
     */
    public function fetchAllUsingGET8($minimal = 'false', $page_number = '1', $page_size = '100', $order_by = 'name asc', $if_modified_since = null, $x_api_key = null, $x_app_api_key = null, $accept_language = null)
    {
        list($response) = $this->fetchAllUsingGET8WithHttpInfo($minimal, $page_number, $page_size, $order_by, $if_modified_since, $x_api_key, $x_app_api_key, $accept_language);
        return $response;
    }

    /**
     * Operation fetchAllUsingGET8WithHttpInfo
     *
     * Fetches all profiles
     *
     * @param bool $minimal minimal (optional, default to false)
     * @param int $page_number pageNumber (optional, default to 1)
     * @param int $page_size pageSize (optional, default to 100)
     * @param string[] $order_by orderBy (optional, default to name asc)
     * @param string $if_modified_since If-Modified-Since (optional)
     * @param string $x_api_key  (optional)
     * @param string $x_app_api_key  (optional)
     * @param string $accept_language  (optional)
     * @throws \Swagger\Client\ApiException on non-2xx response
     * @return array of \Swagger\Client\Model\API1ResultListResponseProfileV1TO_, HTTP status code, HTTP response headers (array of strings)
     */
    public function fetchAllUsingGET8WithHttpInfo($minimal = 'false', $page_number = '1', $page_size = '100', $order_by = 'name asc', $if_modified_since = null, $x_api_key = null, $x_app_api_key = null, $accept_language = null)
    {
        // parse inputs
        $resourcePath = "/1/profile";
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
        if ($minimal !== null) {
            $queryParams['minimal'] = $this->apiClient->getSerializer()->toQueryValue($minimal);
        }
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
        if ($if_modified_since !== null) {
            $headerParams['If-Modified-Since'] = $this->apiClient->getSerializer()->toHeaderValue($if_modified_since);
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

        if (count($formParams) > 0) {
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
                '\Swagger\Client\Model\API1ResultListResponseProfileV1TO_',
                '/1/profile'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\Swagger\Client\Model\API1ResultListResponseProfileV1TO_', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\Swagger\Client\Model\API1ResultListResponseProfileV1TO_', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}