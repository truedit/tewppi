<?php
/**
 * API1ResultListResponseJobLogEntryV1TO_
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swaagger Codegen team
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

namespace Swagger\Client\Model;

use \ArrayAccess;

/**
 * API1ResultListResponseJobLogEntryV1TO_ Class Doc Comment
 *
 * @category    Class
 * @description Describes a warning that occurred during an API call, usually one that supports multiple operations and partial success.
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class API1ResultListResponseJobLogEntryV1TO_ implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'API1ResultListResponse«JobLogEntryV1TO»';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'developer_message' => 'string',
        'error_message' => 'string',
        'more_info' => 'string',
        'page_number' => 'int',
        'page_size' => 'int',
        'results' => '\Swagger\Client\Model\JobLogEntryV1TO[]',
        'status_code' => 'int',
        'total_items' => 'int',
        'warnings' => '\Swagger\Client\Model\WarningInfo[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'developer_message' => null,
        'error_message' => null,
        'more_info' => null,
        'page_number' => 'int32',
        'page_size' => 'int32',
        'results' => null,
        'status_code' => 'int32',
        'total_items' => 'int32',
        'warnings' => null
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'developer_message' => 'developerMessage',
        'error_message' => 'errorMessage',
        'more_info' => 'moreInfo',
        'page_number' => 'pageNumber',
        'page_size' => 'pageSize',
        'results' => 'results',
        'status_code' => 'statusCode',
        'total_items' => 'totalItems',
        'warnings' => 'warnings'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'developer_message' => 'setDeveloperMessage',
        'error_message' => 'setErrorMessage',
        'more_info' => 'setMoreInfo',
        'page_number' => 'setPageNumber',
        'page_size' => 'setPageSize',
        'results' => 'setResults',
        'status_code' => 'setStatusCode',
        'total_items' => 'setTotalItems',
        'warnings' => 'setWarnings'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'developer_message' => 'getDeveloperMessage',
        'error_message' => 'getErrorMessage',
        'more_info' => 'getMoreInfo',
        'page_number' => 'getPageNumber',
        'page_size' => 'getPageSize',
        'results' => 'getResults',
        'status_code' => 'getStatusCode',
        'total_items' => 'getTotalItems',
        'warnings' => 'getWarnings'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['developer_message'] = isset($data['developer_message']) ? $data['developer_message'] : null;
        $this->container['error_message'] = isset($data['error_message']) ? $data['error_message'] : null;
        $this->container['more_info'] = isset($data['more_info']) ? $data['more_info'] : null;
        $this->container['page_number'] = isset($data['page_number']) ? $data['page_number'] : null;
        $this->container['page_size'] = isset($data['page_size']) ? $data['page_size'] : null;
        $this->container['results'] = isset($data['results']) ? $data['results'] : null;
        $this->container['status_code'] = isset($data['status_code']) ? $data['status_code'] : null;
        $this->container['total_items'] = isset($data['total_items']) ? $data['total_items'] : null;
        $this->container['warnings'] = isset($data['warnings']) ? $data['warnings'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];

        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {

        return true;
    }


    /**
     * Gets developer_message
     * @return string
     */
    public function getDeveloperMessage()
    {
        return $this->container['developer_message'];
    }

    /**
     * Sets developer_message
     * @param string $developer_message a more technical error message intended for the developer of the client, not the end-user, if available.
     * @return $this
     */
    public function setDeveloperMessage($developer_message)
    {
        $this->container['developer_message'] = $developer_message;

        return $this;
    }

    /**
     * Gets error_message
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->container['error_message'];
    }

    /**
     * Sets error_message
     * @param string $error_message A message describing the error condition, if not success. Intended for end users.
     * @return $this
     */
    public function setErrorMessage($error_message)
    {
        $this->container['error_message'] = $error_message;

        return $this;
    }

    /**
     * Gets more_info
     * @return string
     */
    public function getMoreInfo()
    {
        return $this->container['more_info'];
    }

    /**
     * Sets more_info
     * @param string $more_info A URL to documentation about the error code, if available, intended for the developer of the client.
     * @return $this
     */
    public function setMoreInfo($more_info)
    {
        $this->container['more_info'] = $more_info;

        return $this;
    }

    /**
     * Gets page_number
     * @return int
     */
    public function getPageNumber()
    {
        return $this->container['page_number'];
    }

    /**
     * Sets page_number
     * @param int $page_number
     * @return $this
     */
    public function setPageNumber($page_number)
    {
        $this->container['page_number'] = $page_number;

        return $this;
    }

    /**
     * Gets page_size
     * @return int
     */
    public function getPageSize()
    {
        return $this->container['page_size'];
    }

    /**
     * Sets page_size
     * @param int $page_size
     * @return $this
     */
    public function setPageSize($page_size)
    {
        $this->container['page_size'] = $page_size;

        return $this;
    }

    /**
     * Gets results
     * @return \Swagger\Client\Model\JobLogEntryV1TO[]
     */
    public function getResults()
    {
        return $this->container['results'];
    }

    /**
     * Sets results
     * @param \Swagger\Client\Model\JobLogEntryV1TO[] $results
     * @return $this
     */
    public function setResults($results)
    {
        $this->container['results'] = $results;

        return $this;
    }

    /**
     * Gets status_code
     * @return int
     */
    public function getStatusCode()
    {
        return $this->container['status_code'];
    }

    /**
     * Sets status_code
     * @param int $status_code A status or error code that suggests what may have been wrong.
     * @return $this
     */
    public function setStatusCode($status_code)
    {
        $this->container['status_code'] = $status_code;

        return $this;
    }

    /**
     * Gets total_items
     * @return int
     */
    public function getTotalItems()
    {
        return $this->container['total_items'];
    }

    /**
     * Sets total_items
     * @param int $total_items
     * @return $this
     */
    public function setTotalItems($total_items)
    {
        $this->container['total_items'] = $total_items;

        return $this;
    }

    /**
     * Gets warnings
     * @return \Swagger\Client\Model\WarningInfo[]
     */
    public function getWarnings()
    {
        return $this->container['warnings'];
    }

    /**
     * Sets warnings
     * @param \Swagger\Client\Model\WarningInfo[] $warnings
     * @return $this
     */
    public function setWarnings($warnings)
    {
        $this->container['warnings'] = $warnings;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return wp_json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return wp_json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}


