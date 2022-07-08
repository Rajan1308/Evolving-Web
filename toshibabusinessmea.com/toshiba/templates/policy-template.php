<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name:  Policy Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
$page_id = get_the_ID();
if ( class_exists( 'acf' ) ) {
    $policies_color    = get_field( 'toshiba_policie_shover_color', $page_id );
    $policies_logo_img = get_field( 'toshiba_policie_logo_image', $page_id );
    $policies_logo_img = ! empty( $policies_logo_img ) ? $policies_logo_img[ 'url' ] : '';
    $policies_title    = get_field( 'toshiba_policie_title', $page_id );
    $policies_bg_img   = get_field( 'toshiba_policies_banner_background_image', $page_id );
    $policies_bg_img   = ! empty( $policies_bg_img ) ? $policies_bg_img[ 'url' ] : '';
    $policies_image    = get_field( 'toshiba_policies_banner_image', $page_id );
    $policies_image    = ! empty( $policies_image ) ? $policies_image[ 'url' ] : '';
    $policies          = get_field( 'toshiba_policies', $page_id );
}
?>
<section class="privacy_policy_sec">
    <div class="container">
        <?php if ( ! empty( $policies_logo_img ) || ! empty( $policies_title ) ) { ?>
            <h2><img src="<?php echo $policies_logo_img; ?>" alt="<?= $policies_title ?>" /><?php echo $policies_title; ?></h2>
        <?php } ?>
        <div class="img_div">
            <?php if ( ! empty( $policies_image ) ) { ?>
                <img class="rel_img" src="<?php echo $policies_image; ?>" alt="<?= $policies_title ?>" />
            <?php } ?>
            <?php if ( ! empty( $policies_bg_img ) ) { ?>
                <img class="abs_img" src="<?php echo $policies_bg_img; ?>" alt="<?= $policies_title ?>" />
            <?php } ?>
        </div>
    </div>
    <?php if ( $policies ) { ?>
        <div class="text_div">
            <?php
            foreach ( $policies as $policy ) {
                $policy_title = $policy[ 'toshiba_policy_title' ];
                $policy_desc  = $policy[ 'toshiba_policy_desc' ];
                ?>
                <div class="single">
                    <div class="line" style="background-color: <?php echo $policies_color; ?>;"></div>
                    <?php if ( ! empty( $policy_title ) ) { ?>
                        <h4><?php echo $policy_title; ?></h4>
                    <?php } ?>
                    <?php if ( ! empty( $policy_desc ) ) { ?>
                        <p><?php echo $policy_desc; ?></p>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</section>

<?php get_footer(); ?>