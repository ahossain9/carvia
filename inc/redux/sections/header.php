<?php

/**
 * Redux: Header Section
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

// ── Build dynamic header choices including Elementor templates ──
function carvia_get_header_type_choices()
{
    // 1. Define your hardcoded theme headers
    $choices = [
        'layout-one'         => esc_html__('Header One',      'carvia'),
        'layout-transparent' => esc_html__('Header Transparent', 'carvia'),
    ];

    // 2. Query the 'carvia_header' custom post type
    $custom_headers = get_posts([
        'post_type'      => 'carvia-header',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ]);

    // 3. Loop through and add them to the array
    if (! empty($custom_headers)) {
        foreach ($custom_headers as $header) {
            $choices[$header->ID] = $header->post_title;
        }
    }

    return apply_filters('carvia_redux_header_choices', $choices);
}

Redux::set_section('carvia_options', [
    'title'  => esc_html__('Header', 'carvia'),
    'id'     => 'header',
    'desc'   => esc_html__('Configure header settings.', 'carvia'),
    'icon'   => 'el el-website',
    'fields' => [

        // ── Logo ──────────────────────────────────────────────
        [
            'id'       => 'header_logo',
            'type'     => 'media',
            'title'    => esc_html__('Header Logo', 'carvia'),
            'subtitle' => esc_html__('Upload your main header logo.', 'carvia'),
            'default'  => ['url' => CARVIA_ASSETS . 'images/logo.png'],
            'desc' => esc_html('Recommended logo size 198x36 pixel', 'carvia')
        ],

        // ── Header Variation ──────────────────────────────────
        [
            'id'       => 'header_variation',
            'type'     => 'select',
            'title'    => esc_html__('Header Layouts', 'carvia'),
            'subtitle' => esc_html__('Choose a header for the home page. Elementor templates appear here automatically once created.', 'carvia'),
            'options'  => carvia_get_header_type_choices(),
            'default'  => 'layout-transparent',
        ],
        [
            'id'       => 'inner_header_switcher',
            'type'     => 'switch',
            'title'    => esc_html__('Inner Page Header', 'carvia'),
            'indent'   => true,
            'default'  => false,
        ],
        [
            'id'       => 'inner_header_layout',
            'type'     => 'select',
            'title'    => esc_html__('Inner Pages Header', 'carvia'),
            'subtitle' => esc_html__('Choose a header for all inner pages.', 'carvia'),
            'required' => ['inner_header_switcher', '=', true],
            'options'  => carvia_get_header_type_choices(),
            'default'  => 'layout-transparent',
        ],
        [
            'id'          => 'header_logo_width',
            'type'        => 'dimensions',
            'units'       => ['em', 'px', '%'],
            'title'       => esc_html__('Button Border Radius', 'carvia'),
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
            'title'    => esc_html__('Header Button', 'carvia'),
            'subtitle' => esc_html__('Configure the header button settings.', 'carvia'),
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
            'title'    => esc_html__('Enable/Disable Button', 'carvia'),
            'required' => ['header_variation', '=', 'layout-one'],
            'indent'   => true,
            'default'  => true,
        ],
        [
            'id'       => 'header_button_text',
            'type'     => 'text',
            'title'    => esc_html__('Button Text', 'carvia'),
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
            'title'                 => esc_html__('Button Background', 'carvia'),
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
            'title'                 => esc_html__('Button Hover Background', 'carvia'),
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
            'title'       => esc_html__('Button Text Color', 'carvia'),
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
            'title'       => esc_html__('Button Text Hover Color', 'carvia'),
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
            'title'       => esc_html__('Button Border Radius', 'carvia'),
            'output'      => ['.header-button a'],
            'required' => [
                ['header_variation', '=', 'layout-one'],
                ['header_variation', '=', 'layout-transparent'],
                ['header_button',      '=', true]
            ],
        ]
    ],
]);
