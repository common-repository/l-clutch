import { FC, useEffect } from 'react';
import { Dropdown, Button, Image, Table, TableColumnsType, Tag, Typography, Space } from 'antd';
import { ItemType } from 'antd/es/menu/hooks/useItems';

import {
  useDefaultRichMenu,
  useDeleteRichMenu,
  useRichMenuList,
  useUpdateDefaultRichMenu,
  useRouterStore,
  useBreadcrumbStore,
  useCheckMessagingChannel,
  useTableParams,
  Schemas,
} from '@l-clutch/core';

export const RichMenuList = () => {
  useCheckMessagingChannel({
    content:
      'リッチメニューの設定には、LINE Messaging APIチャネルの設定が必要です。設定を行ってから再度お試しください。',
    key: 'rich-menu-list',
  });

  const { setPath } = useRouterStore();
  const { set: setBreadcrumbs } = useBreadcrumbStore();
  const { tableParams, setTableParams, setTotal, request } = useTableParams();

  const { data: list, isLoading } = useRichMenuList(request);
  const { data: defaultRM } = useDefaultRichMenu();
  // const savingIds = useSelect((select) => select(store).getSavingRichMenuIds(), []);
  const { trigger: updateDefaultId } = useUpdateDefaultRichMenu();

  const defaultId = defaultRM?.id;

  useEffect(() => {
    setBreadcrumbs([{ title: 'リッチメニュー' }]);
  }, []);

  useEffect(() => {
    if (list?.total) {
      setTotal(list.total);
    }
  }, [list]);

  const columns: TableColumnsType<Schemas['RichMenuResponse']> = [
    {
      title: '画像',
      dataIndex: 'background',
      key: 'background',
      render: (background) =>
        background && (
          <Image
            src={background?.thumbnail_url}
            preview={{ src: background?.url }}
            rootClassName="tw-w-32"
            data-testid="background-img"
          />
        ),
    },
    {
      title: 'タイトル',
      dataIndex: 'name',
      key: 'name',
      render: (name, record) => (
        <a
          href=""
          aria-label="タイトル"
          onClick={(e) => {
            e.preventDefault();
            setPath(`/rich-menu/${record.id}`);
          }}
        >
          {name}
        </a>
      ),
    },
    {
      title: 'ステータス',
      dataIndex: 'status',
      key: 'status',
      render: (status) => {
        if (status === 'publish') return <Tag color="green">公開</Tag>;
        if (status === 'draft') return <Tag>下書き</Tag>;
      },
    },
    {
      title: 'デフォルト',
      key: 'default',
      render: (record) => {
        if (defaultId === record.id) return <Tag color="orange">デフォルト</Tag>;
      },
    },
    {
      title: 'アクション',
      key: 'operate',
      render: (record) => (
        <ActionDropdown record={record} updateDefaultId={updateDefaultId} defaultId={defaultId} setPath={setPath} />
      ),
    },
  ];

  return (
    <>
      <Typography.Title className="!tw-mb-3">
        <Space>
          リッチメニュー
          <Button type="primary" onClick={() => setPath('/rich-menu/new')}>
            新規追加
          </Button>
        </Space>
      </Typography.Title>
      <Table
        columns={columns}
        rowKey={(record) => record.id}
        dataSource={list?.items}
        pagination={tableParams.pagination}
        onChange={setTableParams}
        loading={isLoading}
      />
    </>
  );
};

type Props = {
  record: Schemas['RichMenuResponse'];
  updateDefaultId: (params: { id: number }) => void;
  defaultId: number | undefined;
  setPath: (path: string) => void;
};

const ActionDropdown: FC<Props> = ({ record, updateDefaultId, defaultId, setPath }) => {
  const { trigger: deleteRichMenu } = useDeleteRichMenu({ id: record.id });
  const items: ItemType[] = [
    {
      key: 'default',
      label: 'デフォルトに設定する',
      onClick: () => updateDefaultId({ id: record.id }),
      disabled: record.status !== 'publish' || defaultId === record.id,
    },
    {
      key: 'delete',
      label: '削除',
      danger: true,
      onClick: () => deleteRichMenu(),
    },
  ];
  return (
    <Dropdown.Button menu={{ items }} onClick={() => setPath(`/rich-menu/${record.id}`)}>
      編集
    </Dropdown.Button>
  );
};
