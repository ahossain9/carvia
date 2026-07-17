<?php

/**
 * Redux: Footer Section
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Build dynamic footer choices including Pestro Footer CPT
 */
function pestro_get_footer_type_choices()
{ // Changed prefix to pestro
    $choices = [
        'default' => esc_html__('Theme Footer — Default', 'pestro'),
    ];

    // 2. Query the 'pestro_footer' custom post type
    $custom_footers = get_posts([
        'post_type'      => 'pestro-footer',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ]);

    if (! empty($custom_footers)) {
        foreach ($custom_footers as $footer) {
            $choices[$footer->ID] = esc_html($footer->post_title);
        }
    }

    return apply_filters('pestro_redux_footer_choices', $choices);
}

Redux::set_section('pestro_options', [
    'title'  => esc_html__('Footer', 'pestro'),
    'id'     => 'footer',
    'icon'   => 'el el-credit-card',
    'fields' => [
        [
            'id'       => 'footer_layout',
            'type'     => 'select',
            'title'    => esc_html__('Footer Template', 'pestro'), // Fixed text domain
            'subtitle' => esc_html__('Choose a footer layout. Custom layouts from Pestro Footer appear here.', 'pestro'),
            'options'  => pestro_get_footer_type_choices(),
            'default'  => 'default',
        ],
        [
            'id'      => 'footer_copyright',
            'type'    => 'text',
            'title'   => esc_html__('Copyright Text', 'pestro'),
            // Note: wp_date('Y') is better than date('Y') for WP sites
            'default' => sprintf(esc_html__('© %s Pestro. All rights reserved.', 'pestro'), wp_date('Y')),
        ],
    ],
]);
