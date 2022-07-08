<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Document Management Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
if ( class_exists( 'acf' ) ) {
    /* Automate Business Section */
    $autom_title              = get_field( 'toshiba_docm_ab_title' );
    $autom_logo               = get_field( 'toshiba_docm_ab_logo' );
    $autom_desc               = get_field( 'toshiba_docm_ab_desc' );
    $autom_img                = get_field( 'toshiba_docm_ab_img' );
    $autom_req_txt            = get_field( 'toshiba_docm_ab_req_txt' );
    $autom_req_form_shortcode = get_field( 'toshiba_docm_ab_req_form_shortcode' );
//    $autom_req_link           = get_field( 'toshiba_docm_ab_req_link' );
    $autom_down_txt           = get_field( 'toshiba_docm_ab_down_txt' );
    $autom_down_link          = get_field( 'toshiba_docm_ab_down_link' );
    /* Video Section */
    $video_title              = get_field( 'toshiba_docm_v_title' );
    $video_poster             = get_field( 'toshiba_docm_v_post_img' );
    $video                    = get_field( 'toshiba_docm_v_video' );
    /* Transform Section */
    $transform_title          = get_field( 'toshiba_docm_t_title' );
    $transform_image          = get_field( 'toshiba_docm_t_img' );
    $transform_desc           = get_field( 'toshiba_docm_t_desc' );
    /* Features */
    $feature_title            = get_field( 'toshiba_docm_f_title' );
    $feature_img              = get_field( 'toshiba_docm_f_img' );
    $features                 = get_field( 'toshiba_docm_f_ftr' );
    /* Partner Solutions */
    $partner_sol_title        = get_field( 'toshiba_docm_ps_title' );
    $partner_sol              = get_field( 'toshiba_docm_sol' );
}
?>
<section class="light-bg mobile-solution_in">
    <div class="mobile-solution doc-manage_section ">
        <div class="mobile_solution_section" style="background: url(<?php echo TOSHIBA_THEME_IMAGE_FOLDER; ?>/document-bg-img.png) no-repeat; background-size: 100% 100%; ">
            <div class="mobile_inner">
                <div class="image-top">
                    <?php if ( ! empty( $autom_img ) ) { ?>
                        <img src="<?php echo $autom_img; ?>" alt="<?= $autom_title  ?>">
                    <?php } ?>
                    <div class="Downloads_btn">
                        <?php if ( ! empty( $autom_req_txt ) ) { ?>
                            <div class="button-1"><a href="#" data-fancybox data-src="#hidden-content" ><?php echo $autom_req_txt; ?></a></div>
                        <?php } ?>
                        <?php if ( ! empty( $autom_down_link ) ) { ?>
                            <div class="button-1"><a href="<?php echo $autom_down_link; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-doc-management"><?php echo $autom_down_txt; ?></a></div>
                        <?php } ?>
                    </div>
					<div class="Request_quote_form contact_us_form" id="hidden-content" style="display: none;">
						<script>
                          hbspt.forms.create({
                        	region: "na1",
                        	portalId: "8244541",
                        	formId: "163aacff-7b6c-4432-aed4-71300ecdc91d"
                        });
                        </script>
					</div>
                    <?php
                    if ( ! empty( $autom_req_form_shortcode ) ) { ?>
                        <div class="Request_quote_form contact_us_form" id="hidden-content-doc-management" style="display: none;">
							<input type="hidden" id="pdflink" value="<?php echo $autom_down_link; ?>" />
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
                <div class="mobile_main_wrap">
                    <div class="mobile_main_section">
                        <div class="inner">
                            <div class="title">
                                <?php if ( ! empty( $autom_title ) ) { ?>
                                    <h2><?php echo $autom_title; ?></h2>
                                <?php } ?>
                            </div>
                            <div class="left_imgae_mobile">
                                <?php if ( ! empty( $autom_logo ) ) { ?>
                                    <img src="<?php echo $autom_logo; ?>" alt="<?= $autom_title ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ( ! empty( $autom_desc ) ) { ?>
                            <div class="content scroll-bar">
                                <div class="left ">                                    
                                    <div class="prag">
                                        <?php echo $autom_desc; ?>                                        
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if ( ! empty( $video ) ) { ?>
    <section class="Customize_section position_relative">
        <div class="container">
            <div class="Customize_section_wrap">
                <div class="Customize_video">
					<div class="card">
					<video width="100%" height="581px" controls poster="<?php echo $video_poster; ?>">
       					<source src="<?php echo $video; ?>" type="video/mp4">
    				</video>
					</div>
					
                    <?php if ( ! empty( $video_title ) ) { ?>
                        <div class="video_title"><?php echo $video_title; ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<section class="transforming_section">
    <div class="container">
        <div class="transforming_wrap">
            <div class="left">
                <?php if ( ! empty( $transform_title ) ) { ?>
                    <h2><?php echo $transform_title; ?></h2>
                <?php } ?>
                <?php
                if ( ! empty( $transform_desc ) ) {
                    echo $transform_desc;
                }
                ?>
            </div>
            <div class="right">
                <?php if ( ! empty( $transform_image ) ) { ?>
                    <img src="<?php echo $transform_image; ?>" alt="<?= $transform_title ?>">
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php if ( ! empty( $features ) ) { ?>
    <section class="key_features">
        <div class="key_features_section">
            <div class="features_inne">
                <div class="image">
                    <?php if ( ! empty( $feature_img ) ) { ?>
                        <img src="<?php echo $feature_img; ?>" alt="<?= $feature_title ?>">
                    <?php } ?>
                </div>
                <div class="content right-padding">
                    <?php if ( ! empty( $feature_title ) ) { ?>
                        <h2><?php echo $feature_title; ?></h2>
                    <?php } ?>
                    <ul>
                        <?php foreach ( $features as $key => $value ) { ?>
                            <li><?php echo $value[ 'toshiba_docm_f_ftr_feature' ]; ?></li>
                        <?php } ?>                    
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php if ( ! empty( $partner_sol ) ) { ?>    
    <section class="partner_solution">
        <div class="container">
            <div class="title text-align">
                <?php if ( ! empty( $partner_sol_title ) ) { ?>
                    <h2><?php echo $partner_sol_title; ?></h2>
                <?php } ?>
            </div>
            <div class="partner_solution_wrap">
                <?php
                foreach ( $partner_sol as $key => $solution ) {
                    $sol_img  = $solution[ 'toshiba_docm_sol_img' ];
                    $sol_desc = $solution[ 'toshiba_docm_sol_desc' ];
                    ?>
                    <div class="partner_solution_inner">
                        <div class="inner">
                            <div class="image">
                                <?php if ( ! empty( $sol_img ) ) { ?>
                                    <img src="<?php echo $sol_img; ?>" alt="<?= $partner_sol_title ?>">
                                <?php } ?>
                            </div>
                            <?php
                            if ( ! empty( $sol_desc ) ) {
                                echo $sol_desc;
                            }
                            ?>                            
                        </div>
                    </div>
                    <?php
                }
                ?>                
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer(); ?>