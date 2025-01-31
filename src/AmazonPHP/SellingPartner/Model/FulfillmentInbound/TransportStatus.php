<?php declare(strict_types=1);
/**
 * TransportStatus.
 *
 * PHP version 7.4
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @link     https://openapi-generator.tech
 */

/**
 * Selling Partner API for Fulfillment Inbound.
 *
 * The Selling Partner API for Fulfillment Inbound lets you create applications that create and update inbound shipments of inventory to Amazon's fulfillment network.
 *
 * The version of the OpenAPI document: v0
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.2.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace AmazonPHP\SellingPartner\Model\FulfillmentInbound;

/**
 * This class was auto-generated by https://github.com/OpenAPITools/openapi-generator/.
 * Do not change it, it will be overwritten with next execution of /bin/generate.sh.
 */
class TransportStatus
{
    /**
     * Possible values of this enum.
     */
    public const WORKING = 'WORKING';

    public const ESTIMATING = 'ESTIMATING';

    public const ESTIMATED = 'ESTIMATED';

    public const ERROR_ON_ESTIMATING = 'ERROR_ON_ESTIMATING';

    public const CONFIRMING = 'CONFIRMING';

    public const CONFIRMED = 'CONFIRMED';

    public const ERROR_ON_CONFIRMING = 'ERROR_ON_CONFIRMING';

    public const VOIDING = 'VOIDING';

    public const VOIDED = 'VOIDED';

    public const ERROR_IN_VOIDING = 'ERROR_IN_VOIDING';

    public const ERROR = 'ERROR';

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public static function getAllowableEnumValues() : array
    {
        return [
            self::WORKING,
            self::ESTIMATING,
            self::ESTIMATED,
            self::ERROR_ON_ESTIMATING,
            self::CONFIRMING,
            self::CONFIRMED,
            self::ERROR_ON_CONFIRMING,
            self::VOIDING,
            self::VOIDED,
            self::ERROR_IN_VOIDING,
            self::ERROR,
        ];
    }
}
