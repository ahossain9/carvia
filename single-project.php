<?php

/**
 * Template for Full Width Custom Post Types
 */
get_header(); ?>

<main id="primary" class="site-main full-width-content">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php
// Do NOT include get_sidebar() here
get_footer();
