import { FC, useMemo, useState } from 'react';
import { Alert, Card, Form, Input, Skeleton, Space, Tag, Button, AlertProps } from 'antd';
import { ExportOutlined } from '@ant-design/icons';

import { Schemas, useMessagingChannel, useUpdateWebhookEndpoint, useWebhookEndpoint } from '@l-clutch/core';

type Props = {
  className?: string;
};

export const WebhookSettingCard: FC<Props> = ({ className }) => {
  const { data: setting, isLoading } = useWebhookEndpoint();
  const { data: channelSetting } = useMessagingChannel();
  const { trigger: update, isMutating } = useUpdateWebhookEndpoint();

  const [error, setError] = useState<string | undefined>(undefined);

  const handleOnUpdate = async () => {
    try {
      await update();
      setError(undefined);
    } catch (e) {
      const error = e as Schemas['ErrorResponse'];
      setError(error.message);
    }
  };

  const StatusTag = useMemo(() => {
    if (channelSetting?.is_valid === false) return;
    if (!setting) return;

    let color: Parameters<typeof Tag>[0]['color'] | undefined = undefined;
    let message: string | undefined = undefined;
    if (setting.endpoint === undefined) {
      message = '未設定';
    } else if (setting.is_valid && setting.active) {
      color = 'success';
      message = '有効';
    } else {
      color = 'error';
      message = 'エラー';
    }
    return (
      <Tag color={color} aria-label="ステータス">
        {message}
      </Tag>
    );
  }, [setting, channelSetting]);

  const alertProps = useMemo<AlertProps | undefined>(() => {
    if (!channelSetting) return;
    if (channelSetting.is_valid === false) {
      return { type: 'info', message: <>LINE Messaging APIチャネルを有効にして下さい。</> };
    }
    if (error) return { type: 'error', message: error };
    if (!setting) return;
    if (setting.endpoint === undefined) {
      return {
        type: 'info',
        message: (
          <>
            エンドポイントが未設定です。
            <br />
            更新ボタンを押して、エンドポイントを設定してください。
          </>
        ),
      };
    }
    if (!!setting.endpoint && setting.is_valid === false) {
      return {
        type: 'error',
        message: (
          <>
            エンドポイントが一致しません。
            <br />
            更新ボタンを押して、エンドポイントを更新してください。
          </>
        ),
      };
    }
    if (setting.active === false) {
      return {
        type: 'error',
        message: (
          <>
            webhookが無効です。
            <br />
            Messaging API設定の
            <a
              href={`https://developers.line.biz/console/channel/${channelSetting.channel_id}/messaging-api`}
              target="_blank"
              rel="noreferrer noopener"
            >
              Webhook設定
              <ExportOutlined className="tw-text-2xs tw-align-top" />
            </a>
            から、Webhookの利用をONにしてください。
          </>
        ),
      };
    }
  }, [setting, channelSetting, error]);

  return (
    <Card
      title={<>Webhook設定 {StatusTag}</>}
      extra={
        <Button onClick={handleOnUpdate} disabled={!channelSetting?.is_valid} loading={isMutating}>
          更新
        </Button>
      }
      className={className}
    >
      <Space direction="vertical" size="middle" className="tw-w-full">
        {alertProps && <Alert message={alertProps.message} type={alertProps.type} />}

        <Form.Item
          label="Webhookエンドポイント"
          labelCol={{ span: 8 }}
          wrapperCol={{ span: 16 }}
          className={channelSetting?.is_valid ? 'tw-mb-0' : 'tw-mb-0 tw-opacity-50'}
        >
          {isLoading ? (
            <Skeleton.Input active={true} className="!tw-w-full" />
          ) : (
            <Input onChange={() => {}} value={setting?.endpoint ?? ''} readOnly />
          )}
        </Form.Item>
      </Space>
    </Card>
  );
};
