<?php

/**
 * Template Name: Contact Template
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

<!-- Contact Us Area End -->
<section class="contact-area pb-100 pt-100" id="contact">
   <div class="container">
      <div class="row">
         <div class="col-md-10 mx-auto">
            <div class="row text-center">
               <?php
               $contactInfos = get_field('contact_info', 'option');

               if ($contactInfos) :
                  foreach ($contactInfos as $info) :
               ?>
                     <div class="col-md-4">
                        <div class="contact-address">
                           <?php echo $info['icon']; ?>
                           <h4><?php echo $info['title']; ?> <span><?php echo $info['details']; ?></span></h4>
                        </div>
                     </div>
               <?php endforeach;
               endif; ?>

            </div>
            <div class="row">
               <div class="col-md-7">
                  <div class="contact-form">
                     <?php
                     $contactForm = get_field('contact_form', 'option');
                     echo do_shortcode('' . $contactForm . ''); ?>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="google-map">
                     <?php echo esc_html(the_field('google_map', 'option')); ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Contact Us Area End -->

<?php get_footer(); ?>