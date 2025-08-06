import { registerBlockType } from '@wordpress/blocks';
import { 
    useBlockProps, 
    RichText, 
    InspectorControls,
    MediaUpload,
    MediaUploadCheck 
} from '@wordpress/block-editor';
import { 
    PanelBody, 
    Button, 
    TextControl,
    RangeControl 
} from '@wordpress/components';
import { __ } from '@wordpress/i18n';

registerBlockType('doctailwind/testemunhos', {
    edit: ({ attributes, setAttributes }) => {
        const { testimonials = [] } = attributes;
        const blockProps = useBlockProps();
        
        const addTestimonial = () => {
            const newTestimonials = [
                ...testimonials,
                {
                    id: Date.now(),
                    content: '',
                    authorName: '',
                    authorSurname: '',
                    authorInitials: '',
                    rating: 5
                }
            ];
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
        
        return (
            <>
                <InspectorControls>
                    <PanelBody title={__('Configurações dos Testemunhos', 'doctailwind')}>
                        <Button 
                            isPrimary 
                            onClick={addTestimonial}
                            className="mb-4"
                        >
                            {__('Adicionar Testemunho', 'doctailwind')}
                        </Button>
                    </PanelBody>
                </InspectorControls>
                
                <div {...blockProps} className="testemunhos-block-editor p-6 bg-gray-50 rounded-lg border border-gray-200">
                    <div className="flex items-center mb-6">
                        <div className="w-8 h-8 bg-yellow-400 rounded flex items-center justify-center mr-3">
                            <svg className="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <h3 className="text-xl font-bold text-gray-800">Bloco de Testemunhos</h3>
                    </div>
                    
                    {testimonials.length === 0 ? (
                        <div className="text-center py-8 bg-white rounded-lg border-2 border-dashed border-gray-300">
                            <div className="w-16 h-16 mx-auto mb-4 bg-yellow-100 rounded-full flex items-center justify-center">
                                <svg className="w-8 h-8 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            </div>
                            <p className="text-gray-500 mb-4">Nenhum testemunho adicionado</p>
                            <Button isPrimary onClick={addTestimonial}>
                                Adicionar Primeiro Testemunho
                            </Button>
                        </div>
                    ) : (
                        <div className="space-y-4">
                            {testimonials.map((testimonial, index) => (
                                <div key={testimonial.id} className="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
                                    <div className="flex items-start justify-between mb-4">
                                        <div className="flex items-center">
                                            <span className="text-sm font-medium text-gray-500 mr-2">
                                                Testemunho #{index + 1}
                                            </span>
                                            <div className="flex items-center">
                                                {[...Array(5)].map((_, i) => (
                                                    <svg 
                                                        key={i}
                                                        className={`w-4 h-4 ${i < (testimonial.rating || 5) ? 'text-yellow-400' : 'text-gray-300'}`}
                                                        fill="currentColor" 
                                                        viewBox="0 0 20 20"
                                                    >
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                ))}
                                            </div>
                                        </div>
                                        <Button 
                                            isDestructive 
                                            onClick={() => removeTestimonial(index)}
                                            className="text-sm"
                                        >
                                            Remover
                                        </Button>
                                    </div>
                                    
                                    <div className="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                        <TextControl
                                            label="Nome"
                                            value={testimonial.authorName || ''}
                                            onChange={(value) => updateTestimonial(index, 'authorName', value)}
                                            placeholder="Ex: Maria"
                                        />
                                        <TextControl
                                            label="Sobrenome"
                                            value={testimonial.authorSurname || ''}
                                            onChange={(value) => updateTestimonial(index, 'authorSurname', value)}
                                            placeholder="Ex: Silva"
                                        />
                                    </div>
                                    
                                    <TextControl
                                        label="Iniciais (2 letras)"
                                        value={testimonial.authorInitials || ''}
                                        onChange={(value) => updateTestimonial(index, 'authorInitials', value.slice(0, 2).toUpperCase())}
                                        placeholder="Ex: MS"
                                        maxLength={2}
                                        className="mb-4"
                                    />
                                    
                                    <RangeControl
                                        label="Avaliação (estrelas)"
                                        value={testimonial.rating || 5}
                                        onChange={(value) => updateTestimonial(index, 'rating', value)}
                                        min={1}
                                        max={5}
                                        className="mb-4"
                                    />
                                    
                                    <RichText
                                        tagName="div"
                                        value={testimonial.content || ''}
                                        onChange={(value) => updateTestimonial(index, 'content', value)}
                                        placeholder="Digite o testemunho aqui..."
                                        className="border border-gray-300 rounded p-3 min-h-[100px]"
                                    />
                                    
                                    {/* Preview do card */}
                                    <div className="mt-4 p-4 bg-gray-50 rounded border">
                                        <p className="text-sm font-medium text-gray-600 mb-2">Preview:</p>
                                        <div className="bg-white p-4 rounded-lg shadow-sm border border-gray-200 max-w-md">
                                            <div className="flex items-start mb-3">
                                                <div className="w-6 h-6 bg-yellow-400 rounded flex items-center justify-center mr-3 flex-shrink-0">
                                                    <svg className="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                    </svg>
                                                </div>
                                                <div className="flex-1">
                                                    <div className="flex items-center mb-1">
                                                        {[...Array(5)].map((_, i) => (
                                                            <svg 
                                                                key={i}
                                                                className={`w-3 h-3 ${i < (testimonial.rating || 5) ? 'text-yellow-400' : 'text-gray-300'}`}
                                                                fill="currentColor" 
                                                                viewBox="0 0 20 20"
                                                            >
                                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                            </svg>
                                                        ))}
                                                    </div>
                                                </div>
                                            </div>
                                            <p className="text-gray-700 text-sm mb-3 leading-relaxed">
                                                {testimonial.content ? testimonial.content.replace(/<[^>]*>/g, '') : 'Conteúdo do testemunho...'}
                                            </p>
                                            <div className="flex items-center">
                                                <div className="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs font-bold mr-3">
                                                    {testimonial.authorInitials || 'AB'}
                                                </div>
                                                <span className="text-sm font-medium text-gray-800">
                                                    {testimonial.authorName || 'Nome'} {testimonial.authorSurname || 'Sobrenome'}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ))}
                            
                            <Button 
                                isSecondary 
                                onClick={addTestimonial}
                                className="w-full"
                            >
                                + Adicionar Outro Testemunho
                            </Button>
                        </div>
                    )}
                </div>
            </>
        );
    },
    
    save: () => null // Server-side rendering
});