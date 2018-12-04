import 'slick-carousel'
export default {
	init() {
    //unclickable menu item

		// Collapse menu when scroll

		function headerScroll() {
			var scrollTop = $(window).scrollTop();
			if (scrollTop >= 20) {
				$('.page-header').addClass("scrolled");
			} else {
				$('.page-header').removeClass("scrolled");
			}
      if (scrollTop >= 0 && $(window).width() > 575 ) {
        $(".contact-widget").css('top', scrollTop + 300);
			} else {
        $(".contact-widget").css('top', '300');
			}
		}
		$(document).scroll(function() {
			headerScroll();
		});
    $(document).resize(function() {
			headerScroll();
		});
		headerScroll();

		$(document).ready(function() {


      // textarea height
      $('.ginput_container_textarea > textarea').attr('rows', '1');
      $('.ginput_container_textarea > textarea').css('height', 'auto');
      setTimeout(function(){
        $('.ginput_container_textarea > textarea').css('overflow-y', 'visible');
      },2000);

      // $('.unclickable a').prop('disabled', true);


			// Submenus

			$('.nav-primary li.menu-item-has-children').on('mouseenter', function() {
				$(this).addClass('active');
			})

			$('.nav-primary .menu-item-has-children').on('mouseleave', function() {
				$(this).removeClass('active');
			})

			// Mobile button

			$('.hamburger').on('click', function() {
				$(this).toggleClass('is-active');
				$('.mobile-nav').toggleClass('mobile-nav--active');
				$('html, body').toggleClass('overflow-hidden');
			});

			// Mobile Nav Submenus

			var submenuBtn = $('.mobile-nav .menu-item-has-children').children('a');
			submenuBtn.on('click', function(e) {
				e.preventDefault();
				$(this).parent().toggleClass('active');
			});

			// Slider

			$('.slider__wrapper').slick({
				dots: true,
				infinite: true,
				autoplay: false,
				speed: 1000,
				slidesToShow: 1,
				adaptiveHeight: true,
        prevArrow: null,
        nextArrow: null,
      });

      $('.slider-simple__wrapper').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        speed: 1000,
        prevArrow: null,
        nextArrow: null,
      });

      $('.ubezpieczenia-slider__wrapper').slick({
				dots: false,
				infinite: true,
				autoplay: false,
        slidesToShow: 1,
        centerMode: true,
        variableWidth: false,
        centerPadding: '40px',
        mobileFirst: true,
        nextArrow: '<div class="arrow-next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>',
        prevArrow: '<div class="arrow-prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>',
        responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 3,
            infinite: true,
            centerMode: true,
            centerPadding: '40px',
            variableWidth: true,
          },
        },
      ],
      });

      $('.ubezpieczenia-slider__wrapper').on('afterChange', function (event, slick, currentSlide) {
        $('.slider-beneficts, .ubezpieczenia-partners, .slider-downloads').hide();
        $('.slider-beneficts[data-id=' + (currentSlide + 1) + '], .ubezpieczenia-partners[data-id=' + (currentSlide + 1) + '], .slider-downloads[data-id=' + (currentSlide + 1) + ']').show();

      });

      $('.ubezpieczenia-slider-cta').on('click', function (e) {
        e.preventDefault();
        $("html, body").animate({
          scrollTop: $('.ubezpieczenia-slider-flexible-content').offset().top - 60,
        }, 1000);
      });

      $('.--nazwa-firmy--24Link').on('click', function (e) {
        e.preventDefault();
        $("html, body").animate({
          scrollTop: $('.--nazwa-firmy--24').offset().top - 60,
        }, 1000);
      });


      $('.ubezpieczenia__wrapper__item').hover(function(){
        $(this).find('.ubezpieczenia__wrapper__item__overlay').toggleClass('ubezpieczenia__wrapper__item__overlay--hovered')
        $(this).find('.ubezpieczenia__wrapper__item__overlay-image').toggleClass('ubezpieczenia__wrapper__item__overlay-image--hovered')
        $(this).find('.ubezpieczenia__wrapper__item__title').toggleClass('ubezpieczenia__wrapper__item__title--hovered')
        $(this).find('.ubezpieczenia__wrapper__item__title__icon').toggleClass('ubezpieczenia__wrapper__item__title__icon--hovered')
        $(this).toggleClass('ubezpieczenia__wrapper__item--hovered');
      });

      // Links dropdown
      var button = $('.downloads-dropdown__wrapper__button__clickoverlay');
      var container = $('.downloads-dropdown__wrapper__button > div > div a');
      // var links = $('.downloads-dropdown__wrapper__button div');

      button.toggle(function(){
        // e.preventDefault();
        $('.downloads-dropdown__wrapper__button').animate({
          height: 42 * container.length + 42,

        });
        $('.btn--dropdown').addClass('btn--dropdown-active');
      }, function(){
        $('.downloads-dropdown__wrapper__button').animate({
          height: 42,
        });
        $('.btn--dropdown').removeClass('btn--dropdown-active');
      });

      $('textarea').each(function () {
          this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
      }).on('input', function () {
          this.style.height = 'auto';
          this.style.height = (this.scrollHeight) + 'px';
      });
      setInterval(function(){
        if($('#gform_page_1_2').is(':visible')) {
          $('.banner__box > *:not(".form-box_wrapper")').animate({
            height: 0,
            opacity: 0,
            display: 'none',
          });
        }
      }, 100);

      $('.close-popup').on('click', function(e){
        e.preventDefault();
        $('.popup').fadeOut();
      });

      $('.contact-widget__wrapper > a:nth-child(3), .contact-widget__wrapper > a:nth-child(2)').on('click', function(e){
        e.preventDefault();
        $('.popup-contact-info').parent().parent().fadeIn();
      });

      $('.popup-btn').on('click', function(e){
        e.preventDefault();
      });

      $('#popupBtn_1').on('click', function(e) {
        e.preventDefault();
        $('#popup_1').css('display', 'block');
      });
      $('#popupBtn_2').on('click', function (e) {
        e.preventDefault();
        $('#popup_2').css('display', 'block');
      });
      $('#popupBtn_3').on('click', function (e) {
        e.preventDefault();
        $('#popup_3').css('display', 'block');
      });


      // --nazwa-firmy-- 24 popups
      $('.popup-btn-24').on('click', function(){
        $(this).parent().parent().next().fadeIn();
      });


		});


	},
	finalize() {

	},
};
