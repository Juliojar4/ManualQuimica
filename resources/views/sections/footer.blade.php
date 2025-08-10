{{-- Footer Principal --}}
<footer class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white relative overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-5">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60"
            viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg
            fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"
            /%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
    </div>

    {{-- Seção Principal --}}
    <div class="relative container mx-auto max-w-7xl px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Coluna 1: Sobre o Manual de Química --}}
            <div class="space-y-6">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br rounded-xl flex items-center justify-center">
                        {!! get_custom_logo() !!}
                    </div>
                    <h3 class="text-xl font-bold !mb-0 !text-white">Manual de Química</h3>
                </div>

                <p class="text-gray-300 leading-relaxed">
                    Sua fonte confiável para aprender química de forma simples e prática.
                    Transformamos conceitos complexos em conhecimento acessível.
                </p>

                <div class="flex space-x-4">
                    <a href="#"
                        class="w-10 h-10 bg-slate-700 hover:bg-teal-600 rounded-lg flex items-center justify-center transition-all duration-500 hover:scale-110 hover:-translate-y-1 hover:shadow-lg group">
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-white group-hover:rotate-12 transition-all duration-500"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-slate-700 hover:bg-teal-600 rounded-lg flex items-center justify-center transition-all duration-500 hover:scale-110 hover:-translate-y-1 hover:shadow-lg group">
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-white group-hover:rotate-12 transition-all duration-500"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-slate-700 hover:bg-teal-600 rounded-lg flex items-center justify-center transition-all duration-500 hover:scale-110 hover:-translate-y-1 hover:shadow-lg group">
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-white group-hover:rotate-12 transition-all duration-500"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.746-1.378l-.747 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.624 0 11.99-5.367 11.99-11.987C24.007 5.367 18.641.001.012.001z" />
                        </svg>
                    </a>
                    <a href="#"
                        class="w-10 h-10 bg-slate-700 hover:bg-teal-600 rounded-lg flex items-center justify-center transition-all duration-500 hover:scale-110 hover:-translate-y-1 hover:shadow-lg group">
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-white group-hover:rotate-12 transition-all duration-500"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Coluna 2: Navegação Rápida --}}
            <div class="space-y-6">
                <h3 class="text-lg font-semibold flex items-center !text-white">
                    <span class="w-2 h-6 bg-teal-400 rounded-full mr-3"></span>
                    Navegação Rápida
                </h3>

                <ul class="space-y-3">
                    <li><a href="/"
                            class="text-gray-300 hover:text-blue-600 transition-all duration-500 flex items-center group hover:translate-x-1">
                            <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="relative">
                                Início
                                <span
                                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-500"></span>
                            </span>
                        </a></li>

                    <li><a href="/#venda"
                            class="text-gray-300 hover:text-blue-600 transition-all duration-500 flex items-center group hover:translate-x-1">
                            <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <span class="relative">
                                Materiais
                                <span
                                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-500"></span>
                            </span>
                        </a></li>

                    <li>
                        <a href="/minha-conta"
                            class="text-gray-300 hover:text-blue-600 transition-all duration-500 flex items-center group hover:translate-x-1">
                            <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-500"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="relative">
                                Minha conta
                                <span
                                    class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-500"></span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>



            {{-- Coluna 4: Newsletter & Contato --}}
            <div class="space-y-6">
                <h3 class="text-lg font-semibold flex items-center !text-white">
                    <span class="w-2 h-6 bg-emerald-400 rounded-full mr-3"></span>
                    Fique Atualizado
                </h3>

                <p class="text-gray-300 text-sm">
                    Receba dicas, experimentos e novidades sobre química diretamente no seu e-mail.
                </p>

                <form class="space-y-3">
                    <div class="relative">
                        <input type="email" placeholder="Seu melhor e-mail"
                            class="w-full px-4 py-3 bg-slate-700 border border-slate-600 rounded-lg text-white placeholder-gray-400 focus:border-teal-400 focus:ring-1 focus:ring-teal-400 transition-colors duration-300">
                        <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700 text-white font-medium py-3 px-6 rounded-lg transition-all duration-300 hover:scale-105 transform">
                        Inscrever-se
                    </button>
                </form>

                <div class="pt-4 space-y-2">
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg class="w-4 h-4 mr-2 text-teal-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Pcclara86@gmail.com
                    </div>
                    <div class="flex items-center text-gray-300 text-sm">
                        <svg class="w-4 h-4 mr-2 text-teal-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        (15) 98834-8260
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Seção Bottom/Copyright --}}
    <div class="border-t border-slate-700">
        <div class="container mx-auto px-6 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-gray-400 text-sm">
                    © {{ date('Y') }} Manual de Química. Todos os direitos reservados.
                </div>


                <div class="flex items-center text-gray-400 text-sm">
                    <span class="mr-2">Feito com</span>
                    <svg class="w-4 h-4 text-red-500 mx-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-2">para educação</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Botão "Voltar ao Topo" --}}
    <button id="back-to-top"
        class="fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-600 hover:to-cyan-600 text-white rounded-full shadow-lg hover:shadow-xl transform hover:scale-110 transition-all duration-300 opacity-0 pointer-events-none z-50"
        aria-label="Voltar ao topo">
        <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
            </path>
        </svg>
    </button>

    {{-- Overlay de Transição Química --}}
    <div id="page-transition" class="page-transition">
        <div class="transition-container">
            {{-- Efeito de Reação Química --}}
            <div class="chemical-reaction">
                <div class="molecule molecule-1">
                    <div class="atom atom-center"></div>
                    <div class="atom atom-orbit"></div>
                    <div class="atom atom-orbit-2"></div>
                </div>
                <div class="reaction-arrow">
                    <svg viewBox="0 0 100 20">
                        <path d="M10 10 L80 10 M75 5 L80 10 L75 15" stroke="currentColor" stroke-width="2" fill="none"/>
                    </svg>
                </div>
                <div class="molecule molecule-2">
                    <div class="atom atom-center"></div>
                    <div class="atom atom-orbit"></div>
                    <div class="atom atom-orbit-2"></div>
                </div>
            </div>
            
            {{-- Bolhas de Reação --}}
            <div class="reaction-bubbles">
                <div class="bubble-reaction bubble-1"></div>
                <div class="bubble-reaction bubble-2"></div>
                <div class="bubble-reaction bubble-3"></div>
                <div class="bubble-reaction bubble-4"></div>
                <div class="bubble-reaction bubble-5"></div>
                <div class="bubble-reaction bubble-6"></div>
            </div>
            
            {{-- Texto de Loading --}}
            <div class="loading-text">
                <span class="loading-word">Preparando</span>
                <span class="loading-word">a</span>
                <span class="loading-word">reação...</span>
            </div>
        </div>
    </div>
</footer>

{{-- Estilos CSS para Transição --}}
<style>
/* Page Transition Overlay */
.page-transition {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
}

.page-transition.active {
    opacity: 1;
    visibility: visible;
}

.transition-container {
    text-align: center;
    color: white;
}

/* Chemical Reaction Animation */
.chemical-reaction {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 3rem;
    margin-bottom: 2rem;
}

.molecule {
    position: relative;
    width: 80px;
    height: 80px;
}

.atom {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, rgba(255,255,255,0.8), rgba(20, 184, 166, 0.8));
}

.atom-center {
    width: 20px;
    height: 20px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: linear-gradient(45deg, #14B8A6, #0891B2);
}

.atom-orbit {
    width: 8px;
    height: 8px;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(45deg, #06B6D4, #3B82F6);
    animation: orbit-1 2s linear infinite;
}

.atom-orbit-2 {
    width: 6px;
    height: 6px;
    bottom: 10px;
    right: 10px;
    background: linear-gradient(45deg, #8B5CF6, #EC4899);
    animation: orbit-2 1.5s linear infinite;
}

@keyframes orbit-1 {
    0% { transform: translateX(-50%) rotate(0deg) translateX(30px) rotate(0deg); }
    100% { transform: translateX(-50%) rotate(360deg) translateX(30px) rotate(-360deg); }
}

@keyframes orbit-2 {
    0% { transform: rotate(0deg) translateX(25px) rotate(0deg); }
    100% { transform: rotate(-360deg) translateX(25px) rotate(360deg); }
}

.reaction-arrow {
    width: 60px;
    height: 20px;
    color: #14B8A6;
    animation: pulse-arrow 1s ease-in-out infinite;
}

@keyframes pulse-arrow {
    0%, 100% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.1); opacity: 0.7; }
}

/* Reaction Bubbles */
.reaction-bubbles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.bubble-reaction {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle at 30% 30%, rgba(20, 184, 166, 0.6), rgba(20, 184, 166, 0.1));
    animation: bubble-float-reaction 3s infinite ease-in-out;
}

.bubble-1 { width: 12px; height: 12px; top: 20%; left: 10%; animation-delay: 0s; }
.bubble-2 { width: 8px; height: 8px; top: 60%; left: 20%; animation-delay: 0.5s; }
.bubble-3 { width: 16px; height: 16px; top: 30%; right: 15%; animation-delay: 1s; }
.bubble-4 { width: 6px; height: 6px; bottom: 40%; left: 30%; animation-delay: 1.5s; }
.bubble-5 { width: 10px; height: 10px; bottom: 20%; right: 25%; animation-delay: 2s; }
.bubble-6 { width: 14px; height: 14px; top: 70%; right: 40%; animation-delay: 2.5s; }

@keyframes bubble-float-reaction {
    0% { transform: translateY(0px) scale(0); opacity: 0; }
    50% { opacity: 1; }
    100% { transform: translateY(-200px) scale(1); opacity: 0; }
}

/* Loading Text Animation */
.loading-text {
    font-size: 1.2rem;
    font-weight: 500;
    color: #14B8A6;
}

.loading-word {
    display: inline-block;
    margin: 0 0.2rem;
    animation: word-wave 2s ease-in-out infinite;
}

.loading-word:nth-child(1) { animation-delay: 0s; }
.loading-word:nth-child(2) { animation-delay: 0.3s; }
.loading-word:nth-child(3) { animation-delay: 0.6s; }

@keyframes word-wave {
    0%, 60%, 100% { transform: translateY(0); }
    30% { transform: translateY(-10px); }
}

/* Responsividade */
@media (max-width: 768px) {
    .chemical-reaction {
        gap: 1.5rem;
        transform: scale(0.8);
    }
    
    .reaction-arrow {
        width: 40px;
    }
    
    .loading-text {
        font-size: 1rem;
    }
}
</style>

{{-- JavaScript para o botão "Voltar ao Topo" e Transições de Página --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const backToTop = document.getElementById('back-to-top');
        const pageTransition = document.getElementById('page-transition');

        // Mostrar/ocultar botão baseado no scroll
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTop.classList.remove('opacity-0', 'pointer-events-none');
                backToTop.classList.add('opacity-100');
            } else {
                backToTop.classList.add('opacity-0', 'pointer-events-none');
                backToTop.classList.remove('opacity-100');
            }
        });

        // Smooth scroll ao topo
        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Newsletter form
        const newsletterForm = document.querySelector('footer form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input[type="email"]').value;

                // Aqui você pode adicionar a lógica de envio do newsletter
                alert('Obrigado por se inscrever! Em breve você receberá nossas novidades.');
                this.reset();
            });
        }

        // ==========================================
        // SISTEMA DE TRANSIÇÃO DE PÁGINAS QUÍMICAS
        // ==========================================

        // Função para mostrar transição
        function showPageTransition() {
            pageTransition.classList.add('active');
        }

        // Função para esconder transição
        function hidePageTransition() {
            pageTransition.classList.remove('active');
        }

        // Interceptar todos os links internos
        function setupPageTransitions() {
            const links = document.querySelectorAll('a[href^="/"], a[href^="' + window.location.origin + '"], a[href^="#"]');
            
            links.forEach(link => {
                // Pular links que abrem em nova aba ou são downloads
                if (link.target === '_blank' || link.hasAttribute('download')) {
                    return;
                }

                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    
                    // Se for âncora na mesma página, não fazer transição
                    if (href.startsWith('#')) {
                        return;
                    }

                    e.preventDefault();
                    
                    // Mostrar animação de transição
                    showPageTransition();
                    
                    // Navegar após a animação
                    setTimeout(() => {
                        window.location.href = href;
                    }, 800); // Duração da animação
                });
            });
        }

        // Esconder transição quando a página carregar
        window.addEventListener('load', function() {
            setTimeout(() => {
                hidePageTransition();
            }, 500);
        });

        // Mostrar transição quando sair da página (back/forward)
        window.addEventListener('beforeunload', function() {
            showPageTransition();
        });

        // Configurar transições quando o DOM estiver pronto
        setupPageTransitions();

        // Reconfigurar transições se novo conteúdo for adicionado dinamicamente
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.addedNodes.length) {
                    setupPageTransitions();
                }
            });
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });

        // ==========================================
        // FUNÇÕES AUXILIARES PARA DIFERENTES TIPOS DE TRANSIÇÃO
        // ==========================================

        // Transição para WooCommerce (carrinho, checkout, etc.)
        function setupWooCommerceTransitions() {
            // Formulários de adicionar ao carrinho
            const addToCartForms = document.querySelectorAll('form.cart');
            addToCartForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    // Mostrar transição apenas se for redirecionamento
                    if (!this.querySelector('input[name="add-to-cart"]')) return;
                    
                    showPageTransition();
                    setTimeout(() => {
                        // Deixar o WooCommerce processar normalmente
                        form.submit();
                    }, 600);
                    
                    e.preventDefault();
                });
            });
        }

        // Configurar transições do WooCommerce
        setupWooCommerceTransitions();

        // ==========================================
        // CONFIGURAÇÕES AVANÇADAS
        // ==========================================

        // Detectar se é mobile para ajustar performance
        const isMobile = window.innerWidth <= 768;
        if (isMobile) {
            // Reduzir animações em mobile
            const style = document.createElement('style');
            style.textContent = `
                .atom-orbit, .atom-orbit-2 { animation-duration: 3s !important; }
                .bubble-reaction { animation-duration: 4s !important; }
                .word-wave { animation-duration: 3s !important; }
            `;
            document.head.appendChild(style);
        }

        // Debug mode (remover em produção)
        if (window.location.search.includes('debug=transitions')) {
            console.log('🧪 Page Transitions Debug Mode Ativo');
            
            // Adicionar botão de teste
            const debugBtn = document.createElement('button');
            debugBtn.textContent = 'Testar Transição';
            debugBtn.style.cssText = 'position:fixed;top:10px;right:10px;z-index:10000;padding:10px;background:#14B8A6;color:white;border:none;border-radius:5px;cursor:pointer;';
            debugBtn.onclick = () => {
                showPageTransition();
                setTimeout(() => hidePageTransition(), 2000);
            };
            document.body.appendChild(debugBtn);
        }
    });

    // ==========================================
    // PRELOADER INICIAL (se necessário)
    // ==========================================
    
    // Mostrar transição durante carregamento inicial
    if (document.readyState === 'loading') {
        document.getElementById('page-transition')?.classList.add('active');
    }
</script>
