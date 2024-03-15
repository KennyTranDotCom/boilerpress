/**
 * WordPress Dependencies
 */
import {
    useBlockProps,
    InnerBlocks,
    MediaPlaceholder,
    MediaUploadCheck,
} from '@wordpress/block-editor';
import { Fragment } from '@wordpress/element';
import { __ } from '@wordpress/i18n';

/**
 * Internal Dependencies
 */
import Controls from './controls';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
    const { imageUrl } = attributes;

    const blockProps = useBlockProps();

    const ALLOWED_BLOCKS = ['core/buttons', 'core/paragraph', 'core/heading'];

    const TEMPLATE = [
        ['core/heading', { placeholder: 'Heading' }],
        ['core/paragraph', { placeholder: 'Add your text here...' }],
        ['core/buttons', {}, [['core/button', { placeholder: 'Button' }]]],
    ];

    return (
        <Fragment>
            <Controls
                {...{
                    attributes,
                    setAttributes,
                }}
            />
            <div {...blockProps}>
                <div className="wp-block-boilerpress-hero__layout">
                    <div className="wp-block-boilerpress-hero__content">
                        <InnerBlocks
                            allowedBlocks={ALLOWED_BLOCKS}
                            template={TEMPLATE}
                        />
                    </div>

                    <div className="wp-block-boilerpress-hero__image">
                        {imageUrl ? (
                            <img src={imageUrl} />
                        ) : (
                            <MediaUploadCheck>
                                <MediaPlaceholder
                                    onSelect={(image) => {
                                        setAttributes({
                                            imageId: image.id,
                                            imageUrl: image.url,
                                        });
                                    }}
                                    allowedTypes={['image']}
                                    labels={{ title: 'Image' }}
                                    multiple={false}
                                />
                            </MediaUploadCheck>
                        )}
                    </div>
                </div>
            </div>
        </Fragment>
    );
}
