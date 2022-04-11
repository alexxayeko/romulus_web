<?php
  $team_position = get_post_meta(get_the_id(), 'inusti_team_position', true );
  $team_socials = get_post_meta(get_the_id(), 'team_socials', false );
  if(isset($team_socials[0])){
  	$team_socials = $team_socials[0]; 
  }
  $show_skills = $settings['show_skills'];
  $image_size = $settings['image_size'];
  $excerpt_words = $settings['excerpt_words'];
?>
<div class="team-block team-v2">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="team-image">
		 	<a class="overlay" href="<?php the_permalink(); ?>"></a>
      <?php the_post_thumbnail($image_size); ?>
		 	<?php if($team_socials){ ?>
			   <div class="socials-team">
		     	<?php foreach ($team_socials as $key => $social) { ?>
		     		<?php if(isset($social['link']) && isset($social['icon'])){ ?>
				     	<a class="gva-social" href="<?php echo esc_url($social['link']) ?>"><i class="<?php echo esc_attr($social['icon']) ?>"></i></a>
				   <?php } ?>   
		     	<?php } ?>
          <a class="gva-social share-social" href="#"><svg height="512pt" viewBox="-21 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m453.332031 85.332031c0 38.292969-31.039062 69.335938-69.332031 69.335938s-69.332031-31.042969-69.332031-69.335938c0-38.289062 31.039062-69.332031 69.332031-69.332031s69.332031 31.042969 69.332031 69.332031zm0 0"/><path d="m384 170.667969c-47.0625 0-85.332031-38.273438-85.332031-85.335938 0-47.058593 38.269531-85.332031 85.332031-85.332031s85.332031 38.273438 85.332031 85.332031c0 47.0625-38.269531 85.335938-85.332031 85.335938zm0-138.667969c-29.417969 0-53.332031 23.9375-53.332031 53.332031 0 29.398438 23.914062 53.335938 53.332031 53.335938s53.332031-23.9375 53.332031-53.335938c0-29.394531-23.914062-53.332031-53.332031-53.332031zm0 0"/><path d="m453.332031 426.667969c0 38.289062-31.039062 69.332031-69.332031 69.332031s-69.332031-31.042969-69.332031-69.332031c0-38.292969 31.039062-69.335938 69.332031-69.335938s69.332031 31.042969 69.332031 69.335938zm0 0"/><path d="m384 512c-47.0625 0-85.332031-38.273438-85.332031-85.332031 0-47.0625 38.269531-85.335938 85.332031-85.335938s85.332031 38.273438 85.332031 85.335938c0 47.058593-38.269531 85.332031-85.332031 85.332031zm0-138.667969c-29.417969 0-53.332031 23.9375-53.332031 53.335938 0 29.394531 23.914062 53.332031 53.332031 53.332031s53.332031-23.9375 53.332031-53.332031c0-29.398438-23.914062-53.335938-53.332031-53.335938zm0 0"/><path d="m154.667969 256c0 38.292969-31.042969 69.332031-69.335938 69.332031-38.289062 0-69.332031-31.039062-69.332031-69.332031s31.042969-69.332031 69.332031-69.332031c38.292969 0 69.335938 31.039062 69.335938 69.332031zm0 0"/><path d="m85.332031 341.332031c-47.058593 0-85.332031-38.269531-85.332031-85.332031s38.273438-85.332031 85.332031-85.332031c47.0625 0 85.335938 38.269531 85.335938 85.332031s-38.273438 85.332031-85.335938 85.332031zm0-138.664062c-29.417969 0-53.332031 23.933593-53.332031 53.332031s23.914062 53.332031 53.332031 53.332031c29.421875 0 53.335938-23.933593 53.335938-53.332031s-23.914063-53.332031-53.335938-53.332031zm0 0"/><path d="m135.703125 245.761719c-7.425781 0-14.636719-3.863281-18.5625-10.773438-5.824219-10.21875-2.238281-23.253906 7.980469-29.101562l197.949218-112.851563c10.21875-5.867187 23.253907-2.28125 29.101563 7.976563 5.824219 10.21875 2.238281 23.253906-7.980469 29.101562l-197.953125 112.851563c-3.328125 1.898437-6.953125 2.796875-10.535156 2.796875zm0 0"/><path d="m333.632812 421.761719c-3.585937 0-7.210937-.898438-10.539062-2.796875l-197.953125-112.851563c-10.21875-5.824219-13.800781-18.859375-7.976563-29.101562 5.800782-10.238281 18.855469-13.84375 29.097657-7.976563l197.953125 112.851563c10.21875 5.824219 13.800781 18.859375 7.976562 29.101562-3.945312 6.910157-11.15625 10.773438-18.558594 10.773438zm0 0"/></svg></a>
			   </div>
			<?php } ?>
		</div>
	<?php endif ?>
	<div class="team-content">  
	   <div class="team-content-inner">
         <h3 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
   	   <?php if($team_position){ ?>   
   	   	<div class="team-job"><?php echo esc_html( $team_position ); ?></div>
   	   <?php } ?>
       <div class="team-desc"><?php echo inusti_limit_words($excerpt_words, get_the_excerpt(), get_the_content()); ?></div>
      </div>
	</div>
   <?php 
   if($show_skills == 'yes'){
      $team_skills = get_post_meta(get_the_id(), 'team_skills', false );
      if( is_array($team_skills) && isset($team_skills[0]) ){ 
   ?>
      <div class="team-skills clearfix">
         <div class="vc_progress_bar wpb_content_element vc_progress-bar-color-bar_blue">
           <?php foreach ($team_skills[0] as $key => $skill) { ?>
             <?php if(isset($skill['label']) && isset($skill['volume'])){ ?>
               <div class="vc_general vc_single_bar clearfix">
                 <small class="vc_label"><?php echo esc_html( $skill['label'] ); ?><span class="vc_label_units"><?php echo esc_html( $skill['volume'] ) ?>%</span></small>
                 <span class="vc_bar" data-percentage-value="<?php echo esc_attr( $skill['volume'] ) ?>" data-value="<?php echo esc_attr( $skill['volume'] ) ?>"></span>
               </div>
            <?php } ?>   
           <?php } ?>
         </div>  
      </div>
   <?php 
      }
   }
   ?>
</div>  