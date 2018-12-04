@php
  $title = get_sub_field('title');
  $files = get_sub_field('files');
@endphp
@if ($title)
<section class="content-section downloads-dropdown">
<div class="downloads-dropdown__wrapper">
  <div class="downloads-dropdown__wrapper__button">
    <div class="downloads-dropdown__wrapper__button__clickoverlay"></div>
    <div class="btn btn--dropdown">
      <a href="#" class="first-link-dropdown">{{$title}}</a>
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
</section>
@endif
