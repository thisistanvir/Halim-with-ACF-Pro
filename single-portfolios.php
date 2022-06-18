<?php

/**
 * 
 * The template for displaying single portfolio pages.
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

get_header(); ?>


<!-- Breadcrumb Area -->
<?php get_template_part('/template-parts/content/content', 'breadcrumb'); ?>

<section class="portfolio-single pt-100 pb-100">
   <div class="container">
      <div class="row">
         <div class="col-xl-8">
            <h2><?php the_title(); ?></h2>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
            <?php the_content(); ?>

            <?php
            $galleryImages = get_field('project_gallery');

            if ($galleryImages) :
            ?>
               <div class="row">
                  <div class="col-xl-12">
                     <h4><?php echo esc_html__('project gallery', 'halim'); ?></h4>
                  </div>
                  <?php foreach ($galleryImages as $image) : ?>
                     <div class="col-xl-4">
                        <div class="project-gallery">
                           <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['name']; ?>">
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            <?php endif; ?>

            <br><br>

            <?php if (get_field('project_overview')) : ?>
               <div class="row">
                  <div class="col-xl-12">
                     <h4><?php echo esc_html__('project overview', 'halim'); ?></h4>
                     <?php echo esc_html__(the_field('project_overview'), 'halim'); ?>
                  </div>
               </div>
            <?php endif; ?>
         </div>
         <div class="col-xl-4">

            <?php
            $technologies = get_field('technology_used');
            if ($technologies) :
            ?>
               <div class="portfolio-sidebar">
                  <h4><?php echo esc_html__('Technology Used', 'halim'); ?></h4>
                  <ul>
                     <?php foreach ($technologies as $technology) : ?>
                        <li><i class="<?php echo esc_attr('fa fa-arrow-right') ?>"></i> <?php printf(__('%s', 'halim'), $technology['technology']); ?></li>
                     <?php endforeach; ?>
                  </ul>
               </div>
            <?php endif;

            $features = get_field('project_features');
            if ($features) :
            ?>
               <div class="portfolio-sidebar">
                  <h4><?php echo esc_html__('project features', 'halim'); ?></h4>
                  <ul>
                     <?php foreach ($features as $feature) : ?>
                        <li><i class="<?php echo esc_attr('fa fa-arrow-right') ?>"></i> <?php echo esc_html__($feature['feature'], 'halim'); ?></li>
                     <?php endforeach; ?>
                  </ul>
               </div>
            <?php endif; ?>

         </div>
      </div>
   </div>
</section>
<?php get_footer(); ?>