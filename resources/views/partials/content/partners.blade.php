@php
  $title = get_sub_field('title');
  $partners = get_sub_field('partners');
@endphp
<section class="content-section partners">
  <div class="content-section__title">
    <h2>{{$title}}</h2>
  </div>
  <div class="partners__wrapper">
    @foreach ($partners as $index => $partner)
      <div class="partners__wrapper__item">
        <img src="{{$partner['logo']}}" alt="{{$partner['alt']}}">
      </div>
    @endforeach
  </div>
</section>
