<section class="hero-block h-[90vh] bg-gradient-to-b from-blue-300 from-40% via-[#0498d4] via-70% to-[#0e5c7b] text-white py-20 px-6">
  <div class="container mx-auto max-w-6xl">
    <div class="flex flex-col items-center h-full">
      
      {{-- Conteúdo de texto --}}
      <div class="flex flex-col items-center text-center md:text-left">
        {{-- Título com animação de entrada suave --}}
        <h1 class="w-[710px] max-w-full text-center font-bold mb-6 leading-tight drop-shadow-md min-h-[120px] flex items-center justify-center">
          <span id="animated-title" class="inline-block"></span>
        </h1>
    <img src="{{ esc_url($imageUrl) }}" 
        alt="{{ esc_attr($imageAlt) }}" 
        class="max-w-[350px] h-auto mb-15 "
        data-aos="fade-right"
        >
            
 
        {{-- Descrição --}}
        <p  data-aos="fade-left" class="!text-[1.25rem] md:text-2xl mb-8 !text-white leading-relaxed font-sans">
          {!! wp_kses_post($description) !!}
        </p>
      </div>

      {{-- Imagem --}}

    </div>
  </div>
</section>

<style>
.elegant-letter {
  display: inline-block;
  opacity: 0;
  transform: translateY(30px);
  animation: elegantFadeIn 0.8s ease-out forwards;
}

@keyframes elegantFadeIn {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Efeito elegante de texto - removendo gradiente para manter cores originais */
.elegant-text {
  text-shadow: 
    0 2px 4px rgba(0,0,0,0.15),
    0 0 15px rgba(255,255,255,0.08);
  letter-spacing: 0.02em;
}

/* Espaços entre palavras */
.word-space {
  display: inline-block;
  width: 0.3em;
}

/* Removendo efeito de gradiente para manter cores naturais */
.title-natural {
  color: inherit;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const titleText = {!! json_encode(strip_tags($title)) !!};
  const container = document.getElementById('animated-title');
  
  if (!container || !titleText) return;
  
  // Limpar container
  container.innerHTML = '';
  container.className = 'inline-block title-natural';
  
  // Dividir texto em palavras
  const words = titleText.split(' ');
  let letterIndex = 0;
  
  words.forEach((word, wordIndex) => {
    // Criar span para cada palavra
    const wordSpan = document.createElement('span');
    wordSpan.className = 'inline-block';
    
    // Adicionar cada letra da palavra
    [...word].forEach((char, charIndex) => {
      const letterSpan = document.createElement('span');
      letterSpan.textContent = char;
      letterSpan.className = 'elegant-letter elegant-text';
      letterSpan.style.animationDelay = `${letterIndex * 0.06}s`;
      
      wordSpan.appendChild(letterSpan);
      letterIndex++;
    });
    
    container.appendChild(wordSpan);
    
    // Adicionar espaço entre palavras (exceto na última)
    if (wordIndex < words.length - 1) {
      const spaceSpan = document.createElement('span');
      spaceSpan.className = 'word-space';
      container.appendChild(spaceSpan);
    }
  });
});
</script>
