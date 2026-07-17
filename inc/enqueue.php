<?php

/**
 * Scripts and Styles Enqueue
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! function_exists('pestro_scripts')) :
    function pestro_scripts()
    {

        // ─── Google Fonts ─────────────────────────────────────
        wp_enqueue_style(
            'pestro-google-fonts',
            'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
            [],
            null
        );

        // ─── Main Compiled CSS ────────────────────────────────
        wp_enqueue_style( 'pestro-style', PESTRO_ASSETS . 'css/style.min.css', ['pestro-google-fonts'], PESTRO_VERSION );
        wp_enqueue_style( 'hugeicon-style', PESTRO_ASSETS . 'css/hugeicon.min.css', ['pestro-google-fonts'], PESTRO_VERSION );

        // ─── WordPress Block Library ──────────────────────────
        wp_enqueue_style('wp-block-library');

        // ─── Main JS ──────────────────────────────────────────
        wp_enqueue_script( 'pestro-main', PESTRO_ASSETS . 'js/main.min.js', ['jquery'], PESTRO_VERSION, true );

        // // ─── Comments ─────────────────────────────────────────
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

    }
endif;

add_action('wp_enqueue_scripts', 'pestro_scripts');


/**
 * Admin styles.
 */
function pestro_admin_scripts()
{
    wp_enqueue_style(
        'pestro-admin',
        PESTRO_ASSETS . 'css/admin.min.css',
        [],
        PESTRO_VERSION
    );
}
add_action('admin_enqueue_scripts', 'pestro_admin_scripts');