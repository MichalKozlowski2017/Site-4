@php
  $calc_info_text = get_field('calc_info_text', 'option');
  $calc_info_file = get_field('calc_info_file', 'option');
@endphp
<div class="calc">
	<h2>Oblicz ratę kredytu</h2>
	<div class="calc__wrapper">
		<div class="calc__wrapper__sliders">
			<div class="calc__wrapper__sliders__header">
				<p>Kwota kredytu</p>
				<input id="slider1-input" type="number" size="6" maxlength="6">
				<p>zł</p>
			</div>
      <div class="calc__wrapper__sliders__slider">
        <div id="slider1" class="">

        </div>
        <div class="calc__wrapper__sliders__slider__plus">
          <p>150 000 zł</p>
        </div>
        <div class="calc__wrapper__sliders__slider__minus">
          <p>0</p>
        </div>
      </div>

			<div class="calc__wrapper__sliders__header">
				<p>Ilość rat </p>
				<input id="slider2-input" type="number" size="2" maxlength="2">
				<p></p>
			</div>
      <div class="calc__wrapper__sliders__slider">
        <div id="slider2" class="">

  			</div>
        <div class="calc__wrapper__sliders__slider__plus">
          <p id="installmentsButton">120 rat</p>
        </div>
        <div class="calc__wrapper__sliders__slider__minus">
          <p>0</p>
        </div>
      </div>

		</div>
		<div class="calc__wrapper__sum">
			<h3>Rata miesięczna</h3>
			<div>
				<p id="calcSum">504</p>
				<p>zł</p>
			</div>
			<p>RRSO <span id="rrso">42,58</span>%</p>
		</div>
	</div>

@if (!is_page('wniosek'))
  <div class="calc__form-wrapper">
    <h3>Zostaw nam swój kontakt. Odezwiemy się!</h3>

  </div>
</div>
  @include('partials/form-box-calc')
@endif
@if ($calc_info_text && $calc_info_file)
  <div class="calc__doc-info">
    <a href="{{$calc_info_file}}" target="_blank">{{$calc_info_text}}</a>
  </div>
@endif

</div>
