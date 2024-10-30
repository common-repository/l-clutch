# LClutch\LineApi\ChannelAccessToken\ChannelAccessTokenApi

All URIs are relative to https://api.line.me, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**getsAllValidChannelAccessTokenKeyIds()**](ChannelAccessTokenApi.md#getsAllValidChannelAccessTokenKeyIds) | **GET** /oauth2/v2.1/tokens/kid |  |
| [**issueChannelToken()**](ChannelAccessTokenApi.md#issueChannelToken) | **POST** /v2/oauth/accessToken |  |
| [**issueChannelTokenByJWT()**](ChannelAccessTokenApi.md#issueChannelTokenByJWT) | **POST** /oauth2/v2.1/token |  |
| [**issueStatelessChannelToken()**](ChannelAccessTokenApi.md#issueStatelessChannelToken) | **POST** /oauth2/v3/token |  |
| [**revokeChannelToken()**](ChannelAccessTokenApi.md#revokeChannelToken) | **POST** /v2/oauth/revoke |  |
| [**revokeChannelTokenByJWT()**](ChannelAccessTokenApi.md#revokeChannelTokenByJWT) | **POST** /oauth2/v2.1/revoke |  |
| [**verifyChannelToken()**](ChannelAccessTokenApi.md#verifyChannelToken) | **POST** /v2/oauth/verify |  |
| [**verifyChannelTokenByJWT()**](ChannelAccessTokenApi.md#verifyChannelTokenByJWT) | **GET** /oauth2/v2.1/verify |  |


## `getsAllValidChannelAccessTokenKeyIds()`

```php
getsAllValidChannelAccessTokenKeyIds($client_assertion_type, $client_assertion): \LClutch\LineApi\ChannelAccessToken\Model\ChannelAccessTokenKeyIdsResponse
```



Gets all valid channel access token key IDs.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new LClutch\LineApi\ChannelAccessToken\Api\ChannelAccessTokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$client_assertion_type = 'client_assertion_type_example'; // string | `urn:ietf:params:oauth:client-assertion-type:jwt-bearer`
$client_assertion = 'client_assertion_example'; // string | A JSON Web Token (JWT) (opens new window)the client needs to create and sign with the private key.

try {
    $result = $apiInstance->getsAllValidChannelAccessTokenKeyIds($client_assertion_type, $client_assertion);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChannelAccessTokenApi->getsAllValidChannelAccessTokenKeyIds: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **client_assertion_type** | **string**| &#x60;urn:ietf:params:oauth:client-assertion-type:jwt-bearer&#x60; | |
| **client_assertion** | **string**| A JSON Web Token (JWT) (opens new window)the client needs to create and sign with the private key. | |

### Return type

[**\LClutch\LineApi\ChannelAccessToken\Model\ChannelAccessTokenKeyIdsResponse**](../Model/ChannelAccessTokenKeyIdsResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `issueChannelToken()`

```php
issueChannelToken($grant_type, $client_id, $client_secret): \LClutch\LineApi\ChannelAccessToken\Model\IssueShortLivedChannelAccessTokenResponse
```



Issue short-lived channel access token

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new LClutch\LineApi\ChannelAccessToken\Api\ChannelAccessTokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$grant_type = 'grant_type_example'; // string | `client_credentials`
$client_id = 'client_id_example'; // string | Channel ID.
$client_secret = 'client_secret_example'; // string | Channel secret.

try {
    $result = $apiInstance->issueChannelToken($grant_type, $client_id, $client_secret);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChannelAccessTokenApi->issueChannelToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grant_type** | **string**| &#x60;client_credentials&#x60; | [optional] |
| **client_id** | **string**| Channel ID. | [optional] |
| **client_secret** | **string**| Channel secret. | [optional] |

### Return type

[**\LClutch\LineApi\ChannelAccessToken\Model\IssueShortLivedChannelAccessTokenResponse**](../Model/IssueShortLivedChannelAccessTokenResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `issueChannelTokenByJWT()`

```php
issueChannelTokenByJWT($grant_type, $client_assertion_type, $client_assertion): \LClutch\LineApi\ChannelAccessToken\Model\IssueChannelAccessTokenResponse
```



Issues a channel access token that allows you to specify a desired expiration date. This method lets you use JWT assertion for authentication.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new LClutch\LineApi\ChannelAccessToken\Api\ChannelAccessTokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$grant_type = 'grant_type_example'; // string | client_credentials
$client_assertion_type = 'client_assertion_type_example'; // string | urn:ietf:params:oauth:client-assertion-type:jwt-bearer
$client_assertion = 'client_assertion_example'; // string | A JSON Web Token the client needs to create and sign with the private key of the Assertion Signing Key.

try {
    $result = $apiInstance->issueChannelTokenByJWT($grant_type, $client_assertion_type, $client_assertion);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChannelAccessTokenApi->issueChannelTokenByJWT: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grant_type** | **string**| client_credentials | [optional] |
| **client_assertion_type** | **string**| urn:ietf:params:oauth:client-assertion-type:jwt-bearer | [optional] |
| **client_assertion** | **string**| A JSON Web Token the client needs to create and sign with the private key of the Assertion Signing Key. | [optional] |

### Return type

[**\LClutch\LineApi\ChannelAccessToken\Model\IssueChannelAccessTokenResponse**](../Model/IssueChannelAccessTokenResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `issueStatelessChannelToken()`

```php
issueStatelessChannelToken($grant_type, $client_assertion_type, $client_assertion, $client_id, $client_secret): \LClutch\LineApi\ChannelAccessToken\Model\IssueStatelessChannelAccessTokenResponse
```



Issues a new stateless channel access token, which doesn't have max active token limit unlike the other token types. The newly issued token is only valid for 15 minutes but can not be revoked until it naturally expires.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new LClutch\LineApi\ChannelAccessToken\Api\ChannelAccessTokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$grant_type = 'grant_type_example'; // string | `client_credentials`
$client_assertion_type = 'client_assertion_type_example'; // string | URL-encoded value of `urn:ietf:params:oauth:client-assertion-type:jwt-bearer`
$client_assertion = 'client_assertion_example'; // string | A JSON Web Token the client needs to create and sign with the private key of the Assertion Signing Key.
$client_id = 'client_id_example'; // string | Channel ID.
$client_secret = 'client_secret_example'; // string | Channel secret.

try {
    $result = $apiInstance->issueStatelessChannelToken($grant_type, $client_assertion_type, $client_assertion, $client_id, $client_secret);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChannelAccessTokenApi->issueStatelessChannelToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **grant_type** | **string**| &#x60;client_credentials&#x60; | |
| **client_assertion_type** | **string**| URL-encoded value of &#x60;urn:ietf:params:oauth:client-assertion-type:jwt-bearer&#x60; | |
| **client_assertion** | **string**| A JSON Web Token the client needs to create and sign with the private key of the Assertion Signing Key. | |
| **client_id** | **string**| Channel ID. | |
| **client_secret** | **string**| Channel secret. | |

### Return type

[**\LClutch\LineApi\ChannelAccessToken\Model\IssueStatelessChannelAccessTokenResponse**](../Model/IssueStatelessChannelAccessTokenResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `revokeChannelToken()`

```php
revokeChannelToken($access_token)
```



Revoke short-lived or long-lived channel access token

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new LClutch\LineApi\ChannelAccessToken\Api\ChannelAccessTokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$access_token = 'access_token_example'; // string | Channel access token

try {
    $apiInstance->revokeChannelToken($access_token);
} catch (Exception $e) {
    echo 'Exception when calling ChannelAccessTokenApi->revokeChannelToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **access_token** | **string**| Channel access token | [optional] |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `revokeChannelTokenByJWT()`

```php
revokeChannelTokenByJWT($client_id, $client_secret, $access_token)
```



Revoke channel access token v2.1

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new LClutch\LineApi\ChannelAccessToken\Api\ChannelAccessTokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$client_id = 'client_id_example'; // string | Channel ID
$client_secret = 'client_secret_example'; // string | Channel Secret
$access_token = 'access_token_example'; // string | Channel access token

try {
    $apiInstance->revokeChannelTokenByJWT($client_id, $client_secret, $access_token);
} catch (Exception $e) {
    echo 'Exception when calling ChannelAccessTokenApi->revokeChannelTokenByJWT: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **client_id** | **string**| Channel ID | [optional] |
| **client_secret** | **string**| Channel Secret | [optional] |
| **access_token** | **string**| Channel access token | [optional] |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifyChannelToken()`

```php
verifyChannelToken($access_token): \LClutch\LineApi\ChannelAccessToken\Model\VerifyChannelAccessTokenResponse
```



Verify the validity of short-lived and long-lived channel access tokens

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new LClutch\LineApi\ChannelAccessToken\Api\ChannelAccessTokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$access_token = 'access_token_example'; // string | A short-lived or long-lived channel access token.

try {
    $result = $apiInstance->verifyChannelToken($access_token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChannelAccessTokenApi->verifyChannelToken: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **access_token** | **string**| A short-lived or long-lived channel access token. | [optional] |

### Return type

[**\LClutch\LineApi\ChannelAccessToken\Model\VerifyChannelAccessTokenResponse**](../Model/VerifyChannelAccessTokenResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: `application/x-www-form-urlencoded`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `verifyChannelTokenByJWT()`

```php
verifyChannelTokenByJWT($access_token): \LClutch\LineApi\ChannelAccessToken\Model\VerifyChannelAccessTokenResponse
```



You can verify whether a Channel access token with a user-specified expiration (Channel Access Token v2.1) is valid.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



$apiInstance = new LClutch\LineApi\ChannelAccessToken\Api\ChannelAccessTokenApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$access_token = 'access_token_example'; // string | Channel access token with a user-specified expiration (Channel Access Token v2.1).

try {
    $result = $apiInstance->verifyChannelTokenByJWT($access_token);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ChannelAccessTokenApi->verifyChannelTokenByJWT: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **access_token** | **string**| Channel access token with a user-specified expiration (Channel Access Token v2.1). | |

### Return type

[**\LClutch\LineApi\ChannelAccessToken\Model\VerifyChannelAccessTokenResponse**](../Model/VerifyChannelAccessTokenResponse.md)

### Authorization

No authorization required

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
