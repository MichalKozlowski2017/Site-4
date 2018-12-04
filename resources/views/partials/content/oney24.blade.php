@php
  $--nazwa-firmy--24_points = get_field('--nazwa-firmy--24_points');
  $count = 0;
@endphp
<section class="content-section benefits --nazwa-firmy--24">
  <div class="content-section__title">
    <h2>Twoje wydatki pod kontrolą 24h na dobę</h2>
  </div>
  <div class="benefits__wrapper">
    @foreach ($--nazwa-firmy--24_points as $index => $point)
      @php($count++)
      <div class="benefits__wrapper__benefit">
        <div class="benefits__wrapper__benefit__image">
          <img src="{{$point['icon']['sizes']['benefit_icons']}}" alt="{{$benefit['title']}}">
        </div>
        <div class="benefits__wrapper__benefit__header">
          <h3>{!!$point['title']!!}</h3>
        </div>
        <a href="#" data-id="{{$count}}"><button class="btn btn--green popup-btn popup-btn-24">Więcej</button></a>
      </div>

      <div class="popup popup-24" id="popup-24_{{$count}}">
        <div class="popup__wrapper">
          <div class="popup__wrapper__close close-popup"></div>
          <div class="popup__wrapper__text">
            {!!$point['popup_content']!!}
            <div class="popup__wrapper__text__button">
              <a href="#" class="close-popup popup-content-button"><button class="btn btn--green">Zakończ</button></a>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>


