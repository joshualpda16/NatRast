<?php
/**
 Template Name: Blog Page
 **/
 $tpl_body_id = 'blog_overview';
get_header(); 
global $postParentPageID,$data;
$postParentPageID = $post->ID; //Page POSTID

$page_sidebar_hide = "";
$page_sidebar_hide = get_post_meta($postParentPageID, 'page_sidebar_hide', true );

//sidebar enabled OR not checking
$sidebarEnabled = false;
if ( $data['wm_sidebar_enabled'] == 1  && $page_sidebar_hide != 1 ){
	$sidebarEnabled = true;
}
elseif ( $data['wm_sidebar_enabled'] != 0   && $page_sidebar_hide != 1  ) {
	$sidebarEnabled = true;
}
?>

  			<!--Page title start-->
  			<?php if ( $data['wm_show_page_post_headers'] == "" || $data['wm_show_page_post_headers'] == "0" ) { ?>
				<div class="row header">
					<div class="<?php if ( $sidebarEnabled == true ) {?>eight<?php } else { ?>twelve<?php } ?> columns">
						<h2 class="title-page"><?php the_title(); ?></h2>
					</div>
				</div>
			<?php } else { ?>
				<div class="row header">
					<div class="<?php if ( $sidebarEnabled == true ) {?>eight<?php } else { ?>twelve<?php } ?> columns">
						<h2 class="title-page"></h2>
					</div>
				</div>
			<?php } ?>					
			<!-- Ends Page title --> 
			
			<!-- Begin Breadcrumbs -->
			<div class="row">
				<div class="twelve columns">
					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs" class="yoast-bc">','</p>');
					} ?>
				</div>
			</div>
			<!-- End Breadcrumbs -->
    
			<!-- Content starts here -->
            <div class="row">
            	<div class="<?php if ( $sidebarEnabled == true ) {?>blog page_content<?php }  else { ?>twelve columns  mobile-twelve page_content<?php }?>">

					<?php if ( $sidebarEnabled == true ) {?>
					<div class="blog_block_left">
					<?php } ?>
					
					<?php
					if (get_query_var('paged')) {
						$paged = get_query_var('paged');
					} elseif (get_query_var('page')) {
						$paged = get_query_var('page');
					} else {
						$paged = 1;
					}


					global $more; $more = false; # some wordpress wtf logic
					$query_string ="post_type=post&paged=$paged";
					$cat_id = get_cat_ID(single_cat_title('', false));
					if(!empty($cat_id))
					{
						$query_string.= '&cat='.$cat_id;
					}

					query_posts($query_string);
					if (have_posts()) : while (have_posts()) : the_post();
					?>
  					<!-- Post -->
     				 <div class="post">
		 				  <h3 class="post_title">
						  	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						  </h3>
     							
					  	   <!-- Post details -->
					   <?php 
						 if( $data['wm_date_enabled'] == '1' || $data['wm_meta_comments_enabled'] == '1' ) { //data is enabled
						?>
				           <div class="blog_date">
							    <?php 
								 if( $data['wm_date_enabled'] == '1' ) { //data is enabled
								 ?>
								 	<ul class="icon-list">
									 	<li><i class="fa fa-calendar"></i></li>
									 	<li><?php the_time(get_option('date_format')); ?></li>
									</ul>
								 <?php
								 }	 
								 ?>		
				                 <?php //edit_post_link('edit post', ', ', ''); ?>
							    <?php 
								 if( $data['wm_meta_comments_enabled'] == '1' ) { //data is enabled
								 ?>
									<ul class="icon-list right text-right">
										<li><i class="fa fa-comments"></i></li>
										<li><a href="<?php the_permalink(); ?>#comments" class="underline"><?php comments_number(__('No comments', 'kslang'), __('1 comment', 'kslang'), __('% comments', 'kslang')); ?></a></li>
									</ul>
				                 <?php
								 }	 
								 ?>	
				            </div>
						<?php
						 }	 
						?>

							<!-- Post thubmnail -->	
							<?php
								//show the image in lightbox									
									$show_image_lightbox = get_post_meta($post->ID, 'kingsize_featured_img_lightbox', true );

								//POST featured image height
									if(get_post_meta($post->ID, 'kingsize_post_featured_img_height', true ))
										$post_featured_img_height = get_post_meta($post->ID, 'kingsize_post_featured_img_height', true );
									else
										$post_featured_img_height = 180;

								 //Sidebar enabled	
									if ( $data['wm_sidebar_enabled'] == "1"   && get_post_meta($postParentPageID, 'page_sidebar_hide', true ) == "") 
										$post_featured_img_width = 460;
									else
										$post_featured_img_width = 680;//showing full width
											
									if(has_post_thumbnail()): // POST has thumbnail

										$org_img_url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
										$attachment_id =  get_post_thumbnail_id($post->ID);

										$url_post_img = wm_image_resize($post_featured_img_width,$post_featured_img_height, wp_get_attachment_url($attachment_id));
										
										if($show_image_lightbox=='enable')
											echo '<div class="blog_img"><a href="'.$org_img_url.'" class="image lightbox_blog" title="'.get_the_title().'" rel="gallery"><img src="'.$org_img_url.'" alt="'.get_the_title().'" class=""/></a></div>';
										else 
											echo '<div class="blog_img"><a href="'.get_permalink( $postid ).'" class="lightbox_not" title="'.get_the_title().'"><img src="'.$org_img_url.'" alt="'.get_the_title().'" class=""/></a></div>';
										
									endif;
							?>
							<!-- END Post thubmnail -->

							<!-- POST Content -->
							<div class="blog_text">
							<?php 
								///Enable the gallery with next previous of images
								if( $data['wm_enable_rtf_excerpts'] == '0' ) {
									echo get_the_content_with_formatting($data['wm_read_more_text']);
								}		
								elseif ( $data['wm_blog_img_gallery_nxt_prev'] == "1" ) {								
									$post_content = get_content();
									//$post_content = apply_filters('the_content', $post_content);
									//$post_content = str_replace(']]>', ']]&gt;', $post_content);
									
									if( preg_match_all( '/<img[^>]+src\s*=\s*["\']?([^"\' ]+)[^>]*>/', $post_content, $extracted_image ) ) {
									  
										
									 // print_r($extracted_image);	
									  $post_content = str_replace("<a ","<a rel='prettyPhoto[gallery]' ",$post_content); 
									}
									

									$post_content = str_replace("(more...)",$data['wm_read_more_text'],$post_content);
									$post_content = str_replace("(more&#8230;)",$data['wm_read_more_text'],$post_content);

									echo $post_content;
								}
								else {
									$post_content = get_content(); 
									$post_content = str_replace("(more...)",$data['wm_read_more_text'],$post_content);
									$post_content = str_replace("(more&#8230;)",$data['wm_read_more_text'],$post_content);

									echo $post_content;
								}
								?>
							</div>
							<!-- POST Content END -->
							
					</div>
					<!-- Post ends here -->    
					<?php endwhile; ?>		

					<div id="pagination-container">

						<!-- Pagination -->
						<?php if (  $wp_query->max_num_pages > 1 ) : $paged = intval(get_query_var('paged')); ?>
							<div id="pagination">										
								<div class="older"><?php next_posts_link( __('&larr; Older entries', 'kslang') ); ?></div>
				
								<?php if($paged > 1) :?>
									<div class="newer"><?php previous_posts_link( __('Newer entries &rarr;', 'kslang') ); ?></div>
								<?php endif; ?>
							</div><!-- #nav-below -->
						<?php endif; ?>
						<!-- End Pagination -->						
					
					</div>
					
					<?php wp_reset_postdata(); endif; ?>
				
			</div>
 			<!-- Content ends here -->
  
 			
			<!-- Sidebar begins here -->
			<?php if ( $sidebarEnabled == true ) {?>
			</div><!-- end DIV .blog_block_left -->
			
			<div id="sidebar" class="blog_block_right"> <!-- Sidebar go here -->
				<?php if ( !function_exists('generated_dynamic_sidebar') || !generated_dynamic_sidebar("Pages Sidebar") ) : ?><?php endif; ?>
			</div>
			<?php } ?>
		    <!-- Sidebar ends here--> 

<?php get_footer(); ?>
