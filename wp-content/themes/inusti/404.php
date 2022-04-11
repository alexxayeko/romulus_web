<?php
/**
 * $Desc
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2021 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * 
 */
?>
<?php get_header(); ?>
<div id="content">
	<div class="page-wrapper">
		<?php 
			$primary_text = inusti_get_option('nfpage_primary_text', esc_html__('404', 'inusti'));
			$title = inusti_get_option('nfpage_title', esc_html__('Page Not Found', 'inusti'));
			$desc = inusti_get_option('nfpage_desc', esc_html('The page requested could not be found. This could be a spelling error in the URL or a removed page.', 'inusti'));
			$btn_title = inusti_get_option('nfpage_btn_title', esc_html__( 'Back Homepage', 'inusti' ));
			$btn_link = !empty(inusti_get_option('nfpage_btn_link', '')) ? inusti_get_option('nfpage_btn_link', '') : home_url( '/' );
			
		?>
		<div class="not-found-wrapper text-center">
			
			<?php if(!empty($primary_text)){ ?>
				<div class="not-found-title"><h1><span><?php echo esc_html($primary_text) ?></span></h1></div>
			<?php } ?>

			<?php if(!empty($title)){ ?>
				<div class="not-found-subtitle"><?php echo esc_html($title) ?></div>
			<?php } ?>

			<?php if(!empty($desc)){ ?>
				<div class="not-found-desc"><?php echo esc_html($desc)?></div> 
			<?php } ?>	

			<div class="not-found-home text-center">
				<a href="<?php echo esc_url( $btn_link ); ?>"><i class="far fa-arrow-alt-circle-left"></i><?php echo esc_html($btn_title) ?></a>
			</div>

		</div>
	</div>
</div>

<?php get_footer(); ?>