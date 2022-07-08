<?php
/**
 * Template Name: Recipe Listing
 * Description: A Page Template with a darker design.
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

$page_id   = get_the_ID();

$context['tbterm'] = get_terms('post_tag');

if( have_rows('recipe_listing_page') ):
  // Loop through rows.
  while ( have_rows('recipe_listing_page') ) : the_row();
      // Case: Paragraph layout.
      if( get_row_layout() == 'texonomo_tags' ):
          $selcCat = get_sub_field('blog_listing_tags');
          $cat = [];
          $catId= [];
          if($selcCat):
          foreach ($selcCat as $termSelect){
            $info = get_tag( $termSelect );
            // print_r($info);
            $cat[] = [
              'termId' => $info->term_id,
              'termName' => $info->name,
              'termSlug' => $info->slug
            ];
          }
        endif; 
        // print_r($cat);
        $context['cat'] = $cat;
      endif;
  // End loop.
  endwhile;
// No value.
else :
  // Do something...
endif;


// Banner Section
$blogPageData = get_field('recipe_listing_page', $page_id);
$bloglistingTitle = get_field('blog_page_title_title', $page_id);
$context['blogTitle'] = $bloglistingTitle;
$context['blogFlexible'] = $blogPageData;



$context['posts'] = Timber::get_posts( $args ); 

if (isset($_GET['uterm']) && !empty($_GET['uterm'])) {
  $context['url_term'] = $_GET['uterm'];
}
Timber::render('template/recipelisting.twig', $context);
