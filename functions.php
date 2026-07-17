<?php

/**
 * Carvia Theme Functions
 *
 * @package    Carvia
 * @author     Omexer
 * @version    1.0
 */

if (! defined('ABSPATH')) {
	exit;
}

// ─── Constants ────────────────────────────────────────────────
define('CARVIA_VERSION',   '1.0');
define('CARVIA_DIR',       get_template_directory());
define('CARVIA_URI',       get_template_directory_uri());
define('CARVIA_INC',       CARVIA_DIR . '/inc/');
define('CARVIA_INC_URI',   CARVIA_URI . '/inc/');
define('CARVIA_ASSETS',    CARVIA_URI . '/assets/');

// ─── Includes ─────────────────────────────────────────────────
$carvia_includes = [
	'inc/setup.php',
	'inc/enqueue.php',
	'inc/nav-menus.php',
	'inc/helpers/helpers.php',
	'inc/widgets/recent-posts-widget.php',
	'inc/metabox/metabox-config.php',
	'inc/elementor/elementor-init.php',
	'inc/elementor/header-footer.php',
	'inc/tgm/tgm-config.php',
	'inc/custom-comment-template.php',
];

foreach ($carvia_includes as $file) {
	$path = CARVIA_DIR . '/' . $file;
	if (file_exists($path)) {
		require_once $path;
	}
}
