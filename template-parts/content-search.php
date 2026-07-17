<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package carvia
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$carvia_option	= get_option('carvia_opt');
	$post_cat 		= $carvia_option['post-cat'] ?? '';

	if (is_single() && 'post' === get_post_type()) {
		$carvia_single_post_class = ' carvia-single-post';
	} else {
		$carvia_single_post_class = '';
	}
	?>
	<div class="blog-posts carvia-search-content <?php echo esc_attr($carvia_single_post_class); ?>">
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
						<li><?php carvia_posted_by(); ?></li>
						<li><?php carvia_posted_on(); ?></li>
						<?php if (get_comments_number() != 0) { ?><li><?php carvia_comment_count(); ?></li><?php } ?>

						<?php if ($post_cat == true || $post_cat !== NULL) { ?><li><?php carvia_post_categories(); ?></li><?php } ?>
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
	</div>
</article><!-- #post-<?php the_ID(); ?> -->