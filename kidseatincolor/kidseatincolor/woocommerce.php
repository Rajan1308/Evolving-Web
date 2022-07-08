<?php

if ( ! class_exists( 'Timber' ) ) {
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
    return;
}

$context            = Timber::context();
$context['sidebar'] = Timber::get_widgets( 'shop-sidebar' );

if ( is_singular( 'product' ) ) {
    $context['post']    = Timber::get_post();
    $product            = wc_get_product( $context['post']->ID );
    $context['product'] = $product;
    $context['bundle_promo'] = get_field('bundle_promo', $context['post']->ID);

    // Get related products
    $related_limit               = wc_get_loop_prop( 'columns' );
    $related_ids                 = wc_get_related_products( $context['post']->id, $related_limit );
    $context['related_products'] =  Timber::get_posts( $related_ids );


    $bundle_product_repeter = get_field('bundle_products', $context['post']->ID);
    // print_r($bundle_product_repeter);
    // $context['bundle_subproducts'] = $product->get_children(); 
    if($bundle_product_repeter):
    foreach ($bundle_product_repeter as $bundleProduct){
        $postID = $bundleProduct['bundle_product']->ID;
        $sub_products = WC_PB_DB::query_bundled_items( array(
          'return'    => 'id => product_id',
          'bundle_id' => array( $postID )
        ));
        // print_r($sub_products);
        $context['bundle_subproducts'][$postID] = $sub_products; 
    }
    endif;

    // Restore the context and loop back to the main query loop.
    wp_reset_postdata();

    Timber::render( 'woocommerce/single-product.twig', $context );
} else {
    $posts = Timber::get_posts();
    $context['products'] = $posts;

    if ( is_product_category() ) {
        $queried_object = get_queried_object();
        $term_id = $queried_object->term_id;
        $context['category'] = get_term( $term_id, 'product_cat' );
        $context['title'] = single_term_title( '', false );
    }

    Timber::render( 'woocommerce/archive.twig', $context );
}