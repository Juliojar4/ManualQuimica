import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, Button } from '@wordpress/components';

registerBlockType('doctailwind/hero', {
    attributes: {
        title: {
            type: 'string',
            default: 'Hero Title'
        },
        description: {
            type: 'string',
            default: 'Your hero description goes here...'
        },
        imageId: {
            type: 'number',
            default: 0
        },
        imageUrl: {
            type: 'string',
            default: ''
        },
        imageAlt: {
            type: 'string',
            default: ''
        }
    },
    
    edit: ({ attributes, setAttributes }) => {
        const { title, description, imageId, imageUrl, imageAlt } = attributes;
        const blockProps = useBlockProps();
        
        const onSelectImage = (media) => {
            setAttributes({
                imageId: media.id,
                imageUrl: media.url,
                imageAlt: media.alt
            });
        };
        
        const onRemoveImage = () => {
            setAttributes({
                imageId: 0,
                imageUrl: '',
                imageAlt: ''
            });
        };
        
        return (
            <>
                <InspectorControls>
                    <PanelBody title="Hero Settings" initialOpen={true}>
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={onSelectImage}
                                allowedTypes={['image']}
                                value={imageId}
                                render={({ open }) => (
                                    <div>
                                        {imageUrl ? (
                                            <div>
                                                <img src={imageUrl} alt={imageAlt} style={{ maxWidth: '100%', height: 'auto' }} />
                                                <div style={{ marginTop: '10px' }}>
                                                    <Button onClick={open} variant="secondary">
                                                        Replace Image
                                                    </Button>
                                                    <Button onClick={onRemoveImage} variant="link" isDestructive>
                                                        Remove Image
                                                    </Button>
                                                </div>
                                            </div>
                                        ) : (
                                            <Button onClick={open} variant="primary">
                                                Select Image
                                            </Button>
                                        )}
                                    </div>
                                )}
                            />
                        </MediaUploadCheck>
                    </PanelBody>
                </InspectorControls>
                
                <div {...blockProps} className="hero-block-editor p-6 border-2 border-dashed border-gray-300 rounded bg-gray-50">
                    <h3 className="text-sm font-semibold text-gray-500 mb-4 uppercase tracking-wide">Hero Block</h3>
                    
                    <div className="space-y-4">
                        <div>
                            <label className="block text-sm font-medium text-gray-700 mb-2">Title</label>
                            <RichText
                                tagName="h1"
                                value={title}
                                onChange={(value) => setAttributes({ title: value })}
                                placeholder="Enter hero title..."
                                className="text-3xl font-bold text-gray-900 border border-gray-200 rounded p-3"
                            />
                        </div>
                        
                        <div>
                            <label className="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <RichText
                                tagName="p"
                                value={description}
                                onChange={(value) => setAttributes({ description: value })}
                                placeholder="Enter hero description..."
                                className="text-lg text-gray-600 border border-gray-200 rounded p-3"
                            />
                        </div>
                        
                        <div>
                            <label className="block text-sm font-medium text-gray-700 mb-2">Hero Image</label>
                            {imageUrl ? (
                                <div className="border border-gray-200 rounded p-3">
                                    <img src={imageUrl} alt={imageAlt} className="max-w-full h-32 object-cover rounded" />
                                    <p className="text-sm text-gray-500 mt-2">Image selected - configure in sidebar</p>
                                </div>
                            ) : (
                                <div className="border border-gray-200 rounded p-3 text-center text-gray-500">
                                    <div className="text-4xl mb-2">🖼️</div>
                                    <p>No image selected - use sidebar to add image</p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </>
        );
    },
    
    save: () => null // Server-side rendering
});