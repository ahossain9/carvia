<?php

/**
 * Scripts and Styles Enqueue
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! function_exists('carvia_scripts')) :
    function carvia_scripts()
    {

        // ─── Google Fonts ─────────────────────────────────────
        wp_enqueue_style(
            'carvia-google-fonts',
            'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
            [],
            null
        );

        // ─── Main Compiled CSS ────────────────────────────────
        wp_enqueue_style('carvia-style', CARVIA_ASSETS . 'css/style.min.css', ['carvia-google-fonts'], CARVIA_VERSION);
        wp_enqueue_style('hugeicon-style', CARVIA_ASSETS . 'css/hugeicon.min.css', ['carvia-google-fonts'], CARVIA_VERSION);

        // ─── WordPress Block Library ──────────────────────────
        wp_enqueue_style('wp-block-library');

        // ─── Main JS ──────────────────────────────────────────
        wp_enqueue_script('carvia-main', CARVIA_ASSETS . 'js/main.min.js', ['jquery'], CARVIA_VERSION, true);

        // // ─── Comments ─────────────────────────────────────────
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
endif;

add_action('wp_enqueue_scripts', 'carvia_scripts');


/**
 * Admin styles.
 */
function carvia_admin_scripts()
{
    wp_enqueue_style(
        'carvia-admin',
        CARVIA_ASSETS . 'css/admin.min.css',
        [],
        CARVIA_VERSION
    );
}
add_action('admin_enqueue_scripts', 'carvia_admin_scripts');
