@php
  $title = get_sub_field('title');
  $points = get_sub_field('points');
  $cta_text = get_sub_field('cta_text');
  $cta_link = get_sub_field('cta_link');
  $footer_text = get_sub_field('footer_text');
  $footer_links = get_sub_field('footer_links');
@endphp

<section class="content-section promo">
  <div class="promo__wrapper">
    <div class="content-section__title">
      <h2>{{$title}}</h2>
    </div>
    @if($points)
      <div class="promo__wrapper__points">
        <ul>
          @foreach ($points as $index => $point)
            <li>{{$point['text']}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if($cta_link && $cta_text)
      <div class="promo__wrapper__cta">
        <a href="{{$cta_link}}">
          <button type="button" name="button" class="btn btn--green">{{$cta_text}}</button>
        </a>
      </div>
    @endif
    @if($footer_text || $footer_links)
      <div class="promo__wrapper__footer">
        @if($footer_text)
        <div class="promo__wrapper__footer__text">
          <p>{{$footer_text}}</p>
        </div>
        @endif
        @if($footer_links)
          <div class="promo__wrapper__footer__links">
            @php($i = 1)
            @foreach ($footer_links as $index => $link)
              @if ($link['is_popup'] === 'nie')
                <a href="{{$link['link_url']}}" target="_blank">{{$link['link_text']}}</a>
              @else
                <a href="#" class="popup-btn" id="popupBtn_{{$i}}" target="_blank">{{$link['link_text']}}</a>
                <div class="popup" id="popup_{{$i}}">
                  <div class="popup__wrapper">
                    <div class="popup__wrapper__close"></div>
                    <div class="popup__wrapper__text">
                      {!!$link['popup_text']!!}
                    </div>
                  </div>
                </div>
              @endif
              @php($i++)
            @endforeach
          </div>
        @endif
      </div>
    @endif
  </div>

</section>
