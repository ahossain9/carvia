<?php

/**
 * Pestro Theme Functions
 *
 * @package    Pestro
 * @author     Omexer
 * @version    1.0
 */

if (! defined('ABSPATH')) {
	exit;
}

// ─── Constants ────────────────────────────────────────────────
define('PESTRO_VERSION',   '1.0');
define('PESTRO_DIR',       get_template_directory());
define('PESTRO_URI',       get_template_directory_uri());
define('PESTRO_INC',       PESTRO_DIR . '/inc/');
define('PESTRO_INC_URI',   PESTRO_URI . '/inc/');
define('PESTRO_ASSETS',    PESTRO_URI . '/assets/');

// ─── Includes ─────────────────────────────────────────────────
$pestro_includes = [
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

foreach ($pestro_includes as $file) {
	$path = PESTRO_DIR . '/' . $file;
	if (file_exists($path)) {
		require_once $path;
	}
}
