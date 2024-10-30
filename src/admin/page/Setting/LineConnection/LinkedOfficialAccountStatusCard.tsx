import { FC, useMemo, useState } from 'react';
import { Alert, Card, Space, Tag, Button, AlertProps, Popover, Flex } from 'antd';

import { useLoginChannel, useLinkedOfficialAccount, Schemas } from '@l-clutch/core';
import { ExportOutlined } from '@ant-design/icons';

type Props = {
  className?: string;
};

export const LinkedOfficialAccountStatusCard: FC<Props> = ({ className }) => {
  const { data: loginChannelSetting } = useLoginChannel();
  const { data: status } = useLinkedOfficialAccount();

  const [error] = useState<string | undefined>(undefined);

  const StatusTag = useMemo(() => {
    if (loginChannelSetting?.is_valid === false) return;
    if (!status) return;

    let color: Parameters<typeof Tag>[0]['color'] | undefined = undefined;
    let message: string | undefined = undefined;
    if (status.is_linked === undefined) {
      message = '未確認';
    } else if (status.is_linked) {
      color = 'success';
      message = 'リンク済';
    } else {
      color = 'error';
      message = '未リンク';
    }
    return (
      <Tag color={color} aria-label="ステータス">
        {message}
      </Tag>
    );
  }, [status, loginChannelSetting]);

  const alertProps = useMemo<AlertProps | undefined>(() => {
    if (!loginChannelSetting) return;
    if (loginChannelSetting.is_valid === false) {
      return { type: 'info', message: <>LINEログインチャネルを有効にして下さい。</> };
    }
    if (error) return { type: 'error', message: error };
    if (!status) return;
    if (status.is_linked === undefined) {
      return { type: 'info', message: <>確認ボタンを押して、LINEログインをしてください。</> };
    } else if (status.is_linked === false) {
      return {
        type: 'error',
        message: 'LINE公式アカウントがリンクされていません。',
      };
    }
  }, [status, loginChannelSetting, error]);

  const checkUrl = useMemo(() => {
    const url = new URL(lClutchCoreSettings.siteUrl);
    url.searchParams.set('l-clutch_line-login', 'request-check-linked');
    url.searchParams.set('_wpnonce', lClutchCoreSettings.adminUrlActionNonce);
    return url.href;
  }, []);

  return (
    <Card
      title={<>LINE公式アカウントのリンク状況 {StatusTag}</>}
      extra={
        <Popover content="リンク状況を確認するために、LINEログインが開きます。">
          <Button href={checkUrl}>確認</Button>
        </Popover>
      }
      className={className}
    >
      <Space direction="vertical" size="middle" className="tw-w-full">
        {alertProps && <Alert message={alertProps.message} type={alertProps.type} />}

        {loginChannelSetting?.is_valid && (
          <p>
            ログインチャネルにLINE公式アカウントがリンクされているかどうかを確認します。
            <br />
            LINE公式アカウントのリンクは、
            <a
              href={`https://developers.line.biz/console/channel/${loginChannelSetting.channel_id}/basics`}
              target="_blank"
              rel="noopener noreferrer"
            >
              ログインチャネル基本設定
              <ExportOutlined className="tw-text-2xs tw-align-top" />
            </a>
            の「友だち追加オプション」の「リンクされたLINE公式アカウント」から設定できます。
            <br />
            LINE公式アカウントは、Messaging APIチャネルにリンクされたものを同じものを設定してください。
          </p>
        )}
      </Space>
    </Card>
  );
};
