@php
  $title = get_sub_field('title');
  $benefits = get_sub_field('benefits');
  $cta_text = get_sub_field('cta_text');
  $cta_link = get_sub_field('cta_link');
  $ubezpieczenia_kolor = get_field('ubezpieczenia_kolor');

@endphp
<section class="content-section benefits">
  <div class="content-section__title">
    <h2>{{$title}}</h2>
  </div>
  <div class="benefits__wrapper">
    @foreach ($benefits as $index => $benefit)
      <div class="benefits__wrapper__benefit">
        <div class="benefits__wrapper__benefit__image">
          <img src="{{$benefit['icon']['sizes']['benefit_icons']}}" alt="{{$benefit['header']}}">
        </div>
        <div class="benefits__wrapper__benefit__header">
          @if ($ubezpieczenia_kolor)
            <h3 style="color: {{$ubezpieczenia_kolor}} !important;">{{$benefit['header']}}</h3>
          @else
            <h3>{{$benefit['header']}}</h3>
          @endif
        </div>
        <div class="benefits__wrapper__benefit__text">
          <p>{{$benefit['text']}}</p>
        </div>
      </div>
    @endforeach
  </div>
  @if($cta_text && $cta_link)
  <div class="benefits__btn">
    <a href="{{$cta_link}}"><button class="btn btn--green">{{$cta_text}}</button></a>
  </div>
  @endif
</section>
