<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: ECC Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();

if ( class_exists( 'acf' ) ) {
    /* Service Section */
    $service_title      = get_field( 'toshiba_ecc_t_title' );
    $service_img        = get_field( 'toshiba_ecc_t_img' );
    $service_img        = ! empty( $service_img ) ? $service_img[ 'url' ] : '';
    $service_desc       = get_field( 'toshiba_ecc_t_desc' );
    /* Benifits Section */
    $benifits_sec_title = get_field( 'toshiba_ecc_b_title' );
    $benifits           = get_field( 'toshiba_ecc_b_benifit' );
    /* FAQs */
    $faqs_title         = get_field( 'toshiba_ecc_faq_title' );
    $faqs               = get_field( 'toshiba_ecc_faq' );
}
?>

<div class="ecc_page">
    <section class="ecc_service_sec light-bg">
        <div class="container">
            <div class="inner_content">
                <div class="left_side">
                    <?php if ( ! empty( $service_title ) ) { ?>
                        <h2><?php echo $service_title; ?></h2>
                    <?php } ?>
                    <?php if ( ! empty( $service_desc ) ) { ?>
                        <?php echo $service_desc; ?>
                    <?php } ?>
                </div>
                <?php if ( ! empty( $service_img ) ) { ?>
                    <div class="right_side">
                        <div class="img_div">
                            <img src="<?php echo $service_img; ?>" alt="<?= $service_title ?> "/>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>    

    <section class="single_printer_item single_printer_item_new">
        <div class="ui_single-tab">
            <div class="border_sec">
                <div class="e-bridge_tabbing ">
                    <div class="tabbing">
                        <div class="title_top">
                            <?php if ( ! empty( $benifits_sec_title ) ) { ?>
                                <ul>
                                    <li><?php echo $benifits_sec_title; ?></li>
                                </ul>
                            <?php } ?>
                        </div>
                        <?php if ( $benifits ) { ?>    
                            <div class="tab_container">
                                <h3 class=" tab_drawer_heading" rel="tab0">Your benefits</h3>
                                <div id="tab0" class="tab_content">
                                    <div class="e-bridge_section">
                                        <div class="e-bridge_inner display_flex">
                                            <div class="content">
                                                <?php
                                                foreach ( $benifits as $benifit ) {
                                                    $benifit_title = $benifit[ 'toshiba_ecc_b_benifit_title' ];
                                                    $benifit_img   = $benifit[ 'toshiba_ecc_b_benifit_img' ];
                                                    $benifit_desc  = $benifit[ 'toshiba_ecc_b_benifit_desc' ];
                                                    ?>
                                                    <div class="col col-4">
                                                        <?php if ( ! empty( $benifit_img ) ) { ?>
                                                            <div class="img_div">
                                                                <img src="<?php echo $benifit_img; ?>" alt="<?= $benifit_title ?>" />
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ( ! empty( $benifit_title ) ) { ?>
                                                            <h3><?php echo $benifit_title; ?></h3>
                                                        <?php } ?>
                                                        <?php if ( ! empty( $benifit_desc ) ) { ?>
                                                            <p><?php echo $benifit_desc; ?></p>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- .tab_container -->
                    </div>
                </div>
                <div class="line"></div>
                <div class="bottom_logo">
                    <img src="<?php echo site_url(); ?>/wp-content/themes/toshiba/images/challenge_shapes.png" alt="challenge shape">
                </div>
            </div>
        </div>
    </section>

    <section class="eec_faq_sec">
        <div class="container">
            <?php if ( ! empty( $faqs_title ) ) { ?>
                <h2><i class="fa fa-question-circle" aria-hidden="true"></i><?php echo $faqs_title; ?></h2>
            <?php } ?>
            <?php if ( $faqs ) { ?>
                <div class="faq">
                    <ul class="faq__list">
                        <?php
                        foreach ( $faqs as $faq ) {
                            $question = $faq[ 'toshiba_ecc_faq_que' ];
                            $answer   = $faq[ 'toshiba_ecc_faq_ans' ];
                            ?>  
                            <li class="faq__item">
                                <?php if ( ! empty( $question ) ) { ?>
                                    <a class="faq__title" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i><?php echo $question; ?><span><i class="fa fa-chevron-right" aria-hidden="true"></i></span></a>
                                <?php } ?>
                                <?php if ( ! empty( $answer ) ) { ?>
                                    <div class="faq__content" style="display: none;">
                                        <?php echo $answer; ?>
                                        <h6><?php _e( 'Show Less', 'tosiba' ); ?> <i class="fa fa-angle-up" aria-hidden="true"></i></h6>
                                    </div>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>  
            <?php } ?>
    </section>
</div>

<?php get_footer(); ?>