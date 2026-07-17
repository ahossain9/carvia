</div><!-- #content -->

<?php
$footer_layout = 'default';
$footer_class  = 'default';

if (class_exists('Redux') && function_exists('carvia_option')) {

	$footer_layout = carvia_option('footer_layout', 'default');
	$footer_class  = is_numeric($footer_layout) ? 'elementor' : sanitize_title($footer_layout);

	if (is_singular()) {
		$page_footer = get_post_meta(get_the_ID(), '_carvia_footer_type', true);

		if (!empty($page_footer) && is_numeric($page_footer)) {
			$footer_layout = $page_footer;
			$footer_class  = 'elementor';
		} elseif (!empty($page_footer)) {
			$footer_layout = $page_footer;
			$footer_class  = sanitize_title($footer_layout);
		}
		// empty → falls back to global Redux setting ✅
	}
}
?>

<footer id="colophon" class="carvia-footer carvia-footer--<?php echo esc_attr($footer_class); ?>" role="contentinfo">
	<?php
	if (is_numeric($footer_layout) && class_exists('\Elementor\Plugin')) {
		echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display((int) $footer_layout);
	} else {
		get_template_part('template-parts/footer/footer', sanitize_title($footer_layout));
	}
	?>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>