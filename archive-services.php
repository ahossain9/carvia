<?php

/**
 * Archive Template for Services
 */

get_header();
?>

<main class="carvia-services-archive">
    <div class="container">
<h2>Amir Hossain</h2>
        <?php if (have_posts()) : ?>

            <div class="row">

                <?php while (have_posts()) : the_post(); ?>

                    <div class="col-lg-4 col-md-6">
                        <article <?php post_class('service-item'); ?>>

                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            <?php endif; ?>

                            <h3>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <?php the_excerpt(); ?>

                        </article>
                    </div>

                <?php endwhile; ?>

            </div>

            <?php the_posts_pagination(); ?>

        <?php else : ?>

            <p><?php esc_html_e('No services found.', 'carvia'); ?></p>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>