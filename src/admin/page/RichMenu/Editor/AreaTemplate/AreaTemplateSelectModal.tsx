import { FC } from 'react';
import { Button, Col, Modal, Row } from 'antd';

import { AreaTemplate, AREA_TEMPLATES } from '.';

type Props = {
  isOpen: boolean;
  setIsOpen: (isOpen: boolean) => void;
  setSelectedTemplate: (template?: number) => void;
};

export const AreaTemplateSelectModal: FC<Props> = ({ isOpen, setIsOpen, setSelectedTemplate }) => {
  return (
    <Modal
      title="テンプレートを選択して下さい"
      open={isOpen}
      onCancel={() => setIsOpen(false)}
      okButtonProps={{
        className: 'tw-hidden',
      }}
      cancelText="キャンセル"
    >
      <Row gutter={[10, 10]}>
        {AREA_TEMPLATES.map(({ label, value, template }) => (
          <Col span={12} key={value}>
            <Button
              block
              onClick={() => {
                setSelectedTemplate(value as number);
                setIsOpen(false);
              }}
              className="tw-h-auto tw-pt-3"
            >
              <AreaTemplate template={template} />
              {label}
            </Button>
          </Col>
        ))}
      </Row>
    </Modal>
  );
};
