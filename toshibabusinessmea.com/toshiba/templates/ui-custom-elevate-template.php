<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: UI Custom Elevate Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
$page_id = get_the_ID();
if ( class_exists( 'acf' ) ) {
    /* Empowering Section */
    $empower_logo           = get_field( 'toshiba_uie_t_logo', $page_id );
    $empower_title          = get_field( 'toshiba_uie_t_title', $page_id );
    $empower_desc           = get_field( 'toshiba_uie_t_desc', $page_id );
    $empower_img            = get_field( 'toshiba_uie_t_img', $page_id );
    $empower_request_btn    = get_field( 'toshiba_uie_t_req_btn', $page_id );
    $empower_form_shortcode = get_field( 'toshiba_uie_t_req_form_shortcode', $page_id );
    $empower_download_btn   = get_field( 'toshiba_uie_t_down_btn', $page_id );
    /* Video Section */
    $video_title            = get_field( 'toshiba_uie_v_title', $page_id );
    $video_poster           = get_field( 'toshiba_uie_v_pos_img', $page_id );
    $video                  = get_field( 'toshiba_uie_v_video', $page_id );
    /* Elevate Customization Section */
    $customization          = get_field( 'toshiba_uie_e_abt', $page_id );
    /* Brochure */
    $brochure_download      = get_field( 'toshiba_brochure_download', $page_id );
    $brochure               = get_field( 'toshiba_brochure_file', $page_id );
    $brochure_txt           = get_field( 'toshiba_brochure_btn_txt', $page_id );
	$brochure_link			= get_field( 'toshiba_uis_t_down_link', $page_id );
    $brochure_txt           = ! empty( $brochure_txt ) ? $brochure_txt : 'Download Brochure';
}
?>
<?php if ( ! empty( $empower_logo ) ) { ?>
    <div class="empowering_top_logo_wrap">
        <div class="container">
            <div class="empowering_top_logo">
                <img src="<?php echo $empower_logo; ?>" alt="<?= $empower_title ?>">
            </div>
        </div>
    </div>
<?php } ?>
<section class="empowering_section">
    <div class="empowering_section_wrap">
        <div class="inner">
            <div class="left left-padding">
                <div class="inner-left">
                    <?php if ( ! empty( $empower_title ) ) { ?>
                        <div class="sec-main-titel"><?php echo $empower_title; ?></div>
                    <?php } ?>
                    <?php
                    if ( ! empty( $empower_desc ) ) {
                        echo $empower_desc;
                    }
                    ?>
                </div>
            </div>
            <div class="right">
                <?php if ( ! empty( $empower_img ) ) { ?>
                    <div class="image" style="background: url(<?php echo $empower_img; ?>) no-repeat center /cover; height: 100%;">
                    <?php } ?>
                </div>
                <div class="Downloads_btn">
                    <?php if ( ! empty( $empower_request_btn) ) { ?>
                        <div class="button-1"><a href="#"  data-fancybox data-src="#hidden-content"><?php echo $empower_request_btn; ?></a></div>
                    <?php } ?>
                    <div class="button-1"><a href="<?= $brochure_link ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-ui-management" ><?php echo $empower_download_btn; ?></a></div>
                </div>
                <?php if ( ! empty( $empower_form_shortcode ) ) { ?>
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
				<?php if ( !empty ( $empower_request_btn ) ) { ?>
                        <div class="Request_quote_form contact_us_form" id="hidden-content-ui-management" style="display: none;">
							<input type="hidden" id="pdflink" value="<?php echo $brochure_link; ?>" />
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
        </div>
    </div>   
</section>

<?php if ( ! empty( $video ) ) { ?>
    <section class="Customize_section">
        <div class="container">
            <div class="Customize_section_wrap">
                <?php if ( ! empty( $video_title ) ) { ?>
                    <div class="sec-main-titel text-align"><?php echo $video_title; ?></div>
                <?php } ?>
                <div class="Customize_video">
					<div class="card">
					<video width="100%" height="581px" controls poster="<?php echo $video_poster; ?>">
       					<source src="<?php echo $video; ?>" type="video/mp4">
    				</video>
				</div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php if ( ! empty( $customization ) ) { ?>
    <section class="elevate_designed">
        <div class="elevate__inner">
            <?php
            foreach ( $customization as $key => $value ) {
                $custom_title = $value[ 'toshiba_uie_e_abt_title' ];
                $custom_img   = $value[ 'toshiba_uie_e_abt_img' ];
                $custom_desc  = $value[ 'toshiba_uie_e_abt_desc' ];
                ?>
                <div class="elevate_designed_wrap">
                    <div class="inner">
                        <div class="left">
                            <div class="image">
                                <?php if ( ! empty( $custom_img ) ) { ?>
                                    <img src="<?php echo $custom_img; ?>" alt="<?= $custom_title ?>">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="right">
                            <div class="content">
                                <?php if ( ! empty( $custom_title ) ) { ?>
                                    <div class="sec-main-titel"><?php echo $custom_title; ?></div>
                                <?php } ?>
                                <?php
                                if ( ! empty( $custom_desc ) ) {
                                    echo $custom_desc;
                                }
                                ?>                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    <?php if ( ! empty( $brochure_download ) && $brochure ) { ?>
            <div class="Download_Brochure">
                <a href="<?php echo $brochure; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-barcode1" download="" tabindex="0"><?php echo $brochure_txt; ?></a>
            </div>
    <?php } ?>
    </section>
<?php } ?>
<?php get_footer(); ?>