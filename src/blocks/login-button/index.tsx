import { registerBlockType } from '@wordpress/blocks';
import { Icon, login as loginIcon } from '@wordpress/icons';

import './style.scss';

import metadata from './block.json';
import edit from './edit';
import save from './save';
import deprecated from './deprecated';

registerBlockType(metadata, {
  icon: <Icon icon={loginIcon} className="l-clutch-block-icon" />,
  edit,
  save,
  deprecated,
});
