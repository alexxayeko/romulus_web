<?php
if ( ! defined( 'ABSPATH' ) ) {
	 exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Repeater;

/**
 * Class GVAElement_Gallery
 */
class GVAElement_Gallery extends GVAElement_Base{

	public function get_name() {
		return 'gva-gallery';
	}
 
	public function get_title() {
		return __('GVA Gallery', 'inusti-themer');
	}

	 /**
	  * Get widget icon.
	  *
	  * Retrieve testimonial widget icon.
	  *
	  * @since  1.0.0
	  * @access public
	  *
	  * @return string Widget icon.
	  */
	public function get_icon() {
		return 'eicon-slider-push';
	}

	public function get_keywords() {
		return [ 'gallery', 'images', 'carousel', 'grid' ];
	}

	public function get_script_depends() {
		return [
			'jquery.owl.carousel',
			'gavias.elements',
		];
	}

	public function get_style_depends() {
		return [
			'owl-carousel-css',
		];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_query',
			[
				'label' => __('Query & Layout', 'inusti-themer'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
      $repeater->add_control(
         'image',
         [
            'label'       => __('Image', 'inusti-themer'),
            'type'        => Controls_Manager::MEDIA,
            'show_label' => false,
            'default'    => [
               'url' => GAVIAS_INUSTI_PLUGIN_URL . 'elementor/assets/images/image-2.jpg',
            ]
         ]
      );
     	$repeater->add_control(
         'title',
         [
            'label'   => __('Title', 'inusti-themer'),
            'default' => esc_html__('Luxury Interior', 'inusti-themer'),
            'type'    => Controls_Manager::TEXT,
         ]
     	);
		$repeater->add_control(
         'sub_title',
         [
            'label'   => __('Sub-Title', 'inusti-themer'),
            'default' => esc_html__('Charity', 'inusti-themer'),
            'type'    => Controls_Manager::TEXT,
         ]
     	);

		$this->add_control(
         'images',
         [
            'label'       => __('Testimonials Content Item', 'inusti-themer'),
            'type'        => Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
            'default'     => array(
              	array(
                  'image'    => [
                     'url' => GAVIAS_INUSTI_PLUGIN_URL . 'elementor/assets/images/image-2.jpg',
                  ],
                  'title' => esc_html__('Luxury Interior', 'inusti-themer'),
                  'sub_title' => esc_html__('Architectures', 'inusti-themer'),
              	),
               array(
                  'image'    => [
                     'url' => GAVIAS_INUSTI_PLUGIN_URL . 'elementor/assets/images/image-2.jpg',
                  ],
                  'title' => esc_html__('Luxury Interior', 'inusti-themer'),
                  'sub_title' => esc_html__('Architectures', 'inusti-themer'),
              	),
               array(
                  'image'    => [
                     'url' => GAVIAS_INUSTI_PLUGIN_URL . 'elementor/assets/images/image-2.jpg',
                  ],
                  'title' => esc_html__('Luxury Interior', 'inusti-themer'),
                  'sub_title' => esc_html__('Architectures', 'inusti-themer'),
              	),
               array(
                  'image'    => [
                     'url' => GAVIAS_INUSTI_PLUGIN_URL . 'elementor/assets/images/image-2.jpg',
                  ],
                  'title' => esc_html__('Luxury Interior', 'inusti-themer'),
                  'sub_title' => esc_html__('Architectures', 'inusti-themer'),
              	),
               array(
                  'image'    => [
                     'url' => GAVIAS_INUSTI_PLUGIN_URL . 'elementor/assets/images/image-2.jpg',
                  ],
                  'title' => esc_html__('Luxury Interior', 'inusti-themer'),
                  'sub_title' => esc_html__('Architectures', 'inusti-themer'),
              	),
            )
         ]
      );

		$this->add_control( // xx Layout
			'layout_heading',
			[
				'label'   => __( 'Layout', 'inusti-themer' ),
				'type'    => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'layout',
			[
				'label'   => __( 'Layout Display', 'inusti-themer' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'grid'      => __( 'Grid', 'inusti-themer' ),
					'carousel'  => __( 'Carousel', 'inusti-themer' ),
				]
			]
	  	);
		$this->add_control(
			'style',
			[
				'label'     => __('Style', 'inusti-themer'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'gallery-style-1'           => __( 'Gallery Style I', 'inusti-themer' ),
				],
				'default' => 'style-1',
			]
		);
		$this->add_control(
			'image_size',
			[
				'label'     => __('Style', 'inusti-themer'),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => $this->get_thumbnail_size(),
				'default'   => 'inusti_medium'
			]
		);
	  	$this->add_control(
			'pagination',
			[
				'label'     => __('Pagination', 'inusti-themer'),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'no',
				'condition' => [
					'layout' => 'grid'
				],
			]
	  	);

		$this->end_controls_section();

		$this->add_control_carousel(false, array('layout' => 'carousel'));

		$this->add_control_grid(array('layout' => 'grid'));

	}

	 protected function render() {
		  $settings = $this->get_settings_for_display();
		  printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
		  if( !empty($settings['layout']) ){
				include $this->get_template('gallery/' . $settings['layout'] . '.php');
		  }
		  print '</div>'; 

	 }
}

$widgets_manager->register_widget_type(new GVAElement_Gallery());
