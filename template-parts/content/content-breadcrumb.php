<?php

/**
 * The template for displaying breadcrumb area.
 */

if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}
?>

<section class="breadcumb-area">
   <div class="container">
      <div class="row">
         <div class="col-xl-12">
            <div class="breadcumb">
               <h4><?php the_title(); ?></h4>
               <ul>
                  <li><a href="<?php echo site_url(); ?>"><?php echo esc_html__('Home', 'halim'); ?></a></li> /
                  <li><?php the_title(); ?></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>