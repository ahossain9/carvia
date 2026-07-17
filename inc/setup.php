<?php

/**
 * Theme Setup
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! function_exists('pestro_setup')) :
    function pestro_setup()
    {

        // Automatic Feed Links
        add_theme_support('automatic-feed-links');

        // Title Tag
        add_theme_support('title-tag');

        // Post Thumbnails
        add_theme_support('post-thumbnails');
        add_image_size('pestro-blog-grid',   800, 530, true);
        add_image_size('pestro-blog-list',   760, 460, true);
        add_image_size('pestro-blog-single', 1200, 650, true);
        add_image_size('pestro-thumb-small', 150, 150, true);

        // Custom Logo
        add_theme_support('custom-logo', [
            'height'      => 60,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        ]);

        // HTML5
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);

        // Post Formats
        add_theme_support('post-formats', [
            'video',
            'gallery',
            'audio',
            'quote',
            'link',
        ]);

        // Responsive Embeds
        add_theme_support('responsive-embeds');

        // Editor Styles
        add_theme_support('editor-styles');

        // Wide Alignment
        add_theme_support('align-wide');

        // Custom Background
        add_theme_support('custom-background', [
            'default-color' => 'FBFFF5',
        ]);

        // Block Editor Color Palette
        add_theme_support('editor-color-palette', [
            ['name' => __('Primary',   'pestro'), 'slug' => 'primary',   'color' => '#D1FF6D'],
            ['name' => __('Secondary', 'pestro'), 'slug' => 'secondary', 'color' => '#153F2A'],
            ['name' => __('Heading',   'pestro'), 'slug' => 'heading',   'color' => '#0B311E'],
            ['name' => __('Body',      'pestro'), 'slug' => 'body',      'color' => '#364745'],
            ['name' => __('Orange',    'pestro'), 'slug' => 'orange',    'color' => '#FFBC64'],
            ['name' => __('White',     'pestro'), 'slug' => 'white',     'color' => '#FFFFFF'],
        ]);

        // Content Width
        $GLOBALS['content_width'] = 1320;
    }
endif;

add_action('after_setup_theme', 'pestro_setup');


function pestro_woocommerce_support()
{
    add_theme_support('woocommerce', array(

        'product_grid'          => array(
            'default_rows'    => 2,
            'min_rows'        => 2,
            'max_rows'        => 2,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ));
}

add_action('after_setup_theme', 'pestro_woocommerce_support');

// ─── Content Width ────────────────────────────────────────────
if (! isset($content_width)) {
    $content_width = 1320;
}

// ─── Translations ────────────────────────────────────────────
function pestro_load_textdomain()
{
    load_theme_textdomain('pestro', PESTRO_DIR . '/languages');
}
add_action('init', 'pestro_load_textdomain');

// ─── Redux Framework ──────────────────────────────────────────
if (class_exists('Redux')) {
    function pestro_load_redux_framework()
    {
        require_once PESTRO_INC . 'redux/redux-config.php';
    }
    add_action('after_setup_theme', 'pestro_load_redux_framework');
}