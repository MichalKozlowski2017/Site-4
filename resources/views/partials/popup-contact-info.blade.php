@php
  $form_title = get_field('form_title', 'option');
  $popup_right_content = get_field('popup_right_content', 'option');
@endphp
@extends('layouts.popup')
@section('popup-content')
  <div class="popup-contact-info">
    <div class="popup-contact-info__left">
      @if ($form_title)
        <div class="popup-contact-info__left__title">
          <h3>{{$form_title}}</h3>
        </div>
      @endif
      @include('partials/form-box-msg-popup')
    </div>
    <div class="popup-contact-info__divider"></div>
    <div class="popup-contact-info__right">
      {!!$popup_right_content!!}
    </div>
  </div>
@endsection
