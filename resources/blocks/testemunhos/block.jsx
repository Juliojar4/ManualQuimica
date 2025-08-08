import { registerBlockType } from '@wordpress/blocks';
import { 
    useBlockProps, 
    InspectorControls,
    MediaUpload,
    MediaUploadCheck 
} from '@wordpress/block-editor';
import { 
    PanelBody, 
    TextControl, 
    TextareaControl, 
    Button, 
    RangeControl,
    ColorPalette,
    ToggleControl
} from '@wordpress/components';

registerBlockType('doctailwind/testemunhos', {
    edit: ({ attributes, setAttributes }) => {
        const { 
            testimonials = [
                {
                    id: 1,
                    name: 'Julio Jara',
                    initials: 'JJ',
                    testimonial: 'Excelente serviço! Recomendo para todos que procuram qualidade e profissionalismo.',
                    rating: 5,
                    image: ''
                }
            ],
            backgroundColor = '#ffffff',
            textColor = '#374151',
            accentColor = '#3b82f6',
            showRating = true,
            autoplay = true,
            autoplaySpeed = 3000
        } = attributes;

        const blockProps = useBlockProps();

        const addTestimonial = () => {
            const newTestimonials = [...testimonials, {
                id: Date.now(),
                name: '',
                initials: '',
                testimonial: '',
                rating: 5,
                image: ''
            }];
            setAttributes({ testimonials: newTestimonials });
        };

        const updateTestimonial = (index, field, value) => {
            const newTestimonials = [...testimonials];
            newTestimonials[index][field] = value;
            setAttributes({ testimonials: newTestimonials });
        };

        const removeTestimonial = (index) => {
            const newTestimonials = testimonials.filter((_, i) => i !== index);
            setAttributes({ testimonials: newTestimonials });
        };

        const StarIcon = () => (
            <svg className="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
        );

        return (
            <>
                <InspectorControls>
                    <PanelBody title="Configurações Gerais" initialOpen={true}>
                        <ToggleControl
                            label="Mostrar Avaliação"
                            checked={showRating}
                            onChange={(value) => setAttributes({ showRating: value })}
                        />
                        <ToggleControl
                            label="Autoplay"
                            checked={autoplay}
                            onChange={(value) => setAttributes({ autoplay: value })}
                        />
                        {autoplay && (
                            <RangeControl
                                label="Velocidade do Autoplay (ms)"
                                value={autoplaySpeed}
                                onChange={(value) => setAttributes({ autoplaySpeed: value })}
                                min={1000}
                                max={10000}
                                step={500}
                            />
                        )}
                    </PanelBody>
                    
                    <PanelBody title="Cores" initialOpen={false}>
                        <div style={{ marginBottom: '20px' }}>
                            <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                                Cor de Fundo
                            </label>
                            <ColorPalette
                                value={backgroundColor}
                                onChange={(value) => setAttributes({ backgroundColor: value || '#ffffff' })}
                            />
                        </div>
                        
                        <div style={{ marginBottom: '20px' }}>
                            <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                                Cor do Texto
                            </label>
                            <ColorPalette
                                value={textColor}
                                onChange={(value) => setAttributes({ textColor: value || '#374151' })}
                            />
                        </div>
                        
                        <div style={{ marginBottom: '20px' }}>
                            <label style={{ display: 'block', marginBottom: '8px', fontWeight: '600' }}>
                                Cor de Destaque
                            </label>
                            <ColorPalette
                                value={accentColor}
                                onChange={(value) => setAttributes({ accentColor: value || '#3b82f6' })}
                            />
                        </div>
                    </PanelBody>
                </InspectorControls>

                <div {...blockProps} className="testemunhos-block-editor p-6 bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg">
                    <div className="flex items-center justify-between mb-6">
                        <h3 className="text-xl font-bold text-gray-800">Testemunhos</h3>
                        <Button 
                            isPrimary 
                            onClick={addTestimonial}
                            className="bg-blue-600 hover:bg-blue-700"
                        >
                            + Adicionar Testemunho
                        </Button>
                    </div>

                    <div className="space-y-4">
                        {testimonials.map((testimonial, index) => (
                            <div key={testimonial.id} className="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                                <div className="flex justify-between items-center mb-3">
                                    <h4 className="font-semibold text-gray-700">Testemunho #{index + 1}</h4>
                                    {testimonials.length > 1 && (
                                        <Button 
                                            isDestructive 
                                            isSmall
                                            onClick={() => removeTestimonial(index)}
                                        >
                                            Remover
                                        </Button>
                                    )}
                                </div>

                                <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <TextControl
                                        label="Nome da Pessoa"
                                        value={testimonial.name}
                                        onChange={(value) => updateTestimonial(index, 'name', value)}
                                        placeholder="Ex: Julio Jara"
                                    />
                                    <TextControl
                                        label="Iniciais"
                                        value={testimonial.initials}
                                        onChange={(value) => updateTestimonial(index, 'initials', value)}
                                        placeholder="Ex: JJ"
                                        maxLength={3}
                                    />
                                </div>

                                <TextareaControl
                                    label="Testemunho"
                                    value={testimonial.testimonial}
                                    onChange={(value) => updateTestimonial(index, 'testimonial', value)}
                                    placeholder="Digite o testemunho aqui..."
                                    rows={3}
                                />

                                {showRating && (
                                    <RangeControl
                                        label="Avaliação (estrelas)"
                                        value={testimonial.rating}
                                        onChange={(value) => updateTestimonial(index, 'rating', value)}
                                        min={1}
                                        max={5}
                                        step={1}
                                    />
                                )}

                                <div className="mt-4">
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Foto da Pessoa (Opcional)
                                    </label>
                                    <MediaUploadCheck
                                        fallback={
                                            <p>Para fazer upload de imagens, você precisa ter permissões de upload.</p>
                                        }
                                    >
                                        <MediaUpload
                                            onSelect={(media) => {
                                                if (media && media.url) {
                                                    updateTestimonial(index, 'image', media.url);
                                                }
                                            }}
                                            allowedTypes={['image']}
                                            value={testimonial.image}
                                            render={({ open }) => (
                                                <div className="flex items-center space-x-3">
                                                    <Button 
                                                        onClick={open} 
                                                        isSecondary
                                                        className="bg-gray-100 hover:bg-gray-200"
                                                    >
                                                        {testimonial.image ? 'Alterar Imagem' : 'Selecionar Imagem'}
                                                    </Button>
                                                    {testimonial.image && (
                                                        <div className="flex items-center space-x-2">
                                                            <img 
                                                                src={testimonial.image} 
                                                                alt="Preview" 
                                                                className="w-10 h-10 rounded-full object-cover border-2 border-gray-200"
                                                                onError={(e) => {
                                                                    e.target.style.display = 'none';
                                                                }}
                                                            />
                                                            <Button 
                                                                isDestructive 
                                                                isSmall
                                                                onClick={() => updateTestimonial(index, 'image', '')}
                                                                className="text-red-600 hover:text-red-800"
                                                            >
                                                                Remover
                                                            </Button>
                                                        </div>
                                                    )}
                                                </div>
                                            )}
                                        />
                                    </MediaUploadCheck>
                                </div>

                                {/* Preview do testemunho */}
                                {testimonial.testimonial && (
                                    <div className="mt-4 p-3 bg-gray-50 rounded border">
                                        <p className="text-sm text-gray-600 mb-2 font-medium">Preview:</p>
                                        <div className="bg-white p-3 rounded shadow-sm border">
                                            {showRating && (
                                                <div className="flex justify-center mb-3">
                                                    {[...Array(5)].map((_, i) => (
                                                        <StarIcon key={i} />
                                                    ))}
                                                </div>
                                            )}
                                            <p className="text-gray-700 italic mb-3 text-center">"{testimonial.testimonial}"</p>
                                            <div className="flex items-center justify-center space-x-3">
                                                <div className="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                                    {testimonial.initials || (testimonial.name ? testimonial.name.charAt(0).toUpperCase() : '?')}
                                                </div>
                                                <span className="font-semibold text-gray-800">{testimonial.name || 'Nome'}</span>
                                            </div>
                                        </div>
                                    </div>
                                )}
                            </div>
                        ))}
                    </div>

                    {testimonials.length === 0 && (
                        <div className="text-center py-8 text-gray-500">
                            <p className="mb-4">Nenhum testemunho adicionado ainda.</p>
                            <Button isPrimary onClick={addTestimonial}>
                                Adicionar Primeiro Testemunho
                            </Button>
                        </div>
                    )}
                </div>
            </>
        );
    },
    
    save: () => null // Server-side rendering
});