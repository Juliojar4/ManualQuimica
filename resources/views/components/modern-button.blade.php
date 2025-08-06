{{--
  Botão Moderno com Animação Química
  
  Props:
  - $text: Texto do botão (string)
  - $url: URL do link (string, opcional - se não fornecido, será um button)
  - $type: Tipo do button quando não é link - 'button', 'submit' (string, opcional)
  - $variant: Variação do botão - 'primary', 'secondary', 'outline' (string, opcional)
  - $size: Tamanho do botão - 'sm', 'md', 'lg' (string, opcional)
  - $class: Classes CSS adicionais (string, opcional)
  - $fullWidth: Se o botão deve ocupar largura total (boolean, opcional)
  - $showIcon: Se deve mostrar ícone (boolean, opcional)
  - $bubbles: Se deve mostrar animação de bolhas (boolean, opcional)
--}}

@php
  // Definir variações do botão
  $variants = [
    'primary' => 'bg-gradient-to-r from-teal-500 to-cyan-600 hover:from-teal-600 hover:to-cyan-700 text-white',
    'secondary' => 'bg-gradient-to-r from-slate-600 to-slate-700 hover:from-slate-700 hover:to-slate-800 text-white',
    'outline' => 'border-2 border-teal-500 text-teal-500 hover:bg-teal-500 hover:text-white bg-transparent',
    'cta' => 'bg-green-600 hover:bg-green-700 text-white'
  ];
  
  // Definir tamanhos
  $sizes = [
    'sm' => 'py-2 px-6 text-sm',
    'md' => 'py-2.5 px-8 text-base',
    'lg' => 'py-3 px-10 text-lg'
  ];
  
  // Valores padrão
  $variant = $variant ?? 'primary';
  $size = $size ?? 'md';
  $text = $text ?? 'Clique aqui';
  $type = $type ?? 'button';
  $class = $class ?? '';
  $fullWidth = $fullWidth ?? false;
  $showIcon = $showIcon ?? true;
  $bubbles = $bubbles ?? ($variant === 'primary');
  
  // Montar classes
  $buttonClasses = sprintf(
    'relative inline-flex items-center gap-3 %s %s %s font-semibold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 ease-out group overflow-hidden %s',
    $variants[$variant] ?? $variants['primary'],
    $sizes[$size] ?? $sizes['md'],
    $fullWidth ? 'w-full justify-center' : '',
    $class
  );
  
  // Se for botão do footer, adicionar transform
  if (str_contains($class, 'hover:scale-105')) {
    $buttonClasses .= ' transform';
  }
@endphp

@if(isset($url) && $url)
  {{-- Link Button --}}
  <a href="{{ $url }}" class="{{ $buttonClasses }}">
    @php $buttonContent = true; @endphp
    @include('components.button-inner-content')
  </a>
@else
  {{-- Form Button --}}
  <button type="{{ $type }}" class="{{ $buttonClasses }}">
    @php $buttonContent = true; @endphp
    @include('components.button-inner-content')
  </button>
@endif
