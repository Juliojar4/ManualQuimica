import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, Button } from '@wordpress/components';

registerBlockType('doctailwind/custom-tabs', {
    edit: ({ attributes, setAttributes }) => {
        // Usar os atributos definidos no block.json
        const accordionItems = attributes.accordionItems || [];
        const blockProps = useBlockProps();
        
        const updateItem = (index, field, value) => {
            const updatedItems = [...accordionItems];
            updatedItems[index] = { ...updatedItems[index], [field]: value };
            
            setAttributes({ accordionItems: updatedItems });
        };

        // Função alternativa para abrir media library sem usar MediaUpload
        const openMediaLibrary = (index) => {
            // Usar o frame nativo do WordPress
            const frame = wp.media({
                title: 'Selecionar Imagem',
                button: {
                    text: 'Usar esta imagem'
                },
                multiple: false,
                library: {
                    type: 'image'
                }
            });

            frame.on('select', function() {
                const attachment = frame.state().get('selection').first().toJSON();
                
                const updatedItems = [...accordionItems];
                updatedItems[index] = {
                    ...updatedItems[index],
                    imageId: attachment.id || 0,
                    imageUrl: attachment.url || '',
                    imageAlt: attachment.alt || attachment.caption || ''
                };
                
                setAttributes({ accordionItems: updatedItems });
            });

            frame.open();
        };

        const onRemoveImage = (index) => {
            const updatedItems = [...accordionItems];
            updatedItems[index] = {
                ...updatedItems[index],
                imageId: 0,
                imageUrl: '',
                imageAlt: ''
            };
            
            setAttributes({ accordionItems: updatedItems });
        };
        
        return (
            <>
                <InspectorControls>
                    {accordionItems.map((item, index) => (
                        <PanelBody key={index} title={`Item ${index + 1} do Acordeão`} initialOpen={index === 0}>
                            <h4 style={{ marginBottom: '10px', fontWeight: 'bold' }}>Imagem do Item {index + 1}</h4>
                            <div style={{ textAlign: 'center' }}>
                                {item.imageUrl ? (
                                    <div>
                                        <img 
                                            src={item.imageUrl} 
                                            alt={item.imageAlt || 'Imagem selecionada'} 
                                            style={{ 
                                                maxWidth: '100%', 
                                                height: '100px', 
                                                objectFit: 'cover', 
                                                borderRadius: '4px',
                                                marginBottom: '10px'
                                            }} 
                                        />
                                        <div>
                                            <Button 
                                                onClick={() => openMediaLibrary(index)} 
                                                variant="secondary"
                                                style={{ marginRight: '5px' }}
                                            >
                                                Trocar
                                            </Button>
                                            <Button 
                                                onClick={() => onRemoveImage(index)} 
                                                variant="link" 
                                                isDestructive
                                            >
                                                Remover
                                            </Button>
                                        </div>
                                    </div>
                                ) : (
                                    <Button 
                                        onClick={() => openMediaLibrary(index)} 
                                        variant="primary"
                                        style={{ width: '100%' }}
                                    >
                                        📷 Selecionar Imagem
                                    </Button>
                                )}
                            </div>
                        </PanelBody>
                    ))}
                </InspectorControls>

                <div {...blockProps} className="custom-tabs-block-editor border-2 border-dashed border-gray-300 rounded overflow-hidden">
                    <div className="bg-gradient-to-r from-teal-50 to-cyan-50 p-4">
                        <h3 className="text-sm font-semibold text-gray-700 mb-4 uppercase tracking-wide">Acordeão com Imagens Preview</h3>
                        
                        <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            {/* Área do Acordeão */}
                            <div className="space-y-3">
                                <h4 className="text-xs text-gray-500 uppercase tracking-wide">Acordeão (Esquerda)</h4>
                                {accordionItems.map((item, index) => (
                                    <div key={index} className="border border-gray-200 rounded bg-white">
                                        <div className="p-3 bg-gray-50 border-b">
                                            <RichText
                                                tagName="h5"
                                                value={item.title}
                                                onChange={(value) => updateItem(index, 'title', value)}
                                                placeholder={`Título do item ${index + 1}...`}
                                                className="text-sm font-semibold text-gray-700"
                                            />
                                        </div>
                                        <div className="p-3">
                                            <RichText
                                                tagName="p"
                                                value={item.content}
                                                onChange={(value) => updateItem(index, 'content', value)}
                                                placeholder={`Conteúdo do item ${index + 1}...`}
                                                className="text-xs text-gray-600"
                                            />
                                        </div>
                                    </div>
                                ))}
                            </div>
                            
                            {/* Área da Imagem */}
                            <div className="space-y-3">
                                <h4 className="text-xs text-gray-500 uppercase tracking-wide">Imagem Dinâmica (Direita)</h4>
                                <div className="h-48 bg-gray-100 rounded border-2 border-dashed border-gray-300 flex items-center justify-center">
                                    {accordionItems.some(item => item.imageUrl) ? (
                                        <div className="text-center">
                                            <div className="text-2xl mb-2">🖼️</div>
                                            <p className="text-xs text-gray-500">Imagens configuradas!</p>
                                            <p className="text-xs text-gray-400">Use a barra lateral para gerenciar</p>
                                        </div>
                                    ) : (
                                        <div className="text-center">
                                            <div className="text-2xl mb-2">📷</div>
                                            <p className="text-xs text-gray-500">Configure imagens na barra lateral</p>
                                            <p className="text-xs text-gray-400">Uma para cada item do acordeão</p>
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