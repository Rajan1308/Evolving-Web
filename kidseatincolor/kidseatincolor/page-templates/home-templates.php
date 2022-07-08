<?php
/**
 * Template Name: Homepage
 * Description: A Page Template with a darker design.
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;
$page_id   = get_the_ID();

// Banner Section

$context['backgroundImage'] = get_field('header_background_image', $page_id);
$context['bannerTitle'] = get_field('header_banner_title', $page_id);
$context['bannerSubtitle'] = get_field('subtitle_optional', $page_id);
// Button 
$context['buttonLabel'] = get_field('hero_header_button_link', $page_id);

// Video Section

$homePageData = get_field('home_page_content', $page_id);
$context['homeFlexible'] = $homePageData;



if( have_rows('home_page_content') ):
  // Loop through rows.
  while ( have_rows('home_page_content') ) : the_row();
      // Case: Paragraph layout.
      if( get_row_layout() == 'video_section' ):
        $videoLink = get_sub_field('video_section_video_link');
        // $response  = wp_remote_get('https://vimeo.com/api/oembed.json?url='.$videoLink.'?sizes=800&height=500');
        // $output    = json_decode(wp_remote_retrieve_body($response), true);
        // $results   = $output;
        // // print_r($results);
        // $context['vimeoThumbUrl'] = $results['thumbnail_url'];
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
        
        $context['vimeoThumbUrl'] = $iframe;
      endif;
  // End loop.
  endwhile;
// No value.
else :
  // Do something...
endif;
Timber::render('template/home.twig', $context);
