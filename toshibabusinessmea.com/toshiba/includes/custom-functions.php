<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;
/*
 * Escape Tags & Slashes
 * Handles escapping the slashes and tags
 */

function toshiba_escape_attr($data) {
    return !empty($data) ? esc_attr(stripslashes($data)) : '';
}

/*
 * Strip Slashes From Array
 */

function toshiba_escape_slashes_deep($data = array(), $flag = true) {
    if ($flag != true) {
        $data = toshiba_nohtml_kses($data);
    }
    $data = stripslashes_deep($data);
    return $data;
}

/*
 * Strip Html Tags 
 * 
 * It will sanitize text input (strip html tags, and escape characters)
 */

function toshiba_nohtml_kses($data = array()) {
    if (is_array($data)) {
        $data = array_map(array($this, 'toshiba_nohtml_kses'), $data);
    } elseif (is_string($data)) {
        $data = wp_filter_nohtml_kses($data);
    }
    return $data;
}

/*
 * Display Short Content By Character
 */

function toshiba_excerpt_char($content, $length = 40) {
    $text = '';
    if (!empty($content)) {
        $text = strip_shortcodes($content);
        $text = str_replace(']]>', ']]&gt;', $text);
        $text = strip_tags($text);
        $excerpt_more = apply_filters('excerpt_more', ' ' . ' ...');
        $text = substr($text, 0, $length);
        $text = $text . $excerpt_more;
    }
    return $text;
}

/*
 * search in posts and pages
 */

function toshiba_filter_search($query) {
    if (!is_admin() && $query->is_search) {
        $query->set('post_type', array(TOSHIBA_POST_POST_TYPE, TOSHIBA_PAGE_POST_TYPE, TOSHIBA_EVENT_POST_TYPE, TOSHIBA_PRINTER_POST_TYPE, TOSHIBA_DEALER_POST_TYPE));
    }
    return $query;
}

add_filter('pre_get_posts', 'toshiba_filter_search');


/*
 * Remove wp logo from admin bar
 */

function toshiba_remove_wp_logo() {
    global $wp_admin_bar;

    if (class_exists('acf')) {
        $wp_help = get_field('toshiba_options_wp_help', 'option');
        if (empty($wp_help)) {
            $wp_admin_bar->remove_menu('wp-logo');
        }
    }
}

add_action('wp_before_admin_bar_render', 'toshiba_remove_wp_logo');

/*
 * Custom login logo
 */

function toshiba_custom_login_logo() {
    if (class_exists('acf')) {
        $wp_login_logo = get_field('toshiba_options_login_logo', 'option');
        $wp_login_w = get_field('toshiba_options_login_logo_w', 'option');
        $wp_login_h = get_field('toshiba_options_login_logo_h', 'option');
        $wp_login_bg = get_field('toshiba_options_login_bg', 'option');
        $wp_login_btn_c = get_field('toshiba_options_login_btn_color', 'option');
        $wp_login_btn_c_h = get_field('toshiba_options_login_btn_color_h', 'option');
        if (!empty($wp_login_logo)) {
            ?>
            <style type="text/css">
                .login h1 a {
                    background-image: url('<?php echo $wp_login_logo; ?>') !important;
                    background-size: <?php echo $wp_login_w . 'px'; ?> auto !important;
                    height: <?php echo $wp_login_h . 'px'; ?> !important;
                    width: <?php echo $wp_login_w . 'px'; ?> !important;
                }
            </style>
            <?php
        }
        if (!empty($wp_login_bg)) {
            ?>
            <style type="text/css">
                body.login{ background: #133759 url("<?php echo $wp_login_bg; ?>") no-repeat center; background-size: cover;}
                body.login div#login form#loginform input#wp-submit {background-color: <?php echo $wp_login_btn_c; ?> !important;}
                body.login div#login form#loginform input#wp-submit:hover {background-color: <?php echo $wp_login_btn_c_h; ?> !important;}
            </style>
            <?php
        }
    }
}

add_action('login_enqueue_scripts', 'toshiba_custom_login_logo');

/*
 * Change custom login page url
 */

function toshiba_loginpage_custom_link() {
    $site_url = esc_url(home_url('/'));
    return $site_url;
}

add_filter('login_headerurl', 'toshiba_loginpage_custom_link');

/*
 * Change title on logo
 */

function toshiba_change_title_on_logo() {
    $site_title = get_bloginfo('name');
    return $site_title;
}

add_filter('login_headertitle', 'toshiba_change_title_on_logo');

/*
 * Change admin your favicon
 */

function toshiba_admin_favicon() {
    if (class_exists('acf')) {
        $favicon_url = get_field('toshiba_options_wp_favicon', 'option');
        if (!empty($favicon_url)) {
            echo '<link rel="icon" type="image/x-icon" href="' . $favicon_url . '" />';
        }
    }
}

add_action('login_head', 'toshiba_admin_favicon');
add_action('admin_head', 'toshiba_admin_favicon');

/*
 * add filter to add shortcode in widget
 */
add_filter('widget_text', 'do_shortcode');
/*
 * get contrast color for banner(black/white)
 */

function getContrastColor($hexcolor) {
    $r = hexdec(substr($hexcolor, 1, 2));
    $g = hexdec(substr($hexcolor, 3, 2));
    $b = hexdec(substr($hexcolor, 5, 2));
    $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
    return ($yiq >= 128) ? 'black' : 'white';
}

/*
 * add dynamic color to print management template pages
 */
add_action('wp_head', 'dynamic_bg_color_function');

function dynamic_bg_color_function() {
    $page_id = get_the_ID();
    if (class_exists('acf')) {
        $features_bg_color = get_field('toshiba_pm_f_features_bg_color', $page_id);
        $features_img_bg_color = get_field('toshiba_pm_f_features_img_bg_color', $page_id);
        $benifits_bg_color = get_field('toshiba_pm_b_benifits_bg_color', $page_id);
        ?>
        <style>
            <?php if($features_bg_color): ?>
            .features_wrap:after {background-color: <?php echo $features_bg_color; ?>;}
            <?php endif; ?>
            <?php if($features_img_bg_color): ?>
            section.features_section .right-bg {background-color: <?php echo $features_img_bg_color; ?>;}
            <?php endif; ?>
            <?php if($benifits_bg_color): ?>
            .your_benifit_sec:before{ background-color: <?php echo $benifits_bg_color; ?>; }
            <?php endif; ?>
            <?php if($benifits_bg_color): ?>
            .your_benifit_sec{background-color: <?php echo $benifits_bg_color; ?>; }
            <?php endif; ?>
        </style>
        <?php
    }
}
/*
 * Folder name first
 * than file name where plugin information store
 */
add_filter( 'auto_update_plugin', '__return_false' );
function image_hotspot_plugin_updates($value) {
	if (isset($value->response['devvn-image-hotspot/devvn-image-hotspot.php'])) {
		unset($value->response['devvn-image-hotspot/devvn-image-hotspot.php']);
	}
	return $value;
}
add_filter( 'site_transient_update_plugins', 'image_hotspot_plugin_updates' ); 
/*
 * Redirect to thankyou page
 */ 
//add_action( 'wp_footer', 'redirect_cf7' );
 
function redirect_cf7() {
?>
<script type="text/javascript">
//document.addEventListener( 'wpcf7mailsent', function( event ) {
//       location = 'https://nexatestwp.com/toshiba/thank-you/';
//}, false );
</script>
<?php
}


add_filter( 'wp_headers', 'browsers_address_bar' );

function browsers_address_bar( $headers ) {
    if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {
        $headers['X-UA-Compatible'] = 'IE=edge,chrome=1';
    }
    
    return $headers;
}


add_action( 'after_setup_theme', 'register_sitemap' );
function register_sitemap() {
  register_nav_menu( 'SiteMap Menu', __( 'SiteMap Menu', 'toshiba' ) );
}

function custom_sitemap_menu() {
    ob_start();
    wp_nav_menu(array(
        'menu' => 'SiteMap Menu',
        'theme_location' => 'SiteMap Menu',
        'container_class' => 'sitemap_menus',
            )
    );
    return ob_get_clean();
}
add_shortcode('CustomSiteMapMenu', 'custom_sitemap_menu');

add_filter( 'style_loader_src',  'sdt_remove_ver_css_js', 9999, 2 );
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999, 2 );
function sdt_remove_ver_css_js( $src, $handle ) 
{
    $handles_with_version = [ 'style' ]; // <-- Adjust to your needs!

    if ( strpos( $src, 'ver=' ) && ! in_array( $handle, $handles_with_version, true ) )
        $src = remove_query_arg( 'ver', $src );

    return $src;
}


 
/*
 * function for getting posts
 */
function getPostsByParam($post_type = 'post' , $posts_per_page = 10 , $current_page = 1, $tax_query = NULL, $meta_query = NULL) {
    $args = array(
        'post_type' => $post_type,
        'status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'paged' => $current_page
    );
    if(!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }
    if(!empty($meta_query)) {
        $args['meta_query'] = $meta_query;
    }
    $query = new WP_Query($args);
    return $query;
}


// Guidelines
function myplugin_add_login_fields() {
    ?> 
    <script>jQuery('#loginform').attr('autocomplete', 'off');</script>
    <?php
}
add_action( 'login_form', 'myplugin_add_login_fields' );



//Revoke all the sessions when the user logged out or changed the password.
//Revoke all the sessions when the user logged out or changed the password.
function revoke_sessions_when_user_logout() {
 
    
    wp_destroy_current_session();
    wp_clear_auth_cookie();
    wp_set_current_user( 0 );

 }
 add_action( 'wp_logout', 'revoke_sessions_when_user_logout' );

add_action('wp_logout', function () {
  array_map(function ($k) {
    setcookie($k, FALSE, time()-YEAR_IN_SECONDS, '', COOKIE_DOMAIN);
  }, array_keys($_COOKIE));
  // Redirect to 'siteurl' since by default WordPress redirects to its login
  // URL, which actually sets a new cookie
  header('Location: '.get_option('siteurl'));
  exit();
}, 99999);

add_filter('auth_cookie_expiration', 'after_20_minutes_user_automatic_logout',10,3);
function after_20_minutes_user_automatic_logout($expiry, $user_id, $remember) {
  return 12000; // 20(1200) minutes; 200(12000) minutes
}




//code to validate textarea
function custom_textarea_validation_filter($result, $tag) {  
      $type = $tag['type'];  
      $name = $tag['name'];
      //here textarea type name is 'message'
     if($name == 'toshiba_career_message' || $name == 'toshiba_contact_msg' || $name == 'toshiba_service_note' || $name == 'toshiba_sales_msg' || $name == 'dealer_enq_msg' ) { 
          $value = $_POST[$name];  
          if (preg_match('/[\'^£$%&*()}{@#~><>|=_+¬]/', $value)){
            $result->invalidate( $tag, "Invalid characters." );
          } 
      }
      return $result;  
}
add_filter('wpcf7_validate_textarea','custom_textarea_validation_filter', 10, 2); 
add_filter('wpcf7_validate_textarea*', 'custom_textarea_validation_filter', 10, 2); 


function defer_parsing_of_js( $url ) {
    if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );


add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);


