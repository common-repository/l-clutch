import { FC, useCallback, useEffect, useRef } from 'react';
import { App as AntdApp, Breadcrumb, Button, Result, message } from 'antd';

import { useBreadcrumbStore, useListenPopState, useRouterStore } from '@l-clutch/core';

import './style.scss';
import { Setting } from './Setting';
import { UserList } from './User/UserList';
import { Editor as User } from './User/Editor';
import { RichMenuList } from './RichMenu/RichMenuList';
import { Editor as RichMenuEditor } from './RichMenu/Editor';

export const App: FC = () => {
  useListenPopState();
  const { items } = useBreadcrumbStore();

  useEffect(() => {
    message.config({
      top: 40,
    });
  }, []);

  return (
    <AntdApp>
      <Breadcrumb style={{ margin: '16px 0' }} items={items} />
      <Content />
      <Dialog />
    </AntdApp>
  );
};

const Content: FC = () => {
  const { path, setPath } = useRouterStore();

  useEffect(() => {
    if (path === '/') setPath('/user');
  }, [path]);

  if (path.match(/^\/?user\/?$/)) return <UserList />;
  if (path.match(/^\/?user\/[^/]+\/?$/)) return <User />;
  if (path.match(/^\/?rich-menu\/?$/)) return <RichMenuList />;
  if (path.match(/^\/?rich-menu\/[^/]+\/?$/)) return <RichMenuEditor />;
  if (path.match(/^\/?setting\/?/)) return <Setting />;
  return (
    <Result
      status="404"
      title="404"
      subTitle="ページが見つかりませんでした。"
      extra={
        <Button type="primary" onClick={() => setPath('/')}>
          ホームへ戻る
        </Button>
      }
    />
  );
};

const Dialog: FC = () => {
  const { modal } = AntdApp.useApp();
  const { setConfirmLeave } = useRouterStore();

  const resolveRef = useRef<(value: boolean) => void>(() => {});

  const confirm = useCallback(() => {
    modal.confirm({
      title: '変更が保存されていません',
      content: '変更を保存せずにページを離れると、入力した内容は失われます。',
      okText: '保存せずに離れる',
      cancelText: 'キャンセル',
      onOk: () => resolveRef.current(true),
      onCancel: () => resolveRef.current(false),
    });

    return new Promise<boolean>((resolve) => {
      resolveRef.current = resolve;
    });
  }, []);

  useEffect(() => {
    setConfirmLeave(confirm);
  }, [confirm]);

  return null;
};
