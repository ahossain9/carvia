<?php

/**
 * Template Name: Full Width Page
 *
 * @package Pestro
 */

get_header();
?>

<main id="primary" class="site-main pestro-page pestro-page--full-width">
    <?php
    while (have_posts()) :
        the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>