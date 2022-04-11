<?php
  use Elementor\Group_Control_Image_Size;
  use Elementor\Icons_Manager;

  $settings = $this->get_settings_for_display();
  if ( empty( $settings['title_text'] ) ) {
    return;
  }
  $has_icon = ! empty( $settings['selected_icon']['value']);
  $skin = $settings['style'];
  $title_text = $settings['title_text'];
  $description_text = $settings['description_text'];
  $this->add_render_attribute( 'block', 'class', [ 'gsc-image-content', $settings['style'], 'triangles_style' . $settings['triangles_style'] ] );
  $header_tag = 'h2';
   
  $this->add_render_attribute( 'title_text', 'class', 'title' );
  $this->add_render_attribute( 'description_text', 'class', 'desc' );


  $this->add_inline_editing_attributes( 'title_text', 'none' );
  $this->add_inline_editing_attributes( 'description_text' );

?>
      
   <?php if($skin == 'skin-v1'){ ?>
      <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
        <div class="line-color"></div>
        <?php if ( $has_icon || $settings['title_text']){ ?>
          <div class="content-box">
          <?php if ( $has_icon ){ ?>
               <div class="image-icon">
                     <span class="icon">
                        <?php Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                     </span>
               </div>
            <?php } ?>
            <?php if( $settings['title_text']){ ?>
              <div class="title"><span><?php print $settings['title_text'] ?></span></div>
            <?php } ?>
          </div>
        <?php } ?>
        <?php if (!empty($settings['image']['url'])) : ?>
          <div class="image">
            <?php 
              $image_url = $settings['image']['url']; 
              $image_html = '<img src="' . esc_url($image_url) .'" alt="'. esc_attr($settings['title_text']) . '" />';
              $this->gva_render_link_html($image_html, $settings['link']);
            ?>  
          </div>
        <?php endif; ?>

        <?php if (!empty($settings['image_second']['url'])) : ?>
          <div class="image-second">
            <?php 
              $image_url_second = $settings['image_second']['url']; 
              $image_html = '<img src="' . esc_url($image_url_second) .'" alt="'. esc_attr($settings['title_text']) . '" />';
              $this->gva_render_link_html($image_html, $settings['link']); 
            ?>  
          </div>
        <?php endif; ?>

      </div>
   <?php } ?>  
    
   <?php if($skin == 'skin-v2'){ ?>
      <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
        <?php if( $settings['title_text']){ ?>
          <div class="title"><span><?php print $settings['title_text'] ?></span></div>
        <?php } ?>
        <?php if (!empty($settings['image']['url'])) : ?>
          <div class="image">
            <?php
              $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'image');
              $this->gva_render_link_html($image_html, $settings['link']);
            ?>
          </div>
        <?php endif; ?>
      </div>
   <?php } ?> 

   <?php if($skin == 'skin-v3'){ ?>
      <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
         <?php if (!empty($settings['image']['url'])) : ?>
            <div class="image">
                  <?php
                    $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'image');
                    $this->gva_render_link_html($image_html, $settings['link']);
                  ?>
            </div>
         <?php endif; ?>
         <div class="box-content">
            <?php if($title_text){ ?>
              <<?php echo esc_attr($header_tag) ?> <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
                <?php $this->gva_render_link_html($title_text, $settings['link']); ?>
              </<?php echo esc_attr($header_tag) ?>>
            <?php } ?>
            <div <?php echo $this->get_render_attribute_string( 'description_text' ); ?>><?php echo wp_kses($description_text, true); ?></div>
         </div>  
      </div>
<?php } ?>

<?php if($skin == 'skin-v4'){ ?>
  <div <?php echo $this->get_render_attribute_string( 'block' ) ?>>
    <?php if (!empty($settings['image']['url'])) : ?>
      <div class="image">
          <?php
            $image_html = Group_Control_Image_Size::get_attachment_image_html($settings, 'image');
            $this->gva_render_link_html($image_html, $settings['link']);
          ?>
      </div>
    <?php endif; ?>
    <div class="box-content">
      <?php if($title_text){ ?>
         <<?php echo esc_attr($header_tag) ?> <?php echo $this->get_render_attribute_string( 'title_text' ); ?>>
            <?php $this->gva_render_link_html($title_text, $settings['link']); ?>
         </<?php echo esc_attr($header_tag) ?>>
      <?php } ?>
      <div <?php echo $this->get_render_attribute_string( 'description_text' ); ?>><?php echo wp_kses($description_text, true); ?></div>
      <?php if(!empty($settings['link']['url'])){ ?>
        <div class="read-more">
          <?php $this->gva_render_link_html('<span>' . esc_html($settings['link_text']) . '</span>', $settings['link'], 'btn-theme btn-small'); ?>
        </div>
      <?php } ?>
    </div>  
  </div>
<?php } ?> 