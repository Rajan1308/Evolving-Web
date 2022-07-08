<?php
/**
 * Template Name: Landing Page
 * Description: A Page Template with a darker design.
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;
$page_id   = get_the_ID();

// Banner Section

$context['backgroundImage'] = get_field('hero_zone_background_image', $page_id);
$context['bgcolor'] = get_field('hero_zone_background_color', $page_id);
$context['bannerTitle'] = get_field('hero_zone_title', $page_id);
$context['description'] = get_field('hero_zone_description', $page_id);
$context['ctabutton1'] = get_field('hero_zone_cta_1', $page_id);
$context['ctabutton2'] = get_field('hero_zone_cta_2', $page_id);

// Button 
$context['buttonLabel'] = get_field('hero_header_button_link', $page_id);

// Video Section

$context['lPFlexible'] = get_field('landing_page', $page_id);



if( have_rows('landing_page') ):
  // Loop through rows.
  while ( have_rows('landing_page') ) : the_row();
      // Case: Paragraph layout.
      if( get_row_layout() == 'lp_featured_video_block' ):
        $videoLink = get_sub_field('lp_featured_video_block_video_link');
        preg_match('/src="(.+?)"/', $videoLink, $matches);
        $src = $matches[1];

        $params = array(
          'controls'  => 0,
          'hd'        => 1,
          'autohide'  => 1
        );
        $new_src = add_query_arg($params, $src);
        $iframe = str_replace($src, $new_src, $videoLink);
        $attributes = 'frameborder="0"';
        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $videoLink);
        // $response  = wp_remote_get('https://vimeo.com/api/oembed.json?url='.$videoLink.'?sizes=800&height=500');
        // $output    = json_decode(wp_remote_retrieve_body($response), true);
        // $results   = $output;
        // print_r($results);
        // $context['vimeoThumbUrl'] = $results['thumbnail_url'];
        $context['vimeoThumbUrl'] = $iframe;
      endif;
  // End loop.
  endwhile;
// No value.
else :
  // Do something...
endif;

Timber::render('template/landingpage.twig', $context);
