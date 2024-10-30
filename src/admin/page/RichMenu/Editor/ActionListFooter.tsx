import { FC, useState } from 'react';
import { Button, Flex, Form, Input, Select, Tooltip } from 'antd';
import { useFormContext } from 'react-hook-form';

import { Schemas, useLineActionStore } from '@l-clutch/core';

import { FormValues } from '.';

type Props = {
  fields: any;
  append: (data: any) => void;
};

export const ActionListFooter: FC<Props> = ({ fields, append }) => {
  const { watch } = useFormContext<FormValues>();
  const background = watch('background');

  const lineActionTypes = useLineActionStore((state) => state.types);

  const [label, setLabel] = useState<string>('');
  const [type, setType] = useState<string>('');
  const isValid = type.length > 0;
  const isActionLimit = fields.length >= 20;

  const onClick = () => {
    append({
      bounds: {
        x: 0,
        y: 0,
        width: Math.round((background?.width ?? 0) / 3),
        height: Math.round((background?.height ?? 0) / 2),
      },
      action: { type, label } as Schemas['LineAction'],
    });
  };

  return (
    <Flex gap={10} justify="space-between">
      <Form.Item label="ラベル" className="tw-mb-0 tw-grow" wrapperCol={{ className: 'tw-shrink tw-w-1/2' }}>
        <Input type="text" value={label} onChange={(e) => setLabel(e.target.value)} />
      </Form.Item>
      <Form.Item label="タイプ" className="tw-mb-0 tw-grow tw-w-60">
        <Select value={type} onChange={(value) => setType(value)}>
          {Object.keys(lineActionTypes).map((type) => (
            <Select.Option key={type} value={type}>
              {lineActionTypes[type].label}
            </Select.Option>
          ))}
        </Select>
      </Form.Item>
      <Tooltip
        title={isActionLimit ? 'アクションは20個までです。' : 'タイプを入力してください。'}
        open={isActionLimit || !isValid ? undefined : false}
        placement="bottomRight"
      >
        <Button onClick={onClick} disabled={isActionLimit || !isValid}>
          追加
        </Button>
      </Tooltip>
    </Flex>
  );
};
