<?php

/**
 * Redux: Footer Section
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Build dynamic footer choices including Carvia Footer CPT
 */
function carvia_get_footer_type_choices()
{ // Changed prefix to carvia
    $choices = [
        'default' => esc_html__('Theme Footer — Default', 'carvia'),
    ];

    // 2. Query the 'carvia_footer' custom post type
    $custom_footers = get_posts([
        'post_type'      => 'carvia-footer',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ]);

    if (! empty($custom_footers)) {
        foreach ($custom_footers as $footer) {
            $choices[$footer->ID] = esc_html($footer->post_title);
        }
    }

    return apply_filters('carvia_redux_footer_choices', $choices);
}

Redux::set_section('carvia_options', [
    'title'  => esc_html__('Footer', 'carvia'),
    'id'     => 'footer',
    'icon'   => 'el el-credit-card',
    'fields' => [
        [
            'id'       => 'footer_layout',
            'type'     => 'select',
            'title'    => esc_html__('Footer Template', 'carvia'), // Fixed text domain
            'subtitle' => esc_html__('Choose a footer layout. Custom layouts from Carvia Footer appear here.', 'carvia'),
            'options'  => carvia_get_footer_type_choices(),
            'default'  => 'default',
        ],
        [
            'id'      => 'footer_copyright',
            'type'    => 'text',
            'title'   => esc_html__('Copyright Text', 'carvia'),
            // Note: wp_date('Y') is better than date('Y') for WP sites
            'default' => sprintf(esc_html__('© %s Carvia. All rights reserved.', 'carvia'), wp_date('Y')),
        ],
    ],
]);
