<?php

/**
 * Redux: Header Section
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

// ── Build dynamic header choices including Elementor templates ──
function pestro_get_header_type_choices()
{
    // 1. Define your hardcoded theme headers
    $choices = [
        'layout-one'         => esc_html__('Header One',      'pestro'),
        'layout-transparent' => esc_html__('Header Transparent', 'pestro'),
    ];

    // 2. Query the 'pestro_header' custom post type
    $custom_headers = get_posts([
        'post_type'      => 'pestro-header',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ]);

    // 3. Loop through and add them to the array
    if (! empty($custom_headers)) {
        foreach ($custom_headers as $header) {
            $choices[$header->ID] = $header->post_title;
        }
    }

    return apply_filters('pestro_redux_header_choices', $choices);
}

Redux::set_section('pestro_options', [
    'title'  => esc_html__('Header', 'pestro'),
    'id'     => 'header',
    'desc'   => esc_html__('Configure header settings.', 'pestro'),
    'icon'   => 'el el-website',
    'fields' => [

        // ── Logo ──────────────────────────────────────────────
        [
            'id'       => 'header_logo',
            'type'     => 'media',
            'title'    => esc_html__('Header Logo', 'pestro'),
            'subtitle' => esc_html__('Upload your main header logo.', 'pestro'),
            'default'  => ['url' => PESTRO_ASSETS . 'images/logo.png'],
            'desc' => esc_html('Recommended logo size 198x36 pixel', 'pestro')
        ],

        // ── Header Variation ──────────────────────────────────
        [
            'id'       => 'header_variation',
            'type'     => 'select',
            'title'    => esc_html__('Header Layouts', 'pestro'),
            'subtitle' => esc_html__('Choose a header for the home page. Elementor templates appear here automatically once created.', 'pestro'),
            'options'  => pestro_get_header_type_choices(),
            'default'  => 'layout-transparent',
        ],
        [
            'id'       => 'inner_header_switcher',
            'type'     => 'switch',
            'title'    => esc_html__('Inner Page Header', 'pestro'),
            'indent'   => true,
            'default'  => false,
        ],
        [
            'id'       => 'inner_header_layout',
            'type'     => 'select',
            'title'    => esc_html__('Inner Pages Header', 'pestro'),
            'subtitle' => esc_html__('Choose a header for all inner pages.', 'pestro'),
            'required' => ['inner_header_switcher', '=', true],
            'options'  => pestro_get_header_type_choices(),
            'default'  => 'layout-transparent',
        ],
        [
            'id'          => 'header_logo_width',
            'type'        => 'dimensions',
            'units'       => ['em', 'px', '%'],
            'title'       => esc_html__('Button Border Radius', 'pestro'),
            'output'      => ['.header-button a'],
            'required' => [
                ['header_variation', '=', 'layout-one'],
                ['header_button',      '=', true]
            ],
        ],
        // ── Header Button ──────────────────────────────────
        [
            'id'       => 'header_button_switcher',
            'type'     => 'section',
            'title'    => esc_html__('Header Button', 'pestro'),
            'subtitle' => esc_html__('Configure the header button settings.', 'pestro'),
            'indent'   => true,
            'required' => [
                ['header_variation', '=', 'layout-one'],
                ['header_variation', '=', 'layout-transparent'],
                ['header_button',      '=', true]
            ],
        ],
        [
            'id'       => 'header_button',
            'type'     => 'switch',
            'title'    => esc_html__('Enable/Disable Button', 'pestro'),
            'required' => ['header_variation', '=', 'layout-one'],
            'indent'   => true,
            'default'  => true,
        ],
        [
            'id'       => 'header_button_text',
            'type'     => 'text',
            'title'    => esc_html__('Button Text', 'pestro'),
            'required' => [
                ['header_variation', '=', 'layout-one'],
                ['header_variation', '=', 'layout-transparent'],
                ['header_button',      '=', true]
            ],
            'default'  => 'Book A Service',
        ],
        [
            'id'                    => 'header_button_bg_color',
            'type'                  => 'background',
            'background-repeat'     => false,
            'background-attachment' => false,
            'background-position'   => false,
            'background-image'      => false,
            'background-size'       => false,
            'preview'               => false,
            'transparent'           => false,
            'title'                 => esc_html__('Button Background', 'pestro'),
            'output'                => ['.header-button a'],
            'required' => [
                ['header_variation', '=', 'layout-one'],
                ['header_variation', '=', 'layout-transparent'],
                ['header_button',      '=', true]
            ],
        ],
        [
            'id'                    => 'header_button_hover_bg_color',
            'type'                  => 'background',
            'background-repeat'     => false,
            'background-attachment' => false,
            'background-position'   => false,
            'background-image'      => false,
            'background-size'       => false,
            'preview'               => false,
            'transparent'           => false,
            'title'                 => esc_html__('Button Hover Background', 'pestro'),
            'output'                => ['.header-button a:hover'],
            'required' => [
                ['header_variation', '=', 'layout-one'],
                ['header_variation', '=', 'layout-transparent'],
                ['header_button',      '=', true]
            ],
        ],
        [
            'id'          => 'header_button_text_color',
            'type'        => 'color',
            'transparent' => false,
            'title'       => esc_html__('Button Text Color', 'pestro'),
            'output'      => ['.header-button a'],
            'required' => [
                ['header_variation', '=', 'layout-one'],
                ['header_variation', '=', 'layout-transparent'],
                ['header_button',      '=', true]
            ],
        ],
        [
            'id'          => 'header_button_hover_text_color',
            'type'        => 'color',
            'transparent' => false,
            'title'       => esc_html__('Button Text Hover Color', 'pestro'),
            'output'      => ['.header-button a:hover'],
            'required' => [
                ['header_variation', '=', 'layout-one'],
                ['header_variation', '=', 'layout-transparent'],
                ['header_button',      '=', true]
            ],
        ],
        [
            'id'          => 'header_button_border_radius',
            'type'        => 'dimensions',
            'units'       => ['em', 'px', '%'],
            'title'       => esc_html__('Button Border Radius', 'pestro'),
            'output'      => ['.header-button a'],
            'required' => [
                ['header_variation', '=', 'layout-one'],
                ['header_variation', '=', 'layout-transparent'],
                ['header_button',      '=', true]
            ],
        ]
    ],
]);
