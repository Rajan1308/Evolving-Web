<?php

/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */
function profile_pist_type_kidseatincolor() {
  $labels = [
    'name'                  => _x( 'Profile', 'Post type general name', 'kidseaitincolor' ),
    'singular_name'         => _x( 'Profile', 'Post type singular name', 'kidseaitincolor' ),
    'menu_name'             => _x( 'Profiles', 'Admin Menu text', 'kidseaitincolor' ),
    'name_admin_bar'        => _x( 'Profile', 'Add New on Toolbar', 'kidseaitincolor' ),
    'add_new'               => __( 'Add New', 'kidseaitincolor' ),
    'add_new_item'          => __( 'Add New Profile', 'kidseaitincolor' ),
    'new_item'              => __( 'New Profile', 'kidseaitincolor' ),
    'edit_item'             => __( 'Edit Profile', 'kidseaitincolor' ),
    'view_item'             => __( 'View Profile', 'kidseaitincolor' ),
    'all_items'             => __( 'All Profiles', 'kidseaitincolor' ),
    'search_items'          => __( 'Search Profile', 'kidseaitincolor' ),
    'parent_item_colon'     => __( 'Parent Profile:', 'kidseaitincolor' ),
    'not_found'             => __( 'No profile found.', 'kidseaitincolor' ),
    'not_found_in_trash'    => __( 'No profile found in Trash.', 'kidseaitincolor' ),
    'featured_image'        => _x( 'Profile Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kidseaitincolor' ),
    'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kidseaitincolor' ),
    'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kidseaitincolor' ),
    'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kidseaitincolor' ),
    'archives'              => _x( 'Profile archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kidseaitincolor' ),
    'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kidseaitincolor' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kidseaitincolor' ),
    'filter_items_list'     => _x( 'Filter profile list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kidseaitincolor' ),
    'items_list_navigation' => _x( 'Profile list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kidseaitincolor' ),
    'items_list'            => _x( 'Profile list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kidseaitincolor' ),
  ];

  $args = [
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'profile' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_icon'          => 'dashicons-buddicons-buddypress-logo',
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'profile', 'thumbnail', 'excerpt', 'comments' ),
  ];

  register_post_type( 'profile', $args );
}
add_action( 'init', 'profile_pist_type_kidseatincolor' );

// Ads post type

function ads_pist_type_kidseatincolor() {
  $labels = [
    'name'                  => _x( 'Ads', 'Post type general name', 'kidseaitincolor' ),
    'singular_name'         => _x( 'Ads', 'Post type singular name', 'kidseaitincolor' ),
    'menu_name'             => _x( 'Ads', 'Admin Menu text', 'kidseaitincolor' ),
    'name_admin_bar'        => _x( 'Ads', 'Add New on Toolbar', 'kidseaitincolor' ),
    'add_new'               => __( 'Add New', 'kidseaitincolor' ),
    'add_new_item'          => __( 'Add New Ad', 'kidseaitincolor' ),
    'new_item'              => __( 'New Ad', 'kidseaitincolor' ),
    'edit_item'             => __( 'Edit Ad', 'kidseaitincolor' ),
    'view_item'             => __( 'View Ad', 'kidseaitincolor' ),
    'all_items'             => __( 'All Ads', 'kidseaitincolor' ),
    'search_items'          => __( 'Search Ad', 'kidseaitincolor' ),
    'parent_item_colon'     => __( 'Parent Ad:', 'kidseaitincolor' ),
    'not_found'             => __( 'No profile found.', 'kidseaitincolor' ),
    'not_found_in_trash'    => __( 'No profile found in Trash.', 'kidseaitincolor' ),
    'featured_image'        => _x( 'Ad Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'kidseaitincolor' ),
    'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'kidseaitincolor' ),
    'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'kidseaitincolor' ),
    'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'kidseaitincolor' ),
    'archives'              => _x( 'Ad archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'kidseaitincolor' ),
    'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'kidseaitincolor' ),
    'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'kidseaitincolor' ),
    'filter_items_list'     => _x( 'Filter profile list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'kidseaitincolor' ),
    'items_list_navigation' => _x( 'Ad list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'kidseaitincolor' ),
    'items_list'            => _x( 'Ad list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'kidseaitincolor' ),
  ];

  $args = [
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'ads' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_icon'          => 'dashicons-media-spreadsheet',
    'menu_position'      => null,
    'supports'           => array( 'title', 'editor', 'ads', 'thumbnail', 'excerpt', 'comments' ),
  ];

  register_post_type( 'ads', $args );
}
add_action( 'init', 'ads_pist_type_kidseatincolor' );



// Change 'Add Title' place holder to 'Add Name'
function profile_add_new_user_placeholder_change($title , $post){
  if( $post->post_type == 'profile' ){
    $my_title = "Add Name";
    return $my_title;
  }
  return $title;
}
add_filter('enter_title_here', 'profile_add_new_user_placeholder_change' , 20 , 2 );

//Inline Product Promo
function inline_product_promo_cpt() {

	$labels = array(
		'name'                  => _x( 'Inline Product Promos', 'Post Type General Name', 'kidseaitincolor' ),
		'singular_name'         => _x( 'Inline Product Promo', 'Post Type Singular Name', 'kidseaitincolor' ),
		'menu_name'             => __( 'Inline Product Promos', 'kidseaitincolor' ),
		'name_admin_bar'        => __( 'Inline Product Promo', 'kidseaitincolor' ),
		'archives'              => __( 'Item Archives', 'kidseaitincolor' ),
		'attributes'            => __( 'Item Attributes', 'kidseaitincolor' ),
		'parent_item_colon'     => __( 'Parent Item:', 'kidseaitincolor' ),
		'all_items'             => __( 'All Items', 'kidseaitincolor' ),
		'add_new_item'          => __( 'Add New Item', 'kidseaitincolor' ),
		'add_new'               => __( 'Add New', 'kidseaitincolor' ),
		'new_item'              => __( 'New Item', 'kidseaitincolor' ),
		'edit_item'             => __( 'Edit Item', 'kidseaitincolor' ),
		'update_item'           => __( 'Update Item', 'kidseaitincolor' ),
		'view_item'             => __( 'View Item', 'kidseaitincolor' ),
		'view_items'            => __( 'View Items', 'kidseaitincolor' ),
		'search_items'          => __( 'Search Item', 'kidseaitincolor' ),
		'not_found'             => __( 'Not found', 'kidseaitincolor' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kidseaitincolor' ),
		'featured_image'        => __( 'Featured Image', 'kidseaitincolor' ),
		'set_featured_image'    => __( 'Set featured image', 'kidseaitincolor' ),
		'remove_featured_image' => __( 'Remove featured image', 'kidseaitincolor' ),
		'use_featured_image'    => __( 'Use as featured image', 'kidseaitincolor' ),
		'insert_into_item'      => __( 'Insert into item', 'kidseaitincolor' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'kidseaitincolor' ),
		'items_list'            => __( 'Items list', 'kidseaitincolor' ),
		'items_list_navigation' => __( 'Items list navigation', 'kidseaitincolor' ),
		'filter_items_list'     => __( 'Filter items list', 'kidseaitincolor' ),
	);
	$args = array(
		'label'                 => __( 'Inline Product Promo', 'kidseaitincolor' ),
		'description'           => __( 'Inline Product Promo', 'kidseaitincolor' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-table-row-after',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'inline-product-promo', $args );

}
add_action( 'init', 'inline_product_promo_cpt', 0 );

//Courses
function courses_cpt() {

	$labels = array(
		'name'                  => _x( 'Courses', 'Post Type General Name', 'kidseaitincolor' ),
		'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'kidseaitincolor' ),
		'menu_name'             => __( 'Courses', 'kidseaitincolor' ),
		'name_admin_bar'        => __( 'Course', 'kidseaitincolor' ),
		'archives'              => __( 'Item Archives', 'kidseaitincolor' ),
		'attributes'            => __( 'Item Attributes', 'kidseaitincolor' ),
		'parent_item_colon'     => __( 'Parent Item:', 'kidseaitincolor' ),
		'all_items'             => __( 'All Items', 'kidseaitincolor' ),
		'add_new_item'          => __( 'Add New Item', 'kidseaitincolor' ),
		'add_new'               => __( 'Add New', 'kidseaitincolor' ),
		'new_item'              => __( 'New Item', 'kidseaitincolor' ),
		'edit_item'             => __( 'Edit Item', 'kidseaitincolor' ),
		'update_item'           => __( 'Update Item', 'kidseaitincolor' ),
		'view_item'             => __( 'View Item', 'kidseaitincolor' ),
		'view_items'            => __( 'View Items', 'kidseaitincolor' ),
		'search_items'          => __( 'Search Item', 'kidseaitincolor' ),
		'not_found'             => __( 'Not found', 'kidseaitincolor' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kidseaitincolor' ),
		'featured_image'        => __( 'Featured Image', 'kidseaitincolor' ),
		'set_featured_image'    => __( 'Set featured image', 'kidseaitincolor' ),
		'remove_featured_image' => __( 'Remove featured image', 'kidseaitincolor' ),
		'use_featured_image'    => __( 'Use as featured image', 'kidseaitincolor' ),
		'insert_into_item'      => __( 'Insert into item', 'kidseaitincolor' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'kidseaitincolor' ),
		'items_list'            => __( 'Items list', 'kidseaitincolor' ),
		'items_list_navigation' => __( 'Items list navigation', 'kidseaitincolor' ),
		'filter_items_list'     => __( 'Filter items list', 'kidseaitincolor' ),
	);
	$args = array(
		'label'                 => __( 'Course', 'kidseaitincolor' ),
		'description'           => __( 'Courses', 'kidseaitincolor' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       		=> true,
	);
	register_post_type( 'course', $args );

}
add_action( 'init', 'courses_cpt', 0 );

/*
 * Accordion CPT
 */
function accordion_cpt() {

	$labels = array(
		'name'                  => _x( 'Accordions', 'Post Type General Name', 'kidseaitincolor' ),
		'singular_name'         => _x( 'Accordion', 'Post Type Singular Name', 'kidseaitincolor' ),
		'menu_name'             => __( 'Accordions', 'kidseaitincolor' ),
		'name_admin_bar'        => __( 'Accordion', 'kidseaitincolor' ),
		'archives'              => __( 'Item Archives', 'kidseaitincolor' ),
		'attributes'            => __( 'Item Attributes', 'kidseaitincolor' ),
		'parent_item_colon'     => __( 'Parent Item:', 'kidseaitincolor' ),
		'all_items'             => __( 'All Items', 'kidseaitincolor' ),
		'add_new_item'          => __( 'Add New Item', 'kidseaitincolor' ),
		'add_new'               => __( 'Add New', 'kidseaitincolor' ),
		'new_item'              => __( 'New Item', 'kidseaitincolor' ),
		'edit_item'             => __( 'Edit Item', 'kidseaitincolor' ),
		'update_item'           => __( 'Update Item', 'kidseaitincolor' ),
		'view_item'             => __( 'View Item', 'kidseaitincolor' ),
		'view_items'            => __( 'View Items', 'kidseaitincolor' ),
		'search_items'          => __( 'Search Item', 'kidseaitincolor' ),
		'not_found'             => __( 'Not found', 'kidseaitincolor' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'kidseaitincolor' ),
		'featured_image'        => __( 'Featured Image', 'kidseaitincolor' ),
		'set_featured_image'    => __( 'Set featured image', 'kidseaitincolor' ),
		'remove_featured_image' => __( 'Remove featured image', 'kidseaitincolor' ),
		'use_featured_image'    => __( 'Use as featured image', 'kidseaitincolor' ),
		'insert_into_item'      => __( 'Insert into item', 'kidseaitincolor' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'kidseaitincolor' ),
		'items_list'            => __( 'Items list', 'kidseaitincolor' ),
		'items_list_navigation' => __( 'Items list navigation', 'kidseaitincolor' ),
		'filter_items_list'     => __( 'Filter items list', 'kidseaitincolor' ),
	);
	$args = array(
		'label'                 => __( 'Accordion', 'kidseaitincolor' ),
		'description'           => __( 'Description', 'kidseaitincolor' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-list-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'accordion', $args );

}
add_action( 'init', 'accordion_cpt', 0 );

//Accordion accordion shortcode
add_action( 'edit_form_after_title', 'add_content_before_editor' );
function add_content_before_editor(){
	if( isset($_GET['post']) && get_post_type($_GET['post']) === 'accordion'){
		echo '<div class="postbox">';
		echo '<div class="postbox-header"><h2>Shortcode</h2></div>';
			echo '<div class="inside">';
				echo '<br>';
				echo 'Use this shortcode to show the accordion: [accordion id="'.$_GET['post'].'"]';
				echo '<br><br>';	
			echo '</div>';
		echo '</div>';
	}
}
//Add shortcode to columns accordion
function set_custom_accordion_columns($columns) {
   
    unset( $columns['author'] );
    unset( $columns['date'] );

    $columns['shortcode'] = 'Shortcode';

    return $columns;

}
add_filter( 'manage_accordion_posts_columns', 'set_custom_accordion_columns' );

// Add shortcode to column cta banner
function custom_accordion_column( $column, $post_id ) {

    switch ( $column ) {
        case 'shortcode' :
        	echo '[accordion id="'. $post_id.'"]';
        break;
    }
}
add_action( 'manage_accordion_posts_custom_column' , 'custom_accordion_column', 10, 2 );
