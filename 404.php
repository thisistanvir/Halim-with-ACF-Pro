<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @package halim
 */
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}


get_header(); ?>


<section class="four-zero-four pt-100 pb-100">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="entry-title"><?php esc_html_e('The page can&rsquo;t be found.', 'halim'); ?></h1>
        <p><?php esc_html_e('It looks like nothing was found at this location.', 'halim'); ?></p>
        <a class="btn box-btn mt-4" href="<?php echo site_url(); ?>"><?php esc_html_e('Go Back to home', 'halim'); ?></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>