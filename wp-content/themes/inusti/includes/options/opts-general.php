<?php
	Redux::setSection( $opt_name, array(
		'title' 	=> esc_html__('General Options', 'inusti'),
		'icon' 	=> 'el-icon-wrench',
		'fields' => array(
			array(
			  'id' 		=> 'skin_color',
			  'type' 	=> 'select',
			  'title' 	=> esc_html__('Skin Color', 'inusti'),
			  'options' => array(
				 	'' 				 => 'Default',
				 	'blue'          => 'Blue',
				 	'brown'         => 'Brown',
				 	'green'         => 'Green',
				 	'lilac'         => 'Lilac',
				 	'orange'        => 'Orange',
				 	'pink'          => 'Pink',
				 	'purple'        => 'Purple',
				 	'red'           => 'Red',
				 	'turquoise'     => 'Turquoise',
				 	'yellow'        => 'Yellow'
				),
			  'default' => ''
			),
			array(
				'id'        	=> 'color_theme',
				'type'         => 'color',
				'title'        => esc_html__( 'Custom Color Theme', 'inusti' ),
				'desc'         => esc_html__( 'Used custom color theme instead of Skin Colors Available.', 'inusti' ),
				'transparent'  => false,
				'validate'     => 'color'
			),
			array(
			  'id' 			=> 'page_layout',
			  'type' 		=> 'button_set',
			  'title' 		=> esc_html__('Page Layout', 'inusti'),
			  'subtitle' 	=> esc_html__('Select the page layout type', 'inusti'),
			  'options'    => array(
				'boxed'     => esc_html__('Boxed', 'inusti'),
				'fullwidth' => esc_html__('Fullwidth', 'inusti')
			),
			  'default' 	=> 'fullwidth'
			),
			array(
			  'id' 			=> 'enable_backtotop',
			  'type' 		=> 'button_set',
			  'title' 		=> esc_html__('Enable Back To Top', 'inusti'),
			  'subtitle' 	=> esc_html__('Enable the back to top button that appears in the bottom right corner of the screen.', 'inusti'),
	         'options'   => array(
	            '1' 	=> esc_html__('On', 'inusti'),
	            '0' 	=> esc_html__('Off', 'inusti')
	         ),
			  'default' => '1'
			),
			array(
			  'id' 			=> 'map_api_key',
			  'type' 		=> 'text',
			  'title' 		=> esc_html__('Google Map API key', 'inusti'),
			  'default' 	=> ''
			),

		)
	));