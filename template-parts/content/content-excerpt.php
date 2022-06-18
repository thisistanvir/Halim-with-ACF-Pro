<?php

/**
 * Template part for displaying posts
 *
 */

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="col-md-4">
         <div class="single-blog">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
            <div class="post-content">
               <div class="post-title">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
               </div>
               <div class="pots-meta">
                  <ul>
                     <li><?php the_time('j F, Y') ?></li>
                     <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></li>
                     <li><?php the_category(', '); ?></li>
                  </ul>
               </div>
               <?php the_excerpt(); ?>
               <a href="<?php the_permalink(); ?>" class="box-btn"><?php echo esc_html__('read more', 'halim'); ?> <i class="<?php echo esc_attr('fa fa-angle-double-right'); ?>"></i></a>
            </div>
         </div>
      </div>

<?php endwhile;
else :
   esc_html_e('No post found', 'starter-theme');
endif; ?>


<!-- Post Pagination -->
<?php the_posts_pagination(
   [
      'screen_reader_text' => ' ',
      'prev_text' => '<span class="fa fa-angle-left"></span>',
      'next_text' => '<span class="fa fa-angle-right"></span>',
      'class' => 'pagination'
   ]
);
?>