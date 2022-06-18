<?php

/**
 * Template Name: Portfolio Template
 * The template for displaying portfolio pages.
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

get_header(); ?>

<!-- Breadcrumb Area -->
<?php get_template_part('/template-parts/content/content', 'breadcrumb'); ?>


<!-- projectss Area Start -->
<?php
$portfolioCats = get_terms('portfolio_cat');

?>
<section class="projects-area pb-100 pt-100" id="projects">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="portfolio-menu mb-40 text-center">
               <button class="active" data-filter="*"> <?php echo esc_html__('All', 'halim') ?></button>
               <?php foreach ($portfolioCats as $cat) : ?>
                  <button data-filter=".<?php echo esc_attr($cat->slug); ?>" class=""> <?php echo esc_html__($cat->name, 'halim'); ?></button>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
      <div class="row grid no-gutters">
         <?php
         $args = array(
            'posts_per_page' => -1,
            'post_type' => 'portfolios',
            'order' => 'DESC'
         );
         $portfolio = new WP_Query($args);
         while ($portfolio->have_posts()) : $portfolio->the_post();

            $proCats = get_the_terms(get_the_ID(), 'portfolio_cat');
         ?>

            <div class="col-md-4 grid-item <?php foreach ($proCats as $cat) : echo esc_attr($cat->slug) . ' ';
                                             endforeach; ?>">
               <div class="single-portfolio">
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                  <div class="portfolio-hover">
                     <div class="portfolio-content">
                        <h3><a href="<?php the_permalink(); ?>" class=""><i class="<?php echo esc_attr('fa fa-link'); ?>"></i> <?php the_title(); ?> <span><?php echo esc_html__(the_field('branding'), 'halim') ?></span></a></h3>
                     </div>
                  </div>
               </div>
            </div>
         <?php endwhile;
         wp_reset_postdata(); ?>
      </div>
   </div>
</section>
<!-- projectss Area End -->
<?php get_footer(); ?>