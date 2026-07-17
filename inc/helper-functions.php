<?php

// Safely retrieve a value from an array by key, with a default fallback.
if (!function_exists('carvia_array_get')) {

    function carvia_array_get($array, $key, $default = null)
    {
        if (!is_array($array)) {
            return $default;
        }

        return array_key_exists($key, $array) ? $array[$key] : $default;
    }
}

/**
 * WooCommerce products number per row to 3
 */

if (!function_exists('loop_columns')) {
    function carvia_product_per_row()
    {
        return 3; // 3 products per row
    }
}
add_filter('loop_shop_columns', 'carvia_product_per_row', 999);


/**
 * Change number of products that are displayed per page (shop page)
 */

function new_loop_shop_per_page($cols)
{
    $cols = 9;
    return $cols;
}
add_filter('loop_shop_per_page', 'new_loop_shop_per_page', 20);

/**
 * Remove WooCommerce shop page default title
 */
add_filter('woocommerce_show_page_title', 'remove_shop_page_title');
function remove_shop_page_title()
{
    return boolval(!is_shop());
}

/**
 * Change WooCoomerce product markup
 */
function carvia_before_shop_loop_item_title()
{
    echo '<div class="carvia-wc-product-info">';
    woocommerce_template_loop_add_to_cart();
    echo '<h2 class="woocommerce-loop-product__title carvia-wc-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
}
add_action('woocommerce_before_shop_loop_item_title', 'carvia_before_shop_loop_item_title', 10);

function carvia_after_shop_loop_item_title()
{
    echo '</div>';
}
add_action('woocommerce_after_shop_loop_item_title', 'carvia_after_shop_loop_item_title', 10);


function carvia_before_shop_loop_item()
{
    echo '<div class="product-content">';
}
add_action('woocommerce_before_shop_loop_item', 'carvia_before_shop_loop_item', 10);

function carvia_after_shop_loop_item()
{
    echo '</div>';
}
add_action('woocommerce_after_shop_loop_item', 'carvia_after_shop_loop_item', 10);

/**
 * WooCommerce  Search Field
 *
 */
function carvia_custom_product_searchform($form)
{

    $form = '
        <form method="get" id="searchform" action="' . esc_url(home_url('/')) . '">
            <div class="wc-search-form">
                <label class="screen-reader-text" for="s">' . esc_html__('Search for:', 'carvia') . '</label>
                <input class="wc-search-input" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __('Search', 'carvia') . '"/>
                <button class="wc-search-btn" type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>  
                <input type="hidden" name="post_type" value="product" />
            </div>
        </form>';

    return $form;
}
add_filter('get_product_search_form', 'carvia_custom_product_searchform');


// Get a list of published posts for a given post type for Redux Framerwork
function carvia_get_layout_posts_for_redux($post_type = '')
{
    if (empty($post_type)) {
        return [];
    }

    $posts = get_posts([
        'post_type'      => $post_type,
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ]);

    $options = [];

    if (! empty($posts) && ! is_wp_error($posts)) {
        foreach ($posts as $post) {
            $options[$post->ID] = $post->post_title;
        }
    }

    return $options;
}
