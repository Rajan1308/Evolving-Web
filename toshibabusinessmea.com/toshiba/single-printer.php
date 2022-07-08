<?php
/**
 * The template for displaying all single printer post and attachments
 *
 * @package WordPress
 * @subpackage TOSHIBA
 * @since Toshiba 1.0
 */
get_header();
while ( have_posts() ) {
    the_post();
    $id              = get_the_ID();
    $product_name    = get_the_title( $id );
    $product_content = get_the_content( $id );
    $product_image   = get_the_post_thumbnail_url( $id );
    if ( class_exists( 'acf' ) ) {
        $req_txt           = get_field( 'toshiba_printer_req_txt', $id );
        $req_link          = get_field( 'toshiba_printer_req_link', $id );
        $down_txt          = get_field( 'toshiba_printer_down_txt', $id );
        $down_link         = get_field( 'toshiba_printer_down_link', $id );
        $fb_title          = get_field( 'toshiba_printer_f_tab_title', $id );
        $features          = get_field( 'toshiba_printer_fb', $id );
        $spc_title         = get_field( 'toshiba_printer_s_tab_title', $id );
        $specifications    = get_field( 'toshiba_printer_sp', $id );
        $dwn_brch          = get_field( 'toshiba_brochure_download', $id );
        $dwn_brch_title    = get_field( 'toshiba_brochure_btn_txt', $id );
        $dwn_brch_file     = get_field( 'toshiba_brochure_file', $id );
        $product_nav_title = get_field( 'tosiba_printer_main_title', 'option' );
        $product_title     = get_field( 'tosiba_printer_title', 'option' );
    }
    ?>
    <div class="single_printer_item_wrap">
        <div class="single_printer_item">
            <div class="barcode-label-printers">
                <div class="container">
                    <div class="barcode-label_section">	            
                        <div class="barcode-label_wrap scroll-bar">
                            <div class="inner">
                                <div class="left prag">
                                    <?php if ( ! empty( $product_name ) ) { ?>
                                        <h4><?php echo $product_name; ?></h4>
                                    <?php } ?>
                                    <?php if ( ! empty( $product_content ) ) { ?>
                                        <p><?php echo $product_content; ?></p>                          
                                    <?php } ?>
                                </div>
                                <?php if ( ! empty( $product_image ) ) { ?>
                                    <div class="right">
                                        <div class="image">
                                            <img src="<?php echo $product_image; ?>" alt="<?= $product_name ?>">
                                        </div>	                        
                                    </div>
                                <?php } ?>
                                <div class="Downloads_btn">
                                    <?php if ( ! empty( $req_link ) || ! empty( $req_txt ) ) { ?>
<!--                                         <div class="button-1"><a href="#"><?php echo $req_txt; ?></a></div> -->
									<div class="button-1"><a href="#" data-fancybox data-src="#hidden-content" ><?php echo $req_txt; ?></a>
                                </div>
                                    <?php } ?>
                                    <?php if ( ! empty( $down_link ) || ! empty( $down_txt ) ) { ?>
                                        <div class="button-1"><a href="<?php echo $down_link; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-singlemulti" ><?php echo $down_txt; ?></a></div>
                                    <?php } ?>
                                </div>
								<?php if ( !empty ( $req_link ) ) { ?>
									<div class="Request_quote_form contact_us_form" id="hidden-content" style="display: none;">
									   <?php //echo do_shortcode($req_link);?>
                                       
                                        <script>
                                        hbspt.forms.create({
                                            region: "na1",
                                            portalId: "8244541",
                                            formId: "163aacff-7b6c-4432-aed4-71300ecdc91d"
                                        });
                                        </script>

									</div>
								<?php } ?>
								<?php if ( ! empty( $down_link ) || ! empty( $down_txt )  ) { ?>
									<div class="Request_quote_form contact_us_form" id="hidden-content-singlemulti" style="display: none;">
									   <?php // echo do_shortcode('[contact-form-7 id="2286" title="Download Brochure Form"]');?>
										<input type="hidden" id="pdflink" value="<?php echo $down_link; ?>" />
						   <script>
  hbspt.forms.create({
	region: "na1",
	portalId: "8244541",
	formId: "9d556644-d84a-45ca-9dc0-2cf421816ac7"
});
</script>
									</div>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="ui_single-tab light-bg single_printer_sec">
                <div class="border_sec">
                    <div class="e-bridge_tabbing ">
                        <div class="tabbing">
                            <ul class="tabs">
                                <?php if ( ! empty( $fb_title ) ) { ?>
                                    <li rel="tab0" class="active"><?php echo $fb_title; ?></li>
                                <?php } ?>
                                <?php if ( ! empty( $spc_title ) ) { ?>
                                    <li rel="tab1" class=""><?php echo $spc_title; ?></li>
                                <?php } ?>
                            </ul>
                            <div class="tab_container">
                                <?php if ( ! empty( $fb_title ) ) { ?>
                                    <h3 class=" tab_drawer_heading" rel="tab0"><?php echo $fb_title; ?></h3>
                                <?php } ?>
                                <?php if ( ! empty( $features ) ) { ?>
                                    <div id="tab0" class="tab_content">
                                        <div class="e-bridge_section">
                                            <div class="e-bridge_inner display_flex">
                                                <div class="content">
                                                    <?php
                                                    foreach ( $features as $feature_key => $feature_val ) {
                                                        $title   = $feature_val[ 'toshiba_printer_fb_title' ];
                                                        $content = $feature_val[ 'toshiba_printer_fb_ftr' ];
                                                        ?>
                                                        <div class="col col-4">
                                                            <?php if ( ! empty( $title ) ) { ?>
                                                                <h3><?php echo $title; ?></h3>
                                                            <?php } ?>
                                                            <?php if ( ! empty( $content ) ) { ?>
                                                                <?php echo $content; ?>
                                                            <?php } ?>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ( ! empty( $spc_title ) ) { ?>
                                    <h3 class=" tab_drawer_heading" rel="tab1"><?php echo $spc_title; ?></h3>
                                <?php } ?>
                                <?php if ( ! empty( $specifications ) ) { ?>
                                    <div id="tab1" class="tab_content">
                                        <div class="e-bridge_section">
                                            <div class="e-bridge_inner display_flex">
                                                <?php
                                                foreach ( $specifications as $specification_key => $specification_val ) {
                                                    $title         = $specification_val[ 'toshiba_printer_sp_title' ];
                                                    $specification = $specification_val[ 'toshiba_printer_sp_spec' ];
                                                    ?>
                                                    <div class="content">
                                                        <?php if ( ! empty( $title ) ) { ?>
                                                            <h2 class="sec-main-titel"><?php echo $title; ?></h2>
                                                        <?php } ?>
                                                        <?php if ( ! empty( $specification ) ) { ?>

                                                            <div class="content_wrap">
                                                                <?php
                                                                foreach ( $specification as $spc_key => $spc_val ) {
                                                                    $title   = $spc_val[ 'toshiba_printer_sp_spec_title' ];
                                                                    $content = $spc_val[ 'toshiba_printer_sp_spec_info' ];
                                                                    ?>
                                                                    <div class="wrap_inner">
                                                                        <?php if ( ! empty( $title ) ) { ?>
                                                                        <?php } ?>
                                                                        <div class="title"><?php echo $title; ?></div>
                                                                        <?php if ( ! empty( $content ) ) { ?>
                                                                            <div class="dec"><?php echo $content; ?></div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        <?php } ?>
                                                    </div>

                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- .tab_container -->
                        </div>
                    </div>
                    <!--                <div class="line"></div>-->
                    <div class="bottom_logo">
                        <img src="<?php echo site_url(); ?>/wp-content/themes/toshiba/images/challenge_shapes.png" alt="challenge shapes">
                    </div>
                </div>
                <?php
                if ( $dwn_brch ) {
                    if ( ! empty( $dwn_brch_file ) || ! empty( $dwn_brch_title ) ) {
                        ?>
                        <div class="Download_Brochure">
                            <a href="<?php echo $dwn_brch_file; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-barcode1" tabindex="0"><?php echo $dwn_brch_title; ?></a>
                        </div>
                        <?php
                    }
                }
                ?>
				<?php if ( ! empty( $dwn_brch_file ) || ! empty( $dwn_brch_title ) ) { ?>
<!--                        <div class="Request_quote_form contact_us_form" id="hidden-content-singbottom" style="display: none;">
                           <?php // echo do_shortcode('[contact-form-7 id="2286" title="Download Brochure Form"]');?>
                        </div>-->
                    <?php } ?>
            </section>
            <?php
            wp_reset_query();
        }
        ?>
        <?php
        $categories = get_the_terms( get_the_ID(), TOSHIBA_PRINTER_CAT_POST_TAX );
        foreach ( $categories as $category ) {
            $category_ids[] = $category->term_id;
        }
        $multifn_printer_args  = array (
            'post_type'      => TOSHIBA_PRINTER_POST_TYPE,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'category__in'   => $cat_ids,
            'post__not_in'   => array ( get_the_ID() ),
            'order'          => 'ASC',
            'date_query'     => array (
                'column' => 'post_date',
                'after'  => get_the_date()
            ),
            'tax_query'      => array (
                array (
                    'taxonomy' => TOSHIBA_PRINTER_CAT_POST_TAX,
                    'field'    => 'term_id',
                    'terms'    => $category_ids
                )
            )
        );
        $multifn_printer_query = new WP_Query( $multifn_printer_args );
        if ( $multifn_printer_query->have_posts() ) {
            while ( $multifn_printer_query->have_posts() ) {
                $multifn_printer_query->the_post();
                $post_id  = get_the_ID();
                $array1[] = $post_id;
            }
            wp_reset_query();
            wp_reset_postdata();
        }
        $multifn_printer_args  = array (
            'post_type'      => TOSHIBA_PRINTER_POST_TYPE,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'category__in'   => $cat_ids,
            'post__not_in'   => array ( get_the_ID() ),
            'order'          => 'ASC',
            'date_query'     => array (
                'column' => 'post_date',
                'before' => get_the_date()
            ),
            'tax_query'      => array (
                array (
                    'taxonomy' => TOSHIBA_PRINTER_CAT_POST_TAX,
                    'field'    => 'term_id',
                    'terms'    => $category_ids
                )
            )
        );
        $multifn_printer_query = new WP_Query( $multifn_printer_args );
        if ( $multifn_printer_query->have_posts() ) {
            while ( $multifn_printer_query->have_posts() ) {
                $multifn_printer_query->the_post();
                $post_id  = get_the_ID();
                $array1[] = $post_id;
            }
            wp_reset_query();
            wp_reset_postdata();
        }
        $multifn_printer_args  = array (
            'post_type'      => TOSHIBA_PRINTER_POST_TYPE,
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'category__in'   => $cat_ids,
            'post__not_in'   => array ( get_the_ID() ),
            'post__in'       => $array1,
            'orderby'        => 'post__in',
            'tax_query'      => array (
                array (
                    'taxonomy' => TOSHIBA_PRINTER_CAT_POST_TAX,
                    'field'    => 'term_id',
                    'terms'    => $category_ids
                )
            )
        );
        $multifn_printer_query = new WP_Query( $multifn_printer_args );
        if ( $multifn_printer_query->have_posts() ) {
            ?>
            <section class="products_sectoin padding-top  position_relative">
                <div class="products_wrap">	
                    <div class="container">
                        <div class="products_title">
                            <div class="toshiba_title">
                                <?php if ( ! empty( $product_nav_title ) ) { ?>
                                    <strong><?php echo $product_nav_title; ?></strong>
                                   <?php  $cat = $category_ids[0];
                                

                                   $catt = get_term_by('id', $cat, 'printer_cat'); 
                                  
                                   ?>
			
                                <?php } ?>
                                <?php if ( ! empty( $product_title ) ) { ?>
                                    <h3><?php  echo $catt->name; ?></h3>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="multifunction_printers_section multifunction_printers_section_slide">
                        <?php
                        while ( $multifn_printer_query->have_posts() ) {
                            $multifn_printer_query->the_post();
                            $printer_id      = get_the_ID();
                            $printer_title   = get_the_title();
                            $printer_img     = get_the_post_thumbnail_url();
                            $printer_content = get_the_content();
                            $printer_link    = get_the_permalink();
                            if ( class_exists( 'acf' ) ) {
                                $feature_list      = get_field( 'toshiba_printer_f_list', $printer_id );
                                $download_brochure = get_field( 'toshiba_brochure_download', $printer_id );
                                if ( $download_brochure ) {
                                    $brochure         = get_field( 'toshiba_brochure_file', $printer_id );
                                    $brochure_btn_txt = get_field( 'toshiba_brochure_btn_txt', $printer_id );
                                    $brochure_btn_txt = ! empty( $brochure_btn_txt ) ? $brochure_btn_txt : 'Download Brochure';
                                }
                            }
                            ?>
                            <div class="printers_inner">
                                <div class="inner">
                                    <a href="<?php echo $printer_link; ?>" >
                                    <div class="image">
                                        <?php if ( ! empty( $printer_img ) ) { ?>
                                            <img src="<?php echo $printer_img; ?>" alt="<?= $printer_title ?>">
                                        <?php } ?>
                                    </div>
                                    <div class="content">
                                        <?php if ( ! empty( $printer_title ) ) { ?>
                                            <h4><?php echo $printer_title; ?></h4>
                                        <?php } ?>
                                        <?php if ( ! empty( $feature_list ) ) { ?>
                                            <ul>
                                                <?php foreach ( $feature_list as $key => $value ) { ?>
                                                    <?php if ( ! empty( $value[ 'toshiba_printer_f_list_feature' ] ) ) { ?>
                                                        <li><?php echo $value[ 'toshiba_printer_f_list_feature' ]; ?></li>
                                                    <?php } ?>
                                                <?php } ?>                                        
                                            </ul>
                                        <?php } ?>
                                        <?php if ( ! empty( $printer_content ) ) { ?>
                                            <p><?php echo wp_trim_words( $printer_content, 30 ); ?></p>
                                        <?php } ?>
                                        
                                    </div>
                                    </a>
                                    <div class="button-1" style="text-align:center">
                                            <a href="<?php echo $printer_link; ?>">
                                                <?php _e( 'Know More', 'tosiba' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    

                                    <?php if ( ! empty( $brochure_btn_txt ) && ! empty( $brochure ) ) { ?>
                                        <div class="Download_Brochure">
                                            <a href="<?php echo $brochure; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-barcode1" download><?php echo $brochure_btn_txt; ?></a>
                                        </div>
                                    <?php } ?>
									<?php if ( ! empty( $brochure_btn_txt ) && ! empty( $brochure ) ) { ?>
<!--									<div class="Request_quote_form contact_us_form" id="hidden-content-relatdownload" style="display: none;">
									   <?php // echo do_shortcode('[contact-form-7 id="2286" title="Download Brochure Form"]');?>
									</div>-->
								<?php } ?>
                                </div>
                            </div>                  
                            <?php
                        }
                        wp_reset_postdata();
                        wp_reset_query();
                    }
                    ?>
                </div>

            </div>
            <div class="section_left_image">
                <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/right-img.png" alt="Single Printer Right Image">
            </div>
        </section>

    </div>
</div>
<?php get_footer(); ?>