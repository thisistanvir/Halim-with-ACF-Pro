<?php

/**
 * Template Name: Services Template
 * The template for displaying services pages.
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

get_header(); ?>

<!-- Breadcrumb Area -->
<?php get_template_part('/template-parts/content/content', 'breadcrumb'); ?>

<!-- Services Area Start -->
<section class="services-area pt-100 pb-50" id="services">
   <div class="container">

      <div class="row">

         <?php
         $args = [
            'posts_per_page' => -1,
            'post_type' => 'services',
            'order' => 'DESC'
         ];
         $service = new WP_Query($args);
         while ($service->have_posts()) : $service->the_post(); ?>

            <div class="col-lg-4 col-md-6">
               <!-- Single Service -->
               <div class="single-service">
                  <?php echo esc_html(the_field('service_icon')) ?>
                  <h4><?php the_title(); ?></h4>
                  <?php the_content(); ?>
               </div>
            </div>
         <?php endwhile;
         wp_reset_postdata(); ?>

      </div>
   </div>
</section>
<!-- Services Area End -->

<!-- CTA Area End -->
<?php get_footer(); ?>