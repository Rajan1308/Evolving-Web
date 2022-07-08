<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Supplies Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
if ( class_exists( 'acf' ) ) {
    /* Title Section */
    $supply_title     = get_field( 'toshiba_supply_t_title' );
    $supply_nav_title = get_field( 'toshiba_supply_t_nav_title' );
    $supply_img       = get_field( 'toshiba_supply_t_img' );
    /* Differences Lists */
    $diff_list1_title = get_field( 'toshiba_supply_dl1_title' );
    $diff_list1_img   = get_field( 'toshiba_supply_dl1_img' );
    $diff_list1       = get_field( 'toshiba_supply_dl1_desc' );
    $diff_list2_title = get_field( 'toshiba_supply_dl2_title' );
    $diff_list2_img   = get_field( 'toshiba_supply_dl2_img' );
    $diff_list2       = get_field( 'toshiba_supply_dl2_desc' );
    /* Difference Section */
    $difference_title = get_field( 'toshiba_supply_d_title' );
    $differences      = get_field( 'toshiba_supply_dif' );
    /* Quality Section */
    $quality_title    = get_field( 'toshiba_supply_qua_title' );
    $quality_img      = get_field( 'toshiba_supply_qua_img' );
    $quality_desc     = get_field( 'toshiba_supply_qua_desc' );
}
?>
<!--title sec-->
<section class="Supplies_Making">
    <div class="container">
        <div class="marking-title">
            <?php if ( ! empty( $supply_nav_title ) ) { ?>
                <strong><?php echo $supply_nav_title; ?></strong>
            <?php } ?>
            <?php if ( ! empty( $supply_title ) ) { ?>
                <h3><?php echo $supply_title; ?></h3>
            <?php } ?>
        </div>
        <div class="image">
            <?php if ( ! empty( $supply_img ) ) { ?>
                <img src="<?php echo $supply_img; ?>" alt="<?= $supply_title ?>">
            <?php } ?>
        </div>
    </div>
</section>


<!--difference list 1-->
<section class="printer_cartridges light-bg">
    <div class="printer_cartridges_wrap">
        <div class="printer_cartridges_inner display_flex">
            <div class="printer_cartridges_left left-padding">
                <?php if ( ! empty( $diff_list1_title ) ) { ?>
                    <h3><?php echo $diff_list1_title; ?></h3>
                <?php } ?>
                <?php echo $diff_list1; ?>
            </div>
            <div class="printer_cartridges_right">
                <div class="image">
                    <?php if ( ! empty( $diff_list1_img ) ) { ?>
                        <img src="<?php echo $diff_list1_img; ?>" alt="<?= $diff_list1_title ?>">
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!--differences-->
<section class="supplies_embedded_wrap position_relative">
    <div class="container">
        <?php if ( ! empty( $difference_title ) ) { ?>
            <h3><?php echo $difference_title; ?></h3>
        <?php } ?>
    </div>
    <?php if ( ! empty( $differences ) ) { ?>    
        <div class="embedded_wrap">
            <?php foreach ( $differences as $difference ) { ?>
                <div class="embedded_inner">
                    <div class="inner scroll-bar">
                        <div class="image">
                            <?php if ( ! empty( $difference[ 'toshiba_supply_dif_img' ] ) ) { ?>
                                <img src="<?php echo $difference[ 'toshiba_supply_dif_img' ]; ?>" alt="<?= $difference_title ?>">
                            <?php } ?>
                        </div>
                        <div class="content prag">
                            <?php echo $difference[ 'toshiba_supply_dif_desc' ]; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</section>

<!--quality-->
<section class="transforming_section  supplies_transforming_section">
    <div class="container">
        <div class="transforming_wrap">
            <div class="left">
                <?php if ( ! empty( $quality_title ) ) { ?>
                    <h3><?php echo $quality_title; ?></h3>
                <?php } ?>
                <?php echo $quality_desc; ?>
            </div>
            <div class="right">
                <?php if ( ! empty( $quality_img ) ) { ?>
                    <img src="<?php echo $quality_img; ?>" alt="<?= $quality_title ?>">
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<!--difference list 2-->
<section class=" mobile-solution_in supplies_page">
    <div class="mobile-solution doc-manage_section ">
        <div class="mobile_solution_section" style="background: url(<?php echo  site_url(); ?>/wp-content/uploads/2021/01/image-3.png) no-repeat; background-size: 100% 100%; ">
            <div class="mobile_inner">
                <div class="image-top">
                    <?php if ( ! empty( $diff_list2_img ) ) { ?>
                        <img src="<?php echo $diff_list2_img; ?>" alt="<?= $diff_list2_title ?>">
                    <?php } ?> 
                </div>
                <div class="mobile_main_wrap">
                    <div class="mobile_main_section">
                        <div class="inner">
                            <div class="title">
                                <?php if ( ! empty( $diff_list2_title ) ) { ?>
                                    <h3><?php echo $diff_list2_title; ?></h3>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="content scroll-bar">
                            <div class="left ">
                                <div class="prag">
                                    <?php echo $diff_list2; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>