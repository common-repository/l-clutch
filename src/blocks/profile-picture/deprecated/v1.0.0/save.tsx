import {
  useBlockProps,
  __experimentalGetBorderClassesAndStyles as getBorderClassesAndStyles,
} from '@wordpress/block-editor';

import { divideProperties } from '@l-clutch/core';

export default function save({ attributes }) {
  const { width } = attributes;

  const blockProps = useBlockProps.save();
  const { filtered: marginStyle } = divideProperties(blockProps.style ?? {}, (key) => key.startsWith('margin'));
  const borderProps = getBorderClassesAndStyles(attributes);

  return (
    <div {...blockProps} style={marginStyle}>
      <img
        src="%s"
        alt="プロフィール画像"
        className={borderProps.className}
        style={{
          width: width,
          height: width,
          objectFit: 'cover',
          ...borderProps.style,
        }}
      />
    </div>
  );
}
