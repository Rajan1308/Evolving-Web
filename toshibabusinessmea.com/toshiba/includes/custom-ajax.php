<?php
add_action( 'wp_ajax_toshiba_printer_barcode_filter', 'toshiba_printer_barcode_filter_function' );
add_action( 'wp_ajax_nopriv_toshiba_printer_barcode_filter', 'toshiba_printer_barcode_filter_function' );

function toshiba_printer_barcode_filter_function() {
    $device_filter        = $_POST[ 'device_filter' ];
    $labelWidth_filter    = $_POST[ 'labelWidth_filter' ];
    $resolution_filter    = $_POST[ 'resolution_filter' ];
    $feature_filter       = $_POST[ 'feature_filter' ];
    $speed_filter         = $_POST[ 'speed_filter' ];
    $posts_per_page       = $_POST[ 'posts_per_page' ];
    $current_page         = ! empty( $_POST[ 'curent_page' ] ) ? $_POST[ 'curent_page' ] : 1;
    $printer_categories   = get_terms( TOSHIBA_PRINTER_CAT_POST_TAX, array (
        'hide_empty' => false,
        'order'      => 'DESC'
            ) );
    $barcode_cat_id       = $printer_categories[ 1 ]->term_id;
    $barcode_printer_args = array (
        'post_type'      => TOSHIBA_PRINTER_POST_TYPE,
        'posts_per_page' => $posts_per_page,
//        'posts_per_page' => -1, // $posts_per_page
        'paged'          => $current_page,
        'post_status'    => 'publish',
        'order'          => 'DESC',
        'orderby'        => 'title',
        'meta_query'     => array (
            'relation' => 'AND'
        ),
        'tax_query'      => array (
            array (
                'taxonomy' => TOSHIBA_PRINTER_CAT_POST_TAX,
                'field'    => term_id,
                'terms'    => $barcode_cat_id
            )
        )
    );
    if ( $device_filter ) {
        $barcode_printer_args[ 'meta_query' ][] = array (
            'key'     => 'toshiba_barcode_printer_device',
            'compare' => 'LIKE',
            'value'   => "$device_filter"
        );
    }
    if ( $labelWidth_filter ) {
        $barcode_printer_args[ 'meta_query' ][] = array (
            'key'     => 'toshiba_barcode_printer_label',
            'compare' => 'LIKE',
            'value'   => "$labelWidth_filter"
        );
    }
    if ( $resolution_filter ) {
        $barcode_printer_args[ 'meta_query' ][] = array (
            'key'     => 'toshiba_barcode_printer_resolution',
            'compare' => 'LIKE',
            'value'   => "$resolution_filter"
        );
    }
    if ( $feature_filter ) {
        $barcode_printer_args[ 'meta_query' ][] = array (
            'key'     => 'toshiba_barcode_printer_feature',
            'compare' => 'LIKE',
            'value'   => "$feature_filter"
        );
    }
    if ( $speed_filter ) {
        $speed_filter                           = explode( ',', str_replace( array ( '{', '}' ), '', $speed_filter ) );
        $speed_filter_btw                       = array ( $speed_filter[ 0 ], $speed_filter[ 1 ] );
        $barcode_printer_args[ 'meta_query' ][] = array (
            'key'     => 'toshiba_barcode_printer_speed',
            'compare' => 'BETWEEN',
            'value'   => $speed_filter_btw,
            'type'    => 'numeric'
        );
    }
    $barcode_printer_query = new WP_Query( $barcode_printer_args );
    ?>
    <div class="">
        <div class="category_printers_inner display_flex multifunction_printers_section">
            <?php
            if ( $barcode_printer_query->have_posts() ) { $ab = 0;
                while ( $barcode_printer_query->have_posts() ) {
                    $barcode_printer_query->the_post();
                    $printer_title     = get_the_title();
                    $printer_image     = get_the_post_thumbnail_url();
                    $printer_desc      = get_the_excerpt();
                    $printer_permalink = get_the_permalink();
                    if ( class_exists( 'acf' ) ) {
                        $brochure_download = get_field( 'toshiba_brochure_download', $printer_id );
                        $brochure          = get_field( 'toshiba_brochure_file', $printer_id );
                        $brochure_title    = get_field( 'toshiba_brochure_btn_txt', $printer_id );
                        $brochure_title    = ! empty( $brochure_title ) ? $brochure_title : 'Download Brochure';
                        $feature_list      = get_field( 'toshiba_printer_f_list', $printer_id );
                    }
                    ?>
                    <div class="printers_inner">
                        <div class="inner">
                            <a class="card-link" href="<?php echo $printer_permalink; ?>" tabindex="0">
                                <div class="image">
                                    <?php if ( ! empty( $printer_image ) ) { ?>
                                        <img src="<?php echo $printer_image; ?>" alt="<?= $printer_title ?>">
                                    <?php } ?>
                                </div>
                                <div class="content">
                                    <?php if ( ! empty( $printer_title ) ) { ?>
                                        <h4><?php echo $printer_title; ?></h4>
                                    <?php } ?>
                                    <?php if ( ! empty( $feature_list ) ) { ?>
                                        <ul>
                                            <?php
                                            foreach ( $feature_list as $ftr_key => $ftr_value ) {
                                                if ( ! empty( $ftr_value[ 'toshiba_printer_f_list_feature' ] ) ) {
                                                    ?>
                                                    <li><?php echo $ftr_value[ 'toshiba_printer_f_list_feature' ]; ?></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    <?php } ?>
                                    <?php
                                    if ( ! empty( $printer_desc ) ) {
                                        echo $printer_desc;
                                    }
                                    ?>                                    

                                </div>
                            </a>
                            <div class="card-action">
                                <?php if ( $brochure_download && ! empty( $brochure ) ) { ?>
                                    <div class="Download_Brochure">
<!--                                         <a href="<?php echo $brochure; ?>" download="" tabindex="0"><?php echo $brochure_title; ?></a> -->
										<a href="<?php echo $brochure; ?>" class="printerspdf" id="downloadpdf"  data-fancybox data-src="#hidden-content-barcode<?= $ab + 1 ?>" download="" tabindex="0"><?php echo $brochure_title; ?></a>
<div class="Request_quote_form contact_us_form" id="hidden-content-barcode<?= $ab + 1 ?>" style="display: none;">
                                            <?php #echo do_shortcode( '[contact-form-7 id="2286" title="Download Brochure Form"]' ); ?>
												<input type="hidden" id="pdflink" value="<?php echo $brochure; ?>" />
						   <script>
  hbspt.forms.create({
	region: "na1",
	portalId: "8244541",
	formId: "9d556644-d84a-45ca-9dc0-2cf421816ac7"
});
</script>
                                                                                    </div>
                                    </div>
                                <?php } ?>
                                <div class="button-1">
                                    <a href="<?php echo $printer_permalink; ?>" tabindex="0">
                                        Know More <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $ab++;
                }
                if ( $barcode_printer_query->max_num_pages > $current_page ) {
                    ?>
                    <div class="printer_load_more" data-current_page="<?php echo $current_page; ?>" data-post_per_page="<?php echo $posts_per_page; ?>">
                        <img src="https://nexatestwp.com/toshiba/wp-content/uploads/2021/04/ajax-loader.gif" alt="alt"/>
                    </div>
                    <?php
                }
                $pagenation = paginate_links( array (
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $barcode_printer_query->max_num_pages,
                    'current'      => $current_page,
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'prev_next'    => true,
                    'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous', 'text-domain' ) ),
                    'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
                    'add_args'     => false,
                    'add_fragment' => '',
                        ) );
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </div>
            <?php
            if ( $pagenation ) {
                ?>
                                    <!--<div class="barcode_pagination" data-current_page="<?php echo $current_page; ?>"><?php echo $pagenation; ?></div>-->
                <?php
            }
            ?>
        <?php } else { ?>
            <p>No Printers Found With Your Filter!!!!!!</p>
        <?php } ?>
    </div>
    <?php
    exit();
}

add_action( 'wp_ajax_toshiba_printer_multifn_filter', 'toshiba_printer_multifn_filter_function' );
add_action( 'wp_ajax_nopriv_toshiba_printer_multifn_filter', 'toshiba_printer_multifn_filter_function' );

function toshiba_printer_multifn_filter_function() {
    $size_filter        = $_POST[ 'size_filter' ];
    $color_filter       = $_POST[ 'color_filter' ];
    $speed_filter       = $_POST[ 'speed_filter' ];
    $posts_per_page     = $_POST[ 'posts_per_page' ];
    $current_page       = ! empty( $_POST[ 'curent_page' ] ) ? $_POST[ 'curent_page' ] : 1;
    $printer_categories = get_terms( TOSHIBA_PRINTER_CAT_POST_TAX, array (
        'hide_empty' => false,
        'order'      => 'DESC'
            ) );
    $multifn_cat_id     = $printer_categories[ 0 ]->term_id;
    $multifn_print_args = array (
        'post_type'      => TOSHIBA_PRINTER_POST_TYPE,
        'posts_per_page' => $posts_per_page,
//        'posts_per_page' => -1, //$posts_per_page
        'paged'          => $current_page,
        'order'          => 'DESC',
        'orderby'        => 'title',
        'meta_query'     => array (
            'relation' => 'AND'
        ),
        'tax_query'      => array (
            array (
                'taxonomy' => TOSHIBA_PRINTER_CAT_POST_TAX,
                'field'    => term_id,
                'terms'    => $multifn_cat_id
            )
        )
    );
    if ( $size_filter ) {
        $multifn_print_args[ 'meta_query' ][] = array (
            'key'     => 'toshiba_multifn_printer_size',
            'compare' => 'LIKE',
            'value'   => "$size_filter"
        );
    }
    if ( $color_filter ) {
        $multifn_print_args[ 'meta_query' ][] = array (
            'key'     => 'toshiba_multifn_printer_color',
            'compare' => 'LIKE',
            'value'   => "$color_filter"
        );
    }
    if ( $speed_filter ) {
        $multifn_print_args[ 'meta_query' ][] = array (
            'key'     => 'toshiba_multifn_printer_speed',
            'compare' => 'LIKE',
            'value'   => "$speed_filter"
        );
    }
    $multifn_print_query = new WP_Query( $multifn_print_args );
    ?>
    <div class="">
        <div class="category_printers_inner display_flex multifunction_printers_section">
            <?php
            if ( $multifn_print_query->have_posts() ) {
				$ab = 0;
                while ( $multifn_print_query->have_posts() ) {
                    $multifn_print_query->the_post();
                    $printer_id        = get_the_ID();
                    $printer_title     = get_the_title();
                    $printer_image     = get_the_post_thumbnail_url();
                    $printer_desc      = get_the_excerpt();
                    $printer_permalink = get_the_permalink();
                    if ( class_exists( 'acf' ) ) {
                        $brochure_download = get_field( 'toshiba_brochure_download', $printer_id );
                        $brochure          = get_field( 'toshiba_brochure_file', $printer_id );
                        $brochure_title    = get_field( 'toshiba_brochure_btn_txt', $printer_id );
                        $brochure_title    = ! empty( $brochure_title ) ? $brochure_title : 'Download Brochure';
                        $feature_list      = get_field( 'toshiba_printer_f_list', $printer_id );
                    }
                    ?>
                    <div class="printers_inner">
                        <div class="inner">
                            <a class="card-link" href="<?php echo $printer_permalink; ?>" tabindex="0">
                                <div class="image">
                                    <?php if ( ! empty( $printer_image ) ) { ?>
                                        <img src="<?php echo $printer_image; ?>" alt="<?= $printer_title ?>">
                                    <?php } ?>
                                </div>
                                <div class="content">
                                    <?php if ( ! empty( $printer_title ) ) { ?>
                                        <h4><?php echo $printer_title; ?></h4>
                                    <?php } ?>
                                    <?php if ( ! empty( $feature_list ) ) { ?>
                                        <ul>
                                            <?php
                                            foreach ( $feature_list as $ftr_key => $ftr_value ) {
                                                if ( ! empty( $ftr_value[ 'toshiba_printer_f_list_feature' ] ) ) {
                                                    ?>
                                                    <li><?php echo $ftr_value[ 'toshiba_printer_f_list_feature' ]; ?></li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    <?php } ?>
                                    <?php
                                    if ( ! empty( $printer_desc ) ) {
                                        echo $printer_desc;
                                    }
                                    ?>
                                </div>
                            </a>
                            <div class="card-action">
                                <?php if ( $brochure_download && ! empty( $brochure ) ) { ?>
                                    <div class="Download_Brochure">
<!--                                         <a href="<?php echo $brochure; ?>" download="" tabindex="0"><?php echo $brochure_title; ?></a> -->
                                    <a href="<?php echo $brochure; ?>" class="printerspdf" id="downloadpdf"  data-fancybox data-src="#hidden-content-multifunction<?= $ab + 1 ?>" download="" tabindex="0"><?php echo $brochure_title; ?></a>
<div class="Request_quote_form contact_us_form" id="hidden-content-multifunction<?= $ab + 1 ?>" style="display: none;">
                                            <?php #echo do_shortcode( '[contact-form-7 id="2286" title="Download Brochure Form"]' ); ?>
												<input type="hidden" id="pdflink" value="<?php echo $brochure; ?>" />
						   <script>
  hbspt.forms.create({
	region: "na1",
	portalId: "8244541",
	formId: "9d556644-d84a-45ca-9dc0-2cf421816ac7"
});
</script>
                                                                                    </div>
								</div>
                                <?php } ?>
								
                                <div class="button-1">
                                    <a href="<?php echo $printer_permalink; ?>" tabindex="0">
                                        Know More <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $ab ++;
                }
                if ( $multifn_print_query->max_num_pages > $current_page ) {
                    ?>
                    <div class="printer_load_more" data-current_page="<?php echo $current_page; ?>" data-post_per_page="<?php echo $posts_per_page; ?>">
                        <img src="https://nexatestwp.com/toshiba/wp-content/uploads/2021/04/ajax-loader.gif" alt="alt"/>
                    </div>
                    <?php
                }
                $pagenation = paginate_links( array (
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $multifn_print_query->max_num_pages,
                    'current'      => $current_page,
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'prev_next'    => true,
                    'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous', 'text-domain' ) ),
                    'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
                    'add_args'     => false,
                    'add_fragment' => '',
                        ) );
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </div>
            <?php /* if ( $pagenation ) { ?>
              <div class="barcode_pagination" data-current_page="<?php echo $current_page; ?>" data-post_per_page="<?php echo $posts_per_page; ?>"><?php echo $pagenation; ?></div>
              <?php } */ ?>
        <?php } else { ?>
            <p>No Printers Found With Your Filter!!!!!!</p>
        <?php } ?>
    </div>
    <?php
    exit();
}

/*
 * find dealer filter
 */
add_action( 'wp_ajax_toshiba_find_dealer_filter', 'toshiba_find_dealer_filter_function' );
add_action( 'wp_ajax_nopriv_toshiba_find_dealer_filter', 'toshiba_find_dealer_filter_function' );

function toshiba_find_dealer_filter_function() {
    ?>
    <div class="container">
        <div class="dealer_listing_wrap">
            <?php
            $dealer_region  = $_POST[ 'dealer_region' ];
            $dealer_product = $_POST[ 'dealer_product' ];
            $dealer_args    = array (
                'post_type'      => TOSHIBA_DEALER_POST_TYPE,
                'posts_per_page' => -1,
                'meta_query'     => array (
                    'relation' => 'AND'
                )
            );
            if ( $dealer_region ) {
                $dealer_args[ 'meta_query' ][] = array (
                    'key'     => 'toshiba_dealer_region',
                    'compare' => '=',
                    'value'   => $dealer_region
                );
            }
            if ( $dealer_product ) {
                $dealer_args[ 'meta_query' ][] = array (
                    'key'     => 'toshiba_dealer_printers_sell',
                    'compare' => 'LIKE',
                    'value'   => "$dealer_product"
                );
            }
            $dealer_query = new WP_Query( $dealer_args );
            while ( $dealer_query->have_posts() ) {
                $dealer_query->the_post();
                $dealer_id    = get_the_ID();
                $dealer_title = get_the_title();
                if ( class_exists( 'acf' ) ) {
                    $dealer_city    = get_field( 'toshiba_dealer_city', $dealer_id );
                    $dealer_phone   = get_field( 'toshiba_dealer_phone', $dealer_id );
                    $dealer_email   = get_field( 'toshiba_dealer_mail', $dealer_id );
                    $dealer_website = get_field( 'toshiba_dealer_website', $dealer_id );
                    $dealer_address = get_field( 'toshiba_dealer_address', $dealer_id );
                }
                ?>
                <div class="find-dealer_in">
                    <span>
                        <?php echo $dealer_city; ?>
                    </span>
                    <div class="content">
                        <h4><?php echo $dealer_title; ?></h4>
                        <?php echo $dealer_address; ?>
                        <strong> <?php _e( 'Phone:', 'tosiba' ); ?> <?php echo $dealer_phone; ?></strong>
                        <strong> <?php _e( 'Email:', 'tosiba' ); ?> <?php echo $dealer_email; ?></strong>
                    </div>
                    <a href="<?php echo $dealer_website; ?>" class="" target="_blank"><?php echo $dealer_website; ?></a>
                </div>

                <?php
            }
            wp_reset_query();
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <?php
    exit();
}
