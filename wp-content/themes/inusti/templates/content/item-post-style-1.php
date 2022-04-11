<?php 
   $item_classes = 'all ';
   $separator = ' ';
   $item_cats = get_the_terms( get_the_ID(), 'category' );
   if(!empty($item_cats) && !is_wp_error($item_cats)){
      foreach((array)$item_cats as $item_cat){
         $item_classes .= $item_cat->slug . ' ';
      }
   }
   $thumbnail = 'post-thumbnail';
   if(isset($thumbnail_size) && $thumbnail_size){
      $thumbnail = $thumbnail_size;
   }

   if(!isset($excerpt_words)){
      $excerpt_words = inusti_get_option('blog_excerpt_limit', 20);
   }

   if(!isset($layout)){
      $layout = 'carousel';
   }
   if($layout == 'grid'){
      $item_classes .= ' item-columns';
   }
?>

<div class="<?php echo esc_attr($item_classes) ?>">
   <article id="post-<?php echo esc_attr(get_the_ID()); ?>" <?php post_class(); ?>>
      <div class="post-block post-style-1">
         <div class="post-thumbnail">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
               <?php the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) ); ?>
            </a>   
            <?php if( get_the_date() ){ ?>
               <div class="entry-date"><?php echo esc_html( get_the_date( get_option( 'date_format' ) ) ) ?></div>
            <?php } ?>
         </div>   

         <div class="entry-content">
            <div class="content-inner">
               <div class="entry-meta">
                  <?php inusti_posted_on(); ?>                  
               </div> 
               <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
               <div class="read-more">
                  <a class="btn-inline" href="<?php echo esc_url( get_permalink() ) ?>"><?php echo esc_html__('Read more', 'inusti'); ?></a>
               </div>
            </div>
         </div>
      </div>   
   </article>   
</div>

  