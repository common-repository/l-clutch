# # FlexImageAllOf

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**url** | **string** | Image URL (Max character limit: 2000) Protocol: HTTPS (TLS 1.2 or later) Image format: JPEG or PNG Maximum image size: 1024×1024 pixels Maximum file size: 10 MB (300 KB when the animated property is true) | [optional]
**flex** | **int** | The ratio of the width or height of this component within the parent box. | [optional]
**margin** | **string** | The minimum amount of space to include before this component in its parent container. | [optional]
**position** | **string** | Reference for offsetTop, offsetBottom, offsetStart, and offsetEnd. Specify one of the following values:  &#x60;relative&#x60;: Use the previous box as reference. &#x60;absolute&#x60;: Use the top left of parent element as reference. The default value is relative. | [optional]
**offset_top** | **string** | Offset. | [optional]
**offset_bottom** | **string** | Offset. | [optional]
**offset_start** | **string** | Offset. | [optional]
**offset_end** | **string** | Offset. | [optional]
**align** | **string** | Alignment style in horizontal direction. | [optional]
**gravity** | **string** | Alignment style in vertical direction. | [optional]
**size** | **string** | The maximum image width. This is md by default. | [optional] [default to 'md']
**aspect_ratio** | **string** | Aspect ratio of the image. &#x60;{width}:{height}&#x60; format. Specify the value of &#x60;{width}&#x60; and &#x60;{height}&#x60; in the range from &#x60;1&#x60; to &#x60;100000&#x60;. However, you cannot set &#x60;{height}&#x60; to a value that is more than three times the value of &#x60;{width}&#x60;. The default value is &#x60;1:1&#x60;. | [optional]
**aspect_mode** | **string** | The display style of the image if the aspect ratio of the image and that specified by the aspectRatio property do not match. | [optional]
**background_color** | **string** | Background color of the image. Use a hexadecimal color code. | [optional]
**action** | [**\LClutch\LineApi\MessagingApi\Model\Action**](Action.md) |  | [optional]
**animated** | **bool** | When this is &#x60;true&#x60;, an animated image (APNG) plays. You can specify a value of true up to 10 images in a single message. You can&#39;t send messages that exceed this limit. This is &#x60;false&#x60; by default. Animated images larger than 300 KB aren&#39;t played back. | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
