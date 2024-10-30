import { useEffect, useMemo, useState } from 'react';
import { Button, Card, Divider, Form, Input, Skeleton, Spin, Tag } from 'antd';
import { useForm } from 'react-hook-form';

import {
  ErrorMessage,
  ControlledFormItem,
  useUpdateLoginChannel,
  Schemas,
  useUpdateMessagingChannel,
} from '@l-clutch/core';

type Props = {
  children?: React.ReactNode;
  label: string;
  status: Schemas['ChannelStatus'] | undefined;
  update: ReturnType<typeof useUpdateLoginChannel>['trigger'] | ReturnType<typeof useUpdateMessagingChannel>['trigger'];
  isSaving: boolean;
  isLoading: boolean;
};

type FormValues = Schemas['ChannelSetting'];

export const ChannelSettingCard = ({ children, label, status, update, isSaving, isLoading }: Props) => {
  const {
    control,
    reset,
    formState: { errors },
    setError,
    handleSubmit,
  } = useForm<FormValues>({
    defaultValues: {
      channel_id: status?.channel_id ?? '',
      channel_secret: '',
    },
  });

  const [isEditing, setIsEditing] = useState(false);

  const onSubmit = async (data: FormValues) => {
    try {
      await (update as ReturnType<typeof useUpdateLoginChannel>['trigger'])({
        channel_id: data.channel_id,
        channel_secret: data.channel_secret,
      });
      setIsEditing(false);
    } catch (e) {
      const error = e as Schemas['ErrorResponse'];
      setError('root', { message: error.message ?? 'エラーが発生しました。' });
    }
  };

  useEffect(() => {
    if (!status) return;
    reset(status);
    if (!status.is_valid) setIsEditing(true);
  }, [status, reset]);

  const StatusTag = useMemo(() => {
    if (isEditing) return null;
    if (status?.is_valid === undefined) return null;

    let color: Parameters<typeof Tag>[0]['color'] | undefined = undefined;
    let message: string | undefined = undefined;
    if (status?.is_valid) {
      color = 'success';
      message = '有効';
    } else {
      color = 'error';
      message = '無効';
    }

    return (
      <Tag color={color} aria-label="ステータス">
        {message}
      </Tag>
    );
  }, [status, isEditing]);

  return (
    <Card
      title={
        <>
          {label} {StatusTag}
        </>
      }
      extra={
        <Button onClick={() => setIsEditing(true)} disabled={isEditing}>
          変更
        </Button>
      }
      bodyStyle={{ paddingBottom: 0 }}
    >
      <Form labelCol={{ span: 8 }} wrapperCol={{ span: 16 }} onSubmitCapture={handleSubmit(onSubmit)}>
        <ErrorMessage error={errors.root} />
        <ControlledFormItem
          control={control}
          name="channel_id"
          label="チャネルID"
          render={({ field }) =>
            isLoading ? (
              <Skeleton.Input active={true} className="!tw-w-full" />
            ) : (
              <Input
                {...field}
                readOnly={!isEditing}
                rootClassName={isEditing ? '' : 'tw-bg-readonly-gray'}
                autoComplete="off"
              />
            )
          }
        />

        <ControlledFormItem
          control={control}
          name="channel_secret"
          label="チャネルシークレット"
          className={isEditing ? '' : 'tw-hidden'}
          render={({ field }) => <Input {...field} data-testid="channel-secret" autoComplete="off" />}
        />

        {isEditing && (
          <Form.Item wrapperCol={{ offset: 8, span: 16 }}>
            <Button type="primary" htmlType="submit" disabled={isSaving} className="tw-mr-3">
              {isSaving ? <Spin /> : '保存'}
            </Button>
            <Button
              onClick={() => {
                reset(status);
                setIsEditing(false);
              }}
              disabled={isSaving}
              htmlType="button"
            >
              キャンセル
            </Button>
          </Form.Item>
        )}
      </Form>

      {children && (
        <>
          <Divider />
          {children}
        </>
      )}
    </Card>
  );
};
