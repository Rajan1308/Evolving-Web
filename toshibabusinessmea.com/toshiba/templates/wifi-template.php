<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Wifi Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();

if ( class_exists( 'acf' ) ) {
    /* Highlight Section */
    $page_title              = get_field( 'toshiba_wifi_h_ptitle' );
    $high_title              = get_field( 'toshiba_wifi_h_title' );
    $high_img                = get_field( 'toshiba_wifi_h_img' );
    $high_feature            = get_field( 'toshiba_wifi_h_feature' );
    $high_req_txt            = get_field( 'toshiba_wifi_h_req_txt' );
    $high_req_link           = get_field( 'toshiba_wifi_h_req_link' );
    $high_req_form_shortcode = get_field( 'toshiba_wifi_h_req_form_shortcode' );
    $high_down_txt           = get_field( 'toshiba_wifi_h_down_txt' );
    $high_down_link          = get_field( 'toshiba_wifi_h_down_link' );
    /* Challenges Section */
    $challenge_sec_title     = get_field( 'toshiba_wifi_c_title' );
    $challenge_sec_img       = get_field( 'toshiba_wifi_c_img' );
    $challenge_title         = get_field( 'toshiba_wifi_c_ctitle' );
    $challenges              = get_field( 'toshiba_wifi_c_cdesc' );
    $solution_title          = get_field( 'toshiba_wifi_c_stitle' );
    $solutions               = get_field( 'toshiba_wifi_c_sdesc' );
    /* Benifits Section */
    $benifit_title           = get_field( 'toshiba_wifi_b_title' );
    $benifit_img             = get_field( 'toshiba_wifi_b_img' );
    $benifit_desc            = get_field( 'toshiba_wifi_b_desc' );
}
?>
<?php if ( ! empty( $page_title ) ) { ?>
    <div class="empowering_top_logo_wrap ">
        <div class="container">
            <div class="empowering_top_logo">
                <h2><?php echo $page_title; ?></h2>
            </div>
        </div>
    </div>
<?php } ?>
<section class="features_section wifi_features_section light-bg">
    <div class="features_wrap">
        <div class="right-bg"></div>
        <div class="container">
            <div class="features_inner">
                <div class="left pos_rel">
                    <div class="content_wrap">
                        <?php if ( ! empty( $high_title ) ) { ?>
                            <div class="sec-main-titel"><?php echo $high_title; ?></div>
                        <?php } ?>
                        <?php echo $high_feature; ?>
                    </div>
                    <div class="Downloads_btn pm-left-button">                   
                        <?php if ( ! empty( $high_req_txt ) ) { ?>
                            <div class="button-1"><a href="<?php echo $high_req_link; ?>" data-fancybox data-src="#hidden-content" ><?php echo $high_req_txt; ?></a>
                            </div>
                        <?php } ?>
                        <?php if ( ! empty( $high_down_link ) ) { ?>
                            <div class="button-1"><a href="<?php echo $high_down_link; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-wifi"><?php echo $high_down_txt; ?></a></div>
                        <?php } ?>
                    </div>
                    <?php if ( !empty ( $high_req_form_shortcode ) ) { ?>
                        <div class="Request_quote_form contact_us_form" id="hidden-content" style="display: none;">
							<input type="hidden" id="pdflink" value="<?php echo $high_down_link; ?>" />
							<script>
                              hbspt.forms.create({
                            	region: "na1",
                            	portalId: "8244541",
                            	formId: "163aacff-7b6c-4432-aed4-71300ecdc91d"
                            });
                            </script>
                        </div>
                    <?php } ?>
					<?php if ( !empty ( $high_down_link ) ) { ?>
                       <div class="Request_quote_form contact_us_form" id="hidden-content-wifi" style="display: none;">
                           <input type="hidden" id="pdflink" value="<?php echo $high_down_link; ?>" />
						   <script>
                              hbspt.forms.create({
                            	region: "na1",
                            	portalId: "8244541",
                            	formId: "9d556644-d84a-45ca-9dc0-2cf421816ac7"
                            });
                            </script>
                        </div>
					
                    <?php } ?>
                </div>
                <div class="right ">
                    <div class="image">
                        <?php if ( ! empty( $high_img ) ) { ?>
                            <img src="<?php echo $high_img; ?>" alt="<?= $high_title ?>">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="your_challenge_sec wifi_your_challenge_sec">
    <div class="border_box">
        <div class="container">
            <div class="inner">
                <div class="other">
                    <div class="img_div">
                        <?php if ( ! empty( $challenge_sec_img ) ) { ?>
                            <img src="<?php echo $challenge_sec_img; ?>" alt="<?= $challenge_sec_title ?>"> 
                        <?php } ?>
                        <?php if ( ! empty( $challenge_sec_title ) ) { ?>
                            <h2 class="sec_title"><?php echo $challenge_sec_title; ?></h2>
                        <?php } ?>
                    </div>
                </div>
                <div class="left">
                    <?php if ( ! empty( $challenge_title ) ) { ?>
                        <h2><?php echo $challenge_title; ?></h2>
                    <?php } ?>
                    <?php echo $challenges; ?>               
                </div>
                <div class="right">
                    <?php if ( ! empty( $solution_title ) ) { ?>
                        <h2><?php echo $solution_title; ?></h2>
                    <?php } ?>
                    <?php echo $solutions; ?>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <div class="bottom_logo">
            <img src="<?php echo  site_url(); ?>/wp-content/themes/toshiba/images/challenge_shapes.png" alt="Challenge Shapes">
        </div>
    </div>
</section>
<section class="your_benifit_sec wifi-your_benifit_sec">
    <div class="inner">
        <div class="right">
            <div class="img_div">
                <?php if ( ! empty( $benifit_img ) ) { ?>
                    <img src="<?php echo $benifit_img; ?>" alt="<?= $benifit_title ?>">   
                <?php } ?>
            </div>
        </div>
        <div class="left right-padding">
            <?php if ( ! empty( $benifit_title ) ) { ?>
                <h2><?php echo $benifit_title; ?></h2>
            <?php } ?>
            <?php echo $benifit_desc; ?>         
        </div>
    </div>
</section>
<?php get_footer(); ?>