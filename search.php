<?php

/**
 * Search Results Template
 *
 * @package Pestro
 */

get_header();

$layout  = pestro_option('blog_layout', 'grid');
$sidebar = pestro_option('blog_sidebar', 'right');
$has_sb  = ('none' !== $sidebar) && is_active_sidebar('blog-sidebar');
$col     = $has_sb ? 'col-lg-8' : 'col-12';
?>

<main id="primary" class="site-main pestro-blog pestro-blog--<?php echo esc_attr($layout); ?>">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($col); ?>">
				<?php if (have_posts()) : ?>
					<div class="pestro-blog-<?php echo esc_attr($layout); ?>">
						<?php while (have_posts()) :
							the_post();
							get_template_part('template-parts/blog/post-' . esc_attr($layout));
						endwhile; ?>
					</div>
					<nav class="pestro-pagination" aria-label="<?php esc_attr_e('Search Pagination', 'pestro'); ?>">
						<?php echo wp_kses_post(paginate_links()); ?>
					</nav>
				<?php else : ?>
					<div class="no-results">
						<h2><?php esc_html_e('No Results Found', 'pestro'); ?></h2>
						<p><?php esc_html_e('Sorry, nothing matched your search terms. Please try again with different keywords.', 'pestro'); ?></p>
						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($has_sb) : ?>
				<aside class="col-lg-4 pestro-blog__sidebar">
					<?php dynamic_sidebar('blog-sidebar'); ?>
				</aside>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>