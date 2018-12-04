@php
  $text = get_sub_field('text');
  $points = get_sub_field('points');
@endphp
<section class="content-section list">
  <div class="list__text">
    {{{$text}}}
  </div>
  <div class="list__wrapper">
    <ul>
      @foreach ($points as $index => $point)
        <li>
          <h3>{{$point['title']}}</h3>
          <p>{{$point['text']}}</p>
        </li>
      @endforeach
    </ul>
  </div>
</section>
