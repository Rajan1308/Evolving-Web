<?php
    // Exit if accessed directly
    if ( !defined( 'ABSPATH' ) ) exit;
    
    /*
     * Custom Theme Options
     */
    if( function_exists('acf_add_options_page') ) {

        // Toshiba General Settings
        $general_settings   = array(
                                    'page_title' 	=> __( 'Toshiba Settings(For Frontend View)', 'toshiba' ),
                                    'menu_title'	=> __( 'Toshiba Settings', 'toshiba' ),
                                    'menu_slug' 	=> 'toshiba-general-settings',
                                    'capability'	=> 'edit_posts',
                                    'redirect'          => false,
                                    'icon_url'          => 'dashicons-admin-customizer'
                                );
        acf_add_options_page( $general_settings );

        // Toshiba Header Settings
        $header_settings    = array(
                                        'page_title'    => __( 'Header Settings', 'toshiba' ),
                                        'menu_title'    => __( 'Header', 'toshiba' ),
                                        'parent_slug'   => 'toshiba-general-settings',
                                );
        acf_add_options_sub_page( $header_settings );
        
        // Toshiba Social Settings
        $social_settings    = array(
                                        'page_title'    => __( 'Social Settings', 'toshiba' ),
                                        'menu_title'    => __( 'Social', 'toshiba' ),
                                        'parent_slug'   => 'toshiba-general-settings',
                                );
        acf_add_options_sub_page( $social_settings );

        // Toshiba Footer Settings
        $footer_settings    = array(
                                        'page_title'    => __( 'Footer Settings', 'toshiba' ),
                                        'menu_title'    => __( 'Footer', 'toshiba' ),
                                        'parent_slug'   => 'toshiba-general-settings',
                                );
        acf_add_options_sub_page( $footer_settings );
        
        // Toshiba Admin Settings
        $general_settings   = array(
                                    'page_title' 	=> __( 'Toshiba Admin Settings(For Frontend View)', 'toshiba' ),
                                    'menu_title'	=> __( 'Toshiba Admin Settings', 'toshiba' ),
                                    'menu_slug' 	=> 'toshiba-admin-settings',
                                    'capability'	=> 'edit_posts',
                                    'redirect'          => false,
                                    'icon_url'          => 'dashicons-admin-generic'
                                );
        acf_add_options_page( $general_settings );
    }