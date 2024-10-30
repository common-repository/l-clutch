import { FC, useCallback, useMemo } from 'react';
import { Divider, Form, Select, Button, Popover, Image } from 'antd';

import { useInfiniteRichMenuList } from '../..';
import { API, LineActionField, Schemas } from '../../types';

// TODO: リッチメニュー切替時の追加アクションを設定可能にする
export const RichMenuSwitchActionField: LineActionField<Schemas['RichMenuSwitchAction'], { richMenuId?: number }> = ({
  action,
  setAction,
  errors,
  richMenuId,
}) => {
  const { data, next, hasNext } = useInfiniteRichMenuList({ per_page: 10, status: 'publish' });

  const setActionAliasId = useCallback(
    (id: string) => {
      setAction({
        ...action,
        rich_menu_alias_id: id,
      });
    },
    [action, setAction],
  );

  return (
    <Form.Item
      label="変更先のリッチメニュー"
      validateStatus={errors?.rich_menu_alias_id ? 'error' : undefined}
      hasFeedback
      help={errors?.rich_menu_alias_id?.message}
    >
      <Select
        dropdownRender={(menu) => (
          <>
            {menu}
            {hasNext && (
              <>
                <Divider className="tw-my-2" />
                <Button type="link" onClick={next}>
                  更に読み込む
                </Button>
              </>
            )}
          </>
        )}
        options={data.items
          .filter((item) => item.id !== richMenuId && item.rich_menu_alias_id !== undefined)
          .map((item) => ({ label: <OptionItem richMenu={item} />, value: item.rich_menu_alias_id }))}
        value={action.rich_menu_alias_id}
        onChange={(value) => setActionAliasId(value)}
      />
    </Form.Item>
  );
};

const OptionItem: FC<{ richMenu: Schemas['RichMenuResponse'] }> = ({ richMenu }) => {
  return (
    <Popover
      content={<Image src={richMenu.background?.thumbnail_url} preview={false} width={300} />}
      placement="leftBottom"
    >
      <div className="tw-w-full">{richMenu.name}</div>
    </Popover>
  );
};
