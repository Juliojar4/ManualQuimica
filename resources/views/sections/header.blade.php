<header class=" bg-blue-300 py-5 banner">
  <div class="container flex justify-between items-center mx-auto">
    {!! get_custom_logo() !!}
    
    @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      </nav>
    @endif
  </div>
</header>
