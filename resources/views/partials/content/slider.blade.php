@php
  $background_image = get_sub_field('background_image');
  $slides = get_sub_field('slides');
@endphp

<section class="content-section slider" style="background-image: url('{{$background_image}}');">
  <div class="slider__wrapper">
    @foreach ($slides as $index => $slide)
      @php
        $title = $slide['title'];
        $text = $slide['text'];
        $image = $slide['image'];
        $author = $slide['author'];
        $cta_text = $slide['cta_text'];
        $cta_link = $slide['cta_link'];
      @endphp
      <div class="slider__wrapper__slide" style="background-image: url('{{$image}}');">
        <div class="slider__wrapper__content">
          <h2>{{$title}}</h2>
          <p>{{$text}}</p>
          <span>{{$author}}</span>
          <a href="{{$cta_link}}">
            <button class="btn btn--white">{{$cta_text}}</button>
          </a>
        </div>
      </div>
    @endforeach

  </div>
</section>
