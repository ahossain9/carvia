<?php if (!is_front_page()): ?>
    <div class="page-header-area">
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
                <?php pestro_breadcrumbs(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>