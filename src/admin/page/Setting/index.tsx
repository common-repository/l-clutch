import { FC, useEffect } from 'react';
import { Tabs } from 'antd';

import { settingTabStore, useBreadcrumbStore, useRouterStore, useSettingTabStore } from '@l-clutch/core';

import { LineConnection } from './LineConnection';

export const Setting: FC = () => {
  const { getPath, setPath } = useRouterStore();
  const { set: setBreadcrumbs } = useBreadcrumbStore();

  const subPath = getPath(1);

  useEffect(() => {
    setBreadcrumbs([{ title: '設定' }]);
  }, []);

  const items = useSettingTabStore((state) => state.tabs);

  return (
    <>
      <h1 className="wp-heading-inline">L-Clutch 設定</h1>
      <Tabs items={items} activeKey={subPath || 'line-connection'} onTabClick={(key) => setPath(`/setting/${key}`)} />
    </>
  );
};

settingTabStore
  .getState()
  .add({ label: 'LINE接続設定', key: 'line-connection', children: <LineConnection />, order: 0 });
