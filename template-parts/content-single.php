<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package carvia
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    $carvia_option       = get_option('carvia_opt');
    $single_post_author = $carvia_option['single-post-author'] ?? '';
    $single_post_cat    = $carvia_option['single-post-cat'] ?? '';
    $single_post_comnt  = $carvia_option['single-post-comnt'] ?? '';
    $single_post_tag    = $carvia_option['single-post-tag'] ?? '';
    ?>

    <div class="blog-posts carvia-single-post">
        <?php if (has_post_thumbnail()) : ?>
            <div class="blog-post-thumb">
                <?php the_post_thumbnail('carvia-blog-thumb'); ?>
            </div>
        <?php endif; ?>

        <header class="entry-header">
            <?php
            if ('post' === get_post_type()) : ?>
                <div class="blog-posts-meta">
                    <ul>
                        <?php if ($single_post_author == true): ?>
                            <li><?php carvia_posted_by(); ?></li>
                        <?php endif; ?>

                        <li><?php carvia_posted_on(); ?></li>
                        <?php if (get_comments_number() != 0):
                            if ($single_post_comnt == true): ?>
                                <li><?php carvia_comment_count(); ?></li>
                        <?php
                            endif;
                        endif;
                        ?>

                        <?php if ($single_post_cat == true) { ?><li><?php carvia_post_categories(); ?></li><?php } ?>
                    </ul>
                </div><!-- .entry-meta -->
            <?php endif; ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
            <?php
            if (is_single()) {
                the_content(sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'carvia'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ));

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'carvia'),
                    'after'  => '</div>',
                ));
            } else {
                the_excerpt();
                echo '<div class="carvia-post-read-more"><a href="' . esc_url(get_permalink()) . '" class="carvia-btn fill-btn">' . esc_html__('Read more', 'carvia') . '</a></div>';
            }
            ?>
        </div><!-- .entry-content -->

        <?php if ($single_post_tag == true) : ?>
            <div class="entry-footer">
                <div class="post-tags">
                    <?php carvia_post_tags(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->