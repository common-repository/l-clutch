<?php
/**
 * AppTypeDemographic
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
 * AppTypeDemographic Class Doc Comment
 *
 * @category Class
 * @package  LClutch\LineApi\MessagingApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AppTypeDemographic
{
    /**
     * Possible values of this enum
     */
    public const IOS = 'ios';

    public const ANDROID = 'android';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::IOS,
            self::ANDROID
        ];
    }
}


