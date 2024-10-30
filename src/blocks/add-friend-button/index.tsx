import { registerBlockType } from '@wordpress/blocks';
import { Icon, people as peopleIcon } from '@wordpress/icons';

import './style.scss';

import edit from './edit';
import save from './save';
import metadata from './block.json';
import deprecated from './deprecated';

registerBlockType(metadata, {
  icon: <Icon icon={peopleIcon} className="l-clutch-block-icon" />,
  edit,
  save,
  deprecated,
});
