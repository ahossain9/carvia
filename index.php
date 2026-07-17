<?php

/**
 * Main Index Template
 *
 * @package Carvia
 */

get_header();

$layout  = carvia_option('blog_layout', 'list');
$layout  = in_array($layout, ['list', 'grid'], true) ? $layout : 'list';

$sidebar = ('grid' === $layout) ? 'none' : carvia_option('blog_sidebar', 'right');

$has_sidebar = ('none' !== $sidebar) && is_active_sidebar('blog-sidebar');

$content_class = $has_sidebar ? 'col-lg-8 col-md-7' : 'col-12';
$sidebar_class = 'col-lg-4 col-md-5';
?>

<main id="primary" class="site-main carvia-blog carvia-blog--<?php echo esc_attr($layout); ?> blog-sidebar-<?php echo esc_attr($sidebar); ?>">
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
				<?php if (have_posts()) : ?>
					<div class="carvia-blog-wrap sidebar-<?php echo esc_attr($sidebar) ?>">
						<div class="carvia-blog-<?php echo esc_attr($layout); ?>">
							<?php
							while (have_posts()) :
								the_post();
								get_template_part('template-parts/blog/post-' . esc_attr($layout));
							endwhile;
							?>
						</div>

						<nav class="carvia-pagination" aria-label="<?php esc_attr_e('Posts Pagination', 'carvia'); ?>">
							<?php
							echo wp_kses_post(paginate_links([
								'prev_text' => esc_html__('&laquo;', 'carvia'),
								'next_text' => esc_html__('&raquo;', 'carvia'),
							]));
							?>
						</nav>
					</div>

				<?php else : ?>

					<div class="no-results">
						<h2><?php esc_html_e('Nothing Found', 'carvia'); ?></h2>
						<p><?php esc_html_e('It seems we can\'t find what you\'re looking for. Try a search?', 'carvia'); ?></p>
						<?php get_search_form(); ?>
					</div>

				<?php endif; ?>
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