<?php

/**
 * Redux: Page Header Section
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

Redux::set_section('carvia_options', [
    'title'  => esc_html__('Page Header', 'carvia'),
    'id'     => 'page-header',
    'desc'   => esc_html__('Page header settings.', 'carvia'),
    'icon'   => 'el el-home',
    'fields' => [

        // ── Page Header ───────────────────────────────────────
        [
            'id'       => 'section_page_header',
            'type'     => 'section',
            'title'    => esc_html__('Page Header Settings', 'carvia'),
            'indent'   => true,
        ],
        [
            'id'      => 'show_page_header',
            'type'    => 'switch',
            'title'   => esc_html__('Show Page Header', 'carvia'),
            'default' => true,
        ],
        [
            'id'       => 'page-header-layout',
            'type'     => 'select',
            'title'    => __('Choose Layout', 'carvia'),
            'desc'     => __('You can choose page header layout from here', 'carvia'),
            'options'  => [
                'layout-one' => esc_html__('Layout One', 'carvia')
            ],
            'default'  => 'layout-one',
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page_header_bg',
            'type'     => 'media',
            'title'    => esc_html__('Background Image', 'carvia'),
            'output'   => ['.page-header-area'],
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page-header-bg-color',
            'type'     => 'color',
            'title'    => __('Background Color', 'carvia'),
            'output'   => ['.page-header-area'],
            'desc'     => esc_html__('Choose page background color from here.', 'carvia'),
            'mode'     => 'background',
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page-header-overlay',
            'type'     => 'color_rgba',
            'output'   => ['.page-header-area::before'],
            'title'    => esc_html__('Background Overlay Color', 'carvia'),
            'desc'     => esc_html__('Choose page title background overlay color from here.', 'carvia'),
            'mode'     => 'background',
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page-header-title-color',
            'type'     => 'color',
            'title'    => __('Title Color', 'carvia'),
            'output'   => ['.page-header-area .title-content h1'],
            'desc'     => esc_html__('Choose page title color from here.', 'carvia'),
            'validate' => 'color',
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page-header-align',
            'type'     => 'button_set',
            'title'    => esc_html__('Text Alignment', 'carvia'),
            'desc'     => esc_html__('Select page title text alignment from here.', 'carvia'),
            'required' => ['show_page_header', '=', true],
            'output'   => ['.page-header-area .title-content'],
            'options'  => [
                'left'   => 'Left',
                'center' => 'Center',
                'right'  => 'Right',
            ],
            'default' => 'center',
        ],
        [
            'id'             => 'page-header-spacing',
            'type'           => 'spacing',
            'output'         => ['.page-header-area'],
            'mode'           => 'padding',
            'units'          => ['px'],
            'units_extended' => 'false',
            'left'           => 'false',
            'right'          => 'false',
            'title'          => __('Spacing', 'carvia'),
            'desc'           => __('Change page title area spacing from here', 'carvia'),
            'required'       => ['show_page_header', '=', true],
        ],
        [
            'id'         => 'page-header-typography',
            'type'       => 'typography',
            'google'     => true,
            'title'      => esc_html__('Title Font', 'carvia'),
            'output'     => ['.page-header-area h1'],
            'subsets'    => false,
            'text-align' => false,
            'color'      => false,
            'desc'       => esc_html__('Choose page title typography from here', 'carvia'),
            'required'   => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'show_breadcrumbs',
            'type'     => 'switch',
            'title'    => esc_html__('Show Breadcrumbs', 'carvia'),
            'required' => ['show_page_header', '=', true],
            'default'  => true,
        ],
        [
            'id'         => 'page-header-breadcrumb-typography',
            'type'       => 'typography',
            'google'     => true,
            'title'      => esc_html__('Breadcrum Font', 'carvia'),
            'output'     => ['.page-header-area .carvia-page-header__breadcrumb li, .page-header-area .carvia-page-header__breadcrumb li a'],
            'subsets'    => false,
            'text-align' => false,
            'color'      => false,
            'desc'       => esc_html__('Choose breadcrumb typography from here', 'carvia'),
            'required'   => [
                ['show_page_header', '=', true],
                ['show_breadcrumbs', '=', true]
            ]
        ],
        [
            'id'       => 'page-header-breadcrumb-text-color',
            'type'     => 'color',
            'title'    => __('Breadcrumb Text Color', 'carvia'),
            'output'   => ['.page-header-area .carvia-page-header__breadcrumb li, .page-header-area .carvia-page-header__breadcrumb li a'],
            'desc'     => esc_html__('Choose breadcrumb text color from here.', 'carvia'),
            'validate' => 'color',
            'required'   => [
                ['show_page_header', '=', true],
                ['show_breadcrumbs', '=', true]
            ]
        ],

    ],
]);
