<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Embeded Solutions Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
if ( class_exists( 'acf' ) ) {
    $embeded_page_title = get_field( 'toshiba_emb_ptitle' );
    $embeded_sol        = get_field( 'toshiba_emb_sol' );
}
?>
<!--this is title-->
<?php if ( ! empty( $embeded_page_title ) ) { ?>
    <div class="embedded_section_title">
        <div class="container">
            <h2><?php echo $embeded_page_title; ?></h2>
        </div>
    </div>
<?php } ?>
<?php if ( ! empty( $embeded_sol ) ) { ?>
    <section class="embedded_section scroll-bar position_relative">
        <div class="embedded_section-right">
            <img src="<?php echo TOSHIBA_THEME_IMAGE_FOLDER; ?>/right-img.png">
        </div>
        <div class="embedded_wrap">
                <?php
                foreach ( $embeded_sol as $solutions ) {
                    $sol_title          = $solutions[ 'toshiba_emb_sol_title' ];
                    $sol_img            = $solutions[ 'toshiba_emb_sol_img' ];
                    $sol_desc           = $solutions[ 'toshiba_emb_sol_desc' ];
                    $sol_btn_txt        = $solutions[ 'toshiba_emb_sol_req_txt' ];
                    $sol_btn_link       = $solutions[ 'toshiba_emb_sol_req_link' ];
                    $sol_form_shortcode = $solutions[ 'toshiba_emb_sol_req_form_shortcode' ]; ?>
                    <div class="embedded_inner">
                        <div class="inner">
                            <div class="image">
                                <?php if ( ! empty( $sol_img ) ) { ?>
                                    <img src="<?php echo $sol_img; ?>" alt="<?= $sol_title  ?>">
                                <?php } ?>
                            </div>
                            <div class="content scroll-bar" >
                                <?php if ( ! empty( $sol_title ) ) { ?>
                                    <h5><?php echo $sol_title; ?></h5>
                                <?php } ?>
                                <div class="prag">
                                    <?php if ( ! empty( $sol_desc ) ) { ?>
                                        <?php echo $sol_desc; ?> 
                                    <?php } ?>
                                </div>
                                <?php if ( ! empty( $sol_btn_txt ) ) { ?>
                                    <div class="button-1">
                                        <a href="#" data-fancybox data-src="#hidden-content" ><?php echo $sol_btn_txt; ?><i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>
                                <?php if ( ! empty( $sol_form_shortcode ) ) { ?>
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
                        </div>
                    </div>
                <?php
            }
            ?>            
        </div>	
        <div class="embedded_section-left">
            <img src="<?php echo TOSHIBA_THEME_IMAGE_FOLDER; ?>/left-image.png" alt="left image">
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>