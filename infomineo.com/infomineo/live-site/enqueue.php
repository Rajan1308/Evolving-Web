<?php
/**
 * Allenza enqueue scripts
 *
 * @package Allenza
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'Allenza_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function Allenza_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		// $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		// wp_enqueue_style( 'Allenza-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );
		wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/assets/css/main.css');
		wp_enqueue_style( 'custom-styles', get_template_directory_uri() . '/assets/css/custom.css');
		wp_enqueue_style( 'fancybox-styles', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css' );

		if(ICL_LANGUAGE_CODE =='ar'):
		wp_enqueue_style( 'rtl-styles', get_template_directory_uri() . '/assets/css/rtl.css' );
		endif;
		

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		// wp_enqueue_script( 'Allenza-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		// wp_enqueue_script( 'Allenza-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );

		wp_enqueue_script( 'jquery-lib', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), $js_version, true );
		wp_enqueue_script( 'bootstrap-lib', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), $js_version, true );
		
		wp_enqueue_script( 'popper-lib', get_template_directory_uri() . '/assets/js/popper.min.js', array(), $js_version, true );
		wp_enqueue_script( 'owl-scripts', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), $js_version, true );
		wp_enqueue_script( 'select2-scripts', get_template_directory_uri() . '/assets/js/select2.min.js', array(), $js_version, true );
		wp_enqueue_script( 'parallax-scripts', get_template_directory_uri() . '/assets/js/parallax.min.js', array(), $js_version, true );
		wp_enqueue_script( 'aos-scripts', get_template_directory_uri() . '/assets/js/aos.js', array(), $js_version, true );
		wp_enqueue_script( 'fancybox-scripts', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array(), $js_version,  true );
		wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/assets/js/custom.js', array(), $js_version,  true );
		wp_enqueue_script( 'carousel-scripts', get_template_directory_uri() . '/assets/js/carousel.js', array(), $js_version, true );
		


		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
} // End of if function_exists( 'Allenza_scripts' ).

add_action( 'wp_enqueue_scripts', 'Allenza_scripts' );
