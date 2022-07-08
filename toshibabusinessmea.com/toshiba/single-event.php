<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage TOSHIBA
 * @since Toshiba 1.0
 */
get_header();
if ( class_exists( 'acf' ) ) {
    $event_gallery_title  = get_field( 'toshiba_event_gallery_title' );
    $event_gallery        = get_field( 'toshiba_event_gallery' );
    $upcoming_event_title = get_field( 'tosiba_upcoming_event_title', 'option' );
    $share_event_title    = get_field( 'tosiba_event_inner_social_share_title', 'option' );
}
while ( have_posts() ) {
    the_post();
    $event_id      = get_the_ID();
    $event_title   = get_the_title( $event_id );
    $event_date    = get_the_date( 'F m, Y', $event_id );
    $event_author  = get_the_author( $event_id );
// 	$event_author  = get_the_author_meta( 'display_name' );
	
    ?>

    <div class="single_news_blog">
        <div class="container">
            <section class="news_detail_sec">
                <?php if ( ! empty( $event_title ) ) { ?>
                    <h2><?php echo $event_title; ?></h2>
                <?php } ?>
                <div class="date_name">
                    <ul>
                        <?php if ( ! empty( $event_date ) ) { ?>
                            <li><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/calendar-1.svg" alt="Calendar"><?php echo $event_date; ?></li>
                        <?php } ?>
                        <?php if ( ! empty( $event_author ) ) { ?>
                            <li><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/user-1.svg" alt="User icon"><?php echo $event_author; ?></li>
                        <?php } ?>
                    </ul>        
                </div>
                <?php // if ( ! empty( $event_content ) ) { ?>
                    <?php  the_content(); ?>
                <?php // } ?>
                <div class="social_media_sec">
                    <?php if ( ! empty( $share_event_title ) ) { ?>
                        <strong><?php echo $share_event_title; ?></strong>
                    <?php } ?>
                    <ul>
                        <ul>
                            <li>
                                <a href="javascript:void(0)" onclick="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'); return false;">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="javascript:window.open('https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'); return false;">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" onclick="javascript:window.open('https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo get_permalink(); ?>&amp;title=<?php echo $event_title; ?>&amp;summary=&amp;source=', '_blank', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'); return false;">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </ul>
                </div>
                <div class="date_name">
                    <ul>
                        <?php if ( ! empty( $event_date ) ) { ?>
                            <li><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/calendar-1.svg" alt="Calendar"><?php echo $event_date; ?></li>
                        <?php } ?>
                        <?php if ( ! empty( $event_author ) ) { ?>
                            <li><img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/user-1.svg" alt="<?= $event_author ?>"><?php echo $event_author; ?></li>
                        <?php } ?>
                    </ul>      
                </div>

            </section>
        </div>
    </div>

    <section class="event_gallery">
        <div class="container">
            <div class="event_gallery_wrap">
                <?php if ( !empty ( $event_gallery_title ) ) { ?>
                    <h3><?php echo $event_gallery_title; ?></h3>
                <?php } ?>
                <div class="event_gallery_inner">
                    <?php if ( $event_gallery ) { ?>
                        <?php foreach ( $event_gallery as $image ) { ?>
                            <div class="iner">
                                <img src="<?php echo esc_url( $image[ 'url' ] ); ?>" alt="<?php if($image[ 'alt' ]) { echo esc_attr( $image[ 'alt' ] ); }else{echo "Galley Images"; } ?>" />
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$event_args  = array (
            'post_type'         => 'event',
            'post_status'       => 'publish',
//            'orderby'           => 'title',
            'order'             => 'ASC',
            'posts_per_page'    => 3,
            'post__not_in'      => array ( get_the_ID() )
//             'date_query'   => array (
//                     'column' => 'post_date',
//                     'after'  => get_the_date(),
//                 ),
        );
        $event_query = new WP_Query( $event_args );
        if ( $event_query->have_posts() ) {
?>
<section class="embedded_section scroll-bar events_embedded_section">
    <?php if ( ! empty( $upcoming_event_title ) ) { ?>
        <div class="title">
            <h3><?php echo $upcoming_event_title; ?></h3>
        </div>
    <?php } ?>
    <div class="embedded_wrap">
        <?php
        
            while ( $event_query->have_posts() ) {
                $event_query->the_post();
                $up_event_id      = get_the_ID();
                $up_event_title   = get_the_title();
                $up_event_content = get_the_content();
                $up_event_image   = get_the_post_thumbnail_url();
                $up_link          = get_permalink();
                ?>
                <div class="embedded_inner">
                    <div class="inner">
                        <?php if ( !empty ( $up_event_image ) ) { ?>
                            <div class="image">
                                <img src="<?php echo $up_event_image; ?>" alt="<?= $up_event_title ?>">
                            </div>
                        <?php } ?>
                        <div class="content">
                            <?php if ( !empty ( $up_event_title ) ) { ?>
                                <h5><?php echo $up_event_title; ?></h5>
                            <?php } ?>
                            <?php if ( !empty ( $up_event_content ) ) { ?>
                                <p><?php echo wp_trim_words($up_event_content,30); ?></p>
                            <?php } ?>
                            <?php if ( !empty ( $up_link ) ) { ?>
                                <div class="button-1">
                                    <a href="<?php echo $up_link; ?>"><?php _e('Read More','tosiba'); ?><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div> 
                <?php
            }
            wp_reset_postdata();
            ?>
    </div>
</section>
<?php	} ?>

<?php get_footer(); ?>