{{-- check if the flexible content field has rows of data --}}
@if (is_page(8) || is_page(69))
  <div>
    &nbsp;
  </div>
@else
  <div class="breadcrumbs">{{ App\get_breadcrumb() }}</div>
@endif

@if( have_rows('content') )

     {{-- loop through the rows of data --}}
    @while (have_rows('content')) @php(the_row())

        @if( get_row_layout() == 'partners' )

        	@include('partials/content/partners')

        @elseif( get_row_layout() == 'cta_gray' )

        	@include('partials/content/cta_gray')

        @elseif( get_row_layout() == 'cta_green' )

        	@include('partials/content/cta_green')

        @elseif( get_row_layout() == 'slider' )

        	@include('partials/content/slider')

        @elseif( get_row_layout() == 'slider_simple' )

        	@include('partials/content/slider_simple')

        @elseif( get_row_layout() == 'benefits' )

        	@include('partials/content/benefits')

        @elseif( get_row_layout() == 'promo' )

        	@include('partials/content/promo')

        @elseif( get_row_layout() == 'howto' )

        	@include('partials/content/howto')

        @elseif( get_row_layout() == 'map' )

        	@include('partials/content/map')

        @elseif( get_row_layout() == 'ubezpieczenia' )

        	@include('partials/content/ubezpieczenia')

        @elseif( get_row_layout() == 'ubezpieczenia_slider' )

        	@include('partials/content/ubezpieczenia_slider')

        @elseif( get_row_layout() == 'ubezpieczenie_partners' )

          @include('partials/content/ubezpieczenia_partners')

        @elseif( get_row_layout() == 'downloads' )

          @include('partials/content/downloads')

        @elseif( get_row_layout() == 'downloads_dropdown' )

          @include('partials/content/downloads_dropdown')

        @elseif( get_row_layout() == 'downloads_dropdown_2col' )

          @include('partials/content/downloads_dropdown_2col')

        @elseif( get_row_layout() == 'list' )

          @include('partials/content/list')
        
        @elseif( get_row_layout() == 'paragraph' )

          @include('partials/content/paragraph')

        @elseif( get_row_layout() == 'paragraph_2col' )

          @include('partials/content/paragraph_2col')

        @elseif( get_row_layout() == '--nazwa-firmy--24' )

          @include('partials/content/--nazwa-firmy--24')

        @endif

    @endwhile

@else

    {{-- no layouts found --}}

@endif
