import { registerBlockType } from '@wordpress/blocks';

import './style.scss';
import metadata from './block.json';
import edit from './edit';
import save from './save';

registerBlockType(metadata, {
  icon: <span className="dashicon dashicons dashicons-exit l-clutch-block-icon"></span>,
  edit,
  save,
});
