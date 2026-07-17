<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pestro
 */

get_header();

?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <div class="product-list">
                <?php woocommerce_content(); ?>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php


get_footer();
