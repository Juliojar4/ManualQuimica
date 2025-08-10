<section
    class="hero-block relative min-h-[80vh] lg:min-h-[85vh] mt-[-46px] lg:mt-[-32px] bg-cover bg-center bg-no-repeat text-white pb-20 pt-9 lg:pt-20 md:pt-32 px-6 overflow-hidden"
    @if ($imageUrl) style="background-image: linear-gradient(135deg, rgba(15, 23, 42, 0.8), rgba(30, 41, 59, 0.9)), url('{{ esc_url($imageUrl) }}')"
         @else
         style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%)" @endif>

    {{-- Overlay com gradiente melhorado --}}
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-800/70 to-slate-700/60"></div>

    {{-- Elementos decorativos --}}
    <div class="absolute inset-0 overflow-hidden">
        {{-- Moléculas flutuantes com animações mais suaves --}}
        <div class="absolute top-20 left-10 w-4 h-4 bg-teal-400/30 rounded-full animate-float-slow hidden md:block"></div>
        <div class="absolute top-32 right-20 w-6 h-6 bg-cyan-400/20 rounded-full animate-float-medium hidden lg:block"></div>
        <div class="absolute bottom-40 left-1/4 w-3 h-3 bg-blue-400/40 rounded-full animate-float-fast hidden md:block"></div>
        <div class="absolute bottom-60 right-1/3 w-5 h-5 bg-teal-300/25 rounded-full animate-float-slow hidden lg:block"></div>

        {{-- Padrão de grid sutil --}}
        <div class="absolute inset-0 opacity-5 md:opacity-10"
            style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 40px 40px;">
        </div>
    </div>

    <div class="container mx-auto relative z-10 h-full">
        <div class="flex flex-col items-center justify-center h-full min-h-[60vh] text-center">

            {{-- Badge/Tag superior --}}
            <div data-aos="fade-down" data-aos-delay="200" class="mb-6">
                <span
                    class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full text-sm font-medium text-white/90">
                    <span class="w-2 h-2 bg-teal-400 rounded-full animate-pulse"></span>
                    Manual de Química Completo
                </span>
            </div>

            {{-- Conteúdo de texto --}}
            <div class="max-w-4xl mx-auto">
                {{-- Título com animação de entrada suave --}}
                <div class="mb-8">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold mb-6 leading-tight">
                        <span
                            class="bg-gradient-to-r from-white via-gray-100 to-teal-100 bg-clip-text text-transparent drop-shadow-2xl">
                            <span id="animated-title" data-title="{{ esc_attr(strip_tags($title)) }}"
                                class="inline-block !text-[#5f9ea0]"></span>
                        </span>
                    </h1>

                    <div class="w-24 h-1 bg-gradient-to-r from-teal-400 to-cyan-400 mx-auto rounded-full mb-8"
                        data-aos="fade-in" data-aos-delay="800"></div>

                    <p data-aos="fade-up" data-aos-delay="600"
                        class="text-lg md:text-xl lg:text-2xl mb-8 text-gray-200 leading-relaxed font-light max-w-3xl mx-auto">
                        {!! wp_kses_post($description) !!}
                    </p>
                </div>

                {{-- Botões de ação --}}
                @if ($showButton ?? true)
                    <div data-aos="fade-up" data-aos-delay="800"
                        class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                        {{-- Botão principal --}}
                        <a href="{{ $buttonUrl ?? '#venda' }}"
                            class="group relative inline-flex items-center gap-3 bg-gradient-to-r from-teal-500 via-cyan-500 to-blue-500 hover:from-teal-600 hover:via-cyan-600 hover:to-blue-600 text-white font-semibold py-4 px-8 rounded-2xl shadow-2xl hover:shadow-teal-500/25 transition-all duration-500 ease-out transform hover:scale-105 overflow-hidden">
                            {{-- Efeito de brilho --}}
                            <div
                                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000">
                            </div>

                            {{-- Animação de bolhas química --}}
                            <div
                                class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="bubble bubble-1"></div>
                                <div class="bubble bubble-2"></div>
                                <div class="bubble bubble-3"></div>
                                <div class="bubble bubble-4"></div>
                                <div class="bubble bubble-5"></div>
                            </div>

                            {{-- Conteúdo do botão --}}
                            <div class="relative z-10 flex items-center gap-3">
                                <svg class="w-5 h-5 text-white transform group-hover:rotate-12 transition-transform duration-300"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {{-- Tubo principal --}}
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 4v14a2 2 0 002 2h0a2 2 0 002-2V4" />

                                    {{-- Borda superior --}}
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 4h6" />

                                    {{-- Líquido químico --}}
                                    <path fill="currentColor" fill-opacity="0.3"
                                        d="M10.5 12v5.5c0 0.8 0.7 1.5 1.5 1.5s1.5-0.7 1.5-1.5V12h-3z" />

                                    {{-- Bolhas --}}
                                    <circle cx="11.5" cy="15" r="0.3" fill="currentColor" />
                                    <circle cx="12.5" cy="13.5" r="0.2" fill="currentColor" opacity="0.8" />

                                    {{-- Vapor saindo --}}
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M11 2c0-0.5 0.2-1 0.5-1s0.5 0.5 0.5 1" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M12.5 1.5c0-0.3 0.1-0.5 0.3-0.5s0.2 0.2 0.2 0.5" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M10.5 1.8c0-0.2 0.1-0.3 0.2-0.3s0.3 0.1 0.3 0.3" />
                                </svg>
                                <span class="text-lg text-white">{{ $buttonText ?? 'Começar a Aprender' }}</span>
                            </div>
                        </a>

                        {{-- Botão secundário --}}
                        <a href="#preview"
                            class="group inline-flex items-center gap-2 text-white/80 hover:text-white font-medium py-4 px-6 rounded-xl border border-white/20 hover:border-white/40 backdrop-blur-sm hover:bg-white/10 transition-all duration-300">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h6"></path>
                            </svg>
                            <span>Ver Prévia</span>
                        </a>
                    </div>
                @endif

                {{-- Indicadores de funcionalidades --}}
                <div data-aos="fade-up" data-aos-delay="1000"
                    class="mt-12 flex flex-wrap justify-center gap-6 text-sm text-gray-300">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                            </path>
                        </svg>
                        <span>Conteúdo Completo</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Acesso Vitalício</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<style>
    /* Animações personalizadas com performance otimizada */
    @keyframes float-slow {
        0%, 100% {
            transform: translate3d(0, 0, 0) rotate(0deg);
        }
        50% {
            transform: translate3d(0, -15px, 0) rotate(180deg);
        }
    }

    @keyframes float-medium {
        0%, 100% {
            transform: translate3d(0, 0, 0) rotate(0deg);
        }
        50% {
            transform: translate3d(0, -10px, 0) rotate(90deg);
        }
    }

    @keyframes float-fast {
        0%, 100% {
            transform: translate3d(0, 0, 0) rotate(0deg);
        }
        50% {
            transform: translate3d(0, -8px, 0) rotate(180deg);
        }
    }

    .animate-float-slow {
        animation: float-slow 8s ease-in-out infinite;
        will-change: transform;
        backface-visibility: hidden;
        perspective: 1000px;
    }

    .animate-float-medium {
        animation: float-medium 6s ease-in-out infinite;
        will-change: transform;
        backface-visibility: hidden;
        perspective: 1000px;
    }

    .animate-float-fast {
        animation: float-fast 5s ease-in-out infinite;
        will-change: transform;
        backface-visibility: hidden;
        perspective: 1000px;
    }

    /* Bolhas químicas melhoradas */
    .bubble {
        position: absolute;
        border-radius: 50%;
        background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.1));
        animation: bubble-float 3s infinite ease-in-out;
    }

    .bubble-1 {
        width: 8px;
        height: 8px;
        top: 80%;
        left: 20%;
        animation-delay: 0s;
    }

    .bubble-2 {
        width: 12px;
        height: 12px;
        top: 70%;
        left: 40%;
        animation-delay: 0.5s;
    }

    .bubble-3 {
        width: 6px;
        height: 6px;
        top: 85%;
        left: 60%;
        animation-delay: 1s;
    }

    .bubble-4 {
        width: 10px;
        height: 10px;
        top: 75%;
        left: 80%;
        animation-delay: 1.5s;
    }

    .bubble-5 {
        width: 4px;
        height: 4px;
        top: 90%;
        left: 30%;
        animation-delay: 2s;
    }

    @keyframes bubble-float {
        0% {
            transform: translateY(0px) scale(1);
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            transform: translateY(-100px) scale(0.8);
            opacity: 0;
        }
    }

    /* Responsividade melhorada */
    @media (max-width: 640px) {
        .hero-block {
            min-height: 75vh;
            padding-top: 5rem;
            padding-bottom: 4rem;
        }

        .hero-block h1 {
            font-size: 2.25rem;
            line-height: 1.2;
        }

        .hero-block p {
            font-size: 1.125rem;
        }
        
        /* Desabilita animações complexas em mobile para melhor performance */
        .animate-float-slow,
        .animate-float-medium,
        .animate-float-fast {
            animation: none;
            display: none;
        }
        
        /* Reduz complexidade das bolhas em mobile */
        .bubble {
            animation-duration: 4s;
            animation-timing-function: ease-out;
        }
    }
    
    /* Reduz movimento para usuários com preferência por movimento reduzido */
    @media (prefers-reduced-motion: reduce) {
        .animate-float-slow,
        .animate-float-medium,
        .animate-float-fast,
        .bubble {
            animation: none;
        }
        
        .group-hover\\:rotate-12 {
            transform: none !important;
        }
    }
</style>
