<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Print Assesment Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();

if ( class_exists( 'acf' ) ) {
    /* Assesment Section */
    $asses_sec_title  = get_field( 'toshiba_print_asses_title' );
    $assesments       = get_field( 'toshiba_print_assesment' );
    /* Get In Touch Section */
    $get_touch_desc   = get_field( 'toshiba_print_asses_git' );
    $find_dealer_txt  = get_field( 'toshiba_print_asses_fd_txt' );
    $find_dealer_link = get_field( 'toshiba_print_asses_fd_link' );
    $form_title       = get_field( 'toshiba_print_asses_form_title' );
    $form_shortcode   = get_field( 'toshiba_print_asses_form' );
}
?>

<div class="print_assesment_sec light-bg ">
    <div class="container">
        <?php if ( ! empty( $asses_sec_title ) ) { ?>
            <h2><?php echo $asses_sec_title; ?></h2>
        <?php } ?>
        <div class="inner">
            <?php
            if ( $assesments ) {
                foreach ( $assesments as $assesment ) {
                    $asses_title = $assesment[ 'toshiba_print_assesment_title' ];
                    $asses_img   = $assesment[ 'toshiba_print_assesment_img' ];
                    ?>
                    <div class="box">
                        <?php if ( ! empty( $asses_img ) ) { ?>
                            <div class="img_div">
                                <img src="<?php echo $asses_img[ 'url' ]; ?>" alt="<?= $asses_title ?>">                   
                            </div>
                        <?php } ?>
                        <?php if ( ! empty( $asses_title ) ) { ?>
                            <p><?php echo $asses_title; ?></p>
                        <?php } ?>
                    </div>
                <?php } ?> 
            <?php } ?>
        </div>
    </div>
</div>

<div class="print_find_dealer">
    <div class="container">
        <div class="inner">
            <?php if ( ! empty( $get_touch_desc ) ) { ?>
                <h2><?php echo $get_touch_desc; ?></h2>
            <?php } ?>
            <?php if ( ! empty( $find_dealer_link ) || ! empty( $find_dealer_txt ) ) { ?>
                <a href="<?php echo $find_dealer_link; ?>" style="background:url(<?php echo site_url(); ?>/wp-content/uploads/2021/01/header-btn-bg-1.png); "><?php echo $find_dealer_txt; ?></a>
            <?php } ?>
        </div>
    </div>
</div>

<div class="contact_us_form print_asses_cont">
    <div class="container">
        <?php if ( ! empty( $form_title ) ) { ?>
            <h3> <?php echo $form_title; ?> </h3>
        <?php } ?>
        <?php if ( ! empty( $form_shortcode ) ) { ?>
    		<script>
              hbspt.forms.create({
            	region: "na1",
            	portalId: "8244541",
            	formId: "13d4270f-4b8d-4315-b7f0-2da04e8c7482"
            });
            </script>
        <?php } ?>
    </div>        
</div>
<?php get_footer(); ?>