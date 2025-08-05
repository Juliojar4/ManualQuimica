import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, Button } from '@wordpress/components';

registerBlockType('doctailwind/grid-information', {
    attributes: {
        cards: {
            type: 'array',
            default: [
                {
                    title: 'Card 1',
                    subtitle: 'Subtitle for card 1',
                    imageId: 0,
                    imageUrl: '',
                    imageAlt: ''
                },
                {
                    title: 'Card 2',
                    subtitle: 'Subtitle for card 2',
                    imageId: 0,
                    imageUrl: '',
                    imageAlt: ''
                },
                {
                    title: 'Card 3',
                    subtitle: 'Subtitle for card 3',
                    imageId: 0,
                    imageUrl: '',
                    imageAlt: ''
                },
                                {
                    title: 'Card 4',
                    subtitle: 'Subtitle for card 4',
                    imageId: 0,
                    imageUrl: '',
                    imageAlt: ''
                }
            ]
        }
    },
    edit: ({ attributes, setAttributes }) => {
        const { cards } = attributes;
        const blockProps = useBlockProps();
        
        // Debug
        console.log('Cards atuais:', cards);

        const updateCard = (index, field, value) => {
            const updatedCards = [...cards];
            updatedCards[index] = { ...updatedCards[index], [field]: value };
            setAttributes({ cards: updatedCards });
        };

        const onSelectImage = (index, media) => {
            console.log('Selecionando imagem:', { index, media });
            const updatedCards = [...cards];
            updatedCards[index] = { 
                ...updatedCards[index], 
                imageId: media.id,
                imageUrl: media.url,
                imageAlt: media.alt || ''
            };
            console.log('Cards atualizados:', updatedCards);
            setAttributes({ cards: updatedCards });
        };

        const onRemoveImage = (index) => {
            console.log('Removendo imagem do index:', index);
            const updatedCards = [...cards];
            updatedCards[index] = { 
                ...updatedCards[index], 
                imageId: 0,
                imageUrl: '',
                imageAlt: ''
            };
            console.log('Cards após remoção:', updatedCards);
            setAttributes({ cards: updatedCards });
        };

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Grid Information Settings" initialOpen={true}>
                        <p>Configure each card using the controls below or directly in the editor.</p>
                        
                        {cards.map((card, index) => (
                            <PanelBody key={index} title={`Card ${index + 1}`} initialOpen={false}>
                                <MediaUploadCheck>
                                    <MediaUpload
                                        onSelect={(media) => onSelectImage(index, media)}
                                        allowedTypes={['image']}
                                        value={card.imageId}
                                        render={({ open }) => (
                                            <div style={{ marginBottom: '15px' }}>
                                                {card.imageUrl ? (
                                                    <div>
                                                        <img src={card.imageUrl} alt={card.imageAlt} style={{ maxWidth: '100%', height: '100px', objectFit: 'cover', borderRadius: '4px' }} />
                                                        <div style={{ marginTop: '10px' }}>
                                                            <Button onClick={open} variant="secondary">
                                                                Replace Image
                                                            </Button>
                                                            <Button onClick={() => onRemoveImage(index)} variant="link" isDestructive>
                                                                Remove
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
                        ))}
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps} className="grid-information-block-editor p-6 border-2 border-dashed border-gray-300 rounded bg-gray-50">
                    <h3 className="text-sm font-semibold text-gray-500 mb-4 uppercase tracking-wide">Grid Information Block</h3>
                    
                    <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {cards.map((card, index) => (
                            <div key={index} className="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                                {/* Image Section */}
                                <div className="h-48 bg-gray-100 flex items-center justify-center">
                                    {card.imageUrl ? (
                                        <img 
                                            src={card.imageUrl} 
                                            alt={card.imageAlt} 
                                            className="w-full h-full object-cover"
                                        />
                                    ) : (
                                        <div className="text-center text-gray-500">
                                            <div className="text-4xl mb-2">🖼️</div>
                                            <p className="text-sm">Click sidebar to add image</p>
                                        </div>
                                    )}
                                </div>
                                
                                {/* Content Section */}
                                <div className="p-4">
                                    <RichText
                                        tagName="h4"
                                        value={card.title}
                                        onChange={(value) => updateCard(index, 'title', value)}
                                        placeholder="Enter card title..."
                                        className="text-lg font-semibold text-gray-900 mb-2"
                                    />
                                    
                                    <RichText
                                        tagName="p"
                                        value={card.subtitle}
                                        onChange={(value) => updateCard(index, 'subtitle', value)}
                                        placeholder="Enter card subtitle..."
                                        className="text-sm text-gray-600"
                                    />
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </>
        );
    },
    
    save: () => null // Server-side rendering
});