<?php

/**
 * Redux: Page Header Section
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

Redux::set_section('pestro_options', [
    'title'  => esc_html__('Page Header', 'pestro'),
    'id'     => 'page-header',
    'desc'   => esc_html__('Page header settings.', 'pestro'),
    'icon'   => 'el el-home',
    'fields' => [

        // ── Page Header ───────────────────────────────────────
        [
            'id'       => 'section_page_header',
            'type'     => 'section',
            'title'    => esc_html__('Page Header Settings', 'pestro'),
            'indent'   => true,
        ],
        [
            'id'      => 'show_page_header',
            'type'    => 'switch',
            'title'   => esc_html__('Show Page Header', 'pestro'),
            'default' => true,
        ],
        [
            'id'       => 'page-header-layout',
            'type'     => 'select',
            'title'    => __('Choose Layout', 'pestro'),
            'desc'     => __('You can choose page header layout from here', 'pestro'),
            'options'  => [
                'layout-one' => esc_html__('Layout One', 'pestro')
            ],
            'default'  => 'layout-one',
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page_header_bg',
            'type'     => 'media',
            'title'    => esc_html__('Background Image', 'pestro'),
            'output'   => ['.page-header-area'],
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page-header-bg-color',
            'type'     => 'color',
            'title'    => __('Background Color', 'pestro'),
            'output'   => ['.page-header-area'],
            'desc'     => esc_html__('Choose page background color from here.', 'pestro'),
            'mode'     => 'background',
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page-header-overlay',
            'type'     => 'color_rgba',
            'output'   => ['.page-header-area::before'],
            'title'    => esc_html__('Background Overlay Color', 'pestro'),
            'desc'     => esc_html__('Choose page title background overlay color from here.', 'pestro'),
            'mode'     => 'background',
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page-header-title-color',
            'type'     => 'color',
            'title'    => __('Title Color', 'pestro'),
            'output'   => ['.page-header-area .title-content h1'],
            'desc'     => esc_html__('Choose page title color from here.', 'pestro'),
            'validate' => 'color',
            'required' => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'page-header-align',
            'type'     => 'button_set',
            'title'    => esc_html__('Text Alignment', 'pestro'),
            'desc'     => esc_html__('Select page title text alignment from here.', 'pestro'),
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
            'title'          => __('Spacing', 'pestro'),
            'desc'           => __('Change page title area spacing from here', 'pestro'),
            'required'       => ['show_page_header', '=', true],
        ],
        [
            'id'         => 'page-header-typography',
            'type'       => 'typography',
            'google'     => true,
            'title'      => esc_html__('Title Font', 'pestro'),
            'output'     => ['.page-header-area h1'],
            'subsets'    => false,
            'text-align' => false,
            'color'      => false,
            'desc'       => esc_html__('Choose page title typography from here', 'pestro'),
            'required'   => ['show_page_header', '=', true],
        ],
        [
            'id'       => 'show_breadcrumbs',
            'type'     => 'switch',
            'title'    => esc_html__('Show Breadcrumbs', 'pestro'),
            'required' => ['show_page_header', '=', true],
            'default'  => true,
        ],
        [
            'id'         => 'page-header-breadcrumb-typography',
            'type'       => 'typography',
            'google'     => true,
            'title'      => esc_html__('Breadcrum Font', 'pestro'),
            'output'     => ['.page-header-area .pestro-page-header__breadcrumb li, .page-header-area .pestro-page-header__breadcrumb li a'],
            'subsets'    => false,
            'text-align' => false,
            'color'      => false,
            'desc'       => esc_html__('Choose breadcrumb typography from here', 'pestro'),
            'required'   => [
                ['show_page_header', '=', true],
                ['show_breadcrumbs', '=', true]
            ]
        ],
        [
            'id'       => 'page-header-breadcrumb-text-color',
            'type'     => 'color',
            'title'    => __('Breadcrumb Text Color', 'pestro'),
            'output'   => ['.page-header-area .pestro-page-header__breadcrumb li, .page-header-area .pestro-page-header__breadcrumb li a'],
            'desc'     => esc_html__('Choose breadcrumb text color from here.', 'pestro'),
            'validate' => 'color',
            'required'   => [
                ['show_page_header', '=', true],
                ['show_breadcrumbs', '=', true]
            ]
        ],

    ],
]);
