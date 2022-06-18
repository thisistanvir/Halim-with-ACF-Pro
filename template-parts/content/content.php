<?php

/**
 * Template part for displaying content
 *
 */

?>

<?php if (have_posts()) :
  while (have_posts()) : the_post(); ?>

    <div class="col-xl-8">
      <?php the_content(); ?>
    </div>


<?php endwhile;
else :
  esc_html_e('No content found', 'starter-theme');
endif; ?>