<?php

/**
 * The template for displaying theme header.
 *
 * @package halim
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <section class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="header-left">
                        <?php
                        $headerLeft = get_field('top_header_left', 'option');
                        $headerEmail = (!empty($headerLeft['email'])) ? $headerLeft['email'] : '';
                        $headerPhone = (!empty($headerLeft['phone'])) ? $headerLeft['phone'] : '';
                        $headerSocials = get_field('top_header_socials', 'option');

                        if ($headerEmail) :
                        ?>
                            <a href="mailto:<?php echo $headerEmail; ?>"><i class="<?php echo esc_attr('fa fa-envelope') ?>"></i> <?php echo esc_html__($headerEmail, 'halim'); ?></a>
                        <?php endif;
                        if ($headerPhone) : ?>
                            <a href="tel:<?php echo $headerPhone; ?>"><i class="<?php echo esc_attr('fa fa-phone') ?>"></i> <?php echo esc_html__($headerPhone, 'halim'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <?php if ($headerSocials) : ?>
                        <div class="header-social">
                            <?php foreach ($headerSocials as $social) : ?>
                                <a href="<?php echo $social['link']; ?>"><?php echo $social['icon']; ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Header Area Start -->
    <header class="header header-fixed">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                            <?php
                            $headerLogo = get_field('header_logo', 'option');
                            $textLogo = get_field('text_logo', 'option');
                            $imgLogo = get_field('image_logo', 'option');

                            if ('text' == $headerLogo) :
                                echo $textLogo;
                            elseif ('image' == $headerLogo) : ?>
                                <img src="<?php echo $imgLogo; ?>" alt="<?php bloginfo('name'); ?>">
                            <?php
                            endif;
                            ?>

                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse ml-auto mainmenu" id="navbarNav">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'main-menu',
                                    'menu_class'     => 'navbar-nav ml-auto',
                                    'menu_id'     => '',
                                )
                            );
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->