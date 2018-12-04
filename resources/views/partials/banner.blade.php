@php
$banner_image = get_field('banner_image');
$banner_image_mobile = get_field('banner_image_mobile');
$banner_box_content = get_field('banner_box_content');
$banner_title = get_field('banner_title');
$banner_text = get_field('banner_text');
$page_title = get_field('page_title');
@endphp
<style media="screen">
.banner {
  background-image: url('{{$banner_image_mobile['sizes']['banner_image_mobile']}}');

}
@media only screen and (min-width: 768px){
  .banner {
    background-image: url('{{$banner_image}}');
  }
}

</style>
<section class="banner">
  @if ($page_title)
    <div class="banner__page-title">
      {!!$page_title!!}
    </div>
  @endif
  @if ($banner_title || $banner_text)
    <div class="banner__copy">
      <div class="banner__copy__wrapper">
        @if ($banner_title)
          <h2>{{$banner_title}}</h2>
        @endif
        @if ($banner_text)
          <p>{!!$banner_text!!}</p>
        @endif
      </div>
    </div>
  @endif

  @if ($banner_box_content)
    <div class="banner__box">
      @switch($banner_box_content)
      @case('calc')
        @include('partials/calc')
        @break

      @case('form_lead')
        @include('partials/form-box-lead')
        @break

      @case('form_msg')
        @include('partials/form-box-msg')
        @break

      @default
          <span>Something went wrong, please try again</span>
  @endswitch
  	</div>
  @endif

</section>
