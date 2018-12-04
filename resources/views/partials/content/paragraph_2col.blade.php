@php
  $title_left = get_sub_field('title_left');
  $title_right = get_sub_field('title_right');
  $text_left = get_sub_field('text_left');
  $text_right = get_sub_field('text_right');
@endphp

<section class="content-section downloads-dropdown-2col">
  <div class="content-left">
    <div class="content-section__title">
      <h2>{!!$title_left!!}</h2>
    </div>
    <div class="content-section__paragraph">
      {!!$text_left!!}
    </div>
  </div>
  <div class="content-right">
    <div class="content-section__title">
      <h2>{!!$title_right!!}</h2>
    </div>
    <div class="content-section__paragraph">
      {!!$text_right!!}
    </div>
  </div>
  <div class="clearfix"></div>
</section>