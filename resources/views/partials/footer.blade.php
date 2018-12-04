@php
  $footer_links = get_field('footer_links', 'option');
  $footer_copy = get_field('footer_copy', 'option');
@endphp

<section class="content-section footer-above">
  @if($footer_links && !is_page(26))
    <div class="footer-above__links">
      @foreach ($footer_links as $index => $link)
        <div class="footer-above__links__link">
          <h3>{{$link['title']}}</h3>
          <p>{{$link['text']}}</p>
          <a href="{{$link['button_link_url']}}">
            <button class="btn btn--transparent-green">{{$link['btn_text']}}</button>
          </a>
        </div>
      @endforeach
    </div>
  @endif
  @if($footer_copy)
    <div class="footer-above__separator"></div>
    <div class="footer-above__copy">
      {!!$footer_copy!!}
    </div>
  @endif
</section>
<footer>
  @php wp_nav_menu( array('theme_location' => 'footer-menu-1' ) )
  @endphp
  @php wp_nav_menu( array('theme_location' => 'footer-menu-2' ) )
  @endphp
  @php wp_nav_menu( array('theme_location' => 'footer-menu-3' ) )
  @endphp
  @php wp_nav_menu( array('theme_location' => 'footer-menu-4' ) )
  @endphp
</footer>
@include('partials/popup-contact-info')
{{-- @include('partials/popup-nota') --}}

{{-- {!! do_shortcode('[karty_menu]') !!} --}}
