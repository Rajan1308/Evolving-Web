<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */
$post_categories = get_the_category();
$context         = Timber::context();
$timber_post     = Timber::query_post();
$context[ 'category' ] = $post_categories;
$context['post'] = $timber_post;


$context['primaryCat'] = get_primary_category($post_categories);

// Getting Related Ads.
$ads_right_side = [];
foreach($post_categories as $category) {
  // $term_ids = [];
	$term_ids = [
		'key' => 'ads_tags',
		'value' => $category->term_id,
		'compare' => 'LIKE',
	];

	$args = array(
		'post_type' => 	'ads',
		'post_status'	=> 	'publish',
		'posts_per_page' => 	-1,
		'meta_query' => [
			'relation' => 'OR',
			$term_ids
		]
    );
    $query = new WP_Query( $args );
	
	if (!empty( $query->posts)) {
		// print_r($query->posts);
		foreach ($query->posts as $post) {
			$ads_right_side[$post->ID] = [
				'ad_image' => get_field( "ad_image", $post->ID)['url'],
				'ad_url' => get_field( "ad_url", $post->ID),
			];
		}
	}
}
// print_r($ads_right_side);

$context['ads_right_side'] = $ads_right_side;


// Getting Related Blog
$related = get_posts( 
		[
		'category__in' => wp_get_post_categories($timber_post->ID), 
		'numberposts' => 3,
		'post__not_in' => [$timber_post->ID],
		'no_found_rows'  => true, 
		] 
	);
if( $related ) {
$related_post = [];
foreach( $related as $post ) { setup_postdata($post);
	// print_r($post);
	$post_title = get_the_title();
	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$thumb = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
	
	$link = get_permalink();
	$related_post[] = [
		'title' => $post_title,
		'img' => $thumb[0],
		'postlink' => $link
	];
	
 }wp_reset_postdata();
} 

$context['related_post'] = $related_post;

// product single template
$context['productFlex'] = get_field('custom_product_meta');

if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig' ), $context );
}
