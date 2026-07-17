<?php

/**
 * Archive Template
 *
 * @package Pestro
 */

get_header();

$layout      = pestro_option('blog_layout', 'grid');
$sidebar_pos = pestro_option('blog_sidebar', 'right');
$has_sidebar = ('none' !== $sidebar_pos) && is_active_sidebar('blog-sidebar');
$content_col = $has_sidebar ? 'col-lg-8' : 'col-12';
?>

<main id="primary" class="site-main pestro-blog pestro-blog--<?php echo esc_attr($layout); ?>">
	<div class="container">
		<div class="row">

			<?php if ('left' === $sidebar_pos && $has_sidebar) : ?>
				<aside class="col-lg-4 pestro-blog__sidebar">
					<?php dynamic_sidebar('blog-sidebar'); ?>
				</aside>
			<?php endif; ?>

			<div class="<?php echo esc_attr($content_col); ?>">

				<?php if (have_posts()) :
					the_archive_description('<div class="archive-description">', '</div>');
				?>
					<div class="pestro-blog-<?php echo esc_attr($layout); ?>">
						<?php while (have_posts()) :
							the_post();
							get_template_part('template-parts/blog/post-' . esc_attr($layout));
						endwhile; ?>
					</div>

					<nav class="pestro-pagination" aria-label="<?php esc_attr_e('Archive Pagination', 'pestro'); ?>">
						<?php echo wp_kses_post(paginate_links()); ?>
					</nav>

				<?php else : ?>
					<p><?php esc_html_e('No posts found.', 'pestro'); ?></p>
				<?php endif; ?>

			</div>

			<?php if ('right' === $sidebar_pos && $has_sidebar) : ?>
				<aside class="col-lg-4 pestro-blog__sidebar">
					<?php dynamic_sidebar('blog-sidebar'); ?>
				</aside>
			<?php endif; ?>

		</div>
	</div>
</main>

<?php get_footer(); ?>