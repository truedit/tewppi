<?php
/**
 * RevisionV1TO
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
 * RevisionV1TO Class Doc Comment
 *
 * @category    Class
 * @description Describes one Revision (or version) of a Job.
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class RevisionV1TO implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'RevisionV1TO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'created_by' => '\Swagger\Client\Model\ReferenceV1TO',
        'created_on' => 'int',
        'creator_version' => 'string',
        'file' => '\Swagger\Client\Model\ReferenceV1TO',
        'id' => 'int',
        'name' => 'string',
        'order' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'created_by' => null,
        'created_on' => 'int32',
        'creator_version' => null,
        'file' => null,
        'id' => 'int64',
        'name' => null,
        'order' => 'int32'
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
        'created_by' => 'createdBy',
        'created_on' => 'createdOn',
        'creator_version' => 'creatorVersion',
        'file' => 'file',
        'id' => 'id',
        'name' => 'name',
        'order' => 'order'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'created_by' => 'setCreatedBy',
        'created_on' => 'setCreatedOn',
        'creator_version' => 'setCreatorVersion',
        'file' => 'setFile',
        'id' => 'setId',
        'name' => 'setName',
        'order' => 'setOrder'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'created_by' => 'getCreatedBy',
        'created_on' => 'getCreatedOn',
        'creator_version' => 'getCreatorVersion',
        'file' => 'getFile',
        'id' => 'getId',
        'name' => 'getName',
        'order' => 'getOrder'
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
        $this->container['created_by'] = isset($data['created_by']) ? $data['created_by'] : null;
        $this->container['created_on'] = isset($data['created_on']) ? $data['created_on'] : null;
        $this->container['creator_version'] = isset($data['creator_version']) ? $data['creator_version'] : null;
        $this->container['file'] = isset($data['file']) ? $data['file'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['order'] = isset($data['order']) ? $data['order'] : null;
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
     * Gets created_by
     * @return \Swagger\Client\Model\ReferenceV1TO
     */
    public function getCreatedBy()
    {
        return $this->container['created_by'];
    }

    /**
     * Sets created_by
     * @param \Swagger\Client\Model\ReferenceV1TO $created_by a reference to the user that checked in the Job to create this Revision
     * @return $this
     */
    public function setCreatedBy($created_by)
    {
        $this->container['created_by'] = $created_by;

        return $this;
    }

    /**
     * Gets created_on
     * @return int
     */
    public function getCreatedOn()
    {
        return $this->container['created_on'];
    }

    /**
     * Sets created_on
     * @param int $created_on the date that this Revision was created
     * @return $this
     */
    public function setCreatedOn($created_on)
    {
        $this->container['created_on'] = $created_on;

        return $this;
    }

    /**
     * Gets creator_version
     * @return string
     */
    public function getCreatorVersion()
    {
        return $this->container['creator_version'];
    }

    /**
     * Sets creator_version
     * @param string $creator_version an optional identifier that may have been set the client that created the working file
     * @return $this
     */
    public function setCreatorVersion($creator_version)
    {
        $this->container['creator_version'] = $creator_version;

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
     * @param \Swagger\Client\Model\ReferenceV1TO $file a reference to the working file of this Revision
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
     * Gets order
     * @return int
     */
    public function getOrder()
    {
        return $this->container['order'];
    }

    /**
     * Sets order
     * @param int $order a number that indicates this Revision's order within all the Job's Revisions, starting at 1
     * @return $this
     */
    public function setOrder($order)
    {
        $this->container['order'] = $order;

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


