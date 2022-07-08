<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;
/*
 * Enqueue scripts and styles for the back end.
 */

function toshiba_admin_scripts() {
    global $wp_version;
    // Load our admin stylesheet.
    wp_enqueue_style( 'toshiba-admin-style', get_template_directory_uri() . '/css/admin-style.css' );
    // Load our admin script.
    wp_enqueue_script( 'toshiba-admin-script', get_template_directory_uri() . '/js/admin-script.js' );
    //localize admin script
    wp_localize_script( 'toshiba-admin-script', 'TOSHIBAADMIN', array (
        'ajaxurl' => admin_url( 'admin-ajax.php', ( is_ssl() ? 'https' : 'http' ) ),
    ) );
    wp_enqueue_media();
}

/*
 * Enqueue scripts and styles for the front end.
 */

function toshiba_public_scripts() {
    // Load our main stylesheet.
    wp_enqueue_style( 'toshiba-style', get_stylesheet_uri(), array (), time() );
    // Load font-awesome stylesheet.

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css', array (), NULL );
    // Load font-awesome stylesheet.
    wp_enqueue_style( 'toshiba-fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.css', array (), NULL );
    wp_enqueue_style( 'toshiba-fancybox-style', get_template_directory_uri() . '/css/jquery.fancybox.css', array (), NULL );
    // Load slick stylesheet.
    wp_enqueue_style( 'toshiba-slick-style', get_template_directory_uri() .'/css/slick.css', array (), NULL );
    // Load our public style stylesheet.
    wp_enqueue_style( 'toshiba-public-style', get_template_directory_uri() . '/css/public-style.css', array (), time() );
    // Load main jquery
    wp_enqueue_script( 'jquery', array (), NULL );
    // Load public script
    wp_enqueue_script( 'toshiba-public-script', get_template_directory_uri() . '/js/public-script.js', array (), time() );
    // Load ajax script
    wp_enqueue_script( 'toshiba-ajax-script', get_template_directory_uri() . '/js/ajax-scripts.js', array (), time() );
    // Load category filter script
    wp_enqueue_script( 'toshiba-category-filter-script', get_template_directory_uri() . '/js/category-filter-script.js', array (), time() );
    // Load public script
    wp_enqueue_script( 'toshiba-slick-js', get_template_directory_uri() . '/js/slick.js', array (), NULL );
    // wp_enqueue_script( 'toshiba-v2-js', get_template_directory_uri() . '/js/v2.js', array (), NULL );
    // Load public script
    wp_enqueue_script( 'toshiba-fancybox-js', get_template_directory_uri() . '/js/jquery.fancybox.js', array (), NULL );
    //localize public script
    wp_localize_script( 'toshiba-public-script', 'TOSHIBAPUBLIC', array (
        'ajaxurl' => admin_url( 'admin-ajax.php', ( is_ssl() ? 'https' : 'http' ) ),
        'siteurl' => site_url()
    ) );
}

/*
 * Enqueue scripts and styles for the admin login screen.
 */

function toshiba_login_stylesheet() {
    wp_enqueue_style( 'toshiba-login-style', get_stylesheet_directory_uri() . '/css/login-style.css' );
}

//add action to load scripts and styles for the back end
add_action( 'admin_enqueue_scripts', 'toshiba_admin_scripts' );
//add action load scripts and styles for the front end
add_action( 'wp_enqueue_scripts', 'toshiba_public_scripts' );
//add action load scripts and styles for admin login screen
add_action( 'login_enqueue_scripts', 'toshiba_login_stylesheet' );



function toshiba_strict_transport_security() {
    //header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains; preload' );
    //header('Referrer-Policy: geolocation=(self "https://www.toshibabusinessmea.com"), microphone=()');
    //header('Permissions-Policy: geolocation=(self "https://www.toshibabusinessmea.com"), microphone=()');
    
}
//add_action( 'send_headers', 'toshiba_strict_transport_security' );




@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);


