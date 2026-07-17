<?php

/**
 * Default Header Template Part
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

$logo_data          = pestro_option('header_logo', []);
$logo_url           = ! empty($logo_data['url']) ? $logo_data['url'] : '';
$logo_width         = pestro_option('header_logo_width', ['width' => '160', 'units' => 'px']);
$logo_w_val         = ! empty($logo_width['width']) ? esc_attr($logo_width['width']) . esc_attr($logo_width['units']) : '160px';
$header_button      = pestro_option('header_button', true);
$header_button_text = pestro_option('header_button_text', esc_html__('Book A Service', 'pestro'));
$header_button_url  = pestro_option('header_button_url', '#');
?>

<div class="container">
    <div class="header-inner">
        <!-- Logo -->
        <div class="header-logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php elseif ($logo_url) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>"
                        style="width:<?php echo esc_attr($logo_w_val); ?>;">
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>"
                    class="site-title">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
        </div><!-- header logo -->

        <!-- Primary Nav -->
        <nav class="header-nav text-right" id="site-navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'pestro'); ?>">
            <?php
            $has_menu = has_nav_menu('primary-menu');

            if ($has_menu) :
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'menu_id'        => 'primary-nav-menu',
                    'container'      => false,
                    'fallback_cb'    => false,
                ]);

            elseif (current_user_can('manage_options')) : ?>
                <a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"
                    class="header-create-menu">
                    <?php esc_html_e('+ Create a Menu', 'pestro'); ?>
                </a>

            <?php endif; ?>
        </nav><!-- header nav -->

        <!-- Button Area -->
        <?php if ($header_button == true && !empty($header_button_text)) : ?>
            <div class="button-wrapper">
                <a href="<?php echo esc_url($header_button_url); ?>" class="btn-fill">
                    <span class="btn-fill__text"><?php echo esc_html($header_button_text);  ?></span>
                    <span class="rpl-btn__label">
                        <span class="btn-fill__icon">
                            <i class="arrow-out hgi-stroke hgi-arrow-right-02"></i>
                            <i class="arrow-in hgi-stroke hgi-arrow-right-02"></i>
                        </span>
                    </span>
                </a>
            </div>
        <?php endif; ?>
        <!-- start mobile menu wrap -->
        <div class="mobile-menu-wrap">
            <a class="header-menu-bar"><i class="hgi hgi-stroke hgi-menu-01"></i></a>
        </div>
        <!-- end mobile menu wrap -->
    </div><!-- header inner -->
</div><!-- .container -->