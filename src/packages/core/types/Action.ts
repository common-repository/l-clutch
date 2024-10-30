import * as yup from 'yup';

export type Attributes<T extends Record<string, any> = Record<string, any>> = T;
export type SourceType = 'unspecified' | 'action' | 'webhook_follow' | 'webhook_unfollow';
export type ActionDataType = 'userId' | 'replyToken';
export type Outputs = Record<number, ActionDataType[]>;

// TODO: ServerActionにリネーム

export type Action<T extends Attributes = Attributes> = {
  id: number;
  type: string;
  sourceType?: SourceType;
  sourceId?: number;
  attributes: T;
  position: { x: number; y: number };
};

export const actionsSchema = (attributesSchemas: Record<string, yup.ISchema<any>>) =>
  yup.array().of(
    yup
      .object()
      .test('requiedInput', '入力が接続されていません。', (_action) => {
        let action = _action as Action;
        if (action.type === 'core/start-workflow') return true;
        return !!action.sourceId;
      })
      .concat(
        Object.keys(attributesSchemas).reduce((prev, name) => {
          const attributesSchema = attributesSchemas[name];
          return prev.when({
            is: (action: Action) => action.type === name,
            then: (schema) =>
              schema.shape({
                attributes: attributesSchema,
              }),
          });
        }, yup.object())
      )
  );
