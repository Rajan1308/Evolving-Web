<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * Register Custom Post Types
 */
function toshiba_register_post_types() {
    /*
     * event post type
     */
    $event_labels = array(
                            'name'               => _x( 'Events', 'event', 'toshiba' ),
                            'singular_name'      => _x( 'Event', 'event', 'toshiba' ),
                            'menu_name'          => _x( 'Events', 'event', 'toshiba' ),
                            'name_admin_bar'     => _x( 'Event', 'event', 'toshiba' ),
                            'add_new'            => _x( 'Add New', 'event', 'toshiba' ),
                            'add_new_item'       => __( 'Add New Event', 'toshiba' ),
                            'new_item'           => __( 'New Event', 'toshiba' ),
                            'edit_item'          => __( 'Edit Event', 'toshiba' ),
                            'view_item'          => __( 'View Event', 'toshiba' ),
                            'all_items'          => __( 'All Events', 'toshiba' ),
                            'search_items'       => __( 'Search Event', 'toshiba' ),
                            'parent_item_colon'  => __( 'Parent Event:', 'toshiba' ),
                            'not_found'          => __( 'No Event Found.', 'toshiba' ),
                            'not_found_in_trash' => __( 'No Event Found In Trash.', 'toshiba' ),
                        );

    $event_args = array(
                            'labels'             => $event_labels,
                            'public'             => true,
                            'publicly_queryable' => true,
                            'show_ui'            => true,
                            'show_in_menu'       => true,
                            'query_var'          => true,
                            'rewrite'            => array( 'slug'=> 'event', 'with_front' => false ),
                            'capability_type'    => 'post',
                            'has_archive'        => false,
                            'hierarchical'       => false,
                            'menu_position'      => null,
                            'menu_icon'          => 'dashicons-awards',
                            'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' )
                        );

    register_post_type( TOSHIBA_EVENT_POST_TYPE, $event_args );
    /*
     * printer post type
     */
    $printer_labels = array(
                            'name'               => _x( 'Printers', 'printer', 'toshiba' ),
                            'singular_name'      => _x( 'Printer', 'printer', 'toshiba' ),
                            'menu_name'          => _x( 'Printers', 'printer', 'toshiba' ),
                            'name_admin_bar'     => _x( 'Printer', 'printer', 'toshiba' ),
                            'add_new'            => _x( 'Add New', 'printer', 'toshiba' ),
                            'add_new_item'       => __( 'Add New Printer', 'toshiba' ),
                            'new_item'           => __( 'New Printer', 'toshiba' ),
                            'edit_item'          => __( 'Edit Printer', 'toshiba' ),
                            'view_item'          => __( 'View Printer', 'toshiba' ),
                            'all_items'          => __( 'All Printers', 'toshiba' ),
                            'search_items'       => __( 'Search Printer', 'toshiba' ),
                            'parent_item_colon'  => __( 'Parent Printer:', 'toshiba' ),
                            'not_found'          => __( 'No Printer Found.', 'toshiba' ),
                            'not_found_in_trash' => __( 'No Printer Found In Trash.', 'toshiba' ),
                        );

    $printer_args = array(
                            'labels'             => $printer_labels,
                            'public'             => true,
                            'publicly_queryable' => true,
                            'show_ui'            => true,
                            'show_in_menu'       => true,
                            'query_var'          => true,
                            'rewrite'            => array( 'slug'=> 'printer', 'with_front' => false ),
                            'capability_type'    => 'post',
                            'has_archive'        => false,
                            'hierarchical'       => false,
                            'menu_position'      => null,
                            'menu_icon'          => 'dashicons-printer',
                            'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' )
                        );

    register_post_type( TOSHIBA_PRINTER_POST_TYPE, $printer_args );
    /*
     * dealer post type
     */
    $dealer_labels = array(
                            'name'               => _x( 'Dealers', 'dealer', 'toshiba' ),
                            'singular_name'      => _x( 'Dealer', 'dealer', 'toshiba' ),
                            'menu_name'          => _x( 'Dealers', 'dealer', 'toshiba' ),
                            'name_admin_bar'     => _x( 'Dealer', 'dealer', 'toshiba' ),
                            'add_new'            => _x( 'Add New', 'dealer', 'toshiba' ),
                            'add_new_item'       => __( 'Add New Dealer', 'toshiba' ),
                            'new_item'           => __( 'New Dealer', 'toshiba' ),
                            'edit_item'          => __( 'Edit Dealer', 'toshiba' ),
                            'view_item'          => __( 'View Dealer', 'toshiba' ),
                            'all_items'          => __( 'All Dealers', 'toshiba' ),
                            'search_items'       => __( 'Search Dealer', 'toshiba' ),
                            'parent_item_colon'  => __( 'Parent Dealer:', 'toshiba' ),
                            'not_found'          => __( 'No Dealer Found.', 'toshiba' ),
                            'not_found_in_trash' => __( 'No Dealer Found In Trash.', 'toshiba' ),
                        );

    $dealer_args = array(
                            'labels'             => $dealer_labels,
                            'public'             => true,
                            'publicly_queryable' => true,
                            'show_ui'            => true,
                            'show_in_menu'       => true,
                            'query_var'          => true,
                            'rewrite'            => array( 'slug'=> 'dealer', 'with_front' => false ),
                            'capability_type'    => 'post',
                            'has_archive'        => false,
                            'hierarchical'       => false,
                            'menu_position'      => null,
                            'menu_icon'          => 'dashicons-businessperson',
                            'supports'           => array( 'title' )
                        );

    register_post_type( TOSHIBA_DEALER_POST_TYPE, $dealer_args );
    
    // Add new taxonomy, make it hierarchical (like categories)
    $printer_cat_labels = array(
                    'name'              => _x( 'Printer Categories', 'printer_cat', 'toshiba'),
                    'singular_name'     => _x( 'Printer Category', 'printer_cat','toshiba' ),
                    'search_items'      => __( 'Search Printer Categories','toshiba' ),
                    'all_items'         => __( 'All Printer Categories','toshiba' ),
                    'parent_item'       => __( 'Parent Printer Category','toshiba' ),
                    'parent_item_colon' => __( 'Parent Printer Category:','toshiba' ),
                    'edit_item'         => __( 'Edit Printer Category' ,'toshiba'), 
                    'update_item'       => __( 'Update Printer Category' ,'toshiba'),
                    'add_new_item'      => __( 'Add New Printer Category' ,'toshiba'),
                    'new_item_name'     => __( 'New Printer Category Name' ,'toshiba'),
                    'menu_name'         => __( 'Printer Categories' ,'toshiba')
                );

    $printer_cat_args = array(
                    'hierarchical'      => true,
                    'labels'            => $printer_cat_labels,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'publicly_queryable'  => false,
                    'query_var'         => true,
                    'rewrite'           => array( 'slug'=> 'printer_cat' )
                );
	
    register_taxonomy( TOSHIBA_PRINTER_CAT_POST_TAX, TOSHIBA_PRINTER_POST_TYPE, $printer_cat_args );
    //flush rewrite rules
    flush_rewrite_rules();
}
//add action to create custom post type
add_action( 'init', 'toshiba_register_post_types' );