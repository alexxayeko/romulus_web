<?php
   if (!defined('ABSPATH')) {
      exit; // Exit if accessed directly.
   }
   use Elementor\Group_Control_Image_Size;
?>
   
<?php if( $settings['style'] == 'style-2' ){ 

   $this->add_render_attribute('wrapper', 'class', ['gva-testimonial-grid gva-testimonial' , $settings['style'] ]);
   
   //add_render_attribute grid
   $this->get_grid_settings();
?>
   <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <div <?php echo $this->get_render_attribute_string('grid') ?>>
         <?php
         foreach ($settings['testimonials'] as $testimonial): ?>
            <?php 
               $avatar = (isset($testimonial['testimonial_image']['url']) && $testimonial['testimonial_image']['url']) ? $testimonial['testimonial_image']['url'] : '';
            ?>
            <div class="item-columns">
               <div class="testimonial-item">
                  <div class="content-inner">
                     <div class="testimonial-content">
                        <div class="testimonial-meta clearfix">
                           <div class="testimonial-image"><img src="<?php echo esc_url($avatar) ?>" alt="<?php echo $testimonial['testimonial_name']; ?>" /></div>
                           <div class="testimonial-information">
                              <span class="testimonial-name"><?php echo $testimonial['testimonial_name']; ?></span>
                              <span class="testimonial-job"><?php echo $testimonial['testimonial_job']; ?></span>
                           </div>
                        </div>
                        <div class="testimonial-quote"><?php echo $testimonial['testimonial_content']; ?></div>
                     </div>
                  </div>   
               </div>
            </div>   
         <?php endforeach; ?>
      </div>
   </div>
   <?php
}