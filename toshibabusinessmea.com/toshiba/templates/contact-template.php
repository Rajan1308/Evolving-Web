<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Contact Us Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
if ( class_exists( 'acf' ) ) {
    $contact_title           = get_field( 'toshiba_contact_title' );
    $contact_nav_title       = get_field( 'toshiba_contact_nav_title' );
    $contact_img             = get_field( 'toshiba_contact_img' );
    $contact_address_title   = get_field( 'toshiba_contact_addr_title' );
    $contact_address_display = get_field( 'toshiba_contact_address_display' );
    $contact_address         = get_field( 'toshiba_contact_address' );
    $get_direction_title     = get_field( 'toshiba_contact_dir_title' );
    $contact_form_title      = get_field( 'toshiba_contact_form_title' );
    $contact_form            = get_field( 'toshiba_contact_form_sc' );
}
$get_direction_title = ! empty( $get_direction_title ) ? $get_direction_title : 'Get Directions';
if ( $contact_address ) {
    $contact_address = strip_tags( str_replace( ' ', '%20', $contact_address ) );
}
?>

<section class="our_locations light-bg contact_us">
    <div class="our_locations_section">
        <div class="inner">
            <div class="left">
                <?php if ( ! empty( $contact_nav_title ) ) { ?>
                    <strong><?php echo $contact_nav_title; ?></strong>
                <?php } ?>
                <?php if ( ! empty( $contact_title ) ) { ?>
                    <h3><?php echo $contact_title; ?></h3>
                <?php } ?>
                <address>
                    <?php if ( ! empty( $contact_address_title ) ) { ?>
                        <strong><?php echo $contact_address_title; ?></strong>
                    <?php } ?>
                    <div class="full-add">
                        <img src="<?php echo  site_url(); ?>/wp-content/uploads/2021/01/directions.svg" alt="Direction">
                        <?php if ( ! empty( $contact_address_display ) ) { ?>
                            <div class="content">
                                <?php echo $contact_address_display; ?>                                
                                <a href="http://maps.google.com/maps?q=<?php echo $contact_address; ?>" target="_blank"><?php echo $get_direction_title; ?></a>
                            </div>
                        <?php } ?>
                    </div>
                </address>
            </div>
            <div class="right">
				<div id="map"></div>
                <!-- <?php if ( ! empty( $contact_address ) ) { ?>
                    <iframe width="100%" height="430" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?php echo $contact_address; ?>&amp;output=embed"></iframe>
                <?php } ?> -->
                <div class="footer-bottom-img">
                    <img src="<?php echo  site_url(); ?>/wp-content/uploads/2021/01/footer-bottom-img.png" alt="Footer bottom image">
                </div>
            </div>
        </div>
    </div>
</section>
<!--form-->

<?php if ( ! empty( $contact_form ) ) { ?>
    <div class="contact_us_form">
        <div class="container">
            <h3>
                <?php
                if ( ! empty( $contact_form_title ) ) {
                    echo $contact_form_title;
                }
                ?>
                <span><?php _e('*Denotes requires information.','tosiba'); ?></span>
            </h3>
           
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
<style>
    #map {
  height: 430px;
  /* The height is 400 pixels */
      width: 100%;
      /* The width is the width of the web page */
    }
</style>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdsTL7hSoGBPPWREdEwym8yT0DtWTbv_U&callback=initMap&libraries=&v=weekly&channel=2"
      async
    ></script>
    <script type="text/javascript">
        function initMap() {
          // The location of Uluru
          const uluru = { lat: 24.9878606, lng: 55.0883497};
          // The map, centered at Uluru
          const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 18,
            center: uluru,
          });
          // The marker, positioned at Uluru
          const marker = new google.maps.Marker({
            position: uluru,
            map: map,
          });
        }
    </script>
<?php get_footer(); ?>