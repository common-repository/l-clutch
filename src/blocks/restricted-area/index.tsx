import { registerBlockType } from '@wordpress/blocks';
import { Icon, lockOutline as lockOutlineIcon } from '@wordpress/icons';
import { SaveInnerBlocksContent } from '@l-clutch/core/block-editor';

import './tailwind.css';
import './style.scss';

import edit from './edit';
import metadata from './block.json';

registerBlockType(metadata.name, {
  icon: <Icon icon={lockOutlineIcon} className="l-clutch-block-icon" />,
  edit,
  save: SaveInnerBlocksContent,
});
