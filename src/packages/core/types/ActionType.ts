import { ComponentType, ReactElement } from 'react';
import type { FieldErrors } from 'react-hook-form';
import type { Node } from 'reactflow';
import type { ISchema } from 'yup';
import { ActionDataType, Attributes } from './Action';

type NodeProps<T extends Attributes = Attributes> = {
  attributes: T;
  setAttributes: (attributes: T) => void;
};

export type SettingPanelContentsType<T extends Attributes = Attributes> = ComponentType<
  NodeProps<T> & {
    errors: FieldErrors<{ action: { attributes: T } }>['action'];
  }
>;

export type NodeLabel<T extends Attributes = Attributes> = ComponentType<NodeProps<T>> | ReactElement | string;

export type ActionType<T extends Attributes = Attributes> = {
  availableFor: ('workflow' | 'chat')[];
  label: string;
  description?: string;
  SettingPanelContents: SettingPanelContentsType<T>;
  nodeOption: Omit<Node, 'id' | 'position' | 'data'>;
  NodeLabel?: NodeLabel<T>;
  limit?: number;
  attributesSchema?: ISchema<any>;
  requiredInputs?: ActionDataType[];
  excludedOutputs?: ActionDataType[];
  defaultAttributes?: T;
};
