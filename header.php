<?php

/**
 * Header Template
 *
 * @package Carvia
 */

$header_layout      = carvia_option('header_variation', 'layout-one');
$inner_page_header  = carvia_option('inner_header_switcher', false);
$preloader          = carvia_option('preloader_enable', true);
$page_header        = carvia_option('show_page_header', true);
$logo_data          = carvia_option('header_logo', []);
$logo_width         = carvia_option('header_logo_width', '');
$logo_url           = !empty($logo_data['url']) ? $logo_data['url'] : '';

$header_type  = 'default';
$header_class = 'default';

if (class_exists('Redux') && function_exists('carvia_option')) {

	// Redux active — homepage layout becomes the fallback
	$header_type  = carvia_option('header_variation', 'layout-one');
	$header_class = $header_type;

	if (is_front_page()) {
		$header_type  = carvia_option('header_variation', 'layout-one');
		$header_class = $header_type;
	} elseif (is_singular()) {

		$page_header_layout = get_post_meta(get_the_ID(), '_carvia_header_layout', true);

		if (!empty($page_header_layout) && !is_numeric($page_header_layout)) {
			$header_type  = $page_header_layout;
			$header_class = 'inner-page-' . $header_type;
		} elseif (!empty($page_header_layout) && is_numeric($page_header_layout)) {
			$header_type  = $page_header_layout;
			$header_class = 'inner-elementor-' . $header_type;
		} elseif ($inner_page_header == true) {
			$inner_layout = carvia_option('inner_header_layout', 'layout-one');
			$header_type  = $inner_layout;
			$header_class = 'inner-page-redux-' . $inner_layout;
		}
	}
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!-- Preloader -->
	<?php if ($preloader == true) : ?>
		<div id="carvia-preloader" aria-hidden="true">
			<div class="carvia-preloader__spinner"></div>
		</div>
	<?php endif; ?>

	<a class="screen-reader-text" href="#content">
		<?php esc_html_e('Skip to content', 'carvia'); ?>
	</a>

	<div id="page" class="site">

		<header id="masthead" class="site-header <?php echo esc_attr($header_class); ?>" role="banner">
			<?php
			if (is_numeric($header_type) && class_exists('\Elementor\Plugin')) {
				echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($header_type);
			} else {
				get_template_part('template-parts/header/header', $header_type);
			}
			?>
		</header><!-- #masthead -->

		<div class="offcanvas-menu">
			<div class="offcanvas-inner-wrap">
				<div class="offcanvas-close-btn">
					<a class="close-btn"><i class="hgi hgi-stroke hgi-cancel-01"></i></a>
				</div>
				<div class="offcanvas-logo">
					<div class="header-logo">
						<?php if (has_custom_logo()) : ?>
							<?php the_custom_logo(); ?>
						<?php elseif ($logo_url) : ?>
							<a href="<?php echo esc_url(home_url('/')); ?>">
								<img src="<?php echo esc_url($logo_url); ?>"
									alt="<?php bloginfo('name'); ?>"
									style="width:<?php echo esc_attr($logo_width); ?>;"
									width="160">
							</a>
						<?php else : ?>
							<a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
								<?php bloginfo('name'); ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="main-menu-mobile">
					<nav class="main-navigation-mobile navigation">
						<?php
						wp_nav_menu([
							'theme_location' => 'primary-menu',
							'menu_id'        => 'primary-menu',
							'menu_class'     => '',
						]);
						?>
					</nav>
				</div>
			</div>
		</div>

		<!-- Page Header -->
		<?php
		if (class_exists('ReduxFramework')) {
			if ($page_header == true) {
				get_template_part('template-parts/page-header/page-header', 'one');
			}
		} else {
			get_template_part('template-parts/page-header/page-header', 'default');
		}
		?>

		<div id="content" class="site-content">