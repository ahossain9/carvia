<?php

/**
 * Theme Setup
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! function_exists('carvia_setup')) :
    function carvia_setup()
    {

        // Automatic Feed Links
        add_theme_support('automatic-feed-links');

        // Title Tag
        add_theme_support('title-tag');

        // Post Thumbnails
        add_theme_support('post-thumbnails');
        add_image_size('carvia-blog-grid',   800, 530, true);
        add_image_size('carvia-blog-list',   760, 460, true);
        add_image_size('carvia-blog-single', 1200, 650, true);
        add_image_size('carvia-thumb-small', 150, 150, true);

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
            ['name' => __('Primary',   'carvia'), 'slug' => 'primary',   'color' => '#FF4400'],
            ['name' => __('Secondary', 'carvia'), 'slug' => 'secondary', 'color' => '#153F2A'],
            ['name' => __('Heading',   'carvia'), 'slug' => 'heading',   'color' => '#0B311E'],
            ['name' => __('Body',      'carvia'), 'slug' => 'body',      'color' => '#364745'],
            ['name' => __('Orange',    'carvia'), 'slug' => 'orange',    'color' => '#FFBC64'],
            ['name' => __('White',     'carvia'), 'slug' => 'white',     'color' => '#FFFFFF'],
        ]);

        // Content Width
        $GLOBALS['content_width'] = 1320;
    }
endif;

add_action('after_setup_theme', 'carvia_setup');


function carvia_woocommerce_support()
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

add_action('after_setup_theme', 'carvia_woocommerce_support');

// ─── Content Width ────────────────────────────────────────────
if (! isset($content_width)) {
    $content_width = 1320;
}

// ─── Translations ────────────────────────────────────────────
function carvia_load_textdomain()
{
    load_theme_textdomain('carvia', CARVIA_DIR . '/languages');
}
add_action('init', 'carvia_load_textdomain');

// ─── Redux Framework ──────────────────────────────────────────
if (class_exists('Redux')) {
    function carvia_load_redux_framework()
    {
        require_once CARVIA_INC . 'redux/redux-config.php';
    }
    add_action('after_setup_theme', 'carvia_load_redux_framework');
}
