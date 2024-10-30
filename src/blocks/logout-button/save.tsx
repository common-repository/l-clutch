import { RichText } from '@wordpress/block-editor';

import { useCoreButtonProps } from '@l-clutch/core/block-editor';

export default function save({ attributes }) {
  const { blockProps, wrapperProps, buttonProps } = useCoreButtonProps.save({ attributes });

  return (
    <div {...blockProps} style={{ display: 'none' }}>
      <div {...wrapperProps}>
        <RichText.Content tagName="a" value={attributes.text} href="#logout" />
      </div>
    </div>
  );
}
