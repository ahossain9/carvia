<?php

/**
 * 404 Template
 *
 * @package Carvia
 */

get_header();
?>

<main id="primary" class="site-main carvia-404">
	<div class="container">
		<div class="not-found-content">
			<h1>404</h1>
			<h2><?php esc_html_e('Oops! Page Not Found', 'carvia'); ?></h2>
			<p><?php esc_html_e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'carvia'); ?></p>
			<div class="button-wrapper">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="btn-fill">
					<span class="btn-fill__text"><?php esc_html_e('Back to Home', 'carvia'); ?></span>
					<span class="rpl-btn__label">
						<span class="btn-fill__icon">
							<i class="arrow-out hgi-stroke hgi-arrow-right-02"></i>
							<i class="arrow-in hgi-stroke hgi-arrow-right-02"></i>
						</span>
					</span>
				</a>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>