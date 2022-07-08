<?php
/*
* Single product variation
*/

$context['post']    = Timber::get_post();
$product            = wc_get_product( $context['post']->ID );
$context['product'] = $product;
$context['get_min_purchase_quantity'] = $product->get_min_purchase_quantity();
$context['get_max_purchase_quantity'] = $product->get_max_purchase_quantity();
$context['input_value'] = isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity();
$context['gift_this'] = get_field('gift_this', $context['post']->ID);

Timber::render( 'woocommerce/add-to-cart/variation-add-to-cart.twig', $context );