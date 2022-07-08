<?php get_header(); ?>
<?php
$site_url = site_url();
if ( class_exists( 'acf' ) ) {
    /* About Section */
    $about_sec_title          = get_field( 'toshiba_front_t_title' );
    $about_sec_nav_title      = get_field( 'toshiba_front_t_nav_title' );
    $about_sec_desc           = get_field( 'toshiba_front_t_desc' );
    $about_sec_img            = get_field( 'toshiba_front_t_img' );
    $about_sec_list           = get_field( 'toshiba_front_t_bmenu' );
    $about_sec_more_txt       = get_field( 'toshiba_front_t_rm_txt' );
    $about_sec_more_link      = get_field( 'toshiba_front_t_rm_link' );
    $about_sec_more_txt       = ! empty( $about_sec_more_txt ) ? $about_sec_more_txt : 'Read More ';
    $about_sec_more_link_href = ! empty( $about_sec_more_link ) ? 'href="' . $about_sec_more_link . '"' : '';
    /* Supplies Section */
    $supply_sec_title         = get_field( 'toshiba_front_sup_title' );
    $supply_sec_nav_title     = get_field( 'toshiba_front_sup_nav_title' );
    $supply_sec_desc          = get_field( 'toshiba_front_sup_desc' );
    $supply_sec_nav_txt       = get_field( 'toshiba_front_sup_nav_txt' );
    $supply_sec_nav_link      = get_field( 'toshiba_front_sup_nav_link' );
    $supply_sec_printer       = get_field( 'toshiba_front_sup_printer' );
    $supply_sec_nav_txt       = ! empty( $supply_sec_nav_txt ) ? $supply_sec_nav_txt : 'View General Supplies ';
    /* Solution Section */
    $sol_sec_title            = get_field( 'toshiba_front_sol_title' );
    $sol_sec_nav_title        = get_field( 'toshiba_front_sol_nav_title' );
    $sol_sec_desc             = get_field( 'toshiba_front_sol_desc' );
    $sol_sec_bg_img           = get_field( 'toshiba_front_sol_img' );
    $solutions                = get_field( 'toshiba_front_solution' );
    $sol_page_link_txt        = get_field( 'toshiba_front_sol_link_txt' );
    $sol_page_link            = get_field( 'toshiba_front_sol_link' );
    $sol_page_link_txt        = ! empty( $sol_page_link_txt ) ? $sol_page_link_txt : 'View Solutions Page ';
    /* Services Section */
    $service_sec_title        = get_field( 'toshiba_front_s_title' );
    $service_sec_nav_title    = get_field( 'toshiba_front_s_nav_title' );
    $service_sec_desc         = get_field( 'toshiba_front_s_desc' );
    $service_pages            = get_field( 'toshiba_front_s_pages' );
    /* Media Center */
    $media_center_title       = get_field( 'toshiba_front_m_title' );
    $media_center_nav_title   = get_field( 'toshiba_front_m_nav_title' );
    /* Printers */
    $product_nav_title        = get_field( 'toshiba_front_t_prod_nav_title' );
    $multifn_view_all_text    = get_field( 'toshiba_front_p_multi_view_title' );
    $multifn_view_all_link    = get_field( 'toshiba_front_p_multi_view_link' );
    $barcode_view_all_text    = get_field( 'toshiba_front_p_barcode_view_title' );
    $barcode_view_all_link    = get_field( 'toshiba_front_p_barcode_view_link' );
    $printer_cat_show         = get_field( 'toshiba_front_print_cat' );
    $printer_categories       = get_terms( TOSHIBA_PRINTER_CAT_POST_TAX, array (
        'hide_empty' => true
            ) );
    $printer_cat_barcode_name = $printer_categories[ 0 ]->name;
    $printer_cat_multifn_name = $printer_categories[ 1 ]->name;
	
	
}
?>
<!--About Section--> 
<section class="about-toshiba padding-top">
    <div class="container">
        <div class="about_toshib_inner display_flex">
            <div class="left">
                <div class="toshiba_title">
                    <?php if ( ! empty( $about_sec_nav_title ) ) { ?>
                        <strong><?php echo $about_sec_nav_title; ?></strong> 
                    <?php } ?>
                    <?php if ( ! empty( $about_sec_title ) ) { ?>
                        <h2><?php echo $about_sec_title; ?></h2>                                    
                    <?php } ?>
                    <?php
                    if ( ! empty( $about_sec_desc ) ) {
                        echo $about_sec_desc;
                    }
                    ?>					
                </div>
                <div class="content">
                    <?php if ( ! empty( $about_sec_list ) ) { ?>
                        <ul>
                            <?php foreach ( $about_sec_list as $item ) { 
                                // print_r($item);
                                ?>
                                <?php if ( ! empty( $item[ 'toshiba_front_t_bmenu_title' ] ) ) { ?>
                                    <li >
                                        <a <?php echo ! empty( $item[ 'toshiba_front_t_bmenu_link' ] ) ? 'href="' . $item[ 'toshiba_front_t_bmenu_link' ] . '"' : ''; 
                                            if($item['toshiba_front_t_bmenu_link'] == 'https://www.toshiba.co.jp/env/en/index.htm'){echo 'target=""'; }?>>
                                        <?php echo $item[ 'toshiba_front_t_bmenu_title' ]; ?>
                                        </a>
                                    </li>                            
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <div class="button_text">
                        <a <?php echo $about_sec_more_link_href ?>><?php echo $about_sec_more_txt; ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="about_image">
                    <?php if ( ! empty( $about_sec_img ) ) { ?>
                        <img src="<?php echo $about_sec_img; ?>" alt="Toshiba in the Middle East, Africa and Turkey" class="about-right lazyloaded">
                    <?php } ?>
                </div>
                <div class="left_image">
                    <img src="<?php echo $site_url; ?>/wp-content/uploads/2021/01/about-image-bottom.png" alt="Left Strip Image" class="about-right lazyloaded">
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$multifn_printer_args  = array (
    'post_type' => TOSHIBA_PRINTER_POST_TYPE,
	'posts_per_page' => 4,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'ignore_sticky_posts' => true,
    'no_found_rows' => true,
    'cache_results' => false,
    'tax_query' => array (
        array (
            'taxonomy' => TOSHIBA_PRINTER_CAT_POST_TAX,
            'field'    => 'name',
            'terms'    => $printer_cat_multifn_name
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
                        <?php } ?>
                        <h3><?php echo $printer_cat_multifn_name; ?></h3>
                    </div>
                    <?php if ( !empty ( $multifn_view_all_text ) || ! empty($multifn_view_all_link) ) { ?>
                        <div class="view_all"><a href="<?php echo $multifn_view_all_link; ?>"><?php echo $multifn_view_all_text; ?><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    <?php } ?>
                </div>
            </div>
            <div class="multifunction_printers_section multifunction_printers_section_slide">
                <?php $ab = 0;
                while ( $multifn_printer_query->have_posts() ) {
                    $multifn_printer_query->the_post();
                    $printer_id      = get_the_ID();
                    $printer_title   = get_the_title();
                    $printer_img     = wp_get_attachment_image_src( get_post_thumbnail_id( $printer_id), 'medium');
                    

                    $printer_excerpt = wp_trim_words( get_the_excerpt(), 25 );
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
                            <a href="<?php echo $printer_link; ?>">
                                <div class="image">
                                <?php if ( ! empty( $printer_img ) ) { ?>
                                    <img src="<?php echo $printer_img[0]; ?>"  alt="<?= $printer_title ?>" class="lazyloaded">
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
                                <?php if ( ! empty( $printer_excerpt ) ) { ?>
                                    <p><?php echo $printer_excerpt; ?></p>
                                <?php } ?>
                                
                            </div>
                            </a>
                            <div class="button-1" style="text-align:center">
                                    <a href="<?php echo $printer_link; ?>">
                                        Know More <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>
                            <?php if ( ! empty( $brochure ) && $download_brochure ) { ?>
                                <div class="Download_Brochure button-popup">

									<a href="<?php echo $brochure; ?>" class="printerspdf" id="downloadpdf"  data-fancybox data-src="#hidden-content-multi<?= $ab + 1 ?>"  tabindex="0"><?php echo $brochure_btn_txt; ?></a>
                                </div>
                            <?php } ?>
							
<div class="Request_quote_form contact_us_form" id="hidden-content-multi<?= $ab + 1 ?>" style="display: none;">
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
                    </div>                  
                    <?php $ab++;
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>
            </div>

        </div>
        <div class="section_left_image">
            <img class="lazyloaded" src="<?php echo $site_url; ?>/wp-content/uploads/2021/01/right-img.png" alt="left Background image">
        </div>
    </section>
    
<?php } ?>
<?php
//$barcode_cat_id = 
$barcode_printer_args  = array (
    'post_type' => TOSHIBA_PRINTER_POST_TYPE,
	'posts_per_page' => 4,
    'fields' => 'ids',
    'tax_query' => array (
        array (
            'taxonomy' => TOSHIBA_PRINTER_CAT_POST_TAX,
            'field'    => 'name',
            'terms'    => $printer_cat_barcode_name
        )
    )
);
$barcode_printer_query = new WP_Query( $barcode_printer_args );
if ( $barcode_printer_query->have_posts() ) {
    ?>
    <section class="products_sectoin Barcode_sectoin  padding-top position_relative padding-bottom">
        <div class="products_wrap">	
            <div class="container">
                <div class="products_title">
                    <div class="toshiba_title">
                        <?php if ( ! empty( $printer_cat_barcode_name ) ) { ?>
                            <h3><?php echo $printer_cat_barcode_name; ?></h3>
                        <?php } ?>
                    </div>
                    <?php if ( !empty ( $barcode_view_all_link ) || ! empty($barcode_view_all_text) ) { ?>
                        <div class="view_all"><a href="<?php echo $barcode_view_all_link; ?>"><?php echo $barcode_view_all_text; ?><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                    <?php } ?>
                </div>
            </div>
            <div class="multifunction_printers_section multifunction_printers_section_slide">
                <?php $ab = 0;
                while ( $barcode_printer_query->have_posts() ) {
                    $barcode_printer_query->the_post();
                    $printer_id      = get_the_ID();
                    $printer_title   = get_the_title();
                    $printer_img     = wp_get_attachment_image_src( get_post_thumbnail_id( $printer_id), 'medium');
                    $printer_excerpt = wp_trim_words( get_the_excerpt(), 25 );
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
                            <a href="<?php echo $printer_link; ?>">
                            <div class="image">
                                <?php if ( ! empty( $printer_img ) ) { ?>
                                    <img src="<?php echo $printer_img[0]; ?>" alt="<?= $printer_title ?>" class="lazyloaded">
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
                                <?php if ( ! empty( $printer_excerpt ) ) { ?>
                                    <p><?php echo $printer_excerpt; ?></p>
                                <?php } ?>                                                           
                            </div>
                            </a>
                            <div class="button-1" style="text-align:center">
                                    <a href="<?php echo $printer_link; ?>">
                                        Know More <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </div>

                            

                            <?php if ( ! empty( $brochure ) && $download_brochure ) { ?>
                                <div class="Download_Brochure test">
<a href="<?php echo $brochure; ?>" class="printerspdf" id="downloadpdf"  data-fancybox data-src="#hidden-content-barcode<?= $ab + 1 ?>"  tabindex="0"><?php echo $brochure_btn_txt; ?></a>
                                </div>
                            <?php } ?>
							
<div class="Request_quote_form contact_us_form" id="hidden-content-barcode<?= $ab + 1 ?>" style="display: none;">
                                            
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
                    </div>
                    <?php $ab++;
                }
                wp_reset_postdata();
                wp_reset_query();
                ?>                 
            </div>

        </div>
        <div class="section_right_image">
            <img src="<?php echo $site_url; ?>/wp-content/uploads/2021/01/left-image.png" alt="background left image" class="lazyloaded">
        </div>
    </section>
<?php } ?>
<!--Supplies Section-->
<section class="Supplies_section">
    <div class="container">
        <div class="Supplies_section_wrap Supplies_section_wrap_new">
            <div class="toshiba_title color-white">
                <?php if ( ! empty( $supply_sec_nav_title ) ) { ?>
                    <strong><?php echo $supply_sec_nav_title; ?></strong>
                <?php } ?>
                <?php if ( ! empty( $supply_sec_title ) ) { ?>
                    <h3><?php echo $supply_sec_title; ?></h3>
                <?php } ?>
                <?php
                if ( ! empty( $supply_sec_desc ) ) {
                    echo $supply_sec_desc;
                }
                ?>
                <?php if ( ! empty( $supply_sec_nav_link ) ) { ?>
                    <div class="button_text"><a href="<?php echo $supply_sec_nav_link; ?>"><?php echo $supply_sec_nav_txt; ?><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
                <?php } ?>
            </div>
            <?php if ( ! empty( $supply_sec_printer ) ) { ?>            
                <div class="Supplies_left_section">
                    <div class="supplies_inner">
                        <div class="supplies_inner_new_image">
                            <img src="<?php echo $site_url; ?>/wp-content/uploads/2021/03/Supplies-1.jpg" alt="supplies " class="lazyloaded">
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!--Solution Section-->
<section class="Solutions_section padding-bottom padding-top">
    <div class="Solutions_section_wrap right-padding ">
        <div class="Solutions_content">
            <div class="image">
                <?php if ( ! empty( $sol_sec_bg_img ) ) { ?>
                    <img src="<?php echo $sol_sec_bg_img; ?>" alt="<?= $sol_sec_nav_title ?>" class="lazyloaded">
                <?php } ?>
            </div>
            <div class="main_content">
                <?php if ( ! empty( $sol_sec_nav_title ) ) { ?>
                    <strong><?php echo $sol_sec_nav_title; ?></strong>
                <?php } ?>
                <?php if ( ! empty( $sol_sec_title ) ) { ?>
                    <h1><?php echo $sol_sec_title; ?></h1>
                <?php } ?>
                <?php
                if ( ! empty( $sol_sec_desc ) ) {
                    echo $sol_sec_desc;
                }
                ?>
            </div>
        </div>
    </div>
    <?php if ( ! empty( $solutions ) ) { ?>
        <div class="Solutions_Management_wrap">
            <div class="container">
                <div class="Solutions_Management_section">
                    <?php foreach ( $solutions as $solution ) { ?>
                        <div class="Management_section">
                            <a <?php echo ! empty( $solution[ 'toshiba_front_solution_link' ] ) ? 'href="' . $solution[ 'toshiba_front_solution_link' ] . '"' : ''; ?>>
                                <div class="image">
                                    <?php if ( ! empty( $solution[ 'toshiba_front_solution_logo' ] ) ) { ?>
                                        <img src="<?php echo $solution[ 'toshiba_front_solution_logo' ]; ?>" class="image-none-hover lazyloaded">
                                        <img src="<?php echo $solution[ 'toshiba_front_solution_logo' ]; ?>" class="image-hover lazyloaded">
                                    <?php } ?>
                                </div>
                                <?php if ( ! empty( $solution[ 'toshiba_front_solution_title' ] ) ) { ?>
                                    <h4><?php echo $solution[ 'toshiba_front_solution_title' ]; ?></h4>
                                <?php } ?>
                            </a>	
                        </div>            
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ( ! empty( $sol_page_link ) ) { ?>
        <div class="button_text"><a href="<?php echo $sol_page_link; ?>"><?php echo $sol_page_link_txt; ?><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
    <?php } ?>
</section>

<!-- Our Services section -->
<section class="our_service_section padding-top padding-bottom">
    <div class="container">
        <div class="toshiba_title">
            <?php if ( ! empty( $service_sec_nav_title ) ) { ?>
                <strong><?php echo $service_sec_nav_title; ?></strong>
            <?php } ?>
            <?php if ( ! empty( $service_sec_title ) ) { ?>
                <h3><?php echo $service_sec_title; ?></h3>
            <?php } ?>
            <?php
            if ( ! empty( $service_sec_desc ) ) {
                echo $service_sec_desc;
            }
            ?>
        </div>
        <?php if ( ! empty( $service_pages ) ) { ?>
            <div class="our_service_wrap">
                <?php
                foreach ( $service_pages as $service_page_id ) {
                    if ( ! empty( $service_page_id ) ) {
                        $service_img       = wp_get_attachment_image_src( get_post_thumbnail_id( $service_page_id), 'medium');
                        $service_title     = get_the_title( $service_page_id );
                        $service_page_link = get_the_permalink( $service_page_id );
                        ?>
                        <div class="our_service_iinner">
                            <div class="inner">
                                <div class="image">
                                    <?php if ( ! empty( $service_img ) ) { ?>
									                   <a href="<?php echo $service_page_link; ?>">
                                      <img src="<?php echo $service_img[0]; ?>" alt="<?= $service_title ?>" class="lazyloaded">
                                    </a>
                                    <?php } ?>
                                </div>
                                <a href="<?php echo $service_page_link; ?>"><h4><?php echo $service_title; ?><img src="<?php echo $site_url; ?>/wp-content/uploads/2021/01/chevron-right.svg" alt="Right Arrow" class="lazyloaded"></h4></a>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>        
    </div>
</section>

<?php
$blogs_args  = array (
    'post_type'      => [TOSHIBA_POST_POST_TYPE,'event'],
    'posts_per_page' => 6,
    'no_found_rows' => true,
    'fields' => 'ids'
);
$blogs_query = new WP_Query( $blogs_args );
?>
<?php if ( ! empty( $blogs_query->have_posts() ) ) { ?>
    <section class="media_center padding-top padding-bottom">
        <div class="container">
            <div class="toshiba_title text-align ">
                <?php if ( ! empty( $media_center_nav_title ) ) { ?>
                    <strong><?php echo $media_center_nav_title; ?></strong>
                <?php } ?>
                <?php if ( ! empty( $media_center_title ) ) { ?>
                    <h3><?php echo $media_center_title; ?></h3>
                <?php } ?>
            </div>
            <div class="media_center_section">
                <?php
                while ( $blogs_query->have_posts() ) {
                    $blogs_query->the_post();
                    $blog_id             = get_the_ID();
                    $blog_title          = get_the_title();
                    $blog_img            = wp_get_attachment_image_src( get_post_thumbnail_id( $blog_id), 'medium');
                    $blog_permalink      = get_the_permalink();
                    $blog_category       = get_the_category();
                    $blog_type           = $blog_category[ 0 ]->name;
                    $author_id           = get_post_field( 'post_author', $blog_id );
                    $author_name         = get_the_author_meta( 'display_name', $author_id );
                    $blog_published_date = get_the_date( 'F Y', $blog_id );
                    $blog_desc           = wp_trim_words( get_the_excerpt(), 15 );
					         $external_url       = get_field('external_url', $blog_id);
                    if( class_exists( 'acf')){
                        $post_show_tag      = get_field('toshiba_blog_lat_pop');
                        if('event' == get_post_type() ) {
                            $post_show_title    = $post_show_tag == '1' ? __('Events','tosiba') : __('Events','tosiba') ;
                        } else {
                            $post_show_title    = $post_show_tag == '1' ? __('News','tosiba') : __('News','tosiba') ;
                        }
                    }
                    ?>
                    <div class="media_center_in">
                        <div class="inner">
                            <div class="image">
                                <a href="<?php if($external_url){ echo $external_url; }else{echo $blog_permalink; } ?>">
                                  <img src="<?php echo $blog_img[0]; ?>" alt="<?= $blog_title ?>" class="lazyloaded"></a>
                            </div>
                            <div class="content">
                                <div class="media">
                                    <strong><?php echo $post_show_title; ?></strong>
                                </div>
                                <div class="date">
                                    <ul>
                                        <li><?php echo $blog_published_date; ?></li>
                                        <?php if ( ! empty( $author_name ) ) { ?>
                                            <li><?php echo $author_name; ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <?php if ( ! empty( $blog_title ) ) { ?>
                                    <div class="title"><a href="<?php if($external_url){ echo $external_url; }else{echo $blog_permalink; } ?>"> <?php echo $blog_title; ?></a></div>
                                <?php } ?>
                                <?php if ( ! empty( $blog_desc ) ) { ?>
                                    <div class="main_text">
                                        <?php echo $blog_desc; ?>
                                    </div>
                                <?php } ?>
                                <div class="readmore"><a href="<?php if($external_url){ echo $external_url; }else{echo $blog_permalink; } ?>">Read More</a></div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <div class="overlay-bg"></div>
    <div class="overlay-content popup1">
       <div class="popup-content">
           <h3></h3>
           <button class="close-btn">X</button>
          
            <script>
            hbspt.forms.create({
                region: "na1",
                portalId: "8244541",
                formId: "9d556644-d84a-45ca-9dc0-2cf421816ac7"
            });
            </script>

       </div>
    </div>
    <div class="overlay-content popup2">
       <div class="popup-content">
          <h3>Enquire Now </h3> 
        <button class="close-btn">X</button>
       
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
<?php get_footer(); ?>