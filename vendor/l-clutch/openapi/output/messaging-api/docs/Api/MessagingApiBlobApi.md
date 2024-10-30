# LClutch\LineApi\MessagingApi\MessagingApiBlobApi

All URIs are relative to https://api.line.me, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getMessageContent()**](MessagingApiBlobApi.md#getMessageContent) | **GET** /v2/bot/message/{messageId}/content |  |
| [**getMessageContentPreview()**](MessagingApiBlobApi.md#getMessageContentPreview) | **GET** /v2/bot/message/{messageId}/content/preview |  |
| [**getMessageContentTranscodingByMessageId()**](MessagingApiBlobApi.md#getMessageContentTranscodingByMessageId) | **GET** /v2/bot/message/{messageId}/content/transcoding |  |
| [**getRichMenuImage()**](MessagingApiBlobApi.md#getRichMenuImage) | **GET** /v2/bot/richmenu/{richMenuId}/content |  |
| [**setRichMenuImage()**](MessagingApiBlobApi.md#setRichMenuImage) | **POST** /v2/bot/richmenu/{richMenuId}/content |  |


## `getMessageContent()`

```php
getMessageContent($message_id): \SplFileObject
```
### URI(s):
- https://api-data.line.me 


Download image, video, and audio data sent from users.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiBlobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$message_id = 'message_id_example'; // string | Message ID of video or audio

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getMessageContent($message_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiBlobApi->getMessageContent: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **message_id** | **string**| Message ID of video or audio | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**\SplFileObject**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMessageContentPreview()`

```php
getMessageContentPreview($message_id): \SplFileObject
```
### URI(s):
- https://api-data.line.me 


Get a preview image of the image or video

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiBlobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$message_id = 'message_id_example'; // string | Message ID of image or video

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getMessageContentPreview($message_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiBlobApi->getMessageContentPreview: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **message_id** | **string**| Message ID of image or video | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**\SplFileObject**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMessageContentTranscodingByMessageId()`

```php
getMessageContentTranscodingByMessageId($message_id): \LClutch\LineApi\MessagingApi\Model\GetMessageContentTranscodingResponse
```
### URI(s):
- https://api-data.line.me 


Verify the preparation status of a video or audio for getting

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiBlobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$message_id = 'message_id_example'; // string | Message ID of video or audio

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getMessageContentTranscodingByMessageId($message_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiBlobApi->getMessageContentTranscodingByMessageId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **message_id** | **string**| Message ID of video or audio | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\GetMessageContentTranscodingResponse**](../Model/GetMessageContentTranscodingResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRichMenuImage()`

```php
getRichMenuImage($rich_menu_id): \SplFileObject
```
### URI(s):
- https://api-data.line.me 


Download rich menu image.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiBlobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_id = 'rich_menu_id_example'; // string | ID of the rich menu with the image to be downloaded

$hostIndex = 0;
$variables = [
];

try {
    $result = $apiInstance->getRichMenuImage($rich_menu_id, $hostIndex, $variables);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiBlobApi->getRichMenuImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_id** | **string**| ID of the rich menu with the image to be downloaded | |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

**\SplFileObject**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `*/*`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `setRichMenuImage()`

```php
setRichMenuImage($rich_menu_id, $body)
```
### URI(s):
- https://api-data.line.me 


Upload rich menu image

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiBlobApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_id = 'rich_menu_id_example'; // string | The ID of the rich menu to attach the image to
$body = "/path/to/file.txt"; // \SplFileObject

$hostIndex = 0;
$variables = [
];

try {
    $apiInstance->setRichMenuImage($rich_menu_id, $body, $hostIndex, $variables);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiBlobApi->setRichMenuImage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_id** | **string**| The ID of the rich menu to attach the image to | |
| **body** | **\SplFileObject****\SplFileObject**|  | [optional] |
| hostIndex | null|int | Host index. Defaults to null. If null, then the library will use $this->hostIndex instead | [optional] |
| variables | array | Associative array of variables to pass to the host. Defaults to empty array. | [optional] |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
