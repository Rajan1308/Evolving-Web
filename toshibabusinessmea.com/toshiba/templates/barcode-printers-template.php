<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Barcode & label Printers Template
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
    $device_type_obj   = get_field_object( 'field_5ffda609cdd70' );
    $label_width_obj   = get_field_object( 'field_5ffda67acdd71' );
    $resolution_obj    = get_field_object( 'field_5ffda757cdd73' );
    $features_obj      = get_field_object( 'field_5ffda79acdd74' );
    $print_speed_obj   = get_field_object( 'field_5ffda85805ef2' );
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
$barcode_cat_id      = $printer_categories[ 1 ]->term_id;
$paged               = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;
//$printers_per_page   = ($printers_per_page) ? $printers_per_page : 8;
$printers_per_page   = 4;
$barcode_print_args  = array (
    'post_type'      => TOSHIBA_PRINTER_POST_TYPE,
    'posts_per_page' => $printers_per_page,
    'paged'          => $paged,
    'order'          => 'DESC',
    'orderby'        => 'title',
    'tax_query'      => array (
        array (
            'taxonomy' => TOSHIBA_PRINTER_CAT_POST_TAX,
            'field'    => term_id,
            'terms'    => $barcode_cat_id
        )
    )
);
$barcode_print_query = new WP_Query( $barcode_print_args );
?>

<div class="barcode-label-printers">
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
                                <img src="<?php echo $feature_img; ?>" alt="<?= $feature_title ?>">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        

<div class="printer_cat_section">
    <div class="printer_cat_wrap" >
        <div class="printer_cat label_printer_cat" data-device_type="" data-label_width="" data-resolution="" data-feature="" >
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
                        <a class="barcode_clear_all"><?php _e( 'Clear All filters', 'tosiba' ); ?></a>
                    </div>
                </div>
                <div class="device_type filter-in">
                    <h6><?php echo $device_type_obj[ 'label' ]; ?></h6>
                    <div class="printer_cat_in"> 
                        <div class="filter_btn">
                            <?php foreach ( $device_type_obj[ 'choices' ] as $key => $value ) {
                                ?>
                                <div class="input">  
                                    <input type="radio" name="device_type" class="device_type_choice choice" data-filter="device_type" id="<?php echo $key; ?>" data-choice="<?php echo $key; ?>" /> 
                                    <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <a class="clear_filter">Clear</a>
                    </div>
                </div>
                <div class="label_width filter-in">
                    <h6><?php echo $label_width_obj[ 'label' ]; ?></h6>
                    <div class="printer_cat_in"> 
                        <div class="filter_btn">
                            <?php foreach ( $label_width_obj[ 'choices' ] as $key => $value ) {
                                ?>
                                <div class="input">   
                                    <input type="radio" name="label_width" class="label_width_choice choice" data-filter="label_width" id="<?php echo $key; ?>" data-choice="<?php echo $key; ?>" /> 
                                    <label for="<?php echo $key; ?>"><?php echo $value; ?><?php _e( ' inch', 'tosiba' ); ?></label>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <a class="clear_filter"><?php _e( 'Clear', 'tosiba' ); ?></a>
                    </div>
                </div>
                <div class="label_width filter-in">
                    <h6><?php echo $print_speed_obj[ 'label' ]; ?></h6>
                    <div class="printer_cat_in"> 
                        <div class="filter_btn">
                            <div class="input">
                                <input type="radio" name="print_speed" class="print_speed_choice choice" data-filter="print_speed" id="print_speed_5" data-choice="{5,5}" />
                                <label for="print_speed_5"><?php _e( '5 inch/sec', 'tosiba' ); ?></label>       
                            </div>   
                            <div class="input">
                                <input type="radio" name="print_speed" class="print_speed_choice choice" data-filter="print_speed" id="print_speed_6" data-choice="{0,6}" />               
                                <label for="print_speed_6"><?php _e( '< 6 inch/sec', 'tosiba' ); ?> </label>
                            </div>   
                            <div class="input">
                                <input type="radio" name="print_speed" class="print_speed_choice choice" data-filter="print_speed" id="print_speed_69" data-choice="{6,9}" />    
                                <label for="print_speed_69"><?php _e( '6 - 9 inch/sec', 'tosiba' ); ?> </label>
                            </div>   
                            <div class="input">
                                <input type="radio" name="print_speed" class="print_speed_choice choice" data-filter="print_speed" id="print_speed_9" data-choice="{10,<?php echo PHP_INT_MAX; ?>}" />               
                                <label for="print_speed_9"> <?php _e( '> 9 inch/sec', 'tosiba' ); ?> </label>
                            </div>   
                        </div>
                        <a class="clear_filter"><?php _e( 'Clear', 'tosiba' ); ?></a>
                    </div>
                </div>
                <div class="resolution filter-in">
                    <div class="features_inner">
                        <h6><?php echo $resolution_obj[ 'label' ]; ?></h6>
                        <div class="printer_cat_in"> 
                            <div class="filter_btn">
                                <?php
                                $i = 1;
                                foreach ( $resolution_obj[ 'choices' ] as $key => $value ) {
                                    ?>
                                    <div class="input">   
                                        <input type="radio" name="resolution" class="resolution_choice choice" data-filter="resolution" id="<?php echo $key; ?>" data-choice="<?php echo $key; ?>" />
                                        <label for="<?php echo $key; ?>"><?php echo $value; ?><?php _e( ' dpi', 'tosiba' ); ?></label>
                                    </div>
                                    <?php
                                    $i ++;
                                }
                                ?>
                            </div>
                            <a class="clear_filter"><?php _e( 'Clear', 'tosiba' ); ?></a>
                        </div>
                    </div>
                </div>
                <div class="features filter-in">
                    <div class="features_inner">
                        <h6><?php echo $features_obj[ 'label' ]; ?></h6>
                        <div class="printer_cat_in"> 
                            <div class="filter_btn">
                                <?php foreach ( $features_obj[ 'choices' ] as $key => $value ) {
                                    ?>
                                    <div class="input"> 
                                        <input type="radio" name="features" class="features_choice choice" data-filter="feature" id="<?php echo $key; ?>" data-choice="<?php echo $key; ?>" />
                                        <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                                    </div> 
                                <?php }
                                ?>
                            </div>
                            <a class="clear_filter"><?php _e( 'Clear', 'tosiba' ); ?></a>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="line lie-bottom"></div>
        </div>

        <div class="category_printers label_category_printer" >
            <div class="">
                <div class="category_printers_inner display_flex multifunction_printers_section">
                    <?php $ab = 0;
                    while ( $barcode_print_query->have_posts() ) {
                        $barcode_print_query->the_post();
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
                                            <a href="<?php echo $brochure; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-barcode<?= $ab + 1 ?>" tabindex="0"><?php echo $brochure_title; ?></a>
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
                        <?php $ab ++;
                    }
                    if($barcode_print_query->max_num_pages > 1) {
                        ?>
                        <div class="printer_load_more" data-current_page="1" data-post_per_page="<?php echo $printers_per_page; ?>">
                            <img src="https://nexatestwp.com/toshiba/wp-content/uploads/2021/04/ajax-loader.gif" alt="alt"/>
                        </div>
                        <?php
                    }
                    $pagenation = paginate_links( array (
                        'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'total'        => $barcode_print_query->max_num_pages,
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
                        <?php if ( ! empty( $sales_title ) ) { ?>
                            <div class="sec-main-titel"><?php echo $sales_title; ?></div>
                        <?php } ?>
                        <?php if ( ! empty( $sales_desc ) ) { ?>
                            <div class="prag"><?php echo strip_tags( $sales_desc ); ?></div>
                        <?php } ?>
                    </div>
                    <?php if ( ! empty( $enquiry_form ) ) { ?>                    
                        <div class="right">
                            <div class="inner" style=" background: url(https://nexatestwp.com/toshiba/wp-content/uploads/2021/01/enquiry-form.png) no-repeat;background-size: 100% 100%;">
                                <div class="contact_us_form">
                                    <?php #echo do_shortcode( $enquiry_form ); ?>
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
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="Supplies_products Sales_Enquiry" >
    <div class="Container-fluid">
        <div class="Supplies_products_image">
            <div class="image">
                <?php if ( ! empty( $supply_img ) ) { ?>
                    <img src="<?php echo $supply_img; ?>" alt="<?= $supply_title ?>">
                <?php } ?>
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
                <?php
                if ( ! empty( $supply_desc ) ) {
                    echo $supply_desc;
                }
                ?>
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
                                    <img src="<?php echo $supply[ 'toshiba_printer_cat_supply_img' ]; ?>" alt="<?= $supply[ 'toshiba_printer_cat_supply_title' ] ?>">
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