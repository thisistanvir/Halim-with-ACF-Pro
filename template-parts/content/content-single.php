<?php

/**
 * Template part for displaying post content
 *
 */

?>

<?php if (have_posts()) :
   while (have_posts()) : the_post(); ?>

      <div class="col-xl-8">
         <h2><?php the_title(); ?></h2>
         <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('full', ['class' => 'single_post_thumb']) ?>" alt="<?php the_title(); ?>">
         <?php
         endif; ?>

         <?php the_content(); ?>

         <div class="comments">
            <?php
            if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
               comments_template();
            }
            ?>
         </div>
      </div>


<?php endwhile;
else :
   esc_html_e('No content found', 'starter-theme');
endif; ?>