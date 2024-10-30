import { store as blockEditorStore } from '@wordpress/block-editor';
import { useSelect } from '@wordpress/data';

import { Schemas } from '..';

type Props = {
  lineInfo?: Schemas['User']['line_info'];
  size?: number;
};

export const LineAccountView = ({ lineInfo }: Props) => {
  if (!lineInfo) return null;

  return (
    <div className={`tw-flex tw-gap-2 tw-text-left tw-h-12 tw-items-center`}>
      <img
        src={lineInfo.picture_url !== '' ? lineInfo.picture_url : undefined} // TODO: 画像が取得できない場合の処理を追加する
        alt={lineInfo.display_name !== '' ? lineInfo.display_name : '(名前未取得)'}
        className={`tw-block tw-w-12 tw-h-12 tw-rounded-full tw-object-cover`}
        aria-label="アバター画像"
      />
      <div>
        <span className="tw-block tw-text-l tw-font-bold" aria-label="ユーザー名">
          {lineInfo.display_name !== '' ? lineInfo.display_name : '(名前未取得)'}
        </span>
        <span className="tw-block tw-text-s tw-text-slate-500" aria-label="ユーザーID">
          {lineInfo.user_id !== '' ? lineInfo.user_id : '(ユーザーID未取得)'}
        </span>
      </div>
    </div>
  );
};
