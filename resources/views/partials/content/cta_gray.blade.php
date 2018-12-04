@php
  $title = get_sub_field('title');
  $image = get_sub_field('image');
  $text = get_sub_field('text');
  $link_text = get_sub_field('link_text');
  $link_url = get_sub_field('link_url');
@endphp

<section class="content-section cta-gray">
  <div class="cta-gray__wrapper">
    <div class="cta-gray__wrapper__left" style="background-image: url('{{$image['sizes']['cta_gray']}}')">
      <h2>{{$title}}</h2>
      <div class="cta-gray__wrapper__left__line"></div>
    </div>
    <div class="cta-gray__wrapper__right">
      <p>{{{$text}}}</p>
      <a href="{{$link_url}}"><button class="btn btn--transparent-green">
        {{$link_text}}
      </button></a>
    </div>
  </div>
</section>
