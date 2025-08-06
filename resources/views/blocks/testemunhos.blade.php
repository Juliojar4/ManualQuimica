@if(!empty($testimonials))
<section class="testemunhos-block py-16 px-6 bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="container mx-auto max-w-6xl">
        
        {{-- Cabeçalho da seção --}}
        <div class="text-center !mb-16" data-aos="fade-up">
            <div class="flex items-center justify-center flex-col md:flex-row mb-4">
                <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center mr-4 mb-5">
                    <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    O que nossos alunos dizem
                </h2>
            </div>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Descubra como o Manual de Química tem transformado o aprendizado de nossos estudantes
            </p>
        </div>

        {{-- Slider de Testemunhos --}}
        <div class="splide testimonials-slider" data-aos="fade-up" data-aos-delay="200">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($testimonials as $testimonial)
                    <li class="splide__slide">
                        <div class="testimonial-card bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300 mx-4 h-full">
                            {{-- Ícone de estrela no canto superior esquerdo --}}
                            <div class="flex items-start justify-between mb-6">
                                <div class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </div>
                                
                                {{-- Avaliação em estrelas --}}
                                <div class="flex items-center ml-4">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                            
                            {{-- Conteúdo do testemunho --}}
                            <div class="mb-8">
                                <p class="text-gray-700 text-lg leading-relaxed italic">
                                    "{!! $testimonial['content'] !!}"
                                </p>
                            </div>
                            
                            {{-- Autor --}}
                            <div class="flex items-center mt-auto">
                                {{-- Círculo com iniciais --}}
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4 flex-shrink-0 shadow-md">
                                    {{ $testimonial['authorInitials'] }}
                                </div>
                                
                                {{-- Nome e sobrenome --}}
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-lg !mb-0">
                                        {{ $testimonial['authorName'] }} {{ $testimonial['authorSurname'] }}
                                    </h4>
                                    <p class="text-gray-500 text-sm !mb-0">
                                        Estudante de Química
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            
            {{-- Navegação do slider --}}
            <div class="splide__arrows hidden md:block">
                <button class="splide__arrow splide__arrow--prev bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="splide__arrow splide__arrow--next bg-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        {{-- Indicadores do slider --}}
        <div class="splide__pagination mt-8 flex justify-center space-x-2"></div>
    </div>
</section>

{{-- Script do Splide --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Splide !== 'undefined') {
        const testimonialsSlider = new Splide('.testimonials-slider', {
            type: 'loop',
            perPage: 3,
            perMove: 1,
            gap: '2rem',
            autoplay: true,
            interval: 3500,
            pauseOnHover: false,
            pagination: false,
            arrows: false,
            breakpoints: {
                1024: {
                    perPage: 2,
                    gap: '1.5rem',
                },
                768: {
                    perPage: 1,
                    gap: '1rem',
                    arrows: false,
                }
            }
        });
        
        testimonialsSlider.mount();
    }
});
</script>
@endif