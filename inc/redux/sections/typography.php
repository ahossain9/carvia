<?php

/**
 * Redux: Typography Section
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

Redux::set_section('pestro_options', [
    'title'  => esc_html__('Typography', 'pestro'),
    'id'     => 'typography',
    'icon'   => 'el el-font',
    'fields' => [

        [
            'id'          => 'body_font',
            'type'        => 'typography',
            'title'       => esc_html__('Body Font', 'pestro'),
            'subtitle'    => esc_html__('Set the main body text font.', 'pestro'),
            'font-style'  => false,
            'subsets'     => false,
            'text-align'  => false,
            'font-backup' => false,
            'line-height' => false,
            'output'      => ['body #page'],
            'default'     => [
                'font-family'  => 'Inter',
                'font-size'    => '16px',
            ],
        ],
        [
            'id'          => 'heading_font',
            'type'        => 'typography',
            'title'       => esc_html__('Heading Font', 'pestro'),
            'subtitle'    => esc_html__('Applied to all h1–h6 elements.', 'pestro'),
            'font-style'  => false,
            'subsets'     => false,
            'text-align'  => false,
            'font-backup' => false,
            'line-height' => false,
            'font-size'   => false,
            'output'      => ['#page h1, #page h2, #page h3, #page h4, #page h5, #page h6'],
            'default'     => [
                'font-family' => 'Plus Jakarta Sans',
                'font-weight' => '700'
            ],
        ],
    ],
]);
