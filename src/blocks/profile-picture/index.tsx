import { registerBlockType } from '@wordpress/blocks';
import { Icon } from '@wordpress/components';
import { commentAuthorAvatar } from '@wordpress/icons';

import './style.scss';
import metadata from './block.json';
import edit from './edit';
import save from './save';
import deprecated from './deprecated';

registerBlockType(metadata, {
  icon: <Icon icon={commentAuthorAvatar} className="l-clutch-block-icon" />,
  edit,
  save,
  deprecated,
});
