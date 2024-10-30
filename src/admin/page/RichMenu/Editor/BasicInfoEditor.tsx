import { useState } from 'react';
import { Dropdown, Input, Radio, Skeleton, Spin, Switch, Upload } from 'antd';
import { UploadOutlined } from '@ant-design/icons';
import { useFormContext } from 'react-hook-form';

import { ControlledFormItem, Schemas, SelectImageModal } from '@l-clutch/core';

import { FormValues } from '.';
import { useUploadProps } from './useUploadProps';

const commonFormItemProps = {
  labelCol: { span: 10 },
  wrapperCol: { span: 14 },
};

export const BasicInfoEditor = () => {
  const { control, setValue } = useFormContext<FormValues>();

  const { uploadProps, isUploading } = useUploadProps({
    setImage: (image: Schemas['Image'] | undefined) => setValue('background', image, { shouldDirty: true }),
  });

  const [isOpen, setIsOpen] = useState(false);

  return (
    <>
      <ControlledFormItem
        control={control}
        name="name"
        label="タイトル"
        tooltip="管理用のタイトルです。ユーザーには表示されません。"
        {...commonFormItemProps}
        render={({ field, formState }) =>
          formState.isLoading ? <Skeleton.Input active className="!tw-w-full" /> : <Input {...field} />
        }
      />

      <ControlledFormItem
        control={control}
        name="status"
        label="ステータス"
        tooltip="管理用のタイトルです。ユーザーには表示されません。"
        {...commonFormItemProps}
        render={({ field, formState }) => (
          <Radio.Group {...field} onChange={(e) => field.onChange(e.target.value)} disabled={formState.isLoading}>
            <Radio.Button value="publish">有効</Radio.Button>
            <Radio.Button value="draft">下書き</Radio.Button>
          </Radio.Group>
        )}
      />

      <ControlledFormItem
        control={control}
        name="chat_bar_text"
        label="メニューバーのテキスト"
        tooltip="チャットルームの下部にあるメニューバーに表示するテキストです。"
        {...commonFormItemProps}
        render={({ field, formState }) =>
          formState.isLoading ? <Skeleton.Input active className="!tw-w-full" /> : <Input {...field} />
        }
      />

      <ControlledFormItem
        control={control}
        name="selected"
        label="メニューのデフォルト表示"
        tooltip="チャットルームを開いたときに、リッチメニューを表示するかしないかを選択します。"
        {...commonFormItemProps}
        render={({ field }) => <Switch {...field} checked={field.value} />}
      />

      <ControlledFormItem
        control={control}
        name="background"
        label="背景画像"
        tooltip={{
          title: (
            <>
              <p>リッチメニューの画像は以下の要件を満たす必要があります。</p>
              <ul>
                <li>画像フォーマット：JPEGまたはPNG 画像の幅サイズ：800ピクセル以上、2500ピクセル以下</li>
                <li>画像の高さサイズ：250ピクセル以上</li>
                <li>画像のアスペクト比（幅÷高さ）：1.45以上</li>
                <li>最大ファイルサイズ：1MB</li>
              </ul>
            </>
          ),
        }}
        {...commonFormItemProps}
        render={({ field }) => (
          <>
            <Dropdown.Button
              onClick={() => setIsOpen(true)}
              menu={{
                items: [
                  {
                    key: 'upload',
                    label: (
                      <Upload {...uploadProps}>
                        {isUploading ? <Spin size="small" /> : <UploadOutlined />} 画像をアップロード
                      </Upload>
                    ),
                  },
                  {
                    key: 'delete',
                    label: '選択を解除',
                    danger: true,
                    disabled: !field.value,
                    onClick: () => field.onChange(undefined),
                  },
                ],
              }}
            >
              ライブラリから選択
            </Dropdown.Button>
            {isOpen && (
              <SelectImageModal
                isOpen={isOpen}
                setIsOpen={setIsOpen}
                image={field.value}
                setImage={(image) => field.onChange(image)}
              />
            )}
          </>
        )}
      />
    </>
  );
};
