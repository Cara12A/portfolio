<?php

	$designer_artist_custom_css= "";
	/*-------------------- First Global Color -------------------*/

	$designer_artist_first_color = get_theme_mod('designer_artist_first_color');

	if($designer_artist_first_color != false){
		$designer_artist_custom_css .='{';
			$designer_artist_custom_css .='background: '.esc_attr($designer_artist_first_color).';';
		$designer_artist_custom_css .='}';
	}

	if($designer_artist_first_color != false){
		$designer_artist_custom_css .='{';
			$designer_artist_custom_css .='color: '.esc_attr($designer_artist_first_color).'!important;';
		$designer_artist_custom_css .='}';
	}

	/*--------------------Second  Global Color -------------------*/
	$designer_artist_second_color = get_theme_mod('designer_artist_second_color');

	if($designer_artist_second_color != false){
		$designer_artist_custom_css .='{';
			$designer_artist_custom_css .='background: '.esc_attr($designer_artist_second_color).';';
		$designer_artist_custom_css .='}';
	}

	if($designer_artist_second_color != false){
		$designer_artist_custom_css .='{';
			$designer_artist_custom_css .='color: '.esc_attr($designer_artist_second_color).';';
		$designer_artist_custom_css .='}';
	}
	/*---------------------------Width Layout -------------------*/

	$designer_artist_theme_lay = get_theme_mod( 'designer_artist_width_option','Full Width');
    if($designer_artist_theme_lay == 'Boxed'){
		$designer_artist_custom_css .='body{';
			$designer_artist_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$designer_artist_custom_css .='}';
		$designer_artist_custom_css .='.scrollup i{';
			$designer_artist_custom_css .='right: 100px;';
		$designer_artist_custom_css .='}';
		$designer_artist_custom_css .='.page-template-custom-home-page .home-page-header{';
			$designer_artist_custom_css .='padding: 0px 40px 0 10px;';
		$designer_artist_custom_css .='}';
	}else if($designer_artist_theme_lay == 'Wide Width'){
		$designer_artist_custom_css .='body{';
			$designer_artist_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$designer_artist_custom_css .='}';
		$designer_artist_custom_css .='.scrollup i{';
			$designer_artist_custom_css .='right: 30px;';
		$designer_artist_custom_css .='}';
	}else if($designer_artist_theme_lay == 'Full Width'){
		$designer_artist_custom_css .='body{';
			$designer_artist_custom_css .='max-width: 100%;';
		$designer_artist_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$designer_artist_resp_slider = get_theme_mod( 'designer_artist_resp_slider_hide_show',false);
	if($designer_artist_resp_slider == true && get_theme_mod( 'designer_artist_slider_hide_show', false) == false){
    	$designer_artist_custom_css .='#slider{';
			$designer_artist_custom_css .='display:none;';
		$designer_artist_custom_css .='} ';
	}
    if($designer_artist_resp_slider == true){
    	$designer_artist_custom_css .='@media screen and (max-width:575px) {';
		$designer_artist_custom_css .='#slider{';
			$designer_artist_custom_css .='display:block;';
		$designer_artist_custom_css .='} }';
	}else if($designer_artist_resp_slider == false){
		$designer_artist_custom_css .='@media screen and (max-width:575px) {';
		$designer_artist_custom_css .='#slider{';
			$designer_artist_custom_css .='display:none;';
		$designer_artist_custom_css .='} }';
		$designer_artist_custom_css .='@media screen and (max-width:575px){';
		$designer_artist_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$designer_artist_custom_css .='margin-top: 45px;';
		$designer_artist_custom_css .='} }';
		$designer_artist_custom_css .='@media screen and (max-width:575px) {';
		$designer_artist_custom_css .='#track-player-sec .audioigniter-root{';
			$designer_artist_custom_css .='margin-top: 5%;';
		$designer_artist_custom_css .='} }';
	}

	$designer_artist_resp_sidebar = get_theme_mod( 'designer_artist_sidebar_hide_show',true);
    if($designer_artist_resp_sidebar == true){
    	$designer_artist_custom_css .='@media screen and (max-width:575px) {';
		$designer_artist_custom_css .='#sidebar{';
			$designer_artist_custom_css .='display:block;';
		$designer_artist_custom_css .='} }';
	}else if($designer_artist_resp_sidebar == false){
		$designer_artist_custom_css .='@media screen and (max-width:575px) {';
		$designer_artist_custom_css .='#sidebar{';
			$designer_artist_custom_css .='display:none;';
		$designer_artist_custom_css .='} }';
	}

	$designer_artist_resp_scroll_top = get_theme_mod( 'designer_artist_resp_scroll_top_hide_show',true);
	if($designer_artist_resp_scroll_top == true && get_theme_mod( 'designer_artist_hide_show_scroll',true) == false){
    	$designer_artist_custom_css .='.scrollup i{';
			$designer_artist_custom_css .='visibility:hidden !important;';
		$designer_artist_custom_css .='} ';
	}
    if($designer_artist_resp_scroll_top == true){
    	$designer_artist_custom_css .='@media screen and (max-width:575px) {';
		$designer_artist_custom_css .='.scrollup i{';
			$designer_artist_custom_css .='visibility:visible !important;';
		$designer_artist_custom_css .='} }';
	}else if($designer_artist_resp_scroll_top == false){
		$designer_artist_custom_css .='@media screen and (max-width:575px){';
		$designer_artist_custom_css .='.scrollup i{';
			$designer_artist_custom_css .='visibility:hidden !important;';
		$designer_artist_custom_css .='} }';
	}

	$designer_artist_resp_menu_toggle_btn_bg_color = get_theme_mod('designer_artist_resp_menu_toggle_btn_bg_color');
	if($designer_artist_resp_menu_toggle_btn_bg_color != false){
		$designer_artist_custom_css .='.toggle-nav i{';
			$designer_artist_custom_css .='background: '.esc_attr($designer_artist_resp_menu_toggle_btn_bg_color).';';
		$designer_artist_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$designer_artist_slider_height = get_theme_mod('designer_artist_slider_height');
	if($designer_artist_slider_height != false){
		$designer_artist_custom_css .='#slider img{';
			$designer_artist_custom_css .='height: '.esc_attr($designer_artist_slider_height).';';
		$designer_artist_custom_css .='}';
	}
	/*-------------- Copyright Alignment ----------------*/

	$designer_artist_copyright_alingment = get_theme_mod('designer_artist_copyright_alingment');
	if($designer_artist_copyright_alingment != false){
		$designer_artist_custom_css .='.copyright p{';
			$designer_artist_custom_css .='text-align: '.esc_attr($designer_artist_copyright_alingment).' !important;';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_footer_widgets_heading = get_theme_mod( 'designer_artist_footer_widgets_heading','Left');
    if($designer_artist_footer_widgets_heading == 'Left'){
		$designer_artist_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$designer_artist_custom_css .='text-align: left;';
		$designer_artist_custom_css .='}';
	}else if($designer_artist_footer_widgets_heading == 'Center'){
		$designer_artist_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$designer_artist_custom_css .='text-align: center;';
		$designer_artist_custom_css .='}';
	}else if($designer_artist_footer_widgets_heading == 'Right'){
		$designer_artist_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$designer_artist_custom_css .='text-align: right;';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_footer_widgets_content = get_theme_mod( 'designer_artist_footer_widgets_content','Left');
    if($designer_artist_footer_widgets_content == 'Left'){
		$designer_artist_custom_css .='#footer .widget{';
		$designer_artist_custom_css .='text-align: left;';
		$designer_artist_custom_css .='}';
	}else if($designer_artist_footer_widgets_content == 'Center'){
		$designer_artist_custom_css .='#footer .widget{';
			$designer_artist_custom_css .='text-align: center;';
		$designer_artist_custom_css .='}';
	}else if($designer_artist_footer_widgets_content == 'Right'){
		$designer_artist_custom_css .='#footer .widget{';
			$designer_artist_custom_css .='text-align: right;';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_footer_padding = get_theme_mod('designer_artist_footer_padding');
	if($designer_artist_footer_padding != false){
		$designer_artist_custom_css .='#footer{';
			$designer_artist_custom_css .='padding: '.esc_attr($designer_artist_footer_padding).' 0;';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_footer_background_image = get_theme_mod('designer_artist_footer_background_image');
	if($designer_artist_footer_background_image != false){
		$designer_artist_custom_css .='#footer{';
			$designer_artist_custom_css .='background: url('.esc_attr($designer_artist_footer_background_image).')!important;';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_footer_background_color = get_theme_mod('designer_artist_footer_background_color');
	if($designer_artist_footer_background_color != false){
		$designer_artist_custom_css .='#footer{';
			$designer_artist_custom_css .='background-color: '.esc_attr($designer_artist_footer_background_color).'!important;';
		$designer_artist_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	$designer_artist_site_title_font_size = get_theme_mod('designer_artist_site_title_font_size');
	if($designer_artist_site_title_font_size != false){
		$designer_artist_custom_css .='.logo h1, .logo p.site-title{';
			$designer_artist_custom_css .='font-size: '.esc_attr($designer_artist_site_title_font_size).';';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_site_tagline_font_size = get_theme_mod('designer_artist_site_tagline_font_size');
	if($designer_artist_site_tagline_font_size != false){
		$designer_artist_custom_css .='.logo p.site-description{';
			$designer_artist_custom_css .='font-size: '.esc_attr($designer_artist_site_tagline_font_size).';';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_logo_padding = get_theme_mod('designer_artist_logo_padding');
	if($designer_artist_logo_padding != false){
		$designer_artist_custom_css .='.top-bar .logo{';
			$designer_artist_custom_css .='padding: '.esc_attr($designer_artist_logo_padding).';';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_logo_margin = get_theme_mod('designer_artist_logo_margin');
	if($designer_artist_logo_margin != false){
		$designer_artist_custom_css .='.top-bar .logo{';
			$designer_artist_custom_css .='margin: '.esc_attr($designer_artist_logo_margin).';';
		$designer_artist_custom_css .='}';
	}

	/*------------------ Menus -------------------*/

	$designer_artist_header_menus_color = get_theme_mod('designer_artist_header_menus_color');
	if($designer_artist_header_menus_color != false){
		$designer_artist_custom_css .='.main-navigation a{';
			$designer_artist_custom_css .='color: '.esc_attr($designer_artist_header_menus_color).';';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_header_menus_hover_color = get_theme_mod('designer_artist_header_menus_hover_color');
	if($designer_artist_header_menus_hover_color != false){
		$designer_artist_custom_css .='.main-navigation a:hover{';
			$designer_artist_custom_css .='color: '.esc_attr($designer_artist_header_menus_hover_color).'!important;';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_header_submenus_color = get_theme_mod('designer_artist_header_submenus_color');
	if($designer_artist_header_submenus_color != false){
		$designer_artist_custom_css .='.main-navigation ul ul a{';
			$designer_artist_custom_css .='color: '.esc_attr($designer_artist_header_submenus_color).';';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_header_submenus_hover_color = get_theme_mod('designer_artist_header_submenus_hover_color');
	if($designer_artist_header_submenus_hover_color != false){
		$designer_artist_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$designer_artist_custom_css .='color: '.esc_attr($designer_artist_header_submenus_hover_color).'!important;';
		$designer_artist_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$designer_artist_theme_lay = get_theme_mod( 'designer_artist_blog_layout_option','Default');
    if($designer_artist_theme_lay == 'Default'){
		$designer_artist_custom_css .='.post-main-box{';
			$designer_artist_custom_css .='';
		$designer_artist_custom_css .='}';
	}else if($designer_artist_theme_lay == 'Center'){
		$designer_artist_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$designer_artist_custom_css .='text-align:center;';
		$designer_artist_custom_css .='}';
		$designer_artist_custom_css .='.post-info{';
			$designer_artist_custom_css .='margin-top:10px;';
		$designer_artist_custom_css .='}';
		$designer_artist_custom_css .='.post-info hr{';
			$designer_artist_custom_css .='margin:15px auto;';
		$designer_artist_custom_css .='}';
	}else if($designer_artist_theme_lay == 'Left'){
		$designer_artist_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$designer_artist_custom_css .='text-align:Left;';
		$designer_artist_custom_css .='}';
		$designer_artist_custom_css .='.post-info hr{';
			$designer_artist_custom_css .='margin-bottom:10px;';
		$designer_artist_custom_css .='}';
		$designer_artist_custom_css .='.post-main-box h2{';
			$designer_artist_custom_css .='margin-top:10px;';
		$designer_artist_custom_css .='}';
	}

	/*------------- Preloader Background Color  -------------------*/

	$designer_artist_preloader_bg_color = get_theme_mod('designer_artist_preloader_bg_color');
	if($designer_artist_preloader_bg_color != false){
		$designer_artist_custom_css .='#preloader{';
			$designer_artist_custom_css .='background-color: '.esc_attr($designer_artist_preloader_bg_color).';';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_preloader_border_color = get_theme_mod('designer_artist_preloader_border_color');
	if($designer_artist_preloader_border_color != false){
		$designer_artist_custom_css .='.loader-line{';
			$designer_artist_custom_css .='border-color: '.esc_attr($designer_artist_preloader_border_color).'!important;';
		$designer_artist_custom_css .='}';
	}

	/*----------------- Slider -----------------*/

	$designer_artist_slider_hide_show = get_theme_mod('designer_artist_slider_hide_show');
	if($designer_artist_slider_hide_show == false){
		$designer_artist_custom_css .='.page-template-custom-home-page .home-page-header{';
			$designer_artist_custom_css .='position: static; background-color: #000; padding: 15px;';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_product_title = get_theme_mod('designer_artist_product_title');
	if($designer_artist_product_title == false){
		$designer_artist_custom_css .='.heding-title p:after, .heding-title p:before{';
			$designer_artist_custom_css .='display:none;';
		$designer_artist_custom_css .='}';
	}
	/*---------------- Button Settings ------------------*/

	$designer_artist_button_padding_top_bottom = get_theme_mod('designer_artist_button_padding_top_bottom');
	$designer_artist_button_padding_left_right = get_theme_mod('designer_artist_button_padding_left_right');
	if($designer_artist_button_padding_top_bottom != false || $designer_artist_button_padding_left_right != false){
		$designer_artist_custom_css .='.post-main-box .more-btn a{';
			$designer_artist_custom_css .='padding-top: '.esc_attr($designer_artist_button_padding_top_bottom).'!important; 
			padding-bottom: '.esc_attr($designer_artist_button_padding_top_bottom).'!important;
			padding-left: '.esc_attr($designer_artist_button_padding_left_right).'!important;
			padding-right: '.esc_attr($designer_artist_button_padding_left_right).'!important;';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_button_border_radius = get_theme_mod('designer_artist_button_border_radius');
	if($designer_artist_button_border_radius != false){
		$designer_artist_custom_css .='.post-main-box .more-btn a{';
			$designer_artist_custom_css .='border-radius: '.esc_attr($designer_artist_button_border_radius).'px !important;';
		$designer_artist_custom_css .='}';
	}

	$designer_artist_button_font_size = get_theme_mod('designer_artist_button_font_size',14);
	$designer_artist_custom_css .='.post-main-box .more-btn a{';
		$designer_artist_custom_css .='font-size: '.esc_attr($designer_artist_button_font_size).'!important;';
	$designer_artist_custom_css .='}';

	$designer_artist_theme_lay = get_theme_mod( 'designer_artist_button_text_transform','Uppercase');
	if($designer_artist_theme_lay == 'Capitalize'){
		$designer_artist_custom_css .='.post-main-box .more-btn a{';
			$designer_artist_custom_css .='text-transform:Capitalize;';
		$designer_artist_custom_css .='}';
	}
	if($designer_artist_theme_lay == 'Lowercase'){
		$designer_artist_custom_css .='.post-main-box .more-btn a{';
			$designer_artist_custom_css .='text-transform:Lowercase;';
		$designer_artist_custom_css .='}';
	}
	if($designer_artist_theme_lay == 'Uppercase'){ 
		$designer_artist_custom_css .='.post-main-box .more-btn a{';
			$designer_artist_custom_css .='text-transform:Uppercase;';
		$designer_artist_custom_css .='}';
	}
