<?php

/**
 * Template Name: Gallery Template
 * The template for displaying archive pages.
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

get_header(); ?>

<!-- Breadcrumb Area -->
<?php get_template_part('/template-parts/content/content', 'breadcrumb'); ?>

<section class="gallery-area pt-100 pb-100">
   <div class="container">
      <div class="row">
         <?php
         $args = [
            'posts_per_page' => -1,
            'post_type' => 'galleries',
            'order' => 'DESC'
         ];
         $galleries = new WP_Query($args);
         while ($galleries->have_posts()) : $galleries->the_post();
            $previewImage = get_field('preview_image');
         ?>
            <div class="col-xl-4">
               <div class="single-gallery">
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                  <div class="gallery-hover">
                     <div class="gallery-content">
                        <h3><a href="<?php echo esc_url($previewImage['url']); ?>" class="gallery"><i class="<?php echo esc_attr('fa fa-plus') ?>"></i> <?php the_title(); ?></a></h3>
                     </div>
                  </div>
               </div>
            </div>
         <?php endwhile;
         wp_reset_postdata(); ?>
      </div>
   </div>
</section>


<?php get_footer() ?>