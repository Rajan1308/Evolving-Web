<?php
add_action( 'rest_api_init', 'toshiba_fun_initialize_rest_api' );

function toshiba_fun_initialize_rest_api() {
    register_rest_route( 'toshiba/v1', '/printers/', array (
        'methods'  => 'GET',
        'callback' => 'posts_api_callback_fn'
            )
    );
}

function posts_api_callback_fn($data) {
    $post_type       = $data->get_param( 'post_type' );
    $args            = array (
        'post_type'      => $post_type,
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'order'          => 'DESC',
        'orderby'        => 'title',
    );
    $query           = new WP_Query( $args );
    $data_arr        = array ();
    $barcode_counter = 0;
    $multifn_counter = 0;
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $printer_arr                    = array ();
            $printer_id                     = get_the_ID();
            $printer_arr[ 'ID' ]            = $printer_id;
            $printer_arr[ 'title' ]         = get_the_title();
            $printer_arr[ 'thumbnail_url' ] = get_the_post_thumbnail_url();
            $printer_arr[ 'excerpt' ]       = wp_trim_words( get_the_excerpt(), 30 );
            $printer_arr[ 'permalink' ]     = get_the_permalink();
            if ( class_exists( 'acf' ) ) {
                $brochure_download = get_field( 'toshiba_brochure_download', $printer_id );
                $brochure          = get_field( 'toshiba_brochure_file', $printer_id );
                $brochure_title    = get_field( 'toshiba_brochure_btn_txt', $printer_id );
                $brochure_title    = ! empty( $brochure_title ) ? $brochure_title : 'Download Brochure';
                $feature_list      = get_field( 'toshiba_printer_f_list', $printer_id );
            }
            $printer_arr[ 'brochure' ] = array (
                'title'    => $brochure_title,
                'url'      => $brochure,
                'download' => $brochure_download
            );
            $printer_arr[ 'features' ] = $feature_list;
            $printer_category          = get_the_terms( $printer_id, TOSHIBA_PRINTER_CAT_POST_TAX );
            foreach ( $printer_category as $category ) {
                $printer_arr[ 'category' ][] = array (
                    'term_id' => $category->term_id,
                    'slug'    => $category->slug
                );
                if ( $category->term_id == 13 ) {
                    $data_arr[ 'barcode' ][ $barcode_counter ] = $printer_arr;
                    $barcode_counter ++;
                } elseif ( $category->term_id == 12 ) {
                    $data_arr[ 'multifn' ][ $multifn_counter ] = $printer_arr;
                    $multifn_counter ++;
                }
            }
        }
        wp_reset_query();
        wp_reset_postdata();
    } else {
        $data_arr = array (
            'error'   => 'empty',
            'message' => 'No data found.....'
        );
    }
    return $data_arr;
}

?>