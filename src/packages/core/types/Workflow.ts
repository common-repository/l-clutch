import * as yup from 'yup';

import { Action, SourceType } from './Action';

export type Workflow = {
  id: number;
  name: string;
  status: 'draft' | 'publish';
  sourceType: SourceType;
  actions?: Action[];
  createdAt: number;
  updatedAt: number;
};

export const workflowSchema = (actionsSchema: yup.ISchema<any>) =>
  yup
    .object({
      name: yup.string().required('名前を入力してください'),
    })
    .when({
      is: (workflow: Workflow) => workflow.status === 'publish',
      then: (schema) =>
        schema.shape({ actions: actionsSchema }).shape({
          actions: yup.array().of(
            yup.object().test('requiedInput', '入力が接続されていません。', (_action) => {
              let action = _action as Action;
              if (action.type === 'core/start-workflow') return true;
              return !!action.sourceId;
            })
          ),
        }),
    });
