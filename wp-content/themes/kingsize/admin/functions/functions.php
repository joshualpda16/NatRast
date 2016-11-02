<?php
global $themename, $data;
$shortname = "wm";

function wm_wp_head() {
	global $themename, $data;
	$shortname = "wm";
	
	$wm_head_include = get_option( $shortname.'_head_include' ); 
	echo $wm_head_include;

	global $data;	

	global $post;

	///width of the slider caption
	if(get_post_meta($post->ID, 'kingsize_post_slide_caption', true ) != '')
		$width_slide_caption = get_post_meta($post->ID, 'kingsize_post_slide_caption', true );
	elseif(get_post_meta($post->ID, 'kingsize_page_slide_caption', true ) != '' )
		$width_slide_caption = get_post_meta($post->ID, 'kingsize_page_slide_caption', true );
	elseif(get_post_meta($post->ID, 'kingsize_portfolio_slide_caption', true ) != '' )
		$width_slide_caption = get_post_meta($post->ID, 'kingsize_portfolio_slide_caption', true );
	

?>
	
	<style type="text/css">
		a, .more-link {color: <?php echo $data['wm_link_color']; ?>;}
		a:hover, a:focus, a.underline:hover, a.comment-reply-link:hover {color: <?php echo $data['wm_link_color_hover']; ?>;}
		p, body, ul.contact-widget, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, ul, ol, li, blockquote {color: <?php echo $data['wm_color_text']; ?>;}
		
		<?php if ( !empty($data['wm_color_background']) ) { ?>
		.container {background-color:<?php echo $data['wm_color_background']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_color_background_border']) ) { ?>
		.container {border-color:<?php echo $data['wm_color_background_border']; ?> !important;}
		<?php } ?>
		.container {opacity:<?php echo $data['wm_color_background_opacity']; ?> !important; }
		
	    #mainNavigation ul li ul li a.active, #mainNavigation li.current-menu-item a, #navbar li.current-menu-ancestor > a , #mainNavigation li.current-menu-parent > a, #mainNavigation li.current-menu-item a, #mainNavigation li.current-menu-ancestor > a h5, #mainNavigation li.current-menu-parent > a > h5, #mainNavigation li.current-menu-parent > a, #mainNavigation li.current-menu-item a , #mainNavigation li.current-menu-ancestor > a, #mainNavigation li.current-menu-item h5 {color: <?php echo $data['wm_menu_active_color']; ?>;} 
		#navContainer h6.sub.space.active {color: <?php echo $data['wm_menu_active_description_color']; ?> ;}
		div.hide.success p {color: <?php echo $data['wm_success_color']; ?>;}
		#mainNavigation ul li ul {background: <?php echo $data['wm_submenu_color']; ?>;}
		#mainNavigation ul li ul {border: 1px solid <?php echo $data['wm_submenu_border_color']; ?>;}
		<?php if ( !empty($data['wm_menu_border_color']) ) { ?>
		#mainNavigation ul li:first-child {border-top:1px solid <?php echo $data['wm_menu_border_color']; ?> !important;}
		#mainNavigation ul li {border-bottom:1px solid <?php echo $data['wm_menu_border_color']; ?> !important;}
		#mainNavigation ul li ul li, #mainNavigation ul li ul li:first-child {border-top: none !important;}
		#mainNavigation ul li ul li:last-child {border-bottom: none !important;}
		<?php } ?>
		#navSquared, #navRounded, #navCircular {background-color:<?php echo $data['wm_menu_color_background']; ?> !important; opacity:<?php echo $data['wm_menu_color_background_opacity']; ?> !important;}
		#logo {height: <?php echo $data['wm_logo_height']; ?>px;}
		#navContainer h5 {color: <?php echo $data['wm_menu_text_color']; ?>;}
		#navContainer h6 {color: <?php echo $data['wm_menu_description_text_color']; ?>;}
		<?php if ( !empty($data['wm_menu_color_background']) ) { ?>
		#bgRepeat {background-color:<?php echo $data['wm_menu_color_background']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_menu_color_background_border']) ) { ?>
		#bgRepeat {border-color:<?php echo $data['wm_menu_color_background_border']; ?> !important;}
		div#navSquared, div#navRounded, div#navCircular {border-color:<?php echo $data['wm_menu_color_background_border']; ?> !important;}
		<?php } ?>
		#bgRepeat, #mainNavigation ul li ul {opacity:<?php echo $data['wm_menu_color_background_opacity']; ?> !important; }
		
		h1 {color: <?php echo $data['wm_heading_text_color_h1']; ?>;}
		h2 {color: <?php echo $data['wm_heading_text_color_h2']; ?>;} 
		h3, #footer_columns h3, #sidebar h3 {color: <?php echo $data['wm_heading_text_color_h3']; ?>;}
		h4 {color: <?php echo $data['wm_heading_text_color_h4']; ?>;} 
		h5 {color: <?php echo $data['wm_heading_text_color_h5']; ?>;} 
		h6 {color: <?php echo $data['wm_heading_text_color_h6']; ?>;} 
		h2.title-page {color: <?php echo $data['wm_section_header_titles_color']; ?>;} 
		<?php if ( !empty($data['wm_google_fonts_name']) ) { ?>#mainNavigation ul li ul li a, .post_title, .older-entries, .title-page, #navContainer .menu, h1, h2, h3, h4, h5, h6, .woocommerce div.product .woocommerce-tabs ul.tabs li a {font-family:<?php echo $data['wm_google_fonts_name'].' !important'?>;}<?php } ?>
		
		h2.slidecaption {color: <?php echo $data['wm_heading_text_color_h2_slider']; ?>;} 
		#slidedescriptiontext {color: <?php echo $data['wm_text_color_slider']; ?>;}
		a#slidebutton {color: <?php echo $data['wm_text_color_slider_link']; ?>;}
		a#slidebutton:hover {color: <?php echo $data['wm_text_color_slider_link_hover']; ?>;}
		
		.social-networks-menu a, .footer-networks a {color: <?php echo $data['wm_social_link_color']; ?>;}
		.social-networks-menu a:hover, .footer-networks a:hover {color: <?php echo $data['wm_social_link_color_hover']; ?>;}
		
		.post h3 a, h3.post_title a {color: <?php echo $data['wm_post_title_color']; ?>;}
		.post h3 a:hover, h3.post_title a:hover {color: <?php echo $data['wm_post_title_color_hover']; ?>;}
		<?php if ( !empty($data['wm_post_meta_border_color']) ) { ?>
		.blog_date {border-color: <?php echo $data['wm_post_meta_border_color']; ?> !important;}
		<?php } ?>
		
		<?php if ( !empty($data['wm_input_color']) ) { ?>
		input[type="text"], input[type="password"], input[type="date"], input[type="datetime"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], textarea {background-color: <?php echo $data['wm_input_color']; ?> !important; color: <?php echo $data['wm_input_text_color']; ?> !important;} 
		<?php } ?>
		<?php if ( !empty($data['wm_input_color_border']) ) { ?>
		input[type="text"], input[type="password"], input[type="date"], input[type="datetime"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], textarea {border-color: <?php echo $data['wm_input_color_border']; ?> !important;} 
		<?php } ?>
		<?php if ( !empty($data['wm_input_focus_color']) ) { ?>
		input[type="text"]:focus, input[type="password"]:focus, input[type="date"]:focus, input[type="datetime"]:focus, input[type="email"]:focus, input[type="number"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="time"]:focus, input[type="url"]:focus, textarea:focus {background-color: <?php echo $data['wm_input_focus_color']; ?> !important; color: <?php echo $data['wm_input_focus_text_color']; ?> !important;}
		<?php } ?>
		
		/* Font Sizes */
		<?php if ( !empty($data['wm_font_size_menu']) ) { ?>
		div#mainNavigation ul li a h5 {font-size: <?php echo $data['wm_font_size_menu']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_font_size_menu_desc']) ) { ?>
		div#mainNavigation ul li a h6 {font-size: <?php echo $data['wm_font_size_menu_desc']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_font_size_sub_menu']) ) { ?>
		#mainNavigation ul li ul li a {font-size: <?php echo $data['wm_font_size_sub_menu']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_font_size_body']) ) { ?>
		body, p, .footer ul, .footer ol, .footer li, #pagination a, #sidebar ul, #sidebar li, #sidebar p, .page_content li, .page_content ol, .page_content ul, .page_content, .toggle_wrap a, blockquote, input[type="text"], input[type="password"], input[type="date"], input[type="datetime"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], textarea, .send-link, td, th, .more-link {font-size: <?php echo $data['wm_font_size_body']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_font_size_h1']) ) { ?>
		h1 {font-size: <?php echo $data['wm_font_size_h1']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_font_size_h2']) ) { ?>
		h2 {font-size: <?php echo $data['wm_font_size_h2']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_font_size_h3']) ) { ?>
		h3 {font-size: <?php echo $data['wm_font_size_h3']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_font_size_h4']) ) { ?>
		h4 {font-size: <?php echo $data['wm_font_size_h4']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_font_size_h5']) ) { ?>
		h5 {font-size: <?php echo $data['wm_font_size_h5']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_font_size_h6']) ) { ?>
		h6 {font-size: <?php echo $data['wm_font_size_h6']; ?>px !important;}
		<?php } ?>
		
		div#navContainer { position: <?php if ( $data['wm_menu_position_enabled'] == "1" ) {?>absolute<?php } else { ?>fixed<?php } ?>; }
		<?php if($data["wm_gallery_titles_prettyphoto"] !=  "Enable PrettyPhoto Titles") {?> div.ppt, .pp_description { display: none !important;  } <?php } ?>
		
		<?php if ( !empty($data['wm_slider_alignment_top']) ) { ?>
		.slider-top {top: <?php echo $data['wm_slider_alignment_top']; ?>px !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_slider_alignment_bottom']) ) { ?>
		.slider-info {bottom: <?php echo $data['wm_slider_alignment_bottom']; ?>px !important;}
		<?php } ?>
		
		<?php if ( !empty($data['wm_wc_sidebar_color_borders']) ) { ?>
		#sidebar ul li:first-child {border-top:1px solid <?php echo $data['wm_wc_sidebar_color_borders']; ?> !important;}
		#sidebar ul li, .footer .menu li, .footer h3 {border-bottom: 1px solid <?php echo $data['wm_wc_sidebar_color_borders']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_sidebar_color_mouseover']) ) { ?>
		#sidebar ul li:hover, .footer .menu li:hover {background-color:<?php if ( $data['wm_disable_sidebar_item_mouseover'] == "1" ) {?>inherit<?php } else { ?><?php echo $data['wm_wc_sidebar_color_mouseover']; ?><?php } ?> !important;}
		<?php } ?>
		<?php if ( $data['wm_disable_sidebar_item_mouseover'] == "1" ) {?>
		#sidebar ul li:hover, .footer .menu li:hover {background-color: inherit !important;}
		<?php } ?>
		
		<?php if ( !empty($data['wm_color_portfolio_btn']) ) { ?>
		.more-link { background-color: <?php echo $data['wm_color_portfolio_btn']; ?> !important; border-color: <?php echo $data['wm_color_portfolio_btn_border']; ?> !important; color: <?php echo $data['wm_color_portfolio_btn_text']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_color_portfolio_btn_mouseover']) ) { ?>
		.more-link:hover { background-color: <?php echo $data['wm_color_portfolio_btn_mouseover']; ?> !important; border-color: <?php echo $data['wm_color_portfolio_btn_border_mouseover']; ?> !important; color: <?php echo $data['wm_color_portfolio_btn_text_mouseover']; ?> !important;}
		<?php } ?>
		
		<?php if ( !empty($data['wm_divider_color']) ) { ?>
		hr, img.avatar { border-color: <?php echo $data['wm_divider_color']; ?> !important;}
		ul.blog_comments > li { border-top-color: <?php echo $data['wm_divider_color']; ?> !important;}
		<?php } ?>
		
		<?php if ( !empty($data['wm_input_button_color']) ) { ?>
		.send-link, .wpcf7-submit, .search-button {background: <?php echo $data['wm_input_button_color']; ?> !important; border-color: <?php echo $data['wm_input_button_color_border']; ?> !important; color: <?php echo $data['wm_input_button_color_text']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_input_button_color_mouseover']) ) { ?>
		.send-link:hover, .wpcf7-submit:hover, .search-button:hover, .send-link:active, .wpcf7-submit:active, .search-button:active, .send-link:focus, .wpcf7-submit:focus, .search-button:focus {background: <?php echo $data['wm_input_button_color_mouseover']; ?> !important; border-color: <?php echo $data['wm_input_button_color_border_mouseover']; ?> !important; color: <?php echo $data['wm_input_button_color_text_mouseover']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_alert_background_color']) ) { ?>
		.panel-error, .panel-warning, .panel-info, .panel-download {background-color: <?php echo $data['wm_alert_background_color']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_alert_text_color']) ) { ?>
		.panel-error p, .panel-warning p, .panel-info p, .panel-download p {color: <?php echo $data['wm_alert_text_color']; ?> !important;}
		<?php } ?>
		
		<?php if ( !empty($data['wm_wc_color_btn']) ) { ?>
		.woocommerce button.button.alt, .woocommerce a.button, .woocommerce #respond input#submit, .woocommerce input.button {background-color: <?php echo $data['wm_wc_color_btn']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_color_btn_text']) ) { ?>
		.woocommerce button.button.alt, .woocommerce a.button, .woocommerce #respond input#submit, .woocommerce input.button {color: <?php echo $data['wm_wc_color_btn_text']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_color_btn_border']) ) { ?>
		.woocommerce button.button.alt, .woocommerce a.button, .woocommerce #respond input#submit, .woocommerce input.button {border-color: <?php echo $data['wm_wc_color_btn_border']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_color_btn_border_mouseover']) ) { ?>
		.woocommerce button.button.alt:hover, .woocommerce a.button:hover, .woocommerce #respond input#submit:hover, .woocommerce input.button:hover {border-color: <?php echo $data['wm_wc_color_btn_border_mouseover']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_color_btn_mouseover']) ) { ?>
		.woocommerce button.button.alt:hover, .woocommerce a.button:hover, .woocommerce #respond input#submit:hover, .woocommerce input.button:hover, .woocommerce button.button.alt:active, .woocommerce a.button:active, .woocommerce #respond input#submit:active, .woocommerce input.button:hover, .woocommerce button.button.alt:focus, .woocommerce a.button:focus, .woocommerce #respond input#submit:focus, .woocommerce input.button:focus {background-color: <?php echo $data['wm_wc_color_btn_mouseover']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_color_btn_text_mouseover']) ) { ?>
		.woocommerce button.button.alt:hover, .woocommerce a.button:hover, .woocommerce #respond input#submit:hover {color: <?php echo $data['wm_wc_color_btn_text_mouseover']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_color_tab']) ) { ?>
		.woocommerce div.product .woocommerce-tabs ul.tabs li {background-color: <?php echo $data['wm_wc_color_tab']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_color_tab_active']) ) { ?>
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active {background-color: <?php echo $data['wm_wc_color_tab_active']; ?> !important; border-bottom: 1px solid <?php echo $data['wm_wc_color_tab_active_border']; ?> !important; border-top: 3px solid <?php echo $data['wm_wc_color_tab_active_border_top']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_color_tab_borders']) ) { ?>
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active {border-left-color: <?php echo $data['wm_wc_color_tab_borders']; ?> !important; border-right-color: <?php echo $data['wm_wc_color_tab_borders']; ?> !important;}
		.woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs ul.tabs:before, .woocommerce .related {border-color: <?php echo $data['wm_wc_color_tab_borders']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_color_alerts']) ) { ?>
		.woocommerce .woocommerce-message {background-color: <?php echo $data['wm_wc_color_alerts']; ?> !important; color: <?php echo $data['wm_wc_color_alerts_text']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_login_color']) ) { ?>
		.woocommerce form.login, .woocommerce form.register {background-color: <?php echo $data['wm_wc_login_color']; ?> !important;}
		<?php } ?>
		<?php if ( !empty($data['wm_wc_label_color']) ) { ?>
		.woocommerce form .form-row label {color: <?php echo $data['wm_wc_label_color']; ?> !important;}
		<?php } ?>
	</style>
	
<?php }

add_action('wp_head', $shortname.'_wp_head');
?>
