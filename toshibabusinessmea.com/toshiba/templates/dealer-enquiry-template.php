<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;
/*
 * Template Name: Dealer Enquiry Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
$page_id = get_the_ID();
if ( class_exists( 'acf' ) ) {
    $become_dealer_title = get_field( 'toshiba_dealer_enq_title', $page_id );
    $form_title          = get_field( 'toshiba_dealer_enq_form_title', $page_id );
    $form_shortcode      = get_field( 'toshiba_dealer_enq_form', $page_id );
}
$description = apply_filters( 'the_content', get_the_content() );
$desc_img    = get_the_post_thumbnail_url();
?>

<section class="transforming_section dealer_page_sec">
    <div class="container">
        <div class="transforming_wrap">
            <div class="left">
                <?php if ( ! empty( $desc_img ) ) { ?>
                    <img src="<?php echo $desc_img; ?>" alt="<?= $become_dealer_title ?>">
                <?php } ?>
            </div>
            <div class="right">  
                <?php if ( ! empty( $become_dealer_title ) ) { ?>
                    <h2><?php echo $become_dealer_title; ?> </h2>
                <?php } ?>
                <?php
                if ( ! empty( $description ) ) {
                    echo $description;
                }
                ?>                
            </div>
        </div>
    </div>
</section>

<?php if ( ! empty( $form_shortcode ) ) { ?>
<div class="contact_us_form dealer_enquery_form light-bg">
    <div class="container">
        <h3>
            <?php echo $form_title; ?>
            <span><?php _e( '*Denotes requires information.', 'tosiba' ); ?></span>
        </h3>
        <script>
          hbspt.forms.create({
        	region: "na1",
        	portalId: "8244541",
        	formId: "be51a8af-8029-4f57-946f-590d5926d7a7"
        });
        </script>
    </div>
</div>
<?php } ?>
<?php
get_footer();
?>