<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carvia_register_sidebars()
{
    // Blog Sidebar
    register_sidebar([
        'name'          => esc_html__('Blog Sidebar', 'carvia'),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__('Widgets in this area will be shown in the blog/archive sidebar.', 'carvia'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}

add_action('widgets_init', 'carvia_register_sidebars');
