<?php

/**
 * halim option page
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}


function acf_css() {
?>
  <style>
    .header-top {
      background-color: <?php the_field('top_header_bg', 'option'); ?>;
    }
  </style>
<?php
}
add_filter('wp_head', 'acf_css');

/**
 * Option Page
 */
add_action('acf/init', 'halim_acf_op_init');
function halim_acf_op_init() {

  // Check function exists.
  if (function_exists('acf_add_options_page')) {

    // Add parent.
    $parent = acf_add_options_page(array(
      'page_title'   => __('Halim Theme Settings', 'halim'),
      'menu_title'  => __('Halim Settings', 'halim'),
      'menu_slug'   => 'halim-settings',
      'capability'  => 'edit_posts',
      'redirect'    => true
    ));

    // Top Header Setting
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Top Header Settings', 'halim'),
      'menu_title'  => __('Top Header', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    //  Header Logo
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Header Logo', 'halim'),
      'menu_title'  => __('Header Logo', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    //  About Settings
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('About Settings', 'halim'),
      'menu_title'  => __('About Settings', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    //  FAQ and Skills
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('FAQ & Skills', 'halim'),
      'menu_title'  =>  __('FAQ & Skills', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    //  Services Settings
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Services Settings', 'halim'),
      'menu_title'  => __('Services Settings', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    //  Team Settings
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Team Settings', 'halim'),
      'menu_title'  => __('Team Settings', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    //  Testimonial Settings
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Testimonial Settings', 'halim'),
      'menu_title'  => __('Testimonial Settings', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    //  Latest News Settings
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Latest News Settings', 'halim'),
      'menu_title'  => __('Latest News Settings', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    // Call to Action
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Call to Action Settings', 'halim'),
      'menu_title'  => __('CAll to Action', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    // Contact
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Contact Settings', 'halim'),
      'menu_title'  => __('Contact', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));

    // Footer
    $child = acf_add_options_sub_page(array(
      'page_title'   => __('Footer Settings', 'halim'),
      'menu_title'  => __('Footer', 'halim'),
      'parent_slug'  => $parent['menu_slug'],
    ));
  }
}


// ACF Jason Save
add_filter('acf/settings/save_json', 'halim_acf_json_save_point');
function halim_acf_json_save_point($path) {

  // update path
  $path = get_stylesheet_directory() . '/inc/acf/acf-jason';


  // return
  return $path;
}


// ACF Jason Load
add_filter('acf/settings/load_json', 'halim_acf_json_load_point');
function halim_acf_json_load_point($paths) {

  // remove original path (optional)
  unset($paths[0]);


  // append path
  $paths[] = get_stylesheet_directory() . '/inc/acf/acf-jason';


  // return
  return $paths;
}
