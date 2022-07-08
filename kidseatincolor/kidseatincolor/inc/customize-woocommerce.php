<?php
/*
 * Add Woocommerce Support
 */
define( 'PWGC_OTHER_AMOUNT_PROMPT', 'Custom Amount' );
function theme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'theme_add_woocommerce_support' );

add_filter( 'woocommerce_gallery_thumbnail_size', function( $size ) {
	return 'full';
} );

/**
 * Add slickslider
 */
function keic_custom_script() {
    wp_enqueue_script( 'keic-slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js' );
    wp_enqueue_style( 'keic-slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
}
add_action('wp_enqueue_scripts', 'keic_custom_script');

/**
 * Change the breadcrumb separator
 */
function wcc_change_breadcrumb_delimiter( $defaults ) {
	$defaults['delimiter'] = ' <span class="delimiter"></span> ';
	return $defaults;
}
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );

/*
 * Update WooCommerce Flexslider options
function ud_update_woo_flexslider_options($options){
	$options['directionNav'] = true;

	return $options;
}
add_filter('woocommerce_single_product_carousel_options', 'ud_update_woo_flexslider_options');
*/

/*
 * Woocommerce features
 */
function enable_wc_features() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    //add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'enable_wc_features' );

/*
 * Remove breadcrumbs
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

/*
 * Utility function to get the price of a variation from it's attribute value
 */
function get_the_variation_price_html( $product, $name, $term_slug ){
    foreach ( $product->get_available_variations() as $variation ){
		if($variation['attributes'][$name] == $term_slug ){
            return strip_tags( number_format($variation['display_price'], 2, '.', '') );
        }
    }
}

/*
* Add to cart change label
*/
//add_filter( 'woocommerce_product_add_to_cart_text', 'custom_add_to_cart_price', 20, 2 ); // Shop and other archives pages
add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_add_to_cart_price', 20, 2 ); // Single product pages
function custom_add_to_cart_price( $button_text, $product ) {
    $button_text = 'Purchase Now';
    // Variable products
    if( $product->is_type('variable') ) {
        if( ! is_product() ){ // Shop and archives
            $product_price = wc_price( wc_get_price_to_display( $product, array( 'price' => $product->get_variation_price() ) ) );
            return $button_text . ' - ' . strip_tags( $product_price );
        }else { // Single product pages
            $default_price = get_variation_default_price($product);
            if($default_price){
                return $button_text.' - $'.$default_price;
            }else{
                return $button_text;
            }
        }
    } else { // All other product types
        $product_price = wc_price( wc_get_price_to_display( $product ) );
        return $button_text . ' - ' . strip_tags( $product_price );
    }
}

//Get variation default price
function get_variation_default_price($product){
    $price = 0;
    if( $product->is_type('variable') ){
        $default_attributes = $product->get_default_attributes();
        
        foreach($product->get_available_variations() as $variation_values ){
            foreach($variation_values['attributes'] as $key => $attribute_value ){
                $attribute_name = str_replace( 'attribute_', '', $key );
                $default_value = $product->get_variation_default_attribute($attribute_name);
                if( $default_value == $attribute_value ){
                    $is_default_variation = true;
                } else {
                    $is_default_variation = false;
                    break; // Stop this loop to start next main lopp
                }
            }
            if( $is_default_variation ){
                $variation_id = $variation_values['variation_id'];
                break; // Stop the main loop
            }
        }

        // Now we get the default variation data
        if( $is_default_variation ){
            // Raw output of available "default" variation details data
            //echo '<pre>'; print_r($variation_values); echo '</pre>';

            // Get the "default" WC_Product_Variation object to use available methods
            $default_variation = wc_get_product($variation_id);

            // Get The active price
            $price = $default_variation->get_price(); 
        }
    }
    return $price;
}

function variation_price_format_default( $price, $product ) {
   /*
   $prices = $product->get_variation_prices( true );
   $min_price = current( $prices['price'] );
   $price = sprintf( __( ' %1$s', 'woocommerce' ), wc_price( $min_price ) );
   */

    $price = get_variation_default_price($product);
    $price = sprintf( __( ' %1$s', 'woocommerce' ), wc_price( $price ) );
    return $price; 
}
add_filter( 'woocommerce_variable_price_html', 'variation_price_format_default', 9999, 2 );

/*
* Gift This
*/
function gift_button_fn(){
    $gift_this = get_field('gift_this');
    if($gift_this){ ?>
        <a class="button" href="<?= $gift_this['url']; ?>" target="<?= $gift_this['target']; ?>"><svg width="22" height="25" viewBox="0 0 22 25" fill="#fff" xmlns="http://www.w3.org/2000/svg"><path d="M20.4838 5.68174H15.9174C17.2935 4.47798 18.1495 2.79793 18.1495 0.941612C18.1495 0.421573 17.6796 0 17.0999 0C14.4138 0 12.0585 1.29377 10.7667 3.223C9.47484 1.29377 7.11952 0 4.43349 0C3.85382 0 3.38391 0.421573 3.38391 0.941612C3.38391 2.79793 4.23995 4.47798 5.61598 5.68174H1.04958C0.469912 5.68174 0 6.10331 0 6.62335V24.0584C0 24.5784 0.469912 25 1.04958 25H20.4838C21.0634 25 21.5333 24.5784 21.5333 24.0584V6.62335C21.5333 6.10331 21.0634 5.68174 20.4838 5.68174ZM19.4342 14.3992H11.8162V7.56496H19.4342V14.3992ZM15.9168 2.00305C15.4655 3.76602 13.9149 5.15707 11.9498 5.56196C12.4011 3.79895 13.9517 2.40789 15.9168 2.00305ZM9.58358 5.56191C7.61846 5.15702 6.0679 3.76596 5.61658 2.003C7.5817 2.40789 9.13226 3.79895 9.58358 5.56191ZM9.71708 7.56496V14.3992H2.09916V7.56496H9.71708ZM2.09916 16.2825H9.71708V23.1168H2.09916V16.2825ZM11.8162 23.1167V16.2825H19.4342V23.1168H11.8162V23.1167Z"/></svg> Gift This</a>
    <?php }
}
add_action( 'woocommerce_after_add_to_cart_button', 'gift_button_fn', 99);

/*
* Change my account items
*/
function custom_my_account_items() {
	$items = array(
        'edit-account'       => __( 'Account Settings', 'woocommerce' ),
		'orders'             => __( 'Purchase History', 'woocommerce' ),
        'learning-center'    => __( 'Learning Center', 'woocommerce' ),        
	);
	return $items;
}
add_filter ( 'woocommerce_account_menu_items', 'custom_my_account_items' );

//add_action( 'woocommerce_account_edit-account_endpoint', 'woocommerce_account_edit_address' );

//Add new item
add_action( 'init', function() {
    add_rewrite_endpoint( 'learning-center', EP_ROOT | EP_PAGES );
} );

//Show courses in new item
add_action( 'woocommerce_account_learning-center_endpoint', function() {
    echo '<div class="learning-center">';
        echo '<h3>Learning Center</h3>';
        if(!empty(get_customer_courses())){
            echo do_shortcode('[ld_profile]');
        }
    echo '</div>';

    if(get_customer_ebooks()){
        echo '<div class="your-downloads">';
            echo '<h3>Your Ebooks</h3>';
            foreach ( get_customer_ebooks() as $ebook_id) {
                $product = wc_get_product( $ebook_id );
                if(!empty($product->get_downloads())){
                    echo '<div class="product-wrapper">';
                        echo '<div class="product-item">';
                            $image = get_the_post_thumbnail_url($ebook_id);
                            if($image){
                                echo '<img src="'.$image.'">';
                            }else{
                                echo wc_placeholder_img();
                            }
                            echo '<div class="product-content">';
                                echo '<h6>'.get_the_title($ebook_id).'</h6>';
                                $downloads = $product->get_downloads();
                                foreach ($downloads as $download) {
                                    echo '<a href="?action=download&file='.$download['file'].'" class="button" download>Download</a>';
                                }             
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="product-content-mobile">';
                            foreach ($downloads as $download) {
                                echo '<a href="?action=download&file='.$download['file'].'" class="button" download>Download</a>';
                            }
                        echo '</div>';  
                    echo '</div>';   
                }
            }
        echo '</div>';
    }
            if(hasPurchases() == false){
            echo '<div class="purchase_history">';
            echo '<img class="centered-img" src="'.get_stylesheet_directory_uri().'/images/about-auth.svg">';
            echo '<div class="shop_links"><a href="/shop/">View Shop</a> <a href="/shop-courses/">View Courses</a> </div>';
            echo '</div>';
        }

});

//Add Logout link
if(is_user_logged_in()){
    add_action( 'woocommerce_after_account_navigation', 'logout_btn');
    function logout_btn() {
        echo '<a class="button logout-btn" href="'.wc_logout_url().'">Log Out</a>';
    }
}

//Add title to Account Settings
add_action( 'woocommerce_before_edit_account_form', function() {
    echo '<h3>Account Settings</h3>';
} );

//Add title to Purchase History
add_action( 'woocommerce_before_account_orders', function() {
    echo '<h3>Purchase History</h3>';
} );

//Add class to dashboard my account
function add_custom_classes( $classes ) {
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $dashboard_url = get_permalink( get_option('woocommerce_myaccount_page_id'));
    if($dashboard_url == $current_url){
        $classes[] = 'wc-dashboard';
    }
    return $classes;
}
add_filter( 'body_class', 'add_custom_classes' );


function hasPurchases() {
    $user_id = get_current_user_id(); // The current user ID
    // Get the WC_Customer instance Object for the current user
    $customer = new WC_Customer( $user_id );
    // Get the last WC_Order Object instance from current customer
    $args = array(
        'status' => array('wc-processing', 'wc-on-hold','wc-completed','processing','completed'),
        'customer_id' => $user_id
    );
    $orders = count(wc_get_orders($args));
    if($orders > 0){
        return true;
    } else {
        return false;
    }
}

function get_customer_courses(){
    $user_id = get_current_user_id();
    $courses = learndash_user_get_enrolled_courses( $user_id, array(), true );
    
    return $courses;
}

//Downloads bought by user  
function get_customer_ebooks(){

    //Tags
    $tags = array('ebook');

    // Get the current user Object 
    $current_user = wp_get_current_user();

    // Check if the user is valid 
    if ( 0 == $current_user->ID ) return false;

    //Create $args array 
    $args = array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $current_user->ID,
        'post_type'   => wc_get_order_types(),
        'post_status' => array('wc-processing', 'wc-completed'),
    );

    // Pass the $args to get_posts() function 
    $customer_orders = get_posts( $args);

    // loop through the orders and return the IDs 
    if ( ! $customer_orders ) return false;
    $product_ids = array();
    foreach ( $customer_orders as $customer_order ) {
        $order = wc_get_order( $customer_order->ID );
        $items = $order->get_items();
        foreach ( $items as $item ) {
            $product_id = $item->get_product_id();
            if( has_term( $tags, 'product_tag', $product_id ) ){
                $product_ids[] = $product_id;
            }
        }
    }
    return array_unique($product_ids);
}

//Plus minus btns
add_action( 'woocommerce_before_quantity_input_field', 'display_quantity_plus' );
function display_quantity_plus() {
    if(is_cart()){
        echo '<div class="qty-item"><input class="minus" type="button" value="-">';
    }
}
add_action( 'woocommerce_after_quantity_input_field', 'display_quantity_minus' );
function display_quantity_minus() {
    if(is_cart()){
        echo '<input class="plus" type="button" value="+"></div>';
    }
}

//Checkout Button
remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
add_action( 'woocommerce_proceed_to_checkout', 'checkout_btn' );
function checkout_btn(){ 
    ?>
    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward">
        <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="4.875" cy="4.0625" r="3.5625" stroke="white"/>
            <rect x="0.8125" y="4.0625" width="8.125" height="4.0625" fill="#604893"/>
            <line x1="1.3125" y1="4.0625" x2="1.3125" y2="8.125" stroke="white"/>
            <line x1="8.625" y1="4.0625" x2="8.625" y2="8.125" stroke="white"/>
            <rect y="5.6875" width="9.75" height="7.3125" rx="1" fill="white"/>
        </svg>
        <?php esc_html_e( 'Checkout', 'woocommerce' ); ?>
    </a>
    <?php
}

// Remove Cross Sells from default position  
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
// Move under the cart
add_action( 'woocommerce_after_cart', 'woocommerce_cross_sell_display' );
// Display Cross Sells on 3 columns
add_filter( 'woocommerce_cross_sells_columns', 'keic_change_cross_sells_columns' );
function keic_change_cross_sells_columns( $columns ) {
    return 3;
}
// Display Only 3 Cross Sells
add_filter( 'woocommerce_cross_sells_total', 'keic_change_cross_sells_product_no' );
function keic_change_cross_sells_product_no( $columns ) {
    return 3;
}

//Add excerpt to product loop
add_action('woocommerce_shop_loop_item_title','keic_product_loop_excerpt');
function keic_product_loop_excerpt() {
    global $post; 
    echo '<div class="product-short-description">';
        if(get_field('product_excerpt',$post->ID)){
            echo get_field('product_excerpt',$post->ID);
        }else{
            echo wp_trim_words($post->post_excerpt, 9);
        }
    echo '</div>';
}

//Add bundle under cart total
add_action('woocommerce_cart_collaterals','keic_product_bundle_cart');
add_action('woocommerce_after_cart_table','keic_product_bundle_cart_mobile');
function keic_product_bundle_cart_mobile() {
    keic_product_bundle_cart();
}
function keic_product_bundle_cart() {
	global $woocommerce;
	$items = $woocommerce->cart->get_cart();
	
	foreach($items as $values) {  

			$product_id = $values['product_id']; 
			// $product_id = $values['data']->get_id();
			$product = wc_get_product( $product_id );  
			// $bundle_subproducts = $product->get_children();

			// echo "<pre>";
			// print_r($product->is_type( 'bundle' ));
			// echo "</pre>";
			// print_r($product_id);
			if( get_field('bundle_promo', $product_id) ){
					$bundle_promo_title = get_field('bundle_promo_title', $product_id);
					$bundleProducts = get_field('bundle_products', $product_id);
			?>
					<div class="bundle-promo">
						<h6 class="open"><?= get_field('bundle_promo_title', $product_id) ?></h6>
							<?php
								foreach($bundleProducts as $bundleProduct){

								$bundle_product = $bundleProduct['bundle_product'];
								
								$bundle = wc_get_product($bundle_product->ID);
								// $postID = is_numeric($bundle_product->ID);
								$postID = $bundleProduct['bundle_product']->ID;
								$bundle_subproducts = WC_PB_DB::query_bundled_items( array(
										'return'    => 'id => product_id',
										'bundle_id' => array( $postID )
									));
									$bundlePro = $bundle_subproducts;
								//   echo $postID;
								
							?>
					
							<div class="bundle-promo-wrapper mb-4 pb-2" style="display: block;">
									<div class="bundle-promo-container">
											<div class="bundle-promo-image">
													<?= $bundle->get_image() ?>
											</div>
											<div class="bundle-promo-content">
													<h5><?= $bundle_product->post_title ?></h5>
													<p><?= wp_trim_words($bundle_product->post_excerpt, 7) ?></p>
													<p><b>$<?= $bundle->get_price() ?></b></p>
													<?php 
															$url = "?add-to-cart=".$bundle_product->ID; 
															foreach ($bundlePro as $subproduct) {
																	$url .= '&quantity['.$subproduct['product_id'].']=1';
															}
													?> 
												 
												 <?php if(bundlepro_is_in_cart($bundle_product->ID) ==1) { ?>
													<a href="#" class="button alt" style="pointer-events: none;background: #C4C4C4 !important;border-color: #C4C4C4 !important;color: #807D79 !important;">Added to Bag</a>
													<?php } else { ?>
															<a href="<?= $url ?>" class="button alt"><?= get_field('bundle_cta',$product_id) ? get_field('bundle_cta',$product_id) : 'Purchase Now' ?></a>
													<?php  } ?>
											</div>
									</div>
							</div>
					
							<?php
							 }   ?>
							</div>
						<?php        
			}
			break; } 
}

/*
 * Cart Empty
 * */
remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', 'custom_empty_cart_message', 10 );
function custom_empty_cart_message() { ?>
    <div class="container">
    	<div class="cart-empty text-center">
            <svg width="101" height="99" viewBox="0 0 84 81" fill="#D7D81B" xmlns="http://www.w3.org/2000/svg">
                <path d="M42.0025 0C38.8617 0.00264262 35.7311 0.344142 32.6691 1.01812C33.031 2.23476 33.1288 3.51027 32.9565 4.765C32.7843 6.01973 32.3456 7.22674 31.6679 8.31067C30.9902 9.39461 30.0881 10.3322 29.0178 11.0649C27.9476 11.7976 26.7321 12.3096 25.4475 12.5691C26.2229 14.0933 26.5461 15.7947 26.3813 17.4851C26.2165 19.1754 25.5701 20.7889 24.5136 22.1471C23.4571 23.5052 22.0316 24.5552 20.3948 25.1809C18.7581 25.8065 16.9737 25.9835 15.2391 25.6922C15.2216 25.8019 15.21 25.9087 15.1866 26.0184C14.8856 27.4641 14.2286 28.8188 13.271 29.9683C12.3134 31.1179 11.0833 32.0287 9.68433 32.6239C8.28535 33.2192 6.75848 33.4815 5.2324 33.3886C3.70632 33.2958 2.22573 32.8506 0.915391 32.0906C-0.887156 40.2793 -0.014005 48.8054 3.41472 56.4959C6.84344 64.1864 12.6593 70.6635 20.062 75.036C27.4648 79.4085 36.0908 81.4616 44.7533 80.9129C53.4158 80.3641 61.6891 77.2404 68.4351 71.9716C75.181 66.7027 80.068 59.5476 82.4239 51.4907C84.7797 43.4337 84.4886 34.8707 81.5906 26.9798C78.6925 19.0889 73.33 12.2579 66.2407 7.42639C59.1513 2.59493 50.6836 0.000488385 42.0025 0V0Z"/>
            </svg>
            <h2>Your cart is empty</h2>
            <p class="return-to-shop">
                <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                    <?php
                        /**
                         * Filter "Return To Shop" text.
                         *
                         * @since 4.6.0
                         * @param string $default_text Default text.
                         */
                        echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
                    ?>
                </a>
            </p>
        </div>
        <div class="featured-products">
            <h3>Featured products</h3>
            <?php echo do_shortcode('[featured_products per_page="3" columns="3"]'); ?>
        </div>
    </div>
<?php
}
add_filter('woocommerce_return_to_shop_text', 'prefix_store_button');
function prefix_store_button() {
    $store_button = "Continue Shopping"; // Change text as required
    return $store_button;
}

//Remove additional information chekout
add_filter('woocommerce_enable_order_notes_field', '__return_false');

//Move coupon
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form');
add_action( 'keic_inside_review_order', 'woocommerce_checkout_coupon_form' );

//Move Order Review checkout
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review' );
add_action( 'keic_inside_review_order', 'woocommerce_order_review');

//Change gift card
function change_pw_gift_card_redeem_hook() {
    global $pw_gift_cards_redeeming;

    remove_action( 'woocommerce_review_order_before_submit', array( $pw_gift_cards_redeeming, 'woocommerce_review_order_before_submit'), 1 );
    remove_action( 'woocommerce_before_checkout_form', array( $pw_gift_cards_redeeming, 'woocommerce_before_checkout_form'), 1 );
    add_action( 'keic_inside_review_order', array( $pw_gift_cards_redeeming, 'woocommerce_before_checkout_form' ), 1);
}
add_action( 'woocommerce_init', 'change_pw_gift_card_redeem_hook' );

//Wrap order review
add_action('woocommerce_before_checkout_form','keic_products_review', 99);
function keic_products_review(){
    echo '<div class="kiec-before-review-order-mobile">';
        do_action('keic_before_review_order_mobile');
    echo '</div>';
    echo '<div class="keic-checkout-review-order">';
        echo '<div class="review-order-toggle open">';
            echo '<a href="#"><span>Show</span> order summary</a>';
            wc_cart_totals_order_total_html();
        echo '</div>';
        echo '<div class="review-order-content" style="display: block;">';
            do_action('keic_inside_review_order');
        echo '</div>';
    echo '</div>';
}

//Override checkout fields 
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
    
    //Disable
    unset( $fields['billing']['billing_company'] );
	unset( $fields['billing']['billing_city'] );
	unset( $fields['billing']['billing_address_1'] );
	unset( $fields['billing']['billing_address_2'] );
    unset( $fields['billing']['billing_phone'] );
    

    //Add class, remove labels and add placeholders
    $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
    $fields['billing']['billing_first_name']['label'] = '';
    $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
    $fields['billing']['billing_last_name']['label'] = '';

    $fields['billing']['billing_country']['placeholder'] = 'Country/Region';
    $fields['billing']['billing_country']['class'] = array('col-4');
    $fields['billing']['billing_country']['label'] = '';
    
    $fields['billing']['billing_state'] = array('placeholder' => 'State', 'class' => array('col-4'));
    $fields['billing']['billing_postcode'] = array('placeholder' => 'Zip code', 'class' => array('col-4'));
    $fields['billing']['billing_email'] = array(
        'placeholder' => 'Email',
        'required' => true,
        'class' => array('form-row-wide'),
        'priority' => 3
    );

    //add email confirmation field
    $fields['billing']['billing_em_ver'] = array(
        'placeholder' => 'Confirm Email',
        'required' => true,
        'class' => array( 'form-row-wide' ),
        'priority' => 5,
    );

    return $fields;
}

  
add_action('woocommerce_checkout_process', 'verify_email_addresses');
  
function verify_email_addresses() { 
    $email1 = $_POST['billing_email'];
    $email2 = $_POST['billing_em_ver'];
    if ( $email2 !== $email1 ) {
        wc_add_notice( 'Your email addresses do not match', 'error' );
    }
}

//Add title to payment checkout
add_action('woocommerce_review_order_before_payment', 'keic_add_payment_title');
function keic_add_payment_title(){
    echo '<h3 class="payment-title">Payment Information</h3>';
    echo '<b>All transactions are secure and encrypted</b>';
}

//Change place order btn class
add_filter('woocommerce_order_button_html', 'keic_order_button_html');
function keic_order_button_html($button){
    $order_button_text = 'Place Order';
    $button = '<button type="submit" class="button" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>';
    return $button;
}

//Add logo checkout
//add_action('woocommerce_checkout_before_customer_details','keic_add_header_checkout');
add_action('keic_before_form_checkout','keic_add_header_checkout');
add_action('keic_before_review_order_mobile','keic_add_header_checkout');
function keic_add_header_checkout(){
    echo '<div class="checkout-header">';
        echo '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'.get_template_directory_uri().'/images/logo-dark.png"></a>';
        echo '<a href="'.wc_get_cart_url().'" class="return-to-cart"><svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.3962 6.98532C5.19605 7.24532 4.80395 7.24532 4.6038 6.98532L0.423534 1.555C0.170436 1.22621 0.404817 0.75 0.819737 0.75L9.18026 0.750001C9.59518 0.750001 9.82956 1.22621 9.57647 1.555L5.3962 6.98532Z" fill="#EB6131"/></svg>Return to cart</a>';
    echo '</div>';
}

add_action('keic_before_form_checkout','keic_add_title_checkout');
function keic_add_title_checkout(){
    echo '<h1 class="checkout-title">Secure Checkout</h1>';
}

//If customer hide admin bar
function check_if_customer(){
    $user = wp_get_current_user();
    if ( is_user_logged_in() ) {    
        if ( in_array( 'customer', (array) $user->roles ) ) {
            show_admin_bar(false);
        }
    }
}
add_action('init', 'check_if_customer');

//Change coupon label
add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );
function woocommerce_rename_coupon_message_on_checkout() {
	return 'Have a promo code or gift card? <a href="#" class="showcoupon"></a>';
}

//Change woocommerce labels
add_filter( 'gettext', 'keic_change_labels', 999, 3 );
function keic_change_labels( $translated, $untranslated, $domain ) {
    if ( ! is_admin() && 'pw-woocommerce-gift-cards' === $domain ) {
        switch ( $translated ) {
            case 'Click here to enter your gift card number':
                $translated = '';//removed
            break;
            case 'Apply gift card':
                $translated = 'Apply';
            break;
        }
    }     
    if ( ! is_admin() && 'woocommerce' === $domain ) {
        switch ( $translated ) {
            case 'Click here to login':
                $translated = 'Log in';
            break;            
            case 'Apply coupon':
                $translated = 'Apply';
            break;
        }        
    }
    if ( ! is_admin() && 'pw-woocommerce-gift-cards' === $domain ) {
        switch ( $translated ) {
            case 'Enter an email address for each recipient':
                $translated = 'Recipient Email Address';
            break; 
            case 'Enter a friendly name for the recipient (optional).':
                $translated = 'Recipient Name';
            break; 
            case 'Your name':
                $translated = 'From';
            break; 
            case 'Add a message':
                $translated = 'Message (optional)';
            break;
            case 'Now':
                $translated = 'Delivery Date';
            break;
        }        
    }
   return $translated;
}

//Move checkout login
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
add_action( 'keic_before_form_checkout', 'woocommerce_checkout_login_form' );

//Change checkout login label
add_filter( 'woocommerce_checkout_login_message', 'keic_return_customer_message' );
function keic_return_customer_message() {
    return 'Already have an account?';
}

add_action( 'woocommerce_checkout_after_order_review', 'keic_add_checkout_footer_links' );
function keic_add_checkout_footer_links() { ?>
    <div class="checkout-footer-links">
        <?php if(get_privacy_policy_url()){ ?>
            <a href="<?php echo get_privacy_policy_url(); ?>">Privacy Policy</a>
        <?php } ?>
        <?php if(wc_terms_and_conditions_page_id()){ ?>
        <a href="<?php echo get_permalink(wc_terms_and_conditions_page_id()); ?>">| Terms & Conditions</a>
        <?php } ?>
    </div>
    <?php
}

//Header thank you page
add_action('woocommerce_before_thankyou', 'keic_add_logo_confirmation_page');
function keic_add_logo_confirmation_page(){
    echo '<div class="confirmation-header">';
        echo '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'.get_template_directory_uri().'/images/logo-dark.png"></a>';
    echo '</div>';
}

//Change thankyou text
add_action( 'woocommerce_thankyou_order_received_text', 'keic_thankyou_order_received_text' );
function keic_thankyou_order_received_text(){
    global $wp;
    $order_id = absint($wp->query_vars['order-received']); // The order ID
    $order    = wc_get_order( $order_id ); // The WC_Order object
    echo '<div class="order-number">';
        echo '<p>You will receive a confirmation email with your order details.</p>';
        echo '<p>Order Number: <b>'.$order->get_id().'</b></p>';
    echo '</div>';
}

//Registration Form
add_shortcode( 'wc_keic_reg_form', 'keic_confirmation_reg_form' );    
function keic_confirmation_reg_form() {
    
    global $wp;
    $order_id    = absint($wp->query_vars['order-received']); // The order ID
    $order       = wc_get_order( $order_id ); // The WC_Order object
    $order_items = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
    $user_email  = $order->get_billing_email();
    
    if ( is_admin() ) return;
    if ( is_user_logged_in() ){
		
		$products_names = $products_tags = [];

		foreach ( $order_items as $item_id => $item ) {
            // Get the product tags term names in an array
            $product_id = $item->get_variation_id() ? $item->get_variation_id() : $item->get_product_id();
			$term_names = wp_get_post_terms($item->get_product_id(), 'product_tag', ['fields' => 'names']);
            $product = wc_get_product($product_id);

		    $bp =  $product->is_type('bundle');
			
			if($bp==1){
				
				$products_tags['bundlePro'] = $bp;
			}
			$products_tags    = array_merge($products_tags, $term_names);
			$products_names[] = $item->get_name();
		}
        
        if(( $products_tags[0]=='course' && $products_tags[1]=='ebook') || ($products_tags[0]=='ebook' && $products_tags[1]=='course') || $products_tags[0]=='course' || ( $products_tags['bundlePro'] == 1 && $products_tags[2]=='course' && $products_tags[1]=='ebook') || ( $products_tags['bundlePro'] == 1 && $products_tags[1]=='course' && $products_tags[2]=='ebook')){
            echo '<a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'learning-center/">Start the course here</a>';
        }else{
            echo '<a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'">Check your account here</a>';
        }
        
        return;
    }
    
	
    

    $prod_types = array();
    foreach ( $order_items as $item_id => $item ) {
        $product = $item->get_product();
        $parent_product = wc_get_product($product->get_parent_id());

        if( $product->is_type('variation') ){ //Gift
            if($parent_product->is_type('pw-gift-card')){
                $prod_types[] = 'gift-card'; 
            }
        }elseif( $product->is_type('course') ){ // Courses
            $prod_types[] = 'course'; 
        }else{ //Ebook
            $prod_types[] = 'ebook';
        }
    }
    $prod_types = array_unique($prod_types);
    $course = in_array("course", $prod_types);
    $ebook = in_array("ebook", $prod_types);
    $gift_card = in_array("gift-card", $prod_types);
    
	

    if( $course || ($course && $ebook) ){//Only course OR Course and ebook
        $description_title = 'Ready to start your course?';
        $description_subtitle = 'Create an account to access your materials.';
    }elseif( $ebook ){//Only ebook
        $description_title = 'Want to view your past purchases?';
        $description_subtitle = 'Create an account to access your materials.';    
    }else{//Gift card
        $description_title = 'Want to view your past purchases?';
        $description_subtitle = 'Create an account to access your gift cards';
    }

    if(email_exists($user_email)){
        ?>
        <p>Your email is already associated with an account. Please <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">log in here</a></p>
        <?php
        return;
    }

    ob_start();
    
    do_action( 'woocommerce_before_customer_login_form' );

    // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
    // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY
   
    ?>
    <form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
       
        <div class="wc-register-description">
            <p><b><?= $description_title ?></b></p>
            <p><?= $description_subtitle ?></p> 
        </div>

        <?php do_action( 'woocommerce_register_form_start' ); ?>
 
        <input type="hidden" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" placeholder="Email*" value="<?php echo ( ! empty( $user_email ) ) ? esc_attr( wp_unslash( $user_email ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
        
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" placeholder="Password" autocomplete="new-password" />
        </p>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password2" id="reg_password2" placeholder="Confirm Password" />
        </p>
 
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
        <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Create an Account', 'woocommerce' ); ?>"><?php esc_html_e( 'Create an Account', 'woocommerce' ); ?></button>
        </p>

        <?php do_action( 'woocommerce_register_form_end' ); ?>

        <p>Already have an account with Kids Eat in Color? <a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Log in here</a></p>

    </form>
 
   <?php
     
   return ob_get_clean();
}

//Registration form validation
add_filter('woocommerce_registration_errors', 'woocommerce_registration_errors_validation', 10, 3);
function woocommerce_registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}

//Change order summary
remove_action('woocommerce_thankyou','woocommerce_order_details_table');
add_action('woocommerce_thankyou','keic_order_details_table');
function keic_order_details_table($order_id){
    $order = wc_get_order( $order_id );
    $order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
    $show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
    $show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();

    $html = '';
    $html .= '<div class="order-details">';    
        $html .= '<h5>Order Summary</h5>';
        $html .= '<div class="order-details-table">';
            $html .= '<table>';
                $html .= '<tbody>';
                    foreach ( $order_items as $item_id => $item ) {
                        $html .= '<tr>';
                            $product = $item->get_product();
                            $html .= '<td class="product-image">';
                                $html .= $product->get_image();
                            $html .= '</td>';
                            $html .= '<th class="product-name">';
                                $html .= $product->get_name();
                            $html .= '</th>';
                            $html .= '<td class="product-price">';
                                $html .= $order->get_formatted_line_subtotal( $item );
                                $downloads = $product->get_downloads();
                                foreach ($downloads as $download) {
                                    $html .= '<a href="?action=download&file='.$download['file'].'" class="button desktop" download>Download</a>';
                                }   
                            $html .= '</td>';
                        $html .= '</tr>';

                        $html .= '<tr><td colspan="3">';
                            foreach ($downloads as $download) {
                                $html .= '<a href="?action=download&file='.$download['file'].'" class="button mobile" download>Download</a>';
                            }                      
                        $html .= '</td></tr>';

                    }
                $html .= '</tbody>';
                $html .= '<tfoot>';
                    $order_totals = $order->get_order_item_totals();
                    $qty = count($order->get_items());
                    $text = _n( ' (%s item)', ' (%s items)', $qty );
                    $quantity = sprintf( $text, $qty );

                    $html .= '<tr class="cart-subtotal">';
                        $html .= '<td colspan="2">'.$order_totals['cart_subtotal']['label'].$quantity.'</td>';
                        $html .= '<td>'.$order_totals['cart_subtotal']['value'].'</td>';
                    $html .= '</tr>';

                    foreach ( $order_totals as $key => $total ) {
                        if($key === 'payment_method' || $key === 'cart_subtotal' || $key === 'order_total'){ continue; }
                        $html .= '<tr>';
                            $html .= '<td colspan="2">'.(($key === 'order_total') ? 'Order Total:' : $total['label']).'</td>';
                            $html .= '<td>'.wp_kses_post( $total['value'] ).'</td>';                        
                        $html .= '</tr>';
                    }   

                    $html .= '<tr class="order-total">';
                        $html .= '<th colspan="2">Order Total:</th>';
                        $html .= '<th>'.$order_totals['order_total']['value'].'</th>';
                    $html .= '</tr>';

                    $html .= '<tr class="payment-total">';
                        $html .= '<th colspan="2">'.$order_totals['payment_method']['value'].'</th>';
                        $html .= '<th>'.$order_totals['order_total']['value'].'</th>';
                    $html .= '</tr>';

                $html .= '</tfoot>';
            $html .= '</table>';
        $html .= '</div>';
    
        $html .= '<div class="continue-shopping text-center">';
            $html .= '<a class="button" href="'.str_replace('/products', '/shop', wc_get_page_permalink( 'shop' )).'">Continue Shopping</a>';
        $html .= '</div>';

    $html .= '</div>';

    echo $html;
}

//Latest blogs
function latest_blog_articles_fn() {
    // the query
    $the_query = new WP_Query( array(
        'posts_per_page' => 3,
    )); 
    ?>
    <div class="latest-articles">
    <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="latest-article">
                <?php if(has_post_thumbnail()){ ?>
                    <?php the_post_thumbnail(); ?>   
                <?php }else{ ?>
                    <img src="<?php echo get_template_directory_uri().'/images/placeholder.png'; ?>" alt="">
                <?php } ?>  
                <div class="latest-article-content"> 
                    <h5><?php the_title(); ?></h5>
                    <a href="<?php the_permalink(); ?>" class="button alt">View Blog</a>
                </div>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    </div>
<?php
}
add_shortcode( 'latest-blog-articles', 'latest_blog_articles_fn' );

//Disable coupon and gift card from cart
function disable_coupon_field_on_cart( $enabled ) {
    if ( is_cart() ) {
        $enabled = false;
    }
    return $enabled;
}
add_filter( 'woocommerce_coupons_enabled', 'disable_coupon_field_on_cart' );

function disable_pw_gift_card_cart() {
    global $pw_gift_cards_redeeming;
    remove_action( 'woocommerce_after_cart_contents', array( $pw_gift_cards_redeeming, 'woocommerce_after_cart_contents' ) );    
    remove_action( 'woocommerce_proceed_to_checkout', array( $pw_gift_cards_redeeming, 'woocommerce_proceed_to_checkout' ) );
}
add_action( 'woocommerce_init', 'disable_pw_gift_card_cart' );

//Redirect my-account to edit-account
function my_account_redirect() {
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $dashboard_url = get_permalink( get_option('woocommerce_myaccount_page_id'));
    if( $dashboard_url == $current_url && !wp_is_mobile() ){
        wp_safe_redirect(wc_customer_edit_account_url());
        die;
    }
}
add_action( 'template_redirect', 'my_account_redirect' );

//Hide if price is 0
function keic_price_zero_empty( $price, $product ){
    if ( '' === $product->get_price() || 0 == $product->get_price() ) {
        $price = '<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span></bdi></span>';
    }
    
    return $price;
}
add_filter( 'woocommerce_get_price_html', 'keic_price_zero_empty', 9999, 2 );

function keic_variation_price_zero_empty( $price, $product ) {
    $default_attributes = $product->get_default_attributes();
    if( !$default_attributes){
        $price = '<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol"></span></bdi></span>';
    }
    return $price;
}
add_filter( 'woocommerce_variable_price_html', 'keic_variation_price_zero_empty', 9999, 2 );

/*
* Theirs
*
*/

	// function kidseatincolor_apply_coupon() {
	// 		$coupon_code = 'auto_coupon';
	// 		if ( WC()->cart->has_discount( $coupon_code ) ) return;
	// 		WC()->cart->apply_coupon( $coupon_code );
	// 		wc_print_notices();
	// }
  //add_action( 'woocommerce_before_cart', 'kidseatincolor_apply_coupon' );
/*add_action( 'woocommerce_before_cart', 'kidseatincolor_apply_matched_id_products' );
function kidseatincolor_apply_matched_id_products() {  
    $coupon_code = 'auto_coupon'; 
    // this is your product ID/s array  
    $product_ids = [7694]; 
    // Apply coupon. Default is false
    $apply=false;
 
    // added to cart products loop
    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {                      
        if ( in_array( $cart_item['product_id'], $product_ids )):              
            $apply=true;
            break;                     
        endif;  
    }
    // apply & remove coupon
    if($apply==true):
        WC()->cart->apply_coupon( $coupon_code );
        wc_print_notices();  
    else:    
        WC()->cart->remove_coupons( sanitize_text_field( $coupon_code ));
        wc_print_notices();   
        WC()->cart->calculate_totals();    
    endif; 
} */

// Apply coupon to the subtotal cart value
/*
 add_action('woocommerce_before_cart','kidseatincolor_apply_coupon_cart_values');
function kidseatincolor_apply_coupon_cart_values(){
     
       // previously created coupon
       $coupon_code = 'auto_coupon';           
       // get coupon
       $current_coupon = WC()->cart->get_coupons();
       // get Cart subtotal
       $cart_ST = WC()->cart->subtotal;        
 
       // coupon has not been applied before && conditional is true
       if(empty($current_coupon)&&$cart_ST>=100):
           // Apply coupon
           WC()->cart->apply_coupon( $coupon_code );
           wc_print_notices();            
       // coupon has been applied && conditional is false
       elseif(!empty($current_coupon)&&$cart_ST<100):
           WC()->cart->remove_coupons(sanitize_text_field($coupon_code));
           wc_print_notices();       
           WC()->cart->calculate_totals();
           echo '<div class="woocommerce_message">Coupon was removed</div>';
       // Conditional is FALSE && no coupon is applied
       else:// Do nothing 
           echo '<div class="woocommerce_message"> Unknown error</div>';
       endif;
} */

// Apply coupon to the total cart depending on the number of products in the cart

//add_action('woocommerce_before_cart','kidseatincolor_apply_coupon_cart_values');
// function kidseatincolor_apply_coupon_cart_values(){      
//   $coupon_code = 'auto_coupon'; // Note: get this value from theme settings
  
//   $current_coupon = WC()->cart->get_coupons();       
//   $kP_count =WC()->cart->get_cart_contents_count();
  
//   if(empty($current_coupon)&&$kP_count>=2):
//     WC()->cart->apply_coupon( $coupon_code );
//     wc_print_notices();             
//   // coupon has been applied && conditional is false
//   elseif(!empty($current_coupon)&&$kP_count<2):
//     WC()->cart->remove_coupons( sanitize_text_field( $coupon_code ));
//     wc_print_notices();        
//     WC()->cart->calculate_totals();             
//     echo '<div class="woocommerce_message"> Coupon was removed</div>';
//   else:// Do nothing  
//     echo '<div class="woocommerce_message"> Unknown error</div>';
//   endif;
// } 




add_action( 'woocommerce_variation_options_pricing', 'keic_add_custom_field_to_variations', 10, 3 );
 
function keic_add_custom_field_to_variations( $loop, $variation_data, $variation ) {

   woocommerce_wp_text_input( array(
'id' => 'custom_field[' . $loop . ']',
'class' => 'short',
'label' => __( 'Variation label', 'woocommerce' ),
'value' => get_post_meta( $variation->ID, 'custom_field', true )
   ) );
	 
}
 
// -----------------------------------------
// 2. Save custom field on product variation save
 
add_action( 'woocommerce_save_product_variation', 'keic_save_custom_field_variations', 10, 2 );
 
function keic_save_custom_field_variations( $variation_id, $i ) {
   $custom_field = $_POST['custom_field'][$i];
   if ( isset( $custom_field ) ) update_post_meta( $variation_id, 'custom_field', esc_attr( $custom_field ) );
}
 
// -----------------------------------------
// 3. Store custom field value into variation data
 
add_filter( 'woocommerce_available_variation', 'keic_add_custom_field_variation_data' );
 
function keic_add_custom_field_variation_data( $variations ) {
   $variations['custom_field'] = get_post_meta( $variations[ 'variation_id' ], 'custom_field', true );
   return $variations;
}

// 
function variation_radio_buttons($html, $args) {
    global $pw_gift_cards;
	$args = wp_parse_args(apply_filters('woocommerce_dropdown_variation_attribute_options_args', $args), array(
		'options'          => false,
		'attribute'        => false,
		'product'          => false,
		'selected'         => false,
		'name'             => '',
		'id'               => '',
		'class'            => '',
		'show_option_none' => __('Choose an option', 'woocommerce'),
	));
    // print_r($args);
    

	//if(false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product) {
    if( $args['attribute'] && $args['product'] instanceof WC_Product ) {  
        $selected_key     = 'attribute_'.sanitize_title($args['attribute']);
	    $args['selected'] = isset($_REQUEST[$selected_key]) ? wc_clean(wp_unslash($_REQUEST[$selected_key])) : $args['product']->get_variation_default_attribute($args['attribute']);
	}

	$options               = $args['options'];
	$product               = $args['product'];
	$attribute             = $args['attribute'];
	$name                  = $args['name'] ? $args['name'] : 'attribute_'.sanitize_title($attribute);
	$id                    = $args['id'] ? $args['id'] : sanitize_title($attribute);
	$class                 = $args['class'];
	$show_option_none      = (bool)$args['show_option_none'];
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __('Choose an option', 'woocommerce');

	if(empty($options) && !empty($product) && !empty($attribute)) {
		$attributes = $product->get_variation_attributes();
		$options    = $attributes[$attribute];
	}

	$radios = '<div class="variation-radios">';

	if(!empty($options)) {

		if($product->get_type() == 'pw-gift-card'){
            $product = wc_get_product($product->get_id());
            $variations = $product->get_available_variations();
            $cusFieldName = [];
            $index = 0;

            foreach($variations as $x => $cusField){
                $cusFieldName[$index] = $cusField['custom_field'];
                $index++;
            }				
		}

		if($product && taxonomy_exists($attribute)) {
			$terms = wc_get_product_terms($product->get_id(), $attribute, array(
				'fields' => 'all',
			));
			
			$index = 0;
			foreach($terms as $term) {
                $price_html = get_the_variation_price_html( $product, $name, $term->slug );	
                if(in_array($term->slug, $options, true)) {
                    $id = $name.'-'.$term->slug;
                    $radios .= '<input type="radio" id="'.esc_attr($id).'" name="'.esc_attr($name).'" value="'.esc_attr($term->slug).'" '.checked(sanitize_title($args['selected']), $term->slug, false).'>';
                    $radios .= '<label for="'.esc_attr($id).'" class="variable-label">'.$cusFieldName[$index]  .' '. esc_html(apply_filters('woocommerce_variation_option_name', $term->name)).' - <b>$'.$price_html.'</b></label>';
                    $index++;
                }
			}
		} else {
			$index = 0;
			foreach($options as $option) {
				$id = $name.'-'.$option;
				$checked    = sanitize_title($args['selected']) === $args['selected'] ? checked($args['selected'], sanitize_title($option), false) : checked($args['selected'], $option, false);
				$radios    .= '<input type="radio" id="'.esc_attr($id).'" name="'.esc_attr($name).'" value="'.esc_attr($option).'" id="'.sanitize_title($option).'" '.$checked.'>';
				$radios    .= '<label for="'.esc_attr($id).'" class="variable-label">'.$cusFieldName[$index]  .' <b>'. esc_html(apply_filters('woocommerce_variation_option_name', $option)).'<b></label>';
				$index++;
			}
		}
	}

	$radios .= '</div>';
		
	return $html.$radios;
}
add_filter('woocommerce_dropdown_variation_attribute_options_html', 'variation_radio_buttons', 20, 2);



function variation_check($active, $variation) {
  if(!$variation->is_in_stock() && !$variation->backorders_allowed()) {
    return false;
  }
  return $active;
}
add_filter('woocommerce_variation_is_active', 'variation_check', 10, 2);

add_filter('woocommerce_dropdown_variation_attribute_options_args','fun_select_default_option',10,1);
function fun_select_default_option( $args){
    if(count($args['options']) > 0) //Check the count of available options in dropdown
        $args['selected'] = $args['options'][0];
    return $args;
}


function filter_wp_editor_settings( $settings, $editor_id ) {
  global $post;
  
  // Target
  if ( $editor_id == 'excerpt' && get_post_type( $post ) == 'product' ) {

      // Settings
      
      $settings = array(
          // Disable autop if the current post has blocks in it.
          'wpautop'             => ! has_blocks(),
          'media_buttons'       => false,
          'default_editor'      => '',
          'drag_drop_upload'    => false,
          'textarea_name'       => $editor_id,
          'textarea_rows'       => 40,
          'tabindex'            => '',
          'tabfocus_elements'   => ':prev,:next',
          'editor_css'          => '',
          'editor_class'        => '',
          'teeny'               => false,
          '_content_editor_dfw' => false,
          'tinymce'             => true,
          'quicktags'           => false,
      );
  }
  
  return $settings;
}
add_filter( 'wp_editor_settings', 'filter_wp_editor_settings', 1, 2 );


/*add_filter( 'woocommerce_quantity_input_args', 'custom_quantity', 10, 2 );
function custom_quantity( $args, $product ) {
    $args['input_value'] = 1;
    return $args;
}*/

// Download Private / woocommerce_upload pdf 
function woocommerce_upload_pdf_when_user_login() {
    $file = basename($_SERVER['PHP_SELF']);
    // is_user_logged_in() remove is user logged in 
    if ( isset($_GET['action']) && $_GET['action'] == 'download' && isset($_GET['file'])){
      ob_clean();
      ob_flush();
      $file_path = ltrim(parse_url($_GET['file'], PHP_URL_PATH), '/');
      $file_name = pathinfo($file_path)['basename'];
      header("Content-Description: File Transfer");
      header("Content-Type: application/octet-stream");
      header('Content-Disposition: attachment; filename="' . urlencode($file_name) . '"');
      header("Content-Type: application/download");
      header("X-Robots-Tag: noindex");
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file_path));
      ob_clean();
      flush();
      file_get_contents($file_path);
      $fp = fopen($file_path, "r");
      while (!feof($fp)) {
          echo fread($fp, 65536);
          flush(); // This is essential for large downloads
      }  
      fclose($fp);
      exit();
    } 
}
add_action('init', 'woocommerce_upload_pdf_when_user_login');

function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


function bundlepro_is_in_cart($product_id) {
    global $woocommerce;
    foreach($woocommerce->cart->get_cart() as $key => $val ) {
        $_product = $val['data'];
        if($product_id == $_product->get_id() ) {
            return true;
        }
    }
    return false;
  }



// 301 Redirect product page to shop page  
function products_page_redirect_by_request_uri() {
	if ( isset( $_SERVER['REQUEST_URI'] ) ) {
		// Store uri and create array of uri parts
		$request_uri = $_SERVER['REQUEST_URI'];
		$parts = explode( '/', $request_uri );
		if ( strpos( $parts[1], 'products' ) !== false ) {
			$redirect = '/shop/';
			wp_redirect( $redirect, 301 );
			exit;
		}
	}
 }
 add_action( 'template_redirect', 'products_page_redirect_by_request_uri' );

// Cart page Continue Shopping redirect on shop page
function cart_page_redirect_change_return_shop_url() {
	return home_url('/shop/');
}
add_filter( 'woocommerce_return_to_shop_redirect', 'cart_page_redirect_change_return_shop_url' );

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
add_filter( 'woocommerce_sale_flash', '__return_null' );





function remove_downloads_section_from_refunded_order_emails( $order, $sent_to_admin, $plain_text, $email ){
    if( $email->id === 'customer_refunded_order' )
        remove_action( 'woocommerce_email_order_details', array( WC()->mailer(), 'order_downloads' ), 10 );
}
add_action( 'woocommerce_email_order_details', 'remove_downloads_section_from_refunded_order_emails', 1, 4 );


// Removed Subscriptions Msg from Thankyou page

function custom_subscription_thank_you( $order_id ){
    $thank_you_message = sprintf( __( '' ) );
    return $thank_you_message;
}
add_filter( 'woocommerce_subscriptions_thank_you_message', 'custom_subscription_thank_you');

// Change Coupon error message
function coupon_error_message_change($err, $err_code, $parm ) {
    switch ( $err_code ) {
     case 105:
     $err = sprintf( __( 'Code "%s" does not exist!', 'woocommerce' ), $parm->get_code() );
        break;
     }
     return $err;
 }
 add_filter( 'woocommerce_coupon_error','coupon_error_message_change',10,3 );


// When the bunddle product is added to cart remove single components from cart
add_action( 'woocommerce_add_to_cart', 'on_bundled_product_added_to_cart', 10, 4 );
function on_bundled_product_added_to_cart( $cart_item_key, $product_id, $quantity, $variation_id ) {
    
    $product = wc_get_product($product_id);
    
    $bp =  $product->is_type('bundle');
    
    $item_ids_to_remove =[];
    if($bp){
        $bundled_product_id = $product->id;
        $sub_products = WC_PB_DB::query_bundled_items( array(
            'return'    => 'id => product_id',
            'bundle_id' => array( $product_id )
          ));
        foreach($sub_products as $sub_product){
            $item_ids_to_remove[] = $sub_product['product_id'];
        }
    }
    
    // SETTINGS
    // $bundled_product_id = 9465; // Set HERE your bundled product ID
    // $item_ids_to_remove = array(9466); // Set HERE the  product ID(s) to remove(s)

    $removed_items = 0; // Initializing

    // When the bundled product is added to cart
    if( $bundled_product_id == $product_id ) {
        // Loop through cart items
        foreach( WC()->cart->get_cart() as $item_key => $cart_item ){
            $cart_item_ids = array($cart_item['product_id'], $cart_item['variation_id']);
            // Get the cart item keys of the items to be removed
            if( array_intersect( array($cart_item['product_id'], $cart_item['variation_id']), $item_ids_to_remove ) ) {
            //    print_r($cart_item['product_id']);
            //    die;
                if( !wc_pb_is_bundled_cart_item( $cart_item ) ) {
                    WC()->cart->remove_cart_item($item_key);
                    $removed_items++;
                }
            }
        }

    }

    // Optionaly displaying a notice for the removed items
    if( ! empty($removed_item_names) ){
        wc_add_notice( sprintf( __( 'Some products have been removed from cart as they are already bundled in your cart', 'woocommerce' ), $items_text ), 'notice' );
    }
}

// Add to cart validation for bundled components
add_filter( 'woocommerce_add_to_cart_validation', 'check_cart_items_for_bundle_product', 9999, 4 );
function check_cart_items_for_bundle_product( $passed, $product_id, $quantity, $variation_id = 0 ) {
    // SETTINGS
    $product = wc_get_product($product_id);
    
    $bp =  $product->is_type('bundle');
    
    $item_ids_to_remove =[];
    if($bp){
        $bundled_product_id = $product->id;
        $sub_products = WC_PB_DB::query_bundled_items( array(
            'return'    => 'id => product_id',
            'bundle_id' => array( $product_id )
          ));
        foreach($sub_products as $sub_product){
            $item_ids_to_remove[] = $sub_product['product_id'];
        }
    }

    $bundled_in_cart = false;

    if( ! WC()->cart->is_empty() ) {
        // Loop through cart items
        foreach( WC()->cart->get_cart() as $cart_item ){
            // check for bundled product
            if( $bundled_product_id == $cart_item['product_id'] ) {
                $bundled_in_cart = true;
                break;
            }
        }
        if( $bundled_in_cart && array_intersect(array($product_id, $variation_id), $bundled_items_ids) ) {
            // Add a custom notice
            wc_add_notice( __( 'This product is already a component of the bundled product in your cart', 'woocommerce' ), 'error' );
            return false;
        }
    }
    return $passed;
}



function change_lost_password_message() {
    return 'Reset your password here. Enter your username or email address to receive a link to create a new password via email.';
}
add_filter('woocommerce_lost_password_message', 'change_lost_password_message');