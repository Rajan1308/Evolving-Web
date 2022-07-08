<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Driver Plugin Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();

if ( class_exists( 'acf' ) ) {
    /* About Driver Plugin Section */
    $abt_driver_title = get_field( 'toshiba_driver_title' );
    $abt_driver_img   = get_field( 'toshiba_driver_img' );
    $abt_driver_desc  = get_field( 'toshiba_driver_desc' );
	
	$pd_req_form_shortcode = get_field( 'toshiba_pmd_f_request_a_quote_form_shortcode', $page_id );
    $pd_req_form_label     = get_field( 'toshiba_pd_f_request_a_quote_label', $page_id );
    /* Driver points tab Section */
    $driver_points    = get_field( 'toshiba_driver_point' );
}
?>

<section class="Driver_plugins"> 
  <div class="Driver_plugins_wrap">
    <div class="inner display_flex">
      <div class="left left-padding">
          <?php if ( ! empty( $abt_driver_title ) ) { ?>
              <div class="sec-main-titel"><?php echo $abt_driver_title; ?></div>
          <?php } ?>
          <?php if ( ! empty( $abt_driver_desc ) ) { 
              echo $abt_driver_desc;
            }
          ?>
      </div>
      <div class="right">
        <div class="images">
            <?php if ( ! empty( $abt_driver_img ) ) { ?>
                <img src="<?php echo $abt_driver_img; ?>" alt="<?= $abt_driver_title ?>">
            <?php } ?>
        </div>
				<div class="Downloads_btn ">
					<?php if ( !empty ( $pd_req_form_label ) ) { ?>
					<div class="button-1">
            <a href="#" data-fancybox data-src="#hidden-content" ><?php echo $pd_req_form_label; ?></a>
					</div>
					<?php } ?>
				</div>
      </div>
	  </div>
    <?php
      if ( ! empty( $pd_req_form_shortcode ) ) { ?>
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
</section>

<?php if ( ! empty( $driver_points ) ) { ?>
  <div class="e-bridge_tabbing ">
      <div class="tabbing">
        <ul class="tabs">
            <?php
            foreach ( $driver_points as $tab_key => $tab_val ) {
                $tab_title = ! empty( $tab_val[ 'toshiba_driver_point_tab_title' ] ) ? $tab_val[ 'toshiba_driver_point_tab_title' ] : $tab_val[ 'toshiba_driver_point_title' ];
                ?>
                <li class="<?php echo ($tab_key == 0) ? 'active' : ''; ?>" rel="tab<?php echo $tab_key; ?>"><?php echo $tab_title; ?></li>
                <?php
            }
            ?>
        </ul>
        <div class="tab_container">
            <?php
            foreach ( $driver_points as $key => $tab_content ) {
                $point_title    = $tab_content[ 'toshiba_driver_point_title' ];
                $point_desc     = $tab_content[ 'toshiba_driver_point_desc' ];
                $point_img      = $tab_content[ 'toshiba_driver_point_img' ];
                $point_brochure = $tab_content[ 'toshiba_driver_point_brochure' ];
                ?>
                <?php if ( ! empty( $point_title ) ) { ?>
                    <h3 class="<?php echo ($tab_key == 0) ? 'd_active' : ''; ?> tab_drawer_heading" rel="tab<?php echo $key; ?>"><?php echo $point_title; ?></h3>
                <?php } ?>
                <div id="tab<?php echo $key; ?>" class="tab_content">
                    <div class="e-bridge_section">
                        <div class="e-bridge_inner display_flex">
                            <div class="content">
                                <?php if ( ! empty( $point_title ) ) { ?>
                                    <div class="sec-main-titel"><?php echo $point_title; ?></div>
                                <?php } ?>
                                <div class="inner_content">
                                    <?php
                                    if ( ! empty( $point_desc ) ) {
                                        echo $point_desc;
                                    }
                                    ?>
                                    <?php if ( ! empty( $point_brochure ) ) { ?>
                                        <div class="Download_Brochure">
                                            <a href="<?php echo $point_brochure; ?>"  download="" tabindex="0">Download Brochure</a>
                                        </div>
                                    <?php } ?>
								
                                </div>
                            </div>
                            <div class="image-left">
                                <div class="image">
                                    <?php if ( ! empty( $point_img ) ) { ?>
                                        <img src="<?php echo $point_img; ?>" alt="<?= $point_title ?>">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>       
        </div>
        <!-- .tab_container -->
      </div>
  </div>
<?php } ?>
<?php get_footer(); ?>