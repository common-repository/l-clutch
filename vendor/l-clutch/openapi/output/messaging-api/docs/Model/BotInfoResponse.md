# # BotInfoResponse

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**user_id** | **string** | Bot&#39;s user ID |
**basic_id** | **string** | Bot&#39;s basic ID |
**premium_id** | **string** | Bot&#39;s premium ID. Not included in the response if the premium ID isn&#39;t set. | [optional]
**display_name** | **string** | Bot&#39;s display name |
**picture_url** | **string** | Profile image URL. &#x60;https&#x60; image URL. Not included in the response if the bot doesn&#39;t have a profile image. | [optional]
**chat_mode** | **string** | Chat settings set in the LINE Official Account Manager. One of:  &#x60;chat&#x60;: Chat is set to \&quot;On\&quot;. &#x60;bot&#x60;: Chat is set to \&quot;Off\&quot;. |
**mark_as_read_mode** | **string** | Automatic read setting for messages. If the chat is set to \&quot;Off\&quot;, auto is returned. If the chat is set to \&quot;On\&quot;, manual is returned.  &#x60;auto&#x60;: Auto read setting is enabled. &#x60;manual&#x60;: Auto read setting is disabled. |

[[Back to Model list]](../../README.md#models) [[Back to API list]](../../README.md#endpoints) [[Back to README]](../../README.md)
