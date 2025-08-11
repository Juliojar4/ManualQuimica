document.addEventListener('DOMContentLoaded', function() {
  const container = document.getElementById('animated-title');
  if (!container) return;
  
  // Obter o título do data-title do container ou de outro elemento
  let titleText = container.getAttribute('data-title');
  
  // Se não encontrar no data-title, tentar obter de outro lugar
  if (!titleText) {
    // Procurar por um elemento com o título
    const titleElement = container.closest('section').querySelector('[data-hero-title]');
    if (titleElement) {
      titleText = titleElement.getAttribute('data-hero-title');
    }
  }
  
  // Fallback: usar um título padrão se nada for encontrado
  if (!titleText) {
    titleText = 'Hero Title';
  }
  
   
 
  
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