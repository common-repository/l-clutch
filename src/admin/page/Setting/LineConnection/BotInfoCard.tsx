import { useMemo, useState } from 'react';
import { Card, Form, Input, Button, Skeleton, Space, Alert, AlertProps } from 'antd';

import { Schemas, useBotInfo, useMessagingChannel, useRefetchBotInfo } from '@l-clutch/core';

export const BotInfoCard = () => {
  const { data: info, isLoading } = useBotInfo();
  const { data: channelSetting } = useMessagingChannel();
  const { trigger: refetch, isMutating } = useRefetchBotInfo();
  const isFetching = isMutating || isLoading;

  const [error, setError] = useState<string | undefined>(undefined);

  const handleOnRefetch = async () => {
    try {
      await refetch();
      setError(undefined);
    } catch (e) {
      const error = e as Schemas['ErrorResponse'];
      setError(error.message);
    }
  };

  const alertProps = useMemo<AlertProps | undefined>(() => {
    if (!channelSetting) return;
    if (channelSetting.is_valid === false) {
      return { type: 'info', message: <>LINE Messaging APIチャネルを有効にして下さい。</> };
    }
    if (error) return { type: 'error', message: error };
  }, [channelSetting, error]);

  return (
    <Card
      title="ボット情報"
      extra={
        <Button onClick={handleOnRefetch} disabled={!channelSetting?.is_valid} loading={isFetching}>
          再取得
        </Button>
      }
    >
      <Space direction="vertical" size="middle" className="tw-w-full">
        {alertProps && <Alert message={alertProps.message} type={alertProps.type} />}

        <Form.Item
          label="ベーシックID"
          labelCol={{ span: 8 }}
          wrapperCol={{ span: 16 }}
          className={channelSetting?.is_valid ? 'tw-mb-0' : 'tw-mb-0 tw-opacity-50'}
        >
          {isLoading ? (
            <Skeleton.Input active={true} className="!tw-w-full" />
          ) : (
            <Input onChange={() => {}} value={info?.basic_id ?? ''} readOnly />
          )}
        </Form.Item>
      </Space>
    </Card>
  );
};
