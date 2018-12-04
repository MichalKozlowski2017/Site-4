<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {

    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'footer-menu-1' => __('Footer menu 1', 'sage'),
        'footer-menu-2' => __('Footer menu 2', 'sage'),
        'footer-menu-3' => __('Footer menu 3', 'sage'),
        'footer-menu-4' => __('Footer menu 4', 'sage'),
        'mobile_navigation' => __('Mobile Navigation', 'sage')
    ]);




    // ACF Options page
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page();

    }
    // Custom Logo
    add_theme_support( 'custom-logo', array(
    	'height'      => 41,
    	'width'       => 128,
    	'flex-height' => true,
    	'flex-width'  => true,
    	'header-text' => array( 'site-title', 'site-description' ),
    ) );

    add_theme_support( 'custom-logo', array(
       'header-text' => array( 'site-title', 'site-description' ),
    ) );



    /* Image sizes */
    add_image_size('cta_gray', 145, 145, false);
    add_image_size('benefit_icons', 60, 60, false);
    add_image_size('green_cta', 600, 600, false);
    add_image_size('ubezpieczenia_bg', 575, 575, false);
    add_image_size('ubezpieczenia_slider', 160, 160, false);
    add_image_size('logo_form', 150, 100, false);
    add_image_size('logowanie_banner', 1440, 504, false);
    add_image_size('logowanie_card', 200, 130, false);
    add_image_size('logoweanie_image_big', 650, 720, false);
    add_image_size('banner_image_mobile', 768, 768, false);
    add_image_size('slider_simple', 1440, 400, false);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */

add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});



// Karty menu
function karty_menu() {
    //set default attributes and values
    $karty_menu = get_field('karty_menu', 'option');
    $karty = '<div class="karty-submenu-wrapper">';

      foreach ($karty_menu as $index => $karta) {
        $karty .= '<div class="karta">';
        $karty .= '<h3>'.$karta['title'].'</h3>';
        $karty .= '<p>'.$karta['text'].'</p>';
        $karty .= '<img src="'. $karta['image']['sizes']['logowanie_card'] .'" alt="'.$karta['title'].'">';
        $karty .= '<a href="'.$karta['link_url'].'"><button class="btn btn--green">'.$karta['link_text'].'</button></a>';
        $karty .= '</div>';
      }
      $karty .= '</div>';
      return $karty;

}
add_shortcode( 'karty_menu', __NAMESPACE__ . '\\karty_menu' );

add_filter("gform_confirmation_anchor", create_function("","return 0;"));

/**
* Gravity Wiz // Gravity Forms // Multi-page Form Navigation
*
* Adds support for navigating between form pages by converting the page steps into page links or creating your own custom page links.
*
* @version	 2.0
* @author    David Smith <david@gravitywiz.com>
* @license   GPL-2.0+
* @link      http://gravitywiz.com/multi-page-navigation/
*/
class GWMultipageNavigation {

    public $_args = array();

    private static $script_displayed;
    private static $non_global_forms = array();

    function __construct( $args = array() ) {

        // set our default arguments, parse against the provided arguments, and store for use throughout the class
        $this->_args = wp_parse_args( $args, array(
            'form_id' => false,
            'form_ids' => false,
            'activate_on_last_page' => true
        ) );

        if( $this->_args['form_ids'] ) {
            $form_ids = $this->_args['form_ids'];
        } else if( $this->_args['form_id'] ) {
            $form_ids = $this->_args['form_id'];
        } else {
            $form_ids = array();
        }

        $this->_args['form_ids'] = is_array( $form_ids ) ? $form_ids : array( $form_ids );

        if( ! empty( $this->_args['form_ids'] ) )
            self::$non_global_forms = array_merge( self::$non_global_forms, $this->_args['form_ids'] );

        add_filter( 'gform_pre_render', array( $this, 'output_navigation_script' ), 10, 2 );

    }

    function output_navigation_script( $form, $is_ajax ) {

        // only apply this to multi-page forms
        if( count($form['pagination']['pages']) <= 1 )
            return $form;

        if( ! $this->is_applicable_form( $form['id'] ) )
            return $form;

        $this->register_script( $form );

        if( ! $this->_args['activate_on_last_page'] || $this->is_last_page( $form ) || $this->is_last_page_reached() ) {
            $input = '<input id="gw_last_page_reached" name="gw_last_page_reached" value="1" type="hidden" />';
            add_filter( "gform_form_tag_{$form['id']}", create_function('$a', 'return $a . \'' . $input . '\';' ) );
        }

        // only output the gwmpn object once regardless of how many forms are being displayed
        // also do not output again on ajax submissions
        if( self::$script_displayed || ( $is_ajax && rgpost('gform_submit') ))
            return $form;

        ?>

        <script type="text/javascript">

            (function($){

                window.gwmpnObj = function( args ) {

                    this.formId = args.formId;
                    this.formElem = jQuery('form#gform_' + this.formId);
                    this.currentPage = args.currentPage;
                    this.lastPage = args.lastPage;
                    this.activateOnLastPage = args.activateOnLastPage;
                    this.labels = args.labels;

                    this.init = function() {

                        // if this form is ajax-enabled, we'll need to get the current page via JS
                        if( this.isAjax() )
                            this.currentPage = this.getCurrentPage();

                        if( !this.isLastPage() && !this.isLastPageReached() )
                            return;

                        var gwmpn = this;
                        var steps = $('form#gform_' + this.formId + ' .gf_step');

                        steps.each(function(){

                            var stepNumber = parseInt( $(this).find('span.gf_step_number').text() );

                            if( stepNumber != gwmpn.currentPage ) {
                                $(this).html( gwmpn.createPageLink( stepNumber, $(this).html() ) )
                                    .addClass('gw-step-linked');
                            } else {
                                $(this).addClass('gw-step-current');
                            }

                        });

                        if( !this.isLastPage() && this.activateOnLastPage )
                            this.addBackToLastPageButton();

                        $(document).on('click', '#gform_' + this.formId + ' a.gwmpn-page-link', function(event){
                            event.preventDefault();

                            var hrefArray = $(this).attr('href').split('#');
                            if( hrefArray.length >= 2 ) {
                                var pageNumber = hrefArray.pop();
                                gwmpn.postToPage( pageNumber, ! $( this ).hasClass( 'gwmp-default' ) );
                            }

                        });

                    }

                    this.createPageLink = function( stepNumber, HTML ) {
                        return '<a href="#' + stepNumber + '" class="gwmpn-page-link gwmpn-default">' + HTML + '</a>';
                    }

                    this.postToPage = function( page ) {
                        this.formElem.append('<input type="hidden" name="gw_page_change" value="1" />');
                        this.formElem.find( 'input[name="gform_target_page_number_' + this.formId + '"]' ).val( page );
                        this.formElem.submit();
                    }

                    this.addBackToLastPageButton = function() {
                        this.formElem.find('#gform_page_' + this.formId + '_' + this.currentPage + ' .gform_page_footer')
                            .append('<input type="button" onclick="gwmpn.postToPage(' + this.lastPage + ')" value="' + this.labels.lastPageButton + '" class="button gform_last_page_button">');
                    }

                    this.getCurrentPage = function() {
                        return this.formElem.find( 'input#gform_source_page_number_' + this.formId ).val();
                    }

                    this.isLastPage = function() {
                        return this.currentPage >= this.lastPage;
                    }

                    this.isLastPageReached = function() {
                        return this.formElem.find('input[name="gw_last_page_reached"]').val() == true;
                    }

                    this.isAjax = function() {
                        return this.formElem.attr('target') == 'gform_ajax_frame_' + this.formId;
                    }

                    this.init();

                }

            })(jQuery);

        </script>

        <?php
        self::$script_displayed = true;
        return $form;
    }

    function register_script( $form ) {

        $page_number = GFFormDisplay::get_current_page($form['id']);
        $last_page = count($form['pagination']['pages']);

        $args = array(
            'formId' => $form['id'],
            'currentPage' => $page_number,
            'lastPage' => $last_page,
            'activateOnLastPage' => $this->_args['activate_on_last_page'],
            'labels' => array(
                'lastPageButton' => __( 'Back to Last Page' )
            )
        );

        $script = "window.gwmpn = new gwmpnObj(" . json_encode( $args ) . ");";
        GFFormDisplay::add_init_script( $form['id'], 'gwmpn', GFFormDisplay::ON_PAGE_RENDER, $script );

    }

    function is_last_page( $form ) {

        $page_number = GFFormDisplay::get_current_page($form['id']);
        $last_page = count($form['pagination']['pages']);

        return $page_number >= $last_page;
    }

    function is_last_page_reached() {
        return rgpost('gw_last_page_reached');
    }

    function is_applicable_form( $form_id ) {

        $is_global_form = ! in_array( $form_id, self::$non_global_forms );
        $is_current_non_global_form = ! $is_global_form && in_array( $form_id, $this->_args['form_ids'] );

        return $is_global_form || $is_current_non_global_form;
    }

}
