{{-- Conteúdo interno do botão --}}

{{-- Animação de bolhas (apenas quando habilitada) --}}
@if($bubbles)
<div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
  <div class="bubble bubble-1"></div>
  <div class="bubble bubble-2"></div>
  <div class="bubble bubble-3"></div>
  <div class="bubble bubble-4"></div>
  <div class="bubble bubble-5"></div>
</div>
@endif

{{-- Conteúdo do botão --}}
<div class="relative z-10 flex items-center gap-3">
  @if($variant === 'cta')
    {{-- Ícone de carrinho para CTA de compra --}}
    <svg class="w-6 h-6 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5H19M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6"></path>
    </svg>
  @endif
  
  <span>{{ $text }}</span>
  
  @if($showIcon)
    @if($variant === 'cta')
      {{-- Seta para CTA --}}
      <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
      </svg>
    @elseif($variant === 'outline')
      {{-- Ícone para botão outline --}}
      <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
      </svg>
    @else
      {{-- Ícone para botões preenchidos --}}
      <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
      </svg>
    @endif
  @endif
</div>
