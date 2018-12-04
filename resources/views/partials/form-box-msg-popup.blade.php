@php
  $title = get_field('title');
  $logo = get_field('logo');
@endphp

  @if ($title)
    <div class="form-box__title">
      <h3>{{$title}}</h3>
    </div>
  @endif
  @if ($logo)
    <div class="form-box__logo">
      <img src="{{$logo['sizes']['logo_form']}}" alt="{{$title}}">
    </div>
  @endif
  {!! do_shortcode('[gravityform id=3 title=false description=false ajax=true tabindex=49]') !!}
