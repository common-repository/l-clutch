import { Col, Row, Space } from 'antd';
import { ExportOutlined } from '@ant-design/icons';
import { useLoginChannel, useMessagingChannel, useUpdateLoginChannel, useUpdateMessagingChannel } from '@l-clutch/core';

import { ChannelSettingCard } from './ChannelSettingCard';
import { LoginUrlStatusCard } from './LoginUrlStatusCard';
import { LinkedOfficialAccountStatusCard } from './LinkedOfficialAccountStatusCard';
import { WebhookSettingCard } from './WebhookSettingCard';
import { BotInfoCard } from './BotInfoCard';

export const LineConnection = () => {
  const loginChannel = useLoginChannel();
  const { trigger: updateLoginChannelSetting, isMutating: isSavingLoginChannelSetting } = useUpdateLoginChannel();

  const messagingChannel = useMessagingChannel();
  const { trigger: updateMessagingChannelSetting, isMutating: isSavingMessagingChannelSetting } =
    useUpdateMessagingChannel();

  return (
    <>
      <p>
        LINE Messaging APIチャネルとLINEログインチャネルを接続します。
        <br />
        <a href="https://developers.line.biz/console/" target="_blank" rel="noopener noreferrer">
          LINE Developer コンソール
          <ExportOutlined className="tw-text-2xs tw-align-top" />
        </a>
        からそれぞれのチャネルを作成して、チャネルIDとシークレットを入力してください。
      </p>

      <Row gutter={[16, 16]}>
        <Col xl={12} span={24}>
          <Space direction="vertical" size="middle" className="tw-w-full">
            <ChannelSettingCard
              label="LINEログインチャネル"
              status={loginChannel.data}
              update={updateLoginChannelSetting}
              isSaving={isSavingLoginChannelSetting}
              isLoading={loginChannel.isLoading}
            />
            <LoginUrlStatusCard />
            <LinkedOfficialAccountStatusCard />
          </Space>
        </Col>
        <Col xl={12} span={24}>
          <Space direction="vertical" size="middle" className="tw-w-full">
            <ChannelSettingCard
              label="LINE Messaging APIチャネル"
              status={messagingChannel.data}
              update={updateMessagingChannelSetting}
              isSaving={isSavingMessagingChannelSetting}
              isLoading={messagingChannel.isLoading}
            />
            <WebhookSettingCard />
            <BotInfoCard />
          </Space>
        </Col>
      </Row>
    </>
  );
};
