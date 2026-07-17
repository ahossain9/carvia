<?php
$header_layout         = pestro_option('header_variation', []);
$show_breadcrumbs      = pestro_option('show_breadcrumbs', true);
$page_header_bg_data   = pestro_option('page_header_bg', []);
$page_header_alignment = pestro_option('page-header-align', []);
$page_header_bg_url    = ! empty($page_header_bg_data['url']) ? $page_header_bg_data['url'] : '';

?>
<?php if (!is_front_page()): ?>
    <div class="page-header-area <?php echo esc_attr($header_layout );?>" style="background-image: url(<?php echo esc_url($page_header_bg_url); ?>); text-align: <?php echo esc_attr($page_header_alignment); ?>">
        <div class="container">
            <div class="title-content">
                <?php
                    if (is_search()) {
                        echo '<h1>' . esc_html__('Search result for: “', 'pestro') . esc_html(get_search_query()) . '”' . '</h1>';
                    } elseif (is_404()) {
                        echo '<h1>' . esc_html__('Page Not Found', 'pestro') . '</h1>';
                    } else {
                        esc_html(the_title('<h1>', '</h1>'));
                    }
                ?>
                <?php
                if ($show_breadcrumbs == true) {
                    pestro_breadcrumbs();
                }
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>