/**
 * WordPress Dependencies
 */
import {
    InspectorControls,
    MediaUpload,
    MediaUploadCheck,
} from '@wordpress/block-editor';
import {
    Button,
    Panel,
    PanelBody,
    __experimentalVStack as VStack,
} from '@wordpress/components';
import { Fragment } from '@wordpress/element';
import { __ } from '@wordpress/i18n';

export default function Controls({ attributes, setAttributes }) {
    const { imageId, imageUrl } = attributes;

    const onChangeMediaUpload = (image) => {
        setAttributes({
            imageId: image.id,
            imageUrl: image.url,
        });
    };

    return (
        <Fragment>
            <InspectorControls>
                <Panel>
                    <PanelBody title="Hero Settings" initialOpen={true}>
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={onChangeMediaUpload}
                                value={imageId}
                                render={({ open }) => (
                                    <VStack>
                                        {imageUrl && <img src={imageUrl} />}
                                        <Button
                                            variant="primary"
                                            onClick={open}
                                        >
                                            {!imageUrl
                                                ? __('Add Image')
                                                : __('Replace Image')}
                                        </Button>
                                    </VStack>
                                )}
                            />
                        </MediaUploadCheck>
                    </PanelBody>
                </Panel>
            </InspectorControls>
        </Fragment>
    );
}
