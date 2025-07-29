<section class="hero-block h-[70vh] bg-cover bg-[top] bg-no-repeat text-white py-20 px-6 relative" 
         @if($imageUrl)
         style="background-image: url('{{ esc_url($imageUrl) }}')"
         @else
         style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%)"
         @endif>
  <!-- Overlay escuro para melhor legibilidade do texto -->
   
  <div class="container mx-auto relative z-10">
    <div class="flex flex-col items-center justify-center h-full text-center">
      
      {{-- Conteúdo de texto --}}
         {{-- Título com animação de entrada suave --}}
        <div>
            <h1 class="w-[710px] max-w-full text-center font-bold mb-6 leading-tight drop-shadow-lg min-h-[120px] flex items-center justify-center">
            <span id="animated-title" data-title="{{ esc_attr(strip_tags($title)) }}" class="inline-block"></span>
            </h1>
            <p data-aos="fade-in" data-aos-delay="850" class="!text-[1.25rem] md:text-2xl mb-8 !text-green-700 leading-relaxed font-sans max-w-2xl mx-auto drop-shadow-md">
            {!! wp_kses_post($description) !!}
            </p>
            
            {{-- Botão moderno com animação química --}}
            @if($showButton ?? true)
            <div data-aos="fade-in" data-aos-delay="1100" class="mt-8">
                <a href="{{ $buttonUrl ?? '#conteudo' }}" class="relative inline-flex items-center gap-3 bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700 text-gray-800 font-semibold py-2.5 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 ease-out group overflow-hidden">
                    {{-- Animação de bolhas --}}
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="bubble bubble-1"></div>
                        <div class="bubble bubble-2"></div>
                        <div class="bubble bubble-3"></div>
                        <div class="bubble bubble-4"></div>
                        <div class="bubble bubble-5"></div>
                    </div>
                    
                    {{-- Conteúdo do botão --}}
                    <div class="relative z-10 flex items-center gap-3">
                        <span class="!text-gray-700  ">{{ $buttonText ?? 'Começar a Aprender' }}</span>
                    </div>
                </a>
            </div>
            @endif
        </div>

    </div>
  </div>
</section>
 
 