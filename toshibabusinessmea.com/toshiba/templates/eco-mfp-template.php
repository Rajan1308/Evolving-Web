<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Eco MFP Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
?>
<?php
if ( class_exists( 'acf' ) ) {
    $id                 = get_the_ID();
    /* About Section */
    $a_main_title       = get_field( 'toshiba_eco_a_main_title', $id );
    $a_title            = get_field( 'toshiba_eco_a_title', $id );
    $a_image            = get_field( 'toshiba_eco_a_img', $id );
    $a_image            = ! empty( $a_image ) ? $a_image[ 'url' ] : '';
    $a_description      = get_field( 'toshiba_eco_a_desc', $id );
    $a_cta              = get_field( 'toshiba_eco_a_btn', $id );
    /* Video Section */
    $v_title            = get_field( 'toshiba_eco_v_title', $id );
    $v_pos_img          = get_field( 'toshiba_eco_v_pos_img', $id );
    $v_pos_img          = ! empty( $v_pos_img ) ? $v_pos_img[ 'url' ] : '';
    $v_video            = get_field( 'toshiba_eco_v_video', $id );
    /* About Green Priniting */
    $gp_title           = get_field( 'toshiba_eco_gp_title', $id );
    $gp_desc            = get_field( 'toshiba_eco_gp_desc', $id );
    $gp_how             = get_field( 'toshiba_eco_gp_how', $id );
    /* Product Description */
    $features           = get_field( 'toshiba_eco_p_fb', $id );
    /* Brochure Download */
    $dwn_brch           = get_field( 'toshiba_brochure_download', $id );
    $dwn_brch_title     = get_field( 'toshiba_brochure_btn_txt', $id );
    $dwn_brch_file      = get_field( 'toshiba_brochure_file', $id );
    $req_label          = get_field( 'toshiba_eco_a_request_a_quote_label', $id );
    $req_form_shortcode = get_field( 'toshiba_eco_a_request_a_quote_form_shortcode', $id );
	
 /* Hybrid product */
	$hyb_title = get_field('title', $id);
	
	
}
?>
<div class="barcode-label-printers eco-mfp-page light-bg" >
    <div class="container">
        <div class="barcode-label_section">
            <div class="toshiba_title">
                <?php if ( ! empty( $a_main_title ) ) { ?>
                    <strong><?php echo esc_html($a_main_title); ?></strong> 
                <?php } ?>
                <?php if ( ! empty( $a_title ) ) { ?>
                    <h2><?php echo $a_title; ?></h2>
                <?php } ?>
            </div>
            <div class="barcode-label_wrap scroll-bar">
                <div class="inner">
                    <div class="left prag">
                        <?php if ( ! empty( $a_description ) ) { ?>
                            <p><?php echo $a_description; ?></p>
                        <?php } ?>
                            <div class="Downloads_btn">
                            <?php if ( ! empty( $req_label) ) { ?>
                                <div class="button-1"><a href="#"  data-fancybox data-src="#hidden-content"><?php echo $req_label; ?></a></div>
                            <?php } ?>
                                <?php if ( ! empty( $a_cta ) ) { ?>
                                    <?php
                                    foreach ( $a_cta as $a_cta_key => $a_cta_val ) {
                                        $cta = $a_cta_val[ 'toshiba_eco_a_cta' ];
										
                                        ?>
                                        <div class="button-1"><a href="<?php echo $cta[ 'url' ]; ?>" id="downloadpdf"  <?php if($cta[ 'title' ]=='Download Brochure'){ echo 'data-fancybox data-src="#hidden-content-eco-mfp"'; }?>  ><?php echo $cta[ 'title' ]; ?></a></div>
										<?php if ( ! empty( $req_form_shortcode ) ) { ?>
								    <div class="Request_quote_form contact_us_form" id="hidden-content-eco-mfp" style="display: none;">
										<input type="hidden" id="pdflink" value="<?php echo $cta[ 'url' ]; ?>" />
    									<script>
    									  hbspt.forms.create({
    										region: "na1",
    										portalId: "8244541",
    										formId: "9d556644-d84a-45ca-9dc0-2cf421816ac7"
    									});
    									</script>
									</div>
								
								<?php } ?> 
								
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            
                                
                            
						<?php if ( ! empty( $a_cta ) ) { ?>
						<div class="Request_quote_form contact_us_form" id="hidden-content" style="display: none;">
							<script>
                              hbspt.forms.create({
                            	region: "na1",
                            	portalId: "8244541",
                            	formId: "163aacff-7b6c-4432-aed4-71300ecdc91d"
                            });
                            </script>
						</div>
						<?php } ?>
                    </div>
                    <?php if ( ! empty( $a_image ) ) { ?>
                        <div class="right">
                            <div class="image">
                                <img src="<?php echo $a_image; ?>" alt="<?= $a_title ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="Customize_section position_relative">
    <div class="container">
        <div class="Customize_section_wrap">
            <div class="Customize_video">
                <?php if ( ! empty( $v_pos_img ) && ! empty( $v_video ) ) { ?>
				<div class="card">
					<video width="100%" height="581px" controls poster="<?php echo $v_pos_img; ?>">
       					<source src="<?php echo $v_video; ?>" type="video/mp4">
    				</video>
				</div>
                <?php } ?>
                <?php if ( ! empty( $v_title ) ) { ?>
                    <div class="video_title"><?php echo $v_title; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<section class="printing_Section position_realtive">
    <div class="container">
        <div class="printing_Section_title text-align">
            <?php if ( ! empty( $gp_title ) ) { ?>
                <h2><?php echo $gp_title; ?></h2>
            <?php } ?>
            <?php if ( ! empty( $gp_desc ) ) { ?>
                <p><?php echo $gp_desc; ?></p>
            <?php } ?>
        </div>
        <?php if ( ! empty( $gp_how ) ) { ?>
            <div class="printing_Section_wrap">
                <?php
                foreach ( $gp_how as $gp_how_key => $gp_how_val ) {
                    $title = $gp_how_val[ 'toshiba_eco_gp_how_title' ];
                    $image = $gp_how_val[ 'toshiba_eco_gp_how_img' ];
                    $desc  = $gp_how_val[ 'toshiba_eco_gp_how_desc' ];
                    ?>
                    <div class="printing_Section_inner">
                        <?php if ( ! empty( $image ) ) { ?>
                            <div class="image">
                                <img src="<?php echo $image[ 'url' ]; ?>" alt="<?= $title ?>">
                            </div>
                        <?php } ?>
                        <div class="content">
                            <?php if ( ! empty( $title ) ) { ?>
                                <h6><?php echo $title; ?></h6>
                            <?php } ?>
                            <?php if ( ! empty( $desc ) ) { ?>
                                <p><?php echo $desc; ?></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
<!--  Hybrid Product -->

<section class="about-toshiba padding-top">
    <div class="container">
		<h3><?= $hyb_title ?></h3><br />
        <div class="about_toshib_inner display_flex eco">
		 
		 <?php if( have_rows('products') ): ?>	
			<?php $i = 1; while( have_rows('products') ): the_row(); 
				$image = get_sub_field('product_image');
				$link = get_sub_field('link');
				$pro_title = get_sub_field('product_title');
			?>
		 	<div class="<?php if($i==1){ echo 'left'; }else {echo 'right';} ?>">
				<div class="hyb-pro">
					<a href="<?= $link ?>"><img  src="<?= $image ?>" alt="<?= $pro_title ?>" /></a>	
				</div>
				<div class="hyb-title">
					<h4>
						<?php echo $pro_title; ?>
					</h4>
				</div>
				<div class="hybpro-link">
					<div class="button-1"><a href="<?= $link ?>">Read more</a></div>
				</div>
		 	</div>
			<?php $i++; endwhile; ?>
		<?php endif; ?>
	 </div>
	</div>
</section>
<!--  End Hybrid Product -->
<?php if ( ! empty( $features ) ) { ?>
    <div class="single_printer_item Eco-MFP-tab" >
        <section class="ui_single-tab">
            <div class="border_sec">
                <div class="e-bridge_tabbing ">
                    <div class="tabbing">
                        <ul class="tabs">
                            <?php
                            foreach ( $features as $feature_key => $feature_val ) {
                                $tab_title   = $feature_val[ 'toshiba_eco_p_fb_tab_title' ];
                                $tab_content = $feature_val[ 'toshiba_eco_p_fb_content' ];
                                ?>
                                <li rel="tab<?php echo $feature_key; ?>" class="tab_last"><?php echo $tab_title; ?></li>
                            <?php } ?>
                        </ul>
                        <div class="tab_container">
                            <?php
                            foreach ( $features as $feature_key => $feature_val ) {
                                $tab_title   = $feature_val[ 'toshiba_eco_p_fb_tab_title' ];
                                $tab_content = $feature_val[ 'toshiba_eco_p_fb_content' ];
                                ?>
                                <?php if ( ! empty( $tab_title ) ) { ?>
                                    <h3 class="tab_drawer_heading d_active" rel="tab<?php echo $feature_key; ?>"><?php echo $tab_title; ?></h3>
                                <?php } ?>
                                <div id="tab<?php echo $feature_key; ?>" class="tab_content" style="">
                                    <div class="e-bridge_section">
                                        <div class="e-bridge_inner display_flex">
                                            <div class="content">
                                                <?php
                                                foreach ( $tab_content as $tab_content_key => $tab_content_val ) {
                                                    $title   = $tab_content_val[ 'toshiba_eco_p_fb_title' ];
                                                    $content = $tab_content_val[ 'toshiba_eco_p_fb_feature' ];
                                                    ?>
                                                    <div class="col col-4">
                                                        <?php if ( ! empty( $title ) ) { ?>
                                                            <h3><?php echo $title; ?></h3>
                                                        <?php } ?>
                                                        <?php if ( ! empty( $content ) ) { ?>
                                                            <?php echo $content; ?>
                                                        <?php } ?>
                                                    </div>
                                                <?php } ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            <?php } ?>
                        </div>
                        <!-- .tab_container -->
                    </div>
                </div>
            </div>
            <?php if ( $dwn_brch ) { ?>
                <div class="Download_Brochure">
                    <a href="<?php echo $dwn_brch_file; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-barcode1" download="" tabindex="0"><?php echo $dwn_brch_title; ?></a>
                </div>
            <?php } ?>
        </section>
    </div>
<?php } ?>
<?php get_footer(); ?>