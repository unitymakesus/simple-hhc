<a href="#content" class="screen-reader-text">Skip to content</a>
<header class="banner" role="banner">
  <nav class="nav-primary" role="navigation">
    <div class="container">
      <a class="logo" href="{{ home_url('/') }}" rel="home">
        @if (has_custom_logo())
          @php
            $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'simple-logo' );
            $logo_2x = wp_get_attachment_image_src( $custom_logo_id, 'simple-logo-2x' );
          @endphp
          <img src="{{ $logo[0] }}"
               srcset="{{ $logo[0] }} 1x, {{ $logo_2x[0] }} 2x"
               alt="{{ get_bloginfo('name', 'display') }}"
               width="{{ $logo[1] }}" height="{{ $logo[2] }}" />
        @else
          {{ get_bloginfo('name', 'display') }}
        @endif
      </a>
    </div>
    <div class="navbar">
      @if (has_nav_menu('primary_navigation'))
        <div class="menu-trigger-wrapper hide-on-large-only">
          <input type="checkbox" name="menu-trigger" id="menu-trigger" value="true" />
          <label for="menu-trigger"><i class="material-icons" aria-label="Show navigation menu">menu</i></a>
        </div>
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'navbar-menu flex flex-center space-between container']) !!}
      @endif
    </div>
  </nav>
</header>
@if ( !is_front_page() && function_exists( 'breadcrumb_trail' ) )
  <div class="breadcrumbs">
    <div class="container">
      @php (breadcrumb_trail())
    </div>
  </div>
@endif
