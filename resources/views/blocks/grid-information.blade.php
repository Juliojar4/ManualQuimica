<section class="grid-information-block py-20 px-6 bg-gray-50">
    {{-- Debug info (remover em produção) --}}
 
    
    <div class="container mx-auto max-w-7xl">
        <h2 class="text-center mb-12">O que será abordado</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach($cards as $index => $card)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 group" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 100 }}">
                
                {{-- Imagem --}}
                <div class="h-48 bg-gradient-to-br from-teal-400 to-cyan-600 relative overflow-hidden">
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
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-teal-600 transition-colors duration-300">
                        {!! wp_kses_post($card['title']) !!}
                    </h3>
                    
                    <p class="text-gray-600 leading-relaxed">
                        {!! wp_kses_post($card['subtitle']) !!}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>