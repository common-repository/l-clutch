import { RichText } from '@wordpress/block-editor';

import { useCoreButtonProps } from '@l-clutch/core/block-editor';

export default function edit({ attributes, setAttributes }) {
  const onChangeText = (newText) => {
    newText = newText.replace(/(\r?\n)|(<br\/?>)/g, ' ');
    setAttributes({ ...attributes, text: newText });
  };

  const { blockProps, wrapperProps, buttonProps } = useCoreButtonProps({ attributes });

  return (
    <div {...blockProps}>
      <div {...wrapperProps}>
        <RichText
          onChange={onChangeText}
          value={attributes.text}
          withoutInteractiveFormatting
          identifier="text"
          tagName="a"
          {...buttonProps}
        />
      </div>
    </div>
  );
}
