<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage TOSHIBA
 * @since Toshiba 1.0
 */
$site_url = site_url();
if ( is_home() ) {
    $post_id = get_option( 'page_on_front' );
} else if ( is_category() || is_tag() ) {
    $post_id = get_option( 'page_for_posts' );
} else if ( is_single() ) {
    $post_id     = get_the_id();
    $banner_type = get_field( 'toshiba_banner_type', $post_id );
    if ( empty( $banner_type ) ) {
        $post_id = get_option( 'page_for_posts' );
    }
} else {
    $post_id = get_the_ID();
}
//$post_id= 202;
if ( class_exists( 'acf' ) ) {
    $site_logo           = get_field( 'toshiba_options_site_logo', 'option' );
    $smartphone_logo           = get_field( 'smartphone_logo', 'option' );
    $smartphone_identifier           = get_field( 'smartphone_identifier', 'option' );
    $find_dealer_txt     = get_field( 'toshiba_options_h_fd_txt', 'option' );
    $find_dealer_link    = get_field( 'toshiba_options_h_fd_link', 'option' );
    $become_dealer_txt   = get_field( 'toshiba_options_h_bd_txt', 'option' );
    $become_dealer_link  = get_field( 'toshiba_options_h_bd_link', 'option' );
    $regions_covered     = get_field( 'toshiba_options_h_reg_cover', 'option' );
    $toshiba_global_txt  = get_field( 'toshiba_options_h_tg_txt', 'option' );
    $toshiba_global_link = get_field( 'toshiba_options_h_tg_link', 'option' );
    $toshiba_tec_txt     = get_field( 'toshiba_options_h_tt_txt', 'option' );
    $toshiba_tec_link    = get_field( 'toshiba_options_h_tt_link', 'option' );
    $default_blog_banner    = get_field( 'default_blog_banner', 'option' );

    $banner_display      = get_field( 'toshiba_banner_type', $post_id );
//    $banner_type = get_field('toshiba_banner_type', $post_id);
    $banner_apply_shadow = get_field( 'toshiba_banner_shadow_apply', $post_id );
    if ( $banner_apply_shadow ) {
        $banner_shadow        = get_field( 'toshiba_banner_shadow', $post_id );
        $banner_content_color = getContrastColor( $banner_shadow );
        $banner_link_color    = ($banner_content_color == '#000') ? '#0064D2' : '#fff';
        $banner_shadow_side   = get_field( 'toshiba_banner_shadow_side', $post_id );
    }
    $banner_shadow_side = ! empty( $banner_shadow_side ) ? $banner_shadow_side : 'right';
    /* Page Banner */
    if ( $banner_display ) {
        $banner_slider = get_field( 'toshiba_banner_sl', $post_id );
    }
}
$find_dealer_txt    = ! empty( $find_dealer_txt ) ? $find_dealer_txt : 'Find a Dealer';
$become_dealer_txt  = ! empty( $become_dealer_txt ) ? $become_dealer_txt : 'Become a Dealer';
$toshiba_global_txt = ! empty( $toshiba_global_txt ) ? $toshiba_global_txt : 'Toshiba Global';
$toshiba_tec_txt    = ! empty( $toshiba_tec_txt ) ? $toshiba_tec_txt : '';
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href='https://fonts.gstatic.com' crossorigin='anonymous' rel='preconnect' />
<?php if ( class_exists( 'acf' ) ) { $favicon = get_field( 'toshiba_options_favicon', 'option' ); if ( ! empty( $favicon ) ) { 	?>
<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />	<?php } } ?>
<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?> 
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php } ?>

<link rel="preload" href="/wp-content/themes/toshiba/fonts/ToshibaSans-Regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/wp-content/themes/toshiba/fonts/HelveticaNeue-CondensedBold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="/wp-content/themes/toshiba/fonts/ToshibaSans-Bold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preconnect" href="https://js.hsforms.net">
<link rel="preconnect" href="https://js.hs-scripts.com">
<link rel="preconnect" href="https://www.gstatic.com">
<!-- hubspot script -->
 <!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8244541.js"></script>
<!-- End of HubSpot Embed Code -->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( $banner_apply_shadow ) { ?>
<style>.banner_section .banner_inner_slide .bg-image:after {z-index: -1; content: ''; position: absolute; background-image: linear-gradient(to <?php echo $banner_shadow_side; ?>, rgba(255, 255, 255, 0) 0%, <?php echo $banner_shadow; ?> 100%);  <?php echo $banner_shadow_side; ?>: 0; height: 100%; top: 0;bottom: 0; max-width: 764px; width: 100%; }  
                .banner_section .banner_inner_slide .content, .banner_section .banner_inner_slide .content h1 { color: <?php echo $banner_content_color; ?>; }
.banner_inner_slide .inner .button_banner a { color: <?php echo $banner_link_color; ?>; }
.banner_section .banner_inner_slide ul.slick-dots li button { background-color: <?php echo $banner_content_color; ?>; }
.banner_inner_slide ul.slick-dots { bottom: 100px; <?php echo $banner_shadow_side; ?>: calc((100% - 1140px) / 2); text-align: <?php echo $banner_shadow_side; ?>; }
.banner_inner_slide .content { text-align: <?php echo $banner_shadow_side; ?>; }
.banner_inner_slide .content{    margin-<?php echo $banner_shadow_side; ?>: inherit;}
</style>
<?php } ?>
<header id="header" class="heade_section">
		<div class="main_header">
			<div class="container">
				<div class="header_wrap display_flex">
					<div class="left display_flex">
                        
						<?php if ( ! empty( $site_logo ) ) { ?>
						<div class="logo  desktop-logo ">
							<a href="https://www.toshibamea.com/" title="Toshiba Middle East Top Page"><img src="<?php echo $site_logo; ?>" alt="Toshiba"></a>
						</div> 
						<?php } ?>
                        <?php if ( ! empty($smartphone_logo)) { ?>
                        <div class="logo mobile mobile-logo">
                            <a href="https://www.toshibamea.com/" title="Toshiba Middle East Top Page"><img src="<?php echo $smartphone_logo; ?>" alt="Toshiba"></a>
                        </div> 
                        <?php } ?>
                        
						<?php if ( ! empty( $regions_covered ) ) { ?>
						<div class="language desktop-logo">
                            <img src="https://www.toshibabusinessmea.com/wp-content/uploads/2022/01/identifier_pc-1.png" alt="<?php echo $regions_covered; ?>">
						</div>
						<?php } ?>
						<?php if ( ! empty( $smartphone_identifier ) ) { ?>
						<div class="language mobile mobile-logo">
							<img src="<?= $smartphone_identifier ?>" alt="<?php echo $regions_covered; ?>">
						</div>
						<?php } ?>

					</div>
					<div class="header_menu_right display_flex">
						<div class="nav">
							<?php
							$primary_menu_args = array (
								'theme_location' => 'primary',
								'container'      => 'ul'
							);
							wp_nav_menu( $primary_menu_args );
							?>
						</div>
						<div class="Search">
							<?php get_search_form(); ?>
						</div>
						<div class="Toshiba_left">
							<ul>
								<li><a <?php echo empty( $toshiba_global_link ) ? '' : 'href="' . $toshiba_global_link . '"' ?>><?php echo $toshiba_global_txt; ?></a></li>
								<?php if($toshiba_tec_txt){ ?>
								<li class="contact"><a href="<?php if(is_page(40)){ echo "javascript:void(0)";} else{ echo $toshiba_tec_link; }?>" style="<?php if(is_page(40)) { echo "pointer-events: none"; } ?>;" ><?php echo $toshiba_tec_txt; ?></a></li>
								<?php } ?>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header_bottom">
			<div class="container ">
				<div class="header_bottom_inner display_flex">
					<div class="left">
						<div class="nav-menu">
							<a href="javascript:;" class="mobile_search"><i class="fa fa-search" aria-hidden="true"></i></a>
							<a class="menulinks"><i></i></a>
							<?php
							$header_menu_args  = array (
								'theme_location' => 'header',
								'container'      => 'ul'
							);
							wp_nav_menu( $header_menu_args );
							?>
						</div>
					</div>
					<div class="right">
						<div class="inner display_flex">
							<ul class="button-header">
								<li><a <?php echo empty( $find_dealer_link ) ? '' : 'href="' . $find_dealer_link . '"' ?> style="background:url(<?php echo $site_url; ?>/wp-content/uploads/2021/01/header-btn-bg-1.png); "><?php echo $find_dealer_txt; ?></a></li>
								<li><a <?php echo empty( $become_dealer_link ) ? '' : 'href="' . $become_dealer_link . '"' ?> style="background:url(<?php echo $site_url; ?>/wp-content/uploads/2021/01/header-btn-bg-2.png);"><?php echo $become_dealer_txt; ?></a></li>
							</ul>
							<!-- <div class="login">
								<a target="_blank" href="https://distyavenue.toshibatec.com.sg/Disty/User/Login">
									<img src="<?php echo $site_url; ?>/wp-content/uploads/2021/01/user.png" alt="Distributor Login"><?php _e('Distributor Login','tosiba'); ?>
								</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- /header -->     
        <?php if ( $banner_slider ) { ?>
            <div class="banner_section" >
                <div class="">
                    <div class="banner_inner_slide">                        
                        <?php
                        foreach ( $banner_slider as $slide ) {
                            $slide_bg_img       = $slide[ 'toshiba_banner_sl_img' ];
                            $slide_title        = $slide[ 'toshiba_banner_sl_title' ];
                            $slide_desc         = $slide[ 'toshiba_banner_sl_desc' ];
                            $slide_enq_btn_txt  = $slide[ 'toshiba_banner_sl_enq_txt' ];
                            $slide_enq_btn_link = $slide[ 'toshiba_banner_sl_enq_link' ];
                            $slide_enq_btn_txt  = ! empty( $slide_enq_btn_txt ) ? $slide_enq_btn_txt : 'Enquire Now';

                            $default_blog_banner
                            ?>
                            <div class="bg-image" style="background:url(<?php if(!empty($slide_bg_img)){ echo $slide_bg_img; }else{ echo $default_blog_banner; } ?>) no-repeat center /cover; ">
                                <div class="container">
                                    <div class="inner">
                                        <div class="content">
                                            <?php if ( ! empty( $slide_title ) ) { ?>
                                                <h1><?php echo $slide_title; ?></h1>
                                            <?php } ?>
                                            <?php
                                            if ( ! empty( $slide_desc ) ) {
                                                echo $slide_desc;
                                            }
                                            ?>  
                                            <?php if ( ! empty( $slide_enq_btn_link ) ) { ?>
                                                <div class="button_banner">
                                                    <a href="<?php echo $slide_enq_btn_link; ?>"><?php echo $slide_enq_btn_txt; ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="section_bottom_image">
                <img src="<?php echo $site_url; ?>/wp-content/uploads/2021/01/banner_bottom_image.png" class="lazyloaded" alt="banner bottom strip">
            </div>
        <?php } ?>
            