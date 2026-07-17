<?php

/**
 * Blog Post Card — List Layout
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

$meta_opts = carvia_option('show_post_meta', [
    'date'     => '1',
    'author'   => '1',
    'category' => '1',
]);

$show_excerpt    = (bool) carvia_option('show_excerpt', true);
$excerpt_length  = (int) carvia_option('excerpt_length', 25);
?>
<!-- Start Article -->
<article id="post-<?php the_ID(); ?>" <?php post_class('carvia-post-card-wrap'); ?> class="<?php echo has_post_thumbnail() ? ' has-thumbnail' : ''; ?>">
    <div class="carvia-post-card">
        <!-- Start Thumbnail -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="carvia-post-card__thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('carvia-blog-grid', ['loading' => 'lazy', 'alt' => esc_attr(get_the_title())]); ?>
                </a>
            </div>
        <?php endif; ?>
        <!-- End Thumbnail -->
        <!-- Star Card Body -->
        <div class="carvia-post-card__body">
            <div class="carvia-post-card__meta">
                <?php if (! empty($meta_opts['author'])) : ?>
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="post-author">
                        <i class="hgi hgi-stroke hgi-rounded hgi-user-circle"></i> <?php echo esc_html(get_the_author()); ?>
                    </a>
                <?php endif; ?>
                <?php if (! empty($meta_opts['date'])) : ?>
                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                        <i class="hgi hgi-stroke hgi-rounded hgi-calendar-02"></i> <?php echo esc_html(get_the_date()); ?>
                    </time>
                <?php endif; ?>
                <?php if (! empty($meta_opts['category'])) :
                    $cats = get_the_category();
                    if (! empty($cats)) : ?>
                        <a href="<?php echo esc_url(get_category_link($cats[0]->term_id)); ?>"
                            class="post-category">
                            <i class="hgi hgi-stroke hgi-rounded hgi-tag-01"></i> <?php echo esc_html($cats[0]->name); ?>
                        </a>
                <?php endif;
                endif; ?>
            </div>

            <?php if (get_the_title()) : ?>
                <h2 class="carvia-post-card__title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
            <?php endif; ?>

            <?php if ($show_excerpt) : ?>
                <p class="carvia-post-card__excerpt">
                    <?php echo esc_html(wp_trim_words(get_the_excerpt(), $excerpt_length, '…')); ?>
                </p>
            <?php endif; ?>

            <div class="carvia-post-card__footer">
                <a href="<?php the_permalink(); ?>" class="carvia-post-card__read-more">
                    <span class="read-more-text"><?php esc_html_e('Read More', 'carvia'); ?></span> <span class="read-more-icon"><i class="arrow-out hgi-stroke hgi-arrow-right-02"></i></span>
                </a>
            </div>
        </div>
        <!-- End Card Body -->
    </div>
</article>
<!-- End Article -->