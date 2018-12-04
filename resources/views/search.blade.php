@php
  $banner = get_field('banner', 'option');
@endphp
@extends('layouts.app')

@section('content')
  @include('partials/page-header')
  <section class="banner-short" style="background-image: url('{{$banner['sizes']['logowanie_banner']}}')">
    <div class="banner-short__title content-section">
        <h2>Wyniki wyszukiwania "{{get_search_query()}}"</h2>
    </div>
  </section>
  <section class="content-section search">
    <div class="search__wrapper">
      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @endif

      @while (have_posts()) @php the_post() @endphp
        <div class="search__wrapper__elem">
          <div class="search__wrapper__elem__title">{{get_the_title()}}</div>
          <p class="search__wrapper__elem__desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic est explicabo perspiciatis tempore voluptatum quidem nulla placeat ducimus, non reprehenderit.</p>
          <a href="{{get_permalink()}}">
            <button class="btn btn--transparent-green">Więcej</button>
          </a>
        </div>
      @endwhile

    </div>

  </section>

@endsection
