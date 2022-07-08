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

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	
<body  <?php body_class(); ?>>
<b class="screen-overlay"></b>
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

<!-- header -->
 <div class="page-wrapper">
        <!-- Start Header-->
            <header class="header home-header">
                <div class="container-fluid">
                    <div class="left-logo">
                        <a href="<?php echo site_url();?>" class="logo">
                            <img src="<?php echo get_template_directory_uri();?>/ui/media/images/logo.svg" alt="logo">
                        </a>
                    </div>
                    <div class="right-links">
                    <?php if(!empty($header_top_button)){?>
                        <a href="<?php echo $header_top_button['url'];?>" class="btn btn-light btn-contact"><?php echo $header_top_button['title'];?></a>
                        <?php }?>
                        <a href="javascript:void(0)"  id="search" class="search-icon"><i class="far fa-search"></i></a>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#menu-modal" id="menu" class="menu-icon"><i class="far fa-bars"></i></a>
                        <!-- Start Search Content -->
                        <div class="search-content">
                            <form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
                                <input type="text" class="search-field form-control" name="s" id="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
                                <input class="btn btn-info" type="submit" value="Search">
                            </form>
                        </div>
                        <!-- End Search Content -->
                    </div>
                </div>
            </header>
            
           