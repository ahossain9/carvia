<?php

/**
 * Navigation Menus Registration
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

function carvia_register_menus()
{
    register_nav_menus([
        'primary-menu' => esc_html__('Primary Menu', 'carvia'),
        'mobile-menu'  => esc_html__('Mobile Menu',  'carvia'),
    ]);
}
add_action('init', 'carvia_register_menus');
