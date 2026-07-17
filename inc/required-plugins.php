<?php
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'pestro_register_required_plugins');

function pestro_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => esc_html__('Elementor', 'pestro'),
			'slug'      => 'elementor',
			'required'  => true,
		),
		array(
			'name'     => esc_html__('Pestro Core', 'pestro'),
			'slug'     => 'pestro-core',
			'source'   => get_template_directory() . '/inc/plugins/pestro-core.zip',
			'required' => true
		),
		array(
			'name'     => esc_html__('Redux Framework', 'pestro'),
			'slug'     => 'redux-framework',
			'required' => true
		),
		array(
			'name'     => esc_html__('One Click Demo Import', 'pestro'),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
		array(
			'name'     => esc_html__('CMB2', 'pestro'),
			'slug'     => 'cmb2',
			'required' => true,
		),
		array(
			'name'     => esc_html__('WP Fluent Forms', 'pestro'),
			'slug'     => 'fluentform',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'pestro',
		'default_path' => '',
		'menu'         => 'pestro-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa($plugins, $config);
}
