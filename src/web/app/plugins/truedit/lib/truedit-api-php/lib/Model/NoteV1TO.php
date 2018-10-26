<?php
/**
 * NoteV1TO
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
 * NoteV1TO Class Doc Comment
 *
 * @category    Class
 * @description Describes a Note.
 * @package     Swagger\Client
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class NoteV1TO implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'NoteV1TO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'author_id' => 'int',
        'author_username' => 'string',
        'content' => 'string',
        'created' => 'int',
        'id' => 'int',
        'job_id' => 'int',
        'modified' => 'int',
        'name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerFormats = [
        'author_id' => 'int64',
        'author_username' => null,
        'content' => null,
        'created' => 'int64',
        'id' => 'int64',
        'job_id' => 'int64',
        'modified' => 'int64',
        'name' => null
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
        'author_id' => 'authorId',
        'author_username' => 'authorUsername',
        'content' => 'content',
        'created' => 'created',
        'id' => 'id',
        'job_id' => 'jobId',
        'modified' => 'modified',
        'name' => 'name'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'author_id' => 'setAuthorId',
        'author_username' => 'setAuthorUsername',
        'content' => 'setContent',
        'created' => 'setCreated',
        'id' => 'setId',
        'job_id' => 'setJobId',
        'modified' => 'setModified',
        'name' => 'setName'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'author_id' => 'getAuthorId',
        'author_username' => 'getAuthorUsername',
        'content' => 'getContent',
        'created' => 'getCreated',
        'id' => 'getId',
        'job_id' => 'getJobId',
        'modified' => 'getModified',
        'name' => 'getName'
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
        $this->container['author_id'] = isset($data['author_id']) ? $data['author_id'] : null;
        $this->container['author_username'] = isset($data['author_username']) ? $data['author_username'] : null;
        $this->container['content'] = isset($data['content']) ? $data['content'] : null;
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['job_id'] = isset($data['job_id']) ? $data['job_id'] : null;
        $this->container['modified'] = isset($data['modified']) ? $data['modified'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
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
     * Gets author_id
     * @return int
     */
    public function getAuthorId()
    {
        return $this->container['author_id'];
    }

    /**
     * Sets author_id
     * @param int $author_id the unique identifier of the author of this note.
     * @return $this
     */
    public function setAuthorId($author_id)
    {
        $this->container['author_id'] = $author_id;

        return $this;
    }

    /**
     * Gets author_username
     * @return string
     */
    public function getAuthorUsername()
    {
        return $this->container['author_username'];
    }

    /**
     * Sets author_username
     * @param string $author_username the name / email of the author of this note.
     * @return $this
     */
    public function setAuthorUsername($author_username)
    {
        $this->container['author_username'] = $author_username;

        return $this;
    }

    /**
     * Gets content
     * @return string
     */
    public function getContent()
    {
        return $this->container['content'];
    }

    /**
     * Sets content
     * @param string $content the content of the note.
     * @return $this
     */
    public function setContent($content)
    {
        $this->container['content'] = $content;

        return $this;
    }

    /**
     * Gets created
     * @return int
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     * @param int $created the date in UTC milliseconds when this note was created.
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

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
     * Gets job_id
     * @return int
     */
    public function getJobId()
    {
        return $this->container['job_id'];
    }

    /**
     * Sets job_id
     * @param int $job_id the unique identifier of the Job to which this note belongs to.
     * @return $this
     */
    public function setJobId($job_id)
    {
        $this->container['job_id'] = $job_id;

        return $this;
    }

    /**
     * Gets modified
     * @return int
     */
    public function getModified()
    {
        return $this->container['modified'];
    }

    /**
     * Sets modified
     * @param int $modified the date in UTC milliseconds when this note was last modified.
     * @return $this
     */
    public function setModified($modified)
    {
        $this->container['modified'] = $modified;

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

