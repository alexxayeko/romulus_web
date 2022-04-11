<?php 
  $inusti_options = inusti_get_options();
?>

<div class="header-mobile d-xl-none d-lg-none d-md-block d-sm-block d-xs-block">
    
    <?php if(inusti_get_option('hm_show_topbar') == 'yes'){ ?>

    <div class="topbar-mobile">
      <div class="row">
        <?php if(inusti_get_option('hm_topbar_information', '')){ ?>
          <div class="col-12 col-xl-8 col-lg-8 col-md-8 col-sm-8 topbar-left">
            <div class="content-inner topbar-information">
                <?php echo html_entity_decode(inusti_get_option('hm_topbar_information')) ?>
            </div>
          </div>
        <?php } ?>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 d-none d-xl-block d-lg-block d-md-block topbar-right">
          <ul class="socials-2">
             <?php if(inusti_get_option('hm_social_facebook', '')){ ?>
               <li><a href="<?php echo esc_url(inusti_get_option('hm_social_facebook', '')); ?>"><i class="fab fa-facebook-square"></i></a></li>
             <?php } ?> 

             <?php if(inusti_get_option('hm_social_instagram', '')){ ?>
               <li><a href="<?php echo esc_url(inusti_get_option('hm_social_instagram', '')); ?>"><i class="fab fa-instagram"></i></a></li>
             <?php } ?>  

             <?php if(inusti_get_option('hm_social_twitter', '')){ ?>
               <li><a href="<?php echo esc_url(inusti_get_option('hm_social_twitter', '')); ?>"><i class="fab fa-twitter"></i></a></li>
             <?php } ?>  

             <?php if(inusti_get_option('hm_social_linkedin', '')){ ?>
               <li><a href="<?php echo esc_url(inusti_get_option('hm_social_linkedin', '')); ?>"><i class="fab fa-linkedin"></i></a></li>
             <?php } ?> 

             <?php if(inusti_get_option('hm_social_pinterest', '')){ ?>
               <li><a href="<?php echo esc_url(inusti_get_option('hm_social_pinterest', '')); ?>"><i class="fab fa-pinterest"></i></a></li>
             <?php } ?> 
        
             <?php if(inusti_get_option('hm_social_tumblr', '')){ ?>
               <li><a href="<?php echo esc_url(inusti_get_option('hm_social_tumblr', '')); ?>"><i class="fab fa-tumblr-square"></i></a></li>
             <?php } ?>

             <?php if(inusti_get_option('hm_social_vimeo', '')){ ?>
               <li><a href="<?php echo esc_url(inusti_get_option('hm_social_vimeo', '')); ?>"><i class="fab fa-vimeo"></i></a></li>
             <?php } ?>

              <?php if(inusti_get_option('hm_social_youtube', '')){ ?>
               <li><a href="<?php echo esc_url(inusti_get_option('hm_social_youtube', '')); ?>"><i class="fab fa-youtube-square"></i></a></li>
             <?php } ?>
          </ul>

        </div>
        
      </div>
    </div>

  <?php } ?>  

    <div class="header-mobile-content">
    <div class="header-content-inner clearfix"> 
     
        <div class="header-left">
        <div class="logo-mobile">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php echo ((isset($inusti_options['hm_logo']['url']) && $inusti_options['hm_logo']['url']) ? $inusti_options['hm_logo']['url'] : get_template_directory_uri().'/images/logo-mobile.png'); ?>" alt="<?php bloginfo( 'name' ); ?>" />
          </a>
        </div>
        </div>

        <div class="header-right">

        <div class="main-search gva-search">
          <a class="control-search">
            <i class="icon fi flaticon-magnifying-glass"></i>
          </a>
          <div class="gva-search-content search-content">
              <div class="search-content-inner">
              <div class="content-inner"><?php get_search_form(); ?></div>  
              </div>  
          </div>
        </div>
        
        <?php get_template_part('templates/parts/canvas-mobile'); ?>

        </div>

    </div>  
    </div>
</div>