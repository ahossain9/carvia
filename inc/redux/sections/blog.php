<?php

/**
 * Redux: Blog Section
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

Redux::set_section('pestro_options', [
    'title'  => esc_html__('Blog', 'pestro'),
    'id'     => 'blog',
    'icon'   => 'el el-pencil',
    'fields' => [

        [
            'id'       => 'blog_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Blog Layout', 'pestro'),
            'subtitle' => esc_html__('Choose the blog archive layout.', 'pestro'),
            'options'  => [
                'grid' => [
                    'alt'   => esc_html__('Grid', 'pestro'),
                    'title' => esc_html__('Grid', 'pestro'),
                    'img'   => PESTRO_INC_URI . 'redux/assets/left-sidebar.png',
                ],
                'list' => [
                    'alt'   => esc_html__('List', 'pestro'),
                    'title' => esc_html__('List', 'pestro'),
                    'img'   => PESTRO_INC_URI . 'redux/assets/left-sidebar.png',
                ],
            ],
            'default'  => 'grid',
        ],
        [
            'id'      => 'blog_sidebar',
            'type'    => 'select',
            'title'   => esc_html__('Blog Sidebar Position', 'pestro'),
            'required' => ['blog_layout', '=', 'list'],
            'options' => [
                'right' => esc_html__('Right Sidebar', 'pestro'),
                'left'  => esc_html__('Left Sidebar', 'pestro'),
                'none'  => esc_html__('No Sidebar', 'pestro'),
            ],
            'default' => 'right',
        ],
        [
            'id'      => 'show_excerpt',
            'type'    => 'switch',
            'title'   => esc_html__('Show Post Excerpt', 'pestro'),
            'default' => true,
        ],
        [
            'id'      => 'excerpt_length',
            'type'    => 'spinner',
            'title'   => esc_html__('Excerpt Word Length', 'pestro'),
            'min'     => 10,
            'max'     => 100,
            'step'    => 5,
            'default' => 25,
            'required' => ['show_excerpt', '=', true],
         ],
        [
            'id'      => 'show_post_meta',
            'type'    => 'checkbox',
            'title'   => esc_html__('Post Meta Items', 'pestro'),
            'options' => [
                'date'     => esc_html__('Date', 'pestro'),
                'author'   => esc_html__('Author', 'pestro'),
                'category' => esc_html__('Category', 'pestro'),
            ],
            'default' => [
                'date'     => '1',
                'author'   => '1',
                'category' => '0',
            ],
        ],

    ],
]);
