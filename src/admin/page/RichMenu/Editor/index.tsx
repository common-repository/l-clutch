import { KeyboardEventHandler, useEffect, useState } from 'react';
import { Button, Card, Col, Empty, Row, Tag, message } from 'antd';
import { FormProvider, useForm } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import * as Yup from 'yup';

import {
  useRouterStore,
  useBreadcrumbStore,
  useUpdateRichMenu,
  useCreateRichMenu,
  useOnSubmitCatchError,
  richMenuSchema,
  useLazyRichMenu,
  richMenuSchemaNames,
  Schemas,
} from '@l-clutch/core';

import { BasicInfoEditor } from './BasicInfoEditor';
import { RichMenuImage } from './RichMenuImage';
import { ActionList } from './ActionList';
import { ActionEditor } from './ActionEditor';

export type FormValues = Omit<Schemas['RichMenuRequest'], 'background'> & {
  background?: Schemas['Image'];
};
const DEFAULT_VALUES: FormValues = { status: 'draft', name: '', selected: false, areas: [] };

export const Editor = () => {
  const { getPath, setPath, setIsEditing } = useRouterStore();
  const id = getPath(1);
  const [newId, setNewId] = useState<string | null>(null);
  const [isCreated, setIsCreated] = useState(false);

  const { set: setBreadcrumbs } = useBreadcrumbStore();

  const { data, trigger, isMutating: isLoading } = useLazyRichMenu({ id: Number(id) });
  const { trigger: update, isMutating: isUpdating } = useUpdateRichMenu({ id: Number(id) });
  const { trigger: create, isMutating: isCreating } = useCreateRichMenu();

  const methods = useForm<FormValues>({
    resolver: yupResolver(richMenuSchema as Yup.ObjectSchema<FormValues>),
    defaultValues: async () => {
      if (!isNaN(Number(id))) {
        try {
          const { id, rich_menu_id, rich_menu_alias_id, size, created_at, updated_at, ...value } = await trigger();
          return value;
        } catch (e) {
          return DEFAULT_VALUES;
        }
      } else {
        return DEFAULT_VALUES;
      }
    },
    reValidateMode: 'onChange',
  });

  const {
    handleSubmit,
    reset,
    getValues,
    formState: { isDirty, isSubmitSuccessful, isSubmitted, errors },
  } = methods;

  useEffect(() => {
    setBreadcrumbs([{ title: 'リッチメニュー', path: '/rich-menu' }, { title: data?.name ?? '新規作成' }]);
  }, [data]);

  useEffect(() => {
    if (Object.keys(errors).length === 0) return;

    message.error(
      <>
        入力内容に不備があります。
        <br />
        下記の項目を確認してください。
        <ul className="tw-mt-2">
          {Object.keys(errors).map((key) => (
            <li key={key}>
              <Tag color="red">{richMenuSchemaNames[key]}</Tag>
            </li>
          ))}
        </ul>
      </>,
    );
  }, [errors]);

  const onSubmit = useOnSubmitCatchError(async (data) => {
    if (id === 'new') {
      const result = await create(data);
      setNewId(result.id.toString());
      setIsCreated(true);
    } else if (!isNaN(Number(id))) {
      await update(data);
    }
    message.success('保存しました。');
  }, methods.setError);

  useEffect(() => {
    if (!isSubmitSuccessful) return;
    reset(getValues(), { keepIsSubmitted: true });
  }, [isSubmitSuccessful, reset]);

  useEffect(() => {
    if (!isSubmitted || isDirty || newId === null) return;
    setPath(`/rich-menu/${newId}`);
    setNewId(null);
  }, [isSubmitted, isDirty, newId]);

  // Enterキーでsubmitしないようにする
  const handleKeyDown: KeyboardEventHandler = (e) => {
    if ((e.target as HTMLInputElement).tagName === 'INPUT' && e.key === 'Enter') {
      e.preventDefault();
    }
  };

  // 閉じるときのダイアログ表示
  useEffect(() => {
    const handleBeforeUnload = (e) => {
      e.preventDefault();
      e.returnValue = '';
    };
    if (isDirty) {
      window.addEventListener('beforeunload', handleBeforeUnload);
    } else {
      window.removeEventListener('beforeunload', handleBeforeUnload);
    }
    setIsEditing(isDirty);

    return () => {
      window.removeEventListener('beforeunload', handleBeforeUnload);
      setIsEditing(false);
    };
  }, [isDirty]);

  if (id === 'new' || data || isLoading || isCreated) {
    return (
      <FormProvider {...methods}>
        <form onSubmit={handleSubmit(onSubmit)} onKeyDown={handleKeyDown} role="form">
          <Card
            title="リッチメニューの編集"
            extra={
              <Button
                type="primary"
                htmlType="submit"
                className="tw-w-fit"
                loading={isUpdating || isCreating}
                disabled={!isDirty || isLoading}
              >
                保存
              </Button>
            }
            data-testid="content"
          >
            <Row gutter={10}>
              <Col lg={12} span={24}>
                <BasicInfoEditor />
              </Col>
              <Col lg={12} span={24}>
                <RichMenuImage />
              </Col>
              <Col lg={12} span={24}>
                <ActionList />
              </Col>
              <Col lg={12} span={24}>
                <ActionEditor />
              </Col>
            </Row>
          </Card>
        </form>
      </FormProvider>
    );
  } else {
    return (
      <Empty description={`ID: ${id} のリッチメニューは存在しません。`} data-testid="not-found">
        <Button type="primary" onClick={() => setPath('/rich-menu')}>
          リストへ戻る
        </Button>
      </Empty>
    );
  }
};
