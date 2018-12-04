@php
  $title = get_sub_field('title');
  $partners = get_sub_field('logos');
@endphp
<section class="content-section ubezpieczenia-partners">
  <div class="content-section__title">
    <h2>{{$title}}</h2>
  </div>
  <div class="ubezpieczenia-partners__wrapper">
    @foreach ($partners as $index => $partner)
      <div class="ubezpieczenia-partners__wrapper__partner">
        <img src="{{$partner['logo']}}" alt="">
      </div>
    @endforeach
  </div>
</section>
