import { Col, InputNumber, Row } from 'antd';
import { useFormContext } from 'react-hook-form';

import { ErrorMessage, Schemas } from '@l-clutch/core';

import { FormValues } from '.';

type Props = {
  bounds: Schemas['RichMenuBounds'];
  background: Schemas['Image'];
  index: number;
};

export const BoundsEditor = ({ bounds, background, index }: Props) => {
  const {
    formState: { errors },
    setValue,
  } = useFormContext<FormValues>();
  if (index === undefined || background === undefined || bounds === undefined) return null;

  return (
    <>
      <Row gutter={[5, 5]} className="tw-w-96">
        <Col span={12}>
          <InputNumber
            addonBefore="横位置"
            addonAfter="px"
            max={background.width - bounds.width}
            min={0}
            value={bounds.x}
            onChange={(value) => {
              if (value === null) return;
              setValue(`areas.${index}.bounds.x`, value, { shouldDirty: true });
            }}
          />
        </Col>
        <Col span={12}>
          <InputNumber
            addonBefore="縦位置"
            addonAfter="px"
            max={background.height - bounds.height}
            min={0}
            value={bounds.y}
            onChange={(value) => {
              if (value === null) return;
              setValue(`areas.${index}.bounds.y`, value, { shouldDirty: true });
            }}
          />
        </Col>
        <Col span={12}>
          <InputNumber
            addonBefore="幅"
            addonAfter="px"
            max={background.width - bounds.x}
            min={0}
            value={bounds.width}
            onChange={(value) => {
              if (value === null) return;
              setValue(`areas.${index}.bounds.width`, value, { shouldDirty: true });
            }}
          />
        </Col>
        <Col span={12}>
          <InputNumber
            addonBefore="高さ"
            addonAfter="px"
            max={background.height - bounds.y}
            min={0}
            value={bounds.height}
            onChange={(value) => {
              if (value === null) return;
              setValue(`areas.${index}.bounds.height`, value, { shouldDirty: true });
            }}
          />
        </Col>
      </Row>
      <ErrorMessage error={errors.areas?.[index]?.bounds} />
    </>
  );
};
