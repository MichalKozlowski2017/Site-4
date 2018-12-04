@php
  $slides = get_sub_field('slides');
@endphp

<section class="slider-simple">
  <div class="slider-simple__wrapper">
    @foreach ($slides as $index => $slide)
      @php
        $title = $slide['title'];
        $image = $slide['image'];
      @endphp
      <div class="slider-simple__wrapper__slide" style="background-image: url('{{$image['sizes']['slider_simple']}}');">
        <div class="content-section">
          <h2>{{$title}}</h2>
        </div>
      </div>
    @endforeach

  </div>
</section>