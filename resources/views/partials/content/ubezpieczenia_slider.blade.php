@php
  $slides = get_sub_field('slides');
  $ubezpieczenia_kolor = get_field('ubezpieczenia_kolor');
@endphp
<section class="content-section ubezpieczenia-slider">
  <div class="ubezpieczenia-slider__wrapper">
    @foreach ($slides as $index => $slide)
      @php
        $icon = $slide['icon']['sizes']['ubezpieczenia_slider'];
        $title = $slide['title'];
        $text = $slide['text'];
        $cta_text = $slide['cta_text'];
        $cta_link = $slide['cta_link'];
      @endphp
      <div class="ubezpieczenia-slider__wrapper__slide">
        <div class="ubezpieczenia-slider__wrapper__slide__icon" style="background-image: url('{{$icon}}')"></div>
        <h3 style="color: {{$ubezpieczenia_kolor}} !important;">{{$title}}</h3>
        <p>{!!$text!!}</p>
        <div class="ubezpieczenia-slider__wrapper__slide__cta">
          <a href="#ubezpieczenia-slider-flexible-content" class="ubezpieczenia-slider-cta"><button class="btn btn--green">{{$cta_text}}</button></a>
        </div>

      </div>
    @endforeach
  </div>
</section>

@php 
  $count_partners = 0;
@endphp

@foreach ($slides as $index => $slide)
@php 
  $count_partners++;
@endphp
<section class="content-section ubezpieczenia-partners ubezpieczenia-partners-{{$count_partners}}" data-id="{{$count_partners}}">
  <div class="content-section__title">
    <h2>Ubezpieczenie oferowane we współpracy z:</h2>
  </div>
  <div class="ubezpieczenia-partners__wrapper">
    @foreach ($slide['partners'] as $partner)
      <div class="ubezpieczenia-partners__wrapper__partner">
        <img src="{{$partner['logo']}}" alt="">
      </div>
    @endforeach
  </div>
</section>
@endforeach



@php 
  $count = 0;
@endphp
<div class="ubezpieczenia-slider-flexible-content">
@foreach ($slides as $index => $slide)
  @php 
    $count++;
  @endphp
  <section class="content-section benefits slider-beneficts slider-beneficts-{{$count}}" data-id="{{$count}}">
    <div class="content-section__title">
      <h2>Korzyści</h2>
    </div>
    <div class="benefits__wrapper">
    @foreach ($slide['benefits'] as $benefit)
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
  </section>
@endforeach
</div>

@php 
  $count_downloads = 0;
@endphp

@foreach ($slides as $index => $slide)
  @php 
    $count_downloads++;
  @endphp
  <section class="content-section downloads slider-downloads slider-downloads-{{$count_downloads}}" data-id="{{$count_downloads}}"">
  @if($slide['files'])
  <div class="downloads__wrapper">
    <div class="content-section__title">
      <h2>Dokumenty do pobrania</h2>
    </div>
    
    @foreach ($slide['files'] as $item)
    
      <div class="downloads__wrapper__download">
        <div class="downloads__wrapper__download__text">
          <p>{!!$item['text']!!}</p>
        </div>
        <div class="downloads__wrapper__download__info">
          <p>{{$item['format']}}</p>
          <p>{{$item['weight']}}</p>
        </div>
        <a href="{{$item['file']}}" target="_blank"><button class="btn btn--green-download">Pobierz</button></a>
      </div>
      
    @endforeach
    </div>
  @endif
  </section>
@endforeach
