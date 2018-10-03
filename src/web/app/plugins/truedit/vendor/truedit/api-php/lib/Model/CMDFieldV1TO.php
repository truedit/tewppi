<?php
/**
 * CMDFieldV1TO
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * TruEdit REST API
 *
 * Welcome to the TruEdit Platform REST API Reference! You can use this REST API to develop integrations between TruEdit and other applications or script interactions with TruEdit.
 *
 * OpenAPI spec version: 1
 *
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.3.1
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * CMDFieldV1TO Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CMDFieldV1TO implements ModelInterface, ArrayAccess {

	const DISCRIMINATOR = null;

	/**
	  * The original name of the model.
	  *
	  * @var string
	  */
	protected static $swaggerModelName = 'CMDFieldV1TO';

	/**
	  * Array of property to type mappings. Used for (de)serialization
	  *
	  * @var string[]
	  */
	protected static $swaggerTypes = [
		'allows_multiple' => 'bool',
		'data_type'       => 'int',
		'default_value'   => 'string',
		'form_file'       => '\Swagger\Client\Model\ReferenceV1TO',
		'form_remote'     => 'bool',
		'form_url'        => 'string',
		'id'              => 'int',
		'name'            => 'string',
		'profiles'        => '\Swagger\Client\Model\ReferenceV1TO[]',
		'required'        => 'bool',
		'ui_data_type'    => 'int',
		'values'          => 'string[]',
		'visible'         => 'bool',
	];

	/**
	  * Array of property to format mappings. Used for (de)serialization
	  *
	  * @var string[]
	  */
	protected static $swaggerFormats = [
		'allows_multiple' => null,
		'data_type'       => 'int32',
		'default_value'   => null,
		'form_file'       => null,
		'form_remote'     => null,
		'form_url'        => null,
		'id'              => 'int64',
		'name'            => null,
		'profiles'        => null,
		'required'        => null,
		'ui_data_type'    => 'int32',
		'values'          => null,
		'visible'         => null,
	];

	/**
	 * Array of property to type mappings. Used for (de)serialization
	 *
	 * @return array
	 */
	public static function swaggerTypes() {
		return self::$swaggerTypes;
	}

	/**
	 * Array of property to format mappings. Used for (de)serialization
	 *
	 * @return array
	 */
	public static function swaggerFormats() {
		return self::$swaggerFormats;
	}

	/**
	 * Array of attributes where the key is the local name,
	 * and the value is the original name
	 *
	 * @var string[]
	 */
	protected static $attributeMap = [
		'allows_multiple' => 'allowsMultiple',
		'data_type'       => 'dataType',
		'default_value'   => 'defaultValue',
		'form_file'       => 'formFile',
		'form_remote'     => 'formRemote',
		'form_url'        => 'formUrl',
		'id'              => 'id',
		'name'            => 'name',
		'profiles'        => 'profiles',
		'required'        => 'required',
		'ui_data_type'    => 'uiDataType',
		'values'          => 'values',
		'visible'         => 'visible',
	];

	/**
	 * Array of attributes to setter functions (for deserialization of responses)
	 *
	 * @var string[]
	 */
	protected static $setters = [
		'allows_multiple' => 'setAllowsMultiple',
		'data_type'       => 'setDataType',
		'default_value'   => 'setDefaultValue',
		'form_file'       => 'setFormFile',
		'form_remote'     => 'setFormRemote',
		'form_url'        => 'setFormUrl',
		'id'              => 'setId',
		'name'            => 'setName',
		'profiles'        => 'setProfiles',
		'required'        => 'setRequired',
		'ui_data_type'    => 'setUiDataType',
		'values'          => 'setValues',
		'visible'         => 'setVisible',
	];

	/**
	 * Array of attributes to getter functions (for serialization of requests)
	 *
	 * @var string[]
	 */
	protected static $getters = [
		'allows_multiple' => 'getAllowsMultiple',
		'data_type'       => 'getDataType',
		'default_value'   => 'getDefaultValue',
		'form_file'       => 'getFormFile',
		'form_remote'     => 'getFormRemote',
		'form_url'        => 'getFormUrl',
		'id'              => 'getId',
		'name'            => 'getName',
		'profiles'        => 'getProfiles',
		'required'        => 'getRequired',
		'ui_data_type'    => 'getUiDataType',
		'values'          => 'getValues',
		'visible'         => 'getVisible',
	];

	/**
	 * Array of attributes where the key is the local name,
	 * and the value is the original name
	 *
	 * @return array
	 */
	public static function attributeMap() {
		return self::$attributeMap;
	}

	/**
	 * Array of attributes to setter functions (for deserialization of responses)
	 *
	 * @return array
	 */
	public static function setters() {
		return self::$setters;
	}

	/**
	 * Array of attributes to getter functions (for serialization of requests)
	 *
	 * @return array
	 */
	public static function getters() {
		return self::$getters;
	}

	/**
	 * The original name of the model.
	 *
	 * @return string
	 */
	public function getModelName() {
		return self::$swaggerModelName;
	}





	/**
	 * Associative array for storing property values
	 *
	 * @var mixed[]
	 */
	protected $container = [];

	/**
	 * Constructor
	 *
	 * @param mixed[] $data Associated array of property values
	 *                      initializing the model
	 */
	public function __construct( array $data = null ) {
		$this->container['allows_multiple'] = isset( $data['allows_multiple'] ) ? $data['allows_multiple'] : null;
		$this->container['data_type']       = isset( $data['data_type'] ) ? $data['data_type'] : null;
		$this->container['default_value']   = isset( $data['default_value'] ) ? $data['default_value'] : null;
		$this->container['form_file']       = isset( $data['form_file'] ) ? $data['form_file'] : null;
		$this->container['form_remote']     = isset( $data['form_remote'] ) ? $data['form_remote'] : null;
		$this->container['form_url']        = isset( $data['form_url'] ) ? $data['form_url'] : null;
		$this->container['id']              = isset( $data['id'] ) ? $data['id'] : null;
		$this->container['name']            = isset( $data['name'] ) ? $data['name'] : null;
		$this->container['profiles']        = isset( $data['profiles'] ) ? $data['profiles'] : null;
		$this->container['required']        = isset( $data['required'] ) ? $data['required'] : null;
		$this->container['ui_data_type']    = isset( $data['ui_data_type'] ) ? $data['ui_data_type'] : null;
		$this->container['values']          = isset( $data['values'] ) ? $data['values'] : null;
		$this->container['visible']         = isset( $data['visible'] ) ? $data['visible'] : null;
	}

	/**
	 * Show all the invalid properties with reasons.
	 *
	 * @return array invalid properties with reasons
	 */
	public function listInvalidProperties() {
		$invalidProperties = [];

		return $invalidProperties;
	}

	/**
	 * Validate all the properties in the model
	 * return true if all passed
	 *
	 * @return bool True if all properties are valid
	 */
	public function valid() {

		return true;
	}


	/**
	 * Gets allows_multiple
	 *
	 * @return bool
	 */
	public function getAllowsMultiple() {
		return $this->container['allows_multiple'];
	}

	/**
	 * Sets allows_multiple
	 *
	 * @param bool $allows_multiple allows_multiple
	 *
	 * @return $this
	 */
	public function setAllowsMultiple( $allows_multiple ) {
		$this->container['allows_multiple'] = $allows_multiple;

		return $this;
	}

	/**
	 * Gets data_type
	 *
	 * @return int
	 */
	public function getDataType() {
		return $this->container['data_type'];
	}

	/**
	 * Sets data_type
	 *
	 * @param int $data_type data_type
	 *
	 * @return $this
	 */
	public function setDataType( $data_type ) {
		$this->container['data_type'] = $data_type;

		return $this;
	}

	/**
	 * Gets default_value
	 *
	 * @return string
	 */
	public function getDefaultValue() {
		return $this->container['default_value'];
	}

	/**
	 * Sets default_value
	 *
	 * @param string $default_value default_value
	 *
	 * @return $this
	 */
	public function setDefaultValue( $default_value ) {
		$this->container['default_value'] = $default_value;

		return $this;
	}

	/**
	 * Gets form_file
	 *
	 * @return \Swagger\Client\Model\ReferenceV1TO
	 */
	public function getFormFile() {
		return $this->container['form_file'];
	}

	/**
	 * Sets form_file
	 *
	 * @param \Swagger\Client\Model\ReferenceV1TO $form_file form_file
	 *
	 * @return $this
	 */
	public function setFormFile( $form_file ) {
		$this->container['form_file'] = $form_file;

		return $this;
	}

	/**
	 * Gets form_remote
	 *
	 * @return bool
	 */
	public function getFormRemote() {
		return $this->container['form_remote'];
	}

	/**
	 * Sets form_remote
	 *
	 * @param bool $form_remote form_remote
	 *
	 * @return $this
	 */
	public function setFormRemote( $form_remote ) {
		$this->container['form_remote'] = $form_remote;

		return $this;
	}

	/**
	 * Gets form_url
	 *
	 * @return string
	 */
	public function getFormUrl() {
		return $this->container['form_url'];
	}

	/**
	 * Sets form_url
	 *
	 * @param string $form_url form_url
	 *
	 * @return $this
	 */
	public function setFormUrl( $form_url ) {
		$this->container['form_url'] = $form_url;

		return $this;
	}

	/**
	 * Gets id
	 *
	 * @return int
	 */
	public function getId() {
		return $this->container['id'];
	}

	/**
	 * Sets id
	 *
	 * @param int $id id
	 *
	 * @return $this
	 */
	public function setId( $id ) {
		$this->container['id'] = $id;

		return $this;
	}

	/**
	 * Gets name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->container['name'];
	}

	/**
	 * Sets name
	 *
	 * @param string $name name
	 *
	 * @return $this
	 */
	public function setName( $name ) {
		$this->container['name'] = $name;

		return $this;
	}

	/**
	 * Gets profiles
	 *
	 * @return \Swagger\Client\Model\ReferenceV1TO[]
	 */
	public function getProfiles() {
		return $this->container['profiles'];
	}

	/**
	 * Sets profiles
	 *
	 * @param \Swagger\Client\Model\ReferenceV1TO[] $profiles profiles
	 *
	 * @return $this
	 */
	public function setProfiles( $profiles ) {
		$this->container['profiles'] = $profiles;

		return $this;
	}

	/**
	 * Gets required
	 *
	 * @return bool
	 */
	public function getRequired() {
		return $this->container['required'];
	}

	/**
	 * Sets required
	 *
	 * @param bool $required required
	 *
	 * @return $this
	 */
	public function setRequired( $required ) {
		$this->container['required'] = $required;

		return $this;
	}

	/**
	 * Gets ui_data_type
	 *
	 * @return int
	 */
	public function getUiDataType() {
		return $this->container['ui_data_type'];
	}

	/**
	 * Sets ui_data_type
	 *
	 * @param int $ui_data_type ui_data_type
	 *
	 * @return $this
	 */
	public function setUiDataType( $ui_data_type ) {
		$this->container['ui_data_type'] = $ui_data_type;

		return $this;
	}

	/**
	 * Gets values
	 *
	 * @return string[]
	 */
	public function getValues() {
		return $this->container['values'];
	}

	/**
	 * Sets values
	 *
	 * @param string[] $values values
	 *
	 * @return $this
	 */
	public function setValues( $values ) {
		$this->container['values'] = $values;

		return $this;
	}

	/**
	 * Gets visible
	 *
	 * @return bool
	 */
	public function getVisible() {
		return $this->container['visible'];
	}

	/**
	 * Sets visible
	 *
	 * @param bool $visible visible
	 *
	 * @return $this
	 */
	public function setVisible( $visible ) {
		$this->container['visible'] = $visible;

		return $this;
	}
	/**
	 * Returns true if offset exists. False otherwise.
	 *
	 * @param integer $offset Offset
	 *
	 * @return boolean
	 */
	public function offsetExists( $offset ) {
		return isset( $this->container[ $offset ] );
	}

	/**
	 * Gets offset.
	 *
	 * @param integer $offset Offset
	 *
	 * @return mixed
	 */
	public function offsetGet( $offset ) {
		return isset( $this->container[ $offset ] ) ? $this->container[ $offset ] : null;
	}

	/**
	 * Sets value based on offset.
	 *
	 * @param integer $offset Offset
	 * @param mixed   $value  Value to be set
	 *
	 * @return void
	 */
	public function offsetSet( $offset, $value ) {
		if ( is_null( $offset ) ) {
			$this->container[] = $value;
		} else {
			$this->container[ $offset ] = $value;
		}
	}

	/**
	 * Unsets offset.
	 *
	 * @param integer $offset Offset
	 *
	 * @return void
	 */
	public function offsetUnset( $offset ) {
		unset( $this->container[ $offset ] );
	}

	/**
	 * Gets the string presentation of the object
	 *
	 * @return string
	 */
	public function __toString() {
		if ( ! function_exists( 'wp_json_encode' ) ) {
			require_once ABSPATH . WPINC . '/functions.php';
		}
		if ( defined( 'JSON_PRETTY_PRINT' ) ) { // use JSON pretty print
			return wp_json_encode(
				ObjectSerializer::sanitizeForSerialization( $this ),
				JSON_PRETTY_PRINT
			);
		}

		return wp_json_encode( ObjectSerializer::sanitizeForSerialization( $this ) );
	}
}


