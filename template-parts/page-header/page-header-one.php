<?php
$header_layout         = carvia_option('header_variation', []);
$show_breadcrumbs      = carvia_option('show_breadcrumbs', true);
$page_header_bg_data   = carvia_option('page_header_bg', []);
$page_header_alignment = carvia_option('page-header-align', []);
$page_header_bg_url    = ! empty($page_header_bg_data['url']) ? $page_header_bg_data['url'] : '';
$bg_image              = function_exists('rwmb_meta') ? rwmb_meta('carvia_page_header_image', [], get_the_ID()) : [];
$bg_image_url          = (is_array($bg_image) && ! empty($bg_image['url'])) ? $bg_image['url'] : '';

if (! empty($bg_image_url)) {
    $page_header_bg_url = $bg_image_url;
}

?>
<?php if (!is_front_page()): ?>
    <div class="page-header-area <?php echo esc_attr($header_layout); ?>" style="background-image: url(<?php echo esc_url($page_header_bg_url); ?>);text-align: <?php echo esc_attr($page_header_alignment); ?>">
        <div class="container">
            <div class="title-content">
                <?php
                if (is_search()) {
                    echo '<h1>' . esc_html__('Search result for: “', 'carvia') . esc_html(get_search_query()) . '”' . '</h1>';
                } elseif (is_404()) {
                    echo '<h1>' . esc_html__('Page Not Found', 'carvia') . '</h1>';
                } else {
                    esc_html(the_title('<h1>', '</h1>'));
                }
                ?>
                <?php
                if ($show_breadcrumbs == true) {
                    carvia_breadcrumbs();
                }
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>