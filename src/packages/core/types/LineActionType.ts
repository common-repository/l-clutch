import { ComponentType } from 'react';
import type { DeepRequired, FieldError, FieldErrorsImpl, Merge } from 'react-hook-form';
import { Schemas } from '.';

export type LineActionField<T extends Schemas['LineAction'], U extends Record<string, any> = {}> = ComponentType<
  {
    action: T;
    setAction: (action: T) => void;
    errors?: Merge<FieldError, FieldErrorsImpl<DeepRequired<T>>>;
  } & U
>;

export type LineActionType<T extends Schemas['LineAction'] = any> = {
  label: string;
  Field: LineActionField<T, any>;
  defaultAttributes?: T;
};
