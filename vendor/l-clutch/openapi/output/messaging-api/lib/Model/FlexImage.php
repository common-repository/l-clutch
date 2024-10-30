<?php
/**
 * FlexImage
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
 * FlexImage Class Doc Comment
 *
 * @category Class
 * @package  LClutch\LineApi\MessagingApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FlexImage extends FlexComponent
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FlexImage';

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
        'url' => 'string',
        'flex' => 'int',
        'margin' => 'string',
        'position' => 'string',
        'offset_top' => 'string',
        'offset_bottom' => 'string',
        'offset_start' => 'string',
        'offset_end' => 'string',
        'align' => 'string',
        'gravity' => 'string',
        'size' => 'string',
        'aspect_ratio' => 'string',
        'aspect_mode' => 'string',
        'background_color' => 'string',
        'action' => '\LClutch\LineApi\MessagingApi\Model\Action',
        'animated' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'url' => 'uri',
        'flex' => 'int32',
        'margin' => null,
        'position' => null,
        'offset_top' => null,
        'offset_bottom' => null,
        'offset_start' => null,
        'offset_end' => null,
        'align' => null,
        'gravity' => null,
        'size' => null,
        'aspect_ratio' => null,
        'aspect_mode' => null,
        'background_color' => null,
        'action' => null,
        'animated' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'url' => false,
		'flex' => false,
		'margin' => false,
		'position' => false,
		'offset_top' => false,
		'offset_bottom' => false,
		'offset_start' => false,
		'offset_end' => false,
		'align' => false,
		'gravity' => false,
		'size' => false,
		'aspect_ratio' => false,
		'aspect_mode' => false,
		'background_color' => false,
		'action' => false,
		'animated' => false
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
        'url' => 'url',
        'flex' => 'flex',
        'margin' => 'margin',
        'position' => 'position',
        'offset_top' => 'offsetTop',
        'offset_bottom' => 'offsetBottom',
        'offset_start' => 'offsetStart',
        'offset_end' => 'offsetEnd',
        'align' => 'align',
        'gravity' => 'gravity',
        'size' => 'size',
        'aspect_ratio' => 'aspectRatio',
        'aspect_mode' => 'aspectMode',
        'background_color' => 'backgroundColor',
        'action' => 'action',
        'animated' => 'animated'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'url' => 'setUrl',
        'flex' => 'setFlex',
        'margin' => 'setMargin',
        'position' => 'setPosition',
        'offset_top' => 'setOffsetTop',
        'offset_bottom' => 'setOffsetBottom',
        'offset_start' => 'setOffsetStart',
        'offset_end' => 'setOffsetEnd',
        'align' => 'setAlign',
        'gravity' => 'setGravity',
        'size' => 'setSize',
        'aspect_ratio' => 'setAspectRatio',
        'aspect_mode' => 'setAspectMode',
        'background_color' => 'setBackgroundColor',
        'action' => 'setAction',
        'animated' => 'setAnimated'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'url' => 'getUrl',
        'flex' => 'getFlex',
        'margin' => 'getMargin',
        'position' => 'getPosition',
        'offset_top' => 'getOffsetTop',
        'offset_bottom' => 'getOffsetBottom',
        'offset_start' => 'getOffsetStart',
        'offset_end' => 'getOffsetEnd',
        'align' => 'getAlign',
        'gravity' => 'getGravity',
        'size' => 'getSize',
        'aspect_ratio' => 'getAspectRatio',
        'aspect_mode' => 'getAspectMode',
        'background_color' => 'getBackgroundColor',
        'action' => 'getAction',
        'animated' => 'getAnimated'
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

    public const POSITION_RELATIVE = 'relative';
    public const POSITION_ABSOLUTE = 'absolute';
    public const ALIGN_START = 'start';
    public const ALIGN_END = 'end';
    public const ALIGN_CENTER = 'center';
    public const GRAVITY_TOP = 'top';
    public const GRAVITY_BOTTOM = 'bottom';
    public const GRAVITY_CENTER = 'center';
    public const ASPECT_MODE_FIT = 'fit';
    public const ASPECT_MODE_COVER = 'cover';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getPositionAllowableValues()
    {
        return [
            self::POSITION_RELATIVE,
            self::POSITION_ABSOLUTE,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAlignAllowableValues()
    {
        return [
            self::ALIGN_START,
            self::ALIGN_END,
            self::ALIGN_CENTER,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getGravityAllowableValues()
    {
        return [
            self::GRAVITY_TOP,
            self::GRAVITY_BOTTOM,
            self::GRAVITY_CENTER,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAspectModeAllowableValues()
    {
        return [
            self::ASPECT_MODE_FIT,
            self::ASPECT_MODE_COVER,
        ];
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

        $this->setIfExists('url', $data ?? [], null);
        $this->setIfExists('flex', $data ?? [], null);
        $this->setIfExists('margin', $data ?? [], null);
        $this->setIfExists('position', $data ?? [], null);
        $this->setIfExists('offset_top', $data ?? [], null);
        $this->setIfExists('offset_bottom', $data ?? [], null);
        $this->setIfExists('offset_start', $data ?? [], null);
        $this->setIfExists('offset_end', $data ?? [], null);
        $this->setIfExists('align', $data ?? [], null);
        $this->setIfExists('gravity', $data ?? [], null);
        $this->setIfExists('size', $data ?? [], 'md');
        $this->setIfExists('aspect_ratio', $data ?? [], null);
        $this->setIfExists('aspect_mode', $data ?? [], null);
        $this->setIfExists('background_color', $data ?? [], null);
        $this->setIfExists('action', $data ?? [], null);
        $this->setIfExists('animated', $data ?? [], false);
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

        if ($this->container['url'] === null) {
            $invalidProperties[] = "'url' can't be null";
        }
        $allowedValues = $this->getPositionAllowableValues();
        if (!is_null($this->container['position']) && !in_array($this->container['position'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'position', must be one of '%s'",
                $this->container['position'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getAlignAllowableValues();
        if (!is_null($this->container['align']) && !in_array($this->container['align'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'align', must be one of '%s'",
                $this->container['align'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getGravityAllowableValues();
        if (!is_null($this->container['gravity']) && !in_array($this->container['gravity'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'gravity', must be one of '%s'",
                $this->container['gravity'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getAspectModeAllowableValues();
        if (!is_null($this->container['aspect_mode']) && !in_array($this->container['aspect_mode'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'aspect_mode', must be one of '%s'",
                $this->container['aspect_mode'],
                implode("', '", $allowedValues)
            );
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
     * Gets url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string $url Image URL (Max character limit: 2000) Protocol: HTTPS (TLS 1.2 or later) Image format: JPEG or PNG Maximum image size: 1024×1024 pixels Maximum file size: 10 MB (300 KB when the animated property is true)
     *
     * @return self
     */
    public function setUrl($url)
    {
        if (is_null($url)) {
            throw new \InvalidArgumentException('non-nullable url cannot be null');
        }
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets flex
     *
     * @return int|null
     */
    public function getFlex()
    {
        return $this->container['flex'];
    }

    /**
     * Sets flex
     *
     * @param int|null $flex The ratio of the width or height of this component within the parent box.
     *
     * @return self
     */
    public function setFlex($flex)
    {
        if (is_null($flex)) {
            throw new \InvalidArgumentException('non-nullable flex cannot be null');
        }
        $this->container['flex'] = $flex;

        return $this;
    }

    /**
     * Gets margin
     *
     * @return string|null
     */
    public function getMargin()
    {
        return $this->container['margin'];
    }

    /**
     * Sets margin
     *
     * @param string|null $margin The minimum amount of space to include before this component in its parent container.
     *
     * @return self
     */
    public function setMargin($margin)
    {
        if (is_null($margin)) {
            throw new \InvalidArgumentException('non-nullable margin cannot be null');
        }
        $this->container['margin'] = $margin;

        return $this;
    }

    /**
     * Gets position
     *
     * @return string|null
     */
    public function getPosition()
    {
        return $this->container['position'];
    }

    /**
     * Sets position
     *
     * @param string|null $position Reference for offsetTop, offsetBottom, offsetStart, and offsetEnd. Specify one of the following values:  `relative`: Use the previous box as reference. `absolute`: Use the top left of parent element as reference. The default value is relative.
     *
     * @return self
     */
    public function setPosition($position)
    {
        if (is_null($position)) {
            throw new \InvalidArgumentException('non-nullable position cannot be null');
        }
        $allowedValues = $this->getPositionAllowableValues();
        if (!in_array($position, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'position', must be one of '%s'",
                    $position,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['position'] = $position;

        return $this;
    }

    /**
     * Gets offset_top
     *
     * @return string|null
     */
    public function getOffsetTop()
    {
        return $this->container['offset_top'];
    }

    /**
     * Sets offset_top
     *
     * @param string|null $offset_top Offset.
     *
     * @return self
     */
    public function setOffsetTop($offset_top)
    {
        if (is_null($offset_top)) {
            throw new \InvalidArgumentException('non-nullable offset_top cannot be null');
        }
        $this->container['offset_top'] = $offset_top;

        return $this;
    }

    /**
     * Gets offset_bottom
     *
     * @return string|null
     */
    public function getOffsetBottom()
    {
        return $this->container['offset_bottom'];
    }

    /**
     * Sets offset_bottom
     *
     * @param string|null $offset_bottom Offset.
     *
     * @return self
     */
    public function setOffsetBottom($offset_bottom)
    {
        if (is_null($offset_bottom)) {
            throw new \InvalidArgumentException('non-nullable offset_bottom cannot be null');
        }
        $this->container['offset_bottom'] = $offset_bottom;

        return $this;
    }

    /**
     * Gets offset_start
     *
     * @return string|null
     */
    public function getOffsetStart()
    {
        return $this->container['offset_start'];
    }

    /**
     * Sets offset_start
     *
     * @param string|null $offset_start Offset.
     *
     * @return self
     */
    public function setOffsetStart($offset_start)
    {
        if (is_null($offset_start)) {
            throw new \InvalidArgumentException('non-nullable offset_start cannot be null');
        }
        $this->container['offset_start'] = $offset_start;

        return $this;
    }

    /**
     * Gets offset_end
     *
     * @return string|null
     */
    public function getOffsetEnd()
    {
        return $this->container['offset_end'];
    }

    /**
     * Sets offset_end
     *
     * @param string|null $offset_end Offset.
     *
     * @return self
     */
    public function setOffsetEnd($offset_end)
    {
        if (is_null($offset_end)) {
            throw new \InvalidArgumentException('non-nullable offset_end cannot be null');
        }
        $this->container['offset_end'] = $offset_end;

        return $this;
    }

    /**
     * Gets align
     *
     * @return string|null
     */
    public function getAlign()
    {
        return $this->container['align'];
    }

    /**
     * Sets align
     *
     * @param string|null $align Alignment style in horizontal direction.
     *
     * @return self
     */
    public function setAlign($align)
    {
        if (is_null($align)) {
            throw new \InvalidArgumentException('non-nullable align cannot be null');
        }
        $allowedValues = $this->getAlignAllowableValues();
        if (!in_array($align, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'align', must be one of '%s'",
                    $align,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['align'] = $align;

        return $this;
    }

    /**
     * Gets gravity
     *
     * @return string|null
     */
    public function getGravity()
    {
        return $this->container['gravity'];
    }

    /**
     * Sets gravity
     *
     * @param string|null $gravity Alignment style in vertical direction.
     *
     * @return self
     */
    public function setGravity($gravity)
    {
        if (is_null($gravity)) {
            throw new \InvalidArgumentException('non-nullable gravity cannot be null');
        }
        $allowedValues = $this->getGravityAllowableValues();
        if (!in_array($gravity, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'gravity', must be one of '%s'",
                    $gravity,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['gravity'] = $gravity;

        return $this;
    }

    /**
     * Gets size
     *
     * @return string|null
     */
    public function getSize()
    {
        return $this->container['size'];
    }

    /**
     * Sets size
     *
     * @param string|null $size The maximum image width. This is md by default.
     *
     * @return self
     */
    public function setSize($size)
    {
        if (is_null($size)) {
            throw new \InvalidArgumentException('non-nullable size cannot be null');
        }
        $this->container['size'] = $size;

        return $this;
    }

    /**
     * Gets aspect_ratio
     *
     * @return string|null
     */
    public function getAspectRatio()
    {
        return $this->container['aspect_ratio'];
    }

    /**
     * Sets aspect_ratio
     *
     * @param string|null $aspect_ratio Aspect ratio of the image. `{width}:{height}` format. Specify the value of `{width}` and `{height}` in the range from `1` to `100000`. However, you cannot set `{height}` to a value that is more than three times the value of `{width}`. The default value is `1:1`.
     *
     * @return self
     */
    public function setAspectRatio($aspect_ratio)
    {
        if (is_null($aspect_ratio)) {
            throw new \InvalidArgumentException('non-nullable aspect_ratio cannot be null');
        }
        $this->container['aspect_ratio'] = $aspect_ratio;

        return $this;
    }

    /**
     * Gets aspect_mode
     *
     * @return string|null
     */
    public function getAspectMode()
    {
        return $this->container['aspect_mode'];
    }

    /**
     * Sets aspect_mode
     *
     * @param string|null $aspect_mode The display style of the image if the aspect ratio of the image and that specified by the aspectRatio property do not match.
     *
     * @return self
     */
    public function setAspectMode($aspect_mode)
    {
        if (is_null($aspect_mode)) {
            throw new \InvalidArgumentException('non-nullable aspect_mode cannot be null');
        }
        $allowedValues = $this->getAspectModeAllowableValues();
        if (!in_array($aspect_mode, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'aspect_mode', must be one of '%s'",
                    $aspect_mode,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['aspect_mode'] = $aspect_mode;

        return $this;
    }

    /**
     * Gets background_color
     *
     * @return string|null
     */
    public function getBackgroundColor()
    {
        return $this->container['background_color'];
    }

    /**
     * Sets background_color
     *
     * @param string|null $background_color Background color of the image. Use a hexadecimal color code.
     *
     * @return self
     */
    public function setBackgroundColor($background_color)
    {
        if (is_null($background_color)) {
            throw new \InvalidArgumentException('non-nullable background_color cannot be null');
        }
        $this->container['background_color'] = $background_color;

        return $this;
    }

    /**
     * Gets action
     *
     * @return \LClutch\LineApi\MessagingApi\Model\Action|null
     */
    public function getAction()
    {
        return $this->container['action'];
    }

    /**
     * Sets action
     *
     * @param \LClutch\LineApi\MessagingApi\Model\Action|null $action action
     *
     * @return self
     */
    public function setAction($action)
    {
        if (is_null($action)) {
            throw new \InvalidArgumentException('non-nullable action cannot be null');
        }
        $this->container['action'] = $action;

        return $this;
    }

    /**
     * Gets animated
     *
     * @return bool|null
     */
    public function getAnimated()
    {
        return $this->container['animated'];
    }

    /**
     * Sets animated
     *
     * @param bool|null $animated When this is `true`, an animated image (APNG) plays. You can specify a value of true up to 10 images in a single message. You can't send messages that exceed this limit. This is `false` by default. Animated images larger than 300 KB aren't played back.
     *
     * @return self
     */
    public function setAnimated($animated)
    {
        if (is_null($animated)) {
            throw new \InvalidArgumentException('non-nullable animated cannot be null');
        }
        $this->container['animated'] = $animated;

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

