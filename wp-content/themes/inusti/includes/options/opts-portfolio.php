<?php
Redux::setSection( $opt_name, array(
	'title'   => esc_html__( 'Portfolio Options', 'inusti' ),
	'icon'    => 'el-icon-website',
	'fields'  => array(
		array(
		  'id'  	 => 'slug_portfolio_post_type',
		  'type'  => 'info',
		  'raw' 	 => '<h3 style="margin: 0;">' . esc_html__( 'Slug url portfolio post type', 'inusti' ) . '</h3>'
		),
		array(
		  'id' 		=> 'slug_portfolio',
		  'type' 	=> 'text',
		  'title' 	=> esc_html__('Slug Portfolio', 'inusti'),
		  'default' => 'portfolio'
		),
		array(
		  'id'  		=> 'portfolio_archive_info',
		  'type'  	=> 'info',
		  'icon'  	=> true,
		  'raw' 		=> '<h3 style="margin: 0;">' . esc_html__( 'Archive/Listing', 'inusti' ) . '</h3>',
		),
		array(
		  'id' 		=> 'portfolio_columns_lg',
		  'type' 	=> 'select',
		  'title' 	=> esc_html__('Display Columns for Large Screen', 'inusti'),
		  'options' => array(
			  '1'      => '1',
			  '2'      => '2',
			  '3'      => '3',
			  '4'      => '4',
			  '5'      => '5',
			  '6'      => '6',
		  ),
		  'default' => '3'
		),
		array(
		  'id' 			=> 'portfolio_columns_md',
		  'type' 		=> 'select',
		  'title' 		=> esc_html__('Display Columns for Medium Screen', 'inusti'),
		  'options' => array(
			  '1'      => '1',
			  '2'      => '2',
			  '3'      => '3',
			  '4'      => '4',
			  '5'      => '5',
			  '6'      => '6',
		  ),
		  'default' => '2'
		),
		array(
		  'id' 			=> 'portfolio_columns_sm',
		  'type' 		=> 'select',
		  'title' 		=> esc_html__('Display Columns for Small Screen', 'inusti'),
		  'options' => array(
			  '1'      => '1',
			  '2'      => '2',
			  '3'      => '3',
			  '4'      => '4',
			  '5'      => '5',
			  '6'      => '6',
		  ),
		  'default' => '2'
		),
		array(
		  'id' 			=> 'portfolio_columns_xs',
		  'type' 		=> 'select',
		  'title' 		=> esc_html__('Display Columns for Extra Small Screen', 'inusti'),
		  'options' => array(
			  '1'      => '1',
			  '2'      => '2',
			  '3'      => '3',
			  '4'      => '4',
			  '5'      => '5',
			  '6'      => '6',
		  ),
		  'default' => '1'
		),
		array(
		  'id' 			=> 'archive_portfolio_sidebar',
		  'type' 		=> 'select',
		  'title' 		=> esc_html__('Default Archive Page Portfolio Sidebar Config', 'inusti'),
		  'subtitle' 	=> esc_html__('Choose single post layout.', 'inusti'),
		  'options' 	=> array(
				'no-sidebars'     => esc_html__('No Sidebars', 'inusti'),
				'left-sidebar'    => esc_html__('Left Sidebar', 'inusti'),
				'right-sidebar'   => esc_html__('Right Sidebar', 'inusti')
		  ),
		  'default' => 'no-sidebars'
		),
		array(
		  'id' 			=> 'archive_portfolio_left_sidebar',
		  'type' 		=> 'select',
		  'title' 		=> esc_html__('Default Archive Page Portfolio Left Sidebar', 'inusti'),
		  'subtitle' 	=> esc_html__('Choose the default left sidebar for Single Post.', 'inusti'),
		  'data'      => 'sidebars',
		  'default' 	=> 'portfolio_sidebar'
		),
		 array(
		  'id' 			=> 'archive_portfolio_right_sidebar',
		  'type' 		=> 'select',
		  'title' 		=> esc_html__('Default Archive Page Portfolio Right Sidebar', 'inusti'),
		  'subtitle' 	=> esc_html__("Choose the default right sidebar for Single Post.", 'inusti'),
		  'data'      	=> 'sidebars',
		  'default' 	=> 'portfolio_sidebar'
		),

		array(
		  'id'  		=> 'portfolio_single_post_info',
		  'type'  	=> 'info',
		  'icon'  	=> true,
		  'raw' 		=> '<h3 style="margin: 0;">' . esc_html__( 'Single Portfolio', 'inusti' ) . '</h3>',
		),
		array(
		  'id' 			=> 'single_portfolio_sidebar',
		  'type' 		=> 'select',
		  'title' 		=> esc_html__('Default Single Sidebar Config', 'inusti'),
		  'subtitle' 	=> esc_html__("Choose single Portfolio layout.", 'inusti'),
		  'options' 	=> array(
				'no-sidebars'     => esc_html__('No Sidebars', 'inusti'),
				'left-sidebar'    => esc_html__('Left Sidebar', 'inusti'),
				'right-sidebar'   => esc_html__('Right Sidebar', 'inusti')
		  ),
		  'default' => 'right-sidebar'
		),
		array(
		  'id' 			=> 'single_portfolio_left_sidebar',
		  'type' 		=> 'select',
		  'title' 		=> esc_html__('Default Single Left Sidebar', 'inusti'),
		  'subtitle' 	=> esc_html__("Choose the default left sidebar for Single Portfolio.", 'inusti'),
		  'data'      => 'sidebars',
		  'default' 	=> 'portfolio_sidebar'
		),
		 array(
		  'id' 			=> 'single_portfolio_right_sidebar',
		  'type' 		=> 'select',
		  'title' 		=> esc_html__('Default Single Right Sidebar', 'inusti'),
		  'subtitle' 	=> esc_html__("Choose the default right sidebar for Single Portfolio.", 'inusti'),
		  'data'       => 'sidebars',
		  'default'    => 'portfolio_sidebar'
		)
	)
));