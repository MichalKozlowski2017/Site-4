<header class="page-header">
	<div class="page-header__search">
		<p>71 799 70 08 | 801 700 307</p>
		@include  ('partials/searchform')
	</div>
	@include('partials/mobile-nav') <div class="page-header__wrapper">
		<div class="page-header__wrapper__logo">
			@if(!is_front_page()) 
			<a href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?> - <?php bloginfo('description') ?>">
				<?php the_custom_logo() ?>
			</a>
			@else 
			<span>
          <?php the_custom_logo() ?>
      </span>
			@endif 
		</div>


		<nav class="nav-primary">
			@if  (has_nav_menu('primary_navigation')) {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
			@endif 
		</nav>

		{{-- Mobile nav button --}}
		<button class="hamburger hamburger--3dx" type="button">
      <span class="hamburger-box">
        <span class="hamburger-inner"></span>
      </span>
    </button>




		</div>

</header>