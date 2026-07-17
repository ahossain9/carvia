<?php

/**
 * Archive Template
 *
 * @package Carvia
 */

get_header();

$layout      = carvia_option('blog_layout', 'grid');
$sidebar_pos = carvia_option('blog_sidebar', 'right');
$has_sidebar = ('none' !== $sidebar_pos) && is_active_sidebar('blog-sidebar');
$content_col = $has_sidebar ? 'col-lg-8' : 'col-12';
?>

<main id="primary" class="site-main carvia-blog carvia-blog--<?php echo esc_attr($layout); ?>">
	<div class="container">
		<div class="row">

			<?php if ('left' === $sidebar_pos && $has_sidebar) : ?>
				<aside class="col-lg-4 carvia-blog__sidebar">
					<?php dynamic_sidebar('blog-sidebar'); ?>
				</aside>
			<?php endif; ?>

			<div class="<?php echo esc_attr($content_col); ?>">

				<?php if (have_posts()) :
					the_archive_description('<div class="archive-description">', '</div>');
				?>
					<div class="carvia-blog-<?php echo esc_attr($layout); ?>">
						<?php while (have_posts()) :
							the_post();
							get_template_part('template-parts/blog/post-' . esc_attr($layout));
						endwhile; ?>
					</div>

					<nav class="carvia-pagination" aria-label="<?php esc_attr_e('Archive Pagination', 'carvia'); ?>">
						<?php echo wp_kses_post(paginate_links()); ?>
					</nav>

				<?php else : ?>
					<p><?php esc_html_e('No posts found.', 'carvia'); ?></p>
				<?php endif; ?>

			</div>

			<?php if ('right' === $sidebar_pos && $has_sidebar) : ?>
				<aside class="col-lg-4 carvia-blog__sidebar">
					<?php dynamic_sidebar('blog-sidebar'); ?>
				</aside>
			<?php endif; ?>

		</div>
	</div>
</main>

<?php get_footer(); ?>