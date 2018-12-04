@php
  $title = get_field('title');
  $logo = get_field('logo');
@endphp
@if ($title)
  <div class="form-box__title">
    <h3>{{$title}}</h3>
  </div>
@endif
@if ($logo)
  <div class="form-box__logo">
    <img src="{{$logo['sizes']['logo_form']}}" alt="{{$title}}">
  </div>
@endif
{{--
<form class="form-box form-box--calc" action="form1" method="post">

  <div class="form-box__upper">
    <input type="text" name="name" value="" placeholder="imię i nazwisko">
    <p>oraz</p>
    <input type="number" name="" value="" placeholder="numer telefonu">
  </div>
  <div class="form-box__bottom">
    <div class="form-box__bottom__checkbox-wrapper">
      <input type="checkbox" id="checkbox1" name="checkbox1" value="checkbox1" class="checkbox-1">
      <label for="checkbox1">Wyrażam zgodę na przetwarzanie przez --nazwa-firmy-- Polska S.A. z siedzibą w Warszawie (00-876), ul. Ogrodowa 58 moich danych osobowych w zakresie: imię, nazwisko, numer telefonu komórkowego i/lub stacjonarnego w celu skontaktowania się ze mną, na moją prośbę. Administratorem danych osobowych jest --nazwa-firmy-- Polska S.A z siedzibą w Warszawie, przy ul. Ogrodowej 58, który będzie je zbierał i przetwarzał w celach marketingowych i handlowych, zgodnie z treścią udzielonej zgody<span>*</span></label>
    </div>
    <div class="form-box__bottom__checkbox-wrapper">
      <input type="checkbox" id="checkbox2" name="checkbox2" value="checkbox2" class="checkbox-1">
      <label for="checkbox2">Potwierdzam, że przed udzieleniem przeze mnie poniższych zgód został mi doręczony dokument informacyjny --nazwa-firmy-- Polska S.A.<span>*</span></label>
    </div>
  </div>
  <div class="form-box__submit">
    <button type="submit" form="form1" value="Submit" class="btn btn--green">
      Skorzystaj
    </button>
  </div>
</form> --}}
{!! do_shortcode('[gravityform id=1 title=false description=false ajax=true tabindex=49]') !!}
