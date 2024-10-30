import { useEffect, useMemo, useState } from 'react';
import { FieldArray, useFieldArray, useFormContext } from 'react-hook-form';
import { Table, Button, Typography, Space, Popover, Tag, Flex, Select, Form } from 'antd';
import { CloseCircleFilled, DownOutlined } from '@ant-design/icons';
import { ColumnsType } from 'antd/es/table';
import type { DragEndEvent } from '@dnd-kit/core';
import { DndContext } from '@dnd-kit/core';
import { restrictToVerticalAxis } from '@dnd-kit/modifiers';
import { SortableContext, verticalListSortingStrategy } from '@dnd-kit/sortable';

import { useLineActionStore } from '@l-clutch/core';

import { FormValues } from '.';
import { useSelectAction } from './useSelectAction';
import { ActionListRow } from './ActionListRow';
import { ActionListFooter } from './ActionListFooter';
import { AreaTemplate, AREA_TEMPLATES, AreaTemplateSelectModal } from './AreaTemplate';

export const ActionList = () => {
  const {
    control,
    watch,
    formState: { isLoading },
    getFieldState,
    setValue,
  } = useFormContext<FormValues>();
  const { id: selectedId, setIdList, setId: setSelectedId } = useSelectAction();

  const areas = watch(`areas`);
  const background = watch(`background`);
  const errors = getFieldState('areas')?.error;

  const { fields, append, remove, move, insert } = useFieldArray({
    control,
    name: 'areas',
  });

  useEffect(() => {
    setIdList(fields.map((field) => field.id));
  }, [fields, setIdList]);

  const lineActionTypes = useLineActionStore((state) => state.types);

  const onDragEnd = ({ active, over }: DragEndEvent) => {
    if (active.id === over?.id) return;
    const activeIndex = fields.findIndex((i) => i.id === active.id);
    const overIndex = fields.findIndex((i) => i.id === over?.id);
    move(activeIndex, overIndex);
  };

  const [isTemplateModalOpen, setTemplateModalOpen] = useState(false);
  const [selectedTemplateValue, setSelectedTemplateValue] = useState<number | undefined>(1);
  const selectedTemplate = useMemo(
    () => AREA_TEMPLATES.find(({ value }) => value === selectedTemplateValue)?.template,
    [selectedTemplateValue],
  );

  const columns = useMemo<ColumnsType<FieldArray<FormValues, 'areas'>>>(
    () => [
      {
        key: 'sort',
      },
      {
        title: 'ラベル',
        dataIndex: 'action',
        key: 'label',
        render: ({ label }) => (label?.length > 0 ? label : 'ラベルなし'),
      },
      {
        title: 'タイプ',
        dataIndex: 'action',
        key: 'type',
        render: ({ type }) => (type ? lineActionTypes[type].label : 'アクションなし'),
      },
      {
        title: 'アクション',
        dataIndex: 'action',
        key: 'action',
        render: (_action, area, index) => (
          <Space.Compact block>
            <Popover
              content={
                selectedTemplate && (
                  <AreaTemplate
                    template={selectedTemplate}
                    setBounds={(ratioBounds) => {
                      if (!background) return;
                      const bounds = {
                        x: Math.floor(ratioBounds.x * background.width),
                        y: Math.floor(ratioBounds.y * background.height),
                        width: Math.floor(ratioBounds.width * background.width),
                        height: Math.floor(ratioBounds.height * background.height),
                      };
                      setValue(`areas.${index}.bounds`, bounds, { shouldDirty: true });
                    }}
                  />
                )
              }
            >
              <Button disabled={!selectedTemplate}>
                <Space>
                  領域
                  <DownOutlined />
                </Space>
              </Button>
            </Popover>
            <Button
              onClick={() => {
                insert(index + 1, area);
                setSelectedId(undefined);
              }}
            >
              複製
            </Button>
            <Button
              onClick={() => {
                remove(index);
                setSelectedId(undefined);
              }}
              danger
            >
              削除
            </Button>
          </Space.Compact>
        ),
      },
      {
        title: errors ? 'エラー' : undefined,
        key: 'error',
        render: (_action, _area, index) =>
          errors?.[index] && (
            <Popover
              content={
                <>
                  <p>下記のエラーがあります。</p>
                  <ul className="tw-text-xs">
                    {errors[index].bounds !== undefined && (
                      <li>
                        <Tag color="red">アクション領域</Tag>
                      </li>
                    )}
                    {errors[index].action !== undefined && (
                      <li>
                        <Tag color="red">アクション設定</Tag>
                      </li>
                    )}
                  </ul>
                </>
              }
            >
              <CloseCircleFilled className="tw-text-error" />
            </Popover>
          ),
      },
    ],
    [remove, setSelectedId, errors, background, selectedTemplate], // データが更新されないため、areasを渡す
  );

  return (
    <>
      <Flex justify="space-between">
        <Typography.Title level={4} className="tw-mt-0">
          アクションリスト
        </Typography.Title>
        <Form.Item label="領域テンプレート">
          <Select
            value={selectedTemplateValue}
            options={AREA_TEMPLATES}
            onClick={() => {
              setTemplateModalOpen(true);
            }}
            open={false}
          />
        </Form.Item>
      </Flex>
      <DndContext modifiers={[restrictToVerticalAxis]} onDragEnd={onDragEnd}>
        <SortableContext items={fields?.map((field) => field.id)} strategy={verticalListSortingStrategy}>
          <Table
            components={{
              body: {
                row: ActionListRow,
              },
            }}
            className="tw-border tw-border-solid tw-border-gray-200 tw-rounded-lg tw-overflow-hidden"
            size="small"
            rowKey={(_, index = -1) => fields[index]?.id}
            columns={columns}
            dataSource={areas}
            pagination={false}
            onRow={(_, index = -1) => ({
              onClick: () => setSelectedId(fields[index]?.id),
              className: 'tw-cursor-pointer',
            })}
            rowSelection={{
              type: 'radio',
              selectedRowKeys: selectedId ? [selectedId] : [],
              renderCell: () => null,
            }}
            loading={isLoading}
            footer={() => <ActionListFooter fields={fields} append={append} />}
          />
        </SortableContext>
      </DndContext>
      <AreaTemplateSelectModal
        isOpen={isTemplateModalOpen}
        setIsOpen={setTemplateModalOpen}
        setSelectedTemplate={setSelectedTemplateValue}
      />
    </>
  );
};
