import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl, ToggleControl } from '@wordpress/components';

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
        },
        buttonText: {
            type: 'string',
            default: 'Começar a Aprender'
        },
        buttonUrl: {
            type: 'string',
            default: '#conteudo'
        },
        showButton: {
            type: 'boolean',
            default: true
        }
    },
    
    edit: ({ attributes, setAttributes }) => {
        const { title, description, imageId, imageUrl, imageAlt, buttonText, buttonUrl, showButton } = attributes;
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
                        <h4 style={{ marginBottom: '10px', fontWeight: 'bold' }}>Background Image</h4>
                        <p style={{ marginBottom: '15px', fontSize: '14px', color: '#666' }}>
                            This image will be used as the background for the hero section.
                        </p>
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={onSelectImage}
                                allowedTypes={['image']}
                                value={imageId}
                                render={({ open }) => (
                                    <div>
                                        {imageUrl ? (
                                            <div>
                                                <img src={imageUrl} alt={imageAlt} style={{ maxWidth: '100%', height: '150px', objectFit: 'cover', borderRadius: '4px' }} />
                                                <div style={{ marginTop: '10px' }}>
                                                    <Button onClick={open} variant="secondary">
                                                        Replace Background Image
                                                    </Button>
                                                    <Button onClick={onRemoveImage} variant="link" isDestructive>
                                                        Remove Background
                                                    </Button>
                                                </div>
                                            </div>
                                        ) : (
                                            <Button onClick={open} variant="primary">
                                                Select Background Image
                                            </Button>
                                        )}
                                    </div>
                                )}
                            />
                        </MediaUploadCheck>
                    </PanelBody>
                    
                    <PanelBody title="Button Settings" initialOpen={false}>
                        <ToggleControl
                            label="Show Button"
                            checked={showButton}
                            onChange={(value) => setAttributes({ showButton: value })}
                        />
                        
                        {showButton && (
                            <>
                                <TextControl
                                    label="Button Text"
                                    value={buttonText}
                                    onChange={(value) => setAttributes({ buttonText: value })}
                                    placeholder="Enter button text..."
                                />
                                
                                <TextControl
                                    label="Button URL"
                                    value={buttonUrl}
                                    onChange={(value) => setAttributes({ buttonUrl: value })}
                                    placeholder="Enter URL (e.g., #section, /page, https://...)"
                                />
                            </>
                        )}
                    </PanelBody>
                </InspectorControls>
                
                <div {...blockProps} className="hero-block-editor border-2 border-dashed border-gray-300 rounded overflow-hidden">
                    {/* Simulação do fundo */}
                    <div 
                        className="relative min-h-[400px] bg-cover bg-center flex items-center justify-center"
                        style={{
                            backgroundImage: imageUrl ? `url(${imageUrl})` : 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                            backgroundSize: 'cover',
                            backgroundPosition: 'center'
                        }}
                    >
                        
                        {/* Conteúdo */}
                        <div className="relative z-10 text-center text-white p-6 max-w-4xl">
                            <h3 className="text-xs font-semibold text-white/70 mb-4 uppercase tracking-wide">Hero Block Preview</h3>
                            
                            <div className="space-y-6">
                                <div>
                                    <RichText
                                        tagName="h1"
                                        value={title}
                                        onChange={(value) => setAttributes({ title: value })}
                                        placeholder="Enter hero title..."
                                        className="text-4xl md:text-5xl font-bold text-white drop-shadow-lg"
                                    />
                                </div>
                                
                                <div>
                                    <RichText
                                        tagName="p"
                                        value={description}
                                        onChange={(value) => setAttributes({ description: value })}
                                        placeholder="Enter hero description..."
                                        className="text-xl text-white/90 drop-shadow-md max-w-2xl mx-auto"
                                    />
                                </div>
                                
                                {/* Preview do botão */}
                                {showButton && (
                                    <div className="mt-6">
                                        <div className="relative inline-flex items-center gap-3 bg-gradient-to-r from-teal-500 to-cyan-600 text-gray-800 font-semibold py-4 px-8 rounded-xl shadow-lg cursor-pointer group overflow-hidden">
                                            {/* Simulação das bolhas para preview */}
                                            <div className="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                <div className="absolute w-2 h-2 bg-white/30 rounded-full animate-pulse" style={{left: '15%', bottom: '20%'}}></div>
                                                <div className="absolute w-1.5 h-1.5 bg-white/30 rounded-full animate-pulse" style={{left: '35%', bottom: '30%', animationDelay: '0.3s'}}></div>
                                                <div className="absolute w-2.5 h-2.5 bg-white/30 rounded-full animate-pulse" style={{left: '55%', bottom: '15%', animationDelay: '0.6s'}}></div>
                                            </div>
                                            
                                            <div className="relative z-10 flex items-center gap-3">
                                                <svg className="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                                </svg>
                                                <span>{buttonText}</span>
                                                <div className="w-2 h-2 bg-gray-700/30 rounded-full"></div>
                                            </div>
                                        </div>
                                        <div className="text-white/60 text-xs mt-2">Button Preview - Configure in sidebar</div>
                                    </div>
                                )}
                                
                                {!imageUrl && (
                                    <div className="text-white/70 text-sm mt-4">
                                        ℹ️ Select a background image in the sidebar to see the full effect
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    },
    
    save: () => null // Server-side rendering
});