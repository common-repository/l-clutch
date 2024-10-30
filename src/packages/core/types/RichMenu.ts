import * as yup from 'yup';

import { lineActionSchema } from './LineAction';
import { Schemas } from '.';

const chatBarTextSchema = yup.string().max(14, '最大14文字です');

const areasSchema = yup.array().of(
  yup.object({
    bounds: yup
      .object({
        x: yup.number().min(0, 'X:最小値は0です').integer('X:整数を入力してください'),
        y: yup.number().min(0, 'Y:最小値は0です').integer('Y:整数を入力してください'),
        width: yup.number().min(1, 'W:最小値は1です').integer('W:整数を入力してください'),
        height: yup.number().min(1, 'H:最小値は1です').integer('H:整数を入力してください'),
      })
      .test('over-background', '領域がはみ出しています', (bounds, ctx) => {
        if (
          bounds.x === undefined ||
          bounds.y === undefined ||
          bounds.width === undefined ||
          bounds.height === undefined
        ) {
          return false;
        }
        const background = ctx.from?.slice(-1)[0].value.background;
        if (!background) return true;
        if (bounds.x + bounds.width > background.width) return false;
        if (bounds.y + bounds.height > background.height) return false;
        return true;
      }),
    action: lineActionSchema,
  }),
);
const backgroundSchema = yup
  .object({
    width: yup.number().min(800, '最小幅は800pxです').max(2500, '最大幅は2500pxです'),
    height: yup.number().min(250, '最小高さは250pxです'),
    file_size: yup.number().max(1000000, '最大ファイルサイズは1MBです'),
  })
  .test(
    'aspect-ratio',
    '幅/高さの最小アスペクト比は1.45です',
    (background) => (background?.width ?? 1.45) / (background?.height ?? 1) >= 1.45,
  );

const richMenuSchema = yup
  .object({
    name: yup.string().required('名前を入力してください'),
    chat_bar_text: chatBarTextSchema,
    background: backgroundSchema.default(undefined),
  })
  .when({
    is: (richMenu: Schemas['RichMenuResponse']) => richMenu.status === 'publish',
    then: (schema) =>
      schema.shape({
        chat_bar_text: chatBarTextSchema.required('テキストを入力してください'),
        areas: areasSchema,
        background: backgroundSchema.shape({
          id: yup.number().required('背景画像をアップロードしてください'),
        }),
      }),
  });

const richMenuSchemaNames = {
  name: 'タイトル',
  areas: 'アクション',
  chat_bar_text: 'メニューバーのテキスト',
  background: '背景画像',
};

export { richMenuSchema, richMenuSchemaNames };
