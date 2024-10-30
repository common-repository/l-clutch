# # NarrowcastRequest

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**messages** | [**\LClutch\LineApi\MessagingApi\Model\Message[]**](Message.md) | List of Message objects. |
**recipient** | [**\LClutch\LineApi\MessagingApi\Model\Recipient**](Recipient.md) |  | [optional]
**filter** | [**\LClutch\LineApi\MessagingApi\Model\Filter**](Filter.md) |  | [optional]
**limit** | [**\LClutch\LineApi\MessagingApi\Model\Limit**](Limit.md) |  | [optional]
**notification_disabled** | **bool** | &#x60;true&#x60;: The user doesn’t receive a push notification when a message is sent. &#x60;false&#x60;: The user receives a push notification when the message is sent (unless they have disabled push notifications in LINE and/or their device). The default value is false. | [optional] [default to false]

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
