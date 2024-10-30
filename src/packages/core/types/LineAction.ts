import * as yup from 'yup';

import { isValidUrl } from '../utils/isValidUrl';
import { Schemas } from '.';

// export type ChatActionData = {
//   source: {
//     type: 'rich_menu';
//     id?: number;
//     index?: number;
//   };
//   action?: Partial<Action>;
// };

// export type InvokeActionChatAction = ChatActionBase & {
//   type: 'invokeAction';
//   data?: ChatActionData;
//   displayText?: string;
//   inputOption?: 'closeRichMenu' | 'openRichMenu' | 'openKeyboard' | 'openVoice';
//   fillInText?: string;
// };

// const lineActionDataSchema = yup
//   .object()
//   .required('データを入力してください')
//   .test('json-length', 'データが長すぎます', (value) => {
//     const data = { ...value } as ChatActionData;
//     delete data.action;
//     const json = JSON.stringify(data);
//     return json.length <= 300;
//   });

const lineActionShapes = {
  // postback: {
  //   data: lineActionDataSchema,
  //   displayText: yup.string().max(300, '最大300文字です'),
  //   inputOption: yup.string().oneOf(['closeRichMenu', 'openRichMenu', 'openKeyboard', 'openVoice']),
  //   fillInText: yup.string().max(300, '最大300文字です'),
  // },
  message: {
    text: yup.string().max(5000, '最大5000文字です').required('メッセージを入力してください'),
  },
  uri: {
    uri: yup
      .string()
      .test('url-valid', 'URLの形式が正しくありません', (value) => value == null || isValidUrl(value))
      .required('URLを入力してください'),
  },
  richmenuswitch: {
    rich_menu_alias_id: yup.string().required('リッチメニューを選択してください'),
    // data: lineActionDataSchema,
  },
};

export const lineActionSchema = yup
  .object({
    type: yup.string().required('アクションを選択してください'),
    label: yup.string().max(20, '最大20文字です').nullable(),
  })
  .concat(
    (Object.keys(lineActionShapes) as (keyof typeof lineActionShapes)[]).reduce((schema, name) => {
      const chatActionShape = lineActionShapes[name];
      return schema.when({
        is: (action: Schemas['LineAction']) => action.type === name,
        then: (schema) =>
          schema.shape({
            ...chatActionShape,
          }),
      });
    }, yup.object()),
  );
