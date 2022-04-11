<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Image_Size;
use Elementor\Repeater;

class GVAElement_Brand extends GVAElement_Base{

    /**
     * Get widget name.
     *
     * Retrieve testimonial widget name.
     *
     * @since  1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'gva-brand';
    }

    /**
     * Get widget title.
     *
     * Retrieve testimonial widget title.
     *
     * @since  1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('GVA Brand', 'inusti-themer');
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
        return 'eicon-posts-carousel';
    }

    public function get_keywords() {
        return [ 'brand', 'content', 'carousel' ];
    }

    public function get_script_depends() {
      return [
          'jquery.owl.carousel',
          'gavias.elements',
      ];
    }

    public function get_style_depends() {
      return array('owl-carousel-css');
    }

    /**
     * Register testimonial widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'inusti-themer'),
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'title',
            [
                'label'       => __('Title', 'inusti-themer'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Title Brand', 'inusti-themer'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label'      => __('Choose Image', 'inusti-themer'),
                'default'    => [
                    'url' => GAVIAS_INUSTI_PLUGIN_URL . 'elementor/assets/images/brand.png',
                ],
                'dynamic' => [
                  'active' => true,
                ],
                'type'       => Controls_Manager::MEDIA,
                'show_label' => false,
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label'      => __('Link', 'inusti-themer'),
                'placeholder' => __( 'https://your-link.com', 'inusti-themer' ),
                'type'       => Controls_Manager::URL,
            ]
        );
        $this->add_control(
            'brands',
            [
                'label'       => __('Brand Content Item', 'inusti-themer'),
                'type'        => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
                'default'     => array(
                    array(
                        'title'  => esc_html__( 'Brand 1', 'inusti-themer' )
                    ),
                    array(
                        'title'  => esc_html__( 'Brand 2', 'inusti-themer' )
                    ),
                    array(
                        'title'  => esc_html__( 'Brand 3', 'inusti-themer' )
                    ),
                    array(
                        'title'  => esc_html__( 'Brand 4', 'inusti-themer' )
                    ),
                    array(
                        'title'  => esc_html__( 'Brand 5', 'inusti-themer' )
                    ),
                    array(
                        'title'  => esc_html__( 'Brand 6', 'inusti-themer' )
                    ),
                ),
            ]
        );
        $this->add_control(
            'style',
            array(
                'label'   => esc_html__( 'Style', 'inusti-themer' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style-2',
                'options' => [
                  'style-1' => esc_html__('Carousel 2 Rows', 'inusti-themer'),
                  'style-2' => esc_html__('Carousel 1 Row', 'inusti-themer'),
                ]
            )
        );
        $this->add_group_control(
            Elementor\Group_Control_Image_Size::get_type(),
            [
                'name'      => 'image', 
                'default'   => 'full',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'view',
            [
                'label'   => __('View', 'inusti-themer'),
                'type'    => Controls_Manager::HIDDEN,
                'default' => 'traditional',
            ]
        );
        $this->end_controls_section();

        $this->add_control_carousel(false);


        // Image Styling
        $this->start_controls_section(
            'section_style_image',
            [
                'label'     => __('Image', 'inusti-themer'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => 'image_border',
                'selector'  => '{{WRAPPER}} .gva-brand-carousel .brand-item-content img',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label'      => __('Border Radius', 'inusti-themer'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .gva-brand-carousel .brand-item-content img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

     


        

    }

    /**
     * Render testimonial widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access protected
     */
    protected function render() {
      $settings = $this->get_settings_for_display();
      printf( '<div class="gva-element-%s gva-element">', $this->get_name() );
        include $this->get_template('brand.php');
      print '</div>';
    }
}

$widgets_manager->register_widget_type(new GVAElement_Brand());
