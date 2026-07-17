<?php

/**
 * Redux: General Section
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

Redux::set_section('carvia_options', [
    'title'  => esc_html__('General', 'carvia'),
    'id'     => 'general',
    'desc'   => esc_html__('General theme settings.', 'carvia'),
    'icon'   => 'el el-home',
    'fields' => [

        // ── Preloader ──────────────────────────────────────────
        [
            'id'       => 'preloader_enable',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Preloader', 'carvia'),
            'subtitle'     => esc_html__('Show a loading screen while the page loads', 'carvia'),
            'default'  => true
        ],

        // ── Colors ────────────────────────────────────────────
        [
            'id'       => 'primary_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Primary Color', 'carvia'),
            'subtitle' => esc_html__('Main accent color used throughout the theme.', 'carvia'),
            'default'  => [
                'color' => '#D1FF6D',
                'alpha' => '1',
                'rgba'  => 'rgba(209,255,109,1)',
            ],
            'output'   => ['--carvia-primary'],
        ],
        [
            'id'       => 'secondary_color',
            'type'     => 'color_rgba',
            'title'    => esc_html__('Secondary Color', 'carvia'),
            'subtitle' => esc_html__('Used for headings, buttons, and dark areas.', 'carvia'),
            'default'  => [
                'color' => '#153F2A',
                'alpha' => '1',
                'rgba'  => 'rgba(21,63,42,1)',
            ],
            'output'   => ['--carvia-secondary'],
        ],
    ],
]);
