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
                    'id'      => 'carvia_header_layout',
                    'type'    => 'select',
                    'options' => $header_choices,
                    'std'     => '',
                    'desc'    => esc_html__('Override the global header for this page. Leave as "Default" to use the Theme Options setting.', 'carvia'),
                ],

                // ── Page Header Background Image ──────────────────────
                [
                    'name'             => esc_html__('Page Header Background Image', 'carvia'),
                    'id'               => 'carvia_page_header_image',
                    'type'             => 'image_advanced',
                    'max_file_uploads' => 1,
                    'return_value'     => 'url',
                    'desc'             => esc_html__('Override the global page header background for this page.', 'carvia'),
                ],

                // ── Footer Selection ──────────────────────────────────
                [
                    'name'    => esc_html__('Footer Layout', 'carvia'),
                    'id'      => 'carvia_footer_type',
                    'type'    => 'select',
                    'options' => $footer_choices,
                    'std'     => '',
                    'desc'    => esc_html__('Override the global footer for this page. Leave as "Default" to use the Theme Options setting.', 'carvia'),
                ],
            ],
        ];

        // ── Cars ──────────────────────────────
        $meta_boxes[] = [
            'id'         => 'carvia_car_details',
            'title'      => __('Car Details', 'carvia'),
            'post_types' => ['cars'],
            'fields'     => [
                [
                    'id'         => 'carvia_car_image',
                    'type'       => 'single_image',
                    'name'       => esc_html__('Image', 'carvia'),
                    'desc'       => esc_html__('Add an image for car.', 'carvia'),
                ],
                [
                    'id'          => 'carvia_car_rental_price',
                    'type'        => 'text',
                    'name'        => esc_html__('Rental Price', 'carvia'),
                    'desc'        => esc_html__('Enter rental price with currency', 'carvia'),
                    'placeholder' => esc_html__('Enter Rental Price', 'carvia'),
                ],
                [
                    'id'          => 'carvia_car_rental_duration',
                    'type'        => 'text',
                    'name'        => esc_html__('Rental Duration', 'carvia'),
                    'desc'        => esc_html__('Enter the car rental duration', 'carvia'),
                    'placeholder' => esc_html__('Enter the rental duration', 'carvia'),
                ],
                [
                    'id'          => 'carvia_car_model_name',
                    'type'        => 'text',
                    'name'        => esc_html__('Model Name', 'carvia'),
                    'desc'        => esc_html__('Enter the car model name', 'carvia'),
                    'placeholder' => esc_html__('Add model name here', 'carvia'),
                ],
                [
                    'id'          => 'carvia_car_specs',
                    'name'        => __('Specifications', 'carvia'),
                    'type'        => 'key_value',
                    'desc'        => __('Add Label and Value pairs', 'carvia'),
                    'placeholder' => [
                        'key'   => __('Label', 'carvia'),
                        'value' => __('Value', 'carvia'),
                    ],
                ],
            ],
        ];
        // ── Service ──────────────────────────────
        $meta_boxes[] = [
            'id'         => 'carvia_service_details',
            'title'      => esc_html__('Service Details', 'carvia'),
            'post_types' => ['services'],
            'context'    => 'normal',
            'priority'   => 'high',
            'fields'     => [
                [
                    'id'         => 'carvia_service_icon',
                    'type'       => 'single_image',
                    'name'       => esc_html__('Icon', 'carvia'),
                    'desc'       => esc_html__('Add an icon for service.', 'carvia'),
                ],
                [
                    'id'         => 'carvia_service_image',
                    'type'       => 'single_image',
                    'name'       => esc_html__('Image', 'carvia'),
                    'desc'       => esc_html__('Add an image for service.', 'carvia'),
                ],
                [
                    'id'         => 'carvia_service_short_description',
                    'type'       => 'textarea',
                    'name'       => esc_html__('Short Description', 'carvia'),
                    'desc'       => esc_html__('Service short description', 'carvia'),
                    'placeholder'=> esc_html__('Add short description here', 'carvia'),
                ],
            ],
        ];

        return $meta_boxes;
    }

endif;

add_filter('rwmb_meta_boxes', 'carvia_register_meta_boxes');
