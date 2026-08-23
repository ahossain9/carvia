<?php

/**
 * Archive Template for Cars
 */

get_header();
?>

<main class="carvia-cars-archive">
    <div class="container">
        <?php if (have_posts()) : ?>

            <!-- Start row -->
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    $service_icon    = function_exists('rwmb_meta') ? rwmb_meta('carvia_service_icon', ['size' => 'thumbnail']) : '';
                    $car_image       = function_exists('rwmb_meta') ? rwmb_meta('carvia_car_image', ['size' => 'large']) : '';
                    $short_desc      = function_exists('rwmb_meta') ? rwmb_meta('carvia_service_short_description') : '';
                    $rental_price    = function_exists('rwmb_meta') ? rwmb_meta('carvia_car_rental_price') : '';
                    $rental_duration = function_exists('rwmb_meta') ? rwmb_meta('carvia_car_rental_duration') : '';
                    $car_model       = function_exists('rwmb_meta') ? rwmb_meta('carvia_car_model_name') : '';
                    $specs           = function_exists('rwmb_meta') ? rwmb_meta('carvia_car_specs') : '';
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="car-card">
                            <div class="car-card-top-content">
                                <!-- start image -->
                                <?php if (! empty($car_image['url'])) : ?>
                                    <div class="car-card-image">
                                        <img src="<?php echo esc_url($car_image['url']); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                                    </div>
                                <?php endif; ?>
                                <!-- end image -->
                                <!-- start price -->
                                <?php if (! empty($rental_price)) : ?>
                                    <div class="car-card-price">
                                        <span class="car-rental-price">
                                            <?php echo esc_html($rental_price); ?>
                                        </span>
                                        <?php if (! empty($rental_duration)) : ?>
                                            <span class="car-rental-duration">
                                                <?php echo esc_html($rental_duration); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <!-- end price -->
                            </div>
                            <!-- start body content -->
                            <div class="car-card-body-content">
                                <!-- star title -->
                                <h3 class="car-card-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <!-- end title -->
                                <?php if (! empty($car_model)) : ?>
                                    <p class="car-model-name">
                                        <?php echo esc_html($car_model); ?>
                                    </p>
                                <?php endif; ?>
                                <?php if (! empty($specs) && is_array($specs)) : ?>
                                    <ul class="car-specs">
                                        <?php foreach ($specs as $pair) : ?>
                                            <li class="car-card-spec">
                                                <span class="spec-key"><?php echo esc_html($pair[0]); ?>:</span>
                                                <span class="spec-value"><?php echo esc_html($pair[1]); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!-- end body content -->
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <!-- End row -->

            <?php the_posts_pagination(); ?>

        <?php else : ?>

            <p><?php esc_html_e('No cars found.', 'carvia'); ?></p>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>