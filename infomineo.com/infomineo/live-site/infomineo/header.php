<?php
/**
 * Header file for the Infomenio WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Infomenio 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
		<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://www.google.com">
    <link rel="preconnect" href="https://script.hotjar.com">
    <link rel="preconnect" href="https://js.hs-analytics.net">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://js.hs-banner.com">
    <link rel="preconnect" href="https://vars.hotjar.com">
    <link rel="preconnect" href="https://www.googletagmanager.com">
		<?php wp_head(); ?>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  
<!-- Global site tag (gtag.js) - Google Analytics -->
<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-71686242-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-71686242-1');
</script>-->
		
<!-- Start of HubSpot Embed Code -->
<script type=“text/javascript” id=“hs-script-loader” async defer src=“//js.hs-scripts.com/1287336.js”></script>
<!-- End of HubSpot Embed Code -->
		<!-- Hotjar Tracking Code for https://infomineo.com/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:2373084,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
	</head>
<?php
if (class_exists('acf')) {    

     $homepage_banner          = get_field('homepage_banner');
     $header_recent_case_studies_title          = get_field('header_recent_case_studies_title','option');
	 $header_case_studies1          = get_field('header_case_studies1','option');
	 $header_case_studies2          = get_field('header_case_studies2','option');
	 $header_case_studies3          = get_field('header_case_studies3','option');
	 $header_top_button          = get_field('header_top_button','option');
	
     $facebook_link          = get_field('facebook_link','option');
     $linkedin_link          = get_field('linkedin_link','option');
     $youtube_link          = get_field('youtube_link','option');
	 
	  $homepage_header_menu1          = get_field('homepage_header_menu1','option');
	 $homepage_header_menu2          = get_field('homepage_header_menu2','option');
	 $homepage_header_menu3          = get_field('homepage_header_menu3','option');
	
  
   
}
?>

	
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=UA-71686242-1"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->
    <div class="page-wrapper">
        <!-- Start Header-->
            <header class="header other-header">
                <div class="container-fluid">
                    <div class="left-logo">
                        <a href="<?php echo site_url();?>" class="logo">
                            <img src="<?php echo get_template_directory_uri();?>/ui/media/images/logo.svg" alt="logo">
                        </a>
                    </div>
                    <div class="right-links">
                    	<?php 
$args = array(
    'menu_class' => 'list-unstyled',        
    'menu' => 'primary_menu'
	
);
wp_nav_menu( $args ); 
?>
                       
                       <?php if(!empty($header_top_button)){?>
                        <a href="<?php echo $header_top_button['url'];?>" class="btn btn-light btn-contact"><?php echo $header_top_button['title'];?></a>
                        <?php }?>
                        <a href="javascript:void(0)"  id="search" class="search-icon"><i class="far fa-search"></i></a>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#menu-modal" id="menu" class="menu-icon"><i class="far fa-bars"></i></a>
                        <!-- Start Search Content -->
                        <div class="search-content">
                            <form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <input type="text" class="search-field form-control" name="s" placeholder="Search" value="">
                                <input class="btn btn-info" type="submit" value="Search">
                            </form>
                        </div>
                        <!-- End Search Content -->
                    </div>
                </div>
            </header>