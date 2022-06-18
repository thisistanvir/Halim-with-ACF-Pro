<?php

/**
 * Template Name: About Template
 * The template for displaying archive pages.
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

get_header(); ?>



<!-- BradCrumb Area -->
<?php get_template_part('/template-parts/content/content', 'breadcrumb'); ?>

<!-- About Area Start -->
<section class="about-area pt-100 pb-100" id="about">
   <div class="container">
      <div class="row">
         <div class="col-md-7">
            <div class="about">
               <div class="page-title">
                  <h4><?php echo esc_html__('welcome to ', 'halim');
                        bloginfo('name'); ?></h4>
               </div>
               <?php
               $aboutContent = get_field('about_content', 'option');
               $contentDescription = (!empty($aboutContent['content_description'])) ? $aboutContent['content_description'] : '';
               $aboutFeatures = get_field('about_feature', 'option');

               if (!empty(get_the_content())) :
                  the_content();
               else :
               ?>
                  <p><?php echo $contentDescription; ?></p>
               <?php endif; ?>
            </div>
         </div>
         <?php if ($aboutFeatures) : ?>
            <div class="col-md-5">
               <?php foreach ($aboutFeatures as $feature) : ?>
                  <div class="single_about">
                     <?php echo $feature['feature_icon']; ?>
                     <h4> <?php echo esc_html__($feature['feature_title'], 'halim'); ?></h4>
                     <p> <?php echo esc_html__($feature['feature_description'], 'halim'); ?></p>
                  </div>
               <?php endforeach; ?>
            </div>
         <?php endif; ?>
      </div>
   </div>
</section>
<!-- About Area End -->
<?php
get_footer(); ?>