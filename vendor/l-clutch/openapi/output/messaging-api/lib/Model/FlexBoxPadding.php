<?php
/**
 * FlexBoxPadding
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  LClutch\LineApi\MessagingApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * LINE Messaging API
 *
 * This document describes LINE Messaging API.
 *
 * The version of the OpenAPI document: 0.0.1
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 6.6.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace LClutch\LineApi\MessagingApi\Model;
use \LClutch\LineApi\MessagingApi\ObjectSerializer;

/**
 * FlexBoxPadding Class Doc Comment
 *
 * @category Class
 * @description Padding can be specified in pixels, percentage (to the parent box width) or with a keyword. FlexBoxPadding just provides only keywords.
 * @package  LClutch\LineApi\MessagingApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class FlexBoxPadding
{
    /**
     * Possible values of this enum
     */
    public const NONE = 'none';

    public const XS = 'xs';

    public const SM = 'sm';

    public const MD = 'md';

    public const LG = 'lg';

    public const XL = 'xl';

    public const XXL = 'xxl';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::NONE,
            self::XS,
            self::SM,
            self::MD,
            self::LG,
            self::XL,
            self::XXL
        ];
    }
}


