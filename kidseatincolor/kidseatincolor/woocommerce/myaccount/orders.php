<?php
/**
 * Orders
 */

defined( 'ABSPATH' ) || exit;

$context = Timber::context();
$context[ 'has_orders' ] = $has_orders;
$context[ 'customer_orders' ] =  $customer_orders->orders;

Timber::render( 'woocommerce/myaccount/orders.twig', $context );