import { Avatar, Button, Card, Descriptions, Skeleton, Typography } from 'antd';
import { UserOutlined } from '@ant-design/icons';

import { useRouterStore, useUser } from '@l-clutch/core';

import { FollowTag } from '../FollowTag';
import { LastLoggedInDate } from '../LastLoggedInDate';

const AVATOR_SIZE = 64;

export const Content = () => {
  const { getPath } = useRouterStore();
  const id = getPath(1);
  const { data, isLoading } = useUser(Number(id));

  return (
    <Card
      title={data?.line_info?.display_name !== '' ? data?.line_info?.display_name : '(名前未取得)'}
      extra={
        <Button type="link" href={`${lClutchCoreSettings?.siteUrl}/wp-admin/user-edit.php?user_id=${id}`}>
          Wordpressのユーザー編集画面を開く
        </Button>
      }
      data-testid="content"
    >
      <Skeleton loading={isLoading} avatar={{ size: AVATOR_SIZE }} active paragraph={{ rows: 1 }}>
        <Card.Meta
          avatar={<Avatar src={data?.avatar_urls[96]} icon={<UserOutlined />} size={AVATOR_SIZE} />}
          title={
            <span aria-label="ユーザー名">
              {data?.line_info?.display_name !== '' ? data?.line_info?.display_name : '(名前未取得)'}
            </span>
          }
          description={
            <span aria-label="ユーザーID">
              {data?.line_info?.user_id !== '' ? data?.line_info?.user_id : '(ユーザーID未取得)'}
            </span>
          }
        />
      </Skeleton>
      <Descriptions
        className="tw-mt-4"
        column={1}
        size="small"
        items={[
          {
            key: 'friend-status',
            label: '友だち追加状態',
            children: <FollowTag lineInfo={data?.line_info} />,
          },
          {
            key: 'last-login',
            label: '最終ログイン',
            children: <LastLoggedInDate user={data} />,
          },
        ]}
      />
    </Card>
  );
};
