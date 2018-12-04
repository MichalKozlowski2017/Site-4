@php
  $filter = get_sub_field('filtr');
@endphp
<section class="content-section map" id="mapSection">
  <div class="content-section__title">
    <h2>Znajdź placówkę</h2>
  </div>
  <div class="map__wrapper">
    @if ($filter)
      @php
        echo do_shortcode('[wpsl category_selection="'.$filter.'"]');
      @endphp
    @else
      {!! do_shortcode('[wpsl]') !!}
    @endif
  </div>
</section>
