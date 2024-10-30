<?php
/**
 * ButtonsTemplate
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
 * ButtonsTemplate Class Doc Comment
 *
 * @category Class
 * @package  LClutch\LineApi\MessagingApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class ButtonsTemplate extends Template
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ButtonsTemplate';

    /**
      * Array of subclass mappings. Used for (de)serialization
      */
    public static $subclasses = [];

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'thumbnail_image_url' => 'string',
        'image_aspect_ratio' => 'string',
        'image_size' => 'string',
        'image_background_color' => 'string',
        'title' => 'string',
        'text' => 'string',
        'default_action' => '\LClutch\LineApi\MessagingApi\Model\Action',
        'actions' => '\LClutch\LineApi\MessagingApi\Model\Action[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'thumbnail_image_url' => 'uri',
        'image_aspect_ratio' => null,
        'image_size' => null,
        'image_background_color' => null,
        'title' => null,
        'text' => null,
        'default_action' => null,
        'actions' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'thumbnail_image_url' => false,
		'image_aspect_ratio' => false,
		'image_size' => false,
		'image_background_color' => false,
		'title' => false,
		'text' => false,
		'default_action' => false,
		'actions' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes + parent::openAPITypes();
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats + parent::openAPIFormats();
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables + parent::openAPINullables();
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'thumbnail_image_url' => 'thumbnailImageUrl',
        'image_aspect_ratio' => 'imageAspectRatio',
        'image_size' => 'imageSize',
        'image_background_color' => 'imageBackgroundColor',
        'title' => 'title',
        'text' => 'text',
        'default_action' => 'defaultAction',
        'actions' => 'actions'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'thumbnail_image_url' => 'setThumbnailImageUrl',
        'image_aspect_ratio' => 'setImageAspectRatio',
        'image_size' => 'setImageSize',
        'image_background_color' => 'setImageBackgroundColor',
        'title' => 'setTitle',
        'text' => 'setText',
        'default_action' => 'setDefaultAction',
        'actions' => 'setActions'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'thumbnail_image_url' => 'getThumbnailImageUrl',
        'image_aspect_ratio' => 'getImageAspectRatio',
        'image_size' => 'getImageSize',
        'image_background_color' => 'getImageBackgroundColor',
        'title' => 'getTitle',
        'text' => 'getText',
        'default_action' => 'getDefaultAction',
        'actions' => 'getActions'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return parent::attributeMap() + self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return parent::setters() + self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return parent::getters() + self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }



    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        parent::__construct($data);

        $this->setIfExists('thumbnail_image_url', $data ?? [], null);
        $this->setIfExists('image_aspect_ratio', $data ?? [], null);
        $this->setIfExists('image_size', $data ?? [], null);
        $this->setIfExists('image_background_color', $data ?? [], null);
        $this->setIfExists('title', $data ?? [], null);
        $this->setIfExists('text', $data ?? [], null);
        $this->setIfExists('default_action', $data ?? [], null);
        $this->setIfExists('actions', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = parent::listInvalidProperties();

        if ($this->container['text'] === null) {
            $invalidProperties[] = "'text' can't be null";
        }
        if ($this->container['actions'] === null) {
            $invalidProperties[] = "'actions' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets thumbnail_image_url
     *
     * @return string|null
     */
    public function getThumbnailImageUrl()
    {
        return $this->container['thumbnail_image_url'];
    }

    /**
     * Sets thumbnail_image_url
     *
     * @param string|null $thumbnail_image_url thumbnail_image_url
     *
     * @return self
     */
    public function setThumbnailImageUrl($thumbnail_image_url)
    {
        if (is_null($thumbnail_image_url)) {
            throw new \InvalidArgumentException('non-nullable thumbnail_image_url cannot be null');
        }
        $this->container['thumbnail_image_url'] = $thumbnail_image_url;

        return $this;
    }

    /**
     * Gets image_aspect_ratio
     *
     * @return string|null
     */
    public function getImageAspectRatio()
    {
        return $this->container['image_aspect_ratio'];
    }

    /**
     * Sets image_aspect_ratio
     *
     * @param string|null $image_aspect_ratio image_aspect_ratio
     *
     * @return self
     */
    public function setImageAspectRatio($image_aspect_ratio)
    {
        if (is_null($image_aspect_ratio)) {
            throw new \InvalidArgumentException('non-nullable image_aspect_ratio cannot be null');
        }
        $this->container['image_aspect_ratio'] = $image_aspect_ratio;

        return $this;
    }

    /**
     * Gets image_size
     *
     * @return string|null
     */
    public function getImageSize()
    {
        return $this->container['image_size'];
    }

    /**
     * Sets image_size
     *
     * @param string|null $image_size image_size
     *
     * @return self
     */
    public function setImageSize($image_size)
    {
        if (is_null($image_size)) {
            throw new \InvalidArgumentException('non-nullable image_size cannot be null');
        }
        $this->container['image_size'] = $image_size;

        return $this;
    }

    /**
     * Gets image_background_color
     *
     * @return string|null
     */
    public function getImageBackgroundColor()
    {
        return $this->container['image_background_color'];
    }

    /**
     * Sets image_background_color
     *
     * @param string|null $image_background_color image_background_color
     *
     * @return self
     */
    public function setImageBackgroundColor($image_background_color)
    {
        if (is_null($image_background_color)) {
            throw new \InvalidArgumentException('non-nullable image_background_color cannot be null');
        }
        $this->container['image_background_color'] = $image_background_color;

        return $this;
    }

    /**
     * Gets title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string|null $title title
     *
     * @return self
     */
    public function setTitle($title)
    {
        if (is_null($title)) {
            throw new \InvalidArgumentException('non-nullable title cannot be null');
        }
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets text
     *
     * @return string
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     *
     * @param string $text text
     *
     * @return self
     */
    public function setText($text)
    {
        if (is_null($text)) {
            throw new \InvalidArgumentException('non-nullable text cannot be null');
        }
        $this->container['text'] = $text;

        return $this;
    }

    /**
     * Gets default_action
     *
     * @return \LClutch\LineApi\MessagingApi\Model\Action|null
     */
    public function getDefaultAction()
    {
        return $this->container['default_action'];
    }

    /**
     * Sets default_action
     *
     * @param \LClutch\LineApi\MessagingApi\Model\Action|null $default_action default_action
     *
     * @return self
     */
    public function setDefaultAction($default_action)
    {
        if (is_null($default_action)) {
            throw new \InvalidArgumentException('non-nullable default_action cannot be null');
        }
        $this->container['default_action'] = $default_action;

        return $this;
    }

    /**
     * Gets actions
     *
     * @return \LClutch\LineApi\MessagingApi\Model\Action[]
     */
    public function getActions()
    {
        return $this->container['actions'];
    }

    /**
     * Sets actions
     *
     * @param \LClutch\LineApi\MessagingApi\Model\Action[] $actions actions
     *
     * @return self
     */
    public function setActions($actions)
    {
        if (is_null($actions)) {
            throw new \InvalidArgumentException('non-nullable actions cannot be null');
        }
        $this->container['actions'] = $actions;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
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
    #[\ReturnTypeWillChange]
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
    public function offsetSet($offset, $value): void
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
    public function offsetUnset($offset): void
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
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
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
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

