<?php

/**
 * 
 * The template for displaying default pages.
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>

<!-- Breadcrumb Area -->
<?php get_template_part('/template-parts/content/content', 'breadcrumb'); ?>

<section class="blog-single pt-100 pb-100">
  <div class="container">
    <div class="row">

      <?php get_template_part('/template-parts/content/content'); ?>


      <?php if (is_active_sidebar('main-sidebar')) : ?>
        <div class="col-xl-4">
          <?php dynamic_sidebar('main-sidebar'); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>




<?php get_footer();
