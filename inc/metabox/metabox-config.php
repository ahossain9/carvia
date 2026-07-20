<?php

/**
 * Meta Box Configuration
 * Requires: Meta Box plugin (https://metabox.io)
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! function_exists('carvia_register_meta_boxes')) :

    function carvia_register_meta_boxes($meta_boxes)
    {

        // ── Build header choices (mirrors Redux header choices) ─────────
        $header_choices = [
            '' => esc_html__('Default (from Theme Options)', 'carvia'),
        ];

        $custom_headers = get_posts([
            'post_type'      => 'carvia-header',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
        ]);

        if (! empty($custom_headers)) {
            foreach ($custom_headers as $hdr) {
                $header_choices[strval($hdr->ID)] = $hdr->post_title;
            }
        }

        // ── Build footer choices (mirrors Redux footer choices) ─────────
        $footer_choices = [
            '' => esc_html__('Default (from Theme Options)', 'carvia'),
        ];

        $custom_footers = get_posts([
            'post_type'      => 'carvia-footer',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
        ]);

        if (! empty($custom_footers)) {
            foreach ($custom_footers as $ftr) {
                $footer_choices[strval($ftr->ID)] = $ftr->post_title;
            }
        }

        // ── Page / Post Settings ───────────────────────────────────────
        $meta_boxes[] = [
            'id'         => 'carvia_page_settings',
            'title'      => esc_html__('Page Settings', 'carvia'),
            'post_types' => ['post', 'page', 'carvia-service', 'carvia-project'],
            'context'    => 'normal',
            'priority'   => 'high',
            'fields'     => [

                // ── Header Selection ──────────────────────────────────
                [
                    'name'    => esc_html__('Page Header Layout', 'carvia'),
                    'id'      => '_carvia_header_layout',
                    'type'    => 'select',
                    'options' => $header_choices,
                    'std'     => '',
                    'desc'    => esc_html__('Override the global header for this page. Leave as "Default" to use the Theme Options setting.', 'carvia'),
                ],

                // ── Page Header Background Image ──────────────────────
                [
                    'name'             => esc_html__('Page Header Background Image', 'carvia'),
                    'id'               => '_carvia_page_header_image',
                    'type'             => 'image_advanced',
                    'max_file_uploads' => 1,
                    'return_value'     => 'url',
                    'desc'             => esc_html__('Override the global page header background for this page.', 'carvia'),
                ],

                // ── Footer Selection ──────────────────────────────────
                [
                    'name'    => esc_html__('Footer Layout', 'carvia'),
                    'id'      => '_carvia_footer_type',
                    'type'    => 'select',
                    'options' => $footer_choices,
                    'std'     => '',
                    'desc'    => esc_html__('Override the global footer for this page. Leave as "Default" to use the Theme Options setting.', 'carvia'),
                ],
            ],
        ];

        // ── Service ──────────────────────────────
        $meta_boxes[] = [
            'id'         => 'carvia_service_features',
            'title'      => esc_html__('Service Features', 'carvia'),
            'post_types' => ['services'],
            'context'    => 'normal',
            'priority'   => 'high',
            'fields'     => [
                [
                    'id'         => '_carvia_feature_list',
                    'type'       => 'group',
                    'name'       => esc_html__('Feature List', 'carvia'),
                    'desc'       => esc_html__('Add features/benefits included in this service. Drag to reorder.', 'carvia'),
                    'clone'      => true,
                    'sort_clone' => true,
                    'add_button' => esc_html__('+ Add Feature', 'carvia'),
                    'fields'     => [
                        [
                            'id'          => 'title',
                            'name'        => esc_html__('Feature Title', 'carvia'),
                            'type'        => 'text',
                            'placeholder' => esc_html__('e.g. Eco-Friendly Products', 'carvia'),
                        ],
                    ],
                ],
            ],
        ];

        return $meta_boxes;
    }

endif;

add_filter('rwmb_meta_boxes', 'carvia_register_meta_boxes');
