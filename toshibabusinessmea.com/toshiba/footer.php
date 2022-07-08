<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage TOSHIBA
 * @since Toshiba 1.0
 */
//product menu
$product_menu_args  = array (
    'theme_location' => 'footer1',
    'container'      => 'ul',
    'menu_class'     => ''
);
//solution menu
$solution_menu_args = array (
    'theme_location' => 'footer2',
    'container'      => 'ul',
    'menu_class'     => ''
);
//service menu
$service_menu_args  = array (
    'theme_location' => 'footer3',
    'container'      => 'ul',
    'menu_class'     => ''
);
//career menu
$career_menu_args   = array (
    'theme_location' => 'footer4',
    'container'      => 'ul',
    'menu_class'     => '',
    'link_before'    => '<strong>',
    'link_after'     => '</strong>'
);
//policy menu
$policy_menu_args   = array (
    'theme_location' => 'footer',
    'container'      => 'ul',
    'menu_class'     => ''
);
$site_url           = site_url();
if ( class_exists( 'acf' ) ) {
    $footer_logo_left          = get_field( 'toshiba_options_f_logo', 'option' );
    $footer_logo_right         = get_field( 'toshiba_options_f_logo2', 'option' );
    $contact_title             = get_field( 'toshiba_options_f_cont_title', 'option' );
    $contact_addr              = get_field( 'toshiba_options_f_cont_addr', 'option' );
    //social media links
    $linkedin_link             = get_field( 'toshiba_options_s_li_link', 'option' );
    $fb_link                   = get_field( 'toshiba_options_s_fb_link', 'option' );
    $insta_link                = get_field( 'toshiba_options_s_in_link', 'option' );
    /* Help Section */
    $help_sec_title            = get_field( 'toshiba_options_f_h_title', 'option' );
    $help_sec_bg_img           = get_field( 'toshiba_options_f_h_img', 'option' );
    $helps                     = get_field( 'toshiba_options_f_help', 'option' );
    /* Newsletter Form */
    $newsletter_form_title     = get_field( 'toshiba_options_f_nl_title', 'option' );
    $newsletter_form_shortcode = get_field( 'toshiba_options_f_nl_shortcode', 'option' );

    $copyright = get_field( 'toshiba_options_f_copy', 'option' );
}
$contact_title = ! empty( $contact_title ) ? $contact_title : 'Contact';
?>	
<div class="Request_quote_form contact_us_form" id="hidden-content-barcode1" style="display: none;">
    <?php //echo do_shortcode( '[contact-form-7 id="2286" title="Download Brochure Form" html_class="download_broch_form"]' ); ?>

 
<script>
  hbspt.forms.create({
	region: "na1",
	portalId: "8244541",
	formId: "9d556644-d84a-45ca-9dc0-2cf421816ac7"
});
</script>

</div>
<div class="footer_section">
    <div class="help_you" style="background:url(<?php echo $help_sec_bg_img; ?>)  no-repeat center / cover; ">
        <div class="container">
            <div class="content">
                <?php if ( ! empty( $help_sec_title ) ) { ?>
                    <h3><?php echo $help_sec_title; ?></h3>
                <?php } ?>
                <?php if ( ! empty( $helps ) ) { ?>
                    <div class="help_you_section">
                        <?php
                        $i = 1;
                        foreach ( $helps as $help ) {
                            $help_title    = $help[ 'toshiba_options_f_help_title' ];
                            $help_img      = $help[ 'toshiba_options_f_help_logo' ];
                            $help_redirect = $help[ 'toshiba_options_f_help_link' ];
							
                            ?>                                                    
                            <div class="help_you_inner" <?php
                            if ( $help_redirect == '#'  ) { ?> id="help-<?php echo $i+1; ?>" <?php } ?> >
                                <div class="image">                                    
                                    <?php if ( ! empty( $help_img ) ) { ?>
                                        <a <?php echo ! empty( $help_redirect ) ? 'href="' . $help_redirect . '"' : ''; ?> <?php
                                        if ( $help_redirect == '#' ) { ?>
                                            data-fancybox data-src="#hidden-content-help-<?= $i+1 ?>"
                                        <?php }
                                        ?> >
                                            <img src="<?php echo $help_img; ?>" alt="<?= $help_title ?>">
                                        </a>                                
                                    <?php } ?>
                                </div>
                                <?php if ( ! empty( $help_title ) ) { ?>
                                    <a <?php echo ! empty( $help_redirect ) ? 'href="' . $help_redirect . '"' : ''; ?> <?php
                                    if ( $help_redirect == '#' ) { ?>
                                       data-fancybox data-src="#hidden-content-help-<?= $i+1 ?>"
                                   <?php }
                                    ?> >
                                        <h6><?php echo $help_title; ?></h6>
                                    </a>

                                <?php } ?>
                                
                            </div>
                            <?php
                            $i ++;
                        }
                        ?>
                                    
                                    <div class="Request_quote_form contact_us_form" id="hidden-content-help-2" style="display: none;">
                                        <!-- Technical Support -->
                                       <script>
                                          hbspt.forms.create({
                                            region: "na1",
                                            portalId: "8244541",
                                            formId: "fd5180ba-8fc3-48d2-aa99-37c6f9f69f8b"
                                        });
                                        </script>

                                        
                                    </div>

                                    <div class="Request_quote_form contact_us_form" id="hidden-content-help-3" style="display: none;">
                                        <!-- General Enquiry-->
										
                                       <script>
                                          hbspt.forms.create({
                                            region: "na1",
                                            portalId: "8244541",
                                            formId: "35072c3b-99b3-47a0-82c6-77a1b4793215"
                                        });
                                        </script>


                                        
                                    </div>
									<div class="Request_quote_form contact_us_form" id="hidden-content-help-4" style="display: none;">
										<!-- General Enquiry-->
										<?php //echo do_shortcode( '[contact-form-7 id="228" title="Contact Form"]' ); ?>
										
										<script>
										  hbspt.forms.create({
											region: "na1",
											portalId: "8244541",
											formId: "35072c3b-99b3-47a0-82c6-77a1b4793215"
										});
										</script>


									</div>
						
                                
                    </div>
                <?php } ?>
            </div>
        </div> <!-- ./container -->
    </div> <!-- ./help_you -->

    <?php if ( ! empty( $newsletter_form_shortcode ) ) { ?>
        <div class="news_letter_Sec">
            <div class="container">
                <div class="inner">
                    <?php if ( ! empty( $newsletter_form_title ) ) { ?>
                        <h3><?php echo $newsletter_form_title; ?></h3>
                    <?php } ?>                    
                    <div class="news_letter_form">
                        <?php //echo do_shortcode( $newsletter_form_shortcode ); ?>
                               
<script>
  hbspt.forms.create({
	region: "na1",
	portalId: "8244541",
	formId: "6bcc09a1-3bd4-4a43-8039-4489a6c708ad"
});
</script>
                    </div>
                </div>
            </div>
        </div> <!-- ./news_letter_sec -->
    <?php } ?>
    <div class="footer_main_sec_list">
        <div class="container">
            <div class="footer_main_list">
                <div class="footer_wrap">
                    <strong><?php echo wp_get_nav_menu_name( 'footer1' ); ?></strong>
                    <?php wp_nav_menu( $product_menu_args ); ?>
                </div>
                <div class="footer_wrap">
                    <strong><?php echo wp_get_nav_menu_name( 'footer2' ); ?></strong>
                    <?php wp_nav_menu( $solution_menu_args ); ?>
                </div>
                <div class="footer_wrap">
                    <strong><?php echo wp_get_nav_menu_name( 'footer3' ); ?></strong>
                    <?php wp_nav_menu( $service_menu_args ); ?>
                </div>
                <div class="footer_wrap">
                    <?php if ( ! empty( $contact_addr ) ) { ?>
                        <strong><?php echo $contact_title; ?></strong>
                        <?php echo $contact_addr; ?>
                    <?php } ?>
                </div>
                <div class="footer_wrap">
                    <strong><a href="https://www.toshibabusinessmea.com/careers/"><?php echo wp_get_nav_menu_name( 'footer4' ); ?></a></strong>
                    <?php wp_nav_menu( $career_menu_args ); ?>                    
                </div>
            </div>
        </div>
    </div><!-- ./footer_main_sec_list -->
    <div class="footer_bottom_sec">
        <div class="footer_bottom_left">
            <div class="container">
                <div class="footer_inner">
                    <div class="left">
                        <?php if ( ! empty( $footer_logo_left ) ) { ?>
                            <div class="footer_logo">
                                <a href="<?php echo $site_url; ?>"><img src="<?php echo $footer_logo_left; ?>" alt="<?php echo get_option( 'blogname' ); ?>"></a>
                            </div>
                        <?php } ?>
                        <?php if ( ! empty( $footer_logo_right ) ) { ?>
                            <div class="footer_logo">
                                <img src="<?php echo $footer_logo_right; ?>" alt="Together Information">
                            </div>
                        <?php } ?>
                        <div class="left-footer-menu">  
                            <?php wp_nav_menu( $policy_menu_args ); ?>
                        </div>
                    </div><!-- ./left -->
                    <div class="right">
                        <div class="inner">
                            <div class="Policy">                                
                                <?php
                                if ( ! empty( $copyright ) ) {
                                    echo $copyright;
                                }
                                ?>
                            </div>
                            <div class="icon">
                                <ul>
                                    <?php if ( ! empty( $linkedin_link ) ) { ?>
										<!--img src="<?php echo $site_url; ?>/wp-content/uploads/2021/01/linkedin.svg" alt="Linkedin"-->
                                        <li><a href="<?php echo $linkedin_link; ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                    <?php } ?>
                                    <?php if ( ! empty( $fb_link ) ) { ?>
                                        <li><a href="<?php echo $fb_link; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <?php } ?>
                                    <?php if ( ! empty( $insta_link ) ) { ?>
                                        <li><a href="<?php echo $insta_link; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div><!-- ./right -->
                </div><!-- ./footer_inner -->
            </div>     
            <div class="footer_bottom_right">
                <img src="<?php echo $site_url; ?>/wp-content/uploads/2021/01/footer-bottom-img.png" alt="background strip image" />
            </div>
        </div>
    </div><!-- ./footer_bottom_sec -->
    <input type="hidden" class="site_url_data" value="<?php echo site_url(); ?>"/>
</div><!-- ./footer_section -->

<a href="#" id="backToTop"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
<style type="text/css">
    @media only screen and (max-width: 767px) {
    body #hs-eu-cookie-confirmation div#hs-eu-cookie-confirmation-inner div#hs-en-cookie-confirmation-buttons-area {text-align:left !important}
    }
</style>

<script>
	
//onFormSubmit - Called when the form starts to submit but has not completed
//onFormSubmitted - Called after the form is submitted
//onBeforeFormInit - onBeforeFormInit
//onFormReady - onFormReady
  // jQuery( window ).bind( "load", function() {
      window.addEventListener('message', event => { 
        if(event.data.type === 'hsFormCallback' && event.data.eventName === 'onFormSubmitted' && event.data.id !='daec5470-247c-42cd-8f44-4c871a3bbbe9' && event.data.id !='13d4270f-4b8d-4315-b7f0-2da04e8c7482' && event.data.id !='01545d6b-0531-4bd8-91b2-7676e742e9a5' && event.data.id != '6bcc09a1-3bd4-4a43-8039-4489a6c708ad' && event.data.id != '163aacff-7b6c-4432-aed4-71300ecdc91d' && event.data.id != 'fd5180ba-8fc3-48d2-aa99-37c6f9f69f8b' && event.data.id !='35072c3b-99b3-47a0-82c6-77a1b4793215') { 
          // console.log(event.data);

          var addressValue = jQuery('#pdflink').val(); 
          window.open(addressValue,'Download')
        } 
      });

       window.hsConversationsSettings = { loadImmediately: false };
          setTimeout(function() {
            window.HubSpotConversations.widget.load();
          }, 15000);

    // });


function callback() {
    return new Promise(function(resolve, reject) { 

    //Your code logic goes here

    //Instead of using 'return false', use reject()
    //Instead of using 'return' / 'return true', use resolve()
    resolve();

  }); //end promise
};
jQuery( window ).on('load',function() {
    grecaptcha.enterprise.ready(function() {
        grecaptcha.enterprise.execute(scoreKey, {action: action}).then(function(token) {
            jQuery('.g-recaptcha-response').val(token);
            submitForm();
        });
    });
});

</script>

<?php wp_footer(); ?>
</body>
</html>
