@php
  $ubezpieczenia = get_sub_field('ubezpieczenia');
@endphp
<section class="content-section ubezpieczenia">
  <div class="ubezpieczenia__wrapper">
    @foreach ($ubezpieczenia as $index => $item)
      <div class="ubezpieczenia__wrapper__item {{$item['hover_image'] ? 'ubezpieczenia__wrapper__item--image' : ''}}" style="background-image: url('{{$item['background']['sizes']['ubezpieczenia_bg']}}')">
          @if ($item['hover_image'])
            <div class="ubezpieczenia__wrapper__item__overlay-image" style="background-image: url('{{$item['hover_image']['sizes']['ubezpieczenia_bg']}}')">
              <h3>{!! $item['title'] !!}</h3>
            </div>
          @else
            <div class="ubezpieczenia__wrapper__item__overlay"></div>
          @endif
          
          <div class="ubezpieczenia__wrapper__item__title">
          @if ($item['icon'])
            <div class="ubezpieczenia__wrapper__item__title__icon" style="background-image: url('{{$item['icon']['sizes']['benefit_icons']}}')">
            </div>
          @endif
          <h3>{!! $item['title'] !!}</h3>
        </div>
        
        <div class="ubezpieczenia__wrapper__item__text">
          {{-- @if (is_page(20) || is_page(22))
            <h3>{!! $item['title'] !!}</h3>
          @endif --}}
          <p>{!!$item['text']!!}</p>
        </div>
        @if ($item['cta_link'] && $item['cta_text'])
          <a href="{{$item['cta_link']}}"><button class="btn btn--green">{{$item['cta_text']}}</button></a>
        @endif
      </div>
    @endforeach
  </div>
</section>
