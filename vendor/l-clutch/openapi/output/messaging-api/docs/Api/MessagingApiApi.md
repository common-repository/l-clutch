# LClutch\LineApi\MessagingApi\MessagingApiApi

All URIs are relative to https://api.line.me, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**audienceMatch()**](MessagingApiApi.md#audienceMatch) | **POST** /bot/ad/multicast/phone |  |
| [**broadcast()**](MessagingApiApi.md#broadcast) | **POST** /v2/bot/message/broadcast |  |
| [**cancelDefaultRichMenu()**](MessagingApiApi.md#cancelDefaultRichMenu) | **DELETE** /v2/bot/user/all/richmenu |  |
| [**createRichMenu()**](MessagingApiApi.md#createRichMenu) | **POST** /v2/bot/richmenu |  |
| [**createRichMenuAlias()**](MessagingApiApi.md#createRichMenuAlias) | **POST** /v2/bot/richmenu/alias |  |
| [**deleteRichMenu()**](MessagingApiApi.md#deleteRichMenu) | **DELETE** /v2/bot/richmenu/{richMenuId} |  |
| [**deleteRichMenuAlias()**](MessagingApiApi.md#deleteRichMenuAlias) | **DELETE** /v2/bot/richmenu/alias/{richMenuAliasId} |  |
| [**getAdPhoneMessageStatistics()**](MessagingApiApi.md#getAdPhoneMessageStatistics) | **GET** /v2/bot/message/delivery/ad_phone |  |
| [**getAggregationUnitNameList()**](MessagingApiApi.md#getAggregationUnitNameList) | **GET** /v2/bot/message/aggregation/list |  |
| [**getAggregationUnitUsage()**](MessagingApiApi.md#getAggregationUnitUsage) | **GET** /v2/bot/message/aggregation/info |  |
| [**getBotInfo()**](MessagingApiApi.md#getBotInfo) | **GET** /v2/bot/info |  |
| [**getDefaultRichMenuId()**](MessagingApiApi.md#getDefaultRichMenuId) | **GET** /v2/bot/user/all/richmenu |  |
| [**getFollowers()**](MessagingApiApi.md#getFollowers) | **GET** /v2/bot/followers/ids |  |
| [**getGroupMemberCount()**](MessagingApiApi.md#getGroupMemberCount) | **GET** /v2/bot/group/{groupId}/members/count |  |
| [**getGroupMemberProfile()**](MessagingApiApi.md#getGroupMemberProfile) | **GET** /v2/bot/group/{groupId}/member/{userId} |  |
| [**getGroupMembersIds()**](MessagingApiApi.md#getGroupMembersIds) | **GET** /v2/bot/group/{groupId}/members/ids |  |
| [**getGroupSummary()**](MessagingApiApi.md#getGroupSummary) | **GET** /v2/bot/group/{groupId}/summary |  |
| [**getMessageQuota()**](MessagingApiApi.md#getMessageQuota) | **GET** /v2/bot/message/quota |  |
| [**getMessageQuotaConsumption()**](MessagingApiApi.md#getMessageQuotaConsumption) | **GET** /v2/bot/message/quota/consumption |  |
| [**getNarrowcastProgress()**](MessagingApiApi.md#getNarrowcastProgress) | **GET** /v2/bot/message/progress/narrowcast |  |
| [**getNumberOfSentBroadcastMessages()**](MessagingApiApi.md#getNumberOfSentBroadcastMessages) | **GET** /v2/bot/message/delivery/broadcast |  |
| [**getNumberOfSentMulticastMessages()**](MessagingApiApi.md#getNumberOfSentMulticastMessages) | **GET** /v2/bot/message/delivery/multicast |  |
| [**getNumberOfSentPushMessages()**](MessagingApiApi.md#getNumberOfSentPushMessages) | **GET** /v2/bot/message/delivery/push |  |
| [**getNumberOfSentReplyMessages()**](MessagingApiApi.md#getNumberOfSentReplyMessages) | **GET** /v2/bot/message/delivery/reply |  |
| [**getPNPMessageStatistics()**](MessagingApiApi.md#getPNPMessageStatistics) | **GET** /v2/bot/message/delivery/pnp |  |
| [**getProfile()**](MessagingApiApi.md#getProfile) | **GET** /v2/bot/profile/{userId} |  |
| [**getRichMenu()**](MessagingApiApi.md#getRichMenu) | **GET** /v2/bot/richmenu/{richMenuId} |  |
| [**getRichMenuAlias()**](MessagingApiApi.md#getRichMenuAlias) | **GET** /v2/bot/richmenu/alias/{richMenuAliasId} |  |
| [**getRichMenuAliasList()**](MessagingApiApi.md#getRichMenuAliasList) | **GET** /v2/bot/richmenu/alias/list |  |
| [**getRichMenuBatchProgress()**](MessagingApiApi.md#getRichMenuBatchProgress) | **GET** /v2/bot/richmenu/progress/batch |  |
| [**getRichMenuIdOfUser()**](MessagingApiApi.md#getRichMenuIdOfUser) | **GET** /v2/bot/user/{userId}/richmenu |  |
| [**getRichMenuList()**](MessagingApiApi.md#getRichMenuList) | **GET** /v2/bot/richmenu/list |  |
| [**getRoomMemberCount()**](MessagingApiApi.md#getRoomMemberCount) | **GET** /v2/bot/room/{roomId}/members/count |  |
| [**getRoomMemberProfile()**](MessagingApiApi.md#getRoomMemberProfile) | **GET** /v2/bot/room/{roomId}/member/{userId} |  |
| [**getRoomMembersIds()**](MessagingApiApi.md#getRoomMembersIds) | **GET** /v2/bot/room/{roomId}/members/ids |  |
| [**getWebhookEndpoint()**](MessagingApiApi.md#getWebhookEndpoint) | **GET** /v2/bot/channel/webhook/endpoint |  |
| [**issueLinkToken()**](MessagingApiApi.md#issueLinkToken) | **POST** /v2/bot/user/{userId}/linkToken |  |
| [**leaveGroup()**](MessagingApiApi.md#leaveGroup) | **POST** /v2/bot/group/{groupId}/leave |  |
| [**leaveRoom()**](MessagingApiApi.md#leaveRoom) | **POST** /v2/bot/room/{roomId}/leave |  |
| [**linkRichMenuIdToUser()**](MessagingApiApi.md#linkRichMenuIdToUser) | **POST** /v2/bot/user/{userId}/richmenu/{richMenuId} |  |
| [**linkRichMenuIdToUsers()**](MessagingApiApi.md#linkRichMenuIdToUsers) | **POST** /v2/bot/richmenu/bulk/link |  |
| [**markMessagesAsRead()**](MessagingApiApi.md#markMessagesAsRead) | **POST** /v2/bot/message/markAsRead |  |
| [**multicast()**](MessagingApiApi.md#multicast) | **POST** /v2/bot/message/multicast |  |
| [**narrowcast()**](MessagingApiApi.md#narrowcast) | **POST** /v2/bot/message/narrowcast |  |
| [**pushMessage()**](MessagingApiApi.md#pushMessage) | **POST** /v2/bot/message/push |  |
| [**pushMessagesByPhone()**](MessagingApiApi.md#pushMessagesByPhone) | **POST** /bot/pnp/push |  |
| [**replyMessage()**](MessagingApiApi.md#replyMessage) | **POST** /v2/bot/message/reply |  |
| [**richMenuBatch()**](MessagingApiApi.md#richMenuBatch) | **POST** /v2/bot/richmenu/batch |  |
| [**setDefaultRichMenu()**](MessagingApiApi.md#setDefaultRichMenu) | **POST** /v2/bot/user/all/richmenu/{richMenuId} |  |
| [**setWebhookEndpoint()**](MessagingApiApi.md#setWebhookEndpoint) | **PUT** /v2/bot/channel/webhook/endpoint |  |
| [**testWebhookEndpoint()**](MessagingApiApi.md#testWebhookEndpoint) | **POST** /v2/bot/channel/webhook/test |  |
| [**unlinkRichMenuIdFromUser()**](MessagingApiApi.md#unlinkRichMenuIdFromUser) | **DELETE** /v2/bot/user/{userId}/richmenu |  |
| [**unlinkRichMenuIdFromUsers()**](MessagingApiApi.md#unlinkRichMenuIdFromUsers) | **POST** /v2/bot/richmenu/bulk/unlink |  |
| [**updateRichMenuAlias()**](MessagingApiApi.md#updateRichMenuAlias) | **POST** /v2/bot/richmenu/alias/{richMenuAliasId} |  |
| [**validateBroadcast()**](MessagingApiApi.md#validateBroadcast) | **POST** /v2/bot/message/validate/broadcast |  |
| [**validateMulticast()**](MessagingApiApi.md#validateMulticast) | **POST** /v2/bot/message/validate/multicast |  |
| [**validateNarrowcast()**](MessagingApiApi.md#validateNarrowcast) | **POST** /v2/bot/message/validate/narrowcast |  |
| [**validatePush()**](MessagingApiApi.md#validatePush) | **POST** /v2/bot/message/validate/push |  |
| [**validateReply()**](MessagingApiApi.md#validateReply) | **POST** /v2/bot/message/validate/reply |  |
| [**validateRichMenuBatchRequest()**](MessagingApiApi.md#validateRichMenuBatchRequest) | **POST** /v2/bot/richmenu/validate/batch |  |
| [**validateRichMenuObject()**](MessagingApiApi.md#validateRichMenuObject) | **POST** /v2/bot/richmenu/validate |  |


## `audienceMatch()`

```php
audienceMatch($audience_match_messages_request)
```



Send a message using phone number

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$audience_match_messages_request = new \LClutch\LineApi\MessagingApi\Model\AudienceMatchMessagesRequest(); // \LClutch\LineApi\MessagingApi\Model\AudienceMatchMessagesRequest

try {
    $apiInstance->audienceMatch($audience_match_messages_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->audienceMatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **audience_match_messages_request** | [**\LClutch\LineApi\MessagingApi\Model\AudienceMatchMessagesRequest**](../Model/AudienceMatchMessagesRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `broadcast()`

```php
broadcast($broadcast_request, $x_line_retry_key): object
```



Sends a message to multiple users at any time.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$broadcast_request = new \LClutch\LineApi\MessagingApi\Model\BroadcastRequest(); // \LClutch\LineApi\MessagingApi\Model\BroadcastRequest
$x_line_retry_key = 'x_line_retry_key_example'; // string | Retry key. Specifies the UUID in hexadecimal format (e.g., `123e4567-e89b-12d3-a456-426614174000`) generated by any method. The retry key isn't generated by LINE. Each developer must generate their own retry key.

try {
    $result = $apiInstance->broadcast($broadcast_request, $x_line_retry_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->broadcast: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **broadcast_request** | [**\LClutch\LineApi\MessagingApi\Model\BroadcastRequest**](../Model/BroadcastRequest.md)|  | |
| **x_line_retry_key** | **string**| Retry key. Specifies the UUID in hexadecimal format (e.g., &#x60;123e4567-e89b-12d3-a456-426614174000&#x60;) generated by any method. The retry key isn&#39;t generated by LINE. Each developer must generate their own retry key. | [optional] |

### Return type

**object**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `cancelDefaultRichMenu()`

```php
cancelDefaultRichMenu()
```



Cancel default rich menu

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $apiInstance->cancelDefaultRichMenu();
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->cancelDefaultRichMenu: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

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

## `createRichMenu()`

```php
createRichMenu($rich_menu_request): \LClutch\LineApi\MessagingApi\Model\RichMenuIdResponse
```



Create rich menu

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_request = new \LClutch\LineApi\MessagingApi\Model\RichMenuRequest(); // \LClutch\LineApi\MessagingApi\Model\RichMenuRequest

try {
    $result = $apiInstance->createRichMenu($rich_menu_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->createRichMenu: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_request** | [**\LClutch\LineApi\MessagingApi\Model\RichMenuRequest**](../Model/RichMenuRequest.md)|  | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RichMenuIdResponse**](../Model/RichMenuIdResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `createRichMenuAlias()`

```php
createRichMenuAlias($create_rich_menu_alias_request)
```



Create rich menu alias

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$create_rich_menu_alias_request = new \LClutch\LineApi\MessagingApi\Model\CreateRichMenuAliasRequest(); // \LClutch\LineApi\MessagingApi\Model\CreateRichMenuAliasRequest

try {
    $apiInstance->createRichMenuAlias($create_rich_menu_alias_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->createRichMenuAlias: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **create_rich_menu_alias_request** | [**\LClutch\LineApi\MessagingApi\Model\CreateRichMenuAliasRequest**](../Model/CreateRichMenuAliasRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `deleteRichMenu()`

```php
deleteRichMenu($rich_menu_id)
```



Deletes a rich menu.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_id = 'rich_menu_id_example'; // string | ID of a rich menu

try {
    $apiInstance->deleteRichMenu($rich_menu_id);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->deleteRichMenu: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_id** | **string**| ID of a rich menu | |

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

## `deleteRichMenuAlias()`

```php
deleteRichMenuAlias($rich_menu_alias_id)
```



Delete rich menu alias

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_alias_id = 'rich_menu_alias_id_example'; // string | Rich menu alias ID that you want to delete.

try {
    $apiInstance->deleteRichMenuAlias($rich_menu_alias_id);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->deleteRichMenuAlias: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_alias_id** | **string**| Rich menu alias ID that you want to delete. | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAdPhoneMessageStatistics()`

```php
getAdPhoneMessageStatistics($date): \LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse
```



Get result of message delivery using phone number

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = 'date_example'; // string | Date the message was sent  Format: `yyyyMMdd` (e.g. `20190831`) Time Zone: UTC+9

try {
    $result = $apiInstance->getAdPhoneMessageStatistics($date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getAdPhoneMessageStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **date** | **string**| Date the message was sent  Format: &#x60;yyyyMMdd&#x60; (e.g. &#x60;20190831&#x60;) Time Zone: UTC+9 | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse**](../Model/NumberOfMessagesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAggregationUnitNameList()`

```php
getAggregationUnitNameList($limit, $start): \LClutch\LineApi\MessagingApi\Model\GetAggregationUnitNameListResponse
```



Get name list of units used this month

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$limit = 'limit_example'; // string | The maximum number of aggregation units you can get per request.
$start = 'start_example'; // string | Value of the continuation token found in the next property of the JSON object returned in the response. If you can't get all the aggregation units in one request, include this parameter to get the remaining array.

try {
    $result = $apiInstance->getAggregationUnitNameList($limit, $start);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getAggregationUnitNameList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **limit** | **string**| The maximum number of aggregation units you can get per request. | [optional] |
| **start** | **string**| Value of the continuation token found in the next property of the JSON object returned in the response. If you can&#39;t get all the aggregation units in one request, include this parameter to get the remaining array. | [optional] |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\GetAggregationUnitNameListResponse**](../Model/GetAggregationUnitNameListResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAggregationUnitUsage()`

```php
getAggregationUnitUsage(): \LClutch\LineApi\MessagingApi\Model\GetAggregationUnitUsageResponse
```



Get number of units used this month

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getAggregationUnitUsage();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getAggregationUnitUsage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LClutch\LineApi\MessagingApi\Model\GetAggregationUnitUsageResponse**](../Model/GetAggregationUnitUsageResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBotInfo()`

```php
getBotInfo(): \LClutch\LineApi\MessagingApi\Model\BotInfoResponse
```



Get bot info

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getBotInfo();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getBotInfo: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LClutch\LineApi\MessagingApi\Model\BotInfoResponse**](../Model/BotInfoResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getDefaultRichMenuId()`

```php
getDefaultRichMenuId(): \LClutch\LineApi\MessagingApi\Model\RichMenuIdResponse
```



Gets the ID of the default rich menu set with the Messaging API.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getDefaultRichMenuId();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getDefaultRichMenuId: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RichMenuIdResponse**](../Model/RichMenuIdResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getFollowers()`

```php
getFollowers($start, $limit): \LClutch\LineApi\MessagingApi\Model\GetFollowersResponse
```



Get a list of users who added your LINE Official Account as a friend

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$start = 'start_example'; // string | Value of the continuation token found in the next property of the JSON object returned in the response. Include this parameter to get the next array of user IDs.
$limit = 300; // int | The maximum number of user IDs to retrieve in a single request.

try {
    $result = $apiInstance->getFollowers($start, $limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getFollowers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **start** | **string**| Value of the continuation token found in the next property of the JSON object returned in the response. Include this parameter to get the next array of user IDs. | [optional] |
| **limit** | **int**| The maximum number of user IDs to retrieve in a single request. | [optional] [default to 300] |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\GetFollowersResponse**](../Model/GetFollowersResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGroupMemberCount()`

```php
getGroupMemberCount($group_id): \LClutch\LineApi\MessagingApi\Model\GroupMemberCountResponse
```



Get number of users in a group chat

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Group ID

try {
    $result = $apiInstance->getGroupMemberCount($group_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getGroupMemberCount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Group ID | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\GroupMemberCountResponse**](../Model/GroupMemberCountResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGroupMemberProfile()`

```php
getGroupMemberProfile($group_id, $user_id): \LClutch\LineApi\MessagingApi\Model\GroupUserProfileResponse
```



Get group chat member profile

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Group ID
$user_id = 'user_id_example'; // string | User ID

try {
    $result = $apiInstance->getGroupMemberProfile($group_id, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getGroupMemberProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Group ID | |
| **user_id** | **string**| User ID | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\GroupUserProfileResponse**](../Model/GroupUserProfileResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGroupMembersIds()`

```php
getGroupMembersIds($group_id, $start): \LClutch\LineApi\MessagingApi\Model\MembersIdsResponse
```



Get group chat member user IDs

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Group ID
$start = 'start_example'; // string | Value of the continuation token found in the `next` property of the JSON object returned in the response. Include this parameter to get the next array of user IDs for the members of the group.

try {
    $result = $apiInstance->getGroupMembersIds($group_id, $start);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getGroupMembersIds: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Group ID | |
| **start** | **string**| Value of the continuation token found in the &#x60;next&#x60; property of the JSON object returned in the response. Include this parameter to get the next array of user IDs for the members of the group. | [optional] |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\MembersIdsResponse**](../Model/MembersIdsResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getGroupSummary()`

```php
getGroupSummary($group_id): \LClutch\LineApi\MessagingApi\Model\GroupSummaryResponse
```



Get group chat summary

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Group ID

try {
    $result = $apiInstance->getGroupSummary($group_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getGroupSummary: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Group ID | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\GroupSummaryResponse**](../Model/GroupSummaryResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMessageQuota()`

```php
getMessageQuota(): \LClutch\LineApi\MessagingApi\Model\MessageQuotaResponse
```



Gets the target limit for sending messages in the current month. The total number of the free messages and the additional messages is returned.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getMessageQuota();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getMessageQuota: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LClutch\LineApi\MessagingApi\Model\MessageQuotaResponse**](../Model/MessageQuotaResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMessageQuotaConsumption()`

```php
getMessageQuotaConsumption(): \LClutch\LineApi\MessagingApi\Model\QuotaConsumptionResponse
```



Gets the number of messages sent in the current month.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getMessageQuotaConsumption();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getMessageQuotaConsumption: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LClutch\LineApi\MessagingApi\Model\QuotaConsumptionResponse**](../Model/QuotaConsumptionResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNarrowcastProgress()`

```php
getNarrowcastProgress($request_id): \LClutch\LineApi\MessagingApi\Model\NarrowcastProgressResponse
```



Gets the status of a narrowcast message.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_id = 'request_id_example'; // string | The narrowcast message's request ID. Each Messaging API request has a request ID.

try {
    $result = $apiInstance->getNarrowcastProgress($request_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getNarrowcastProgress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_id** | **string**| The narrowcast message&#39;s request ID. Each Messaging API request has a request ID. | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\NarrowcastProgressResponse**](../Model/NarrowcastProgressResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNumberOfSentBroadcastMessages()`

```php
getNumberOfSentBroadcastMessages($date): \LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse
```



Get number of sent broadcast messages

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = 'date_example'; // string | Date the messages were sent  Format: yyyyMMdd (e.g. 20191231) Timezone: UTC+9

try {
    $result = $apiInstance->getNumberOfSentBroadcastMessages($date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getNumberOfSentBroadcastMessages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **date** | **string**| Date the messages were sent  Format: yyyyMMdd (e.g. 20191231) Timezone: UTC+9 | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse**](../Model/NumberOfMessagesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNumberOfSentMulticastMessages()`

```php
getNumberOfSentMulticastMessages($date): \LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse
```



Get number of sent multicast messages

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = 'date_example'; // string | Date the messages were sent  Format: `yyyyMMdd` (e.g. `20191231`) Timezone: UTC+9

try {
    $result = $apiInstance->getNumberOfSentMulticastMessages($date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getNumberOfSentMulticastMessages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **date** | **string**| Date the messages were sent  Format: &#x60;yyyyMMdd&#x60; (e.g. &#x60;20191231&#x60;) Timezone: UTC+9 | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse**](../Model/NumberOfMessagesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNumberOfSentPushMessages()`

```php
getNumberOfSentPushMessages($date): \LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse
```



Get number of sent push messages

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = 'date_example'; // string | Date the messages were sent  Format: `yyyyMMdd` (e.g. `20191231`) Timezone: UTC+9

try {
    $result = $apiInstance->getNumberOfSentPushMessages($date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getNumberOfSentPushMessages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **date** | **string**| Date the messages were sent  Format: &#x60;yyyyMMdd&#x60; (e.g. &#x60;20191231&#x60;) Timezone: UTC+9 | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse**](../Model/NumberOfMessagesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getNumberOfSentReplyMessages()`

```php
getNumberOfSentReplyMessages($date): \LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse
```



Get number of sent reply messages

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = 'date_example'; // string | Date the messages were sent  Format: `yyyyMMdd` (e.g. `20191231`) Timezone: UTC+9

try {
    $result = $apiInstance->getNumberOfSentReplyMessages($date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getNumberOfSentReplyMessages: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **date** | **string**| Date the messages were sent  Format: &#x60;yyyyMMdd&#x60; (e.g. &#x60;20191231&#x60;) Timezone: UTC+9 | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse**](../Model/NumberOfMessagesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getPNPMessageStatistics()`

```php
getPNPMessageStatistics($date): \LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse
```



Get number of sent LINE notification messages　

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$date = 'date_example'; // string | Date the message was sent  Format: `yyyyMMdd` (Example:`20211231`) Time zone: UTC+9

try {
    $result = $apiInstance->getPNPMessageStatistics($date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getPNPMessageStatistics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **date** | **string**| Date the message was sent  Format: &#x60;yyyyMMdd&#x60; (Example:&#x60;20211231&#x60;) Time zone: UTC+9 | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\NumberOfMessagesResponse**](../Model/NumberOfMessagesResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getProfile()`

```php
getProfile($user_id): \LClutch\LineApi\MessagingApi\Model\UserProfileResponse
```



Get profile

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | User ID

try {
    $result = $apiInstance->getProfile($user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| User ID | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\UserProfileResponse**](../Model/UserProfileResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRichMenu()`

```php
getRichMenu($rich_menu_id): \LClutch\LineApi\MessagingApi\Model\RichMenuResponse
```



Gets a rich menu via a rich menu ID.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_id = 'rich_menu_id_example'; // string | ID of a rich menu

try {
    $result = $apiInstance->getRichMenu($rich_menu_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getRichMenu: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_id** | **string**| ID of a rich menu | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RichMenuResponse**](../Model/RichMenuResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRichMenuAlias()`

```php
getRichMenuAlias($rich_menu_alias_id): \LClutch\LineApi\MessagingApi\Model\RichMenuAliasResponse
```



Get rich menu alias information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_alias_id = 'rich_menu_alias_id_example'; // string | The rich menu alias ID whose information you want to obtain.

try {
    $result = $apiInstance->getRichMenuAlias($rich_menu_alias_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getRichMenuAlias: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_alias_id** | **string**| The rich menu alias ID whose information you want to obtain. | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RichMenuAliasResponse**](../Model/RichMenuAliasResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRichMenuAliasList()`

```php
getRichMenuAliasList(): \LClutch\LineApi\MessagingApi\Model\RichMenuAliasListResponse
```



Get list of rich menu alias

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRichMenuAliasList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getRichMenuAliasList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RichMenuAliasListResponse**](../Model/RichMenuAliasListResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRichMenuBatchProgress()`

```php
getRichMenuBatchProgress($request_id): \LClutch\LineApi\MessagingApi\Model\RichMenuBatchProgressResponse
```



Get the status of Replace or unlink a linked rich menus in batches.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_id = 'request_id_example'; // string | A request ID used to batch control the rich menu linked to the user. Each Messaging API request has a request ID.

try {
    $result = $apiInstance->getRichMenuBatchProgress($request_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getRichMenuBatchProgress: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **request_id** | **string**| A request ID used to batch control the rich menu linked to the user. Each Messaging API request has a request ID. | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RichMenuBatchProgressResponse**](../Model/RichMenuBatchProgressResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRichMenuIdOfUser()`

```php
getRichMenuIdOfUser($user_id): \LClutch\LineApi\MessagingApi\Model\RichMenuIdResponse
```



Get rich menu ID of user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | User ID. Found in the `source` object of webhook event objects. Do not use the LINE ID used in LINE.

try {
    $result = $apiInstance->getRichMenuIdOfUser($user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getRichMenuIdOfUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| User ID. Found in the &#x60;source&#x60; object of webhook event objects. Do not use the LINE ID used in LINE. | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RichMenuIdResponse**](../Model/RichMenuIdResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRichMenuList()`

```php
getRichMenuList(): \LClutch\LineApi\MessagingApi\Model\RichMenuListResponse
```



Get rich menu list

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getRichMenuList();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getRichMenuList: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RichMenuListResponse**](../Model/RichMenuListResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRoomMemberCount()`

```php
getRoomMemberCount($room_id): \LClutch\LineApi\MessagingApi\Model\RoomMemberCountResponse
```



Get number of users in a multi-person chat

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$room_id = 'room_id_example'; // string | Room ID

try {
    $result = $apiInstance->getRoomMemberCount($room_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getRoomMemberCount: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **room_id** | **string**| Room ID | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RoomMemberCountResponse**](../Model/RoomMemberCountResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRoomMemberProfile()`

```php
getRoomMemberProfile($room_id, $user_id): \LClutch\LineApi\MessagingApi\Model\RoomUserProfileResponse
```



Get multi-person chat member profile

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$room_id = 'room_id_example'; // string | Room ID
$user_id = 'user_id_example'; // string | User ID

try {
    $result = $apiInstance->getRoomMemberProfile($room_id, $user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getRoomMemberProfile: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **room_id** | **string**| Room ID | |
| **user_id** | **string**| User ID | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\RoomUserProfileResponse**](../Model/RoomUserProfileResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getRoomMembersIds()`

```php
getRoomMembersIds($room_id, $start): \LClutch\LineApi\MessagingApi\Model\MembersIdsResponse
```



Get multi-person chat member user IDs

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$room_id = 'room_id_example'; // string | Room ID
$start = 'start_example'; // string | Value of the continuation token found in the `next` property of the JSON object returned in the response. Include this parameter to get the next array of user IDs for the members of the group.

try {
    $result = $apiInstance->getRoomMembersIds($room_id, $start);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getRoomMembersIds: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **room_id** | **string**| Room ID | |
| **start** | **string**| Value of the continuation token found in the &#x60;next&#x60; property of the JSON object returned in the response. Include this parameter to get the next array of user IDs for the members of the group. | [optional] |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\MembersIdsResponse**](../Model/MembersIdsResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getWebhookEndpoint()`

```php
getWebhookEndpoint(): \LClutch\LineApi\MessagingApi\Model\GetWebhookEndpointResponse
```



Get webhook endpoint information

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getWebhookEndpoint();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->getWebhookEndpoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\LClutch\LineApi\MessagingApi\Model\GetWebhookEndpointResponse**](../Model/GetWebhookEndpointResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `issueLinkToken()`

```php
issueLinkToken($user_id): \LClutch\LineApi\MessagingApi\Model\IssueLinkTokenResponse
```



Issue link token

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | User ID for the LINE account to be linked. Found in the `source` object of account link event objects. Do not use the LINE ID used in LINE.

try {
    $result = $apiInstance->issueLinkToken($user_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->issueLinkToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| User ID for the LINE account to be linked. Found in the &#x60;source&#x60; object of account link event objects. Do not use the LINE ID used in LINE. | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\IssueLinkTokenResponse**](../Model/IssueLinkTokenResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `leaveGroup()`

```php
leaveGroup($group_id)
```



Leave group chat

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$group_id = 'group_id_example'; // string | Group ID

try {
    $apiInstance->leaveGroup($group_id);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->leaveGroup: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **group_id** | **string**| Group ID | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `leaveRoom()`

```php
leaveRoom($room_id)
```



Leave multi-person chat

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$room_id = 'room_id_example'; // string | Room ID

try {
    $apiInstance->leaveRoom($room_id);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->leaveRoom: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **room_id** | **string**| Room ID | |

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

## `linkRichMenuIdToUser()`

```php
linkRichMenuIdToUser($user_id, $rich_menu_id)
```



Link rich menu to user.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | User ID. Found in the `source` object of webhook event objects. Do not use the LINE ID used in LINE.
$rich_menu_id = 'rich_menu_id_example'; // string | ID of a rich menu

try {
    $apiInstance->linkRichMenuIdToUser($user_id, $rich_menu_id);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->linkRichMenuIdToUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| User ID. Found in the &#x60;source&#x60; object of webhook event objects. Do not use the LINE ID used in LINE. | |
| **rich_menu_id** | **string**| ID of a rich menu | |

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

## `linkRichMenuIdToUsers()`

```php
linkRichMenuIdToUsers($rich_menu_bulk_link_request)
```



Link rich menu to multiple users

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_bulk_link_request = new \LClutch\LineApi\MessagingApi\Model\RichMenuBulkLinkRequest(); // \LClutch\LineApi\MessagingApi\Model\RichMenuBulkLinkRequest

try {
    $apiInstance->linkRichMenuIdToUsers($rich_menu_bulk_link_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->linkRichMenuIdToUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_bulk_link_request** | [**\LClutch\LineApi\MessagingApi\Model\RichMenuBulkLinkRequest**](../Model/RichMenuBulkLinkRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `markMessagesAsRead()`

```php
markMessagesAsRead($mark_messages_as_read_request)
```



Mark messages from users as read

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$mark_messages_as_read_request = {"chat":{"userId":"Uxxxxxxxxxxxxxxxxxx"}}; // \LClutch\LineApi\MessagingApi\Model\MarkMessagesAsReadRequest

try {
    $apiInstance->markMessagesAsRead($mark_messages_as_read_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->markMessagesAsRead: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **mark_messages_as_read_request** | [**\LClutch\LineApi\MessagingApi\Model\MarkMessagesAsReadRequest**](../Model/MarkMessagesAsReadRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `multicast()`

```php
multicast($multicast_request, $x_line_retry_key): object
```



An API that efficiently sends the same message to multiple user IDs. You can't send messages to group chats or multi-person chats.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$multicast_request = new \LClutch\LineApi\MessagingApi\Model\MulticastRequest(); // \LClutch\LineApi\MessagingApi\Model\MulticastRequest
$x_line_retry_key = 'x_line_retry_key_example'; // string | Retry key. Specifies the UUID in hexadecimal format (e.g., `123e4567-e89b-12d3-a456-426614174000`) generated by any method. The retry key isn't generated by LINE. Each developer must generate their own retry key.

try {
    $result = $apiInstance->multicast($multicast_request, $x_line_retry_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->multicast: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **multicast_request** | [**\LClutch\LineApi\MessagingApi\Model\MulticastRequest**](../Model/MulticastRequest.md)|  | |
| **x_line_retry_key** | **string**| Retry key. Specifies the UUID in hexadecimal format (e.g., &#x60;123e4567-e89b-12d3-a456-426614174000&#x60;) generated by any method. The retry key isn&#39;t generated by LINE. Each developer must generate their own retry key. | [optional] |

### Return type

**object**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `narrowcast()`

```php
narrowcast($narrowcast_request, $x_line_retry_key): object
```



Send narrowcast message

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$narrowcast_request = new \LClutch\LineApi\MessagingApi\Model\NarrowcastRequest(); // \LClutch\LineApi\MessagingApi\Model\NarrowcastRequest
$x_line_retry_key = 'x_line_retry_key_example'; // string | Retry key. Specifies the UUID in hexadecimal format (e.g., `123e4567-e89b-12d3-a456-426614174000`) generated by any method. The retry key isn't generated by LINE. Each developer must generate their own retry key.

try {
    $result = $apiInstance->narrowcast($narrowcast_request, $x_line_retry_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->narrowcast: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **narrowcast_request** | [**\LClutch\LineApi\MessagingApi\Model\NarrowcastRequest**](../Model/NarrowcastRequest.md)|  | |
| **x_line_retry_key** | **string**| Retry key. Specifies the UUID in hexadecimal format (e.g., &#x60;123e4567-e89b-12d3-a456-426614174000&#x60;) generated by any method. The retry key isn&#39;t generated by LINE. Each developer must generate their own retry key. | [optional] |

### Return type

**object**

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pushMessage()`

```php
pushMessage($push_message_request, $x_line_retry_key): \LClutch\LineApi\MessagingApi\Model\PushMessageResponse
```



Sends a message to a user, group chat, or multi-person chat at any time.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$push_message_request = new \LClutch\LineApi\MessagingApi\Model\PushMessageRequest(); // \LClutch\LineApi\MessagingApi\Model\PushMessageRequest
$x_line_retry_key = 'x_line_retry_key_example'; // string | Retry key. Specifies the UUID in hexadecimal format (e.g., `123e4567-e89b-12d3-a456-426614174000`) generated by any method. The retry key isn't generated by LINE. Each developer must generate their own retry key.

try {
    $result = $apiInstance->pushMessage($push_message_request, $x_line_retry_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->pushMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **push_message_request** | [**\LClutch\LineApi\MessagingApi\Model\PushMessageRequest**](../Model/PushMessageRequest.md)|  | |
| **x_line_retry_key** | **string**| Retry key. Specifies the UUID in hexadecimal format (e.g., &#x60;123e4567-e89b-12d3-a456-426614174000&#x60;) generated by any method. The retry key isn&#39;t generated by LINE. Each developer must generate their own retry key. | [optional] |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\PushMessageResponse**](../Model/PushMessageResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `pushMessagesByPhone()`

```php
pushMessagesByPhone($pnp_messages_request, $x_line_delivery_tag)
```



Send LINE notification message

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$pnp_messages_request = new \LClutch\LineApi\MessagingApi\Model\PnpMessagesRequest(); // \LClutch\LineApi\MessagingApi\Model\PnpMessagesRequest
$x_line_delivery_tag = 'x_line_delivery_tag_example'; // string | String returned in the delivery.data property of the delivery completion event via Webhook.

try {
    $apiInstance->pushMessagesByPhone($pnp_messages_request, $x_line_delivery_tag);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->pushMessagesByPhone: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **pnp_messages_request** | [**\LClutch\LineApi\MessagingApi\Model\PnpMessagesRequest**](../Model/PnpMessagesRequest.md)|  | |
| **x_line_delivery_tag** | **string**| String returned in the delivery.data property of the delivery completion event via Webhook. | [optional] |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `replyMessage()`

```php
replyMessage($reply_message_request): \LClutch\LineApi\MessagingApi\Model\ReplyMessageResponse
```



Send reply message

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$reply_message_request = new \LClutch\LineApi\MessagingApi\Model\ReplyMessageRequest(); // \LClutch\LineApi\MessagingApi\Model\ReplyMessageRequest

try {
    $result = $apiInstance->replyMessage($reply_message_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->replyMessage: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **reply_message_request** | [**\LClutch\LineApi\MessagingApi\Model\ReplyMessageRequest**](../Model/ReplyMessageRequest.md)|  | |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\ReplyMessageResponse**](../Model/ReplyMessageResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `richMenuBatch()`

```php
richMenuBatch($rich_menu_batch_request)
```



You can use this endpoint to batch control the rich menu linked to the users using the endpoint such as Link rich menu to user.  The following operations are available:  1. Replace a rich menu with another rich menu for all users linked to a specific rich menu 2. Unlink a rich menu for all users linked to a specific rich menu 3. Unlink a rich menu for all users linked the rich menu

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_batch_request = new \LClutch\LineApi\MessagingApi\Model\RichMenuBatchRequest(); // \LClutch\LineApi\MessagingApi\Model\RichMenuBatchRequest

try {
    $apiInstance->richMenuBatch($rich_menu_batch_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->richMenuBatch: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_batch_request** | [**\LClutch\LineApi\MessagingApi\Model\RichMenuBatchRequest**](../Model/RichMenuBatchRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `setDefaultRichMenu()`

```php
setDefaultRichMenu($rich_menu_id)
```



Set default rich menu

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_id = 'rich_menu_id_example'; // string | ID of a rich menu

try {
    $apiInstance->setDefaultRichMenu($rich_menu_id);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->setDefaultRichMenu: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_id** | **string**| ID of a rich menu | |

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

## `setWebhookEndpoint()`

```php
setWebhookEndpoint($set_webhook_endpoint_request)
```



Set webhook endpoint URL

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$set_webhook_endpoint_request = new \LClutch\LineApi\MessagingApi\Model\SetWebhookEndpointRequest(); // \LClutch\LineApi\MessagingApi\Model\SetWebhookEndpointRequest

try {
    $apiInstance->setWebhookEndpoint($set_webhook_endpoint_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->setWebhookEndpoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **set_webhook_endpoint_request** | [**\LClutch\LineApi\MessagingApi\Model\SetWebhookEndpointRequest**](../Model/SetWebhookEndpointRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `testWebhookEndpoint()`

```php
testWebhookEndpoint($test_webhook_endpoint_request): \LClutch\LineApi\MessagingApi\Model\TestWebhookEndpointResponse
```



Test webhook endpoint

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$test_webhook_endpoint_request = new \LClutch\LineApi\MessagingApi\Model\TestWebhookEndpointRequest(); // \LClutch\LineApi\MessagingApi\Model\TestWebhookEndpointRequest

try {
    $result = $apiInstance->testWebhookEndpoint($test_webhook_endpoint_request);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->testWebhookEndpoint: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **test_webhook_endpoint_request** | [**\LClutch\LineApi\MessagingApi\Model\TestWebhookEndpointRequest**](../Model/TestWebhookEndpointRequest.md)|  | [optional] |

### Return type

[**\LClutch\LineApi\MessagingApi\Model\TestWebhookEndpointResponse**](../Model/TestWebhookEndpointResponse.md)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `unlinkRichMenuIdFromUser()`

```php
unlinkRichMenuIdFromUser($user_id)
```



Unlink rich menu from user

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user_id = 'user_id_example'; // string | User ID. Found in the `source` object of webhook event objects. Do not use the LINE ID used in LINE.

try {
    $apiInstance->unlinkRichMenuIdFromUser($user_id);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->unlinkRichMenuIdFromUser: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **user_id** | **string**| User ID. Found in the &#x60;source&#x60; object of webhook event objects. Do not use the LINE ID used in LINE. | |

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

## `unlinkRichMenuIdFromUsers()`

```php
unlinkRichMenuIdFromUsers($rich_menu_bulk_unlink_request)
```



Unlink rich menus from multiple users

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_bulk_unlink_request = new \LClutch\LineApi\MessagingApi\Model\RichMenuBulkUnlinkRequest(); // \LClutch\LineApi\MessagingApi\Model\RichMenuBulkUnlinkRequest

try {
    $apiInstance->unlinkRichMenuIdFromUsers($rich_menu_bulk_unlink_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->unlinkRichMenuIdFromUsers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_bulk_unlink_request** | [**\LClutch\LineApi\MessagingApi\Model\RichMenuBulkUnlinkRequest**](../Model/RichMenuBulkUnlinkRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateRichMenuAlias()`

```php
updateRichMenuAlias($rich_menu_alias_id, $update_rich_menu_alias_request)
```



Update rich menu alias

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_alias_id = 'rich_menu_alias_id_example'; // string | The rich menu alias ID you want to update.
$update_rich_menu_alias_request = new \LClutch\LineApi\MessagingApi\Model\UpdateRichMenuAliasRequest(); // \LClutch\LineApi\MessagingApi\Model\UpdateRichMenuAliasRequest

try {
    $apiInstance->updateRichMenuAlias($rich_menu_alias_id, $update_rich_menu_alias_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->updateRichMenuAlias: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_alias_id** | **string**| The rich menu alias ID you want to update. | |
| **update_rich_menu_alias_request** | [**\LClutch\LineApi\MessagingApi\Model\UpdateRichMenuAliasRequest**](../Model/UpdateRichMenuAliasRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateBroadcast()`

```php
validateBroadcast($validate_message_request)
```



Validate message objects of a broadcast message

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$validate_message_request = new \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest(); // \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest

try {
    $apiInstance->validateBroadcast($validate_message_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->validateBroadcast: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **validate_message_request** | [**\LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest**](../Model/ValidateMessageRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateMulticast()`

```php
validateMulticast($validate_message_request)
```



Validate message objects of a multicast message

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$validate_message_request = new \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest(); // \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest

try {
    $apiInstance->validateMulticast($validate_message_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->validateMulticast: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **validate_message_request** | [**\LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest**](../Model/ValidateMessageRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateNarrowcast()`

```php
validateNarrowcast($validate_message_request)
```



Validate message objects of a narrowcast message

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$validate_message_request = new \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest(); // \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest

try {
    $apiInstance->validateNarrowcast($validate_message_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->validateNarrowcast: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **validate_message_request** | [**\LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest**](../Model/ValidateMessageRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validatePush()`

```php
validatePush($validate_message_request)
```



Validate message objects of a push message

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$validate_message_request = new \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest(); // \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest

try {
    $apiInstance->validatePush($validate_message_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->validatePush: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **validate_message_request** | [**\LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest**](../Model/ValidateMessageRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateReply()`

```php
validateReply($validate_message_request)
```



Validate message objects of a reply message

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$validate_message_request = new \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest(); // \LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest

try {
    $apiInstance->validateReply($validate_message_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->validateReply: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **validate_message_request** | [**\LClutch\LineApi\MessagingApi\Model\ValidateMessageRequest**](../Model/ValidateMessageRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateRichMenuBatchRequest()`

```php
validateRichMenuBatchRequest($rich_menu_batch_request)
```



Validate a request body of the Replace or unlink the linked rich menus in batches endpoint.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_batch_request = new \LClutch\LineApi\MessagingApi\Model\RichMenuBatchRequest(); // \LClutch\LineApi\MessagingApi\Model\RichMenuBatchRequest

try {
    $apiInstance->validateRichMenuBatchRequest($rich_menu_batch_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->validateRichMenuBatchRequest: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_batch_request** | [**\LClutch\LineApi\MessagingApi\Model\RichMenuBatchRequest**](../Model/RichMenuBatchRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `validateRichMenuObject()`

```php
validateRichMenuObject($rich_menu_request)
```



Validate rich menu object

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: Bearer
$config = LClutch\LineApi\MessagingApi\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new LClutch\LineApi\MessagingApi\Api\MessagingApiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$rich_menu_request = new \LClutch\LineApi\MessagingApi\Model\RichMenuRequest(); // \LClutch\LineApi\MessagingApi\Model\RichMenuRequest

try {
    $apiInstance->validateRichMenuObject($rich_menu_request);
} catch (Exception $e) {
    echo 'Exception when calling MessagingApiApi->validateRichMenuObject: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **rich_menu_request** | [**\LClutch\LineApi\MessagingApi\Model\RichMenuRequest**](../Model/RichMenuRequest.md)|  | |

### Return type

void (empty response body)

### Authorization

[Bearer](../../README.md#Bearer)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
