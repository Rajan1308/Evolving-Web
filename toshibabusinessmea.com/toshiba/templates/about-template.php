<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name:  About Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();

$page_id  = get_the_ID();
$site_url = site_url();
if ( class_exists( 'acf' ) ) {
    /* Who_we_are section */
    $about_title          = get_field( 'toshiba_about_a_title', $page_id );
    $about_nav_title      = get_field( 'toshiba_about_a_nav_title', $page_id );
    $about_desc           = get_field( 'toshiba_about_a_desc', $page_id );
    $about_img            = get_field( 'toshiba_about_a_img', $page_id );
    /* location section */
    $locaton_title        = get_field( 'toshiba_about_l_title', $page_id );
    $locaton_nav_title    = get_field( 'toshiba_about_l_nav_title', $page_id );
    $loc_addr_title       = get_field( 'toshiba_about_l_addr_title', $page_id );
    $location_addr        = get_field( 'toshiba_about_l_address', $page_id );
    $contact_info         = get_field( 'toshiba_about_l_contact', $page_id );
    $loc_get_dir_title    = get_field( 'toshiba_about_l_gd_title', $page_id );
    $location_img         = get_field( 'toshiba_about_l_img', $page_id );
    /*  global section */
    $global_title         = get_field( 'toshiba_about_g_title', $page_id );
    $global_nav_title     = get_field( 'toshiba_about_g_nav_title', $page_id );
    $global_desc          = get_field( 'toshiba_about_g_desc', $page_id );
    $global_bg_img        = get_field( 'toshiba_about_g_img', $page_id );
    $global_redirect_btns = get_field( 'toshiba_about_g_r_btns', $page_id );
}
?>
<section class="Who_we_are">
    <div class="container">
        <div class="Who_we_are_section">
            <div class="inner">
                <div class="left">
                    <div class="image">
                        <?php if ( ! empty( $about_img ) ) { ?>
                            <img src="<?php echo $about_img; ?>" alt="<?= $about_title ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="right">
                    <?php if ( ! empty( $about_nav_title ) ) { ?>
                        <strong><?php echo $about_nav_title; ?></strong>
                    <?php } ?>
                    <?php if ( ! empty( $about_title ) ) { ?>
                        <h2><?php echo $about_title; ?></h2>
                    <?php } ?>
                    <?php
                    if ( ! empty( $about_desc ) ) {
                        echo $about_desc;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our_locations">
    <div class="our_locations_section">
        <div class="inner">
            <div class="left">
                <div class="main_sec_title">
                    <?php if ( ! empty( $locaton_nav_title ) ) { ?>
                        <strong><?php echo $locaton_nav_title; ?></strong>
                    <?php } ?>
                    <?php if ( ! empty( $locaton_title ) ) { ?>
                        <h3><?php echo $locaton_title; ?></h3>
                    <?php } ?>
                </div>
                <address>
                    <?php if ( ! empty( $loc_addr_title ) ) { ?>
                        <strong><?php echo $loc_addr_title; ?></strong>
                    <?php } ?>
                    <div class="full-add">
                        <img src="<?php echo TOSHIBA_THEME_IMAGE_FOLDER; ?>/directions.svg" alt="Directions">
                        <?php if ( ! empty( $contact_info ) ) { ?>
                            <div class="content">
                                <?php echo $contact_info; ?>
                                <a href="http://maps.google.com/maps?q=<?php echo strip_tags( $location_addr ); ?>" target='_blank'>Get Directions</a>
                            </div>
                        <?php } ?>
                    </div>
                </address>
            </div>
            <div class="right">
                <?php if ( ! empty( $location_img ) ) { ?>
                    <img src="<?php echo $location_img; ?>" alt="Finding us is not that hard">
                <?php } ?>
                <div class="footer-bottom-img">
                    <img src="<?php echo TOSHIBA_THEME_IMAGE_FOLDER; ?>/footer-bottom-img.png" alt="footer bottom img">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="Toshiba_Global">
    <div class="top_image_global">
        <?php if ( ! empty( $global_bg_img ) ) { ?>
            <img src="<?php echo $global_bg_img; ?>" alt="global banner image">
        <?php } ?>
    </div>
    <div class="Global_section">
        <div class="container">
            <div class="content scroll-bar" style="background: url(<?php echo site_url(); ?>/wp-content/uploads/2021/01/about-bg.png) no-repeat; background-size: cover;">

                <div class="main_sec_title">
                    <?php if ( ! empty( $global_nav_title ) ) { ?>
                        <strong><?php echo $global_nav_title; ?></strong>
                    <?php } ?>
                    <?php if ( ! empty( $global_title ) ) { ?>
                        <h3><?php echo $global_title; ?></h3>
                    <?php } ?>
                </div>
                <div class="prag">
                    <?php
                    if ( ! empty( $global_desc ) ) {
                        echo $global_desc;
                    }
                    ?>
                </div>
                <?php if ( ! empty( $global_redirect_btns ) ) { ?>
                    <ul>
                        <?php
                        foreach ( $global_redirect_btns as $key => $button ) {
                            if ( ! empty( $button[ 'toshiba_about_g_r_btn_title' ] ) && ! empty( $button[ 'toshiba_about_g_r_btn_link' ] ) ) {
                                ?>
                                <li><a href="<?php echo $button[ 'toshiba_about_g_r_btn_link' ]; ?>" target="_blank"><?php echo $button[ 'toshiba_about_g_r_btn_title' ]; ?></a></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                <?php } ?>

            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>