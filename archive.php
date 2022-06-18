<?php

/**
 * The template for displaying archive pages.
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>

<!-- Breadcrumb Area -->
<section class="breadcumb-area">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="breadcumb">
          <h4><?php the_archive_title(); ?></h4>
          <ul>
            <li><a href="<?php echo site_url(); ?>"><?php echo esc_html__('home', 'halim'); ?></a></li> /
            <li><?php the_archive_title(); ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Blog Area Start -->
<section class="blog-area pb-100 pt-100" id="blog">
  <div class="container">
    <div class="row">
      <?php get_template_part('/template-parts/content/content', 'excerpt'); ?>
    </div>
  </div>
</section>
<!-- Blog Area End -->

<?php get_footer(); ?>