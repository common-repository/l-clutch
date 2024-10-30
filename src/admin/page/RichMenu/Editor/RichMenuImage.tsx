import { useState } from 'react';
import { Flex, Segmented, Spin, Upload } from 'antd';
import { useFormContext } from 'react-hook-form';

import { ErrorMessage, Schemas } from '@l-clutch/core';

import { FormValues } from '.';
import { BackgroundEditor } from './BackgroundEditor';
import { InboxOutlined } from '@ant-design/icons';
import { useUploadProps } from './useUploadProps';

export const RichMenuImage = () => {
  const {
    formState: { errors },
    watch,
    setValue,
  } = useFormContext<FormValues>();

  const background = watch('background');
  const [showActionArea, setShowActionArea] = useState(true);

  const { uploadProps, isUploading } = useUploadProps({
    setImage: (image: Schemas['Image'] | undefined) => setValue('background', image, { shouldDirty: true }),
  });

  return (
    <div className="tw-w-full tw-max-w-4xl tw-mx-auto">
      {background ? (
        <BackgroundEditor showActionArea={showActionArea} />
      ) : (
        <Upload.Dragger {...uploadProps} showUploadList={false}>
          <p className="ant-upload-drag-icon">{isUploading ? <Spin size="large" /> : <InboxOutlined />}</p>
          <p className="ant-upload-text">リッチメニューの背景画像をアップロード</p>
          <p className="ant-upload-hint">クリックまたは画像をドロップでアップロードできます。</p>
        </Upload.Dragger>
      )}

      <Flex justify="space-between" align="center" className="tw-mt-3">
        <div>
          <div>
            画像サイズ：{background?.width}×{background?.height}
            <ErrorMessage
              error={errors.background}
              tooltip={
                <>
                  <a
                    href={`${lClutchCoreSettings.siteUrl}/wp-admin/upload.php?item=${background?.id}&mode=edit`}
                    className="tw-text-blue-200"
                  >
                    WordPressの画像エディター
                  </a>
                  でサイズの変更が可能です。
                </>
              }
            />
          </div>
        </div>
        <div>
          <div className="tw-flex tw-items-center tw-gap-3"></div>
          <Flex align="center" gap={3}>
            アクション領域
            <Segmented
              value={background && showActionArea ? 1 : 0}
              label="アクション領域"
              onChange={(value) => setShowActionArea(!!value)}
              disabled={!background}
              options={[
                { label: '表示', value: 1 },
                { label: '非表示', value: 0 },
              ]}
            />
          </Flex>
        </div>
      </Flex>
    </div>
  );
};
