@php
  $title = get_sub_field('title');
  $text = get_sub_field('text');
  $id = get_sub_field('id');
@endphp
<section class="content-section paragraph" @if($id) id="{{$id}}" @endif>
  <div class="content-section__title">
    <h2>{{$title}}</h2>
  </div>
  <div class="content-section__paragraph">
    {!!$text!!}
  </div>
</section>