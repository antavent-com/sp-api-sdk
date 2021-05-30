<?php
/**
 * UnfulfillableQuantity
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  AmazonPHP\SellingPartner
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Selling Partner API for FBA Inventory
 *
 * The Selling Partner API for FBA Inventory lets you programmatically retrieve information about inventory in Amazon's fulfillment network. Today this API is available only in the North America region. In 2021 we plan to release this API in the Europe and Far East regions.
 *
 * The version of the OpenAPI document: v1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace AmazonPHP\SellingPartner\Model\FBAInventory;

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
class UnfulfillableQuantity implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static string $openAPIModelName = 'UnfulfillableQuantity';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static array $openAPITypes = [
        'totalUnfulfillableQuantity' => 'int',
        'customerDamagedQuantity' => 'int',
        'warehouseDamagedQuantity' => 'int',
        'distributorDamagedQuantity' => 'int',
        'carrierDamagedQuantity' => 'int',
        'defectiveQuantity' => 'int',
        'expiredQuantity' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static array $openAPIFormats = [
        'totalUnfulfillableQuantity' => null,
        'customerDamagedQuantity' => null,
        'warehouseDamagedQuantity' => null,
        'distributorDamagedQuantity' => null,
        'carrierDamagedQuantity' => null,
        'defectiveQuantity' => null,
        'expiredQuantity' => null
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
        'totalUnfulfillableQuantity' => 'totalUnfulfillableQuantity',
        'customerDamagedQuantity' => 'customerDamagedQuantity',
        'warehouseDamagedQuantity' => 'warehouseDamagedQuantity',
        'distributorDamagedQuantity' => 'distributorDamagedQuantity',
        'carrierDamagedQuantity' => 'carrierDamagedQuantity',
        'defectiveQuantity' => 'defectiveQuantity',
        'expiredQuantity' => 'expiredQuantity'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static array $setters = [
        'totalUnfulfillableQuantity' => 'setTotalUnfulfillableQuantity',
        'customerDamagedQuantity' => 'setCustomerDamagedQuantity',
        'warehouseDamagedQuantity' => 'setWarehouseDamagedQuantity',
        'distributorDamagedQuantity' => 'setDistributorDamagedQuantity',
        'carrierDamagedQuantity' => 'setCarrierDamagedQuantity',
        'defectiveQuantity' => 'setDefectiveQuantity',
        'expiredQuantity' => 'setExpiredQuantity'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static array $getters = [
        'totalUnfulfillableQuantity' => 'getTotalUnfulfillableQuantity',
        'customerDamagedQuantity' => 'getCustomerDamagedQuantity',
        'warehouseDamagedQuantity' => 'getWarehouseDamagedQuantity',
        'distributorDamagedQuantity' => 'getDistributorDamagedQuantity',
        'carrierDamagedQuantity' => 'getCarrierDamagedQuantity',
        'defectiveQuantity' => 'getDefectiveQuantity',
        'expiredQuantity' => 'getExpiredQuantity'
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
        $this->container['totalUnfulfillableQuantity'] = $data['totalUnfulfillableQuantity'] ?? null;
        $this->container['customerDamagedQuantity'] = $data['customerDamagedQuantity'] ?? null;
        $this->container['warehouseDamagedQuantity'] = $data['warehouseDamagedQuantity'] ?? null;
        $this->container['distributorDamagedQuantity'] = $data['distributorDamagedQuantity'] ?? null;
        $this->container['carrierDamagedQuantity'] = $data['carrierDamagedQuantity'] ?? null;
        $this->container['defectiveQuantity'] = $data['defectiveQuantity'] ?? null;
        $this->container['expiredQuantity'] = $data['expiredQuantity'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties() : array
    {
        $invalidProperties = [];

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
     * Gets totalUnfulfillableQuantity
     *
     * @return int|null
     */
    public function getTotalUnfulfillableQuantity()
    {
        return $this->container['totalUnfulfillableQuantity'];
    }

    /**
     * Sets totalUnfulfillableQuantity
     *
     * @param int|null $totalUnfulfillableQuantity The total number of units in Amazon's fulfillment network in unsellable condition.
     *
     * @return self
     */
    public function setTotalUnfulfillableQuantity($totalUnfulfillableQuantity) : self
    {
        $this->container['totalUnfulfillableQuantity'] = $totalUnfulfillableQuantity;

        return $this;
    }

    /**
     * Gets customerDamagedQuantity
     *
     * @return int|null
     */
    public function getCustomerDamagedQuantity()
    {
        return $this->container['customerDamagedQuantity'];
    }

    /**
     * Sets customerDamagedQuantity
     *
     * @param int|null $customerDamagedQuantity The number of units in customer damaged disposition.
     *
     * @return self
     */
    public function setCustomerDamagedQuantity($customerDamagedQuantity) : self
    {
        $this->container['customerDamagedQuantity'] = $customerDamagedQuantity;

        return $this;
    }

    /**
     * Gets warehouseDamagedQuantity
     *
     * @return int|null
     */
    public function getWarehouseDamagedQuantity()
    {
        return $this->container['warehouseDamagedQuantity'];
    }

    /**
     * Sets warehouseDamagedQuantity
     *
     * @param int|null $warehouseDamagedQuantity The number of units in warehouse damaged disposition.
     *
     * @return self
     */
    public function setWarehouseDamagedQuantity($warehouseDamagedQuantity) : self
    {
        $this->container['warehouseDamagedQuantity'] = $warehouseDamagedQuantity;

        return $this;
    }

    /**
     * Gets distributorDamagedQuantity
     *
     * @return int|null
     */
    public function getDistributorDamagedQuantity()
    {
        return $this->container['distributorDamagedQuantity'];
    }

    /**
     * Sets distributorDamagedQuantity
     *
     * @param int|null $distributorDamagedQuantity The number of units in distributor damaged disposition.
     *
     * @return self
     */
    public function setDistributorDamagedQuantity($distributorDamagedQuantity) : self
    {
        $this->container['distributorDamagedQuantity'] = $distributorDamagedQuantity;

        return $this;
    }

    /**
     * Gets carrierDamagedQuantity
     *
     * @return int|null
     */
    public function getCarrierDamagedQuantity()
    {
        return $this->container['carrierDamagedQuantity'];
    }

    /**
     * Sets carrierDamagedQuantity
     *
     * @param int|null $carrierDamagedQuantity The number of units in carrier damaged disposition.
     *
     * @return self
     */
    public function setCarrierDamagedQuantity($carrierDamagedQuantity) : self
    {
        $this->container['carrierDamagedQuantity'] = $carrierDamagedQuantity;

        return $this;
    }

    /**
     * Gets defectiveQuantity
     *
     * @return int|null
     */
    public function getDefectiveQuantity()
    {
        return $this->container['defectiveQuantity'];
    }

    /**
     * Sets defectiveQuantity
     *
     * @param int|null $defectiveQuantity The number of units in defective disposition.
     *
     * @return self
     */
    public function setDefectiveQuantity($defectiveQuantity) : self
    {
        $this->container['defectiveQuantity'] = $defectiveQuantity;

        return $this;
    }

    /**
     * Gets expiredQuantity
     *
     * @return int|null
     */
    public function getExpiredQuantity()
    {
        return $this->container['expiredQuantity'];
    }

    /**
     * Sets expiredQuantity
     *
     * @param int|null $expiredQuantity The number of units in expired disposition.
     *
     * @return self
     */
    public function setExpiredQuantity($expiredQuantity) : self
    {
        $this->container['expiredQuantity'] = $expiredQuantity;

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
