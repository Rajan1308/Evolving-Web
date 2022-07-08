<?php
/**
 * Infomenio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Infomenio 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function Infomenio_theme_support() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Custom background color.
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f5efe0',
		)
	);

	// Set content-width.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 580;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'Infomenio-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
			'navigation-widgets',
		)
	);

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Infomenio, use a find and replace
	 * to change 'Infomenio' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'Infomenio' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
	add_theme_support( 'widget-customizer' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	/*
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.


	/*
	 * Adds `async` and `defer` support for scripts registered or enqueued
	 * by the theme.
	 */


}

add_action( 'after_setup_theme', 'Infomenio_theme_support' );
register_sidebar( array(
	'name' => __( 'Main Sidebar' ),
	'id' => 'sidebar-1',
	'before_title'  => '<h2 class="title">',
    'after_title'   => '</h2>',
) );
register_sidebar( array(
	'name' => __( 'Social Sidebar' ),
	'id' => 'sidebar-2',
	'before_title'  => '<h2 class="title">',
    'after_title'   => '</h2>',
) );


function Infomenio_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'Infomenio' ),
		'expanded' => __( 'Desktop Expanded Menu', 'Infomenio' ),
		'mobile'   => __( 'Mobile Menu', 'Infomenio' ),
		'footer'   => __( 'Footer Menu', 'Infomenio' ),
		'social'   => __( 'Social Menu', 'Infomenio' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'Infomenio_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 * @return string
 */
function Infomenio_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'Infomenio_get_custom_logo' );

function Infomenio_register_styles() {




   /* wp_enqueue_script('jquery.min',get_template_directory_uri().'/assets/js/jquery.min.js', '','', true );
  wp_enqueue_script('popper.min',get_template_directory_uri().'/assets/js/popper.min.js', '','', true );
  wp_enqueue_script('bootstrap.min',get_template_directory_uri().'/assets/js/bootstrap.min.js', '','', true );
  wp_enqueue_script('waypoints.min',get_template_directory_uri().'/assets/js/waypoints.min.js', '','', true );
  wp_enqueue_script('swiper-bundle.min',get_template_directory_uri().'/assets/js/swiper-bundle.min.js', '','', true );
  wp_enqueue_script('bootstrap.min',get_template_directory_uri().'/assets/css/bootstrap.min.css', '','', true );
  wp_enqueue_script('waypoints.min',get_template_directory_uri().'/assets/js/waypoints.min.js', '','', true );
  wp_enqueue_script('swiper-bundle.min',get_template_directory_uri().'/assets/js/swiper-bundle.min.js', '','', true );
  wp_enqueue_script('owl.carousel.min',get_template_directory_uri().'/assets/js/owl.carousel.min.js', '','', true );
  wp_enqueue_script('wow.min','https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', '','', true );
  wp_enqueue_script('custom',get_template_directory_uri().'/assets/js/custom.js', '','', true );
	// Add print CSS.
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
	wp_enqueue_style( 'fontawesome.min', get_template_directory_uri() . '/assets/css/fontawesome.min.css');
	wp_enqueue_style( 'animate.min', get_template_directory_uri() . '/assets/css/animate.min.css');
	wp_enqueue_style( 'swiper-bundle.min', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
	wp_enqueue_style( 'owl.carousel.min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css');
	//wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css');
	
	wp_enqueue_style( 'custom-min', get_template_directory_uri() . '/assets/css/custom-min.css');
	wp_enqueue_style( 'responsive-min', get_template_directory_uri() . '/assets/css/responsive-min.css');*/
	
	wp_enqueue_style( 'main', get_template_directory_uri() . '/ui/stylesheet/main.css');
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/ui/stylesheet/custom.css');
	

}

add_action( 'wp_enqueue_scripts', 'Infomenio_register_styles' );



if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'infomineo General Settings',
		'menu_title'	=> 'infomineo Settings',
		'menu_slug' 	=> 'Infomenio-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'infomineo Project Details page Settings',
		'menu_title'	=> ' Project Details Settings',
		'menu_slug' 	=> 'Infomenio-project-details-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'infomineo Blog Details page Settings',
		'menu_title'	=> 'Blog Details Settings',
		'menu_slug' 	=> 'Infomenio-blog-details-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
		acf_add_options_page(array(
		'page_title' 	=> 'Infomenio Portfolio Details page Settings',
		'menu_title'	=> ' Portfolio Details Settings',
		'menu_slug' 	=> 'Infomenio-portfolio-details-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
/*	acf_add_options_page(array(
		'page_title' 	=> 'Infomenio counter Settings',
		'menu_title'	=> 'Infomenio counter settings',
		'menu_slug' 	=> 'Infomenio-counter-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
		
	acf_add_options_page(array(
		'page_title' 	=> 'Infomenio Service details page Settings',
		'menu_title'	=> ' Service Details Settings',
		'menu_slug' 	=> 'Infomenio-service-details-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
		acf_add_options_page(array(
		'page_title' 	=> 'Infomenio Project details page Settings',
		'menu_title'	=> ' Project Details Settings',
		'menu_slug' 	=> 'Infomenio-project-details-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));*/
	
	
	
}


function create_service_type_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'service_type', 'taxonomy general name' ),
    'singular_name' => _x( 'service_type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search service type' ),
    'popular_items' => __( 'Popular service type' ),
    'all_items' => __( 'All service types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit service type' ), 
    'update_item' => __( 'Update service type' ),
    'add_new_item' => __( 'Add New service type' ),
    'new_item_name' => __( 'New service type' ),
    'separate_items_with_commas' => __( 'Separate service type with commas' ),
    'add_or_remove_items' => __( 'Add or remove service type' ),
    'choose_from_most_used' => __( 'Choose from the most used service types' ),
    'menu_name' => __( 'service type' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('service_type','service',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'service_type' ),
  ));
}
//add_action( 'init', 'create_service_type_taxonomy' );

function create_post_type_services() {
	
	register_post_type( 'service',
		array(
			'labels' => array(
				'name' => __( 'Services' ),
				'singular_name' => __( 'Service' ),
				
			),
			'taxonomies' => array('service_type'),
		'public' => true,
		'has_archive' => true,
		'supports' => array(
            'title',
            'editor',
          'excerpt',
           'thumbnail',
		   'custom-fields'
            
        ),
		
		)
	);
}
//add_action( 'init', 'create_post_type_services' );





function create_report_type_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'report_type', 'taxonomy general name' ),
    'singular_name' => _x( 'report_type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search report type' ),
    'popular_items' => __( 'Popular report type' ),
    'all_items' => __( 'All report types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit report type' ), 
    'update_item' => __( 'Update report type' ),
    'add_new_item' => __( 'Add New report type' ),
    'new_item_name' => __( 'New report type' ),
    'separate_items_with_commas' => __( 'Separate report type with commas' ),
    'add_or_remove_items' => __( 'Add or remove report type' ),
    'choose_from_most_used' => __( 'Choose from the most used report types' ),
    'menu_name' => __( 'report type' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('report_type','report',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'report_type' ),
  ));
}
add_action( 'init', 'create_report_type_taxonomy' );

function create_post_type_reports() {
	
	register_post_type( 'report',
		array(
			'labels' => array(
				'name' => __( 'reports' ),
				'singular_name' => __( 'report' ),
				
			),
			'taxonomies' => array('report_type'),
		'public' => true,
		'has_archive' => true,
		'supports' => array(
            'title',
            'editor',
          'excerpt',
           'thumbnail',
		   'custom-fields'
            
        ),
		
		)
	);
}
add_action( 'init', 'create_post_type_reports' );
function add_link_atts($atts) {
  $atts['class'] = "nav-link";
  
  return $atts;
}
//add_filter( 'nav_menu_link_attributes', 'add_link_atts');

function add_specific_menu_atts( $atts, $item, $args ) {
    $menu_items = array(219);
    if (in_array($item->ID, $menu_items)) {
     $atts['data-toggle'] = 'dropdown';
	 $atts['id'] = 'navbarDropdown';
	 
    return $atts;
    }
     
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_specific_menu_atts', 10, 3 );


function create_project_type_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'CaseStudiesCategory', 'taxonomy general name' ),
    'singular_name' => _x( 'CaseStudiesCategory', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Case Studies Category' ),
    'popular_items' => __( 'Popular Case Studies Category' ),
    'all_items' => __( 'All Case Studies Category' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Case Studies Category' ), 
    'update_item' => __( 'Update Case Studies Category' ),
    'add_new_item' => __( 'Add New Case Studies Category' ),
    'new_item_name' => __( 'New Case Studies Category' ),
    'separate_items_with_commas' => __( 'Separate Case Studies Category with commas' ),
    'add_or_remove_items' => __( 'Add or remove Case Studies Category' ),
    'choose_from_most_used' => __( 'Choose from the most used project types' ),
    'menu_name' => __( 'Business Research Case Studies Category' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('CaseStudiesCategory','project',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'CaseStudiesCategory' ),
  ));
}
add_action( 'init', 'create_project_type_taxonomy' );


function create_region_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'CaseStudiesRegion', 'taxonomy general name' ),
    'singular_name' => _x( 'Case Studies Region', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Case Studies Region' ),
    'popular_items' => __( 'Popular Case Studies Region' ),
    'all_items' => __( 'All Case Studies Region' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Case Studies Region' ), 
    'update_item' => __( 'Update Case Studies Region' ),
    'add_new_item' => __( 'Add New Case Studies Region' ),
    'new_item_name' => __( 'New Case Studies Region' ),
    'separate_items_with_commas' => __( 'Separate Case Studies Region with commas' ),
    'add_or_remove_items' => __( 'Add or remove Case Studies Region' ),
    'choose_from_most_used' => __( 'Choose from the most used Region' ),
    'menu_name' => __( 'Business Research Case Studies Region' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('CaseStudiesRegion','project',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'CaseStudiesRegion' ),
  ));
}
add_action( 'init', 'create_region_taxonomy' );
function custom_post_type_project() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Projects', 'Post Type General Name', 'Infomenio' ),
        'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'Infomenio' ),
        'menu_name'           => __( 'Business Research Case Studies', 'Infomenio' ),
        'parent_item_colon'   => __( 'Parent Case Studies', 'Infomenio' ),
        'all_items'           => __( 'All Case Studies', 'Infomenio' ),
        'view_item'           => __( 'View Case Studies', 'Infomenio' ),
        'add_new_item'        => __( 'Add New Case Studies', 'Infomenio' ),
        'add_new'             => __( 'Add New', 'Infomenio' ),
        'edit_item'           => __( 'Edit Case Studies', 'Infomenio' ),
        'update_item'         => __( 'Update Case Studies', 'Infomenio' ),
        'search_items'        => __( 'Search Case Studies', 'Infomenio' ),
        'not_found'           => __( 'Not Found', 'Infomenio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Infomenio' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Case Studies', 'Infomenio' ),
		'description'         => __( 'Case Studies details', 'Infomenio' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'coursetype' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
		'taxonomies' => array('CaseStudiesCategory','CaseStudiesRegion'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'project', $args );
 
}
add_action( 'init', 'custom_post_type_project', 0 );


function custom_post_type_testimonial() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Testimonials', 'Post Type General Name', 'Infomenio' ),
        'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'Infomenio' ),
        'menu_name'           => __( 'Testimonials', 'Infomenio' ),
        'parent_item_colon'   => __( 'Parent testimonial', 'Infomenio' ),
        'all_items'           => __( 'All Testimonials', 'Infomenio' ),
        'view_item'           => __( 'View Testimonials', 'Infomenio' ),
        'add_new_item'        => __( 'Add New Testimonial', 'Infomenio' ),
        'add_new'             => __( 'Add New', 'Infomenio' ),
        'edit_item'           => __( 'Edit testimonial', 'Infomenio' ),
        'update_item'         => __( 'Update testimonial', 'Infomenio' ),
        'search_items'        => __( 'Search testimonial', 'Infomenio' ),
        'not_found'           => __( 'Not Found', 'Infomenio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Infomenio' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'testimonials', 'Infomenio' ),
		'description'         => __( 'testimonial details', 'Infomenio' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'coursetype' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
		
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'testimonial', $args );
 
}
add_action( 'init', 'custom_post_type_testimonial', 0 );



function create_portfolio_type_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'portfolio_type', 'taxonomy general name' ),
    'singular_name' => _x( 'portfolio_type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search portfolio type' ),
    'popular_items' => __( 'Popular portfolio type' ),
    'all_items' => __( 'All portfolio types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit portfolio type' ), 
    'update_item' => __( 'Update portfolio type' ),
    'add_new_item' => __( 'Add New portfolio type' ),
    'new_item_name' => __( 'New portfolio type' ),
    'separate_items_with_commas' => __( 'Separate portfolio type with commas' ),
    'add_or_remove_items' => __( 'Add or remove portfolio type' ),
    'choose_from_most_used' => __( 'Choose from the most used portfolio types' ),
    'menu_name' => __( 'portfolio type' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('portfolio_type','portfolio',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'portfolio_type' ),
  ));
}
add_action( 'init', 'create_portfolio_type_taxonomy' );

function custom_post_type_portfolio() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Portfolio', 'Post Type General Name', 'Infomenio' ),
        'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'Infomenio' ),
        'menu_name'           => __( 'Portfolio', 'Infomenio' ),
        'parent_item_colon'   => __( 'Parent ortfolio', 'Infomenio' ),
        'all_items'           => __( 'All Portfolio', 'Infomenio' ),
        'view_item'           => __( 'View Portfolio', 'Infomenio' ),
        'add_new_item'        => __( 'Add New Project', 'Infomenio' ),
        'add_new'             => __( 'Add New', 'Infomenio' ),
        'edit_item'           => __( 'Edit portfolio', 'Infomenio' ),
        'update_item'         => __( 'Update portfolio', 'Infomenio' ),
        'search_items'        => __( 'Search portfolio', 'Infomenio' ),
        'not_found'           => __( 'Not Found', 'Infomenio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Infomenio' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'portfolio', 'Infomenio' ),
		'description'         => __( 'portfolio details', 'Infomenio' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'coursetype' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
		'taxonomies' => array('portfolio_type'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'portfolio', $args );
 
}
add_action( 'init', 'custom_post_type_portfolio', 0 );


function custom_post_type_career() {
 
// Set UI els for Custom Post Type
    $labels = array(
        'name'                => _x( 'careers', 'Post Type General Name', 'Infomenio' ),
        'singular_name'       => _x( 'Career', 'Post Type Singular Name', 'Infomenio' ),
        'menu_name'           => __( 'careers', 'Infomenio' ),
        'parent_item_colon'   => __( 'Parent career', 'Infomenio' ),
        'all_items'           => __( 'All careers', 'Infomenio' ),
        'view_item'           => __( 'View careers', 'Infomenio' ),
        'add_new_item'        => __( 'Add New Career', 'Infomenio' ),
        'add_new'             => __( 'Add New', 'Infomenio' ),
        'edit_item'           => __( 'Edit career', 'Infomenio' ),
        'update_item'         => __( 'Update career', 'Infomenio' ),
        'search_items'        => __( 'Search career', 'Infomenio' ),
        'not_found'           => __( 'Not Found', 'Infomenio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Infomenio' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'careers', 'Infomenio' ),
		'description'         => __( 'career details', 'Infomenio' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'coursetype' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
		//'taxonomies' => array('career_type'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'career', $args );
 
}
add_action( 'init', 'custom_post_type_career', 0 );


function custom_post_type_office() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Offices', 'Post Type General Name', 'Infomenio' ),
        'singular_name'       => _x( 'Office', 'Post Type Singular Name', 'Infomenio' ),
        'menu_name'           => __( 'Offices', 'Infomenio' ),
        'parent_item_colon'   => __( 'Parent office', 'Infomenio' ),
        'all_items'           => __( 'All Offices', 'Infomenio' ),
        'view_item'           => __( 'View Offices', 'Infomenio' ),
        'add_new_item'        => __( 'Add New Office', 'Infomenio' ),
        'add_new'             => __( 'Add New', 'Infomenio' ),
        'edit_item'           => __( 'Edit office', 'Infomenio' ),
        'update_item'         => __( 'Update office', 'Infomenio' ),
        'search_items'        => __( 'Search office', 'Infomenio' ),
        'not_found'           => __( 'Not Found', 'Infomenio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Infomenio' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'offices', 'Infomenio' ),
		'description'         => __( 'office details', 'Infomenio' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title',  'excerpt', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'coursetype' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
		
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'office', $args );
 
}
add_action( 'init', 'custom_post_type_office', 0 );

add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() {
    return true;
}


function create_newsletter_category_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'newsletter_category', 'taxonomy general name' ),
    'singular_name' => _x( 'newsletter_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Newsletter type' ),
    'popular_items' => __( 'Popular Newsletter type' ),
    'all_items' => __( 'All Newsletter types' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Newsletter type' ), 
    'update_item' => __( 'Update Newsletter type' ),
    'add_new_item' => __( 'Add New Newsletter type' ),
    'new_item_name' => __( 'New Newsletter type' ),
    'separate_items_with_commas' => __( 'Separate Newsletter type with commas' ),
    'add_or_remove_items' => __( 'Add or remove Newsletter type' ),
    'choose_from_most_used' => __( 'Choose from the most used Newsletter types' ),
    'menu_name' => __( 'Newsletter type' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('newsletter_category','newsletter_archive',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'newsletter_category' ),
  ));
}
add_action( 'init', 'create_newsletter_category_taxonomy' );

function custom_post_type_goodsretails() {
 
// Set UI els for Custom Post Type
    $labels = array(
        'name'                => _x( 'newsletter_archive', 'Post Type General Name', 'Infomenio' ),
        'singular_name'       => _x( 'newsletter_archive', 'Post Type Singular Name', 'Infomenio' ),
        'menu_name'           => __( 'newsletter_archive', 'Infomenio' ),
        'parent_item_colon'   => __( 'Parent newsletter_archive', 'Infomenio' ),
        'all_items'           => __( 'All newsletter_archive', 'Infomenio' ),
        'view_item'           => __( 'View newsletter_archive', 'Infomenio' ),
        'add_new_item'        => __( 'Add New newsletter_archive', 'Infomenio' ),
        'add_new'             => __( 'Add New', 'Infomenio' ),
        'edit_item'           => __( 'Edit newsletter_archive', 'Infomenio' ),
        'update_item'         => __( 'Update newsletter_archive', 'Infomenio' ),
        'search_items'        => __( 'Search newsletter_archive', 'Infomenio' ),
        'not_found'           => __( 'Not Found', 'Infomenio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Infomenio' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Newsletter archive', 'Infomenio' ),
		'description'         => __( 'Newsletter archive details', 'Infomenio' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'coursetype' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
		'taxonomies' => array('newsletter_category'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'newsletter_archive', $args );
 
}
add_action( 'init', 'custom_post_type_goodsretails', 0 );

function create_network_case_studies_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'networkcategory', 'taxonomy general name' ),
    'singular_name' => _x( 'networkcategory', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Network Case Studies Category' ),
    'popular_items' => __( 'Popular Network Case Studies Category' ),
    'all_items' => __( 'All Network Case Studies Category' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Network Case Studies Category' ), 
    'update_item' => __( 'Update Network Case Studies Category' ),
    'add_new_item' => __( 'Add New Network Case Studies Category' ),
    'new_item_name' => __( 'New Network Case Studies Category' ),
    'separate_items_with_commas' => __( 'Separate Network Case Studies Category with commas' ),
    'add_or_remove_items' => __( 'Add or remove Network Case Studies Category' ),
    'choose_from_most_used' => __( 'Choose from the most used networkcasestudies types' ),
    'menu_name' => __( 'Network Case Studies Category' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('networkcategory','networkcasestudies',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'networkcategory' ),
  ));
}
add_action( 'init', 'create_network_case_studies_taxonomy');


function create_networkregion_taxonomy() {
 
// Labels part for the GUI
 
  $labels = array(
    'name' => _x( 'networkregion', 'taxonomy general name' ),
    'singular_name' => _x( 'networkregion', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Network Case Studies Region' ),
    'popular_items' => __( 'Popular Network Case Studies Region' ),
    'all_items' => __( 'All Network Case Studies Region' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Network Case Studies Region' ), 
    'update_item' => __( 'Update Network Case Studies Region' ),
    'add_new_item' => __( 'Add New Network Case Studies Region' ),
    'new_item_name' => __( 'New Network Case Studies Region' ),
    'separate_items_with_commas' => __( 'Separate Network Case Studies Region with commas' ),
    'add_or_remove_items' => __( 'Add or remove Network Case Studies Region' ),
    'choose_from_most_used' => __( 'Choose from the most used Region' ),
    'menu_name' => __( 'Network Case Studies Region' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('networkregion','networkcasestudies',array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'networkregion' ),
  ));
}
add_action( 'init', 'create_networkregion_taxonomy');
function custom_post_type_networkcasestudies() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'networkcasestudies', 'Post Type General Name', 'Infomenio' ),
        'singular_name'       => _x( 'NetworkCaseStudie', 'Post Type Singular Name', 'Infomenio' ),
        'menu_name'           => __( 'Network Case Studies', 'Infomenio' ),
        'parent_item_colon'   => __( 'Parent Case Studies', 'Infomenio' ),
        'all_items'           => __( 'All Case Studies', 'Infomenio' ),
        'view_item'           => __( 'View Case Studies', 'Infomenio' ),
        'add_new_item'        => __( 'Add New Case Studies', 'Infomenio' ),
        'add_new'             => __( 'Add New', 'Infomenio' ),
        'edit_item'           => __( 'Edit Case Studies', 'Infomenio' ),
        'update_item'         => __( 'Update Case Studies', 'Infomenio' ),
        'search_items'        => __( 'Search Case Studies', 'Infomenio' ),
        'not_found'           => __( 'Not Found', 'Infomenio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'Infomenio' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Network Case Studies', 'Infomenio' ),
		'description'         => __( 'Network Case Studies details', 'Infomenio' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        //'taxonomies'          => array( 'coursetype' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
		'taxonomies' => array('networkcategory','networkregion'),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
     
    // Registering your Custom Post Type
    register_post_type( 'networkcasestudies', $args );
 
}
add_action( 'init', 'custom_post_type_networkcasestudies', 0 );

function add_traget_on_current_job_opening() {
	if(is_page('careers')){
	?>
	<script type="text/javascript">jQuery( window ).on( "load", function() { jQuery(".whr-title a").attr("target","_blank"); });</script>
	<?php
	}
}


add_action('wp_footer', 'add_traget_on_current_job_opening');

function shapeSpace_filter_search($query) {
	if (!$query->is_admin && $query->is_search) {
		$query->set('post_type', array('post', 'page', 'report','project','portfolio'));
	}
	return $query;
}
add_filter('pre_get_posts', 'shapeSpace_filter_search');

add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}


add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
    
    if ($pagenow === 'edit-comments.php') {
        wp_redirect(admin_url());
        exit;
    }

    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});


function defer_parsing_of_js($url)
{
  if (is_admin()) return $url; //don't break WP Admin
  if (false === strpos($url, '.js')) return $url;
  if (strpos($url, 'jquery.js')) return $url;
  return str_replace(' src', ' defer src', $url);
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10);