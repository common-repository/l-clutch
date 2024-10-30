import { FC, useEffect } from 'react';
import { Avatar, Button, Table, TableColumnsType, Typography } from 'antd';
import { UserOutlined } from '@ant-design/icons';

import {
  Schemas,
  useBreadcrumbStore,
  useCheckLoginChannel,
  useRouterStore,
  useTableParams,
  useUserList,
} from '@l-clutch/core';

import { FollowTag } from './FollowTag';
import { LastLoggedInDate } from './LastLoggedInDate';

export const UserList: FC = () => {
  useCheckLoginChannel({
    content: 'ユーザー機能を使用するには、LINEログインチャネルの設定が必要です。設定を行ってから再度お試しください。',
    key: 'user-list',
  });

  const { setPath } = useRouterStore();
  const { tableParams, setTableParams, setTotal, request } = useTableParams();
  const { set: setBreadcrumbs } = useBreadcrumbStore();

  const { data, isLoading } = useUserList(request);

  useEffect(() => {
    setBreadcrumbs([{ title: 'ユーザー' }]);
  }, []);

  useEffect(() => {
    if (data?.total) {
      setTotal(data.total);
    }
  }, [data]);

  const columns: TableColumnsType<Schemas['User']> = [
    {
      dataIndex: 'avatar_urls',
      key: 'avator',
      render: (urls: Schemas['User']['avatar_urls']) => <Avatar src={urls?.[48]} icon={<UserOutlined />} />,
    },
    {
      title: '名前',
      dataIndex: 'line_info',
      key: 'name',
      render: (lineInfo: Schemas['User']['line_info']) => (
        <span aria-label="ユーザー名">{lineInfo?.display_name !== '' ? lineInfo?.display_name : '(名前未取得)'}</span>
      ),
    },
    {
      title: '友だち追加状態',
      dataIndex: 'line_info',
      key: 'follow',
      render: (lineInfo: Schemas['User']['line_info']) => <FollowTag lineInfo={lineInfo} />,
    },
    {
      title: '最終ログイン',
      key: 'lastLoginAt',
      render: (user) => <LastLoggedInDate user={user} />,
    },
    {
      title: 'アクション',
      key: 'action',
      render: (user) => <Button onClick={() => setPath(`/user/${user.id}`)}>詳細</Button>,
    },
  ];

  return (
    <>
      <Typography.Title className="!tw-mb-3">ユーザー</Typography.Title>
      <Table
        columns={columns}
        rowKey={(record) => record.id!}
        dataSource={data?.items}
        pagination={tableParams.pagination}
        onChange={setTableParams}
        loading={isLoading}
      />
    </>
  );
};
