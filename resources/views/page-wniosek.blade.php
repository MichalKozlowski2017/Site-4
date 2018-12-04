@php
  $calc_info_text = get_field('calc_info_text', 'option');
  $calc_info_file = get_field('calc_info_file', 'option');
  $banner = get_field('banner_image');
@endphp
@extends('layouts.app')
@section('content')
<section class="banner-short" style="background-image: url('{{$banner}}')">
  <div class="banner-short__title">
    <h2>
      {{$banner_title}}
    </h2>
  </div>
</section>
<section class="content-section wniosek__content">
  <div class="calc-wniosek">
  	<h2>Zanim wypełnisz wniosek, podaj kwotę kredytu oraz ilość rat.</h2>
  	<div class="calc-wniosek__wrapper">
  		<div class="calc-wniosek__wrapper__sliders">
        <div class="slider-container">
          <div class="calc-wniosek__wrapper__sliders__header">
    				<p>Kwota kredytu</p>
    				<input id="slider1-input" type="number" size="6" maxlength="6">
    				<p>zł</p>
    			</div>
          <div class="calc-wniosek__wrapper__sliders__slider">
            <div id="slider1" class="">

            </div>
            <div class="calc-wniosek__wrapper__sliders__slider__plus">
              <p>150 000 zł</p>
            </div>
            <div class="calc-wniosek__wrapper__sliders__slider__minus">
              <p>0</p>
            </div>
          </div>
        </div>
  			<div class="slider-container">
          <div class="calc-wniosek__wrapper__sliders__header">
            <p>Ilość rat </p>
            <input id="slider2-input" type="number" size="2" maxlength="2">
            <p></p>
          </div>
          <div class="calc-wniosek__wrapper__sliders__slider">
            <div id="slider2" class="">

            </div>
            <div class="calc-wniosek__wrapper__sliders__slider__plus">
              <p id="installmentsButton">120 rat</p>
            </div>
            <div class="calc-wniosek__wrapper__sliders__slider__minus">
              <p>0</p>
            </div>
          </div>
        </div>


        <div class="calc-wniosek__wrapper__sum">
    			<h3>Rata miesięczna <span id="calcSum"></span> zł</h3>
    			<p>RRSO <span id="rrso"></span>%</p>
    		</div>
  		</div>

  	</div>
    @if ($calc_info_text && $calc_info_file)
      <div class="calc__doc-info">
        <a href="{{$calc_info_file}}" target="_blank">{{$calc_info_text}}</a>
      </div>
    @endif
  </div>
  <div class="wniosek__content__wrapper">
    <div class="wniosek__content__wrapper__title">
      <h4>Zostaw dane kontaktowe, a nasz konsultant skontaktuje się z Tobą najszybciej, jak to będzie możliwe.</h4>
      <h3>MOJE DANE:</h3>
    </div>
      {!! do_shortcode('[gravityform id=4 title=false description=false ajax=true]') !!}
  </div>
</section>
@endsection
