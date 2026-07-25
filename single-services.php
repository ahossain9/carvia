<?php

/**
 * Template for Services Custom Post Type
 */
get_header(); ?>

<main id="primary" class="site-main carvia-service-single">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
