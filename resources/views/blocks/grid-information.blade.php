<section class="grid-information-block pt-8 lg:pt-16 pb-10 lg:pb-20 px-6 bg-blue-400">
    <div class="container mx-auto max-w-7xl">
        <h2 class="text-center !mb-10 md:!mb-16 !text-[#0f172b]">O que será abordado</h2>
        
        {{-- Slider de Cards --}}
        <div>
            <div class="splide grid-information-slider" data-aos="fade-up" data-splide='{"type":"loop","autoplay":false,"perPage":4,"perMove":1,"gap":"2rem","pagination":false,"arrows":true,"pauseOnHover":false,"width":"100%","fixedWidth":false,"autoWidth":false,"trimSpace":false,"breakpoints":{"1024":{"perPage":2,"gap":"1.5rem"},"768":{"perPage":1,"gap":"1rem","arrows":false}}}'>
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($cards as $index => $card)
                        <li class="splide__slide">
                            <div class="grid-information-card !w-full bg-white rounded-xl shadow-lg overflow-hidden mx-3 lg:mx-0 transition-all duration-300 group h-full flex flex-col" 
                                 data-aos="fade-up" 
                                 data-aos-delay="{{ $index * 100 }}">
                                
                                {{-- Imagem --}}
                                <div class="h-48 bg-gradient-to-br from-teal-400 to-cyan-600 relative overflow-hidden flex-shrink-0">
                                    @if($card['imageUrl'])
                                        <img 
                                            src="{{ esc_url($card['imageUrl']) }}" 
                                            alt="{{ esc_attr($card['imageAlt']) }}"
                                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                        >
                                    @else
                                        {{-- Placeholder com ícone químico --}}
                                        <div class="w-full h-full flex items-center justify-center">
                                            <div class="text-white/80 text-center">
                                                <div class="text-4xl mb-2">⚗️</div>
                                                <p class="text-sm">Imagem do Card</p>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    {{-- Overlay sutil --}}
                                    <div class="absolute inset-0 bg-black/10 group-hover:bg-black/5 transition-colors duration-300"></div>
                                </div>
                                
                                {{-- Conteúdo --}}
                                <div class="p-6 flex-grow flex flex-col">
                                    <h3 class="!text-[1.35rem] font-bold text-gray-900 mb-3 group-hover:text-white transition-colors duration-300">
                                        {!! wp_kses_post($card['title']) !!}
                                    </h3>
                                    
                                    <p class="text-gray-600 leading-relaxed group-hover:text-white transition-colors duration-300 flex-grow">
                                        {!! wp_kses_post($card['subtitle']) !!}
                                    </p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            
            {{-- Navegação do slider --}}
            <div class="splide__arrows">
                <button class="splide__arrow splide__arrow--prev border">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button class="splide__arrow splide__arrow--next">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>
        </div>
        
        {{-- Indicadores do slider --}}
        <div class="splide__pagination"></div>
    </div>
</section>

<style>
/* Estilos específicos para o slider de grid-information */
.grid-information-slider {
    position: relative;
}

.grid-information-card {
    transition: all 0.3s ease;
}

.grid-information-card:hover {
    background-color: oklch(20.8% .042 265.755) !important;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
}

.grid-information-card:hover h3 {
    color: white !important;
}

.grid-information-card:hover p {
    color: white !important;
}

/* Navegação do slider */
.grid-information-slider .splide__arrow {
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
    background: white;
    border: 1px solid #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    position: static !important;
    transition: all 0.3s ease;
}

.grid-information-slider .splide__arrow:hover {
    background: oklch(20.8% .042 265.755);
    border-color: oklch(20.8% .042 265.755);
}

.grid-information-slider .splide__arrow:hover svg {
    color: white !important;
}

.grid-information-slider .splide__arrows {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    gap: 1rem !important;
    margin-top: 2rem !important;
    position: static !important;
}

.grid-information-slider .splide__arrow--prev,
.grid-information-slider .splide__arrow--next {
    position: static !important;
    left: auto !important;
    right: auto !important;
    top: auto !important;
    transform: none !important;
}

.grid-information-slider .splide__arrow svg {
    width: 1.5rem;
    height: 1.5rem;
    color: #6b7280;
}

/* Paginação do slider */
.grid-information-slider .splide__pagination {
    padding: 0;
    bottom: -3rem;
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 2rem;
}

.grid-information-slider .splide__pagination li {
    margin: 0 0.25rem;
}

.grid-information-slider .splide__pagination__page {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #d1d5db;
    border: none;
    transition: all 0.3s ease;
    cursor: pointer;
}

.grid-information-slider .splide__pagination__page.is-active {
    background: oklch(20.8% .042 265.755);
    transform: scale(1.2);
}

.grid-information-slider .splide__pagination__page:hover {
    background: #6b7280;
}

/* Estilos do slider */
.grid-information-slider .splide__track {
    overflow: hidden !important;
 
}

.grid-information-slider .splide__list {
    display: flex !important;
    align-items: stretch !important;
}

.grid-information-slider .splide__slide {
    display: flex !important;
    align-items: stretch !important;
    margin-right: 2rem !important;
    width: calc(25% - 1.5rem) !important;
    max-width: none !important;
    min-width: 0 !important;
    box-sizing: border-box !important;
    flex-shrink: 0 !important;
    height: auto !important;
}

.grid-information-slider .splide__slide:last-child {
    margin-right: 0;
}

/* Responsividade */
@media (max-width: 1024px) {
    .grid-information-slider .splide__slide {
        width: calc(50% - 0.75rem) !important;
        margin-right: 1.5rem !important;
    }
    
    .grid-information-slider .splide__arrows {
        gap: 0.75rem !important;
    }
}

@media (max-width: 768px) {
   
    .grid-information-slider .splide__slide {
        width: 100% !important;
        margin-right: 0 !important;
        margin-left: 0 !important;
    }
    
    .grid-information-slider .splide__slide:last-child {
        margin-right: 0 !important;
    }
    
    .grid-information-slider .splide__track {
        padding-left: 0 !important;
    }
    
    .grid-information-slider .splide__arrows {
        display: none !important;
    }
}
</style>

{{-- Script do Splide para Grid Information --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.grid-information-slider');
    if (slider && typeof Splide !== 'undefined') {
        try {
            const options = {
                type: 'loop',
                perPage: 4,
                perMove: 1,
                gap: '2rem',
                autoplay: false,
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
            
            const gridInformationSlider = new Splide(slider, options);
            gridInformationSlider.mount();
            
            console.log('Grid Information slider mounted successfully');
        } catch (error) {
            console.error('Error initializing grid information slider:', error);
        }
    }
});
</script>