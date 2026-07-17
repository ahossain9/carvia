<?php

/**
 * Redux Framework Configuration
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! class_exists('Redux')) {
    return;
}

$opt_name = 'pestro_options';
$theme    = wp_get_theme();

// ─── Global Args ──────────────────────────────────────────────
$args = [
    'opt_name'             => $opt_name,
    'display_name'         => $theme->get('Name'),
    'display_version'      => $theme->get('Version'),
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => esc_html__('Pestro Options', 'pestro'),
    'page_title'           => esc_html__('Pestro Options', 'pestro'),
    'google_api_protocol'  => 'https',
    'async_typography'     => true,
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-admin-appearance',
    'admin_bar_priority'   => 50,
    'global_variable'      => $opt_name,
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => false,
    'page_priority'        => null,
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => '',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => $opt_name,
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => true,
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    'output_tag'           => true,
    'use_cdn'              => true,
    'footer_credit'        => '',
    'database'             => '',
    'show_options_object'  => false,
    'show_panel_import'    => true,
    'show_close_button'    => true,
    'hide_expand'          => false,
    'disable_tracking'     => true,
];

Redux::set_args($opt_name, $args);

// ─── Load Sections ─────────────────────────────────────────────
$sections_dir = PESTRO_INC . 'redux/sections/';
$sections     = [
    'general',
    'header',
    'page-header',
    'typography',
    'blog',
    'footer',
];

foreach ($sections as $section) {
    $path = $sections_dir . $section . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
}
