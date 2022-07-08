<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if( !defined( 'TOSHIBA_POST_POST_TYPE' ) ) {
    define( 'TOSHIBA_POST_POST_TYPE', 'post' );
}
if( !defined( 'TOSHIBA_PAGE_POST_TYPE' ) ) {
    define( 'TOSHIBA_PAGE_POST_TYPE', 'page' );
}
if( !defined( 'TOSHIBA_EVENT_POST_TYPE' ) ) {
    define( 'TOSHIBA_EVENT_POST_TYPE', 'event' );
}
if( !defined( 'TOSHIBA_PRINTER_POST_TYPE' ) ) {
    define( 'TOSHIBA_PRINTER_POST_TYPE', 'printer' );
}
if( !defined( 'TOSHIBA_DEALER_POST_TYPE' ) ) {
    define( 'TOSHIBA_DEALER_POST_TYPE', 'dealer' );
}
if( !defined( 'TOSHIBA_PRINTER_CAT_POST_TAX' ) ) {
    define( 'TOSHIBA_PRINTER_CAT_POST_TAX', 'printer_cat' );
}
if( !defined( 'TOSHIBA_META_PREFIX' ) ) {
    define( 'TOSHIBA_META_PREFIX', '_toshiba_' );
}
if( !defined( 'TOSHIBA_THEME_IMAGE_FOLDER' ) ) {
    define( 'TOSHIBA_THEME_IMAGE_FOLDER', get_template_directory_uri() . '/images' );
}