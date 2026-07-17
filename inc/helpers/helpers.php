<?php

/**
 * Helper Functions
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Get Redux option safely.
 *
 * @param  string $key     Option key.
 * @param  mixed  $default Default value.
 * @return mixed
 */
function carvia_option($key, $default = '')
{
    $options = get_option('carvia_options', []);
    return isset($options[$key]) ? $options[$key] : $default;
}

/**
 * Display breadcrumbs.
 */
function carvia_breadcrumbs()
{
    $separator   = '<li class="sep" aria-hidden="true">/</li>';
    $breadcrumbs = '';

    $breadcrumbs .= '<li><a href="' . esc_url(home_url('/')) . '">'
        . esc_html__('Home', 'carvia')
        . '</a></li>';

    if (is_category() || is_single()) {
        $categories = get_the_category();
        if (! empty($categories)) {
            $breadcrumbs .= $separator;
            $breadcrumbs .= '<li><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">'
                . esc_html($categories[0]->name)
                . '</a></li>';
        }
        if (is_single()) {
            $breadcrumbs .= $separator;
            $breadcrumbs .= '<li class="active">' . get_the_title() . '</li>';
        }
    } elseif (is_page()) {
        $breadcrumbs .= $separator;
        $breadcrumbs .= '<li class="active">' . get_the_title() . '</li>';
    } elseif (is_home()) {
        $breadcrumbs .= $separator;
        $breadcrumbs .= '<li class="active">' . esc_html__('Blog', 'carvia') . '</li>';
    } elseif (is_archive()) {
        $breadcrumbs .= $separator;
        $breadcrumbs .= '<li class="active">' . get_the_archive_title() . '</li>';
    } elseif (is_search()) {
        $breadcrumbs .= $separator;
        $breadcrumbs .= '<li class="active">'
            . sprintf(
                /* translators: %s: search query */
                esc_html__('Search: %s', 'carvia'),
                esc_html(get_search_query())
            )
            . '</li>';
    } elseif (is_404()) {
        $breadcrumbs .= $separator;
        $breadcrumbs .= '<li class="active">' . esc_html__('404', 'carvia') . '</li>';
    }

    echo '<ul class="carvia-page-header__breadcrumb">' . wp_kses_post($breadcrumbs) . '</ul>'; // phpcs:ignore WordPress.Security.EscapeOutput
}
