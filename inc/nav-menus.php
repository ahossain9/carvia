<?php

/**
 * Navigation Menus Registration
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

function pestro_register_menus()
{
    register_nav_menus([
        'primary-menu' => esc_html__('Primary Menu', 'pestro'),
        'mobile-menu'  => esc_html__('Mobile Menu',  'pestro'),
    ]);
}
add_action('init', 'pestro_register_menus');
