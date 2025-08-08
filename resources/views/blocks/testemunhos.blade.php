@if (!empty($testimonials))
    <section class="testemunhos-block py-10 lg:py-20 px-6 bg-gradient-to-br from-gray-50 to-gray-100"
        style="background-color: {{ $backgroundColor }}; color: {{ $textColor }};" id="{{ $blockId }}">
        <div class="container mx-auto max-w-6xl">

            {{-- Cabeçalho da seção --}}
            <div class="section-header !mb-0 lg:mb-16" data-aos="fade-up">
                <div class="flex items-center justify-center flex-col mb-4">
                    <div class="icon-wrapper">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-blue-600 md:ml-4"
                        style="color: {{ $textColor }};">
                        O que nossos clientes dizem
                    </h2>
                </div>
                <p class="text-lg text-blue-600 max-w-2xl mx-auto" style="color: {{ $textColor }};">
                    Descubra como nossos serviços têm transformado a experiência de nossos clientes
                </p>
            </div>

            {{-- Slider de Testemunhos --}}
            <div class="splide testimonials-slider" data-aos="fade-up" data-aos-delay="200"
                data-splide='{
                    "type":"loop",
                    "autoplay": {{ $autoplay ? 'true' : 'false' }},
                    "interval": {{ $autoplaySpeed }},
                    "perPage": 3,
                    "perMove": 1,
                    "gap": "2rem",
                    "pagination": false,
                    "arrows": true,
                    "pauseOnHover": false,
                    "width": "100%",
                    "fixedWidth": false,
                    "autoWidth": false,
                    "trimSpace": false,
                    "breakpoints": {
                        "1024": { "perPage": 2, "gap": "1.5rem" },
                        "768": { "perPage": 1, "gap": "1rem", "arrows": false }
                    }
                }'>
                <div class="splide__track flex items-center !h-[400px]">
                    <ul class="splide__list">
                        @foreach ($testimonials as $testimonial)
                            <li class="splide__slide">
                                <div class="testimonial-card mx-3 lg:mx-0">
                                    {{-- Ícone de estrela no canto superior esquerdo --}}
                                    <div class="flex items-start justify-between mb-6">
                                        <div
                                            class="w-10 h-10 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        </div>

                                        {{-- Avaliação em estrelas --}}
                                        @if ($showRating && isset($testimonial['rating']))
                                            <div class="flex items-center ml-4">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-5 h-5 {{ $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300' }}"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @endfor
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Conteúdo do testemunho --}}
                                    <div class="testimonial-content">
                                        <p class="testimonial-text !text-base" style="color: {{ $textColor }};">
                                            "{{ $testimonial['testimonial'] }}"
                                        </p>

                                        {{-- Autor --}}
                                        <div class="testimonial-author">
                                            {{-- Avatar ou Iniciais --}}
                                            @if (!empty($testimonial['image']))
                                                <img src="{{ $testimonial['image'] }}"
                                                    alt="{{ $testimonial['name'] }}"
                                                    class="author-initials object-cover">
                                            @else
                                                <div class="author-initials"
                                                    style="background: linear-gradient(135deg, {{ $accentColor }}, {{ $accentColor }}CC);">
                                                    {{ $testimonial['initials'] ?: substr($testimonial['name'], 0, 1) }}
                                                </div>
                                            @endif

                                            {{-- Nome e informações --}}
                                            <div class="author-info">
                                                <h4 class="author-name" style="color: {{ $textColor }};">
                                                    {{ $testimonial['name'] }}
                                                </h4>
                                                <p class="author-role">
                                                    Cliente
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Navegação do slider --}}
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev ">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button class="splide__arrow splide__arrow--next ">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Indicadores do slider --}}
            <div class="splide__pagination"></div>
        </div>
    </section>

    <style>
        /* Estilos específicos para este bloco */
        #{{ $blockId }} .splide__pagination__page.is-active {
            background: {{ $accentColor }} !important;
        }

        #{{ $blockId }} .testimonial-card:hover {
            transform: translateY(-5px) !important;
            border-color: {{ $accentColor }} !important;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.15) !important;
        }

        #{{ $blockId }} .splide__track {
            overflow: hidden !important;
        }

        #{{ $blockId }} .splide__list {
            width: 100% !important;
        }

        #{{ $blockId }} .splide__slide {
            width: calc(33.333% - 1.333rem) !important;
            max-width: none !important;
            flex-shrink: 0 !important;
        }

        /* Responsividade específica do bloco */
        @media (max-width: 1024px) {
            #{{ $blockId }} .splide__slide {
                width: calc(50% - 0.75rem) !important;
            }
        }

        @media (max-width: 768px) {
            #{{ $blockId }} .splide__slide {
                width: 100% !important;
                margin-right: 0 !important;
            }
        }
    </style>

    {{-- Script do Splide --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('#{{ $blockId }} .testimonials-slider');
            if (slider && typeof Splide !== 'undefined') {
                try {
                    const options = {
                        type: 'loop',
                        perPage: 3,
                        perMove: 1,
                        gap: '2rem',
                        autoplay: {{ $autoplay ? 'true' : 'false' }},
                        interval: {{ $autoplaySpeed }},
                        pauseOnHover: false,
                        pagination: true,
                        arrows: true,
                        width: '100%',
                        fixedWidth: false,
                        autoWidth: false,
                        trimSpace: false,
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
                    };

                    const testimonialsSlider = new Splide(slider, options);
                    testimonialsSlider.mount();

                    console.log('Testemunhos slider mounted successfully');
                } catch (error) {
                    console.error('Error initializing testemunhos slider:', error);
                }
            }
        });
    </script>
@endif
