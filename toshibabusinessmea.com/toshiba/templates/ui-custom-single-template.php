<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: UI Custom Single Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
$page_id = get_the_ID();
if ( class_exists( 'acf' ) ) {
    /* highlight section */
    $highlight_title              = get_field( 'toshiba_uis_t_title', $page_id );
    $highlight_content_title      = get_field( 'toshiba_uis_t_stitle', $page_id );
    $highlight_desc               = get_field( 'toshiba_uis_t_desc', $page_id );
    $highlight_img                = get_field( 'toshiba_uis_t_img', $page_id );
    $highlight_req_btn_txt        = get_field( 'toshiba_uis_t_req_txt', $page_id );
//    $highlight_req_btn_link  = get_field( 'toshiba_uis_t_req_link', $page_id );
    $highlight_req_form_shortcode = get_field( 'toshiba_uis_t_req_form_shortcode', $page_id );
    $highlight_down_btn_txt       = get_field( 'toshiba_uis_t_down_txt', $page_id );
    $highlight_down_btn_link      = get_field( 'toshiba_uis_t_down_link', $page_id );
    /* challenge section */
    $challenge_sec                = get_field( 'toshiba_uis_ch_sec', $page_id );
    /* Brochure */
    $download_brochure            = get_field( 'toshiba_brochure_download', $page_id );
    $brochure                     = get_field( 'toshiba_brochure_file', $page_id );
    $brochure_title               = get_field( 'toshiba_brochure_btn_txt', $page_id );
    $brochure_title               = ! empty( $brochure_title ) ? $brochure_title : 'Download Brochure';
}
?>
<?php if ( ! empty( $highlight_title ) ) { ?>
    <div class="empowering_top_logo_wrap">
        <div class="container">
            <div class="empowering_top_logo">            
                <h2><?php echo $highlight_title; ?></h2>
            </div>
        </div>
    </div>
<?php } ?>


<section class="empowering_section">
    <div class="empowering_section_wrap">
        <div class="inner">
            <div class="left left-padding">
                <div class="inner-left">
                    <?php if ( ! empty( $highlight_content_title ) ) { ?>
                        <div class="sec-main-titel"><?php echo $highlight_content_title; ?></div>
                    <?php } ?>
                    <?php
                    if ( ! empty( $highlight_desc ) ) {
                        echo $highlight_desc;
                    }
                    ?>
                </div>
            </div>
            <div class="right">
                <?php if ( ! empty( $highlight_img ) ) { ?>
                    <div class="image" style="background: url(<?php echo $highlight_img; ?>) no-repeat center /cover; height: 100%;"></div>
                <?php } ?>
                <div class="Downloads_btn">
                    <?php if ( ! empty( $highlight_req_btn_txt ) ) { ?>
                        <div class="button-1"><a href="#" data-fancybox data-src="#hidden-content" ><?php echo $highlight_req_btn_txt; ?></a></div>
                    <?php } ?>
                    <?php if ( ! empty( $highlight_down_btn_link ) ) { ?>
                        <div class="button-1"><a href="<?php echo $highlight_down_btn_link; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-ui-management"><?php echo $highlight_down_btn_txt; ?></a></div>
                    <?php } ?>
                </div>
                <?php if ( ! empty( $highlight_req_form_shortcode ) ) { ?>
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
				<?php if ( !empty ( $highlight_req_form_shortcode ) ) { ?>
                        <div class="Request_quote_form contact_us_form" id="hidden-content-ui-management" style="display: none;">
									   
							<input type="hidden-" id="pdflink" value="<?php echo $highlight_down_btn_link; ?>" />
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

<?php if ( ! empty( $challenge_sec ) ) { ?>
    <section class="ui_single-tab" style= "background-image: url(<?php echo site_url(); ?>/wp-content/themes/toshiba/images/ui_single_bg.png);">
        <div class="border_sec">
            <div class="e-bridge_tabbing ">
                <div class="tabbing">
                    <ul class="tabs">
                        <?php foreach ( $challenge_sec as $tab_key => $tab ) { ?>
                            <li rel="tab<?php echo $tab_key; ?>" class="<?php echo ($tab_key == 0) ? 'active' : ''; ?>"><?php echo $tab[ 'toshiba_uis_sec_tab_title' ]; ?></li>
                        <?php } ?>
                    </ul>
                    <div class="tab_container">
                        <?php
                        foreach ( $challenge_sec as $key => $tab_content ) {
                            $ch_content_title = $tab_content[ 'toshiba_uis_sec_title' ];
                            $ch_content_desc  = $tab_content[ 'toshiba_uis_sec_desc' ];
                            $ch_content_img   = $tab_content[ 'toshiba_uis_sec_img' ];
                            ?>
                            <?php if ( ! empty( $ch_content_title ) ) { ?>
                                <h3 class=" tab_drawer_heading" rel="tab<?php echo $key; ?>"><?php echo $ch_content_title; ?></h3>
                            <?php } ?>
                            <div id="tab<?php echo $key; ?>" class="tab_content">
                                <div class="e-bridge_section">
                                    <div class="e-bridge_inner display_flex">
                                        <div class="content">
                                            <?php if ( ! empty( $ch_content_title ) ) { ?>
                                                <div class="sec-main-titel"><?php echo $ch_content_title; ?></div>
                                            <?php } ?>
                                            <?php if ( ! empty( $ch_content_desc ) ) { ?>
                                                <div class="inner_content">
                                                    <?php echo $ch_content_desc; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="image-left">
                                            <div class="image">
                                                <?php if ( ! empty( $ch_content_img ) ) { ?>
                                                    <img src="<?php echo $ch_content_img; ?>" alt="<?php if($ch_content_title){echo $ch_content_title;}else{echo 'Toshiba Customizatoin'; } ?>">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>                                     
                    </div>
                    <!-- .tab_container -->
                </div>
            </div>
            <div class="line"></div>
            <div class="bottom_logo">
                <img src="<?php echo TOSHIBA_THEME_IMAGE_FOLDER; ?>/challenge_shapes.png" alt="Challenge Shapes">
            </div>
        </div>
        <?php if ( ! empty( $download_brochure ) ) { ?>
            <div class="Download_Brochure">
                <a href="<?php echo $brochure; ?>" id="downloadpdf"  data-fancybox data-src="#hidden-content-barcode1"  download="" tabindex="0"><?php echo $brochure_title; ?></a>
            </div>
        <?php } ?>
    </section>
<?php } ?>

<?php get_footer(); ?>