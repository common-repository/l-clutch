import { ReactNode, useEffect } from 'react';
import { Button, Empty, Skeleton, Typography } from 'antd';

import { useBreadcrumbStore, useRouterStore, useUser } from '@l-clutch/core';

import { Content } from './Content';

export const Editor = () => {
  const { getPath, setPath } = useRouterStore();
  const id = getPath(1);

  const { set: setBreadcrumbs } = useBreadcrumbStore();

  const { data, isLoading, error } = useUser(Number(id));

  useEffect(() => {
    let title: ReactNode = <Skeleton.Input active size="small" />;
    if (id === 'new') {
      title = '新規作成';
    } else if (data) {
      title = data.line_info?.display_name ?? '(名前未取得)';
    } else if (!isLoading) {
      title = '不明なユーザー';
    }

    setBreadcrumbs([{ title: 'ユーザー', path: '/user' }, { title }]);
  }, [id, data]);

  if (data || isLoading) {
    return (
      <>
        <Typography.Title>ユーザー情報</Typography.Title>
        <Content />
      </>
    );
  } else {
    return (
      <Empty description={`ID: ${id} のユーザーは存在しません。`} data-testid="not-found">
        <Button type="primary" onClick={() => setPath('/user')}>
          リストへ戻る
        </Button>
      </Empty>
    );
  }
};
