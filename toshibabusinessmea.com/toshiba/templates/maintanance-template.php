<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Maitenance Contract Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
$page_id = get_the_ID();
if ( class_exists( 'acf' ) ) {
    /* Benifits Section */
    $benifit_title  = get_field( 'toshiba_maintain_b_title' );
    $benifit_img    = get_field( 'toshiba_maintain_b_img' );
    $benifit_img    = ! empty( $benifit_img ) ? $benifit_img[ 'url' ] : '';
    $benifit_desc   = get_field( 'toshiba_maintain_b_desc' );
    /* Types Of Contract Section */
    $contract_title = get_field( 'toshiba_maintain_contract_title' );
    $contract_types = get_field( 'toshiba_maintain_contract' );

    /* Get Brochure Section */
    $download_brochure = get_field( 'toshiba_brochure_download', $page_id );

    /* Get In touch Section */
    $get_touch_desc   = get_field( 'toshiba_maintain_git_desc' );
    $find_dealer_txt  = get_field( 'toshiba_maintain_git_fd_txt' );
    $find_dealer_link = get_field( 'toshiba_maintain_git_fd_link' );
    $form_title       = get_field( 'toshiba_maintain_git_form_title' );
    $form_shortcode   = get_field( 'toshiba_maintain_git_form' );
}
?>

<section class="managed_print_services managed_print_maintenance" style="background:url(<?php echo site_url(); ?>/wp-content/uploads/2021/01/Managed_Printbg.jpg) no-repeat center /cover; ">
    <div class="container">
        <div class="managed_print_wrap">
            <div class="inner">
                <div class="left">
                    <?php if ( ! empty( $benifit_title ) ) { ?>
                        <div class="sec-main-titel "><?php echo $benifit_title; ?></div>
                    <?php } ?>
                    <?php if ( ! empty( $benifit_img ) ) { ?>
                        <div class="image">
                            <img src="<?php echo $benifit_img; ?>" alt="<?= $benifit_title ?>">
                        </div>
                    <?php } ?>
                </div>
                <?php if ( ! empty( $benifit_desc ) ) { ?>
                    <div class="right">
                        <?php echo $benifit_desc; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>


<section class="ui_single-tab ui_single_tab_maintenance">
    <?php if ( ! empty( $contract_title ) ) { ?>
        <div class="container">
            <div class="sec-main-titel "><?php echo $contract_title; ?></div>
        </div>
    <?php } ?>
    <div class="border_sec">
        <div class="e-bridge_tabbing ">
            <div class="tabbing">
                <?php if ( $contract_types ) { ?>
                    <ul class="tabs">
                        <?php
                        foreach ( $contract_types as $contract_key => $contract_val ) {
                            $contract_title = $contract_val[ 'toshiba_maintain_c_title' ];
                            ?>
                            <?php if ( ! empty( $contract_title ) ) { ?>
                                <li rel="tab<?php echo $contract_key; ?>" class=""><?php echo $contract_title; ?></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                <?php } ?>
                <?php if ( $contract_types ) { ?>
                    <div class="tab_container">
                        <?php
                        foreach ( $contract_types as $contract_key => $contract_val ) {
                            $contract_title = $contract_val[ 'toshiba_maintain_c_title' ];
                            $contract_image = $contract_val[ 'toshiba_maintain_c_img' ];
                            $contract_image = ! empty( $contract_image ) ? $contract_image[ 'url' ] : '';
                            $contract_desc  = $contract_val[ 'toshiba_maintain_c_desc' ];
                            ?>
                            <?php if ( ! empty( $contract_title ) ) { ?>
                                <h3 class="tab_drawer_heading" rel="tab<?php echo $contract_key; ?>"><?php echo $contract_title; ?></h3>
                            <?php } ?>
                            <div id="tab<?php echo $contract_key; ?>" class="tab_content">
                                <div class="e-bridge_section">
                                    <div class="e-bridge_inner display_flex">
                                        <div class="content">
                                            <?php if ( ! empty( $contract_image ) ) { ?>
                                                <div class="image">
                                                    <img src="<?php echo $contract_image; ?>" alt="<?= $contract_title ?>">
                                                </div>
                                            <?php } ?>
                                            <?php if ( ! empty( $contract_desc ) ) { ?>
                                                <div class="inner_content">
                                                    <p><?php echo $contract_desc; ?></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>   
                <!-- .tab_container -->
            </div>
        </div>
    </div>
    <?php
    if ( $download_brochure ) {
        $download_brochure_text = get_field( 'toshiba_brochure_btn_txt', $page_id );
        $download_brochure_file = get_field( 'toshiba_brochure_file', $page_id );
        ?>
        <?php if ( ! empty( $download_brochure_file ) || ! empty( $download_brochure_text ) ) { ?>
            <div class="Download_Brochure">
                <a href="<?php echo $download_brochure_file; ?>" download="" tabindex="0"><?php echo $download_brochure_text; ?></a>
            </div>
        <?php } ?>
    <?php } ?>
</section>
<div class="print_find_dealer maintenance_print_find_dealer">
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
<?php if ( ! empty( $form_shortcode ) || ! empty( $form_title ) ) { ?>
    <div class="contact_us_form print_asses_cont">
        <div class="container">
        <h3><?php echo $form_title; ?></h3>
            <!--form-->
            <script>
              hbspt.forms.create({
            	region: "na1",
            	portalId: "8244541",
            	formId: "13d4270f-4b8d-4315-b7f0-2da04e8c7482"
            });
            </script>
        </div>        
    </div>
<?php } ?>
<?php get_footer(); ?>