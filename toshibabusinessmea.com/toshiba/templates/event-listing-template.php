<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Event Listing Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
?>
<?php
if ( class_exists( 'acf' ) ) {
    $id           = get_the_ID();
    $title        = get_field( 'toshiba_event_title', $id );
    $top_image    = get_field( 'toshiba_event_top_right_image', $id );
    $top_image    = ! empty( $top_image ) ? $top_image[ 'url' ] : '';
    $bottom_image = get_field( 'toshiba_event_bottom_left_image', $id );
    $bottom_image = ! empty( $bottom_image ) ? $bottom_image[ 'url' ] : '';
}
?>
<!-- <h2>Events</h2> -->
<?php if ( ! empty( $title ) ) { ?>
    <div class="embedded_section_title">
        <div class="container">
            <h2><?php echo $title; ?></h2>
        </div>
    </div>
<?php } ?>
<section class="embedded_section scroll-bar position_relative Event_section_page">
    <?php if ( ! empty( $top_image ) ) { ?>
        <div class="embedded_section-right">
            <img src="<?php echo $top_image; ?>" alt="<?= $title ?>">
        </div>
    <?php } ?>
    <div class="embedded_wrap">
        <?php
        $paged       = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $event_args  = array (
            'post_type'      => TOSHIBA_EVENT_POST_TYPE,
            'post_status'    => 'publish',
            'posts_per_page' => 8,
            'paged'          => $paged,
            'orderby'        => 'title',
            'order'          => 'ASC',
        );
        $event_query = new WP_Query( $event_args );
        if ( $event_query->have_posts() ) {

            while ( $event_query->have_posts() ) {
                $event_query->the_post();
                $event_id        = get_the_ID();
                $event_title     = get_the_title();
                $event_date      = get_the_date( 'l, d M Y' );
                $event_author    = get_the_author();
                $event_cmt_count = get_comments_number();
                $event_content   = wp_trim_words( get_the_content(), 25 );
                $event_image     = get_the_post_thumbnail_url();
                $event_link      = get_the_permalink();
                $form_shortcode  = get_field( 'toshiba_request_a_quote_form_shortcode', $id );
                ?>
                <div class="embedded_inner">
                    <div class="inner">
                        <?php if ( ! empty( $event_image ) ) { ?>
                        <a href="<?php echo $event_link; ?>">
                            <div class="image">
                                <img src="<?php echo $event_image; ?>" alt="<?= $event_title ?>">
                            </div>
                        </a>
                        <?php } ?>
                        <div class="content">
                            <?php if ( ! empty( $event_date ) ) { ?>
                                <h6><?php echo $event_date; ?></h6>
                            <?php } ?>
                            <?php if ( ! empty( $event_title ) ) { ?>
                                <h5><?php echo $event_title; ?></h5>
                            <?php } ?>
                            <?php if ( ! empty( $event_content ) ) { ?>
                                <p> <?php echo $event_content; ?> </p>
                            <?php } ?>
                            <div class="button-1">
                                <a href="#"data-fancybox data-src="#hidden-content" ><?php _e( 'Request a Quote', 'toshiba' ); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                            </div>
                            <?php if ( ! empty( $form_shortcode ) ) { ?>
                                <div class="Request_quote_form contact_us_form" id="hidden-content" style="display: none;">
                                    <?php echo do_shortcode( $form_shortcode ); ?>
                                </div>
                            <?php } ?> 
                        </div>
                    </div>
                </div>
                <?php
            } wp_reset_query();
            ?>
        </div>
    <?php } ?>
    <?php if ( ! empty( $bottom_image ) ) { ?>
        <div class="embedded_section-left">
            <img src="<?php echo $bottom_image; ?>" alt="Embedded Left Section">
        </div>
    <?php } ?>
    <div class="pagination barcode_pagination">
        <?php
        echo paginate_links( array (
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $event_query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );
        ?>
    </div>
</section>
<?php get_footer(); ?>