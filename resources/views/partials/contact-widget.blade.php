@php
  $icons = get_field('links', 'option');
@endphp
<aside class="contact-widget">
  <div class="contact-widget__wrapper">
    @foreach ($icons as $index => $icon)
      <a href="{{$icon['url']}}" style="background-image: url(@php get_template_directory();@endphp{{$icon['icon']}}.svg);"></a>
    @endforeach
  </div>
</aside>
