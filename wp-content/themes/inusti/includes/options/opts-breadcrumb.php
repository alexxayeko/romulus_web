<?php
Redux::setSection( $opt_name, array(
	'title' 	=> esc_html__('Breadcrumb Options', 'inusti'),
	'icon' 	=> 'el-icon-compass',
	'fields' => array(
		array(
		  'id' 			=> 'breadcrumb_show_title',
		  'type' 		=> 'button_set',
		  'title' 		=> esc_html__('Breadcrumb Display Title Page', 'inusti'),
		  'options'   => array(
			 	1 => esc_html__('Enable', 'inusti'),
			 	0 => esc_html__('Disable', 'inusti')
		  	),
		  	'default' => 1
		),
		array(
		  'id'        => 'breadcrumb_padding_top',
		  'type'      => 'slider',
		  'title'     => esc_html__( 'Breadcrumb Padding Top', 'inusti' ),
		  'default'   => 135,
		  'min'       => 50,
		  'max'       => 500,
		  'step'      => 1,
		  'display_value' => 'text',
		),
		array(
		  'id'        => 'breadcrumb_padding_bottom',
		  'type'      => 'slider',
		  'title'     => esc_html__( 'Breadcrumb Padding Top', 'inusti' ),
		  'default'   => 135,
		  'min'       => 50,
		  'max'       => 500,
		  'step'      => 1,
		  'display_value' => 'text',
		),
		array(
		  'id' 			=> 'breadcrumb_background_color',
		  'type' 		=> 'color',
		  'title' 		=> esc_html__('Background Overlay Color', 'inusti'),
		  'default' 	=> '#192437'
		),
		array(
		  'id'        => 'breadcrumb_background_opacity',
		  'type'      => 'slider',
		  'title'     => esc_html__( 'Breadcrumb Ovelay Color Opacity', 'inusti' ),
		  'default'   => 50,
		  'min'       => 0,
		  'max'       => 100,
		  'step'      => 1,
		  'display_value' => 'text',
		),
		array(
		  'id' 			=> 'breadcrumb_image',
		  'type' 		=> 'button_set',
		  'title' 		=> esc_html__('Enable Breadcrumb Image', 'inusti'),
		  'options'   	=> array(
			 	1 => esc_html__('Enable', 'inusti'),
			 	0 => esc_html__('Disable', 'inusti')
		  ),
		  'default' => 1
		),
		array(
		  'id' 		=> 'breadcrumb_background_image',
		  'type' 	=> 'media',
		  'url' 		=> true,
		  'title' 	=> esc_html__('Breadcrumb Background Image', 'inusti'),
		  'default' => '',
		  'required'  => array( 'breadcrumb_image', '=', 1 )
		),
		array(
		  'id'    	=> 'breadcrumb_text_stype',
		  'type'    => 'select',
		  'title'   => esc_html__( 'Breadcrumb Text Stype', 'inusti' ),
		  'options' => 
		  array(
			 'text-light'     => esc_html__('Light', 'inusti'),
			 'text-dark'      => esc_html__('Dark', 'inusti')
		  ),
		  'default' => 'text-light'
		),
		array(
		  'id'    	=> 'breadcrumb_text_align',
		  'type'    => 'select',
		  'title'   => esc_html__( 'Breadcrumb Text Align', 'inusti' ),
		  'options' => 
		  array(
			 'text-left'      => esc_html__('Left', 'inusti'),
			 'text-center'    => esc_html__('Center', 'inusti'),
			 'text-right'     => esc_html__('Right', 'inusti')
		  ),
		  'default' => 'text-left'
		)
	)
) );