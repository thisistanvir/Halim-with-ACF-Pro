<?php

/**
 * halim functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

if (!defined('HALIM_THEME_VERSION')) {
   // Replace the version number of the theme on each release.
   define('HALIM_THEME_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if (!function_exists('halim_theme_supports')) :
   function halim_theme_supports() {
      /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
      load_theme_textdomain('halim', get_template_directory() . '/languages');

      // Add default posts and comments RSS feed links to head.
      add_theme_support('automatic-feed-links');

      /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
      add_theme_support('post-formats', array(
         'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
      ));

      /*
		* Enable support for Post Thumbnails on posts and pages.
		*/
      add_theme_support('post-thumbnails');

      /*
		* Let WordPress manage the document title.
		*/
      add_theme_support('title-tag');

      /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
      add_theme_support(
         'html5',
         array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
         )
      );

      // Set up the WordPress core custom background feature.
      add_theme_support(
         'custom-background',
         apply_filters(
            'demo_custom_background_args',
            array(
               'default-color' => 'ffffff',
               'default-image' => '',
            )
         )
      );

      // Add theme support for selective refresh for widgets.
      add_theme_support('customize-selective-refresh-widgets');

      // This theme uses wp_nav_menu() in one location.
      register_nav_menus(
         [
            'main-menu'   => __('Primary menu', 'halim'),
         ]
      );
   }
endif;
add_action('after_setup_theme', 'halim_theme_supports');

/**
 * Enqueue scripts and styles.
 */
function halim_theme_files() {
   wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700', [], '1.0', 'all');
   wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], '1.0', 'all');
   wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', [], '1.0', 'all');
   wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', [], '1.0', 'all');
   wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', [], '1.0', 'all');
   wp_enqueue_style('halim-main', get_template_directory_uri() . '/assets/css/style.css', [], HALIM_THEME_VERSION, 'all');
   wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css', [], HALIM_THEME_VERSION, 'all');
   wp_enqueue_style('halim-style', get_stylesheet_uri());


   wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', ['jquery'], '1.0', true);
   wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', ['jquery'], '1.0', true);
   wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', ['jquery'], '1.0', true);
   wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', ['jquery'], '1.0', true);
   wp_enqueue_script('isotope', get_template_directory_uri() . '/assets/js/isotope.min.js', ['jquery'], '1.0', true);
   wp_enqueue_script('imageloaded', get_template_directory_uri() . '/assets/js/imageloaded.min.js', ['jquery'], '1.0', true);
   wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', ['jquery'], '1.0', true);
   wp_enqueue_script('waypoint', get_template_directory_uri() . '/assets/js/waypoint.min.js', ['jquery'], '1.0', true);
   wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], HALIM_THEME_VERSION, true);
}
add_action('wp_enqueue_scripts', 'halim_theme_files');



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function halim_widgets_init() {
   register_sidebar(
      array(
         'name'          => esc_html__('Main Sidebar', 'halim'),
         'id'            => 'main-sidebar',
         'description'   => esc_html__('Add widgets here.', 'halim'),
         'before_widget' => '<div class="single-sidebar">',
         'after_widget'  => '</div>',
         'before_title'  => '<h4 class="widget-title">',
         'after_title'   => '</h4>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer One', 'halim'),
         'id'            => 'footer-1',
         'description'   => esc_html__('Add widgets here.', 'halim'),
         'before_widget' => '<div class="single-footer">',
         'after_widget'  => '</div>',
         'before_title'  => '<h4 class="widget-title">',
         'after_title'   => '</h4>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer Two', 'halim'),
         'id'            => 'footer-2',
         'description'   => esc_html__('Add widgets here.', 'halim'),
         'before_widget' => '<div class="single-footer">',
         'after_widget'  => '</div>',
         'before_title'  => '<h4 class="widget-title">',
         'after_title'   => '</h4>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer Three', 'halim'),
         'id'            => 'footer-3',
         'description'   => esc_html__('Add widgets here.', 'halim'),
         'before_widget' => '<div class="single-footer">',
         'after_widget'  => '</div>',
         'before_title'  => '<h4 class="widget-title">',
         'after_title'   => '</h4>',
      )
   );
   register_sidebar(
      array(
         'name'          => esc_html__('Footer Four', 'halim'),
         'id'            => 'footer-4',
         'description'   => esc_html__('Add widgets here.', 'halim'),
         'before_widget' => '<div class="single-footer">',
         'after_widget'  => '</div>',
         'before_title'  => '<h4 class="widget-title">',
         'after_title'   => '</h4>',
      )
   );
}
add_action('widgets_init', 'halim_widgets_init');



// excerpt length
function halim_excerpt_length($length) {
   return 20;
}
add_filter('excerpt_length', 'halim_excerpt_length', 999);

// post excerpt more
function halim_theme_excerpt_more($more) {
   return '...';
}
add_filter('excerpt_more', 'halim_theme_excerpt_more');




// custom comments form order
function halim_theme_comment_field($fields) {
   $comment = $fields['comment'];
   $author  = $fields['author'];
   $email   = $fields['email'];
   $url     = $fields['url'];
   $cookies = $fields['cookies'];

   unset($fields['comment']);
   unset($fields['author']);
   unset($fields['email']);
   unset($fields['url']);
   unset($fields['cookies']);

   $fields['author']  = $author;
   $fields['email']   = $email;
   $fields['url']     = $url;
   $fields['comment'] = $comment;
   $fields['cookies'] = $cookies;

   return $fields;
}
add_action('comment_form_fields', 'halim_theme_comment_field');


/**
 * One Click Demo Import
 */
function halim_import_files() {
   return array(
      array(
         'import_file_name'             => esc_html__('Halim Demo Import', 'halim'),
         'local_import_file'            => trailingslashit(get_template_directory()) . '/inc/demo-data/content.xml',
         'local_import_widget_file'     => trailingslashit(get_template_directory()) . '/inc/demo-data/widgets.wie',
         'local_import_customizer_file' => trailingslashit(get_template_directory()) . '/inc/demo-data/customize.dat',
         'import_preview_image_url'     => get_template_directory_uri() . '/screenshot.jpeg',
         'import_notice'                => esc_html__('After import demo, just set static homepage from settings > reading, Check widgets and menu. You will be done! :-)', 'halim'),
         // 'preview_url'                  => 'http://www.your_domain.com/my-demo-1',
      ),
   );
}
add_filter('ocdi/import_files', 'halim_import_files');




/**
 * ACF Options
 */
if (class_exists('ACF')) {
   include_once('inc/acf/acf-option.php');
   include_once('inc/acf/acf-data.php');
}

/**
 * Halim Widgets
 */
include_once('inc/widgets.php');


/**
 * TGM Plugin
 */
include_once('inc/class-tgm-plugin-activation.php');
include_once('inc/plugin-activator.php');
