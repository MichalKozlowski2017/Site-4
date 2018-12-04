@php
  $title = get_sub_field('title');
  $files = get_sub_field('files');
@endphp

<section class="content-section downloads">
<div class="content-section__title">
  <h2>{{$title}}</h2>
</div>
<div class="downloads__wrapper">
  @foreach ($files as $index => $item)
    <div class="downloads__wrapper__download">
      <div class="downloads__wrapper__download__text">
        <p>{{$item['text']}}</p>
      </div>
      <div class="downloads__wrapper__download__info">
        <p>{{$item['format']}}</p>
        <p>{{$item['weight']}}</p>
      </div>
      <a href="{{$item['file']}}" target="_blank"><button class="btn btn--green-download">Pobierz</button></a>
    </div>
  @endforeach
</div>
</section>
