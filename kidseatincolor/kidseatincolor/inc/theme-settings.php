<?php

require_once 'customize-woocommerce.php';
require_once 'customize-learndash.php';
require_once 'custompost.php';
require_once 'shortcodes.php';

if( function_exists('acf_add_options_page') ) {
  // redmills General Settings
$general_settings = [
					  'page_title' 	=> __( 'Theme Settings', 'utc' ),
					  'menu_title'	=> __( 'Theme Settings', 'utc' ),
					  'menu_slug' 	=> 'themes-settings',
					  'capability'	=> 'edit_posts',
					  'redirect'      => false,
					  'icon_url'      => 'dashicons-buddicons-forums'
					];
acf_add_options_page( $general_settings );
}

function theme_setting_favicons() {
	if( class_exists('acf') ) {
	  $favicon_url        = get_field( 'options_wp_favicon', 'option' );
	  if( !empty( $favicon_url ) ){
		  echo '<link rel="icon" type="image/x-icon" href="' . $favicon_url . '" />';
	  }
  }
}
add_action('wp_head', 'theme_setting_favicons');
add_action('wp_admin', 'theme_setting_favicons');

/*
* Remove wp logo from admin bar
*/
function kidseatincolor_remove_wp_logo() {
  global $wp_admin_bar;

  if( class_exists('acf') ) {
	  $wp_help  = get_field( 'options_wp_help', 'option' );
	  if( empty( $wp_help ) ) {
		  $wp_admin_bar->remove_menu('wp-logo');
	  }
  }
}
add_action( 'wp_before_admin_bar_render', 'kidseatincolor_remove_wp_logo' );

function themesetting_loginlogo_url($url) {
   return site_url();
}
add_filter( 'login_headerurl', 'themesetting_loginlogo_url' );

/*
* Custom login logo
*/
function themesettings_custom_login_logo() {
  if( class_exists('acf') ) {
	  $wp_login_logo      = get_field( 'options_login_logo', 'option' );
	  $wp_login_w         = get_field( 'options_login_logo_w', 'option' );
	  $wp_login_h         = get_field( 'options_login_logo_h', 'option' );
	  $wp_login_bg        = get_field( 'options_login_bg', 'option' );
	  $wp_login_btn_c     = get_field( 'options_login_btn_color', 'option' );
	  $wp_login_btn_c_h   = get_field( 'options_login_btn_color_h', 'option' );
	  if( !empty( $wp_login_logo ) ) {
?>
  <style type="text/css">
	  .login h1 a {
		  background-image: url('<?php echo $wp_login_logo; ?>') !important;
		  background-size: <?php echo $wp_login_w.'px'; ?> auto !important;
		  height: <?php echo $wp_login_h.'px'; ?> !important;
		  width: <?php echo $wp_login_w.'px'; ?> !important;
		  background-size: 100%!important;
	  }
  </style>
<?php
  }
  if( !empty( $wp_login_bg ) ){
?>
  <style type="text/css">
	  body.login{ background: #604893 url("<?php echo $wp_login_bg; ?>") no-repeat center; background-size: cover;}
	  body.login form {background: rgba(0, 0, 0, 0.2);padding: 40px;}
	  .login form {margin-top: 20px; margin-left: 0;padding: 26px 24px 34px;font-weight: 400;overflow: hidden;background: #fff;border: 1px solid #c3c4c7;box-shadow: 0 1px 3px rgb(0 0 0 / 4%);}
	  body.login #login form p {margin-bottom: 15px;}
	  body.login #login {width: 460px;}
	  .login #nav a, .login #backtoblog a {color:#fff !important;margin: 24px 0 0 0; font-weight:500}
	  .login label {font-size: 15px;line-height: 1.5;display: inline-block;margin-bottom: 3px;color: #fff;font-weight:500}
	  .login a.privacy-policy-link{color:#000; font-weight:500}
	  body.login div#login form#loginform input[type=password], .login input[type=text]{padding:12px 16px !important}
	  body.login div#login form#loginform input#wp-submit{padding: 0 36px 2px; border-color: <?php echo $wp_login_btn_c; ?> !important}
	  body.login div#login form#loginform input#wp-submit {background-color: <?php echo $wp_login_btn_c; ?> !important;}
	  body.login div#login form#loginform input#wp-submit:hover {background-color: <?php echo $wp_login_btn_c_h; ?> !important;}
			/* body.login #login #backtoblog a{position: absolute;background: url('../wp-content/themes/kidseatincolor/images/digitalpolygon.png') no-repeat center center;background-size: contain;height: 35px;width: 180px;font-size: 0;}   */
			/* body.login #login #backtoblog { display: block;position: absolute;bottom: 40px;right: 15px;height: 30px;width: 180px;padding: 0 !important;margin: 0 !important; */
			}
			</style>
<?php
	}
  }
}
add_action( 'login_enqueue_scripts', 'themesettings_custom_login_logo' );

// Theme Option Filed Setup
if( function_exists('acf_add_local_field_group') ):
	acf_add_local_field_group(array(
		'key' => 'group_61096a42da4ae',
		'title' => 'Theme Settings',
		'fields' => array(
			array(
				'key' => 'field_61096a7660d53',
				'label' => 'General Settings',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'left',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_61096a8760d54',
				'label' => 'Site Logo',
				'name' => 'options_site_logo',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_61096a9a60d55',
				'label' => 'Favicon',
				'name' => 'options_favicon',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_61096ad760d56',
				'label' => 'Admin Dashboard',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'left',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_61096ae860d57',
				'label' => 'Favicon',
				'name' => 'options_wp_favicon',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_61096afd60d58',
				'label' => 'WP Help Logo',
				'name' => 'wp_help_logo',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => 'Hide',
				'ui_off_text' => 'Show',
			),
			array(
				'key' => 'field_61096b3360d59',
				'label' => 'WP Login Screen',
				'name' => '',
				'type' => 'tab',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'placement' => 'left',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_61096b3b60d5a',
				'label' => 'Logo',
				'name' => 'options_login_logo',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_61096b5960d5b',
				'label' => 'Width',
				'name' => 'options_login_logo_w',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '25',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => 'px',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_61096b9860d5c',
				'label' => 'Height',
				'name' => 'options_login_logo_h',
				'type' => 'number',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '25',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => 'px',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_61096bac60d5d',
				'label' => 'Screen Background Image',
				'name' => 'options_login_bg',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_61096bc360d5e',
				'label' => 'Button Color',
				'name' => 'options_login_btn_color',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '#006799',
			),
			array(
				'key' => 'field_61096bee60d5f',
				'label' => 'Button Hover Color',
				'name' => 'options_login_btn_color_h',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '#008ec2',
			),
			
			
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'themes-settings',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
endif;


// Admin settings
function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    // Quick Press Widget

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //
	// remove plugin dashboard boxes
	// unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);        // Yoast's SEO Plugin Widget
}
add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets' );

function ad_login_footer() { $ref = wp_get_referer(); if ($ref) : ?>
<script type="text/javascript">
	jQuery(document).ready(function($){
			jQuery("p#backtoblog a").attr("href", 'https://digitalpolygon.com/');
			jQuery("p#backtoblog a").empty();
	});
</script>
<?php endif; }
add_action('login_footer', 'ad_login_footer');

function origo_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Designed & developed by <a href="https://digitalpolygon.com/" style="color:#f47c30">Digital Polygon</a>', 'kidseatincolor' );
}
add_filter( 'admin_footer_text', 'origo_custom_admin_footer' );


function kidseat_option_global_timber_context( $context ) {
	$context['options'] = get_fields('option');
	return $context;
}
add_filter( 'timber_context', 'kidseat_option_global_timber_context'  );
$data['acf_fields'] = new Timber\PostQuery( get_field('acf_fields', 'option') );


// Disable default editer from page


function kidspage_prefix_disable_gutenberg($current_status, $post_type)
{
	// Use your post type key instead of 'product'
	if ($post_type === 'page') return false;
	return $current_status;
}
add_filter('use_block_editor_for_post_type', 'kidspage_prefix_disable_gutenberg', 10, 2);

function KEIC_product_short_description_label_change( $translation, $original ) {
	if ( 'Product short description' == $original ) {
		return 'Product Description';
	}

	if ( 'Product categories' == $original ) {
		return 'Product Categories';
	}
	if ( 'Product tags' == $original ) {
		return 'Product Tags';
	}
	if ( 'Product image' == $original ) {
		return 'Product Image';
	}
	if ( 'Product gallery' == $original ) {
		return 'Product Gallery';
	}
	if( is_cart() && $original == 'Cart totals' ){
		return 'Summary';
	}

	return $translation;
}
add_filter( 'gettext', 'KEIC_product_short_description_label_change', 10, 2 );

// shove YOAST settings panel in editor to bottom 
add_filter( 'wpseo_metabox_prio', function() { return 'low'; } );

//Blog listing
add_action('wp_ajax_bloglisting_filter', 'blog_listing_ajax_data'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_bloglisting_filter', 'blog_listing_ajax_data');

function blog_listing_ajax_data() {
	global $wp_query;

	$paged = isset($_GET['paged']) ? $_GET['paged'] : 1;
	$per_page = 9;
	$recipe_cat = 29;
	$term_type = ($_GET['term'] == 'category') ? $_GET['blogCatTerms'] : $_GET['blogTagTerms'];
	$selectTerm = ($_GET['selectCat']) ? $_GET['selectCat'] : $_GET['selectTag']; 
	$exclude_cat = ($_GET['term'] == 'category') ? $recipe_cat : ''; //Recipes

	$selectedCat = [];
	$selectedCat[] = [
		'taxonomy' => $_GET['term'],
		'terms' => $selectTerm
	];

	$tax_args = [];

	if( isset( $term_type ) && $term_type != '' ) { 
		$tax_args[] = [
			'taxonomy' => $_GET['term'],
			'field'    => 'slug',
			'terms'    => $term_type
		];
	}	
	if(isset($_GET['keyword-search']) && $_GET['keyword-search'] != '' ) { 
		$search = sanitize_text_field( $_GET['keyword-search'] ); 
		$args = [
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'category__not_in' => $exclude_cat,
			's'                => $search,
			'posts_per_page'   => $per_page, 
		];
	} else {
		$args = [
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'category__not_in' => $exclude_cat, // Exclude recipe catagories from post/ blog
			'posts_per_page'   => $per_page,
			'meta_query'       => [
				'relation' => 'OR',
				$term_type
			],
		];
	}

	//Recipes
	if($_GET['term'] == 'post_tag'){
		$args['cat'] = $recipe_cat;
	}

	//Load inline product promos
	$args_promos = [
		'post_type'       => 'inline-product-promo',
		'post_status'     => 'publish',
		'posts_per_page'  => 1, //Just show one and
		'paged' 		  => $paged,// if they paged show the next one
	];

	if(count($tax_args)>0){
		$args['tax_query'] = ['relation' => 'AND',$tax_args];
		//Inline product promo
		$args_promos['meta_key'] = $_GET['term'];
		$args_promos['meta_value'] = get_category_by_slug($term_type)->term_id;
	}else{
		$args['tax_query'] = ['relation' => 'AND', $selectedCat];
		//Inline product promo
		$args_promos['meta_query'] = [['key' => $_GET['term'], 'value' => $selectTerm, 'compare' => 'IN']];
	}

	//Pagination
	$args['paged'] = $paged;

	$query = new WP_Query( $args );
	$inline_product_promo = new WP_Query($args_promos);

	//print_r($args);
	//exit();

	ob_start();

	if( $query->have_posts() ):
	
		$i = 1;
		while($query->have_posts() ): $query->the_post();
		  	$thumbnail = get_the_post_thumbnail($post->ID, 'full');
			?>
			<div class="bloglisting-block">
				<div class="post-block">
					<a href="<?= get_permalink()?>">
						<?= ($thumbnail) ? $thumbnail : '<img src="'.get_template_directory_uri().'/images/placeholder.png">'; ?>
						<h6><?= get_the_title() ?></h6>
					</a>
					<p><?= get_the_excerpt() ?></p>
					<p class="post-date"><?= get_the_date('F Y'); ?></p>
				</div>
			</div>
			
			<?php //Load inline product promo ?>
			<?php if($i == 6 && $inline_product_promo->have_posts() ){ ?>
				<?php $promo_id = $inline_product_promo->post->ID; ?>
				<div class="inline-product-promo">
					<div class="promo-image">
						<div class="image-wrapper">
							<img src="<?= get_field('image', $promo_id)['url'] ?>">
						</div>
					</div>
					<div class="promo-content">
						<h3><?= get_the_title($promo_id) ?></h3>
						<?= get_field('description', $promo_id); ?>
						<a href="<?= get_field('cta', $promo_id)['url'] ?>" class="button primary-alt"><?= get_field('cta', $promo_id)['title']?></a>
					</div>
				</div>
			<?php } ?>

		<?php
		$i++; 
		endwhile;
		
		wp_reset_postdata();
	else : ?>
		<div class="result-error" role="alert">
			<svg width="100" height="100" viewBox="0 0 84 81" fill="#D7D81B" xmlns="http://www.w3.org/2000/svg">
			<path d="M42.0025 0C38.8617 0.00264262 35.7311 0.344142 32.6691 1.01812C33.031 2.23476 33.1288 3.51027 32.9565 4.765C32.7843 6.01973 32.3456 7.22674 31.6679 8.31067C30.9902 9.39461 30.0881 10.3322 29.0178 11.0649C27.9476 11.7976 26.7321 12.3096 25.4475 12.5691C26.2229 14.0933 26.5461 15.7947 26.3813 17.4851C26.2165 19.1754 25.5701 20.7889 24.5136 22.1471C23.4571 23.5052 22.0316 24.5552 20.3948 25.1809C18.7581 25.8065 16.9737 25.9835 15.2391 25.6922C15.2216 25.8019 15.21 25.9087 15.1866 26.0184C14.8856 27.4641 14.2286 28.8188 13.271 29.9683C12.3134 31.1179 11.0833 32.0287 9.68433 32.6239C8.28535 33.2192 6.75848 33.4815 5.2324 33.3886C3.70632 33.2958 2.22573 32.8506 0.915391 32.0906C-0.887156 40.2793 -0.014005 48.8054 3.41472 56.4959C6.84344 64.1864 12.6593 70.6635 20.062 75.036C27.4648 79.4085 36.0908 81.4616 44.7533 80.9129C53.4158 80.3641 61.6891 77.2404 68.4351 71.9716C75.181 66.7027 80.068 59.5476 82.4239 51.4907C84.7797 43.4337 84.4886 34.8707 81.5906 26.9798C78.6925 19.0889 73.33 12.2579 66.2407 7.42639C59.1513 2.59493 50.6836 0.000488385 42.0025 0V0Z"/>
			</svg>
			<h3>No results found <?= ($search) ? ' for: "'.$search.'"' : ''; ?></h3>
		</div>
	<?php 
	endif;

	$data = ob_get_contents();
	ob_end_clean();
	echo json_encode([
		"data" => $data,
		"rows_found" => $query->found_posts,
		"max_pages" => $query->max_num_pages,
		"current_page" => $paged, 
		"paged" => $paged + 1,
		"search" => $search ? true : false,
		"s" => $search,
		"debug" => '',
	]);
	die();
} // End Function Here

//Search pagination
add_action('wp_ajax_search_pagination', 'search_pagination_fn'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_search_pagination', 'search_pagination_fn');
function search_pagination_fn() {
	$s = isset($_GET['s']) ? $_GET['s'] : '';
	$current = isset($_GET['current']) ? $_GET['current'] : 1;
	$max = isset($_GET['max']) ? $_GET['max'] : 1;

	if($current < $max){
		$next = $current + 1;
	}else{
		$next = $max;
	}

	$args = array(
				'post_status'    => 'publish',
				'paged'          => $next,
				's'              => $s,
				'posts_per_page' => get_option('posts_per_page'), 
			);
    $query = query_posts($args);

	ob_start();

	foreach($query as $post){
		$id = $post->ID;
		?>
		<div class="tease-generic tease-<?= $id ?>" id="tease-<?= $id ?>">
			<div class="tease-thumbnail">
				<?php $thumb = (get_the_post_thumbnail_url($id)) ? get_the_post_thumbnail_url($id) : get_template_directory_uri().'/images/placeholder.png'; ?>
				<a href="<?= get_the_permalink($id); ?>">
					<img src="<?= $thumb; ?>" alt="<?= get_the_title($id) ?>"/>
				</a>
			</div>
			<div class="tease-content">
				<h4 class="text-left pl-0 text-with-cta">
					<a class="text-left pl-0 text-with-cta__heading" href="<?= get_the_permalink($id); ?>">
						<?= get_the_title($id) ?>
					</a>
				</h4>

				<?php 
					//if landing page
					if( have_rows('landing_page',$id) ):
						while ( have_rows('landing_page',$id) ) : the_row();
							if( get_row_layout() == 'lp_text_block' ):
								$text = get_sub_field('content_text_block',$id);
								break;
							endif;
						endwhile;
					endif;
				?>

				<?php if(get_the_excerpt($id)){ ?>
					<p data-text="excerpt"><?= get_the_excerpt($id) ?></p>
				<?php } elseif($text) { ?>
					<p data-text="text"><?= wp_trim_words( $text, 25, '') ?></p>
				<?php } elseif(get_field('hero_zone_description',$id)) { ?>
					<p data-text="hero"><?= get_field('hero_zone_description',$id) ?></p>					
				<?php } else { ?>
					<p data-text="content"><?= wp_trim_words( get_the_content($id), 25, '') ?></p>
				<?php } ?>
			</div>
		</div>
	<?php
	}
	wp_reset_postdata();
   
	$data = ob_get_contents();
	ob_end_clean();
	echo json_encode([
		"data"    => $data,
		"current" => $next,
		"s"       => $s,
		"debug"   => '',
	]);
	die();
}

// Archive pagination
add_action('wp_ajax_search_archive_pagination', 'search_archive_pagination_fn'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_search_archive_pagination', 'search_archive_pagination_fn');
function search_archive_pagination_fn() {
	
	$current = isset($_GET['current']) ? $_GET['current'] : 1;
	$max = isset($_GET['max']) ? $_GET['max'] : 1;

	if($current < $max){
		$next = $current + 1;
	}else{
		$next = $max;
	}

	$args = array(
				'post_type'=> 'post',
				'post_status'    => 'publish',
				'paged'          => $next,
				'posts_per_page' => get_option('posts_per_page'), 
			);
    $query = query_posts($args);

	ob_start();

	foreach($query as $post){
		$id = $post->ID;
		?>
		<div class="tease-generic tease-<?= $id ?>" id="tease-<?= $id ?>">
			<div class="tease-thumbnail">
				<?php $thumb = (get_the_post_thumbnail_url($id)) ? get_the_post_thumbnail_url($id) : get_template_directory_uri().'/images/placeholder.png'; ?>
				<a href="<?= get_the_permalink($id); ?>">
					<img src="<?= $thumb; ?>" alt="<?= strip_tags(get_the_title($id)) ?>"/>
				</a>
			</div>
			<div class="tease-content">
				<h4 class="text-left pl-0 text-with-cta">
					<a class="text-left pl-0 text-with-cta__heading" href="<?= get_the_permalink($id); ?>">
						<?= get_the_title($id) ?>
					</a>
				</h4>

				<?php 
					//if landing page
					if( have_rows('landing_page',$id) ):
						while ( have_rows('landing_page',$id) ) : the_row();
							if( get_row_layout() == 'lp_text_block' ):
								$text = get_sub_field('content_text_block',$id);
								break;
							endif;
						endwhile;
					endif;
				?>

				<?php if(get_the_excerpt($id)){ ?>
					<p data-text="excerpt"><?= get_the_excerpt($id) ?></p>
				<?php } elseif($text) { ?>
					<p data-text="text"><?= wp_trim_words( $text, 25, '') ?></p>
				<?php } elseif(get_field('hero_zone_description',$id)) { ?>
					<p data-text="hero"><?= get_field('hero_zone_description',$id) ?></p>					
				<?php } else { ?>
					<p data-text="content"><?= wp_trim_words( get_the_content($id), 25, '') ?></p>
				<?php } ?>
			</div>
		</div>
	<?php
	}
	wp_reset_postdata();
   
	$data = ob_get_contents();
	ob_end_clean();
	echo json_encode([
		"data"    => $data,
		"current" => $next,
		"debug"   => '',
	]);
	die();
}

// Custom color Add in text Editer

function kids_eat_in_mce4_options( $init ) {
	$default_colours = '
			"000000", "Black",
			"993300", "Burnt orange",
			"333300", "Dark olive",
			"003300", "Dark green",
			"003366", "Dark azure",
			"000080", "Navy Blue",
			"333399", "Indigo",
			"333333", "Very dark gray",
			"800000", "Maroon",
			"FF6600", "Orange",
			"808000", "Olive",
			"008000", "Green",
			"008080", "Teal",
			"0000FF", "Blue",
			"666699", "Grayish blue",
			"808080", "Gray",
			"FF0000", "Red",
			"FF9900", "Amber",
			"99CC00", "Yellow green",
			"339966", "Sea green",
			"33CCCC", "Turquoise",
			"3366FF", "Royal blue",
			"800080", "Purple",
			"999999", "Medium gray",
			"FF00FF", "Magenta",
			"FFCC00", "Gold",
			"FFFF00", "Yellow",
			"00FF00", "Lime",
			"00FFFF", "Aqua",
			"00CCFF", "Sky blue",
			"993366", "Brown",
			"C0C0C0", "Silver",
			"FF99CC", "Pink",
			"FFCC99", "Peach",
			"FFFF99", "Light yellow",
			"CCFFCC", "Pale green",
			"CCFFFF", "Pale cyan",
			"99CCFF", "Light sky blue",
			"CC99FF", "Plum",
			"FFFFFF", "White"
			';
	$custom_colours = '
		"31ABD1", "Color 1 name",
		"EB6131", "Color 2 name",
		"256E30", "Color 3 name",
		"D7D81B", "Color 4 name",
		"604893", "Color 5 name",
		"E5391A", "Color 6 name",
		"474747", "Color 7 name",
		"313131", "Color 8 name",
		"807D79", "Color 9 name",
		"FFFFFF", "Color 10 name"
			';
	$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';
	$init['textcolor_rows'] = 8;
	return $init;
}
add_filter('tiny_mce_before_init', 'kids_eat_in_mce4_options');

function aa_custom_block_editor_palette () {
	add_theme_support(
		'editor-color-palette',
		[
			
			[
				'name'	=> __( 'Black', 'textdomain' ),
				'slug'	=> 'black',
				'color'	=> '#000000',
			],
			[
				'name'  => __( 'Yellow', 'textdomain' ),
				'slug'  => 'yellow',
				'color'	=> '#ffd000',
			],
			[
				'name'  => __( 'Blue', 'textdomain' ),
				'slug'  => 'blue',
				'color' => '#347ab7',
			],
			[
				'name'  => __( 'Green', 'textdomain' ),
				'slug'  => 'green',
				'color' => '#2e924d',
			],
			[
				'name'	=> __( 'Gray', 'textdomain' ),
				'slug'	=> 'gray',
				'color'	=> '#464646',
			],
			[
				'name'	=> __( 'Light Gray', 'textdomain' ),
					'slug'	=> 'lightgray',
					'color'	=> '#ebebeb',
			],
			[
				'name'  => esc_html__( 'Sky Blue', 'kidseatincolor' ),
				'slug'  => 'sky-blue',
				'color' => '#31ABD1',
			],
			[
				'name'  => esc_html__( 'Orange', 'kidseatincolor' ),
				'slug'  => 'orange',
				'color' => '#EB6131',
			],
			[
				'name'  => esc_html__( 'T Green', 'kidseatincolor' ),
				'slug'  => 'themegreen',
				'color' => '#256E30',
			],
			[
				'name'  => esc_html__( 'Olnav', 'kidseatincolor' ),
				'slug'  => 'olnav',
				'color' => '#D7D81B',
			],
			[
				'name'  => esc_html__( 'Purple Dark', 'kidseatincolor' ),
				'slug'  => 'purple-dark',
				'color' => '#604893',
			],
			[
				'name'  => esc_html__( 'Red', 'kidseatincolor' ),
				'slug'  => 'red',
				'color' => '#E5391A',
			],
			[
				'name'  => esc_html__( 'T Gray', 'kidseatincolor' ),
				'slug'  => 'themegray',
				'color' => '#474747',
			],
			[
				'name'  => esc_html__( 'Gray-slate', 'kidseatincolor' ),
				'slug'  => 'gray-slate',
				'color' => '#313131',
			],
			[
				'name'  => esc_html__( 'Friar-gray', 'kidseatincolor' ),
				'slug'  => 'friar-gray',
				'color' => '#807D79',
			],
			[
				'name'  => esc_html__( 'White', 'kidseatincolor' ),
				'slug'  => 'white',
				'color' => '#FFFFFF',
			],

		]
	);
}
add_action( 'after_setup_theme', 'aa_custom_block_editor_palette' );

//Editor css   
function keic_editor_style() {
	wp_enqueue_style( 'editor-style', get_theme_file_uri( 'style-editor.css' ) );
}
add_action( 'enqueue_block_editor_assets', 'keic_editor_style', 2);

//Enable excerpt
add_post_type_support( 'page', 'excerpt' );

function get_primary_category($category){
  $useCatLink = true;
  // If post has a category assigned.
  if ($category){
    $category_display = '';
    $category_link = '';
    if ( class_exists('WPSEO_Primary_Term') )
    {
      // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
      $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
      $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
      $term = get_term( $wpseo_primary_term );
      if (is_wp_error($term)) {
        // Default to first category (not Yoast) if an error is returned
        $category_display = $category[0]->name;
        $category_link = get_category_link( $category[0]->term_id );
      } else {
        // Yoast Primary category
        $category_display = $term->name;
        $category_link = get_category_link( $term->term_id );
      }
    }
    else {
      // Default, display the first category in WP's list of assigned categories
      $category_display = $category[0]->name;
      $category_link = get_category_link( $category[0]->term_id );
    }
    // Display category
    if ( !empty($category_display) ){
      if ( $useCatLink == true && !empty($category_link) ){
      return '<div class="tags-block  mobile-only"><a class="button-base" href="'.$category_link.'">'.htmlspecialchars($category_display).'</a></div>';
      } else {
      return '<span class="post-category">'.htmlspecialchars($category_display).'</span>';
      }
    }
  }
}