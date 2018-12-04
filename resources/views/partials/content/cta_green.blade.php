@php
  $title = get_sub_field('title');
  $text = get_sub_field('text');
  $image = get_sub_field('image');
  $cta_text = get_sub_field('cta_text');
  $cta_link = get_sub_field('cta_link');
@endphp

<section class="content-section cta-green" style="background-image: url('{{$image['sizes']['green_cta']}}')">
  <div class="cta-green__wrapper">
    <h2>{{$title}}</h2>
    <p>{!!$text!!}</p>
    <a href="{{$cta_link}}"><button class="btn btn--white">{{$cta_text}}</button></a>
  </div>

</section>
