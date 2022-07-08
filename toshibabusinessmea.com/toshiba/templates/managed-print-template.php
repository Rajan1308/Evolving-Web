<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Managed Print Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
?>
<?php
$id = get_the_ID();
if ( class_exists( 'acf' ) ) {
    /* About Section */
    $about_title    = get_field( 'toshiba_mps_as_title', $id );
    $about_image    = get_field( 'toshiba_mps_as_img', $id );
    $about_image    = ! empty( $about_image ) ? $about_image[ 'url' ] : '';
    $about_desc     = get_field( 'toshiba_mps_as_desc', $id );
    /* Process Section */
    $process_title  = get_field( 'toshiba_mps_p_title', $id );
    $center_title   = get_field( 'toshiba_mps_p_process_title', $id );
    $process        = get_field( 'toshiba_mps_p_process', $id );
    /* Benifits Section  */
    $benifits_title = get_field( 'toshiba_mps_b_title', $id );
    $benifits_desc  = get_field( 'toshiba_mps_b_desc', $id );
    $benifits       = get_field( 'toshiba_mps_b_benifits', $id );
    /* Why Choose Section */
    $why_title      = get_field( 'toshiba_mps_w_title', $id );
    $why_desc       = get_field( 'toshiba_mps_w_desc', $id );
    $why_cta        = get_field( 'toshiba_mps_w_fd_cta', $id );
    /* Form Section */
    $form_title     = get_field( 'toshiba_mps_form_title', $id );
    $form_shortcode = get_field( 'toshiba_mps_form_sc', $id );
}
?>
<section class="managed_print_services" style="background:url(<?php echo site_url(); ?>/wp-content/uploads/2021/01/Managed_Printbg.jpg) no-repeat center /cover; ">
    <div class="container">
        <div class="managed_print_wrap scroll-bar" >
            <div class="inner">
                <?php if ( ! empty( $about_title ) ) { ?>
                    <div class="left">
                        <div class="sec-main-titel "><?php echo $about_title; ?></div>
                    </div>
                <?php } ?>
                <?php if ( ! empty( $about_desc ) ) { ?>
                    <div class="right">
                        <div class="prag">
                            <p><?php echo $about_desc; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php if ( ! empty( $about_image ) ) { ?>
    <div class="managed_print_image">
        <div class="container">
            <img src="<?php echo $about_image; ?>" alt="<?= $about_title ?>">
        </div>
    </div>
<?php } ?>
<div class="MPS_Process">
    <?php if ( ! empty( $process_title ) ) { ?>
        <div class="sec-main-titel  text-align">
            <?php echo $process_title; ?>
        </div>
    <?php } ?>
    <div class="container">
        <div class="MPS_Process_wrap">
            <div class="left_inner ">
                <?php if ( ! empty( $center_title ) ) { ?>
                    <div class="in_text_wrap">
                        <div class="in-text"><?php echo $center_title; ?></div>
                    </div>
                <?php } ?>
                <?php if ( ! empty( $process ) ) { ?>
                    <ul class="tabs">
                        <?php
                        foreach ( $process as $process_key => $process_val ) {
                            $p_g_img = $process_val[ 'toshiba_mps_p_process_gray_image' ];
                            $p_g_img = ! empty( $p_g_img ) ? $p_g_img[ 'url' ] : '';
                            $p_b_img = $process_val[ 'toshiba_mps_p_process_blue_image' ];
                            $p_b_img = ! empty( $p_b_img ) ? $p_b_img[ 'url' ] : '';
                            ?>
                            <li class="tab-link" data-tab="tab-<?php echo $process_key; ?>">
                                <div class="image_div">
                                    <div class="image">
                                        <?php if ( ! empty( $p_b_img ) ) { ?>
                                            <img src="<?php echo $p_b_img; ?>"  alt="<?= $center_title ?>" class="image-without-hover">
                                        <?php } ?>
                                        <?php if ( ! empty( $p_g_img ) ) { ?>
                                            <img src="<?php echo $p_g_img; ?>" alt="<?= $center_title ?>" class="image-with-hover">
                                        <?php } ?>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="mobile-service-image">
                        <img src="<?php echo site_url(); ?>/wp-content/uploads/2021/01/service-mobile-img.png)" alt="<?= $center_title ?>">
                    </div>
                <?php } ?>
            </div>
            <?php if ( ! empty( $process ) ) { ?>
                <div class="right_inner ">
                    <?php
                    foreach ( $process as $process_key => $process_val ) {
                        $p_title = $process_val[ 'toshiba_mps_p_process_title' ];
                        $p_desc  = $process_val[ 'toshiba_mps_p_process_desc' ];
                        ?>
                        <div id="tab-<?php echo $process_key; ?>" class="tab-content">
                            <?php if ( ! empty( $p_title ) ) { ?>
                                <h3><?php echo $p_title; ?></h3>
                            <?php } ?>
                            <?php if ( ! empty( $p_desc ) ) { ?>
                                <?php echo $p_desc; ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="print_assesment_sec managed_print_assesment_sec light-bg ">
    <div class="container">
        <?php if ( ! empty( $benifits_title ) ) { ?>
            <h2><?php echo $benifits_title; ?></h2>
        <?php } ?>
        <?php if ( ! empty( $benifits_desc ) ) { ?>
            <p><?php echo $benifits_desc; ?></p>
        <?php } ?>
        <?php if ( ! empty( $benifits ) ) { ?>
            <div class="inner">
                <?php
                foreach ( $benifits as $benifit_key => $benifit_val ) {
                    $b_image = $benifit_val[ 'toshiba_mps_b_benifits_img' ];
                    $b_image = ! empty( $b_image ) ? $b_image[ 'url' ] : '';
                    $b_title = $benifit_val[ 'toshiba_mps_b_benifits_title' ];
                    ?>
                    <div class="box">
                        <?php if ( ! empty( $b_image ) ) { ?>
                            <div class="img_div">
                                <img src="<?php echo $b_image; ?>" alt="<?= $benifits_title ?>">                   
                            </div>
                        <?php } ?>
                        <?php if ( ! empty( $b_title ) ) { ?>
                            <p><?php echo $b_title; ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
<section class="Toshiba_MPS">
    <div class="container">
        <div class="Toshiba_MPS">
            <?php if ( ! empty( $why_title ) ) { ?>
                <div class="sec-main-titel "><?php echo $why_title; ?></div>
            <?php } ?>
            <?php if ( ! empty( $why_desc ) ) { ?>
                <P><?php echo $why_desc; ?></P>
            <?php } ?>
            <?php if ( ! empty( $why_cta ) ) { ?>
                <div class="button-1">
                    <a href="<?php echo $why_cta[ 'url' ]; ?>"><?php echo $why_cta[ 'title' ]; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<div class="contact_us_form print_asses_cont">
    <div class="container">
        <?php if ( ! empty( $form_title ) ) { ?>
            <h3> <?php echo $form_title; ?> </h3>
        <?php } ?>
        <!--form-->
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