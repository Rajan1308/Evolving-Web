<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;
/*
 * Template Name: Find Dealer Template
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
?>

<div class="find_Dealer">
    <div class="printer_cat_wrap" >
        <div class="printer_cat">
            <div class="line"></div>
            <div class="inner find_dealer_filter" data-dealer_region="" data-dealer_product="">
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
                        <a class="clear_all_filters"><?php _e( 'Clear All filters', 'tosiba' ); ?></a>
                    </div>
                </div>                              
                <div class="device_type filter-in">
                    <h6><?php echo $dealer_regions[ 'label' ]; ?></h6>
                    <div class="printer_cat_in"> 
                        <div class="filter_btn">
                            <?php foreach ( $dealer_regions[ 'choices' ] as $key => $value ) {
                                ?>
                                <div class="input">  
                                    <input type="radio" name="dealer_region_name" class="dealer_region_choice choice" data-filter="dealer_region" id="<?php echo $key; ?>"/> 
                                    <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <a class="clear_filter"><?php _e( 'Clear', 'tosiba' ); ?></a>
                    </div>
                </div>  
                <div class="device_type filter-in">
                    <h6><?php echo $dealer_products[ 'label' ]; ?></h6>
                    <div class="printer_cat_in"> 
                        <div class="filter_btn">
                            <?php foreach ( $dealer_products[ 'choices' ] as $key => $value ) {
                                ?>
                                <div class="input">  
                                    <input type="radio" name="dealer_product_name" class="dealer_product_choice choice" data-filter="dealer_product" id="<?php echo $key; ?>"/> 
                                    <label for="<?php echo $key; ?>"><?php echo $value; ?></label>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <a class="clear_filter"><?php _e( 'Clear', 'tosiba' ); ?></a>
                    </div>
                </div>                                                                                                      
            </div>
            <div class="line lie-bottom"></div>
        </div>

        <div class="category_printers dealer_filter_map" >
            <div class="">
                <?php echo do_shortcode( $map_shortcode ); ?>                
            </div>
        </div>
    </div>
</div>
<div class="dealer_listing light-bg" >
    <div class="container">
        <div class="dealer_listing_wrap">
            <?php
            $dealer_args  = array (
                'post_type'      => TOSHIBA_DEALER_POST_TYPE,
                'posts_per_page' => -1
            );
            $dealer_query = new WP_Query( $dealer_args );
            if ( $dealer_query->have_posts() ) {
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
            }
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>