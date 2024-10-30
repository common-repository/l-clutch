import { useCallback, useRef, useState } from 'react';
import { Button, Col, Image, Modal, Row, Skeleton } from 'antd';

import { Schemas, useInfiniteMediaList } from '..';

type Props = {
  isOpen: boolean;
  setIsOpen: (isOpen: boolean) => void;
  image: Schemas['Image'] | undefined;
  setImage: (image: Schemas['Image'] | undefined) => void;
};

export const SelectImageModal = ({ isOpen, setIsOpen, image, setImage }: Props) => {
  const { data, isValidating, hasNext, next } = useInfiniteMediaList({ media_type: 'image', per_page: 12 });
  const selectedRef = useRef<Schemas['Image'] | undefined>(image);
  const [selected, setSelected] = useState<Schemas['IdObject'] | undefined>();

  const onOk = useCallback(() => {
    setImage(selectedRef.current);
    setIsOpen(false);
  }, [setIsOpen, setImage]);

  return (
    <Modal
      title="画像を選択して下さい"
      open={isOpen}
      onOk={onOk}
      onCancel={() => setIsOpen(false)}
      okText="選択"
      okButtonProps={{ disabled: selected === undefined }}
      cancelText="キャンセル"
    >
      <Row gutter={[16, 16]}>
        {data?.items.map((item) => (
          <Col sm={8} xs={12} key={`image-selector-${item.id}`}>
            <div
              style={{ paddingTop: '69%' }}
              className={
                'tw-relative tw-bg-gray-100 tw-border tw-border-solid tw-border-gray-200 tw-cursor-pointer' +
                (selected?.id === item.id ? ' tw-outline tw-outline-4 tw-outline-blue-500' : '')
              }
              onClick={() => {
                setSelected({ id: item.id });
                selectedRef.current = {
                  id: item.id,
                  url: item.source_url,
                  thumbnail_url: item.media_details.sizes.thumbnail.source_url,
                  width: item.media_details.width,
                  height: item.media_details.height,
                  file_size: item.media_details.filesize,
                };
              }}
            >
              <Image
                src={
                  item.media_details.sizes.medium?.source_url ??
                  item.media_details.sizes.large?.source_url ??
                  item.source_url
                }
                preview={false}
                wrapperClassName="tw-absolute tw-top-0 tw-left-0 tw-w-full tw-h-full tw-flex tw-items-center"
                draggable={false}
              />
            </div>
          </Col>
        ))}
        {isValidating &&
          new Array(3).fill(0).map((_, index) => (
            <Col span={8} className="tw-text-center" key={`image-selector-skeleton-${index}`}>
              <div
                style={{ paddingTop: '69%' }}
                className="tw-relative tw-bg-gray-100 tw-border tw-border-solid tw-border-gray-200 tw-cursor-pointer"
              >
                <Skeleton.Image
                  active
                  rootClassName="tw-absolute tw-top-0 tw-left-0 tw-flex tw-items-center"
                  className="!tw-w-full !tw-h-full"
                />
              </div>
            </Col>
          ))}
        {hasNext && (
          <Col span={24} className="tw-text-center">
            <Button onClick={next} loading={isValidating}>
              もっと見る
            </Button>
          </Col>
        )}
      </Row>
    </Modal>
  );
};
