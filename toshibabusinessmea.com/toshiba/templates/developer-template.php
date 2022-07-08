<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;
/*
 * Template Name: Developer Test Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
if ( class_exists( 'acf' ) ) {
    $dealer_regions  = get_field_object( 'field_5ffd7a501859c' );
    $dealer_products = get_field_object( 'field_5ffd7b26fd460' );
    $map_shortcode   = get_field( 'toshiba_f_dealer_map' );
    $filter_title    = get_field( 'toshiba_f_dealer_filter_title' );
    $filter_info     = get_field( 'toshiba_f_dealer_filter_info' );
}

$args     = array (
    'post_type'      => 'printer',
    'post_status'    => 'publish',
    'posts_per_page' => -1
);
$query    = new WP_Query( $args );
$data_arr = array ();
while ( $query->have_posts() ) {
    $query->the_post();
    $printer_id                                 = get_the_ID();
    $data_arr[ $printer_id ][ 'title' ]         = get_the_title();
    $data_arr[ $printer_id ][ 'thumbnail_url' ] = get_the_post_thumbnail_url();
    $data_arr[ $printer_id ][ 'excerpt' ]       = get_the_excerpt();
    $data_arr[ $printer_id ][ 'permalink' ]     = get_the_permalink();
    if ( class_exists( 'acf' ) ) {
        $brochure_download = get_field( 'toshiba_brochure_download', $printer_id );
        $brochure          = get_field( 'toshiba_brochure_file', $printer_id );
        $brochure_title    = get_field( 'toshiba_brochure_btn_txt', $printer_id );
        $brochure_title    = ! empty( $brochure_title ) ? $brochure_title : 'Download Brochure';
        $feature_list      = get_field( 'toshiba_printer_f_list', $printer_id );
    }
    $data_arr[ $printer_id ][ 'brochure' ] = array (
        'title'    => $brochure_title,
        'url'      => $brochure,
        'download' => $brochure_download
    );
    $data_arr[ $printer_id ][ 'features' ] = $feature_list;
    $printer_category                      = get_the_terms( $printer_id, TOSHIBA_PRINTER_CAT_POST_TAX );
    foreach ( $printer_category as $category ) {
        $data_arr[ $printer_id ][ 'category' ][] = array (
            'term_id' => $category->term_id,
            'slug'    => $category->slug
        );
    }
}
wp_reset_query();
wp_reset_postdata();

?>
<div class="barcode-label-printers">
    <div style="margin-top: 100px;" class="category_printers label_category_printer">
        <div class="category_printers_inner">
            
        </div>
    </div>
</div>
<?php get_footer(); ?>