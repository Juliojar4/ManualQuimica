<section id="venda" class="primary-cta-block py-10 lg:py-20 px-6 bg-gradient-to-br from-green-50 to-emerald-100">
    <div class="container mx-auto max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            {{-- Conteúdo --}}
            <div class="space-y-6" data-aos="fade-right">
                {{-- Título --}}
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 leading-tight">
                    {!! wp_kses_post($title) !!}
                </h2>
                
                {{-- Subtítulo --}}
                <p class="text-lg text-gray-600 leading-relaxed">
                    {!! wp_kses_post($subtitle) !!}
                </p>
                
                {{-- Botão CTA --}}
                <div class="pt-4">
                    @php
                        // URL para adicionar produto ao carrinho e ir direto para checkout
                        $checkout_url = add_query_arg([
                            'add-to-cart' => $productId,
                            'quantity' => 1
                        ], wc_get_checkout_url());
                    @endphp
                    
                    {{-- Botão customizado para CTA de compra --}}
                    <a 
                        href="{{ esc_url($checkout_url) }}" 
                        class="inline-flex items-center bg-green-600 hover:bg-green-700 !text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 group"
                    >
                        <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6"></path>
                        </svg>
                        Comprar Agora
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
                
                {{-- Informações extras --}}
                <div class="flex items-center space-x-6 text-sm text-gray-500 pt-2">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        Compra Segura
                    </div>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Entrega Rápida
                    </div>
                </div>
            </div>
            
            {{-- Imagem --}}
            <div class="space-y-4" data-aos="fade-left">
                @if($imageUrl)
                    <div class="relative rounded-2xl overflow-hidden">
                        <img 
                            src="{{ esc_url($imageUrl) }}" 
                            alt="{{ esc_attr($imageAlt) }}"
                            class="w-full h-auto object-cover"
                        >
                        
                    </div>
                @else
                    {{-- Placeholder quando não há imagem --}}
                    <div class="w-full h-96 bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl flex items-center justify-center shadow-xl">
                        <div class="text-center text-gray-500">
                            <div class="text-6xl mb-4">🛍️</div>
                            <h4 class="text-xl font-semibold mb-2">Produto Especial</h4>
                            <p class="text-gray-400">Configure uma imagem no editor</p>
                        </div>
                    </div>
                @endif
            </div>
            
        </div>
    </div>
</section>