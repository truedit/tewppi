<?php
/**
 * AutomationV1TO
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
 * AutomationV1TO Class Doc Comment
 *
 * @category    Class
 * @description a reference to an object in the system
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class AutomationV1TO implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'AutomationV1TO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'action' => '\Swagger\Client\Model\ReferenceV1TO',
        'config' => '\Swagger\Client\Model\Config',
        'file' => '\Swagger\Client\Model\ReferenceV1TO',
        'id' => 'int',
        'integration_identifier' => 'string',
        'last_executed' => 'int',
        'name' => 'string',
        'profiles' => '\Swagger\Client\Model\ReferenceV1TO[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'action' => null,
        'config' => null,
        'file' => null,
        'id' => 'int64',
        'integration_identifier' => null,
        'last_executed' => 'int64',
        'name' => null,
        'profiles' => null
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
        'action' => 'action',
        'config' => 'config',
        'file' => 'file',
        'id' => 'id',
        'integration_identifier' => 'integrationIdentifier',
        'last_executed' => 'lastExecuted',
        'name' => 'name',
        'profiles' => 'profiles'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'action' => 'setAction',
        'config' => 'setConfig',
        'file' => 'setFile',
        'id' => 'setId',
        'integration_identifier' => 'setIntegrationIdentifier',
        'last_executed' => 'setLastExecuted',
        'name' => 'setName',
        'profiles' => 'setProfiles'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'action' => 'getAction',
        'config' => 'getConfig',
        'file' => 'getFile',
        'id' => 'getId',
        'integration_identifier' => 'getIntegrationIdentifier',
        'last_executed' => 'getLastExecuted',
        'name' => 'getName',
        'profiles' => 'getProfiles'
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
        $this->container['action'] = isset($data['action']) ? $data['action'] : null;
        $this->container['config'] = isset($data['config']) ? $data['config'] : null;
        $this->container['file'] = isset($data['file']) ? $data['file'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['integration_identifier'] = isset($data['integration_identifier']) ? $data['integration_identifier'] : null;
        $this->container['last_executed'] = isset($data['last_executed']) ? $data['last_executed'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['profiles'] = isset($data['profiles']) ? $data['profiles'] : null;
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
     * Gets action
     * @return \Swagger\Client\Model\ReferenceV1TO
     */
    public function getAction()
    {
        return $this->container['action'];
    }

    /**
     * Sets action
     * @param \Swagger\Client\Model\ReferenceV1TO $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->container['action'] = $action;

        return $this;
    }

    /**
     * Gets config
     * @return \Swagger\Client\Model\Config
     */
    public function getConfig()
    {
        return $this->container['config'];
    }

    /**
     * Sets config
     * @param \Swagger\Client\Model\Config $config
     * @return $this
     */
    public function setConfig($config)
    {
        $this->container['config'] = $config;

        return $this;
    }

    /**
     * Gets file
     * @return \Swagger\Client\Model\ReferenceV1TO
     */
    public function getFile()
    {
        return $this->container['file'];
    }

    /**
     * Sets file
     * @param \Swagger\Client\Model\ReferenceV1TO $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->container['file'] = $file;

        return $this;
    }

    /**
     * Gets id
     * @return int
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     * @param int $id the ID of the object which may be passed to various APIs to fetch or update the object
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets integration_identifier
     * @return string
     */
    public function getIntegrationIdentifier()
    {
        return $this->container['integration_identifier'];
    }

    /**
     * Sets integration_identifier
     * @param string $integration_identifier
     * @return $this
     */
    public function setIntegrationIdentifier($integration_identifier)
    {
        $this->container['integration_identifier'] = $integration_identifier;

        return $this;
    }

    /**
     * Gets last_executed
     * @return int
     */
    public function getLastExecuted()
    {
        return $this->container['last_executed'];
    }

    /**
     * Sets last_executed
     * @param int $last_executed
     * @return $this
     */
    public function setLastExecuted($last_executed)
    {
        $this->container['last_executed'] = $last_executed;

        return $this;
    }

    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name the name of the object, if it has one
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets profiles
     * @return \Swagger\Client\Model\ReferenceV1TO[]
     */
    public function getProfiles()
    {
        return $this->container['profiles'];
    }

    /**
     * Sets profiles
     * @param \Swagger\Client\Model\ReferenceV1TO[] $profiles
     * @return $this
     */
    public function setProfiles($profiles)
    {
        $this->container['profiles'] = $profiles;

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
            return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}


