<?php
/**
 * FlexText
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
 * FlexText Class Doc Comment
 *
 * @category Class
 * @package  LClutch\LineApi\MessagingApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class FlexText extends FlexComponent
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'FlexText';

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
        'flex' => 'int',
        'text' => 'string',
        'size' => 'string',
        'align' => 'string',
        'gravity' => 'string',
        'color' => 'string',
        'weight' => 'string',
        'style' => 'string',
        'decoration' => 'string',
        'wrap' => 'bool',
        'line_spacing' => 'string',
        'margin' => 'string',
        'position' => 'string',
        'offset_top' => 'string',
        'offset_bottom' => 'string',
        'offset_start' => 'string',
        'offset_end' => 'string',
        'action' => '\LClutch\LineApi\MessagingApi\Model\Action',
        'max_lines' => 'int',
        'contents' => '\LClutch\LineApi\MessagingApi\Model\FlexSpan[]',
        'adjust_mode' => 'string',
        'scaling' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'flex' => 'int32',
        'text' => null,
        'size' => null,
        'align' => null,
        'gravity' => null,
        'color' => null,
        'weight' => null,
        'style' => null,
        'decoration' => null,
        'wrap' => null,
        'line_spacing' => null,
        'margin' => null,
        'position' => null,
        'offset_top' => null,
        'offset_bottom' => null,
        'offset_start' => null,
        'offset_end' => null,
        'action' => null,
        'max_lines' => 'int32',
        'contents' => null,
        'adjust_mode' => null,
        'scaling' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'flex' => false,
		'text' => false,
		'size' => false,
		'align' => false,
		'gravity' => false,
		'color' => false,
		'weight' => false,
		'style' => false,
		'decoration' => false,
		'wrap' => false,
		'line_spacing' => false,
		'margin' => false,
		'position' => false,
		'offset_top' => false,
		'offset_bottom' => false,
		'offset_start' => false,
		'offset_end' => false,
		'action' => false,
		'max_lines' => false,
		'contents' => false,
		'adjust_mode' => false,
		'scaling' => false
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
        'flex' => 'flex',
        'text' => 'text',
        'size' => 'size',
        'align' => 'align',
        'gravity' => 'gravity',
        'color' => 'color',
        'weight' => 'weight',
        'style' => 'style',
        'decoration' => 'decoration',
        'wrap' => 'wrap',
        'line_spacing' => 'lineSpacing',
        'margin' => 'margin',
        'position' => 'position',
        'offset_top' => 'offsetTop',
        'offset_bottom' => 'offsetBottom',
        'offset_start' => 'offsetStart',
        'offset_end' => 'offsetEnd',
        'action' => 'action',
        'max_lines' => 'maxLines',
        'contents' => 'contents',
        'adjust_mode' => 'adjustMode',
        'scaling' => 'scaling'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'flex' => 'setFlex',
        'text' => 'setText',
        'size' => 'setSize',
        'align' => 'setAlign',
        'gravity' => 'setGravity',
        'color' => 'setColor',
        'weight' => 'setWeight',
        'style' => 'setStyle',
        'decoration' => 'setDecoration',
        'wrap' => 'setWrap',
        'line_spacing' => 'setLineSpacing',
        'margin' => 'setMargin',
        'position' => 'setPosition',
        'offset_top' => 'setOffsetTop',
        'offset_bottom' => 'setOffsetBottom',
        'offset_start' => 'setOffsetStart',
        'offset_end' => 'setOffsetEnd',
        'action' => 'setAction',
        'max_lines' => 'setMaxLines',
        'contents' => 'setContents',
        'adjust_mode' => 'setAdjustMode',
        'scaling' => 'setScaling'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'flex' => 'getFlex',
        'text' => 'getText',
        'size' => 'getSize',
        'align' => 'getAlign',
        'gravity' => 'getGravity',
        'color' => 'getColor',
        'weight' => 'getWeight',
        'style' => 'getStyle',
        'decoration' => 'getDecoration',
        'wrap' => 'getWrap',
        'line_spacing' => 'getLineSpacing',
        'margin' => 'getMargin',
        'position' => 'getPosition',
        'offset_top' => 'getOffsetTop',
        'offset_bottom' => 'getOffsetBottom',
        'offset_start' => 'getOffsetStart',
        'offset_end' => 'getOffsetEnd',
        'action' => 'getAction',
        'max_lines' => 'getMaxLines',
        'contents' => 'getContents',
        'adjust_mode' => 'getAdjustMode',
        'scaling' => 'getScaling'
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

    public const ALIGN_START = 'start';
    public const ALIGN_END = 'end';
    public const ALIGN_CENTER = 'center';
    public const GRAVITY_TOP = 'top';
    public const GRAVITY_BOTTOM = 'bottom';
    public const GRAVITY_CENTER = 'center';
    public const WEIGHT_REGULAR = 'regular';
    public const WEIGHT_BOLD = 'bold';
    public const STYLE_NORMAL = 'normal';
    public const STYLE_ITALIC = 'italic';
    public const DECORATION_NONE = 'none';
    public const DECORATION_UNDERLINE = 'underline';
    public const DECORATION_LINE_THROUGH = 'line-through';
    public const POSITION_RELATIVE = 'relative';
    public const POSITION_ABSOLUTE = 'absolute';
    public const ADJUST_MODE_SHRINK_TO_FIT = 'shrink-to-fit';

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
    public function getWeightAllowableValues()
    {
        return [
            self::WEIGHT_REGULAR,
            self::WEIGHT_BOLD,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStyleAllowableValues()
    {
        return [
            self::STYLE_NORMAL,
            self::STYLE_ITALIC,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDecorationAllowableValues()
    {
        return [
            self::DECORATION_NONE,
            self::DECORATION_UNDERLINE,
            self::DECORATION_LINE_THROUGH,
        ];
    }

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
    public function getAdjustModeAllowableValues()
    {
        return [
            self::ADJUST_MODE_SHRINK_TO_FIT,
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

        $this->setIfExists('flex', $data ?? [], null);
        $this->setIfExists('text', $data ?? [], null);
        $this->setIfExists('size', $data ?? [], null);
        $this->setIfExists('align', $data ?? [], null);
        $this->setIfExists('gravity', $data ?? [], null);
        $this->setIfExists('color', $data ?? [], null);
        $this->setIfExists('weight', $data ?? [], null);
        $this->setIfExists('style', $data ?? [], null);
        $this->setIfExists('decoration', $data ?? [], null);
        $this->setIfExists('wrap', $data ?? [], null);
        $this->setIfExists('line_spacing', $data ?? [], null);
        $this->setIfExists('margin', $data ?? [], null);
        $this->setIfExists('position', $data ?? [], null);
        $this->setIfExists('offset_top', $data ?? [], null);
        $this->setIfExists('offset_bottom', $data ?? [], null);
        $this->setIfExists('offset_start', $data ?? [], null);
        $this->setIfExists('offset_end', $data ?? [], null);
        $this->setIfExists('action', $data ?? [], null);
        $this->setIfExists('max_lines', $data ?? [], null);
        $this->setIfExists('contents', $data ?? [], null);
        $this->setIfExists('adjust_mode', $data ?? [], null);
        $this->setIfExists('scaling', $data ?? [], null);
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

        $allowedValues = $this->getWeightAllowableValues();
        if (!is_null($this->container['weight']) && !in_array($this->container['weight'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'weight', must be one of '%s'",
                $this->container['weight'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getStyleAllowableValues();
        if (!is_null($this->container['style']) && !in_array($this->container['style'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'style', must be one of '%s'",
                $this->container['style'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getDecorationAllowableValues();
        if (!is_null($this->container['decoration']) && !in_array($this->container['decoration'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'decoration', must be one of '%s'",
                $this->container['decoration'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getPositionAllowableValues();
        if (!is_null($this->container['position']) && !in_array($this->container['position'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'position', must be one of '%s'",
                $this->container['position'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getAdjustModeAllowableValues();
        if (!is_null($this->container['adjust_mode']) && !in_array($this->container['adjust_mode'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'adjust_mode', must be one of '%s'",
                $this->container['adjust_mode'],
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
     * @param int|null $flex flex
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
     * Gets text
     *
     * @return string|null
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     *
     * @param string|null $text text
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
     * @param string|null $size size
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
     * @param string|null $align align
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
     * @param string|null $gravity gravity
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
     * Gets color
     *
     * @return string|null
     */
    public function getColor()
    {
        return $this->container['color'];
    }

    /**
     * Sets color
     *
     * @param string|null $color color
     *
     * @return self
     */
    public function setColor($color)
    {
        if (is_null($color)) {
            throw new \InvalidArgumentException('non-nullable color cannot be null');
        }
        $this->container['color'] = $color;

        return $this;
    }

    /**
     * Gets weight
     *
     * @return string|null
     */
    public function getWeight()
    {
        return $this->container['weight'];
    }

    /**
     * Sets weight
     *
     * @param string|null $weight weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        if (is_null($weight)) {
            throw new \InvalidArgumentException('non-nullable weight cannot be null');
        }
        $allowedValues = $this->getWeightAllowableValues();
        if (!in_array($weight, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'weight', must be one of '%s'",
                    $weight,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['weight'] = $weight;

        return $this;
    }

    /**
     * Gets style
     *
     * @return string|null
     */
    public function getStyle()
    {
        return $this->container['style'];
    }

    /**
     * Sets style
     *
     * @param string|null $style style
     *
     * @return self
     */
    public function setStyle($style)
    {
        if (is_null($style)) {
            throw new \InvalidArgumentException('non-nullable style cannot be null');
        }
        $allowedValues = $this->getStyleAllowableValues();
        if (!in_array($style, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'style', must be one of '%s'",
                    $style,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['style'] = $style;

        return $this;
    }

    /**
     * Gets decoration
     *
     * @return string|null
     */
    public function getDecoration()
    {
        return $this->container['decoration'];
    }

    /**
     * Sets decoration
     *
     * @param string|null $decoration decoration
     *
     * @return self
     */
    public function setDecoration($decoration)
    {
        if (is_null($decoration)) {
            throw new \InvalidArgumentException('non-nullable decoration cannot be null');
        }
        $allowedValues = $this->getDecorationAllowableValues();
        if (!in_array($decoration, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'decoration', must be one of '%s'",
                    $decoration,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['decoration'] = $decoration;

        return $this;
    }

    /**
     * Gets wrap
     *
     * @return bool|null
     */
    public function getWrap()
    {
        return $this->container['wrap'];
    }

    /**
     * Sets wrap
     *
     * @param bool|null $wrap wrap
     *
     * @return self
     */
    public function setWrap($wrap)
    {
        if (is_null($wrap)) {
            throw new \InvalidArgumentException('non-nullable wrap cannot be null');
        }
        $this->container['wrap'] = $wrap;

        return $this;
    }

    /**
     * Gets line_spacing
     *
     * @return string|null
     */
    public function getLineSpacing()
    {
        return $this->container['line_spacing'];
    }

    /**
     * Sets line_spacing
     *
     * @param string|null $line_spacing line_spacing
     *
     * @return self
     */
    public function setLineSpacing($line_spacing)
    {
        if (is_null($line_spacing)) {
            throw new \InvalidArgumentException('non-nullable line_spacing cannot be null');
        }
        $this->container['line_spacing'] = $line_spacing;

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
     * @param string|null $margin margin
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
     * @param string|null $position position
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
     * @param string|null $offset_top offset_top
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
     * @param string|null $offset_bottom offset_bottom
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
     * @param string|null $offset_start offset_start
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
     * @param string|null $offset_end offset_end
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
     * Gets max_lines
     *
     * @return int|null
     */
    public function getMaxLines()
    {
        return $this->container['max_lines'];
    }

    /**
     * Sets max_lines
     *
     * @param int|null $max_lines max_lines
     *
     * @return self
     */
    public function setMaxLines($max_lines)
    {
        if (is_null($max_lines)) {
            throw new \InvalidArgumentException('non-nullable max_lines cannot be null');
        }
        $this->container['max_lines'] = $max_lines;

        return $this;
    }

    /**
     * Gets contents
     *
     * @return \LClutch\LineApi\MessagingApi\Model\FlexSpan[]|null
     */
    public function getContents()
    {
        return $this->container['contents'];
    }

    /**
     * Sets contents
     *
     * @param \LClutch\LineApi\MessagingApi\Model\FlexSpan[]|null $contents contents
     *
     * @return self
     */
    public function setContents($contents)
    {
        if (is_null($contents)) {
            throw new \InvalidArgumentException('non-nullable contents cannot be null');
        }
        $this->container['contents'] = $contents;

        return $this;
    }

    /**
     * Gets adjust_mode
     *
     * @return string|null
     */
    public function getAdjustMode()
    {
        return $this->container['adjust_mode'];
    }

    /**
     * Sets adjust_mode
     *
     * @param string|null $adjust_mode adjust_mode
     *
     * @return self
     */
    public function setAdjustMode($adjust_mode)
    {
        if (is_null($adjust_mode)) {
            throw new \InvalidArgumentException('non-nullable adjust_mode cannot be null');
        }
        $allowedValues = $this->getAdjustModeAllowableValues();
        if (!in_array($adjust_mode, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'adjust_mode', must be one of '%s'",
                    $adjust_mode,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['adjust_mode'] = $adjust_mode;

        return $this;
    }

    /**
     * Gets scaling
     *
     * @return bool|null
     */
    public function getScaling()
    {
        return $this->container['scaling'];
    }

    /**
     * Sets scaling
     *
     * @param bool|null $scaling scaling
     *
     * @return self
     */
    public function setScaling($scaling)
    {
        if (is_null($scaling)) {
            throw new \InvalidArgumentException('non-nullable scaling cannot be null');
        }
        $this->container['scaling'] = $scaling;

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


