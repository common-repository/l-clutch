import { FC, useMemo, useRef, useState } from 'react';
import { Alert, Card, Typography, Space, Tag, Button, AlertProps, Popover, Flex } from 'antd';

import { useCheckLoginUrlStatus, useLoginChannel, useLoginUrlStatus, copyToClipBoard, Schemas } from '@l-clutch/core';
import { ExportOutlined, SnippetsOutlined } from '@ant-design/icons';

type Props = {
  className?: string;
};

export const LoginUrlStatusCard: FC<Props> = ({ className }) => {
  const { data: status } = useLoginUrlStatus();
  const { trigger, isMutating } = useCheckLoginUrlStatus();
  const { data: channelSetting } = useLoginChannel();
  const siteUrlRef = useRef<HTMLInputElement>(null);

  const [error, setError] = useState<string | undefined>(undefined);

  const handleOnUpdate = async () => {
    try {
      await trigger();
      setError(undefined);
    } catch (e) {
      const error = e as Schemas['ErrorResponse'];
      setError(error.message);
    }
  };

  const StatusTag = useMemo(() => {
    if (channelSetting?.is_valid === false) return;
    if (!status) return;

    let color: Parameters<typeof Tag>[0]['color'] | undefined = undefined;
    let message: string | undefined = undefined;
    if (status.can_access === null) {
      message = '未確認';
    } else if (status.can_access) {
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
  }, [status, channelSetting]);

  const alertProps = useMemo<AlertProps | undefined>(() => {
    if (!channelSetting) return;
    if (channelSetting.is_valid === false) {
      return { type: 'info', message: <>LINEログインチャネルを有効にして下さい。</> };
    }
    if (error) return { type: 'error', message: error };
    if (!status) return;
    if (status.can_access === null) {
      return { type: 'info', message: <>確認ボタンを押して、LINEログインURLのステータスを確認して下さい。</> };
    } else if (status.can_access === false) {
      return {
        type: 'error',
        message: (
          <>
            ログインURLへアクセスできません。
            <br />
            コールバックURLを確認してください。
          </>
        ),
      };
    }
  }, [status, channelSetting, error]);

  return (
    <Card
      title={<>LINEログインURLのステータス {StatusTag}</>}
      extra={
        <Button onClick={handleOnUpdate} disabled={!channelSetting?.is_valid} loading={isMutating}>
          確認
        </Button>
      }
      className={className}
    >
      <Space direction="vertical" size="middle" className="tw-w-full">
        {alertProps && <Alert message={alertProps.message} type={alertProps.type} />}

        <p>
          LINEログインURLへアクセスできるかどうかを確認します。
          <br />
          LINEログインURLへアクセスするには、
          <a
            href={`https://developers.line.biz/console/channel/${channelSetting?.channel_id}/line-login`}
            target="_blank"
            rel="noopener noreferrer"
          >
            LINEログイン設定
            <ExportOutlined className="tw-text-2xs tw-align-top" />
          </a>
          からコールバックURLを
          <Popover
            content={
              <Flex align="center" gap={5}>
                <p ref={siteUrlRef}>{lClutchCoreSettings.siteUrl + '/'}</p>
                <Button type="text" icon={<SnippetsOutlined />} onClick={() => copyToClipBoard(siteUrlRef.current)} />
              </Flex>
            }
          >
            <Typography.Link>サイトホームページのURL</Typography.Link>
          </Popover>
          に設定してください。
        </p>
      </Space>
    </Card>
  );
};
