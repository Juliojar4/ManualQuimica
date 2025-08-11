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
                    <a target="_blank" href="https://www.instagram.com/anaclarafarmaco/"
                        class="w-10 h-10 bg-slate-700 hover:bg-teal-600 rounded-lg flex items-center justify-center transition-all duration-500 hover:scale-110 hover:-translate-y-1 hover:shadow-lg group">
                        <svg class="w-5 h-5 text-gray-300 group-hover:text-white group-hover:rotate-12 transition-all duration-500"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
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
    <div class="border-t relative z-50 border-slate-700">
        <div class="container mx-auto px-6 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-gray-400 text-sm">
                    © {{ date('Y') }} Manual de Química. Todos os direitos reservados.
                </div>
                
                {{-- Assinatura especial do desenvolvedor --}}
                <div class="signature-container">
                    <div class="signature-line flex items-center space-x-2 text-sm">
                        <span class="signature-icon">💻</span>
                        <span class="typewriter-text" id="full-signature">
                            <span id="typed-text"></span>
                        </span>
                    </div>
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
                        <path d="M10 10 L80 10 M75 5 L80 10 L75 15" stroke="currentColor" stroke-width="2"
                            fill="none" />
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
    /* Assinatura especial do desenvolvedor */
    .signature-container {
        position: relative;
    }
    
    .signature-line {
        position: relative;
        padding: 8px 16px;
        border-radius: 25px;
        background: linear-gradient(135deg, rgba(20, 184, 166, 0.1), rgba(59, 130, 246, 0.1));
        border: 1px solid rgba(20, 184, 166, 0.2);
        transition: all 0.3s ease;
    }
    
    .signature-line:hover {
        background: linear-gradient(135deg, rgba(20, 184, 166, 0.15), rgba(59, 130, 246, 0.15));
        border-color: rgba(20, 184, 166, 0.4);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(20, 184, 166, 0.2);
    }
    
    .signature-icon {
        font-size: 16px;
        animation: pulse-icon 2s ease-in-out infinite;
    }
    
    .signature-heart {
        color: #ef4444;
        font-size: 14px;
        animation: heartbeat 1.5s ease-in-out infinite;
    }
    
    .signature-name {
        color: #14b8a6 !important;
        font-weight: 600;
        text-decoration: none;
        position: relative;
        transition: all 0.3s ease;
    }
    
    .signature-name:hover {
        color: #06d6a2 !important;
        text-shadow: 0 0 8px rgba(20, 184, 166, 0.6);
    }
    
    .signature-name::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #14b8a6, #3b82f6);
        transition: width 0.3s ease;
        border-radius: 1px;
    }
    
    .signature-name:hover::after {
        width: 100%;
    }
    
    /* Animação Typewriter para a frase completa */
    .typewriter-text {
        display: inline-block;
        position: relative;
        overflow: hidden;
        color: #9ca3af;
    }
    
    .typewriter-text::after {
        content: '|';
        position: absolute;
        right: -2px;
        top: 0;
        color: #14b8a6;
        animation: blink 1s infinite;
        font-weight: normal;
    }
    
    @keyframes blink {
        0%, 50% { opacity: 1; }
        51%, 100% { opacity: 0; }
    }
    
    @keyframes typewriter {
        from { width: 0; }
        to { width: 100%; }
    }
    
    .typewriter-text.finished::after {
        display: none;ormos 
    }
    
    /* Estilo para o nome dentro da frase */
    .signature-name-highlight {
        color: white !important;
        font-weight: 600;
        font-size: 1rem;  
        text-decoration: none;
        position: relative;
        transition: all 0.3s ease;
    }
    
    .signature-name-highlight:hover {
        color: #06d6a2 !important;
        text-shadow: 0 0 8px rgba(20, 184, 166, 0.6);
    }
    
    .signature-text {
        font-weight: 400;
        transition: color 0.3s ease;
    }
    
    .signature-line:hover .signature-text {
        color: #9ca3af;
    }
    
    /* Animações */
    @keyframes pulse-icon {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    
    @keyframes heartbeat {
        0%, 100% {
            transform: scale(1);
        }
        25% {
            transform: scale(1.1);
        }
        50% {
            transform: scale(1);
        }
        75% {
            transform: scale(1.05);
        }
    }
    
    /* Responsividade */
    @media (max-width: 768px) {
        .signature-line {
            padding: 6px 12px;
            font-size: 12px;
        }
        
        .signature-icon {
            font-size: 14px;
        }
        
        .signature-heart {
            font-size: 12px;
        }
    }

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
        transition: all 0.2s ease; /* Transição mais rápida */
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
        background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.8), rgba(20, 184, 166, 0.8));
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
        0% {
            transform: translateX(-50%) rotate(0deg) translateX(30px) rotate(0deg);
        }

        100% {
            transform: translateX(-50%) rotate(360deg) translateX(30px) rotate(-360deg);
        }
    }

    @keyframes orbit-2 {
        0% {
            transform: rotate(0deg) translateX(25px) rotate(0deg);
        }

        100% {
            transform: rotate(-360deg) translateX(25px) rotate(360deg);
        }
    }

    .reaction-arrow {
        width: 60px;
        height: 20px;
        color: #14B8A6;
        animation: pulse-arrow 1s ease-in-out infinite;
    }

    @keyframes pulse-arrow {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.1);
            opacity: 0.7;
        }
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

    .bubble-1 {
        width: 12px;
        height: 12px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .bubble-2 {
        width: 8px;
        height: 8px;
        top: 60%;
        left: 20%;
        animation-delay: 0.5s;
    }

    .bubble-3 {
        width: 16px;
        height: 16px;
        top: 30%;
        right: 15%;
        animation-delay: 1s;
    }

    .bubble-4 {
        width: 6px;
        height: 6px;
        bottom: 40%;
        left: 30%;
        animation-delay: 1.5s;
    }

    .bubble-5 {
        width: 10px;
        height: 10px;
        bottom: 20%;
        right: 25%;
        animation-delay: 2s;
    }

    .bubble-6 {
        width: 14px;
        height: 14px;
        top: 70%;
        right: 40%;
        animation-delay: 2.5s;
    }

    @keyframes bubble-float-reaction {
        0% {
            transform: translateY(0px) scale(0);
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            transform: translateY(-200px) scale(1);
            opacity: 0;
        }
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

    .loading-word:nth-child(1) {
        animation-delay: 0s;
    }

    .loading-word:nth-child(2) {
        animation-delay: 0.3s;
    }

    .loading-word:nth-child(3) {
        animation-delay: 0.6s;
    }

    @keyframes word-wave {

        0%,
        60%,
        100% {
            transform: translateY(0);
        }

        30% {
            transform: translateY(-10px);
        }
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

        // Verificar se estamos na página de downloads
        const isDownloadPage = window.location.href.includes('/minha-conta/downloads/') || 
                              window.location.href.includes('/my-account/downloads/');

        // Função para mostrar transição
        function showPageTransition() {
            // Não mostrar transição se estiver na página de downloads
            if (isDownloadPage) return;
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
                const href = link.getAttribute('href');
                const currentUrl = window.location.href;
                
                // Pular links externos, que abrem em nova aba, downloads ou redes sociais
                if (link.target === '_blank' || 
                    link.hasAttribute('download') || 
                    href.includes('linkedin.com') || 
                    href.includes('instagram.com') ||
                    href.includes('facebook.com') ||
                    href.includes('twitter.com') ||
                    href.includes('youtube.com') ||
                    href.startsWith('http') && !href.includes(window.location.hostname) ||
                    link.closest('.border-t.border-slate-700') || // Excluir área de copyright
                    link.classList.contains('no-transition') || // Classe para excluir manualmente
                    href.includes('/downloads/') || // Excluir downloads
                    href.includes('minha-conta/downloads') || // Excluir área de downloads
                    href.includes('my-account/downloads') || // Excluir downloads em inglês
                    href === '/#venda' || href.endsWith('#venda') || // Excluir seção venda
                    currentUrl.includes('/minha-conta/downloads/') || // Se estiver na página de downloads, não fazer transição
                    currentUrl.includes('/my-account/downloads/') || // Se estiver na página de downloads (inglês)
                    href.startsWith('mailto:') || 
                    href.startsWith('tel:')) {
                    return;
                }

                link.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');

                    // Se for âncora na mesma página, não fazer transição
                    if (href.startsWith('#')) {
                        return;
                    }
                    
                    // Se for link para seção venda (#venda), não fazer transição
                    if (href === '/#venda' || href.endsWith('#venda')) {
                        return;
                    }

                    e.preventDefault();

                    // Mostrar animação de transição
                    showPageTransition();

                    // Navegar após a animação (mais rápido)
                    setTimeout(() => {
                        window.location.href = href;
                    }, 400); // Duração reduzida para 400ms
                });
            });
        }

        // Esconder transição quando a página carregar
        window.addEventListener('load', function() {
            setTimeout(() => {
                hidePageTransition();
            }, 200); // Reduzido para 200ms
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
            // Reduzir animações em mobile e acelerar transições
            const style = document.createElement('style');
            style.textContent = `
                .page-transition { transition: all 0.15s ease !important; }
                .atom-orbit, .atom-orbit-2 { animation-duration: 2s !important; }
                .bubble-reaction { animation-duration: 2.5s !important; }
                .word-wave { animation-duration: 1.5s !important; }
            `;
            document.head.appendChild(style);
        }

        // Debug mode (remover em produção)
        if (window.location.search.includes('debug=transitions')) {

            // Adicionar botão de teste
            const debugBtn = document.createElement('button');
            debugBtn.textContent = 'Testar Transição';
            debugBtn.style.cssText =
                'position:fixed;top:10px;right:10px;z-index:10000;padding:10px;background:#14B8A6;color:white;border:none;border-radius:5px;cursor:pointer;';
            debugBtn.onclick = () => {
                showPageTransition();
                setTimeout(() => hidePageTransition(), 2000);
            };
            document.body.appendChild(debugBtn);
        }
    });

    // ==========================================
    // ANIMAÇÃO TYPEWRITER PARA A FRASE COMPLETA
    // ==========================================
    
    // Variável para controlar se a animação já foi executada
    let typewriterExecuted = false;
    
    // Animação Typewriter para a frase completa
    function typewriterAnimation() {
        const textElement = document.getElementById('typed-text');
        if (!textElement || typewriterExecuted) return;
        
        typewriterExecuted = true; // Marcar como executada
        console.log('Iniciando animação typewriter da frase completa'); // Debug
        
        const fullText = 'Desenvolvido e criado por ';
        const nameText = 'Julio Jara';
        const linkedinUrl = 'https://www.linkedin.com/in/julio-cesar-ravacci-jara-734368224/';
        
        let currentIndex = 0;
        
        // Limpar conteúdo anterior
        textElement.innerHTML = '';
        
        function typeNextLetter() {
            if (currentIndex < fullText.length) {
                // Adicionar letra da frase principal
                textElement.innerHTML += fullText[currentIndex];
                currentIndex++;
                setTimeout(typeNextLetter, 80); // Velocidade da digitação
            } else {
                // Iniciar digitação do nome com link
                typeNameWithLink();
            }
        }
        
        function typeNameWithLink() {
            let nameIndex = 0;
            
            // Adicionar abertura do link
            textElement.innerHTML += `<a href="${linkedinUrl}" target="_blank" class="no-transition signature-name-highlight">`;
            
            function typeNameLetter() {
                if (nameIndex < nameText.length) {
                    // Adicionar letra do nome dentro do link
                    const linkElement = textElement.querySelector('a');
                    linkElement.textContent += nameText[nameIndex];
                    nameIndex++;
                    setTimeout(typeNameLetter, 80);
                } else {
                    // Fechar o link e finalizar
                    setTimeout(() => {
                        const parent = textElement.parentElement;
                        if (parent) {
                            parent.classList.add('finished');
                        }
                    }, 1000);
                }
            }
            
            setTimeout(typeNameLetter, 200); // Pequena pausa antes do nome
        }
        
        // Inicia a animação após um pequeno delay
        setTimeout(typeNextLetter, 300);
    }
    
    // Observador de interseção para detectar quando o footer está visível
    function setupTypewriterObserver() {
        const signatureContainer = document.querySelector('.signature-container');
        const textElement = document.getElementById('typed-text');
        
        if (!signatureContainer || !textElement) {
            console.log('Elementos não encontrados para animação typewriter'); // Debug
            return;
        }
        
        console.log('Configurando observer para typewriter'); // Debug
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                console.log('Observer disparado:', entry.isIntersecting, entry.intersectionRatio); // Debug
                if (entry.isIntersecting && !typewriterExecuted) {
                    console.log('Footer visível, executando animação'); // Debug
                    // Footer está visível, executar animação
                    typewriterAnimation();
                    // Desconectar o observer após executar uma vez
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1, // Reduzir threshold para 10%
            rootMargin: '0px 0px -50px 0px' // Reduzir margem
        });
        
        observer.observe(signatureContainer);
        
        // Fallback: Se não disparar em 10 segundos, executar a animação
        setTimeout(() => {
            if (!typewriterExecuted) {
                console.log('Fallback: executando animação por timeout'); // Debug
                typewriterAnimation();
            }
        }, 10000);
    }
    
    // Configurar o observer quando a página carrega
    window.addEventListener('load', setupTypewriterObserver);
    
    // Também configurar quando o DOM estiver pronto (backup)
    document.addEventListener('DOMContentLoaded', setupTypewriterObserver);
    
    // Debug: Verificar elementos após um tempo
    setTimeout(() => {
        const signatureContainer = document.querySelector('.signature-container');
        const textElement = document.getElementById('typed-text');
        console.log('Debug elements:', {
            signatureContainer: !!signatureContainer,
            textElement: !!textElement,
            typewriterExecuted: typewriterExecuted
        });
        
        // Se os elementos existem mas a animação não executou, force a execução
        if (signatureContainer && textElement && !typewriterExecuted) {
            console.log('Forçando execução da animação');
            typewriterAnimation();
        }
    }, 3000);

    // ==========================================
    // PRELOADER INICIAL (se necessário)
    // ==========================================

    // Mostrar transição durante carregamento inicial
    if (document.readyState === 'loading') {
        document.getElementById('page-transition')?.classList.add('active');
    }
</script>
