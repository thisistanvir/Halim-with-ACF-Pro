<?php

/**
 * halim Footer
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
} ?>

<!-- CTA Area Start -->
<?php
$ctaContent = get_field('cta_content', 'option');
$ctaTitle = (!empty($ctaContent['cta_title'])) ? $ctaContent['cta_title'] : ' ';
$ctaDescription = (!empty($ctaContent['cta_description'])) ? $ctaContent['cta_description'] : ' ';
$ctaButton = get_field('cta_button', 'option');
$buttonText = (!empty($ctaButton['button_text'])) ? $ctaButton['button_text'] : ' ';
$buttonLink = (!empty($ctaButton['button_link'])) ? $ctaButton['button_link'] : ' ';
?>
<section class="cta">
        <div class="container">
                <div class="row">
                        <div class="col-md-6">
                                <h4><?php echo esc_html__($ctaTitle, 'halim'); ?> <span><?php echo esc_html__($ctaDescription, 'halim'); ?></span></h4>
                        </div>
                        <div class="col-md-6 text-center">
                                <?php if ($buttonText) : ?>
                                        <a href="<?php echo esc_url($buttonLink); ?>" class="box-btn"><?php echo esc_html__($buttonText, 'halim'); ?> <i class="<?php echo esc_attr('fa fa-angle-double-right'); ?>"></i></a>
                                <?php endif; ?>
                        </div>
                </div>
        </div>
</section>
<!-- CTA Area End -->

<!-- Footer Area End -->
<footer class="footer-area pt-50 pb-50">
        <div class="container">
                <div class="row">
                        <div class="col-lg-3 col-md-6">
                                <?php
                                if (is_active_sidebar('footer-1')) :

                                        dynamic_sidebar('footer-1');
                                endif;
                                ?>
                        </div>
                        <div class="col-lg-2 col-md-6">
                                <?php
                                if (is_active_sidebar('footer-2')) :

                                        dynamic_sidebar('footer-2');
                                endif;
                                ?>
                        </div>
                        <div class="col-lg-4 col-md-6">
                                <?php
                                if (is_active_sidebar('footer-3')) :

                                        dynamic_sidebar('footer-3');
                                endif;
                                ?>
                        </div>
                        <div class="col-lg-3 col-md-6">
                                <?php
                                if (is_active_sidebar('footer-4')) :

                                        dynamic_sidebar('footer-4');
                                endif;
                                ?>
                        </div>
                </div>
                <div class="row copyright">
                        <?php
                        $footerBottom = get_field('footer_bottom', 'option');
                        $copyrightText = (!empty($footerBottom['copyright_text'])) ? $footerBottom['copyright_text'] : ' ';
                        $footerSocials =  (!empty($footerBottom['footer_socials'])) ? $footerBottom['footer_socials'] : '';
                        ?>
                        <div class="col-md-6">
                                <?php echo $copyrightText; ?>
                        </div>
                        <div class="col-md-6 text-right">
                                <?php if ($footerSocials) : ?>
                                        <ul>
                                                <?php foreach ($footerSocials as $social) : ?>
                                                        <li><a href="<?php echo $social['link']; ?>"><?php echo $social['icon']; ?></a></li>
                                                <?php endforeach; ?>
                                        </ul>
                                <?php endif; ?>
                        </div>
                </div>
        </div>
</footer>
<!-- Footer Area End -->


<?php wp_footer(); ?>
</body>

</html>