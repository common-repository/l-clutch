import {
  RichText,
  __experimentalGetBorderClassesAndStyles as getBorderClassesAndStyles,
} from '@wordpress/block-editor';

import { useCoreButtonProps } from '@l-clutch/core/block-editor';
import classnames from 'classnames';

export default function save({ attributes }) {
  const { blockProps, wrapperProps, buttonProps } = useCoreButtonProps.save({ attributes });
  const borderProps = getBorderClassesAndStyles(attributes);

  const a = (
    <div {...blockProps} style={{ display: 'none' }}>
      <div {...wrapperProps}>
        <RichText.Content
          tagName="a"
          value={attributes.text}
          {...buttonProps}
          className={classnames(buttonProps.className, borderProps.className)}
          href="#logout"
        />
      </div>
    </div>
  );

  console.log(a);

  return a;
}
