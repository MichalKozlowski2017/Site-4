@php
  $title_left = get_sub_field('title_left');
  $title_right = get_sub_field('title_right');
  $text_left = get_sub_field('text_left');
  $files = get_sub_field('files');
@endphp

<section class="content-section downloads-dropdown-2col">
  <div class="content-left">
    <div class="content-section__title">
      <h2>{{$title_left}}</h2>
    </div>
    <div class="content-section__paragraph">
      {!!$text_left!!}
    </div>
  </div>
  <div class="content-right">
    <div class="content-section__title">
      <h2>{{$title_right}}</h2>
    </div>
    <div class="downloads-dropdown__wrapper">
      <div class="downloads-dropdown__wrapper__button">
        <div class="downloads-dropdown__wrapper__button__clickoverlay"></div>
        <div class="btn btn--dropdown">
          <a href="#" class="first-link-dropdown">--nazwa-firmy-- Polska S.A.</a>
          <div class="downloads-dropdown__wrapper__button__list">
            @foreach ($files as $index => $item)
              <a href="{{$item['file']}}" target="_blank">{{$item['text']}}</a>
            @endforeach
          </div>

        </div>
      </div>
      <div class="downloads-dropdown__wrapper__list">

      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</section>