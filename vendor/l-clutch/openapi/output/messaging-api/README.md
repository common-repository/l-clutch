# OpenAPIClient-php

This document describes LINE Messaging API.


## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

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

## API Endpoints

All URIs are relative to *https://api.line.me*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*MessagingApiApi* | [**audienceMatch**](docs/Api/MessagingApiApi.md#audiencematch) | **POST** /bot/ad/multicast/phone | 
*MessagingApiApi* | [**broadcast**](docs/Api/MessagingApiApi.md#broadcast) | **POST** /v2/bot/message/broadcast | 
*MessagingApiApi* | [**cancelDefaultRichMenu**](docs/Api/MessagingApiApi.md#canceldefaultrichmenu) | **DELETE** /v2/bot/user/all/richmenu | 
*MessagingApiApi* | [**createRichMenu**](docs/Api/MessagingApiApi.md#createrichmenu) | **POST** /v2/bot/richmenu | 
*MessagingApiApi* | [**createRichMenuAlias**](docs/Api/MessagingApiApi.md#createrichmenualias) | **POST** /v2/bot/richmenu/alias | 
*MessagingApiApi* | [**deleteRichMenu**](docs/Api/MessagingApiApi.md#deleterichmenu) | **DELETE** /v2/bot/richmenu/{richMenuId} | 
*MessagingApiApi* | [**deleteRichMenuAlias**](docs/Api/MessagingApiApi.md#deleterichmenualias) | **DELETE** /v2/bot/richmenu/alias/{richMenuAliasId} | 
*MessagingApiApi* | [**getAdPhoneMessageStatistics**](docs/Api/MessagingApiApi.md#getadphonemessagestatistics) | **GET** /v2/bot/message/delivery/ad_phone | 
*MessagingApiApi* | [**getAggregationUnitNameList**](docs/Api/MessagingApiApi.md#getaggregationunitnamelist) | **GET** /v2/bot/message/aggregation/list | 
*MessagingApiApi* | [**getAggregationUnitUsage**](docs/Api/MessagingApiApi.md#getaggregationunitusage) | **GET** /v2/bot/message/aggregation/info | 
*MessagingApiApi* | [**getBotInfo**](docs/Api/MessagingApiApi.md#getbotinfo) | **GET** /v2/bot/info | 
*MessagingApiApi* | [**getDefaultRichMenuId**](docs/Api/MessagingApiApi.md#getdefaultrichmenuid) | **GET** /v2/bot/user/all/richmenu | 
*MessagingApiApi* | [**getFollowers**](docs/Api/MessagingApiApi.md#getfollowers) | **GET** /v2/bot/followers/ids | 
*MessagingApiApi* | [**getGroupMemberCount**](docs/Api/MessagingApiApi.md#getgroupmembercount) | **GET** /v2/bot/group/{groupId}/members/count | 
*MessagingApiApi* | [**getGroupMemberProfile**](docs/Api/MessagingApiApi.md#getgroupmemberprofile) | **GET** /v2/bot/group/{groupId}/member/{userId} | 
*MessagingApiApi* | [**getGroupMembersIds**](docs/Api/MessagingApiApi.md#getgroupmembersids) | **GET** /v2/bot/group/{groupId}/members/ids | 
*MessagingApiApi* | [**getGroupSummary**](docs/Api/MessagingApiApi.md#getgroupsummary) | **GET** /v2/bot/group/{groupId}/summary | 
*MessagingApiApi* | [**getMessageQuota**](docs/Api/MessagingApiApi.md#getmessagequota) | **GET** /v2/bot/message/quota | 
*MessagingApiApi* | [**getMessageQuotaConsumption**](docs/Api/MessagingApiApi.md#getmessagequotaconsumption) | **GET** /v2/bot/message/quota/consumption | 
*MessagingApiApi* | [**getNarrowcastProgress**](docs/Api/MessagingApiApi.md#getnarrowcastprogress) | **GET** /v2/bot/message/progress/narrowcast | 
*MessagingApiApi* | [**getNumberOfSentBroadcastMessages**](docs/Api/MessagingApiApi.md#getnumberofsentbroadcastmessages) | **GET** /v2/bot/message/delivery/broadcast | 
*MessagingApiApi* | [**getNumberOfSentMulticastMessages**](docs/Api/MessagingApiApi.md#getnumberofsentmulticastmessages) | **GET** /v2/bot/message/delivery/multicast | 
*MessagingApiApi* | [**getNumberOfSentPushMessages**](docs/Api/MessagingApiApi.md#getnumberofsentpushmessages) | **GET** /v2/bot/message/delivery/push | 
*MessagingApiApi* | [**getNumberOfSentReplyMessages**](docs/Api/MessagingApiApi.md#getnumberofsentreplymessages) | **GET** /v2/bot/message/delivery/reply | 
*MessagingApiApi* | [**getPNPMessageStatistics**](docs/Api/MessagingApiApi.md#getpnpmessagestatistics) | **GET** /v2/bot/message/delivery/pnp | 
*MessagingApiApi* | [**getProfile**](docs/Api/MessagingApiApi.md#getprofile) | **GET** /v2/bot/profile/{userId} | 
*MessagingApiApi* | [**getRichMenu**](docs/Api/MessagingApiApi.md#getrichmenu) | **GET** /v2/bot/richmenu/{richMenuId} | 
*MessagingApiApi* | [**getRichMenuAlias**](docs/Api/MessagingApiApi.md#getrichmenualias) | **GET** /v2/bot/richmenu/alias/{richMenuAliasId} | 
*MessagingApiApi* | [**getRichMenuAliasList**](docs/Api/MessagingApiApi.md#getrichmenualiaslist) | **GET** /v2/bot/richmenu/alias/list | 
*MessagingApiApi* | [**getRichMenuBatchProgress**](docs/Api/MessagingApiApi.md#getrichmenubatchprogress) | **GET** /v2/bot/richmenu/progress/batch | 
*MessagingApiApi* | [**getRichMenuIdOfUser**](docs/Api/MessagingApiApi.md#getrichmenuidofuser) | **GET** /v2/bot/user/{userId}/richmenu | 
*MessagingApiApi* | [**getRichMenuList**](docs/Api/MessagingApiApi.md#getrichmenulist) | **GET** /v2/bot/richmenu/list | 
*MessagingApiApi* | [**getRoomMemberCount**](docs/Api/MessagingApiApi.md#getroommembercount) | **GET** /v2/bot/room/{roomId}/members/count | 
*MessagingApiApi* | [**getRoomMemberProfile**](docs/Api/MessagingApiApi.md#getroommemberprofile) | **GET** /v2/bot/room/{roomId}/member/{userId} | 
*MessagingApiApi* | [**getRoomMembersIds**](docs/Api/MessagingApiApi.md#getroommembersids) | **GET** /v2/bot/room/{roomId}/members/ids | 
*MessagingApiApi* | [**getWebhookEndpoint**](docs/Api/MessagingApiApi.md#getwebhookendpoint) | **GET** /v2/bot/channel/webhook/endpoint | 
*MessagingApiApi* | [**issueLinkToken**](docs/Api/MessagingApiApi.md#issuelinktoken) | **POST** /v2/bot/user/{userId}/linkToken | 
*MessagingApiApi* | [**leaveGroup**](docs/Api/MessagingApiApi.md#leavegroup) | **POST** /v2/bot/group/{groupId}/leave | 
*MessagingApiApi* | [**leaveRoom**](docs/Api/MessagingApiApi.md#leaveroom) | **POST** /v2/bot/room/{roomId}/leave | 
*MessagingApiApi* | [**linkRichMenuIdToUser**](docs/Api/MessagingApiApi.md#linkrichmenuidtouser) | **POST** /v2/bot/user/{userId}/richmenu/{richMenuId} | 
*MessagingApiApi* | [**linkRichMenuIdToUsers**](docs/Api/MessagingApiApi.md#linkrichmenuidtousers) | **POST** /v2/bot/richmenu/bulk/link | 
*MessagingApiApi* | [**markMessagesAsRead**](docs/Api/MessagingApiApi.md#markmessagesasread) | **POST** /v2/bot/message/markAsRead | 
*MessagingApiApi* | [**multicast**](docs/Api/MessagingApiApi.md#multicast) | **POST** /v2/bot/message/multicast | 
*MessagingApiApi* | [**narrowcast**](docs/Api/MessagingApiApi.md#narrowcast) | **POST** /v2/bot/message/narrowcast | 
*MessagingApiApi* | [**pushMessage**](docs/Api/MessagingApiApi.md#pushmessage) | **POST** /v2/bot/message/push | 
*MessagingApiApi* | [**pushMessagesByPhone**](docs/Api/MessagingApiApi.md#pushmessagesbyphone) | **POST** /bot/pnp/push | 
*MessagingApiApi* | [**replyMessage**](docs/Api/MessagingApiApi.md#replymessage) | **POST** /v2/bot/message/reply | 
*MessagingApiApi* | [**richMenuBatch**](docs/Api/MessagingApiApi.md#richmenubatch) | **POST** /v2/bot/richmenu/batch | 
*MessagingApiApi* | [**setDefaultRichMenu**](docs/Api/MessagingApiApi.md#setdefaultrichmenu) | **POST** /v2/bot/user/all/richmenu/{richMenuId} | 
*MessagingApiApi* | [**setWebhookEndpoint**](docs/Api/MessagingApiApi.md#setwebhookendpoint) | **PUT** /v2/bot/channel/webhook/endpoint | 
*MessagingApiApi* | [**testWebhookEndpoint**](docs/Api/MessagingApiApi.md#testwebhookendpoint) | **POST** /v2/bot/channel/webhook/test | 
*MessagingApiApi* | [**unlinkRichMenuIdFromUser**](docs/Api/MessagingApiApi.md#unlinkrichmenuidfromuser) | **DELETE** /v2/bot/user/{userId}/richmenu | 
*MessagingApiApi* | [**unlinkRichMenuIdFromUsers**](docs/Api/MessagingApiApi.md#unlinkrichmenuidfromusers) | **POST** /v2/bot/richmenu/bulk/unlink | 
*MessagingApiApi* | [**updateRichMenuAlias**](docs/Api/MessagingApiApi.md#updaterichmenualias) | **POST** /v2/bot/richmenu/alias/{richMenuAliasId} | 
*MessagingApiApi* | [**validateBroadcast**](docs/Api/MessagingApiApi.md#validatebroadcast) | **POST** /v2/bot/message/validate/broadcast | 
*MessagingApiApi* | [**validateMulticast**](docs/Api/MessagingApiApi.md#validatemulticast) | **POST** /v2/bot/message/validate/multicast | 
*MessagingApiApi* | [**validateNarrowcast**](docs/Api/MessagingApiApi.md#validatenarrowcast) | **POST** /v2/bot/message/validate/narrowcast | 
*MessagingApiApi* | [**validatePush**](docs/Api/MessagingApiApi.md#validatepush) | **POST** /v2/bot/message/validate/push | 
*MessagingApiApi* | [**validateReply**](docs/Api/MessagingApiApi.md#validatereply) | **POST** /v2/bot/message/validate/reply | 
*MessagingApiApi* | [**validateRichMenuBatchRequest**](docs/Api/MessagingApiApi.md#validaterichmenubatchrequest) | **POST** /v2/bot/richmenu/validate/batch | 
*MessagingApiApi* | [**validateRichMenuObject**](docs/Api/MessagingApiApi.md#validaterichmenuobject) | **POST** /v2/bot/richmenu/validate | 
*MessagingApiBlobApi* | [**getMessageContent**](docs/Api/MessagingApiBlobApi.md#getmessagecontent) | **GET** /v2/bot/message/{messageId}/content | 
*MessagingApiBlobApi* | [**getMessageContentPreview**](docs/Api/MessagingApiBlobApi.md#getmessagecontentpreview) | **GET** /v2/bot/message/{messageId}/content/preview | 
*MessagingApiBlobApi* | [**getMessageContentTranscodingByMessageId**](docs/Api/MessagingApiBlobApi.md#getmessagecontenttranscodingbymessageid) | **GET** /v2/bot/message/{messageId}/content/transcoding | 
*MessagingApiBlobApi* | [**getRichMenuImage**](docs/Api/MessagingApiBlobApi.md#getrichmenuimage) | **GET** /v2/bot/richmenu/{richMenuId}/content | 
*MessagingApiBlobApi* | [**setRichMenuImage**](docs/Api/MessagingApiBlobApi.md#setrichmenuimage) | **POST** /v2/bot/richmenu/{richMenuId}/content | 

## Models

- [Action](docs/Model/Action.md)
- [AgeDemographic](docs/Model/AgeDemographic.md)
- [AgeDemographicFilter](docs/Model/AgeDemographicFilter.md)
- [AgeDemographicFilterAllOf](docs/Model/AgeDemographicFilterAllOf.md)
- [AltUri](docs/Model/AltUri.md)
- [AppTypeDemographic](docs/Model/AppTypeDemographic.md)
- [AppTypeDemographicFilter](docs/Model/AppTypeDemographicFilter.md)
- [AppTypeDemographicFilterAllOf](docs/Model/AppTypeDemographicFilterAllOf.md)
- [AreaDemographic](docs/Model/AreaDemographic.md)
- [AreaDemographicFilter](docs/Model/AreaDemographicFilter.md)
- [AreaDemographicFilterAllOf](docs/Model/AreaDemographicFilterAllOf.md)
- [AudienceMatchMessagesRequest](docs/Model/AudienceMatchMessagesRequest.md)
- [AudienceRecipient](docs/Model/AudienceRecipient.md)
- [AudienceRecipientAllOf](docs/Model/AudienceRecipientAllOf.md)
- [AudioMessage](docs/Model/AudioMessage.md)
- [AudioMessageAllOf](docs/Model/AudioMessageAllOf.md)
- [BotInfoResponse](docs/Model/BotInfoResponse.md)
- [BroadcastRequest](docs/Model/BroadcastRequest.md)
- [ButtonsTemplate](docs/Model/ButtonsTemplate.md)
- [ButtonsTemplateAllOf](docs/Model/ButtonsTemplateAllOf.md)
- [CameraAction](docs/Model/CameraAction.md)
- [CameraRollAction](docs/Model/CameraRollAction.md)
- [CarouselColumn](docs/Model/CarouselColumn.md)
- [CarouselTemplate](docs/Model/CarouselTemplate.md)
- [CarouselTemplateAllOf](docs/Model/CarouselTemplateAllOf.md)
- [ChatReference](docs/Model/ChatReference.md)
- [ConfirmTemplate](docs/Model/ConfirmTemplate.md)
- [ConfirmTemplateAllOf](docs/Model/ConfirmTemplateAllOf.md)
- [CreateRichMenuAliasRequest](docs/Model/CreateRichMenuAliasRequest.md)
- [DatetimePickerAction](docs/Model/DatetimePickerAction.md)
- [DatetimePickerActionAllOf](docs/Model/DatetimePickerActionAllOf.md)
- [DemographicFilter](docs/Model/DemographicFilter.md)
- [Emoji](docs/Model/Emoji.md)
- [ErrorDetail](docs/Model/ErrorDetail.md)
- [ErrorResponse](docs/Model/ErrorResponse.md)
- [Filter](docs/Model/Filter.md)
- [FlexBlockStyle](docs/Model/FlexBlockStyle.md)
- [FlexBox](docs/Model/FlexBox.md)
- [FlexBoxAllOf](docs/Model/FlexBoxAllOf.md)
- [FlexBoxBackground](docs/Model/FlexBoxBackground.md)
- [FlexBoxBorderWidth](docs/Model/FlexBoxBorderWidth.md)
- [FlexBoxCornerRadius](docs/Model/FlexBoxCornerRadius.md)
- [FlexBoxLinearGradient](docs/Model/FlexBoxLinearGradient.md)
- [FlexBoxLinearGradientAllOf](docs/Model/FlexBoxLinearGradientAllOf.md)
- [FlexBoxPadding](docs/Model/FlexBoxPadding.md)
- [FlexBoxSpacing](docs/Model/FlexBoxSpacing.md)
- [FlexBubble](docs/Model/FlexBubble.md)
- [FlexBubbleAllOf](docs/Model/FlexBubbleAllOf.md)
- [FlexBubbleStyles](docs/Model/FlexBubbleStyles.md)
- [FlexButton](docs/Model/FlexButton.md)
- [FlexButtonAllOf](docs/Model/FlexButtonAllOf.md)
- [FlexCarousel](docs/Model/FlexCarousel.md)
- [FlexCarouselAllOf](docs/Model/FlexCarouselAllOf.md)
- [FlexComponent](docs/Model/FlexComponent.md)
- [FlexContainer](docs/Model/FlexContainer.md)
- [FlexFiller](docs/Model/FlexFiller.md)
- [FlexFillerAllOf](docs/Model/FlexFillerAllOf.md)
- [FlexIcon](docs/Model/FlexIcon.md)
- [FlexIconAllOf](docs/Model/FlexIconAllOf.md)
- [FlexIconSize](docs/Model/FlexIconSize.md)
- [FlexImage](docs/Model/FlexImage.md)
- [FlexImageAllOf](docs/Model/FlexImageAllOf.md)
- [FlexImageSize](docs/Model/FlexImageSize.md)
- [FlexMargin](docs/Model/FlexMargin.md)
- [FlexMessage](docs/Model/FlexMessage.md)
- [FlexMessageAllOf](docs/Model/FlexMessageAllOf.md)
- [FlexOffset](docs/Model/FlexOffset.md)
- [FlexSeparator](docs/Model/FlexSeparator.md)
- [FlexSeparatorAllOf](docs/Model/FlexSeparatorAllOf.md)
- [FlexSpan](docs/Model/FlexSpan.md)
- [FlexSpanAllOf](docs/Model/FlexSpanAllOf.md)
- [FlexSpanSize](docs/Model/FlexSpanSize.md)
- [FlexText](docs/Model/FlexText.md)
- [FlexTextAllOf](docs/Model/FlexTextAllOf.md)
- [FlexTextFontSize](docs/Model/FlexTextFontSize.md)
- [FlexVideo](docs/Model/FlexVideo.md)
- [FlexVideoAllOf](docs/Model/FlexVideoAllOf.md)
- [GenderDemographic](docs/Model/GenderDemographic.md)
- [GenderDemographicFilter](docs/Model/GenderDemographicFilter.md)
- [GenderDemographicFilterAllOf](docs/Model/GenderDemographicFilterAllOf.md)
- [GetAggregationUnitNameListResponse](docs/Model/GetAggregationUnitNameListResponse.md)
- [GetAggregationUnitUsageResponse](docs/Model/GetAggregationUnitUsageResponse.md)
- [GetFollowersResponse](docs/Model/GetFollowersResponse.md)
- [GetMessageContentTranscodingResponse](docs/Model/GetMessageContentTranscodingResponse.md)
- [GetWebhookEndpointResponse](docs/Model/GetWebhookEndpointResponse.md)
- [GroupMemberCountResponse](docs/Model/GroupMemberCountResponse.md)
- [GroupSummaryResponse](docs/Model/GroupSummaryResponse.md)
- [GroupUserProfileResponse](docs/Model/GroupUserProfileResponse.md)
- [ImageCarouselColumn](docs/Model/ImageCarouselColumn.md)
- [ImageCarouselTemplate](docs/Model/ImageCarouselTemplate.md)
- [ImageCarouselTemplateAllOf](docs/Model/ImageCarouselTemplateAllOf.md)
- [ImageMessage](docs/Model/ImageMessage.md)
- [ImageMessageAllOf](docs/Model/ImageMessageAllOf.md)
- [ImagemapAction](docs/Model/ImagemapAction.md)
- [ImagemapArea](docs/Model/ImagemapArea.md)
- [ImagemapBaseSize](docs/Model/ImagemapBaseSize.md)
- [ImagemapExternalLink](docs/Model/ImagemapExternalLink.md)
- [ImagemapMessage](docs/Model/ImagemapMessage.md)
- [ImagemapMessageAllOf](docs/Model/ImagemapMessageAllOf.md)
- [ImagemapVideo](docs/Model/ImagemapVideo.md)
- [IssueLinkTokenResponse](docs/Model/IssueLinkTokenResponse.md)
- [Limit](docs/Model/Limit.md)
- [LocationAction](docs/Model/LocationAction.md)
- [LocationMessage](docs/Model/LocationMessage.md)
- [LocationMessageAllOf](docs/Model/LocationMessageAllOf.md)
- [MarkMessagesAsReadRequest](docs/Model/MarkMessagesAsReadRequest.md)
- [MembersIdsResponse](docs/Model/MembersIdsResponse.md)
- [Message](docs/Model/Message.md)
- [MessageAction](docs/Model/MessageAction.md)
- [MessageActionAllOf](docs/Model/MessageActionAllOf.md)
- [MessageImagemapAction](docs/Model/MessageImagemapAction.md)
- [MessageImagemapActionAllOf](docs/Model/MessageImagemapActionAllOf.md)
- [MessageQuotaResponse](docs/Model/MessageQuotaResponse.md)
- [MulticastRequest](docs/Model/MulticastRequest.md)
- [NarrowcastProgressResponse](docs/Model/NarrowcastProgressResponse.md)
- [NarrowcastRequest](docs/Model/NarrowcastRequest.md)
- [NumberOfMessagesResponse](docs/Model/NumberOfMessagesResponse.md)
- [OperatorDemographicFilter](docs/Model/OperatorDemographicFilter.md)
- [OperatorDemographicFilterAllOf](docs/Model/OperatorDemographicFilterAllOf.md)
- [OperatorRecipient](docs/Model/OperatorRecipient.md)
- [OperatorRecipientAllOf](docs/Model/OperatorRecipientAllOf.md)
- [PnpMessagesRequest](docs/Model/PnpMessagesRequest.md)
- [PostbackAction](docs/Model/PostbackAction.md)
- [PostbackActionAllOf](docs/Model/PostbackActionAllOf.md)
- [PushMessageRequest](docs/Model/PushMessageRequest.md)
- [PushMessageResponse](docs/Model/PushMessageResponse.md)
- [QuickReply](docs/Model/QuickReply.md)
- [QuickReplyItem](docs/Model/QuickReplyItem.md)
- [QuotaConsumptionResponse](docs/Model/QuotaConsumptionResponse.md)
- [QuotaType](docs/Model/QuotaType.md)
- [Recipient](docs/Model/Recipient.md)
- [RedeliveryRecipient](docs/Model/RedeliveryRecipient.md)
- [RedeliveryRecipientAllOf](docs/Model/RedeliveryRecipientAllOf.md)
- [ReplyMessageRequest](docs/Model/ReplyMessageRequest.md)
- [ReplyMessageResponse](docs/Model/ReplyMessageResponse.md)
- [RichMenuAliasListResponse](docs/Model/RichMenuAliasListResponse.md)
- [RichMenuAliasResponse](docs/Model/RichMenuAliasResponse.md)
- [RichMenuArea](docs/Model/RichMenuArea.md)
- [RichMenuBatchLinkOperation](docs/Model/RichMenuBatchLinkOperation.md)
- [RichMenuBatchLinkOperationAllOf](docs/Model/RichMenuBatchLinkOperationAllOf.md)
- [RichMenuBatchOperation](docs/Model/RichMenuBatchOperation.md)
- [RichMenuBatchProgressPhase](docs/Model/RichMenuBatchProgressPhase.md)
- [RichMenuBatchProgressResponse](docs/Model/RichMenuBatchProgressResponse.md)
- [RichMenuBatchRequest](docs/Model/RichMenuBatchRequest.md)
- [RichMenuBatchUnlinkAllOperation](docs/Model/RichMenuBatchUnlinkAllOperation.md)
- [RichMenuBatchUnlinkOperation](docs/Model/RichMenuBatchUnlinkOperation.md)
- [RichMenuBatchUnlinkOperationAllOf](docs/Model/RichMenuBatchUnlinkOperationAllOf.md)
- [RichMenuBounds](docs/Model/RichMenuBounds.md)
- [RichMenuBulkLinkRequest](docs/Model/RichMenuBulkLinkRequest.md)
- [RichMenuBulkUnlinkRequest](docs/Model/RichMenuBulkUnlinkRequest.md)
- [RichMenuIdResponse](docs/Model/RichMenuIdResponse.md)
- [RichMenuListResponse](docs/Model/RichMenuListResponse.md)
- [RichMenuRequest](docs/Model/RichMenuRequest.md)
- [RichMenuResponse](docs/Model/RichMenuResponse.md)
- [RichMenuSize](docs/Model/RichMenuSize.md)
- [RichMenuSwitchAction](docs/Model/RichMenuSwitchAction.md)
- [RichMenuSwitchActionAllOf](docs/Model/RichMenuSwitchActionAllOf.md)
- [RoomMemberCountResponse](docs/Model/RoomMemberCountResponse.md)
- [RoomUserProfileResponse](docs/Model/RoomUserProfileResponse.md)
- [Sender](docs/Model/Sender.md)
- [SentMessage](docs/Model/SentMessage.md)
- [SetWebhookEndpointRequest](docs/Model/SetWebhookEndpointRequest.md)
- [StickerMessage](docs/Model/StickerMessage.md)
- [StickerMessageAllOf](docs/Model/StickerMessageAllOf.md)
- [SubscriptionPeriodDemographic](docs/Model/SubscriptionPeriodDemographic.md)
- [SubscriptionPeriodDemographicFilter](docs/Model/SubscriptionPeriodDemographicFilter.md)
- [SubscriptionPeriodDemographicFilterAllOf](docs/Model/SubscriptionPeriodDemographicFilterAllOf.md)
- [Template](docs/Model/Template.md)
- [TemplateImageAspectRatio](docs/Model/TemplateImageAspectRatio.md)
- [TemplateImageSize](docs/Model/TemplateImageSize.md)
- [TemplateMessage](docs/Model/TemplateMessage.md)
- [TemplateMessageAllOf](docs/Model/TemplateMessageAllOf.md)
- [TestWebhookEndpointRequest](docs/Model/TestWebhookEndpointRequest.md)
- [TestWebhookEndpointResponse](docs/Model/TestWebhookEndpointResponse.md)
- [TextMessage](docs/Model/TextMessage.md)
- [TextMessageAllOf](docs/Model/TextMessageAllOf.md)
- [URIAction](docs/Model/URIAction.md)
- [URIActionAllOf](docs/Model/URIActionAllOf.md)
- [URIImagemapAction](docs/Model/URIImagemapAction.md)
- [URIImagemapActionAllOf](docs/Model/URIImagemapActionAllOf.md)
- [UpdateRichMenuAliasRequest](docs/Model/UpdateRichMenuAliasRequest.md)
- [UserProfileResponse](docs/Model/UserProfileResponse.md)
- [ValidateMessageRequest](docs/Model/ValidateMessageRequest.md)
- [VideoMessage](docs/Model/VideoMessage.md)
- [VideoMessageAllOf](docs/Model/VideoMessageAllOf.md)

## Authorization

Authentication schemes defined for the API:
### Bearer

- **Type**: Bearer authentication

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `0.0.1`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
