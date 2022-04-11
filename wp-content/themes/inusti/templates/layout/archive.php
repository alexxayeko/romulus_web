<?php
/**
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2021 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */
  $columns_lg = inusti_get_option('blog_columns_lg', '2');
  $columns_md = inusti_get_option('blog_columns_md', '2');
  $columns_sm = inusti_get_option('blog_columns_sm', '1');
  $columns_xs = inusti_get_option('blog_columns_xs', '1');

?>

<div class="clearfix">

    <?php do_action( 'inusti_page_content_before' ); ?>
    <div class="posts-grids blog-grid-style">
      <div class="post-items lg-block-grid-<?php echo esc_attr($columns_lg) ?> md-block-grid-<?php echo esc_attr($columns_md) ?> sm-block-grid-<?php echo esc_attr($columns_sm) ?> xs-block-grid-<?php echo esc_attr($columns_xs) ?>">
        <?php if ( have_posts() ) : ?>
          <?php
             // Start the Loop.
             while ( have_posts() ) : the_post();

                echo '<div class="item-columns">';  
                  set_query_var( 'thumbnail_size', 'post-thumbnail' );
                  get_template_part( 'content', get_post_format() );
                echo '</div>';  
             endwhile;

          else :
             // If no content, include the "No posts found" template.
             get_template_part( 'content', 'none' );

          endif;
        ?>
      </div>
    </div>  
     <div class="pagination">
        <?php echo inusti_pagination(); ?>
     </div>
    <?php do_action( 'inusti_page_content_after' ); ?>

</div>


 
