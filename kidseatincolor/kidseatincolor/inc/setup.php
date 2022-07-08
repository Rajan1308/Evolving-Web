<?php
/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * If you are installing Timber as a Composer dependency in your theme, you'll need this block
 * to load your dependencies and initialize Timber. If you are using Timber via the WordPress.org
 * plug-in, you can safely delete this block.
 */
$composer_autoload = __DIR__ . '/vendor/autoload.php';
if ( file_exists( $composer_autoload ) ) {
  require_once $composer_autoload;
  $timber = new Timber\Timber();
}

/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

  add_action(
    'admin_notices',
    function() {
      echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
    }
  );

  add_filter(
    'template_include',
    function( $template ) {
      return get_stylesheet_directory() . '/static/no-timber.html';
    }
  );
  return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Timber\Site {
  /** Add timber support. */
  public function __construct() {
    add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
    add_filter( 'timber/context', array( $this, 'add_to_context' ) );
    add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
    add_action( 'init', array( $this, 'register_post_types' ) );
    add_action( 'init', array( $this, 'register_taxonomies' ) );

    add_action('init', [$this, 'registerMenus']);
    add_action('wp_enqueue_scripts', array($this, 'enqueueAssets'));

    parent::__construct();
  }
  /** This is where you can register custom post types. */
  public function register_post_types() {

  }
  /** This is where you can register custom taxonomies. */
  public function register_taxonomies() {

  }

  /** This is where you add some context
   *
   * @param string $context context['this'] Being the Twig's {{ this }}.
   */
  public function add_to_context( $context ) {
    $context['foo']   = 'bar';
    $context['stuff'] = 'I am a value set in your functions.php file';
    $context['notes'] = 'These values are available everytime you call Timber::context();';
    $context['menu']  = new Timber\Menu();
    $context['site']  = $this;

    $context['primaryMenu'] = new TimberMenu('primary');
    $context['topBarMenu'] = new TimberMenu('top_bar');
    $context['footerColOneMenu'] = new TimberMenu('footer_col_1');
    $context['footerColTwoMenu'] = new TimberMenu('footer_col_2');
    $context['footerColThreeMenu'] = new TimberMenu('footer_col_3');
    $context['footerColFourMenu'] = new TimberMenu('footer_col_4');
    $context['footerColFiveMenu'] = new TimberMenu('footer_col_5');
    $context['footerColSixMenu'] = new TimberMenu('footer_col_6');
    $context['footerMenu'] = new TimberMenu('footer');
    return $context;
  }

  public function theme_supports() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
      'html5',
      array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support(
      'post-formats',
      array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
      )
    );

    add_theme_support( 'menus' );
  }

  /** BEM function to pass in bem style classes.
   *
   */
  public function bem($context, $base_class, $modifiers = array(), $blockname = '', $extra = array()) {
    $classes = [];

    // Add the ability to pass an object as the one and only argument.
    if (is_object($base_class) || is_array($base_class)) {
      $object = (object) $base_class;
      unset($base_class);
      $map = [
        'block' => 'base_class',
        'element' => 'blockname',
        'modifiers' => 'modifiers',
        'extra' => 'extra',
      ];
      foreach ($map as $object_key => $arg_key) {
        if (isset($object->$object_key)) {
          $$arg_key = $object->$object_key;
        }
      }
    }

    // Ensure array arguments.
    if (!empty($modifiers) && !is_array($modifiers)) {
      $modifiers = [$modifiers];
    }
    if (!is_array($extra)) {
      $extra = [$extra];
    }

    // If using a blockname to override default class.
    if ($blockname) {
      // Set blockname class.
      $classes[] = $blockname . '__' . $base_class;
      // Set blockname--modifier classes for each modifier.
      if (isset($modifiers) && is_array($modifiers)) {
        foreach ($modifiers as $modifier) {
          $classes[] = $blockname . '__' . $base_class . '--' . $modifier;
        };
      }
    }
    // If not overriding base class.
    else {
      // Set base class.
      $classes[] = $base_class;
      // Set base--modifier class for each modifier.
      if (isset($modifiers) && is_array($modifiers)) {
        foreach ($modifiers as $modifier) {
          $classes[] = $base_class . '--' . $modifier;
        };
      }
    }
    // If extra non-BEM classes are added.
    if (isset($extra) && is_array($extra)) {
      foreach ($extra as $extra_class) {
        $classes[] = $extra_class;
      };
    }
    $attributes = 'class="' . implode(' ', $classes) . '"';
    return $attributes;
  }

  /**
   * Add Attributes function to pass in multiple attributes including bem style classes.
   */
  public function add_attributes( $context, $additional_attributes = [] ) {
    $attributes = [];

    if ( ! empty( $additional_attributes ) ) {
      foreach ( $additional_attributes as $key => $value ) {
        // If there are multiple items in $value as array (e.g., class: ['one', 'two']).
        if ( is_array( $value ) ) {
          $attributes[] = ( $key . '="' . implode( ' ', $value ) . '"' );
        } else {
          // Handle bem() output (pass in exactly the result).
          if ( strpos( $value, '=' ) !== false ) {
            $attributes[] = $value;
          } else {
            $attributes[] = ( $key . '="' . $value . '"' );
          }
        }
      }
    }

    return implode( ' ', $attributes );
  }


  /** This is where you can add your own functions to twig.
   *
   * @param string $twig get extension.
   */
  public function add_to_twig( $twig ) {
    $twig->addExtension( new Twig\Extension\StringLoaderExtension() );
    $twig->addFunction( new Twig_SimpleFunction('bem', array($this, 'bem'), array('needs_context' => true), array('is_safe' => array('html'))) );
    $twig->addFunction( new Twig_SimpleFunction('add_attributes', array($this, 'add_attributes'), array('needs_context' => true), array('is_safe' => array('html'))) );
    return $twig;
  }

  /**
 * Load our assets into WP
 */
  public function enqueueAssets() {
    // wp_deregister_script('jquery');
    
    // Bootstrap minify css lib
    wp_enqueue_style('kidseat-css', get_template_directory_uri() . '/assets/vendor/kidseat-minify.css', [], null, 'all');
    // Bootstrap minify jslib
    wp_enqueue_script('storybook-lib', get_template_directory_uri() . '/.storybook/_attach.js', [], null, false);
    wp_enqueue_script('kidseat-lib', get_template_directory_uri() . '/assets/vendor/kidseat-minify.js', [], null, true);
    wp_enqueue_script('kidseat-script', get_template_directory_uri() . '/assets/vendor/kidseat-script.js', [], null, true);
    wp_localize_script( 'kidseat-script', 'ajax_url', admin_url('admin-ajax.php') );
    #wp_enqueue_script('kidseat-lib');
    #wp_enqueue_script( 'kidseat-script' );
    
    //Load css on focus ld
    if(learndash_is_valid_post_type(get_post_type( get_the_ID() ))){
      wp_enqueue_style('kidseat-dist', get_template_directory_uri() . '/dist/style.css', [], null, 'all');
    }
  }

/**
 * Set up custom menus
 */
public function registerMenus()
{
    register_nav_menus([
        'top_bar' => __('Top Bar'),
        'primary' => __('Primary'),
        'footer_col_1' => __('Footer Column 1'),
        'footer_col_2' => __('Footer Column 2'),
        'footer_col_3' => __('Footer Column 3'),
        'footer_col_4' => __('Footer Column 4'),
        'footer_col_5' => __('Footer Column 5'),
        'footer_col_6' => __('Footer Column 6'),
        'footer' => __('Footer'),
        
    ]);
}


















}

new StarterSite();

// Namespaces
add_filter('timber/loader/loader', function($loader){
  $loader->addPath(__DIR__ . "/../components/01-atoms", "atoms");
  $loader->addPath(__DIR__ . "/../components/02-molecules", "molecules");
  $loader->addPath(__DIR__ . "/../components/03-organisms", "organisms");
  $loader->addPath(__DIR__ . "/../components/04-templates", "templates");
  return $loader;
});


// Custom Post Block setup in theme Inline Form

function newsletter_post_block() {
  if ( ! function_exists( 'acf_register_block' ) ) {
    return;
  }
  acf_register_block( array(
    'name'            => 'newsletter_block',
    'title'           => __( 'Inline Form', 'kidseatincolor' ),
    'description'     => __( 'A custom inline Form.', 'kidseatincolor' ),
    'render_callback' => 'my_acf_block_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'newsletter' ),
  ) );
  // Popup Setup
  acf_register_block( array(
    'name'            => 'kidspopup_block',
    'title'           => __( 'Popup Setup', 'kidseatincolor' ),
    'description'     => __( 'A Popup Setup', 'kidseatincolor' ),
    'render_callback' => 'kidspopup_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'popup' ),
  ) );
  // Inline Block
  acf_register_block( array(
    'name'            => 'inlinecta_block',
    'title'           => __( 'Inline CTA', 'kidseatincolor' ),
    'description'     => __( 'A Inline CTA', 'kidseatincolor' ),
    'render_callback' => 'inlinecta_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'inlinecta' ),
  ) );

  // Ads Space
  acf_register_block( array(
    'name'            => 'adspace_block',
    'title'           => __( 'Ad Space', 'kidseatincolor' ),
    'description'     => __( 'A Ad Space', 'kidseatincolor' ),
    'render_callback' => 'adspace_render_callback',
    'category'        => 'formatting',
    'icon'            => 'admin-comments',
    'keywords'        => array( 'adsspace' ),
  ) );

}
add_action( 'acf/init', 'newsletter_post_block' );

// Render Callback - Inline Form Block
function my_acf_block_render_callback( $block, $content = '', $is_preview = false ) {
	$context = Timber::context();
	$context['block'] = $block;
	$context['fields'] = get_fields();
	$context['is_preview'] = $is_preview;
	Timber::render( 'templates/blocks/acf/newsletter-block.twig', $context );
}
// Render Callback - Pull Quote
function kidspopup_render_callback( $block, $content = '', $is_preview = false ) {
	$context = Timber::context();
	$context['block'] = $block;
  $context['fields'] = get_fields();
	$context['is_preview'] = $is_preview;
  Timber::render( 'templates/blocks/acf/popup-block.twig', $context );
}

// Render Callback - Inline Block
function inlinecta_render_callback( $block, $content = '', $is_preview = false ) {
	$context = Timber::context();
	$context['block'] = $block;
	$context['fields'] = get_fields();
	$context['is_preview'] = $is_preview;
  Timber::render( 'templates/blocks/acf/inlinecta-block.twig', $context );
}

// Ads Space
function adspace_render_callback( $block, $content = '', $is_preview = false ) {
	$context = Timber::context();
	$context['block'] = $block;
	$context['fields'] = get_fields();
	$context['is_preview'] = $is_preview;
  Timber::render( 'templates/blocks/acf/adspace-block.twig', $context );
}


function print_page(){
  ?>
  
  <script>
    jQuery(document).on('click', '.printdiv-btn', function(e) {
      e.preventDefault();
      const $this = jQuery(this);
      const originalContent = jQuery('body').html();
      const printArea = $this.parents('#leftcontainer').html();
      
      jQuery('body').html(printArea);
      window.print();
      jQuery('body').html(originalContent);
    });

  </script>
  <?php
}
add_action( 'wp_head', 'print_page' );


//Hide the "Settings → ActiveCampaign" menu.
function plt_hide_activecampaign_subscription_forms_menus() {
	
	remove_submenu_page('options-general.php', 'activecampaign');
  add_menu_page(__("ActiveCampaign Settings", "menu-activecampaign"), 
  __("ActiveCampaign", "menu-activecampaign"), 
  "manage_options", 
  "activecampaign", 
  "activecampaign_plugin_options",
  "dashicons-rest-api",
  2
);

}

add_action('admin_menu', 'plt_hide_activecampaign_subscription_forms_menus', 11);


function change_breadcrumb_names($links ) {
  // print_r($links);
  global $post; 
  $blog_listing_page = get_field('blog_listing_page', 'options');
  $recipe_listing_page = get_field('recipe_listing_page', 'options');
  if( $post->post_type == 'post' && get_the_category( $id )[0]->name== 'Recipe') {
    $breadcrumb[] = array(
      'url' => $recipe_listing_page['url'],
      'text' => $recipe_listing_page['title'],
      'allow_html' => 1
    );
    array_splice( $links, 1, -2, $breadcrumb );
  } elseif( $post->post_type == 'post' && get_the_category( $id )[0]->name != 'Recipe') {
    $breadcrumb[] = array(
      'url' => $blog_listing_page['url'],
      'text' => $blog_listing_page['title'],
      'allow_html' => 1
    );
    array_splice( $links, 1, -2, $breadcrumb );
  }
  elseif ($post->post_type == 'product' && $links[1]['text'] == 'Products') {
    $links[1]['text'] = 'Shop';
    $links[1]['url'] = str_replace('/products', '/shop', $links[1]['url']);
    $links[1]['allow_html'] = 1;
  }
  elseif ($post->post_type == 'course' && $links[1]['text'] == 'Courses') {
    $links[1]['text'] = 'Courses';
    $links[1]['url'] = str_replace('/course', '/shop-courses', $links[1]['url']);
    $links[1]['allow_html'] = 1;
  }
  return $links;
}
add_filter('wpseo_breadcrumb_links', 'change_breadcrumb_names');

function account_dynamic_menu_item_label( ) { 
	if ( ! is_user_logged_in() ) { ?>
    <script>jQuery(".main-menu__link--useraccount").text(function ($) {
      return jQuery(this).text().replace("Account", "Login"); 
    });</script>
	<?php } 
 } 
 add_filter( 'wp_footer', 'account_dynamic_menu_item_label');
 

// Custom Robots txt setup
function keic_custom_robots_txt($output, $public) {
  $robots_txt  =  "User-agent: * \n";
  $robots_txt .=  "Disallow: /wp-admin/ \n";
  $robots_txt .=  "Allow: /wp-admin/admin-ajax.php \n";
  $robots_txt .=  "Disallow: /*.pdf \n";
  return $robots_txt;
}
add_filter('robots_txt', 'keic_custom_robots_txt', 10,  2);
