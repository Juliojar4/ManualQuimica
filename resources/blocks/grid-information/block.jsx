import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, RichText, InspectorControls, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, Button, Flex, FlexItem } from '@wordpress/components';

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
                }
            ]
        }
    },
    edit: ({ attributes, setAttributes }) => {
        const { cards } = attributes;
        const blockProps = useBlockProps();
        
        // Debug
 
        const updateCard = (index, field, value) => {
            const updatedCards = [...cards];
            updatedCards[index] = { ...updatedCards[index], [field]: value };
            setAttributes({ cards: updatedCards });
        };

        const addCard = () => {
            const newCard = {
                title: `Card ${cards.length + 1}`,
                subtitle: `Subtitle for card ${cards.length + 1}`,
                imageId: 0,
                imageUrl: '',
                imageAlt: ''
            };
            setAttributes({ cards: [...cards, newCard] });
        };

        const removeCard = (index) => {
            if (cards.length > 1) {
                const updatedCards = cards.filter((_, i) => i !== index);
                setAttributes({ cards: updatedCards });
            }
        };

        const moveCard = (index, direction) => {
            const newCards = [...cards];
            const targetIndex = direction === 'up' ? index - 1 : index + 1;
            
            if (targetIndex >= 0 && targetIndex < cards.length) {
                [newCards[index], newCards[targetIndex]] = [newCards[targetIndex], newCards[index]];
                setAttributes({ cards: newCards });
            }
        };

        const onSelectImage = (index, media) => {
             const updatedCards = [...cards];
            updatedCards[index] = { 
                ...updatedCards[index], 
                imageId: media.id,
                imageUrl: media.url,
                imageAlt: media.alt || ''
            };
             setAttributes({ cards: updatedCards });
        };

        const onRemoveImage = (index) => {
             const updatedCards = [...cards];
            updatedCards[index] = { 
                ...updatedCards[index], 
                imageId: 0,
                imageUrl: '',
                imageAlt: ''
            };
             setAttributes({ cards: updatedCards });
        };

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Grid Information Settings" initialOpen={true}>
                        <div style={{ marginBottom: '20px' }}>
                            <Flex justify="space-between" align="center" style={{ marginBottom: '15px' }}>
                                <FlexItem>
                                    <strong>Total Cards: {cards.length}</strong>
                                </FlexItem>
                                <FlexItem>
                                    <Button 
                                        onClick={addCard} 
                                        variant="primary" 
                                        size="small"
                                        icon="plus-alt"
                                    >
                                        Add Card
                                    </Button>
                                </FlexItem>
                            </Flex>
                            <p style={{ color: '#666', fontSize: '13px', margin: 0 }}>
                                Configure each card using the controls below or edit directly in the preview.
                            </p>
                        </div>
                        
                        {cards.map((card, index) => (
                            <PanelBody 
                                key={index} 
                                title={`Card ${index + 1}${card.title ? `: ${card.title}` : ''}`} 
                                initialOpen={false}
                            >
                                {/* Card Controls */}
                                <div style={{ marginBottom: '15px' }}>
                                    <Flex justify="space-between" gap={2}>
                                        <FlexItem>
                                            <Button 
                                                onClick={() => moveCard(index, 'up')}
                                                variant="secondary"
                                                size="small"
                                                disabled={index === 0}
                                                icon="arrow-up-alt2"
                                            >
                                                Move Up
                                            </Button>
                                        </FlexItem>
                                        <FlexItem>
                                            <Button 
                                                onClick={() => moveCard(index, 'down')}
                                                variant="secondary"
                                                size="small"
                                                disabled={index === cards.length - 1}
                                                icon="arrow-down-alt2"
                                            >
                                                Move Down
                                            </Button>
                                        </FlexItem>
                                        <FlexItem>
                                            <Button 
                                                onClick={() => removeCard(index)}
                                                variant="secondary"
                                                size="small"
                                                isDestructive
                                                disabled={cards.length <= 1}
                                                icon="trash"
                                            >
                                                Remove
                                            </Button>
                                        </FlexItem>
                                    </Flex>
                                </div>

                                {/* Image Upload */}
                                <MediaUploadCheck>
                                    <MediaUpload
                                        onSelect={(media) => onSelectImage(index, media)}
                                        allowedTypes={['image']}
                                        value={card.imageId}
                                        render={({ open }) => (
                                            <div style={{ marginBottom: '15px' }}>
                                                <p style={{ fontWeight: '600', marginBottom: '8px' }}>Card Image:</p>
                                                {card.imageUrl ? (
                                                    <div>
                                                        <img 
                                                            src={card.imageUrl} 
                                                            alt={card.imageAlt} 
                                                            style={{ 
                                                                maxWidth: '100%', 
                                                                height: '120px', 
                                                                objectFit: 'cover', 
                                                                borderRadius: '4px',
                                                                border: '1px solid #ddd'
                                                            }} 
                                                        />
                                                        <Flex style={{ marginTop: '10px' }} gap={2}>
                                                            <FlexItem>
                                                                <Button onClick={open} variant="secondary" size="small">
                                                                    Replace Image
                                                                </Button>
                                                            </FlexItem>
                                                            <FlexItem>
                                                                <Button 
                                                                    onClick={() => onRemoveImage(index)} 
                                                                    variant="link" 
                                                                    isDestructive
                                                                    size="small"
                                                                >
                                                                    Remove Image
                                                                </Button>
                                                            </FlexItem>
                                                        </Flex>
                                                    </div>
                                                ) : (
                                                    <Button onClick={open} variant="primary" icon="format-image">
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
                    <div className="flex justify-between items-center mb-4">
                        <h3 className="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                            Grid Information Block ({cards.length} cards)
                        </h3>
                        <Button 
                            onClick={addCard} 
                            variant="primary" 
                            size="small"
                            icon="plus-alt"
                        >
                            Add Card
                        </Button>
                    </div>
                    
                    <div className={`grid gap-6 ${
                        cards.length === 1 ? 'grid-cols-1' :
                        cards.length === 2 ? 'grid-cols-1 md:grid-cols-2' :
                        cards.length === 3 ? 'grid-cols-1 md:grid-cols-3' :
                        cards.length === 4 ? 'grid-cols-1 md:grid-cols-2 lg:grid-cols-4' :
                        'grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4'
                    }`}>
                        {cards.map((card, index) => (
                            <div key={index} className="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 relative group">
                                {/* Card Controls Overlay */}
                                <div className="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded shadow-lg p-1 z-10">
                                    <div className="flex gap-1">
                                        {index > 0 && (
                                            <Button 
                                                onClick={() => moveCard(index, 'up')}
                                                size="small"
                                                icon="arrow-left-alt2"
                                                variant="secondary"
                                                style={{ padding: '4px' }}
                                            />
                                        )}
                                        {index < cards.length - 1 && (
                                            <Button 
                                                onClick={() => moveCard(index, 'down')}
                                                size="small"
                                                icon="arrow-right-alt2"
                                                variant="secondary"
                                                style={{ padding: '4px' }}
                                            />
                                        )}
                                        {cards.length > 1 && (
                                            <Button 
                                                onClick={() => removeCard(index)}
                                                size="small"
                                                icon="trash"
                                                isDestructive
                                                variant="secondary"
                                                style={{ padding: '4px' }}
                                            />
                                        )}
                                    </div>
                                </div>

                                {/* Card Number Badge */}
                                <div className="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded z-10">
                                    {index + 1}
                                </div>
                                
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

                    {/* Help Text */}
                    <div className="mt-4 text-center text-xs text-gray-500">
                        <p>💡 Hover over cards to see move/remove controls, or use the sidebar for more options</p>
                    </div>
                </div>
            </>
        );
    },
    
    save: () => null // Server-side rendering
});