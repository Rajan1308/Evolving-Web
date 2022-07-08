<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;
/*
 * Template Name: News Listing Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */

get_header();
if ( class_exists( 'acf' ) ) {
    $news_show_tag = get_field( 'toshiba_blog_lat_pop' );
}
?>
<div class="blog_tabbing_section">
    <div class="blog_tabbing_wrap">
        <ul class="tabs">
            <li class="active" rel="tab1"><?php _e( 'All News', 'tosiba' ); ?></li>
            <li rel="tab2"><?php _e( 'Latest News', 'tosiba' ); ?></li>
            <li rel="tab3"><?php _e( 'Popular News', 'tosiba' ); ?></li>
        </ul>
        <div class="tab_container">
            <h3 class="d_active tab_drawer_heading" rel="tab1"><?php _e( 'All News', 'tosiba' ); ?></h3>
            <div id="tab1" class="tab_content">
                <h2><?php _e( 'All News', 'tosiba' ); ?></h2>
                <div class="blog-medai">
                    <?php
                    $news_args  = array (
                        'post_type'   => 'post',
                        'post_status' => 'publish',
                        'order'       => 'ASC',
                        'tax_query'   => array (
                            array (
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'news',
                            ),
                        ),
                    );
                    $news_query = new WP_Query( $news_args );
                    if ( $news_query->have_posts() ) {
                        while ( $news_query->have_posts() ) {
                            $news_query->the_post();
                            $news_title   = get_the_title( $id );
                            $news_image   = get_the_post_thumbnail_url( $id );
                            $news_content = get_the_content( $id );
                            $news_date    = get_the_date( 'F Y', $id );
                            $news_author  = get_the_author( $id );
                            $news_link    = get_permalink( $id );
                            if ( class_exists( 'acf' ) ) {
                                $news_show_tag   = get_field( 'toshiba_blog_lat_pop' );
                                $news_show_title = $news_show_tag == '1' ? __( 'Popular', 'tosiba' ) : __( 'Latest', 'tosiba' );
                            }
                            ?>
                            <div class="media_center_in">
                                <div class="inner">
                                    <?php if ( ! empty( $news_image ) ) { ?>
                                        <div class="image">
                                            <a href="<?php echo $news_link; ?>" tabindex="0">
                                                <img src="<?php echo $news_image; ?>" alt="<?= $news_title ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="content">
                                        <?php if ( ! empty( $news_show_title ) ) { ?>
                                            <div class="media">
                                                <strong><?php echo $news_show_title; ?></strong>
                                            </div>
                                        <?php } ?>
                                        <div class="date">
                                            <ul>
                                                <?php if ( ! empty( $news_date ) ) { ?>
                                                    <li><?php echo $news_date; ?></li>
                                                <?php } ?>
                                                <?php if ( ! empty( $news_author ) ) { ?>
                                                    <li><?php echo $news_author; ?></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <?php if ( ! empty( $news_title ) ) { ?>
                                            <div class="title">
                                                <a href="<?php echo $news_link; ?>" tabindex="0">
                                                    <?php echo $news_title; ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <div class="readmore">
                                            <a href="<?php echo $news_link; ?>" tabindex="0"><?php _e( 'Read More', 'tosiba' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_query();
                        wp_reset_postdata();
                    }
                    ?>

                </div>
            </div>
            <!-- #tab1 -->
            <h3 class="tab_drawer_heading" rel="tab2"><?php _e( 'Latest News', 'tosiba' ); ?></h3>
            <div id="tab2" class="tab_content">
                <h2><?php _e( 'Latest News', 'tosiba' ); ?></h2>
                <div class="blog-medai">
                    <?php
                    $args  = array (
                        'post_type'   => 'post',
                        'post_status' => 'publish',
                        'order'       => 'ASC',
                        'tax_query'   => array (
                            array (
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'news',
                            ),
                        ),
                        'meta_query'  => array (
                            array (
                                'key'     => 'toshiba_blog_lat_pop',
                                'value'   => '0',
                                'compare' => '=',
                            ),
                        ),
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $news_title   = get_the_title( $id );
                            $news_image   = get_the_post_thumbnail_url( $id );
                            $news_content = get_the_content( $id );
                            $news_date    = get_the_date( 'F Y', $id );
                            $news_author  = get_the_author( $id );
                            $news_link    = get_permalink( $id );
                            if ( class_exists( 'acf' ) ) {
                                $news_show_tag   = get_field( 'toshiba_blog_lat_pop' );
                                $news_show_title = $news_show_tag == '1' ? __( 'Popular', 'tosiba' ) : __( 'Latest', 'tosiba' );
                            }
                            ?>
                            <div class="media_center_in">
                                <div class="inner">
                                    <?php if ( ! empty( $news_image ) ) { ?>
                                        <div class="image">
                                            <a href="<?php echo $news_link; ?>" tabindex="0">
                                                <img src="<?php echo $news_image; ?>" alt="<?= $news_title ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="content">
                                        <?php if ( ! empty( $news_show_title ) ) { ?>
                                            <div class="media">
                                                <strong><?php echo $news_show_title; ?></strong>
                                            </div>
                                        <?php } ?>
                                        <div class="date">
                                            <ul>
                                                <?php if ( ! empty( $news_date ) ) { ?>
                                                    <li><?php echo $news_date; ?></li>
                                                <?php } ?>
                                                <?php if ( ! empty( $news_author ) ) { ?>
                                                    <li><?php echo $news_author; ?></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <?php if ( ! empty( $news_title ) ) { ?>
                                            <div class="title">
                                                <a href="<?php echo $news_link; ?>" tabindex="0">
                                                    <?php echo $news_title; ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <div class="readmore">
                                            <a href="<?php echo $news_link; ?>" tabindex="0"><?php _e( 'Read More', 'tosiba' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_query();
                        wp_reset_postdata();
                    }
                    ?>

                </div>  
            </div>
            <!-- #tab2 -->
            <h3 class="tab_drawer_heading" rel="tab3"><?php _e( 'Popular News', 'tosiba' ); ?></h3>
            <div id="tab3" class="tab_content">
                <h2><?php _e( 'Popular News', 'tosiba' ); ?></h2>
                <div class="blog-medai">
                    <?php
                    $args  = array (
                        'post_type'   => 'post',
                        'post_status' => 'publish',
                        'order'       => 'ASC',
                        'tax_query'   => array (
                            array (
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'news',
                            ),
                        ),
                        'meta_query'  => array (
                            array (
                                'key'     => 'toshiba_blog_lat_pop',
                                'value'   => '1',
                                'compare' => '=',
                            ),
                        ),
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $news_title   = get_the_title( $id );
                            $news_image   = get_the_post_thumbnail_url( $id );
                            $news_content = get_the_content( $id );
                            $news_date    = get_the_date( 'F Y', $id );
                            $news_author  = get_the_author( $id );
                            $news_link    = get_permalink( $id );
                            if ( class_exists( 'acf' ) ) {
                                $news_show_tag   = get_field( 'toshiba_blog_lat_pop' );
                                $news_show_title = $news_show_tag == '1' ? __( 'Popular', 'tosiba' ) : __( 'Latest', 'tosiba' );
                            }
                            ?>
                            <div class="media_center_in">
                                <div class="inner">
                                    <?php if ( ! empty( $news_image ) ) { ?>
                                        <div class="image">
                                            <a href="<?php echo $news_link; ?>" tabindex="0">
                                                <img src="<?php echo $news_image; ?>" alt="<?= $news_title  ?>">
                                            </a>
                                        </div>
                                    <?php } ?>
                                    <div class="content">
                                        <?php if ( ! empty( $news_show_title ) ) { ?>
                                            <div class="media">
                                                <strong><?php echo $news_show_title; ?></strong>
                                            </div>
                                        <?php } ?>
                                        <div class="date">
                                            <ul>
                                                <?php if ( ! empty( $news_date ) ) { ?>
                                                    <li><?php echo $news_date; ?></li>
                                                <?php } ?>
                                                <?php if ( ! empty( $news_author ) ) { ?>
                                                    <li><?php echo $news_author; ?></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <?php if ( ! empty( $news_title ) ) { ?>
                                            <div class="title">
                                                <a href="<?php echo $news_link; ?>" tabindex="0">
                                                    <?php echo $news_title; ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <div class="readmore">
                                            <a href="<?php echo $news_link; ?>" tabindex="0"><?php _e( 'Read More', 'tosiba' ); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        wp_reset_query();
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            </div>
            <!-- #tab3 -->
        </div>
    </div>
</div>

</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>