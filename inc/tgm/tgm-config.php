<?php

/**
 * TGM Plugin Activation Configuration
 *
 * @package Carvia
 * @link    http://tgmpluginactivation.com/
 */

if (! defined('ABSPATH')) {
    exit;
}

require_once CARVIA_DIR . '/inc/tgm/class-tgm-plugin-activation.php';

/**
 * Register required and recommended plugins.
 */
function carvia_register_required_plugins()
{

    $plugins = [

        // ══════════════════════════════════════════════════════
        // REQUIRED PLUGINS
        // ══════════════════════════════════════════════════════

        // Elementor
        [
            'name'     => 'Elementor Page Builder',
            'slug'     => 'elementor',
            'required' => true,
        ],

        // Meta Box
        [
            'name'     => 'Meta Box',
            'slug'     => 'meta-box',
            'required' => true,
        ],

        // Redux Framework
        [
            'name'     => 'Redux Framework',
            'slug'     => 'redux-framework',
            'required' => true,
        ],

        // Carvia Core — pre-packaged inside the theme
        [
            'name'               => 'Carvia Core',
            'slug'               => 'carvia-core',
            'source'             => CARVIA_DIR . '/inc/plugins/carvia-core.zip',
            'required'           => true,
            'version'            => '1.0.0',
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
        ],

        // ══════════════════════════════════════════════════════
        // RECOMMENDED PLUGINS
        // ══════════════════════════════════════════════════════

        // Fluent Forms
        [
            'name'     => 'Fluent Forms',
            'slug'     => 'fluentform',
            'required' => false,
        ],

        // One Click Demo Import
        [
            'name'     => 'One Click Demo Import',
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ],

    ];

    // ── TGM Configuration ─────────────────────────────────────
    $config = [
        'id'           => 'carvia',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => false,
        'dismiss_msg'  => '',
        'is_automatic' => true,
        'message'      => '',

        // ── Admin Notice Strings ───────────────────────────────
        'strings'      => [
            'page_title'                      => esc_html__('Install Required Plugins', 'carvia'),
            'menu_title'                      => esc_html__('Install Plugins', 'carvia'),
            'installing'                      => esc_html__('Installing Plugin: %s', 'carvia'),
            'updating'                        => esc_html__('Updating Plugin: %s', 'carvia'),
            'oops'                            => esc_html__('Something went wrong with the plugin API.', 'carvia'),
            'return'                          => esc_html__('Return to Required Plugins Installer', 'carvia'),
            'plugin_activated'                => esc_html__('Plugin activated successfully.', 'carvia'),
            'activated_successfully'          => esc_html__('The following plugin was activated successfully:', 'carvia'),
            'plugin_already_active'           => esc_html__('No action taken. Plugin %s was already active.', 'carvia'),
            'plugin_needs_higher_version'     => esc_html__('Plugin not activated. A higher version of %s is required for this theme. Please update the plugin.', 'carvia'),
            'complete'                        => esc_html__('All plugins installed and activated successfully. %s', 'carvia'),
            'dismiss'                         => esc_html__('Dismiss this notice', 'carvia'),
            'notice_cannot_install_activate'  => esc_html__('There are one or more required or recommended plugins to install, update or activate.', 'carvia'),
            'contact_admin'                   => esc_html__('Please contact the administrator of this site for help.', 'carvia'),
            'nag_type'                        => 'error',

            // Required notice
            'notice_can_install_required'     => _n_noop(
                'The <strong>Carvia</strong> theme requires the following plugin: %1$s.',
                'The <strong>Carvia</strong> theme requires the following plugins: %1$s.',
                'carvia'
            ),

            // Recommended notice
            'notice_can_install_recommended'  => _n_noop(
                'The <strong>Carvia</strong> theme recommends the following plugin: %1$s.',
                'The <strong>Carvia</strong> theme recommends the following plugins: %1$s.',
                'carvia'
            ),

            // Required activation notice
            'notice_can_activate_required'    => _n_noop(
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'carvia'
            ),

            // Recommended activation notice
            'notice_can_activate_recommended' => _n_noop(
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'carvia'
            ),
        ],
    ];

    tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'carvia_register_required_plugins');
