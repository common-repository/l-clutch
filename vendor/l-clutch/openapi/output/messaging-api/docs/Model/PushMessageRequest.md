# # PushMessageRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**to** | **string** | ID of the receiver. |
**messages** | [**\LClutch\LineApi\MessagingApi\Model\Message[]**](Message.md) | List of Message objects. |
**notification_disabled** | **bool** | &#x60;true&#x60;: The user doesn’t receive a push notification when a message is sent. &#x60;false&#x60;: The user receives a push notification when the message is sent (unless they have disabled push notifications in LINE and/or their device). The default value is false. | [optional] [default to false]
**custom_aggregation_units** | **string[]** | List of aggregation unit name. Case-sensitive. This functions can only be used by corporate users who have submitted the required applications. | [optional]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
