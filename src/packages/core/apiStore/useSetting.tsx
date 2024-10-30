import { createUseApi, createUseMutateApi } from './createApiStore';

export const useLoginChannel = createUseApi('/setting/login-channel', 'get');
export const useUpdateLoginChannel = createUseMutateApi('/setting/login-channel', 'post');

export const useMessagingChannel = createUseApi('/setting/messaging-channel', 'get');
export const useUpdateMessagingChannel = createUseMutateApi('/setting/messaging-channel', 'post');

export const useWebhookEndpoint = createUseApi('/setting/messaging-channel/webhook', 'get');
export const useUpdateWebhookEndpoint = createUseMutateApi('/setting/messaging-channel/webhook', 'post');

export const useBotInfo = createUseApi('/setting/messaging-channel/bot-info', 'get');
export const useRefetchBotInfo = createUseMutateApi('/setting/messaging-channel/bot-info', 'post');

export const useLoginUrlStatus = createUseApi('/setting/login-channel/check-login-url', 'get');
export const useCheckLoginUrlStatus = createUseMutateApi('/setting/login-channel/check-login-url', 'post');

export const useLinkedOfficialAccount = createUseApi('/setting/login-channel/linked-official-account', 'get');
