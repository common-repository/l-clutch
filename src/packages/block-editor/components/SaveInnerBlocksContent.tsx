import { FC } from 'react';
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';

export const SaveInnerBlocksContent: FC = () => {
  const blockProps = useBlockProps.save();

  return (
    <div {...blockProps}>
      <InnerBlocks.Content />
    </div>
  );
};
