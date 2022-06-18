<?php

/**
 * Template Name: Home Template
 * The template for displaying home pages.
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}
get_header() ?>


<!-- Slider Area Start -->
<section class="slider-area" id="home">
  <div class="slider owl-carousel">

    <?php
    $args = [
      'posts_per_page' => -1,
      'post_type' => 'slider',
      'order' => 'DESC'
    ];
    $slider = new WP_Query($args);
    while ($slider->have_posts()) : $slider->the_post();

      $subtitle = get_field('sub_title');
      $buttonText = get_field('button_text');
      $buttonUrl = get_field('button_url');
    ?>

      <div class="single-slide" style="background-image:url('<?php the_post_thumbnail_url(); ?>')">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="slide-table">
                <div class="slide-tablecell">
                  <h4><?php echo esc_html__($subtitle, 'halim'); ?></h4>
                  <h2><?php the_title(); ?></h2>
                  <?php the_content(); ?>
                  <?php if (!empty($buttonText)) : ?>
                    <a href="<?php echo esc_url($buttonUrl); ?>" class="box-btn"><?php echo esc_html__($buttonText, 'halim'); ?> <i class="<?php echo esc_attr('fa fa-angle-double-right') ?>"></i></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile;
    wp_reset_postdata(); ?>
  </div>
</section>
<!-- Slider Area Start -->
<!-- About Area Start -->
<?php
$aboutSection = get_field('about_section', 'option');
$sectionTitle = (!empty($aboutSection['section_title'])) ? $aboutSection['section_title'] : '';
$sectionSubTitle = (!empty($aboutSection['section_subtitle'])) ? $aboutSection['section_subtitle'] : '';
$sectionDescription = (!empty($aboutSection['section_description'])) ? $aboutSection['section_description'] : '';
$aboutContent = get_field('about_content', 'option');
$contentTitle = (!empty($aboutContent['content_title'])) ? $aboutContent['content_title'] : '';
$contentDescription = (!empty($aboutContent['content_description'])) ? $aboutContent['content_description'] : '';
$contentButton = (!empty($aboutContent['content_button'])) ? $aboutContent['content_button'] : '';
$buttonText = (!empty($contentButton['button_text'])) ? $contentButton['button_text'] : '';
$buttonLink = (!empty($contentButton['button_link'])) ? $contentButton['button_link'] : '';
$aboutFeatures = get_field('about_feature', 'option');
?>
<section class="about-area pt-100 pb-100" id="about">
  <div class="container">
    <div class="row section-title">
      <div class="col-md-6 text-right">
        <h3><span><?php echo esc_html__($sectionSubTitle, 'halim'); ?></span> <?php echo esc_html__($sectionTitle, 'halim'); ?></h3>
      </div>
      <div class="col-md-6">
        <p><?php echo esc_html__($sectionDescription, 'halim'); ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-7">
        <div class="about">
          <div class="page-title">
            <h4><?php echo esc_html__($contentTitle, 'halim'); ?></h4>
          </div>
          <?php echo $contentDescription; ?>
          <?php if ($buttonText) : ?>
            <a href="<?php echo esc_url($buttonLink); ?>" class="box-btn"><?php echo esc_html__($buttonText, 'halim'); ?> <i class="<?php echo esc_attr('fa fa-angle-double-right'); ?>"></i></a>
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
<!-- Choose Area End -->
<?php
$faq = get_field('faq', 'option');
$faqTitle = (!empty($faq['faq_title'])) ? $faq['faq_title'] : '';
$faqAccordions = (!empty($faq['faq_accordion'])) ? $faq['faq_accordion'] : '';
$skills = get_field('skills', 'option');
$skillsTitle = (!empty($skills['skill_title'])) ? $skills['skill_title'] : '';
$skillProgresses = (!empty($skills['skill_progress'])) ? $skills['skill_progress'] : '';
?>
<section class="choose">
  <div class="container">
    <div class="row pt-100 pb-100">
      <div class="col-md-6">
        <div class="faq">
          <div class="page-title">
            <h4><?php echo esc_html__($faqTitle, 'halim') ?></h4>
          </div>
          <?php if ($faqAccordions) : ?>
            <div class="accordion" id="accordionExample">
              <?php
              $i = 0;
              foreach ($faqAccordions as $accordion) :
                $i++;
              ?>
                <div class="card">
                  <div class="card-header" id="heading<?php echo $i; ?>">
                    <h5 class="mb-0">
                      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
                        <?php echo esc_html__($accordion['accordion_title'], 'halim'); ?>
                      </button>
                    </h5>
                  </div>
                  <div id="collapse<?php echo $i; ?>" class="collapse <?php if (1 == $i) {
                                                                        echo "show";
                                                                      } ?>" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordionExample">
                    <div class="card-body">
                      <?php echo esc_html__($accordion['accordion_description'], 'halim'); ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="skills">
          <div class="page-title">
            <h4><?php echo esc_html__($skillsTitle, 'halim'); ?></h4>
          </div>
          <?php if ($skillProgresses) : foreach ($skillProgresses as $progress) : ?>
              <div class="single-skill">
                <h4><?php echo esc_html__($progress['progress_title'], 'halim'); ?></h4>
                <div class="progress-bar" role="progressbar" style="width: <?php echo esc_attr($progress['progress_number']); ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo esc_html__($progress['progress_number'], 'hlaim');
                                                                                                                                                                                              echo esc_html__('%', 'halim'); ?></div>
              </div>
          <?php endforeach;
          endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Choose Area End -->
<!-- Services Area Start -->
<?php
$serviceSection = get_field('service_section', 'option');
$sectionTitle = (!empty($serviceSection['section_title'])) ? $serviceSection['section_title'] : ' ';
$sectionSubTitle = (!empty($serviceSection['section_subtitle'])) ? $serviceSection['section_subtitle'] : ' ';
$sectionDescription = (!empty($serviceSection['section_description'])) ? $serviceSection['section_description'] : ' ';
?>
<section class="services-area pt-100 pb-50" id="services">
  <div class="container">
    <div class="row section-title">
      <div class="col-md-6 text-right">
        <h3><span><?php echo esc_html__($sectionSubTitle, 'halim'); ?></span> <?php echo esc_html__($sectionTitle, 'halim'); ?></h3>
      </div>
      <div class="col-md-6">
        <p><?php echo esc_html__($sectionDescription, 'halim'); ?></p>
      </div>
    </div>
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
            <?php echo esc_html(the_field('service_icon')); ?>
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

<!-- Counter Area End -->
<section class="counter-area">
  <div class="container-fluid">
    <div class="row">

      <?php
      $args = [
        'posts_per_page' => -1,
        'post_type' => 'counters',
        'order' => 'DESC'
      ];
      $counter = new WP_Query($args);
      while ($counter->have_posts()) : $counter->the_post(); ?>
        <div class="col-md-3">
          <div class="single-counter">
            <h4><?php echo esc_html(the_field('icon')); ?><span class="counter"><?php echo esc_html__(the_field('counter_number'), 'halim'); ?></span><?php the_title(); ?></span></h4>
          </div>
        </div>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<!-- Counter Area End -->
<!-- Team Area Start -->
<?php
$teamSection = get_field('team_section', 'option');
$sectionTitle = (!empty($teamSection['section_title'])) ? $teamSection['section_title'] : ' ';
$sectionSubTitle = (!empty($teamSection['section_subtitle'])) ? $teamSection['section_subtitle'] : ' ';
$sectionDescription = (!empty($teamSection['section_description'])) ? $teamSection['section_description'] : ' ';
?>
<section class="team-area pb-100 pt-100" id="team">
  <div class="container">
    <div class="row section-title">
      <div class="col-md-6 text-right">
        <h3><span><?php echo esc_html__($sectionSubTitle, 'halim'); ?></span> <?php echo esc_html__($sectionTitle, 'halim'); ?></h3>
      </div>
      <div class="col-md-6">
        <p><?php echo esc_html__($sectionDescription, 'halim'); ?></p>
      </div>
    </div>
    <div class="row">

      <?php
      $args = [
        'posts_per_page' => -1,
        'post_type' => 'teams',
        'order' => 'DESC'
      ];
      $team = new WP_Query($args);
      while ($team->have_posts()) : $team->the_post(); ?>
        <div class="col-md-4">
          <div class="single-team">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="" />
            <div class="team-hover">
              <div class="team-content">
                <h4><?php the_title(); ?> <span><?php echo esc_html__(the_field('designation'), 'halim'); ?></span></h4>
                <?php
                $socials = get_field('member_socials');
                if ($socials) :
                ?>
                  <ul>
                    <?php foreach ($socials as $social) : ?>
                      <li><a href="<?php echo esc_url($social['url']); ?>"><?php echo $social['icon'] ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile;
      wp_reset_postdata(); ?>

    </div>
  </div>
</section>
<!-- Team Area End -->

<!-- Testimonials Area Start -->
<?php
$testimonialSection = get_field('testimonial_section', 'option');
$sectionTitle = (!empty($testimonialSection['section_title'])) ? $testimonialSection['section_title'] : ' ';
$sectionSubTitle = (!empty($testimonialSection['section_subtitle'])) ? $testimonialSection['section_subtitle'] : ' ';
$sectionDescription = (!empty($testimonialSection['section_description'])) ? $testimonialSection['section_description'] : ' ';
?>
<section class="testimonial-area pb-100 pt-100" id="testimonials">
  <div class="container">
    <div class="row section-title white-section">
      <div class="col-md-6 text-right">
        <h3><span><?php echo esc_html__($sectionSubTitle, 'halim'); ?></span> <?php echo esc_html__($sectionTitle, 'halim'); ?></h3>
      </div>
      <div class="col-md-6">
        <p><?php echo esc_html__($sectionDescription, 'halim'); ?></p>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="testimonials owl-carousel">

          <?php
          $args = [
            'posts_per_page' => -1,
            'post_type' => 'testimonials',
            'order' => 'DESC'
          ];
          $testimonial = new WP_Query($args);
          while ($testimonial->have_posts()) : $testimonial->the_post(); ?>
            <div class="single-testimonial">
              <div class="testi-img">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
              </div>
              <?php the_content(); ?>
              <h4><?php the_title(); ?> <span><?php echo esc_html__(the_field('designation'), 'halim'); ?></span></h4>
            </div>
          <?php endwhile;
          wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Testimonilas Area End -->
<!-- Latest News Area Start -->
<?php
$latestNewsSection = get_field('latest_news_section', 'option');
$sectionTitle = (!empty($latestNewsSection['section_title'])) ? $latestNewsSection['section_title'] : ' ';
$sectionSubTitle = (!empty($latestNewsSection['section_subtitle'])) ? $latestNewsSection['section_subtitle'] : '';
$sectionDescription = (!empty($latestNewsSection['section_description'])) ? $latestNewsSection['section_description'] : ' ';
?>
<section class="blog-area pb-100 pt-100" id="blog">
  <div class="container">
    <div class="row section-title">
      <div class="col-md-6 text-right">
        <h3><span><?php echo esc_html__($sectionSubTitle, 'halim'); ?></span> <?php echo esc_html__($sectionTitle, 'halim'); ?></h3>
      </div>
      <div class="col-md-6">
        <p><?php echo esc_html__($sectionDescription, 'halim'); ?></p>
      </div>
    </div>
    <div class="row">

      <?php
      $args = [
        'posts_per_page' => 3,
        'post_type' => 'post',
        'order' => 'DESC'
      ];
      $blog = new WP_Query($args);
      while ($blog->have_posts()) : $blog->the_post(); ?>

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
                </ul>
              </div>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="box-btn"><?php echo esc_html__('read more', 'halim') ?> <i class="<?php echo esc_attr('fa fa-angle-double-right') ?>"></i></a>
            </div>
          </div>
        </div>
      <?php endwhile;
      wp_reset_postdata(); ?>

    </div>
  </div>
</section>
<!-- Latest News Area End -->


<?php get_footer(); ?>