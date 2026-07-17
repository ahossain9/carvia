<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pestro
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$pestro_option	= get_option('pestro_opt');
	$post_cat 		= $pestro_option['post-cat'] ?? '';

	if (is_single() && 'post' === get_post_type()) {
		$pestro_single_post_class = ' pestro-single-post';
	} else {
		$pestro_single_post_class = '';
	}
	?>
	<div class="blog-posts pestro-search-content <?php echo esc_attr($pestro_single_post_class); ?>">
		<?php if (has_post_thumbnail()) : ?>
			<div class="blog-post-thumb">
				<?php the_post_thumbnail('pestro-blog-thumb'); ?>
			</div>
		<?php endif; ?>
		<header class="entry-header">
			<?php
			if ('post' === get_post_type()) : ?>
				<div class="blog-posts-meta">
					<ul>
						<li><?php pestro_posted_by(); ?></li>
						<li><?php pestro_posted_on(); ?></li>
						<?php if (get_comments_number() != 0) { ?><li><?php pestro_comment_count(); ?></li><?php } ?>

						<?php if ($post_cat == true || $post_cat !== NULL) { ?><li><?php pestro_post_categories(); ?></li><?php } ?>
					</ul>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			<?php
			if (!is_singular()) :
				the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
			endif;
			?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
			if (is_single()) {
				the_content(sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pestro'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				));

				wp_link_pages(array(
					'before' => '<div class="page-links">' . esc_html__('Pages:', 'pestro'),
					'after'  => '</div>',
				));
			} else {
				the_excerpt();
				echo '<div class="pestro-post-read-more"><a href="' . esc_url(get_permalink()) . '" class="pestro-btn fill-btn">' . esc_html__('Read more', 'pestro') . '</a></div>';
			}
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->