<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package carvia
 */

// if (! is_active_sidebar('sidebar')) {
// 	return;
// }
?>
<?php if (is_active_sidebar('sidebar')) : ?>
	<div class="col-lg-4 col-md-5 col-xs-12">
		<aside id="secondary" class="widget-area">
			<?php dynamic_sidebar('sidebar'); ?>
		</aside><!-- #secondary -->
	</div>
<?php endif; ?>