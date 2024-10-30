<?php
/**
 * TemplateImageSize
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
 * TemplateImageSize Class Doc Comment
 *
 * @category Class
 * @description Size of the image.  This is only for the &#x60;imageSize&#x60; in ButtonsTemplate. Specify one of the following values:  &#x60;cover&#x60;: The image fills the entire image area. Parts of the image that do not fit in the area are not displayed. &#x60;contain&#x60;: The entire image is displayed in the image area. A background is displayed in the unused areas to the left and right of vertical images and in the areas above and below horizontal images.
 * @package  LClutch\LineApi\MessagingApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class TemplateImageSize
{
    /**
     * Possible values of this enum
     */
    public const COVER = 'cover';

    public const CONTAIN = 'contain';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::COVER,
            self::CONTAIN
        ];
    }
}


