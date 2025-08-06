<header class="fixed top-0 left-0 right-0 z-50 bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 text-white shadow-xl" id="main-header">
  <div class="container mx-auto px-6">
    <div class="flex justify-between items-center h-16 lg:h-20">
      
      {{-- Logo --}}
      <div class="flex-shrink-0">
        <a href="{{ home_url('/') }}" class="flex items-center space-x-3 group">
          @if(has_custom_logo())
            <div class="transform group-hover:scale-105 transition-transform duration-300">
              {!! get_custom_logo() !!}
            </div>
          @else
            <div class="flex items-center space-x-3">
              <div class="w-10 h-10 bg-gradient-to-br from-teal-400 to-cyan-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                <span class="text-white font-bold text-lg">⚗️</span>
              </div>
              <span class="text-xl font-bold text-white group-hover:text-teal-400 transition-colors duration-300">
                {{ get_bloginfo('name') }}
              </span>
            </div>
          @endif
        </a>
      </div>

      {{-- Desktop Navigation --}}
      @if (has_nav_menu('primary_navigation'))
        <nav class="hidden lg:flex nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation', 
            'menu_class' => 'desktop-nav-menu',
            'container' => false,
            'echo' => false
          ]) !!}
        </nav>
      @endif

      {{-- Mobile Menu Button --}}
      <button 
        class="lg:hidden relative z-50 w-10 h-10 flex flex-col justify-center items-center group"
        id="mobile-menu-button"
        aria-label="Toggle mobile menu"
        aria-expanded="false"
      >
        <div class="hamburger-lines">
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
          <span class="hamburger-line"></span>
        </div>
      </button>
    </div>
  </div>

  {{-- Mobile Navigation Overlay --}}
  @if (has_nav_menu('primary_navigation'))
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
      {{-- Background --}}
      <div class="mobile-backdrop" id="mobile-backdrop"></div>
      
      {{-- Mobile Menu Panel --}}
      <div class="mobile-menu-panel">
        
        {{-- Mobile Menu Header --}}
        <div class="flex items-center justify-between p-6 border-b border-slate-700">
          <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-gradient-to-br rounded-lg flex items-center justify-center">
              <span class="text-white font-bold text-sm">      {!! get_custom_logo() !!}</span>
            </div>
            <span class="text-lg font-semibold text-white">Menu</span>
          </div>
        </div>

        {{-- Mobile Menu Content --}}
        <nav class="p-6" aria-label="Mobile navigation">
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'mobile-nav-menu',
            'container' => false,
            'echo' => false
          ]) !!}
          
          {{-- Mobile Menu Footer --}}
          <div class="mt-12 pt-8 border-t border-slate-700">
            <div class="flex items-center space-x-4">
              <div class="w-12 h-12 bg-gradient-to-br rounded-full flex items-center justify-center">
                <span class="text-white font-bold text-lg">      {!! get_custom_logo() !!}</span>
              </div>
              <div>
                <div class="text-sm font-semibold text-white">{{ get_bloginfo('name') }}</div>
                <div class="text-xs text-slate-400">Manual de Química</div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  @endif
</header>