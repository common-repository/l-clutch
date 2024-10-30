import { InnerBlocks, useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { CheckboxControl, PanelBody, PanelRow, SelectControl } from '@wordpress/components';

import { BlockFrame } from '@l-clutch/core/block-editor';

export default function edit({ attributes, setAttributes }) {
  const blockProps = useBlockProps();

  const onChangeReadable = (value) => {
    setAttributes({ ...attributes, readable: value === 'true' ? true : false });
  };

  const changeReadableRoles = (role, enable) => {
    if (enable && !attributes.readableRoles.includes(role)) {
      setAttributes({ readableRoles: [...attributes.readableRoles, role] });
    } else if (!enable && attributes.readableRoles.includes(role)) {
      setAttributes({ readableRoles: attributes.readableRoles.filter((r) => r !== role) });
    }
  };

  const onChangeAddedFriend = (value) => {
    setAttributes({ ...attributes, readableLineUser: { addedFriend: value } });
  };

  return (
    <div {...blockProps}>
      <InspectorControls>
        <PanelBody title="制限設定" initialOpen={true}>
          <PanelRow>
            <div>
              <div className="tw-mb-6">
                <SelectControl
                  label="対象ユーザーに対して、ブロックを"
                  onChange={onChangeReadable}
                  value={attributes.readable}
                  options={[
                    { label: '表示する', value: 'true' },
                    { label: '非表示にする', value: 'false' },
                  ]}
                />
              </div>
              <div className="tw-mb-6">
                <h3>対象ユーザー</h3>
                {[
                  { label: '管理者', value: 'administrator' },
                  { label: '編集者', value: 'editor' },
                  { label: '著者', value: 'author' },
                  { label: '投稿者', value: 'contributor' },
                  { label: '閲覧者', value: 'subscriber' },
                  { label: 'LINEユーザー', value: 'l-clutch_line-user' },
                  { label: '非ログインユーザー', value: 'not_logged_in' },
                ].map((role) => (
                  <fieldset className="tw-mb-2 tw-w-56" key={`target-user-${role.value}`}>
                    <CheckboxControl
                      key={role.value}
                      label={role.label}
                      className="!tw-mb-2"
                      checked={attributes.readableRoles.includes(role.value)}
                      onChange={(isChecked) => changeReadableRoles(role.value, isChecked)}
                    />
                    {role.value === 'l-clutch_line-user' && attributes.readableRoles.includes(role.value) && (
                      <div className="tw-pl-2">
                        <SelectControl
                          label="LINE公式アカウントの友だち追加状態"
                          value={attributes.readableLineUser.addedFriend}
                          onChange={onChangeAddedFriend}
                          options={[
                            { label: 'すべて', value: 'all' },
                            { label: '追加済のみ', value: 'added' },
                            { label: '未追加のみ', value: 'not_added' },
                          ]}
                        />
                      </div>
                    )}
                  </fieldset>
                ))}
              </div>
            </div>
          </PanelRow>
        </PanelBody>
      </InspectorControls>
      <BlockFrame title="閲覧制限エリア">
        <InnerBlocks template={[['core/paragraph', {}]]} />
      </BlockFrame>
    </div>
  );
}
