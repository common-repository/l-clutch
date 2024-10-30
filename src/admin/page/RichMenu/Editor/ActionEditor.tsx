import { useMemo } from 'react';
import { Card, Empty, Input, Select, Skeleton, Typography } from 'antd';
import { Controller, useFormContext } from 'react-hook-form';

import { ControlledFormItem, useLineActionStore, useRouterStore } from '@l-clutch/core';

import { FormValues } from '.';
import { useSelectAction } from './useSelectAction';

export const ActionEditor = () => {
  const { getPath } = useRouterStore();
  const id = getPath(1);

  const { control, watch } = useFormContext<FormValues>();
  const selectedIndex = useSelectAction((select) => select.index);
  const areas = watch(`areas`);
  const selectedAction = areas?.[selectedIndex ?? -1]?.action;
  const types = useLineActionStore((state) => state.types);

  const LineActionField = useMemo(() => {
    if (!selectedAction || !selectedAction.type) return () => null;
    return types[selectedAction.type]?.Field;
  }, [selectedAction?.type, types]);

  return (
    <>
      <Typography.Title level={4} className="tw-mt-0">
        アクション設定
      </Typography.Title>
      <Card type="inner">
        {selectedIndex !== undefined ? (
          areas?.map((_area, index) => {
            if (index !== selectedIndex) return null;
            return (
              <Controller
                key={`action-editor-${index}`}
                control={control}
                name={`areas.${index}.action`}
                render={({ field, fieldState }) => (
                  <>
                    <ControlledFormItem
                      control={control}
                      name={`areas.${index}.action.label`}
                      label="ラベル"
                      render={({ field, formState }) =>
                        formState.isLoading ? <Skeleton.Input active className="!tw-w-full" /> : <Input {...field} />
                      }
                    />

                    <ControlledFormItem
                      control={control}
                      name={`areas.${index}.action.type`}
                      label="ユーザーアクション"
                      render={({ field, formState }) =>
                        formState.isLoading ? (
                          <Skeleton.Input active className="!tw-w-full" />
                        ) : (
                          <Select {...field} data-testid="user-action-select">
                            {types &&
                              Object.keys(types).map((typeName) => (
                                <Select.Option key={typeName} value={typeName}>
                                  {types[typeName].label}
                                </Select.Option>
                              ))}
                          </Select>
                        )
                      }
                    />

                    <LineActionField
                      action={selectedAction}
                      setAction={(action) => field.onChange({ ...field.value, ...action })}
                      errors={fieldState.error}
                      richMenuId={id}
                    />
                  </>
                )}
              />
            );
          })
        ) : (
          <Empty image={Empty.PRESENTED_IMAGE_SIMPLE} description="アクションが選択されていません" />
        )}
      </Card>
    </>
  );
};
