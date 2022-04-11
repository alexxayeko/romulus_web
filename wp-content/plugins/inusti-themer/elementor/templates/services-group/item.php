<?php 
	use Elementor\Icons_Manager;
	$has_icon = ! empty( $item['selected_icon']['value']); 
?>

<?php if($settings['style'] == 'style-1'): ?>
   <div class="service-item <?php echo esc_attr($settings['style']) ?>">
      <div class="service-item-content">
      		<div class="service-image">	      	
			
			<?php if($item['image']['url']){ ?>
				<img src="<?php echo esc_url($item['image']['url']) ?>" alt="<?php echo esc_html($item['title']) ?>" />
			<?php } ?>		
	            <?php if ( $has_icon ){ ?>
					<span class="service-icon">
						<?php Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</span>
				<?php } ?>
			</div>
            <div class="service-content">
				<?php if($item['title']){ ?>
					<h3 class="title"><span><?php echo $item['title'] ?></span></h3>
				<?php } ?>

				<?php if($item['desc']){ ?>
					<div class="desc"><?php echo $item['desc'] ?></div>
				<?php } ?>

				<?php if($item['link']['url']){ ?>					
					<div class="read-more">
		               <a href="<?php echo esc_url($item['link']['url']) ?>">
		               	<i class="fas fa-long-arrow-alt-right"></i>
		               </a>
		            </div>
				<?php } ?>
			</div>
		</div>
		
		<?php echo $this->gva_render_link_overlay($item['link']) ?>
	</div>		
<?php endif; ?>	


<!-- Style II -->
<?php if($settings['style'] == 'style-2'): ?>
   <div class="service-item <?php echo esc_attr($settings['style']) ?>">
      <div class="service-item-content">
			<?php if($item['title']){ ?>
				<h3 class="title"><span><?php echo $item['title'] ?></span></h3>
			<?php } ?>
			<div class="service-content">
				<?php if($item['image']['url']){ ?>
					<div class="service-image">	
						<img src="<?php echo esc_url($item['image']['url']) ?>" alt="<?php echo esc_html($item['title']) ?>" />
					</div>
				<?php } ?>
				<div class="content-inner">
					<?php if ( $has_icon ){ ?>
						<span class="service-icon">
							<?php Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</span>
					<?php } ?>
					
					<?php if($item['desc']){ ?>
						<div class="desc"><?php echo $item['desc'] ?></div>
					<?php } ?>
				</div>

			</div>

		</div>
		
		<?php echo $this->gva_render_link_overlay($item['link']) ?>
	</div>
<?php endif; ?>	