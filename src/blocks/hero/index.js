/**
 * WordPress Dependencies
 */
import { registerBlockType } from '@wordpress/blocks';

/**
 * Internal dependencies
 */
import metadata from './block.json';
import { boilerpress } from '../components/icons';
import Edit from './edit';
import save from './save';
import './style.scss';

registerBlockType(metadata.name, {
    icon: boilerpress,
    edit: Edit,
    save,
});
