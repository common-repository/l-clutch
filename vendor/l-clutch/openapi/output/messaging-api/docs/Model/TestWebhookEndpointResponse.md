# # TestWebhookEndpointResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**success** | **bool** | Result of the communication from the LINE platform to the webhook URL. | [optional]
**timestamp** | **\DateTime** | Time of the event in milliseconds. Even in the case of a redelivered webhook, it represents the time the event occurred, not the time it was redelivered. |
**status_code** | **int** | The HTTP status code. If the webhook response isn&#39;t received, the status code is set to zero or a negative number. |
**reason** | **string** | Reason for the response. |
**detail** | **string** | Details of the response. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
