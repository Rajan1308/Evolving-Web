<?php
/**
 * Template Name: Blog Listing
 * Description: A Page Template with a darker design.
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

$page_id   = get_the_ID();

$context['tbterm'] = get_terms('category');

if( have_rows('blog_listing_page') ):
  // Loop through rows.
  while ( have_rows('blog_listing_page') ) : the_row();
      // Case: Paragraph layout.
      if( get_row_layout() == 'texonomo_categories' ):
          $selcCat = get_sub_field('blog_listing_categories');
          $cat = [];
          $catId= [];
          foreach ($selcCat as $termSelect){
            $info = get_category($termSelect);
            
            $cat[] = [
              'termId' => $info->term_id,
              'termName' => $info->cat_name,
              'termSlug' => $info->slug
            ];
          }
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
$blogPageData = get_field('blog_listing_page', $page_id);
$bloglistingTitle = get_field('blog_page_title_title', $page_id);
$context['blogTitle'] = $bloglistingTitle;
$context['blogFlexible'] = $blogPageData;

$args = [  
  'post_type'   => 'post',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'orderby' => [
    'date' => 'DESC'
  ],
];

$termargs = array('number' => '99',);
$terms = get_terms('category', $termargs );

$context['posts'] = Timber::get_posts( $args ); 
$context['postTerms'] = $terms;

if (isset($_GET['uterm']) && !empty($_GET['uterm'])) {
  $context['url_term'] = $_GET['uterm'];
}

Timber::render('template/bloglisting.twig', $context);
