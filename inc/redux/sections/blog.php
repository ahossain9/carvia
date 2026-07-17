<?php

/**
 * Redux: Blog Section
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

Redux::set_section('carvia_options', [
    'title'  => esc_html__('Blog', 'carvia'),
    'id'     => 'blog',
    'icon'   => 'el el-pencil',
    'fields' => [

        [
            'id'       => 'blog_layout',
            'type'     => 'image_select',
            'title'    => esc_html__('Blog Layout', 'carvia'),
            'subtitle' => esc_html__('Choose the blog archive layout.', 'carvia'),
            'options'  => [
                'grid' => [
                    'alt'   => esc_html__('Grid', 'carvia'),
                    'title' => esc_html__('Grid', 'carvia'),
                    'img'   => CARVIA_INC_URI . 'redux/assets/left-sidebar.png',
                ],
                'list' => [
                    'alt'   => esc_html__('List', 'carvia'),
                    'title' => esc_html__('List', 'carvia'),
                    'img'   => CARVIA_INC_URI . 'redux/assets/left-sidebar.png',
                ],
            ],
            'default'  => 'grid',
        ],
        [
            'id'      => 'blog_sidebar',
            'type'    => 'select',
            'title'   => esc_html__('Blog Sidebar Position', 'carvia'),
            'required' => ['blog_layout', '=', 'list'],
            'options' => [
                'right' => esc_html__('Right Sidebar', 'carvia'),
                'left'  => esc_html__('Left Sidebar', 'carvia'),
                'none'  => esc_html__('No Sidebar', 'carvia'),
            ],
            'default' => 'right',
        ],
        [
            'id'      => 'show_excerpt',
            'type'    => 'switch',
            'title'   => esc_html__('Show Post Excerpt', 'carvia'),
            'default' => true,
        ],
        [
            'id'      => 'excerpt_length',
            'type'    => 'spinner',
            'title'   => esc_html__('Excerpt Word Length', 'carvia'),
            'min'     => 10,
            'max'     => 100,
            'step'    => 5,
            'default' => 25,
            'required' => ['show_excerpt', '=', true],
        ],
        [
            'id'      => 'show_post_meta',
            'type'    => 'checkbox',
            'title'   => esc_html__('Post Meta Items', 'carvia'),
            'options' => [
                'date'     => esc_html__('Date', 'carvia'),
                'author'   => esc_html__('Author', 'carvia'),
                'category' => esc_html__('Category', 'carvia'),
            ],
            'default' => [
                'date'     => '1',
                'author'   => '1',
                'category' => '0',
            ],
        ],

    ],
]);
