<?php
/*
* Single product variation
*/

$context['post']    = Timber::get_post();
$product            = wc_get_product( $context['post']->ID );
$context['product'] = $product;
$context['min_value'] = apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product );
$context['max_value'] = apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product );
$context['input_value'] = isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity();

if ( ! $product->is_purchasable() ) {
	return;
}

Timber::render( 'woocommerce/add-to-cart/simple.twig', $context );