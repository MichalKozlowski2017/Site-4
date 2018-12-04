<nav class="mobile-nav">
	@if (has_nav_menu('primary_navigation')) {!! wp_nav_menu(['theme_location' => 'mobile_navigation', 'menu_class' => 'mobile-navigation']) !!}

	@endif
</nav>