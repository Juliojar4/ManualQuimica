<section class="accordion-with-images-block my-10 lg:my-20 px-6 bg-white">
    <div class="container mx-auto max-w-7xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            
            {{-- Acordeão (Esquerda) --}}
            <div class="accordion-container">
                <div class="space-y-4" data-aos="fade-right">
                    @foreach($accordionItems as $index => $item)
                    <div class="accordion-item border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                        {{-- Cabeçalho do Acordeão --}}
                        <button 
                            class="accordion-header w-full p-6 text-left bg-gradient-to-r from-teal-50 to-cyan-50 hover:from-teal-100 hover:to-cyan-100 transition-colors duration-300 flex items-center justify-between group"
                            data-accordion-target="accordion-{{ $index }}"
                            data-image-target="image-{{ $index }}"
                        >
                            <h3 class="text-lg font-semibold !mb-0 text-gray-800 group-hover:text-teal-700 transition-colors duration-300">
                                {!! wp_kses_post($item['title']) !!}
                            </h3>
                            <svg class="accordion-icon w-5 h-5 text-gray-500 transform transition-transform duration-300 group-hover:text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        {{-- Conteúdo do Acordeão --}}
                        <div 
                            id="accordion-{{ $index }}" 
                            class="accordion-content bg-white {{ $index === 0 ? 'max-h-96 opacity-100' : 'max-h-0 opacity-0' }} overflow-hidden transition-all duration-500 ease-in-out"
                            style="{{ $index === 0 ? 'max-height: 24rem;' : 'max-height: 0;' }}"
                        >
                            <div class="p-6 border-t border-gray-100">
                                <p class="text-gray-600 leading-relaxed ">
                                    {!! wp_kses_post($item['content']) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            {{-- Imagem Dinâmica (Direita) --}}
            <div class="image-container sticky max-h-[500px] h-full" data-aos="fade-left">
                <div class="relative h-full overflow-hidden">
                    
                    {{-- Imagens (uma para cada item do acordeão) --}}
                    @foreach($accordionItems as $index => $item)
                    <div 
                        id="image-{{ $index }}" 
                        class="dynamic-image {{ $index === 0 ? 'opacity-100' : 'opacity-0' }} absolute inset-0 transition-opacity duration-500"
                    >
                        @if($item['imageUrl'])
                            <img 
                                src="{{ esc_url($item['imageUrl']) }}" 
                                alt="{{ esc_attr($item['imageAlt']) }}"
                                class="w-full h-full object-cover rounded-2xl {{ $index === 0 ? 'clip-path-open' : 'clip-path-closed' }}"
                            >
                        @else
                            {{-- Placeholder quando não há imagem --}}
                            <div class="w-full h-96 flex items-center justify-center">
                                <div class="text-white/80 text-center">
                                    <div class="text-6xl mb-4">⚗️</div>
                                    <h4 class="text-xl font-semibold mb-2">{!! wp_kses_post($item['title']) !!}</h4>
                                    <p class="text-white/70">Configure uma imagem no editor</p>
                                </div>
                            </div>
                        @endif
                        
                        {{-- Overlay sutil --}}
                     </div>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
</section>