<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;
/*
 * Template Name: Multifunction Printers Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
if ( class_exists( 'acf' ) ) {
    /* Feature Printer */
    $feature_title     = get_field( 'toshiba_printer_cat_f_title' );
    $feature_nav_title = get_field( 'toshiba_printer_cat_f_nav_title' );
    $feature_img       = get_field( 'toshiba_printer_cat_f_img' );
    $feature_desc      = get_field( 'toshiba_printer_cat_f_desc' );
    /* Printer Filter */
    $filter_title      = get_field( 'toshiba_printer_cat_p_filter_title' );
    $filter_info       = get_field( 'toshiba_printer_cat_p_filter_info' );
    $printers_per_page = get_field( 'toshiba_printer_cat_p_ppp' );
    $size_filter_obj   = get_field_object( 'field_5ffda02261296' );
    $color_filter_obj  = get_field_object( 'field_5ffda06161297' );
    $speed_filter_obj  = get_field_object( 'field_5ffda4afb38f1' );
    /* Sales Enquiry */
    $sales_title       = get_field( 'toshiba_printer_cat_se_title' );
    $sales_bg_img      = get_field( 'toshiba_printer_cat_se_img' );
    $sales_desc        = get_field( 'toshiba_printer_cat_se_desc' );
    $enquiry_form      = get_field( 'toshiba_printer_cat_se_form' );
    /* Supply */
    $supply_title      = get_field( 'toshiba_printer_cat_sup_title' );
    $supply_nav_title  = get_field( 'toshiba_printer_cat_sup_nav_title' );
    $supply_desc       = get_field( 'toshiba_printer_cat_sup_desc' );
    $supply_img        = get_field( 'toshiba_printer_cat_sup_timg' );
    $supply_view_txt   = get_field( 'toshiba_printer_cat_sup_view_txt' );
    $supply_view_link  = get_field( 'toshiba_printer_cat_sup_view_link' );
    $supplies          = get_field( 'toshiba_printer_cat_supply' );
}
$printer_categories  = get_terms( TOSHIBA_PRINTER_CAT_POST_TAX, array (
    'hide_empty' => false,
    'order'      => 'DESC'
        ) );
$multifn_cat_id      = $printer_categories[ 0 ]->term_id;
/*
 * multifunction printers
 */
//$printers_per_page   = ! empty( $printers_per_page ) ? $printers_per_page : 8;
$posts_per_page      = 4;
$paged               = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
$multifn_print_args  = array (
    'post_type'      => TOSHIBA_PRINTER_POST_TYPE,
    'posts_per_page' => $posts_per_page,
//    'posts_per_page' => $printers_per_page,
    'paged'          => $paged,
    'order'          => 'DESC',
    'orderby'        => 'title',
    'tax_query'      => array (
        array (
            'taxonomy' => TOSHIBA_PRINTER_CAT_POST_TAX,
            'field'    => term_id,
            'terms'    => $multifn_cat_id
        )
    )
);
$multifn_print_query = new WP_Query( $multifn_print_args );
?>
<div class="barcode-label-printers multifunction-printers">
    <div class="container">
        <div class="barcode-label_section">
            <div class="toshiba_title">
                <?php if ( ! empty( $feature_nav_title ) ) { ?>
                    <strong><?php echo $feature_nav_title; ?></strong> 
                <?php } ?>
                <?php if ( ! empty( $feature_title ) ) { ?>
                    <h2><?php echo $feature_title; ?></h2>  
                <?php } ?>
            </div>
            <div class="barcode-label_wrap scroll-bar">
                <div class="inner">
                    <div class="left prag">
                        <?php
                        if ( ! empty( $feature_desc ) ) {
                            echo $feature_desc;
                        }
                        ?>                        
                    </div>
                    <div class="right">
                        <div class="image">
                            <?php if ( ! empty( $feature_img ) ) { ?>
                                <img data-src="<?php echo $feature_img; ?>" src="<?php echo $feature_img; ?>" alt="<?= $feature_title ?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<!--Multifunctions printers-->
<div class="printer_cat_section multifunction-printers_printer_cat">
    <div class="printer_cat_wrap" >
        <div class="printer_cat multifn_printer_cat" data-size_filter="" data-color_filter="" data-speed_filter="" >
            <div class="line"></div>
            <div class="inner">
                <div class="filter_top_title filter-in">
                    <div class="filter-left">
                        <?php if ( ! empty( $filter_title ) ) { ?>
                            <h6><?php echo $filter_title; ?></h6>
                        <?php } ?>
                        <?php if ( ! empty( $filter_info ) ) { ?>
                            <p><?php echo $filter_info; ?></p>
                        <?php } ?>
                    </div>
                    <div class="filter-right">
                        <a class="multifn_clear_all">Clear All filters</a>
                    </div>
                </div>
                <div class="size_filter">
                    <h6><?php echo $size_filter_obj[ 'label' ]; ?></h6>
                    <div class="printer_cat_in"> 
                        <div class="filter_btn">
                            <?php foreach ( $size_filter_obj[ 'choices' ] as $key => $value ) {
                                ?>
                                <div class="input">  
                                    <input type="radio" name="size_filter" class="size_filter_choice choice" data-filter="size_filter" id="<?php echo $key; ?>" data-choice="<?php echo $key; ?>" /> 
                                    <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <a class="clear_filter">Clear</a>
                    </div>
                </div>
                <div class="color_filter">
                    <h6><?php echo $color_filter_obj[ 'label' ]; ?></h6>
                    <div class="printer_cat_in"> 
                        <div class="filter_btn">
                            <?php foreach ( $color_filter_obj[ 'choices' ] as $key => $value ) {
                                ?>
                                <div class="input">  
                                    <input type="radio" name="color_filter" class="color_filter_choice choice" data-filter="color_filter" id="<?php echo $key; ?>" data-choice="<?php echo $key; ?>" /> 
                                    <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <a class="clear_filter">Clear</a>
                    </div>
                </div>
                <div class="speed_filter">
                    <h6><?php echo $speed_filter_obj[ 'label' ]; ?></h6>
                    <div class="printer_cat_in"> 
                        <div class="filter_btn">
                            <?php foreach ( $speed_filter_obj[ 'choices' ] as $key => $value ) {
                                ?>
                                <div class="input">  
                                    <input type="radio" name="speed_filter" class="speed_filter_choice choice" data-filter="speed_filter" id="<?php echo $key; ?>" data-choice="<?php echo $key; ?>" /> 
                                    <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <a class="clear_filter">Clear</a>
                    </div>
                </div>
            </div>
            <div class="line lie-bottom"></div>
        </div>
        <div class="category_printers multifn_category_printer" >
            <div class="">
                <div class="category_printers_inner display_flex multifunction_printers_section">
                    <?php
                    $ab = 0;
                    while ( $multifn_print_query->have_posts() ) {
                        $multifn_print_query->the_post();
                        $printer_id        = get_the_ID();
                        $printer_title     = get_the_title();
                        $printer_image     = wp_get_attachment_image_src( get_post_thumbnail_id( $printer_id), 'medium');

                        $printer_desc      = get_the_content();
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
                                            <img data-src="<?php echo $printer_image[0]; ?>" src="<?php echo $printer_image[0]; ?>" alt="<?= $printer_title ?>">
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
                                            echo wp_trim_words( $printer_desc, 30 );
                                        }
                                        ?>

                                    </div>
                                </a>

                                <div class="card-action">
                                    <?php if ( $brochure_download && ! empty( $brochure ) ) { ?>
                                        <div class="Download_Brochure">
                                            <a href="<?php echo $brochure; ?>" class="printerspdf" id="downloadpdf"  data-fancybox data-src="#hidden-content-multifunction<?= $ab + 1 ?>" tabindex="0"><?php echo $brochure_title; ?></a>
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
                                            <?php _e( 'Know More', 'tosiba' ); ?> <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $ab ++;
                    }
                    if ( $multifn_print_query->max_num_pages > 1 ) {
                        ?>
                        <div class="printer_load_more" data-current_page="1" data-post_per_page="<?php echo $posts_per_page; ?>">
                            <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2021/04/ajax-loader.gif" alt="ajax loader"/>
                        </div>
                        <?php
                    }
                    $pagenation = paginate_links( array (
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $multifn_print_query->max_num_pages,
                        'current'      => max( 1, get_query_var( 'paged' ) ),
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'prev_next'    => true,
                        'prev_text'    => sprintf( '<i></i> %1$s', __( 'Prev', 'text-domain' ) ),
                        'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
                        'add_args'     => false,
                        'add_fragment' => '',
                            ) );
                    wp_reset_postdata();
                    wp_reset_query();
                    ?>
                </div>
                <!--<div class="barcode_pagination" data-current_page="" data-post_per_page="<?php echo $printers_per_page; ?>"><?php echo $pagenation; ?></div>-->

            </div>
        </div>
    </div>
</div>

<section class="Sales_Enquiry position_relative" style="background:url(<?php echo $sales_bg_img; ?>) no-repeat center  /cover;">
    <div class="Sales_Enquiry_inner">
        <div class="Container-fluid">
            <div class="Sales_Enquiry_section">
                <div class="inner">
                    <div class="left scroll-bar">
                        <div class="sec-main-titel">
                            <?php
                            if ( ! empty( $sales_title ) ) {
                                echo $sales_title;
                            }
                            ?>
                        </div>
                        <div class="prag">
                            <?php echo strip_tags( $sales_desc ); ?>
                        </div>
                    </div>
                    <div class="right">
                        <div class="inner" style="background: url(https://www.toshibabusinessmea.com/wp-content/uploads/2021/01/enquiry-form.png) no-repeat;background-size: 100% 100%;">
                            <div class="contact_us_form">                                
                                <?php //echo do_shortcode( $enquiry_form ); ?>
                                <!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
	region: "na1",
	portalId: "8244541",
	formId: "daec5470-247c-42cd-8f44-4c871a3bbbe9"
});
</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="Supplies_products Sales_Enquiry" >
    <div class="Container-fluid">
        <div class="Supplies_products_image">
            <div class="image">
                <img data-src="<?php echo $supply_img; ?>" src="<?php echo $supply_img; ?>" alt="<?= $supply_title ?>">
            </div>
        </div>
        <div class="Supplies_products_content">
            <div class="title">
                <?php if ( ! empty( $supply_nav_title ) ) { ?>
                    <strong><?php echo $supply_nav_title; ?></strong>
                <?php } ?>
                <?php if ( ! empty( $supply_title ) ) { ?>
                    <h3><?php echo $supply_title; ?></h3>
                <?php } ?>
                <?php echo $supply_desc; ?>
                <?php if ( ! empty( $supply_view_link ) ) { ?>
                    <a href="<?php echo $supply_view_link; ?>"><?php echo $supply_view_txt; ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                <?php } ?>
            </div>
        </div>
        <?php if ( ! empty( $supplies ) ) { ?>        
            <div class="Supplies_products_image_in">
                <div class="Supplies_products_image_inner">
                    <?php foreach ( $supplies as $supply ) { ?>
                        <div class="Supplies_products_wrap">
                            <div class="image">
                                <?php if ( ! empty( $supply[ 'toshiba_printer_cat_supply_img' ] ) ) { ?>
                                    <img data-src="<?php echo $supply[ 'toshiba_printer_cat_supply_img' ]; ?>" src="<?php echo $supply[ 'toshiba_printer_cat_supply_img' ]; ?>" alt="<?= $supply[ 'toshiba_printer_cat_supply_title' ] ?>">
                                <?php } ?>
                            </div>
                            <?php if ( ! empty( $supply[ 'toshiba_printer_cat_supply_title' ] ) ) { ?>
                                <h5><?php echo $supply[ 'toshiba_printer_cat_supply_title' ]; ?></h5>
                            <?php } ?>
                        </div>
                    <?php } ?>                    
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</section>
<?php get_footer(); ?>