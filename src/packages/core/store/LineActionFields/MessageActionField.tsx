import { Form, Input } from 'antd';

import { LineActionField, Schemas } from '../../types';

export const MessageActionField: LineActionField<Schemas['MessageAction']> = ({ action, setAction, errors }) => {
  return (
    <Form.Item
      label="テキスト"
      tooltip="送信するメッセージ"
      validateStatus={errors?.text ? 'error' : undefined}
      hasFeedback
      help={errors?.text?.message}
    >
      <Input.TextArea
        showCount
        maxLength={300}
        rows={4}
        value={action.text}
        onChange={(e) => setAction({ ...action, text: e.target.value })}
      />
    </Form.Item>
  );
};
