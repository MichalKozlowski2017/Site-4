@extends('layouts.app')
@section('content')
@php
  $banner = get_field('banner');
  $banner_title = get_field('banner_title');
  $karty = get_field('karty');
  $image_big = get_field('image_big');
  $left_title = get_field('left_title');
  $boxes = get_field('boxes');
@endphp
<section class="banner-short" style="background-image: url('{{$banner['sizes']['logowanie_banner']}}')">
  <div class="banner-short__title">
    <h2>
      {{$banner_title}}
    </h2>
  </div>
</section>
<section class="content-section logowanie__content">
  <div class="logowanie__content__wrapper">
    <div class="logowanie__content__wrapper__above">
      @foreach ($karty as $index => $karta)
        <div class="logowanie__content__wrapper__card">
          <div class="logowanie__content__wrapper__card__title">{!!$karta['title']!!}</div>
          <div class="logowanie__content__wrapper__card__text">{!!$karta['text']!!}</div>
          <div class="logowanie__content__wrapper__card__image">
            <img src="{{$karta['image']['sizes']['logowanie_card']}}" alt="{!!$karta['title']!!}">
          </div>
          <div class="logowanie__content__wrapper__card__cta">
            <a href="{{$karta['cta_link']}}"><button class="btn btn--green">{{$karta['cta_text']}}</button></a>
            <a href="#" class="--nazwa-firmy--24Link"><button class="btn btn--transparent-white">{{$karta['cta_text_2']}}</button></a>
          </div>
        </div>
      @endforeach
    </div>
    <div class="logowanie__content__wrapper__below">
      <div class="logowanie__content__wrapper__below__left" style="background-image: url({{$image_big['sizes']['logoweanie_image_big']}});">
        <div class="logowanie__content__wrapper__below__left__title">
          {!!$left_title!!}
        </div>
      </div>
      <div class="logowanie__content__wrapper__below__right">
        @foreach ($boxes as $index => $box)
          <div class="logowanie__content__wrapper__box">
            <div class="logowanie__content__wrapper__box__title">
              {!!$box['title']!!}
            </div>
            <div class="logowanie__content__wrapper__box__text">
              {!!$box['text']!!}
            </div>
            <div class="logowanie__content__wrapper__box__cta">
              <a href="{{$box['cta_link']}}"><button class="btn btn--green">{{$box['cta_text']}}</button></a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
@include('partials/content')
@endsection
