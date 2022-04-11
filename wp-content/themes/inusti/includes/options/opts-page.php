<?php
Redux::setSection($opt_name, array(
   'icon'   => 'el-icon-th-list',
   'title'  => esc_html__('Page Options', 'inusti'),
   'fields' => array(
      array(
         'id'        => 'default_show_page_heading',
         'type'      => 'button_set',
         'title'     => esc_html__('Default Show Page Heading', 'inusti'),
         'subtitle'  => esc_html__('Choose the default state for the page heading, shown/hidden.', 'inusti'),
         'options'   => array(
            '1' => esc_html__('On', 'inusti'),
            '0' => esc_html__('Off', 'inusti')
         ),
         'default'   => '1'
      ),
      array(
         'id'        => 'default_sidebar_config',
         'type'      => 'select',
         'title'     => esc_html__('Default Page Sidebar Config', 'inusti'),
         'subtitle'  => esc_html__('Choose the default sidebar config for pages', 'inusti'),
         'options'   => array(
            'no-sidebars'     => esc_html__('No Sidebars', 'inusti'),
            'left-sidebar'    => esc_html__('Left Sidebar', 'inusti'),
            'right-sidebar'   => esc_html__('Right Sidebar', 'inusti')
         ),
         'default' => 'no-sidebars'
      ),
      array(
         'id'        => 'default_left_sidebar',
         'type'      => 'select',
         'title'     => esc_html__('Default Page Left Sidebar', 'inusti'),
         'subtitle'  => esc_html__('Choose the default left sidebar for pages', 'inusti'),
         'data'      => 'sidebars',
         'default'   => 'sidebar-1'
      ),
      array(
         'id' => 'default_right_sidebar',
         'type' => 'select',
         'title' => esc_html__('Default Page Right Sidebar', 'inusti'),
         'subtitle'  => esc_html__('Choose the default right sidebar for pages', 'inusti'),
         'data'      => 'sidebars',
         'default' => 'sidebar-1'
      ),

      //Page Notfound 404
      array(
         'id'     => 'nf_page_info',
         'type'   => 'info',
         'icon'   => true,
         'raw'    => '<h3 class="margin-bottom-0">' . esc_html__( 'nf page settings', 'inusti' ) . '</h3>',
      ),
      array(
         'id'        => 'nfpage_bg_color',
         'type'      => 'color',
         'title'     => esc_html__('Background Color', 'inusti'),
         'default'   => '#1F2230'
      ),
      array(
         'id'        => 'nfpage_bg_image',
         'type'      => 'media',
         'url'       => true,
         'title'     => esc_html__('Background Image', 'inusti'),
         'default'   => '',
      ),
      array(
         'id'        => 'nfpage_primary_text',
         'type'      => 'text',
         'title'     => esc_html__('Primary Text', 'inusti'),
         'default'   => esc_html__('404', 'inusti'),
      ),
      array(
         'id'        => 'nfpage_title',
         'type'      => 'text',
         'title'     => esc_html__('Title Text', 'inusti'),
         'default'   => esc_html__('Page Not Found', 'inusti'),
      ),
      array(
         'id'        => 'nfpage_desc',
         'type'      => 'textarea',
         'title'     => esc_html__('Primary Text', 'inusti'),
         'default'   => esc_html('The page requested could not be found. This could be a spelling error in the URL or a removed page.', 'inusti')
      ),
      array(
         'id'        => 'nfpage_btn_title',
         'type'      => 'text',
         'title'     => esc_html__('Button Title', 'inusti'),
         'default'   => esc_html__('Back Homepage', 'inusti'),
      ),
      array(
         'id'        => 'nfpage_btn_link',
         'type'      => 'text',
         'title'     => esc_html__('Button Link', 'inusti'),
         'default'   => '',
      ),
   )
));  