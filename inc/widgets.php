<?php

/**
 * halim Custom Widgets
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}



// Widget for Footer Branding
class Footer_Branding_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {

    parent::__construct(
      'footer-Branding',  // Base ID
      __('Footer Branding', 'halim'),  // Name
      array('description' => __('A Footer Branding Widget', 'halim'),) // Args
    );

    add_action('widgets_init', function () {
      register_widget('Footer_Branding_Widget');
    });
  }


  /**
   * Front-end display of widget.
   */
  public function widget($args, $instance) {
?>
    <div class="single-footer footer-logo">
      <h3><?php echo  esc_html__($instance['branding'], 'halim'); ?></h3>
      <p><?php echo esc_html__($instance['description'], 'halim'); ?></p>
    </div>
  <?php
  }

  /**
   * Back-end widget form.
   */
  public function form($instance) {
    $branding = !empty($instance['branding']) ? $instance['branding'] : esc_html__('Halim', 'halim');;
    $description = !empty($instance['description']) ? $instance['description'] : esc_html__('', 'halim');
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('branding')); ?>"><?php echo esc_html__('Branding:', 'halim'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('branding')); ?>" name="<?php echo esc_attr($this->get_field_name('branding')); ?>" type="text" value="<?php echo esc_attr($branding); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php echo esc_html__('Description:', 'halim'); ?></label>
      <textarea class="widefat" name="<?php echo esc_attr($this->get_field_name('description')); ?>" id="<?php echo esc_attr($this->get_field_id('description')); ?>" type="text"><?php echo esc_attr($description); ?></textarea>
    </p>

  <?php
  }


  public function update($new_instance, $old_instance) {

    $instance = array();

    $instance['branding'] = (!empty($new_instance['branding'])) ? strip_tags($new_instance['branding']) : '';
    $instance['description'] = (!empty($new_instance['description'])) ? $new_instance['description'] : '';

    return $instance;
  }
}
$footer_branding_widget = new Footer_Branding_Widget();


// Widget for Footer Contact
class Footer_Contact_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {

    parent::__construct(
      'footer-contact',  // Base ID
      __('Footer Contact', 'halim'),  // Name
      array('description' => __('A Footer Contact Widget', 'halim'),) // Args
    );

    add_action('widgets_init', function () {
      register_widget('Footer_Contact_Widget');
    });
  }


  /**
   * Front-end display of widget.
   */
  public function widget($args, $instance) {
  ?>
    <div class="single-footer contact-box">
      <h4><?php echo esc_html__($instance['title'], 'halim'); ?></h4>
      <ul>
        <?php if (!empty($instance['address'])) : ?>
          <li><i class="<?php echo esc_attr('fa fa-map-marker'); ?>"></i> <?php echo esc_html__($instance['address'], 'halim'); ?></li>
        <?php endif;
        if (!empty($instance['phone'])) : ?>
          <li><i class="<?php echo esc_attr('fa fa-phone'); ?>"></i> <?php echo esc_html__($instance['phone'], 'halim'); ?></li>
        <?php endif;
        if (!empty($instance['email'])) : ?>
          <li><i class="<?php echo esc_attr('fa fa-envelope'); ?>"></i> <?php echo esc_html__($instance['email'], 'halim'); ?></li>
        <?php endif;
        if (!empty($instance['website'])) : ?>
          <li><i class="<?php echo esc_attr('fa fa-globe'); ?>"></i> <?php echo esc_html__($instance['email'], 'halim'); ?></li>
        <?php endif; ?>
      </ul>
    </div>
  <?php
  }

  /**
   * Back-end widget form.
   */
  public function form($instance) {
    $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Contact Us', 'halim');;
    $address = !empty($instance['address']) ? $instance['address'] : esc_html__('', 'halim');
    $phone = !empty($instance['phone']) ? $instance['phone'] : esc_html__('', 'halim');
    $email = !empty($instance['email']) ? $instance['email'] : esc_html__('', 'halim');
    $website = !empty($instance['website']) ? $instance['website'] : esc_html__('', 'halim');
  ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'halim'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php echo esc_html__('Address:', 'halim'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php echo esc_html__('Phone:', 'halim'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="tel" value="<?php echo esc_attr($phone); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php echo esc_html__('Email:', 'halim'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="email" value="<?php echo esc_attr($email); ?>">
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('website')); ?>"><?php echo esc_html__('Website:', 'halim'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('website')); ?>" name="<?php echo esc_attr($this->get_field_name('website')); ?>" type="text" value="<?php echo esc_attr($website); ?>">
    </p>

<?php
  }
}
$footer_contact_widget = new Footer_Contact_Widget();
