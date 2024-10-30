import { Form, FormItemProps } from 'antd';
import { ReactNode, useMemo } from 'react';

import {
  Controller,
  ControllerFieldState,
  ControllerRenderProps,
  FieldPath,
  FieldValues,
  UseControllerProps,
  UseFormStateReturn,
} from 'react-hook-form';

export const ControlledFormItem: <
  TFieldValues extends FieldValues = FieldValues,
  TName extends FieldPath<TFieldValues> = FieldPath<TFieldValues>,
>(
  props: {
    render: ({
      field,
      fieldState,
      formState,
    }: {
      field: ControllerRenderProps<TFieldValues, TName> & { id: string };
      fieldState: ControllerFieldState;
      formState: UseFormStateReturn<TFieldValues>;
    }) => React.ReactElement;
  } & UseControllerProps<TFieldValues, TName> &
    Omit<FormItemProps<TFieldValues>, 'name'>,
) => ReactNode = ({ control, name, render, ...formItemProps }) => {
  const id = useMemo(() => Math.random().toString(32).substring(2), []);

  return (
    <Controller
      control={control}
      name={name}
      render={({ field, fieldState, formState }) => (
        <Form.Item
          validateStatus={fieldState.invalid ? 'error' : formState.isValidating ? 'validating' : undefined}
          hasFeedback
          help={fieldState.error?.message}
          htmlFor={id}
          {...formItemProps}
        >
          {render({ field: { ...field, id }, fieldState, formState })}
        </Form.Item>
      )}
    />
  );
};
