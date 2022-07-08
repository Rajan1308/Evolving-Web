<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Mobile Solutions Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
if ( class_exists( 'acf' ) ) {
    $image_top     = get_field( 'toshiba_mob_mimg' );
    $mob_solutions = get_field( 'toshiba_mob_sol' );
}
?>

<section class="light-bg mobile-solution_in mobile-solution-page">
    <div class="mobile-solution">
        <div class="mobile_solution_section" style="background: url(<?php echo TOSHIBA_THEME_IMAGE_FOLDER; ?>/4-layers.png) no-repeat; background-size: 100% 100%; ">
            <div class="mobile_inner">
                <div class="image-top">
                    <?php if ( ! empty( $image_top ) ) { ?>
                        <img src="<?php echo $image_top; ?>" alt="Mobile Solutions">
                    <?php } ?>
                </div>
                <?php if ( ! empty( $mob_solutions ) ) { ?>                
                    <div class="mobile_main_wrap">
                        <?php
                        foreach ( $mob_solutions as $solution ) {
                            $sol_title     = $solution[ 'toshiba_mob_sol_title' ];
                            $sol_logo      = $solution[ 'toshiba_mob_sol_logo' ];
                            $sol_img       = $solution[ 'toshiba_mob_sol_img' ];
                            $sol_desc      = $solution[ 'toshiba_mob_sol_desc' ];
                            $sol_more_txt  = $solution[ 'toshiba_mob_sol_km_txt' ];
                            $sol_more_link = $solution[ 'toshiba_mob_sol_km_link' ];
                            $sol_more_txt  = ! empty( $sol_more_txt ) ? $sol_more_txt : 'Click to Know more';
                            ?>
                            <div class="mobile_main_section">
                                <div class="inner">
                                    <div class="title">
                                        <?php if ( ! empty( $sol_title ) ) { ?>
                                            <h2><?php echo $sol_title; ?></h2>
                                        <?php } ?>
                                    </div>
                                    <div class="left_imgae_mobile">
                                        <?php if ( ! empty( $sol_logo ) ) { ?>
                                            <img src="<?php echo $sol_logo; ?>" alt="<?= $sol_title ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="content">
                                    <div class="left">
                                        <?php
                                        if ( ! empty( $sol_desc ) ) {
                                            echo $sol_desc;
                                        }
                                        ?>
                                        <?php if ( ! empty( $sol_more_link ) ) { ?>
                                            <div class="btn"><a href="<?php echo $sol_more_link; ?>"><?php echo $sol_more_txt; ?></a></div>
                                        <?php } ?>
                                    </div>
                                    <div class="right">
                                        <?php if ( ! empty( $sol_img ) ) { ?>
                                            <img src="<?php echo $sol_img; ?>" alt="<?= $sol_title ?>">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>