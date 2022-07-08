<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;

/**
 * Template Name: Career Template
 *
 * @package WordPress
 * @subpackage toshiba
 * @since toshiba 1.0
 */
get_header();
$page_id = get_the_ID();
if ( class_exists( 'acf' ) ) {
    $page_title     = get_field( 'toshiba_career_title', $page_id );
    $form_title     = get_field( 'toshiba_career_form_title', $page_id );
    $form_shortcode = get_field( 'toshiba_career_form', $page_id );
}
$description = apply_filters( 'the_content', get_the_content() );
;
?>

<div class="career_form_text">
    <div class="container">
        <div class="text_div">
            <?php if ( ! empty( $page_title ) ) { ?>
                <h2><?php echo $page_title; ?></h2>
            <?php } ?>
            <?php
            if ( ! empty( $description ) ) {
                echo $description;
            }
            ?>			
        </div>
    </div>
</div>

<!--form-->
<?php if ( ! empty( $form_shortcode ) ) { ?>
    <div class="contact_us_form light-bg career_form_sec" >
        <div class="container" id="applynow">		
            <h3>
                <?php
                if ( ! empty( $form_title ) ) {
                    echo $form_title;
                }
                ?>
                <span><?php _e('*Denotes requires information.','tosiba'); ?></span>
            </h3>
            <script>
              hbspt.forms.create({
            	region: "na1",
            	portalId: "8244541",
            	formId: "01545d6b-0531-4bd8-91b2-7676e742e9a5"
            });
            </script>
        </div>
    </div>
<?php } ?>
<?php get_footer(); ?>