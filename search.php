<?php

/**
 * Search Results Template
 *
 * @package Carvia
 */

get_header();

$layout  = carvia_option('blog_layout', 'grid');
$sidebar = carvia_option('blog_sidebar', 'right');
$has_sb  = ('none' !== $sidebar) && is_active_sidebar('blog-sidebar');
?>

<main id="primary" class="site-main carvia-blog carvia-blog--<?php echo esc_attr($layout); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if (have_posts()) : ?>
					<div class="carvia-blog-<?php echo esc_attr($layout); ?>">
						<?php while (have_posts()) :
							the_post();
							get_template_part('template-parts/blog/post-' . esc_attr($layout));
						endwhile; ?>
					</div>
					<nav class="carvia-pagination" aria-label="<?php esc_attr_e('Search Pagination', 'carvia'); ?>">
						<?php echo wp_kses_post(paginate_links()); ?>
					</nav>
				<?php else : ?>
					<div class="no-results">
						<h2><?php esc_html_e('No Results Found', 'carvia'); ?></h2>
						<p><?php esc_html_e('Sorry, nothing matched your search terms. Please try again with different keywords.', 'carvia'); ?></p>
						<?php get_search_form(); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>