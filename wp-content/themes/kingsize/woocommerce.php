<?php
/**
 * @KingSize 2011 - This is the page.php
 *
 * @KingSize Template by Denoizzed and Our Web Media
 * Developed by: Our Web Media 2011
 * Developer URL: http://themeforest.net/user/OurWebMedia
 * Original design by: Denoizzed 2010
 * Author URL: http://themeforest.net/user/Denoizzed
 **/
$tpl_body_id = 'blog_overview';
global $data,$postParentPageID;
get_header(); ?>

<?php $postParentPageID = $post->ID; //Page POSTID for shortcodes 
$comment_status = $post->comment_status;

//comments enabled OR not checking
$CommentsEnabled = false;
if ( $data['wm_show_comments'] == 1  && $comment_status != "closed" ){
	$CommentsEnabled = true;
}elseif ( $data['wm_show_comments'] != 0   && $comment_status != "closed"  ) {
	$CommentsEnabled = true;
}

//sidebar enabled OR not checking
$page_sidebar_hide = "";
$page_sidebar_hide = get_post_meta($postParentPageID, 'post_sidebar_hide', true );

//sidebar enabled OR not checking
$sidebarEnabled = false;
if ( $data['wm_wc_sidebar_enabled'] == 1  && $page_sidebar_hide != 1 ){
	$sidebarEnabled = true;
}
elseif ( $data['wm_wc_sidebar_enabled'] != 0   && $page_sidebar_hide != 1  ) {
	$sidebarEnabled = true;
}
?>
			
			<!-- Begin Breadcrumbs -->
			<div class="row">
				<div class="twelve columns">
					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs" class="yoast-bc">','</p>');
					} ?>
				</div>
			</div>
			<!-- End Breadcrumbs -->
    
            <div class="row">

		    	<?php if ( $sidebarEnabled == true ) { ?>
				<div class="blog ks-woocommerce">
				<!-- Begin Left Content -->
				<div class="blog_block_left ks-woocommerce">	
				<?php } else { ?>
				<div class="twelve columns ks-woocommerce">
				<?php } ?>

					<!-- Content here -->
					<?php woocommerce_content(); ?>

				<!-- Begin Sidebar -->
				<?php if ( $sidebarEnabled == true ) { ?>
				</div><!-- End Left Content -->
					<div id="sidebar" class="blog_block_right">			        
						<?php if ( !function_exists('generated_dynamic_sidebar') || !generated_dynamic_sidebar("WooCommerce Sidebar") ) : ?><?php endif; ?>
					</div> 
				<?php } ?>
				<!-- End Sidebar --> 
				
				</div> <!-- twelve columns/blog  -->
            </div> <!-- end row -->

<?php get_footer(); ?>
