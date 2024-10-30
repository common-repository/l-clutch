import { UploadProps, message } from 'antd';
import { create } from 'zustand';

import { Media, Schemas } from '@l-clutch/core';

type Props = {
  setImage: (image: Schemas['Image'] | undefined) => void;
};

export const useUploadProps = ({ setImage }: Props): { uploadProps: UploadProps; isUploading: boolean } => {
  const apiBase = window.lClutchCoreSettings.apiBase;

  const { isUploading, setIsUploading } = useStore();

  return {
    uploadProps: {
      accept: 'image/jpeg,image/png',
      action: apiBase + 'wp/v2/media',
      headers: {
        'X-WP-Nonce': lClutchCoreSettings.nonce,
      },
      showUploadList: false,
      maxCount: 1,
      beforeUpload: async (file) => {
        if (file.type !== 'image/jpeg' && file.type !== 'image/png') {
          message.error('画像ファイルを選択して下さい。');
          return false;
        }

        const image = new Image();
        await Promise.all([
          new Promise((resolve) => image.addEventListener('load', resolve)),
          (image.src = URL.createObjectURL(file)),
        ]);
        const { width, height } = image;

        if (width < 800) {
          message.error('画像の横幅が800px未満です。');
          return false;
        } else if (width > 2500) {
          message.error('画像の横幅が2500pxを超えています。');
          return false;
        }

        if (height < 250) {
          message.error('画像の縦幅が250px未満です。');
          return false;
        }

        if (width / height < 1.45) {
          message.error('画像のアスペクト比が1.45未満です。');
          return false;
        }

        if (file.size > 1024 * 1024) {
          message.error('画像のサイズが1MBを超えています。');
          return false;
        }

        setIsUploading(true);

        return true;
      },
      onChange: (info) => {
        if (info.file.status === 'done') {
          const { id, source_url, media_details } = info.file.response as Media;
          setImage({
            id,
            url: source_url,
            thumbnail_url: media_details.sizes.thumbnail.source_url,
            width: media_details.width,
            height: media_details.height,
            file_size: media_details.filesize,
          });
          setIsUploading(false);
        } else if (info.file.status === 'error') {
          message.error('画像のアップロードに失敗しました。');
        }
      },
      disabled: isUploading,
    },
    isUploading,
  };
};

type State = {
  isUploading: boolean;
  setIsUploading: (isUploading: boolean) => void;
};

const useStore = create<State>((set) => ({
  isUploading: false,
  setIsUploading(isUploading) {
    set({ isUploading });
  },
}));
