<?php
/**
 * ContentDocument
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  AmazonPHP\SellingPartner
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Selling Partner API for A+ Content Management
 *
 * With the A+ Content API, you can build applications that help selling partners add rich marketing content to their Amazon product detail pages. A+ content helps selling partners share their brand and product story, which helps buyers make informed purchasing decisions. Selling partners assemble content by choosing from content modules and adding images and text.
 *
 * The version of the OpenAPI document: 2020-11-01
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace AmazonPHP\SellingPartner\Model\APlus;

use \ArrayAccess;
use \AmazonPHP\SellingPartner\ObjectSerializer;
use \AmazonPHP\SellingPartner\Model\ModelInterface;

/**
 * This class was auto-generated by https://github.com/OpenAPITools/openapi-generator/.
 * Do not change it, it will be overwritten with next execution of /bin/generate.sh
 *
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null
 */
class ContentDocument implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'ContentDocument';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static array $openAPITypes = [
        'name' => 'string',
        'contentType' => '\AmazonPHP\SellingPartner\Model\APlus\ContentType',
        'contentSubType' => 'string',
        'locale' => 'string',
        'contentModuleList' => '\AmazonPHP\SellingPartner\Model\APlus\ContentModule[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'name' => null,
        'contentType' => null,
        'contentSubType' => null,
        'locale' => null,
        'contentModuleList' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes() : array
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats() : array
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static array $attributeMap = [
        'name' => 'name',
        'contentType' => 'contentType',
        'contentSubType' => 'contentSubType',
        'locale' => 'locale',
        'contentModuleList' => 'contentModuleList'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static array $setters = [
        'name' => 'setName',
        'contentType' => 'setContentType',
        'contentSubType' => 'setContentSubType',
        'locale' => 'setLocale',
        'contentModuleList' => 'setContentModuleList'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static array $getters = [
        'name' => 'getName',
        'contentType' => 'getContentType',
        'contentSubType' => 'getContentSubType',
        'locale' => 'getLocale',
        'contentModuleList' => 'getContentModuleList'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap() : array
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters() : array
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters() : array
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName() : string
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected array $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['name'] = $data['name'] ?? null;
        $this->container['contentType'] = $data['contentType'] ?? null;
        $this->container['contentSubType'] = $data['contentSubType'] ?? null;
        $this->container['locale'] = $data['locale'] ?? null;
        $this->container['contentModuleList'] = $data['contentModuleList'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties() : array
    {
        $invalidProperties = [];

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ((mb_strlen($this->container['name']) > 100)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 100.";
        }

        if ((mb_strlen($this->container['name']) < 1)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['contentType'] === null) {
            $invalidProperties[] = "'contentType' can't be null";
        }
        if (!is_null($this->container['contentSubType']) && (mb_strlen($this->container['contentSubType']) < 1)) {
            $invalidProperties[] = "invalid value for 'contentSubType', the character length must be bigger than or equal to 1.";
        }

        if ($this->container['locale'] === null) {
            $invalidProperties[] = "'locale' can't be null";
        }
        if ((mb_strlen($this->container['locale']) < 5)) {
            $invalidProperties[] = "invalid value for 'locale', the character length must be bigger than or equal to 5.";
        }

        if ($this->container['contentModuleList'] === null) {
            $invalidProperties[] = "'contentModuleList' can't be null";
        }
        if ((count($this->container['contentModuleList']) > 100)) {
            $invalidProperties[] = "invalid value for 'contentModuleList', number of items must be less than or equal to 100.";
        }

        if ((count($this->container['contentModuleList']) < 1)) {
            $invalidProperties[] = "invalid value for 'contentModuleList', number of items must be greater than or equal to 1.";
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid() : bool
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name The A+ Content document name.
     *
     * @return self
     */
    public function setName($name) : self
    {
        if ((mb_strlen($name) > 100)) {
            throw new \InvalidArgumentException('invalid length for $name when calling ContentDocument., must be smaller than or equal to 100.');
        }
        if ((mb_strlen($name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $name when calling ContentDocument., must be bigger than or equal to 1.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets contentType
     *
     * @return \AmazonPHP\SellingPartner\Model\APlus\ContentType
     */
    public function getContentType()
    {
        return $this->container['contentType'];
    }

    /**
     * Sets contentType
     *
     * @param \AmazonPHP\SellingPartner\Model\APlus\ContentType $contentType contentType
     *
     * @return self
     */
    public function setContentType($contentType) : self
    {
        $this->container['contentType'] = $contentType;

        return $this;
    }

    /**
     * Gets contentSubType
     *
     * @return string|null
     */
    public function getContentSubType()
    {
        return $this->container['contentSubType'];
    }

    /**
     * Sets contentSubType
     *
     * @param string|null $contentSubType The A+ Content document subtype. This represents a special-purpose type of an A+ Content document. Not every A+ Content document type will have a subtype, and subtypes may change at any time.
     *
     * @return self
     */
    public function setContentSubType($contentSubType) : self
    {

        if (!is_null($contentSubType) && (mb_strlen($contentSubType) < 1)) {
            throw new \InvalidArgumentException('invalid length for $contentSubType when calling ContentDocument., must be bigger than or equal to 1.');
        }

        $this->container['contentSubType'] = $contentSubType;

        return $this;
    }

    /**
     * Gets locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->container['locale'];
    }

    /**
     * Sets locale
     *
     * @param string $locale The IETF language tag. This only supports the primary language subtag with one secondary language subtag. The secondary language subtag is almost always a regional designation. This does not support additional subtags beyond the primary and secondary subtags. **Pattern:** ^[a-z]{2,}-[A-Z0-9]{2,}$
     *
     * @return self
     */
    public function setLocale($locale) : self
    {

        if ((mb_strlen($locale) < 5)) {
            throw new \InvalidArgumentException('invalid length for $locale when calling ContentDocument., must be bigger than or equal to 5.');
        }

        $this->container['locale'] = $locale;

        return $this;
    }

    /**
     * Gets contentModuleList
     *
     * @return \AmazonPHP\SellingPartner\Model\APlus\ContentModule[]
     */
    public function getContentModuleList()
    {
        return $this->container['contentModuleList'];
    }

    /**
     * Sets contentModuleList
     *
     * @param \AmazonPHP\SellingPartner\Model\APlus\ContentModule[] $contentModuleList A list of A+ Content modules.
     *
     * @return self
     */
    public function setContentModuleList($contentModuleList) : self
    {

        if ((count($contentModuleList) > 100)) {
            throw new \InvalidArgumentException('invalid value for $contentModuleList when calling ContentDocument., number of items must be less than or equal to 100.');
        }
        if ((count($contentModuleList) < 1)) {
            throw new \InvalidArgumentException('invalid length for $contentModuleList when calling ContentDocument., number of items must be greater than or equal to 1.');
        }
        $this->container['contentModuleList'] = $contentModuleList;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset) : bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value) : void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset) : void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    public function jsonSerialize() : string
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString() : string
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue() : string
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
