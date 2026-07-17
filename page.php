<?php

/**
 * Page Template
 *
 * @package Carvia
 */

get_header();
?>

<main id="primary" class="site-main carvia-page">
	<div class="container">
		<?php
		while (have_posts()) :
			the_post();
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages([
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'carvia'),
						'after'  => '</div>',
					]);
					?>
				</div>
			</article>

			<?php if (comments_open() || get_comments_number()) :
				comments_template();
			endif; ?>

		<?php endwhile; ?>
	</div>
</main>

<?php get_footer(); ?>