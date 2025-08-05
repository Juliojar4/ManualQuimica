import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, Button, TextControl } from '@wordpress/components';

registerBlockType('doctailwind/primary-cta', {
    edit: ({ attributes, setAttributes }) => {
        const { title, subtitle, imageId, imageUrl, imageAlt, productId } = attributes;
        const blockProps = useBlockProps();
        
        const onSelectImage = (media) => {
            setAttributes({
                imageId: media.id,
                imageUrl: media.url,
                imageAlt: media.alt || ''
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
                    <PanelBody title="Configurações do CTA" initialOpen={true}>
                        <TextControl
                            label="ID do Produto WooCommerce"
                            value={productId}
                            onChange={(value) => setAttributes({ productId: parseInt(value) || 61 })}
                            type="number"
                            help="ID do produto para redirecionar ao checkout"
                        />
                        
                        <h4 style={{ marginTop: '20px', marginBottom: '10px', fontWeight: 'bold' }}>Imagem do CTA</h4>
                        <MediaUploadCheck>
                            <MediaUpload
                                onSelect={onSelectImage}
                                allowedTypes={['image']}
                                value={imageId}
                                render={({ open }) => (
                                    <div>
                                        {imageUrl ? (
                                            <div>
                                                <img 
                                                    src={imageUrl} 
                                                    alt={imageAlt} 
                                                    style={{ 
                                                        maxWidth: '100%', 
                                                        height: '120px', 
                                                        objectFit: 'cover', 
                                                        borderRadius: '4px' 
                                                    }} 
                                                />
                                                <div style={{ marginTop: '10px' }}>
                                                    <Button onClick={open} variant="secondary">
                                                        Trocar Imagem
                                                    </Button>
                                                    <Button onClick={onRemoveImage} variant="link" isDestructive>
                                                        Remover
                                                    </Button>
                                                </div>
                                            </div>
                                        ) : (
                                            <Button onClick={open} variant="primary">
                                                Selecionar Imagem
                                            </Button>
                                        )}
                                    </div>
                                )}
                            />
                        </MediaUploadCheck>
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps} className="primary-cta-block-editor border-2 border-dashed border-gray-300 rounded overflow-hidden">
                    <div className="bg-gradient-to-r from-green-50 to-emerald-50 p-6">
                        <h3 className="text-sm font-semibold text-gray-700 mb-4 uppercase tracking-wide">CTA para Checkout Preview</h3>
                        
                        <div className="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">
                            {/* Conteúdo */}
                            <div className="space-y-4">
                                <div>
                                    <label className="block text-xs text-gray-500 uppercase tracking-wide mb-2">Título Principal</label>
                                    <RichText
                                        tagName="h2"
                                        value={title}
                                        onChange={(value) => setAttributes({ title: value })}
                                        placeholder="Digite o título..."
                                        className="text-xl font-bold text-gray-800"
                                    />
                                </div>
                                
                                <div>
                                    <label className="block text-xs text-gray-500 uppercase tracking-wide mb-2">Subtítulo</label>
                                    <RichText
                                        tagName="p"
                                        value={subtitle}
                                        onChange={(value) => setAttributes({ subtitle: value })}
                                        placeholder="Digite o subtítulo..."
                                        className="text-sm text-gray-600"
                                    />
                                </div>
                                
                                <div className="pt-2">
                                    <div className="inline-block bg-green-600 text-white px-4 py-2 rounded-lg font-semibold text-sm">
                                        🛒 Comprar Agora (Produto #{productId})
                                    </div>
                                </div>
                            </div>
                            
                            {/* Imagem */}
                            <div className="space-y-3">
                                <label className="block text-xs text-gray-500 uppercase tracking-wide">Imagem</label>
                                <div className="h-48 bg-gray-100 rounded border-2 border-dashed border-gray-300 flex items-center justify-center">
                                    {imageUrl ? (
                                        <img 
                                            src={imageUrl} 
                                            alt={imageAlt}
                                            className="w-full h-full object-cover rounded"
                                        />
                                    ) : (
                                        <div className="text-center">
                                            <div className="text-2xl mb-2">🖼️</div>
                                            <p className="text-xs text-gray-500">Configure uma imagem</p>
                                            <p className="text-xs text-gray-400">na barra lateral</p>
                                        </div>
                                    )}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    },
    
    save: () => null // Server-side rendering
});