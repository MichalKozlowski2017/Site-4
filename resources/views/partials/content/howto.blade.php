@php
  $title = get_sub_field('title');
  $points = get_sub_field('points');
  $cta_text = get_sub_field('cta_text');
  $cta_link = get_sub_field('cta_link');
@endphp

<section class="content-section howto">
  <div class="content-section__title">
    <h2>{{$title}}</h2>
  </div>
  <div class="howto__wrapper">
    @foreach ($points as $index => $point)
      <div class="howto__wrapper__point">
        <div class="howto__wrapper__point__icon">
          <img src="{{$point['icon']['sizes']['benefit_icons']}}" alt="{{$title}}">
        </div>
        <div class="howto__wrapper__point__text">
          {!!$point['text']!!}
        </div>
      </div>
      <div class="arrow-stroke">&nbsp;</div>
    @endforeach
  </div>
  <div class="howto__cta">
    <a href="{{$cta_link}}"><button class="btn btn--green">{{$cta_text}}</button></a>
  </div>
</section>
