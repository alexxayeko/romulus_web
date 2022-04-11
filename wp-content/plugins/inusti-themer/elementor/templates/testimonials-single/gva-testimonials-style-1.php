<?php
   if (!defined('ABSPATH')) {
      exit; // Exit if accessed directly.
   }
   use Elementor\Group_Control_Image_Size;
?>
   
<?php 
   $this->add_render_attribute('wrapper', 'class', ['gva-testimonial-single' , $settings['style'] ]);
   $this->add_render_attribute('carousel', 'class', 'init-carousel-owl owl-carousel');
?>
   <div <?php echo $this->get_render_attribute_string('wrapper'); ?>>
      <div <?php echo $this->get_render_attribute_string('carousel') ?> <?php echo $this->get_carousel_settings() ?>>   
         <?php foreach ($settings['testimonials'] as $testimonial): ?>
            <?php 
               $image_url = $testimonial['testimonial_image']['url']; 
            ?>
            <div class="item testimonial-item">
               <div class="testimonial-content clearfix">
                  
                  <div class="testimonial-quote"><?php echo $testimonial['testimonial_content']; ?></div>
                  
                  <div class="testimonial-meta">
                     <h3 class="testimonial-name"><?php echo $testimonial['testimonial_name']; ?></h3>
                     <?php if( isset($testimonial['testimonial_job']) && $testimonial['testimonial_job'] ){ ?>
                        <div class="testimonial-job"><?php echo $testimonial['testimonial_job']; ?></div>
                     <?php } ?>
                  </div>
                  
                  <?php if($image_url){ ?>
                     <div class="testimonial-image">
                        <img src="<?php echo $image_url ?>" alt="<?php echo $testimonial['testimonial_name']; ?>"/>
                        <span class="icon-quote"></span>
                     </div>  
                  <?php } ?>   

               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>

