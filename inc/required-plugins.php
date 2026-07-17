<?php
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
add_action('tgmpa_register', 'carvia_register_required_plugins');

function carvia_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => esc_html__('Elementor', 'carvia'),
			'slug'      => 'elementor',
			'required'  => true,
		),
		array(
			'name'     => esc_html__('Carvia Core', 'carvia'),
			'slug'     => 'carvia-core',
			'source'   => get_template_directory() . '/inc/plugins/carvia-core.zip',
			'required' => true
		),
		array(
			'name'     => esc_html__('Redux Framework', 'carvia'),
			'slug'     => 'redux-framework',
			'required' => true
		),
		array(
			'name'     => esc_html__('One Click Demo Import', 'carvia'),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),
		array(
			'name'     => esc_html__('CMB2', 'carvia'),
			'slug'     => 'cmb2',
			'required' => true,
		),
		array(
			'name'     => esc_html__('WP Fluent Forms', 'carvia'),
			'slug'     => 'fluentform',
			'required' => false,
		),
	);

	$config = array(
		'id'           => 'carvia',
		'default_path' => '',
		'menu'         => 'carvia-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa($plugins, $config);
}
