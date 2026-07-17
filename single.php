<?php

/**
 * Single Post Template
 *
 * @package Carvia
 */

get_header();

$full_width_cpts = array('carvia_header', 'carvia_footer');
$sidebar         = get_post_meta(get_the_ID(), '_carvia_sidebar_position', true);
$sidebar         = ($sidebar && 'default' !== $sidebar) ? $sidebar : carvia_option('blog_sidebar', 'right');
$has_sidebar     = ('none' !== $sidebar) && is_active_sidebar('blog-sidebar');
if (is_singular($full_width_cpts)) {
	$has_sidebar = false;
}
$content_class   = $has_sidebar ? 'col-lg-8 col-md-7' : 'col-12';
$sidebar_class   = 'col-lg-4 col-md-5';
?>

<main id="primary" class="site-main carvia-single blog-sidebar-<?php echo esc_attr($sidebar); ?>">
	<div class="container">
		<div class="row">
			<?php if ('left' === $sidebar && $has_sidebar) : ?>
				<aside class="<?php echo esc_attr($sidebar_class); ?>">
					<div class="carvia-blog__sidebar">
						<?php dynamic_sidebar('blog-sidebar'); ?>
					</div>
				</aside>
			<?php endif; ?>

			<div class="<?php echo esc_attr($content_class); ?>">
				<div class="carvia-blog-wrap sidebar-<?php echo esc_attr($sidebar) ?>">
					<?php
					while (have_posts()) :
						the_post();
					?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('carvia-single-post'); ?>>

							<?php if (has_post_thumbnail()) : ?>
								<div class="carvia-single-post__thumb">
									<?php the_post_thumbnail('carvia-blog-single', ['loading' => 'eager', 'alt' => esc_attr(get_the_title())]); ?>
								</div>
							<?php endif; ?>

							<div class="carvia-single-post__body">
								<div class="entry-content">
									<?php the_content(); ?>
									<?php
									wp_link_pages([
										'before' => '<div class="page-links">' . esc_html__('Pages:', 'carvia'),
										'after'  => '</div>',
									]);
									?>
								</div>

								<footer class="entry-footer">
									<?php
									$post_tags = get_the_tags();
									if ($post_tags) : ?>
										<div class="entry-tags">
											<span class="tag-text"><?php _e('Tags', 'carvia'); ?>:</span>
											<?php foreach ($post_tags as $tag) : ?>
												<a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" class="tag-link">
													<?php echo esc_html($tag->name); ?>
												</a>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
								</footer>
							</div>
						</article>

						<?php
						the_post_navigation([
							'prev_text' => '<span class="nav-icon">' . esc_html__('&larr;', 'carvia') . '</span><span class="nav-title">%title</span>',
							'next_text' => '<span class="nav-icon">' . esc_html__(' &rarr;', 'carvia') . '</span><span class="nav-title">%title</span>',
						]);

						if (comments_open() || get_comments_number()) :
							comments_template();
						endif;
						?>

					<?php endwhile; ?>
				</div>
			</div>

			<?php if ('right' === $sidebar && $has_sidebar) : ?>
				<aside class="<?php echo esc_attr($sidebar_class); ?>">
					<div class="carvia-blog__sidebar">
						<?php dynamic_sidebar('blog-sidebar'); ?>
					</div>
				</aside>
			<?php endif; ?>

		</div>
	</div>
</main>

<?php get_footer(); ?>