<?php

/**
 * Redux: General Section
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

Redux::set_section('pestro_options', [
    'title'  => esc_html__('General', 'pestro'),
    'id'     => 'general',
    'desc'   => esc_html__('General theme settings.', 'pestro'),
    'icon'   => 'el el-home',
    'fields' => [

        // ── Preloader ──────────────────────────────────────────
        [
            'id'       => 'preloader_enable',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Preloader', 'pestro'),
            'subtitle'     => esc_html__('Show a loading screen while the page loads', 'pestro'),
            'default'  => true
        ],

        // ── Colors ────────────────────────────────────────────
        [
            'id'       => 'primary_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Primary Color', 'pestro'),
            'subtitle' => esc_html__('Main accent color used throughout the theme.', 'pestro'),
            'default'  => [
                'color' => '#D1FF6D',
                'alpha' => '1',
                'rgba'  => 'rgba(209,255,109,1)',
            ],
            'output'   => ['--pestro-primary'],
        ],
        [
            'id'       => 'secondary_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Secondary Color', 'pestro'),
            'subtitle' => esc_html__('Used for headings, buttons, and dark areas.', 'pestro'),
            'default'  => [
                'color' => '#153F2A',
                'alpha' => '1',
                'rgba'  => 'rgba(21,63,42,1)',
            ],
            'output'   => ['--pestro-secondary'],
        ],
    ],
]);
