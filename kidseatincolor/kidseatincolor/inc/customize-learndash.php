<?php
/**
 * Learndash header
 */
function ld_custom_header() {
    $context         = Timber::context();
    Timber::render( '@molecules/header-inner/header-inner.twig', $context );
}
add_action('learndash-focus-head','ld_custom_header',10,2);

/**
 * Learndash disable logo
 */
function ld_disable_logo($header_element = '', $header = array(), $course_id = 0, $user_id = 0){
    $header_element = '';
    return $header_element;
}
//add_filter('learndash_focus_header_element','ld_disable_logo',30,4);

// Redirect course to first lesson  
function course_overview_skip_and_redirect_lesson() {
	global $post;
	if ( ! empty( $post ) && $post->post_type == 'sfwd-courses' && ! empty( $post->ID ) ) {
		$lessons = learndash_get_course_lessons_list( $post->ID );
			if ( ! empty( $lessons ) ) {
				$lesson = array_shift( $lessons );
				if ( ! empty( $lesson ) ) {
					$url = get_permalink( $lesson[ "post" ]->ID );
					if ( ! empty( $url ) ) {   
							wp_redirect( esc_url( $url ) );  
							exit;
					}
				}
			}
	}
}
add_action( 'template_redirect', 'course_overview_skip_and_redirect_lesson' );