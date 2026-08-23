<?php

/**
 * Archive Template for Services
 */

get_header();
?>

<main class="carvia-services-archive">
    <div class="container">
        <?php if (have_posts()) : ?>

            <!-- Start row -->
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $service_icon  = function_exists('rwmb_meta') ? rwmb_meta('carvia_service_icon', ['size' => 'thumbnail']) : '';
                    $service_image = function_exists('rwmb_meta') ? rwmb_meta('carvia_service_image', ['size' => 'large']) : '';
                    $short_desc    = function_exists('rwmb_meta') ? rwmb_meta('carvia_service_short_description') : '';
                    ?>

                    <div class="col-lg-4 col-md-6">
                        <!-- Start service card -->
                        <div class="service-card">
                            <?php if (! empty($service_icon['url'])) : ?>
                                <div class="service-icon">
                                    <img src="<?php echo esc_url($service_icon['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?> icon">
                                </div>
                            <?php endif; ?>

                            <h3>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <?php if (! empty($short_desc)) : ?>
                                <div class="service-short-description">
                                    <?php echo esc_html($short_desc); ?>
                                </div>
                            <?php else : ?>
                                <?php the_excerpt(); ?>
                            <?php endif; ?>

                            <?php if (! empty($service_image['url']) || has_post_thumbnail()) : ?>
                                <div class="service-image">
                                    <?php if (! empty($service_image['url'])) : ?>
                                        <img src="<?php echo esc_url($service_image['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                    <?php elseif (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" class="service-image">
                                            <?php the_post_thumbnail('large'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>

                        </div>
                        <!-- End service card -->
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- End row -->

            <?php the_posts_pagination(); ?>

        <?php else : ?>

            <p><?php esc_html_e('No services found.', 'carvia'); ?></p>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>