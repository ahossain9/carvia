<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carvia_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'carvia'),
        'id'            => 'sidebar',
        'description'   => esc_html__('Add widgets here.', 'carvia'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Shop Sidebar', 'carvia'),
        'id'            => 'shop-sidebar',
        'description'   => esc_html__('Add widgets here.', 'carvia'),
        'before_widget' => '<section id="%1$s" class="widget shop-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}

add_action('widgets_init', 'carvia_widgets_init');
