<?php
/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @package Uku
 * @since Uku 1.0
 * @version 1.0.3
 */

function uku_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = esc_html__( 'Site Title Color', 'uku' );

	// Custom Uku panels:
	$wp_customize->add_panel( 'uku_themeoptions', array(
		'priority' 	               => 1,
		'theme_supports' 	         => '',
		'title' 	                 => esc_html__('Theme Options', 'uku'),
	) );

	$wp_customize->add_panel( 'uku_frontpage', array(
		'priority' 	               => 2,
		'theme_supports' 	         => '',
		'title' 	                 => esc_html__('Blog Front Page', 'uku'),
	) );

	$wp_customize->add_panel( 'uku_shop', array(
		'priority' 	               => 3,
		'theme_supports' 	         => '',
		'title' 	                 => esc_html__('Shop Front Page', 'uku'),
	) );

	// Uku Theme Options Sections:
	$wp_customize->add_section( 'uku_style', array(
		'title' 		               => esc_html__( 'Design Style', 'uku' ),
		'priority' 	               => 1,
		'panel' 					         => 'uku_themeoptions',
	) );

	$wp_customize->add_section( 'uku_general', array(
		'title' 		               => esc_html__( 'General', 'uku' ),
		'priority' 	               => 2,
		'panel' 					         => 'uku_themeoptions',
	) );

	$wp_customize->add_section( 'uku_header', array(
		'title' 		               => esc_html__( 'Header', 'uku' ),
		'priority' 	               => 3,
		'panel' 					         => 'uku_themeoptions',
	) );

	$wp_customize->add_section( 'uku_images', array(
		'title' 		               => esc_html__( 'Images', 'uku' ),
		'priority' 	               => 4,
		'panel' 					         => 'uku_themeoptions',
	) );

	$wp_customize->add_section( 'uku_footerfeature', array(
		'title' 		               => esc_html__( 'Footer Featured Area', 'uku' ),
		'priority' 	               => 5,
		'panel' 					         => 'uku_themeoptions',
	) );

	// Main Design Style
	$wp_customize->add_setting( 'uku_main_design', array(
		'default' 				         => 'standard',
		'sanitize_callback' 	     => 'uku_sanitize_main_design',
	) );

	$wp_customize->add_control( 'uku_main_design', array(
		'label' 			             => esc_html__( 'Design Style', 'uku' ),
		'description'					     => esc_html__( 'Choose your main design style.', 'uku' ),
		'section' 			           => 'uku_style',
		'priority' 			           => 1,
		'type' 			               => 'select',
		'choices' 						     => array(
					'standard'		       => esc_html__( 'standard', 'uku' ),
					'neo' 				       => esc_html__( 'neo', 'uku' ),
					'serif' 			       => esc_html__( 'serif', 'uku' ),
		),
	) );


	// Uku Front Page Sections.
	$wp_customize->add_section( 'uku_frontpage_general', array(
		'title' 		               => esc_html__( 'General', 'uku' ),
		'priority' 	               => 1,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_slider', array(
		'title' 		               => esc_html__( 'Featured Posts Slider', 'uku' ),
		'description'			         => esc_html__( 'Up to 6 posts will show up in the Front page slider. The image dimension for the Featured post images should be at least 1440 x 530 pixels for the standard design style and 1500 x 690 for neo and serif.', 'uku' ),
		'priority' 	               => 3,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_front_section_one', array(
		'title' 		               => esc_html__( 'Section Featured Top', 'uku' ),
		'priority' 	               => 3,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_front_section_twocolumn', array(
		'title' 		               => esc_html__( 'Section 2-Columns', 'uku' ),
		'priority' 	               => 4,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_front_section_threecolumn', array(
		'title' 		               => esc_html__( 'Section 3-Columns', 'uku' ),
		'priority' 	               => 5,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_front_section_four', array(
		'title' 		               => esc_html__( 'Section Fullwidth', 'uku' ),
		'priority' 	               => 6,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_front_section_two', array(
		'title' 		               => esc_html__( 'Section Featured Bottom', 'uku' ),
		'priority' 	               => 7,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_front_section_about', array(
		'title' 		               => esc_html__( 'Section About', 'uku' ),
		'priority' 	               => 8,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_front_section_three', array(
		'title' 		               => esc_html__( 'Section on Background', 'uku' ),
		'priority' 	               => 9,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_front_section_fourcolumn', array(
		'title' 		               => esc_html__( 'Section 4-Columns', 'uku' ),
		'priority' 	               => 10,
		'panel' 					         => 'uku_frontpage',
	) );

	$wp_customize->add_section( 'uku_front_section_sixcolumn', array(
		'title' 		               => esc_html__( 'Section 6-Columns', 'uku' ),
		'priority' 	               => 11,
		'panel' 					         => 'uku_frontpage',
	) );


	// Uku Shop Sections.
	$wp_customize->add_section( 'uku_shop_front_general', array(
		'title' 		               => esc_html__( 'General', 'uku' ),
		'priority' 	               => 1,
		'panel' 					         => 'uku_shop',
	) );

	$wp_customize->add_section( 'uku_shop_front_cats', array(
		'title' 		               => esc_html__( 'Product Categories', 'uku' ),
		'priority' 	               => 2,
		'panel' 					         => 'uku_shop',
	) );

	$wp_customize->add_section( 'uku_shop_front_featured', array(
		'title' 		               => esc_html__( 'Featured Products', 'uku' ),
		'priority' 	               => 3,
		'panel' 					         => 'uku_shop',
	) );

	$wp_customize->add_section( 'uku_shop_front_latest', array(
		'title' 		               => esc_html__( 'Latest Products', 'uku' ),
		'priority' 	               => 4,
		'panel' 					         => 'uku_shop',
	) );

	$wp_customize->add_section( 'uku_shop_front_toprated', array(
		'title' 		               => esc_html__( 'Top Rated Products', 'uku' ),
		'priority' 	               => 5,
		'panel' 					         => 'uku_shop',
	) );

	$wp_customize->add_section( 'uku_shop_front_sale', array(
		'title' 		               => esc_html__( 'On Sale Products', 'uku' ),
		'priority' 	               => 6,
		'panel' 					         => 'uku_shop',
	) );



	// Uku Custom Colors.
	$wp_customize->add_setting( 'uku_link_color' , array(
			'default' 			         => '#51a8dd',
			'sanitize_callback'	     => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_link_color', array(
		'label'								     => esc_html__( 'Text Link Color', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_link_color',
	) ) );

	$wp_customize->add_setting( 'uku_linkhover_color' , array(
			'default' 			         => '#0c6ca6',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_linkhover_color', array(
		'label'								     => esc_html__( 'Text Link Hover Color', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_linkhover_color',
	) ) );

	$wp_customize->add_setting( 'uku_footer_bg_color' , array(
			'default' 			         => '#1a1a1a',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_footer_bg_color', array(
		'label'								     => esc_html__( 'Footer Background Color', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_footer_bg_color',
	) ) );

	$wp_customize->add_setting( 'uku_footer_text_color' , array(
			'default' 			         => '#ffffff',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_footer_text_color', array(
		'label'								     => esc_html__( 'Footer Text Color', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_footer_text_color',
	) ) );

	$wp_customize->add_setting( 'uku_offcanvas_bg_color' , array(
			'default' 			         => '#f4f4f4',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_offcanvas_bg_color', array(
		'label'								     => esc_html__( 'Off Canvas Background Color', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_offcanvas_bg_color',
	) ) );

	$wp_customize->add_setting( 'uku_offcanvas_text_color' , array(
			'default' 			         => '#2b2b2b',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_offcanvas_text_color', array(
		'label'								     => esc_html__( 'Off Canvas Text Color', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_offcanvas_text_color',
	) ) );

	$wp_customize->add_setting( 'uku_frontsection_bg_color' , array(
			'default' 			         => '#f4f4f4',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_frontsection_bg_color', array(
		'label'								     => esc_html__( 'Posts on Background Color', 'uku' ),
		'description'					     => esc_html__( 'Background color of the "Posts on Background" section.', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_frontsection_bg_color',
	) ) );

	$wp_customize->add_setting( 'uku_subscribe_bg_color' , array(
			'default' 			         => '#f4f4f4',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_subscribe_bg_color', array(
		'label'								     => esc_html__( 'Subscribe Widget Background Color', 'uku' ),
		'description'					     => esc_html__( 'Background color of the Jetpack Blog Subscribe or Mailchimp newsletter widget.', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_subscribe_bg_color',
	) ) );

	$wp_customize->add_setting( 'uku_aboutsection_bg_color' , array(
			'default' 			         => '#ffefef',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_aboutsection_bg_color', array(
		'label'								     => esc_html__( 'About Section Background Color', 'uku' ),
		'description'					     => esc_html__( 'Transparent About section background color (Serif Design style only).', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_aboutsection_bg_color',
	) ) );

	$wp_customize->add_setting( 'uku_shopcats_bg_color' , array(
			'default' 			         => '#f2f2ee',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_shopcats_bg_color', array(
		'label'								     => esc_html__( 'Shop Categories Background Color', 'uku' ),
		'description'					     => esc_html__( 'Background color of the "Shop Categories" Shop Front page section (only available, when WooCommerce is activated.)', 'uku' ),
		'section'							     => 'colors',
		'settings'						     => 'uku_shopcats_bg_color',
	) ) );

	// Uku Site Title - Custom Title and Logo
	$wp_customize->add_setting( 'uku_hidetagline', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_hidetagline', array(
		'label'								     => esc_html__( 'Hide tagline only', 'uku' ),
		'section'							     => 'title_tagline',
		'type'								     => 'checkbox',
		'priority'						     => 22,
	) );

	$wp_customize->add_setting( 'uku_titleuppercase', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_titleuppercase', array(
		'label'								     => esc_html__( 'Title in uppercase font', 'uku' ),
		'section'							     => 'title_tagline',
		'type'								     => 'checkbox',
		'priority'						     => 23,
	) );

	$wp_customize->add_setting( 'uku_customlogofooter', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_customlogofooter', array(
		'label'								     => esc_html__( 'Show custom logo in footer', 'uku' ),
		'description'					     => esc_html__( '(Only available with the "standard" and "neo" design style, see Theme Options / Design Style.).', 'uku' ),
		'section'							     => 'title_tagline',
		'type'								     => 'checkbox',
		'priority'						     => 24,
	) );

	// Uku Additional Header Options
	$wp_customize->add_setting( 'uku_headerstyle', array(
		'default' 				         => 'header-fullwidth',
		'sanitize_callback' 	     => 'uku_sanitize_headerstyle',
	) );

	$wp_customize->add_control( 'uku_headerstyle', array(
		'label' 			             => esc_html__( 'Header Image Style', 'uku' ),
		'description'					     => esc_html__( 'Choose the Header image style you like to use.', 'uku' ),
		'section' 			           => 'header_image',
		'priority' 			           => 10,
		'type' 			               => 'select',
		'choices' 						     => array(
					'header-fullwidth' 	 => esc_html__( 'fullwidth', 'uku' ),
					'header-boxed' 			 => esc_html__( 'boxed', 'uku' ),
					'header-fullscreen'  => esc_html__( 'fullscreen (serif and standard only)', 'uku' ),
		),
	) );

	$wp_customize->add_setting( 'uku_custom_header_intro', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_custom_header_intro', array(
		'label' 			             => esc_html__( 'Header Image Intro Text', 'uku' ),
		'description'					     => esc_html__( 'Add a short intro text that will displayed centered on your header image. (Design style "serif" only.)', 'uku' ),
		'section' 			           => 'header_image',
		'type' 			               => 'textarea',
		'priority'						     => 11,
	) );

	$wp_customize->add_setting( 'uku_scrolldownbtn_text', array(
		'default' 			           => 'Scroll Down',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_scrolldownbtn_text', array(
		'label'								     => esc_html__( 'Customize "Scroll Down" button text', 'uku' ),
		'description'					     => esc_html__( '(Design style "serif" only.)', 'uku' ),
		'section' 					       => 'header_image',
		'type' 			               => 'text',
		'priority'						     => 12,
	) );

	// Uku Theme Options - General
	$wp_customize->add_setting( 'uku_sidebar', array(
		'default' 				         => 'sidebar-right',
		'sanitize_callback'		     => 'uku_sanitize_sidebar',
	) );

	$wp_customize->add_control( 'uku_sidebar', array(
		'label' 			             => esc_html__( 'Sidebar Position', 'uku' ),
		'section' 			           => 'uku_general',
		'priority' 			           => 2,
		'type' 			               => 'select',
		'choices'							     => array(
					'sidebar-right' 	   => esc_html__( 'sidebar right', 'uku' ),
					'sidebar-left' 		   => esc_html__( 'sidebar left', 'uku' ),
		),
	) );

	$wp_customize->add_setting( 'uku_sidebar_hide', array(
		'default' 				         => 'sidebar-show',
		'sanitize_callback' 	     => 'uku_sanitize_sidebar_hide',
	) );

	$wp_customize->add_control( 'uku_sidebar_hide', array(
		'label' 			             => esc_html__( 'Sidebar Visibility', 'uku' ),
		'section' 			           => 'uku_general',
		'priority' 			           => 3,
		'type' 			               => 'select',
		'choices' 						     => array(
					'sidebar-show'			 => esc_html__( 'Show sidebar', 'uku' ),
					'sidebar-no'				 => esc_html__( 'Hide sidebar', 'uku' ),
					'sidebar-no-single'	 => esc_html__( 'Hide sidebar on single posts', 'uku' ),
					'sidebar-no-front'	 => esc_html__( 'Hide sidebar on Front page', 'uku' ),
		),
	) );

	$wp_customize->add_setting( 'uku_hidecomments', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_hidecomments', array(
		'label'								     => esc_html__( 'Show Comments button on single posts', 'uku' ),
		'description'					     => esc_html__( '(Hides comments behind a Show Comments button on single posts.)', 'uku' ),
		'section'							     => 'uku_general',
		'type'								     => 'checkbox',
		'priority'						     => 4,
	) );

	$wp_customize->add_setting( 'uku_credit', array(
		'default' 			           => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_credit', array(
		'label'								     => esc_html__( 'Footer credit text', 'uku' ),
		'description'					     => esc_html__( 'Customize the footer credit text. (HTML is allowed)', 'uku' ),
		'section' 					       => 'uku_general',
		'type' 			               => 'text',
		'priority'						     => 5,
	) );

	// Uku Theme Options - Header
	$wp_customize->add_setting( 'uku_hidesearch', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_hidesearch', array(
		'label'								     => esc_html__( 'Hide search in Header', 'uku' ),
		'section'							     => 'uku_header',
		'type'								     => 'checkbox',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'uku_header_font', array(
		'default' 				         => 'dark',
		'sanitize_callback' 	     => 'uku_sanitize_header_font',
	) );

	$wp_customize->add_control( 'uku_header_font', array(
		'label' 			             => esc_html__( 'Header Font', 'uku' ),
		'description'					     => esc_html__( 'You can choose the light header font in combination with the fullscreen header image or fullscreen slider style.', 'uku' ),
		'section' 			           => 'uku_header',
		'priority' 			           => 2,
		'type' 			               => 'select',
		'choices' 							   => array(
					'light' 	           => esc_html__( 'light', 'uku' ),
					'dark' 		           => esc_html__( 'dark', 'uku' ),
		),
	) );

	$wp_customize->add_setting( 'uku_fixedheader_style', array(
		'default' 				         => 'light',
		'sanitize_callback' 	     => 'uku_sanitize_fixedheader_style',
	) );

	$wp_customize->add_control( 'uku_fixedheader_style', array(
		'label' 			             => esc_html__( 'Fix-positioned Header style', 'uku' ),
		'description'					     => esc_html__( 'Choose a dark or light colored fix-positioned header bar.', 'uku' ),
		'section' 			           => 'uku_header',
		'priority' 			           => 3,
		'type' 			               => 'select',
		'choices' 						     => array(
					'light' 	           => esc_html__( 'light', 'uku' ),
					'dark' 		           => esc_html__( 'dark', 'uku' ),
		),
	) );

	$wp_customize->add_setting( 'uku_fixedheader', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_fixedheader', array(
		'label'								     => esc_html__( 'Hide fix-positioned Header', 'uku' ),
		'description'					     => esc_html__( '(By default the fix-positioned Header is visible on wider screens, if the browser window is scrolled.)', 'uku' ),
		'section'							     => 'uku_header',
		'type'								     => 'checkbox',
		'priority'						     => 4,
	) );

	// Uku Theme Options - Images
	$wp_customize->add_setting( 'uku_imggradient', array(
		'default' 			           => '0.7',
		'sanitize_callback' 	     => 'uku_sanitize_imggradient',
	) );

	$wp_customize->add_control( 'uku_imggradient', array(
		'label' 			             => esc_html__( 'Image Bottom Gradient', 'uku' ),
		'description'					     => esc_html__( 'Level of transparency (in percent) for the bottom gradient of Featured images with text on the image. (The default value is 70%. Uku standard only.)', 'uku' ),
		'section' 			           => 'uku_images',
		'priority' 			           => 1,
		'type' 			               => 'select',
		'choices' 						     => array(
			'0'                      => esc_html__( '0', 'uku' ),
					'0.1'		             => esc_html__( '10', 'uku' ),
					'0.2'		             => esc_html__( '20', 'uku' ),
					'0.3' 	             => esc_html__( '30', 'uku' ),
					'0.4'		             => esc_html__( '40', 'uku' ),
					'0.5' 	             => esc_html__( '50', 'uku' ),
					'0.6' 	             => esc_html__( '60', 'uku' ),
					'0.7' 	             => esc_html__( '70', 'uku' ),
					'0.8' 	             => esc_html__( '80', 'uku' ),
					'0.9' 	             => esc_html__( '90', 'uku' ),
					'0.99'	             => esc_html__( '100', 'uku' ),
		),
	) );

	$wp_customize->add_setting( 'uku_imgoverlay_color' , array(
			'default' 			         => '#000000',
			'sanitize_callback'      => 'sanitize_hex_color',
		'transport' 				       => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'uku_imgoverlay_color', array(
		'label'								     => esc_html__( 'Image Overlay Color', 'uku' ),
		'description'					     => esc_html__( 'Image overlay color for Featured images with text on the image.', 'uku' ),
		'section'							     => 'uku_images',
		'priority' 			           => 2,
		'settings'						     => 'uku_imgoverlay_color',
	) ) );

	$wp_customize->add_setting( 'uku_imgoverlay_transparency', array(
		'default' 			           => '0',
		'sanitize_callback' 	     => 'uku_sanitize_imgoverlay_transparency',
	) );

	$wp_customize->add_control( 'uku_imgoverlay_transparency', array(
		'label' 			             => esc_html__( 'Image Overlay Transparency', 'uku' ),
		'description'					     => esc_html__( 'Overlay transparency (in percent) for Featured images with text on the image.', 'uku' ),
		'section' 			           => 'uku_images',
		'priority' 			           => 3,
		'type' 			               => 'select',
		'choices' 						     => array(
			'0'                      => esc_html__( '0', 'uku' ),
					'0.1'		             => esc_html__( '10', 'uku' ),
					'0.2' 	             => esc_html__( '20', 'uku' ),
					'0.3' 	             => esc_html__( '30', 'uku' ),
					'0.4' 	             => esc_html__( '40', 'uku' ),
					'0.5' 	             => esc_html__( '50', 'uku' ),
					'0.6' 	             => esc_html__( '60', 'uku' ),
					'0.7'		             => esc_html__( '70', 'uku' ),
					'0.8' 	             => esc_html__( '80', 'uku' ),
					'0.9'		             => esc_html__( '90', 'uku' ),
					'1' 		             => esc_html__( '100', 'uku' ),
		),
	) );

	$wp_customize->add_setting( 'uku_image_font', array(
		'default' 				         => 'light',
		'sanitize_callback' 	     => 'uku_sanitize_header_font',
	) );

	$wp_customize->add_control( 'uku_image_font', array(
		'label' 			             => esc_html__( 'Image Font', 'uku' ),
		'description'					     => esc_html__( 'You can choose a dark image font, if you have Featured images in very light colors. (Uku standard only)', 'uku' ),
		'section' 			           => 'uku_images',
		'priority' 			           => 4,
		'type' 			               => 'select',
		'choices' 						     => array(
					'light' 	           => esc_html__( 'light', 'uku' ),
					'dark' 		           => esc_html__( 'dark', 'uku' ),
		),
	) );


	// Uku Theme Options - Big Footer Feature Area
	$wp_customize->add_setting( 'uku_footerfeature_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_footerfeature_title', array(
		'label' 			             => esc_html__( 'Title', 'uku' ),
		'description'					     => esc_html__( 'A small title text visible at the top of the area.', 'uku' ),
		'section' 			           => 'uku_footerfeature',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'uku_footerfeature_image', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'uku_footerfeature_image', array(
				'label'						     => esc_html__( 'Upload Featured image', 'uku' ),
				'section'					     => 'uku_footerfeature',
				'priority'				     => 2,
	) ) );

	$wp_customize->add_setting( 'uku_footerfeature_text_big', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_footerfeature_text_big', array(
		'label' 			             => esc_html__( 'Big Text', 'uku' ),
		'section' 			           => 'uku_footerfeature',
		'type' 			               => 'textarea',
		'description'					     => esc_html__( 'A big slogan text next to the image (HTML is allowed.)', 'uku' ),
		'priority'						     => 3,
	) );

	$wp_customize->add_setting( 'uku_footerfeature_text_small', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_footerfeature_text_small', array(
		'label' 			             => esc_html__( 'Small Text', 'uku' ),
		'description'					     => esc_html__( 'An additional smaller description text below the big text (HTML is allowed.)', 'uku' ),
		'section' 			           => 'uku_footerfeature',
		'type' 			               => 'textarea',
		'priority'						     => 4,
	) );

	$wp_customize->add_setting( 'uku_footerfeature_btn_text', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_footerfeature_btn_text', array(
		'label' 			             => esc_html__( 'Button Text', 'uku' ),
		'description'					     => esc_html__( 'If you want to add a "Call to Action" button, include the button text here.', 'uku' ),
		'section' 			           => 'uku_footerfeature',
		'type' 			               => 'text',
		'priority'						     => 5,
	) );

	$wp_customize->add_setting( 'uku_footerfeature_btn_link', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'esc_url_raw',
	) );

	$wp_customize->add_control( 'uku_footerfeature_btn_link', array(
		'label' 			             => esc_html__( 'Button Link URL', 'uku' ),
		'description'					     => esc_html__( 'The URL the button should link to.', 'uku' ),
		'section' 			           => 'uku_footerfeature',
		'type' 			               => 'text',
		'priority'						     => 6,
	) );


	// Uku Front Page - General
	$wp_customize->add_setting( 'uku_bloglayout', array(
		'default' 				         => 'default',
		'sanitize_callback' 	     => 'uku_sanitize_bloglayout',
	) );

	$wp_customize->add_control( 'uku_bloglayout', array(
		'label' 			             => esc_html__( 'Blog Layout', 'uku' ),
		'description'					     => esc_html__( 'Choose your blog layout', 'uku' ),
		'section' 			           => 'uku_frontpage_general',
		'priority' 			           => 1,
		'type' 			               => 'select',
		'choices' 						     => array(
					'default'						=> esc_html__( 'default', 'uku' ),
					'fourthhighlighted' => esc_html__( 'default, every 4. post highlighted', 'uku' ),
					'classic' 					=> esc_html__( 'classic', 'uku' ),
					'threecolumns' 			=> esc_html__( '3-column grid', 'uku' ),
					'fourcolumns' 			=> esc_html__( '4-column grid', 'uku' ),
		),
	) );

	$wp_customize->add_setting( 'uku_front_hideblog', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_hideblog', array(
		'label'								     => esc_html__( 'Hide blog on Front page', 'uku' ),
		'section'							     => 'uku_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 2,
	) );

	$wp_customize->add_setting( 'uku_front_hidedate', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_hidedate', array(
		'label'								     => esc_html__( 'Hide date on Front page', 'uku' ),
		'section'							     => 'uku_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 3,
	) );

	$wp_customize->add_setting( 'uku_front_hidecomments', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_hidecomments', array(
		'label'								     => esc_html__( 'Hide comments count on Front page', 'uku' ),
		'section'							     => 'uku_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 4,
	) );

	$wp_customize->add_setting( 'uku_front_hidecats', array(
		'default'							     => '',
		'sanitize_callback'		     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_hidecats', array(
		'label'								     => esc_html__( 'Hide categories on Front page', 'uku' ),
		'section'							     => 'uku_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 5,
	) );

	$wp_customize->add_setting( 'uku_front_hideauthor', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_hideauthor', array(
		'label'								     => esc_html__( 'Hide author name on Front page', 'uku' ),
		'section'							     => 'uku_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 6,
	) );

	$wp_customize->add_setting( 'uku_custom_latestposts', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_custom_latestposts', array(
		'label' 			             => esc_html__( 'Latest Posts title', 'uku' ),
		'description'					     => esc_html__( 'Customize the "Latest Posts" title text above the blog content on your blog front page.', 'uku' ),
		'section' 			           => 'uku_frontpage_general',
		'type' 			               => 'text',
		'priority'						     => 7,
	) );

	$wp_customize->add_setting( 'uku_front_hidelatestpoststitle', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_hidelatestpoststitle', array(
		'label'								     => esc_html__( 'Hide Latest Posts title', 'uku' ),
		'section'							     => 'uku_frontpage_general',
		'type'								     => 'checkbox',
		'priority'						     => 8,
	) );

	$wp_customize->add_setting( 'uku_custom_followus', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_custom_followus', array(
		'label' 			             => esc_html__( 'Follow us text', 'uku' ),
		'description'					     => esc_html__( 'Customize the "Follow us" text in your About section and footer social menus.', 'uku' ),
		'section' 			           => 'uku_frontpage_general',
		'type' 			               => 'text',
		'priority'						     => 9,
	) );


	// Uku Theme Options - Featured Posts Slider
	$wp_customize->add_setting( 'uku_featuredtag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'uku_featuredtag', array(
		'label' 			             => esc_html__( 'Featured Slider tag (required)', 'uku' ),
		'settings' 						     => 'uku_featuredtag',
		'section' 						     => 'uku_slider',
		'priority'						     => 1,
	) ) );

	$wp_customize->add_setting( 'uku_sliderstyle', array(
		'default' 				         => 'slider-fullwidth',
		'sanitize_callback' 	     => 'uku_sanitize_sliderstyle',
	) );

	$wp_customize->add_control( 'uku_sliderstyle', array(
		'label' 			             => esc_html__( 'Slider Style', 'uku' ),
		'description'					     => esc_html__( 'Choose the slider design.', 'uku' ),
		'section' 			           => 'uku_slider',
		'priority' 			           => 2,
		'type' 			               => 'select',
		'choices' 						     => array(
			'slider-fullwidth'	 => esc_html__( 'fullwidth', 'uku' ),
			'slider-boxed' 			 => esc_html__( 'boxed', 'uku' ),
			'slider-fullscreen'  => esc_html__( 'fullscreen', 'uku' ),
		),
	) );

	$wp_customize->add_setting( 'uku_slideranimation', array(
		'default' 				         => 'slider-slide',
		'sanitize_callback' 	     => 'uku_sanitize_slideranimation',
	) );

	$wp_customize->add_control( 'uku_slideranimation', array(
		'label' 			             => esc_html__( 'Slider Image Animation', 'uku' ),
		'description'					     => esc_html__( 'Choose, if you want the slider images to fade or slide from one image to the next.', 'uku' ),
		'section' 			           => 'uku_slider',
		'priority' 			           => 3,
		'type' 			               => 'select',
		'choices' 						     => array(
			'slider-slide'	 => esc_html__( 'slide', 'uku' ),
			'slider-fade' 			 => esc_html__( 'fade', 'uku' ),
		),
	) );

	// Uku Front Page - Sections 1 (Featured Top)
	$wp_customize->add_setting( 'uku_front_section_one_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_one_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'uku' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'uku' ),
		'section' 			           => 'uku_front_section_one',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'uku_front_section_one_cat', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'uku_front_section_one_cat', array(
		'label' 							     => esc_html__( 'Section category', 'uku' ),
		'settings' 						     => 'uku_front_section_one_cat',
		'section' 						     => 'uku_front_section_one',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_one_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'uku_front_section_one_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'uku' ),
		'settings' 						     => 'uku_front_section_one_tag',
		'section' 						     => 'uku_front_section_one',
		'priority'						     => 3,
	) ) );

	// Uku Front Page - Sections 2 (Featured Bottom)
	$wp_customize->add_setting( 'uku_front_section_two_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_two_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'uku' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'uku' ),
		'section' 			           => 'uku_front_section_two',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'uku_front_section_two_cat', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'uku_front_section_two_cat', array(
		'label' 							     => esc_html__( 'Section category', 'uku' ),
		'settings' 						     => 'uku_front_section_two_cat',
		'section' 						     => 'uku_front_section_two',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_two_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'uku_front_section_two_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'uku' ),
		'settings' 						     => 'uku_front_section_two_tag',
		'section' 						     => 'uku_front_section_two',
		'priority'						     => 3,
	) ) );

	// Uku Front Page - Sections 3 (on Background)
	$wp_customize->add_setting( 'uku_front_section_three_title', array(
		'default' 			           => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_three_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'uku' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'uku' ),
		'section' 			           => 'uku_front_section_three',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'uku_front_section_three_cat', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'uku_front_section_three_cat', array(
		'label' 							     => esc_html__( 'Section category', 'uku' ),
		'settings' 						     => 'uku_front_section_three_cat',
		'section' 						     => 'uku_front_section_three',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_three_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'uku_front_section_three_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'uku' ),
		'settings' 						     => 'uku_front_section_three_tag',
		'section' 						     => 'uku_front_section_three',
		'priority'						     => 3,
	) ) );

	// Uku Front Page - Sections 4 (Fullwidth)
	$wp_customize->add_setting( 'uku_front_section_four_cat', array(
		'default' 			           => '',
			'sanitize_callback'	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'uku_front_section_four_cat', array(
		'label' 							     => esc_html__( 'Section category', 'uku' ),
		'settings' 						     => 'uku_front_section_four_cat',
		'section' 						     => 'uku_front_section_four',
		'priority'						     => 1,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_four_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'uku_front_section_four_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'uku' ),
		'settings' 						     => 'uku_front_section_four_tag',
		'section' 						     => 'uku_front_section_four',
		'priority'						     => 2,
	) ) );

	// Uku Front Page - Sections About
	$wp_customize->add_setting( 'uku_front_section_about_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_about_title', array(
		'label' 			             => esc_html__( 'Section Title', 'uku' ),
		'section' 			           => 'uku_front_section_about',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'uku_front_section_about_image', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'uku_front_section_about_image', array(
				'label'						     => esc_html__( 'Upload About image', 'uku' ),
				'description'			     => esc_html__( 'The recommended image width for the About image is 580 pixels for Uku standard and 1500 pixels for the Uku neo and serif design style.', 'uku' ),
				'section'					     => 'uku_front_section_about',
				'priority'				     => 2,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_about_text', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_about_text', array(
		'label' 			             => esc_html__( 'About Text (required)', 'uku' ),
		'section' 			           => 'uku_front_section_about',
		'type' 			               => 'textarea',
		'description'					     => esc_html__( '(HTML is allowed.)', 'uku' ),
		'priority'						     => 3,
	) );


	// Uku Front Page - Sections 2-Column
	$wp_customize->add_setting( 'uku_front_section_twocolumn_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_twocolumn_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'uku' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'uku' ),
		'section' 			           => 'uku_front_section_twocolumn',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'uku_front_section_twocolumn_cat', array(
		'default' 			           => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'uku_front_section_twocolumn_cat', array(
		'label' 							     => esc_html__( 'Section category', 'uku' ),
		'settings' 						     => 'uku_front_section_twocolumn_cat',
		'section' 						     => 'uku_front_section_twocolumn',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_twocolumn_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'uku_front_section_twocolumn_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'uku' ),
		'settings' 						     => 'uku_front_section_twocolumn_tag',
		'section' 						     => 'uku_front_section_twocolumn',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_twocolumn_number', array(
		'default' 				         => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_twocolumn_number', array(
		'label' 			             => esc_html__( 'Number of posts', 'uku' ),
		'section' 			           => 'uku_front_section_twocolumn',
		'priority' 			           => 4,
		'type' 			               => 'text',
	) );

	$wp_customize->add_setting( 'uku_front_section_twocolumn_excerpt', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_section_twocolumn_excerpt', array(
		'label'								     => esc_html__( 'Show post excerpt texts', 'uku' ),
		'section'							     => 'uku_front_section_twocolumn',
		'type'								     => 'checkbox',
		'priority'						     => 5,
	) );

	// Uku Front Page - Sections 3-Column
	$wp_customize->add_setting( 'uku_front_section_threecolumn_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_threecolumn_title', array(
		'label' 			             => esc_html__( 'Section Title (optional)', 'uku' ),
		'description'					     => esc_html__( 'The title will appear at the top of the section.', 'uku' ),
		'section' 			           => 'uku_front_section_threecolumn',
		'type' 			               => 'text',
		'priority'						     => 1,
	) );

	$wp_customize->add_setting( 'uku_front_section_threecolumn_cat', array(
		'default' 			           => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'uku_front_section_threecolumn_cat', array(
		'label' 							     => esc_html__( 'Section category', 'uku' ),
		'settings' 						     => 'uku_front_section_threecolumn_cat',
		'section' 						     => 'uku_front_section_threecolumn',
		'priority'						     => 2,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_threecolumn_tag', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'uku_front_section_threecolumn_tag', array(
		'label' 			             => esc_html__( 'Section tag', 'uku' ),
		'settings' 						     => 'uku_front_section_threecolumn_tag',
		'section' 						     => 'uku_front_section_threecolumn',
		'priority'						     => 3,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_threecolumn_number', array(
		'default' 				         => '',
		'sanitize_callback'		     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_threecolumn_number', array(
		'label' 			             => esc_html__( 'Number of posts', 'uku' ),
		'section' 			           => 'uku_front_section_threecolumn',
		'priority' 			           => 4,
		'type' 			               => 'text',
	) );

	$wp_customize->add_setting( 'uku_front_section_threecolumn_excerpt', array(
		'default'							     => '',
		'sanitize_callback' 	     => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_section_threecolumn_excerpt', array(
		'label'								     => esc_html__( 'Show post excerpt texts', 'uku' ),
		'section'							     => 'uku_front_section_threecolumn',
		'type'								     => 'checkbox',
		'priority'						     => 5,
	) );


	// Uku Front Page - Sections 4-Column
	$wp_customize->add_setting( 'uku_front_section_fourcolumn_title', array(
		'default' 			           => '',
		'sanitize_callback' 	     => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_fourcolumn_title', array(
		'label' 			           => esc_html__( 'Section title (optional)', 'uku' ),
		'description'					   => esc_html__( 'The title will appear at the top of the section.', 'uku' ),
		'section' 			         => 'uku_front_section_fourcolumn',
		'type' 			             => 'text',
		'priority'						   => 1,
	) );

	$wp_customize->add_setting( 'uku_front_section_fourcolumn_cat', array(
		'default' 			         => '',
		'sanitize_callback' 	   => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'uku_front_section_fourcolumn_cat', array(
		'label' 							   => esc_html__( 'Section category', 'uku' ),
		'settings' 						   => 'uku_front_section_fourcolumn_cat',
		'section' 						   => 'uku_front_section_fourcolumn',
		'priority'						   => 2,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_fourcolumn_tag', array(
		'default' 			         => '',
		'sanitize_callback' 	   => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'uku_front_section_fourcolumn_tag', array(
		'label' 			           => esc_html__( 'Section tag', 'uku' ),
		'settings' 						   => 'uku_front_section_fourcolumn_tag',
		'section' 						   => 'uku_front_section_fourcolumn',
		'priority'						   => 3,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_fourcolumn_number', array(
		'default' 				       => '',
		'sanitize_callback' 	   => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_fourcolumn_number', array(
		'label' 			           => esc_html__( 'Number of posts', 'uku' ),
		'section' 			         => 'uku_front_section_fourcolumn',
		'priority' 			         => 4,
		'type' 			             => 'text',
	) );

	$wp_customize->add_setting( 'uku_front_section_fourcolumn_excerpt', array(
		'default'							   => '',
		'sanitize_callback' 	   => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_section_fourcolumn_excerpt', array(
		'label'								   => esc_html__( 'Show post excerpt texts', 'uku' ),
		'section'							   => 'uku_front_section_fourcolumn',
		'type'								   => 'checkbox',
		'priority'						   => 5,
	) );


	// Uku Front Page - Sections 6-Column
	$wp_customize->add_setting( 'uku_front_section_sixcolumn_title', array(
		'default' 			         => '',
		'sanitize_callback'		   => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_sixcolumn_title', array(
		'label' 			           => esc_html__( 'Section Title (optional)', 'uku' ),
		'description'					   => esc_html__( 'The title will appear at the top of the section.', 'uku' ),
		'section' 			         => 'uku_front_section_sixcolumn',
		'type' 			             => 'text',
		'priority'						   => 1,
	) );

	$wp_customize->add_setting( 'uku_front_section_sixcolumn_cat', array(
		'default' 			         => '',
		'sanitize_callback' 	   => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Category_Control($wp_customize,'uku_front_section_sixcolumn_cat', array(
		'label' 							   => esc_html__( 'Section category', 'uku' ),
		'settings' 						   => 'uku_front_section_sixcolumn_cat',
		'section' 						   => 'uku_front_section_sixcolumn',
		'priority'						   => 2,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_sixcolumn_tag', array(
		'default' 			         => '',
		'sanitize_callback'		   => 'wp_kses_post',
	) );

	$wp_customize->add_control(new WP_Customize_Tag_Control($wp_customize,'uku_front_section_sixcolumn_tag', array(
			'label' 			         => esc_html__( 'Section tag', 'uku' ),
			'settings' 						 => 'uku_front_section_sixcolumn_tag',
			'section' 						 => 'uku_front_section_sixcolumn',
			'priority'						 => 3,
	) ) );

	$wp_customize->add_setting( 'uku_front_section_sixcolumn_number', array(
			'default' 				     => '',
			'sanitize_callback' 	 => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_front_section_sixcolumn_number', array(
			'label' 			         => esc_html__( 'Number of posts', 'uku' ),
			'section' 			       => 'uku_front_section_sixcolumn',
			'priority' 			       => 4,
			'type' 			           => 'text',
	) );

	$wp_customize->add_setting( 'uku_front_section_sixcolumn_excerpt', array(
			'default'							 => '',
			'sanitize_callback' 	 => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_front_section_sixcolumn_excerpt', array(
			'label'								 => esc_html__( 'Show post excerpt texts', 'uku' ),
			'section'							 => 'uku_front_section_sixcolumn',
			'type'								 => 'checkbox',
			'priority'						 => 5,
	) );


	// Uku Shop - Front Page

	// General Settings
	$wp_customize->add_setting('uku_shopfront_about_activate', array(
		'default'           => '',
		'sanitize_callback' => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_shopfront_about_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show About Section on Shop Front Page', 'uku'),
		'section'           => 'uku_shop_front_general',
		'priority'          => 1,
	) );

	$wp_customize->add_setting('uku_shopfront_blog_activate', array(
		'default'           => '',
		'sanitize_callback' => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_shopfront_blog_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show "Posts on a Background" Section on Shop Front Page', 'uku'),
		'section'           => 'uku_shop_front_general',
		'priority'          => 2,
	) );

	// Product catgories
	$wp_customize->add_setting('uku_shopcats_activate', array(
		'default'           => '',
		'sanitize_callback' => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_shopcats_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show product categories', 'uku'),
		'section'           => 'uku_shop_front_cats',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'uku_shopcats_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '3'
) );

	$wp_customize->add_control( 'uku_shopcats_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of product categories', 'uku'),
		'section'           => 'uku_shop_front_cats',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('uku_shopcats_title', array(
		'default'           => esc_html__('Product categories', 'uku'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_shopcats_title', array(
		'type'              => 'text',
		'label'             => esc_html__('Product categories title', 'uku'),
		'section'           => 'uku_shop_front_cats',
		'priority'          => 3,
	) );

	// Featured Products
	$wp_customize->add_setting('uku_shopfeatured_activate', array(
		'default'           => '',
		'sanitize_callback' => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_shopfeatured_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show Featured products', 'uku'),
		'section'           => 'uku_shop_front_featured',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'uku_shopfeatured_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '2'
) );

	$wp_customize->add_control( 'uku_shopfeatured_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of Featured products', 'uku'),
		'section'           => 'uku_shop_front_featured',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('uku_shopfeatured_title', array(
		'default'           => esc_html__('Featured Products', 'uku'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_shopfeatured_title', array(
		'type'              => 'text',
		'label'             => esc_html__('Featured products title', 'uku'),
		'section'           => 'uku_shop_front_featured',
		'priority'          => 3,
	) );

	// Latest Products
	$wp_customize->add_setting('uku_shoplatest_activate', array(
		'default'           => '',
		'sanitize_callback' => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_shoplatest_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show Latest products', 'uku'),
		'section'           => 'uku_shop_front_latest',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'uku_shoplatest_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '4'
) );

	$wp_customize->add_control( 'uku_shoplatest_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of Latest products', 'uku'),
		'section'           => 'uku_shop_front_latest',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('uku_shoplatest_title', array(
		'default'           => esc_html__('Latest Products', 'uku'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_shoplatest_title', array(
		'type'              => 'text',
		'label'             => esc_html__('Latest products title', 'uku'),
		'section'           => 'uku_shop_front_latest',
		'priority'          => 3,
	) );

	// Top Rated Products
	$wp_customize->add_setting('uku_shoptoprated_activate', array(
		'default'           => '',
		'sanitize_callback' => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_shoptoprated_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show Top Rated products', 'uku'),
		'section'           => 'uku_shop_front_toprated',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'uku_shoptoprated_number', array(
		'sanitize_callback' => 'absint',
		'default'           => '4'
	) );

	$wp_customize->add_control( 'uku_shoptoprated_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of Top Rated products', 'uku'),
		'section'           => 'uku_shop_front_toprated',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('uku_shoptoprated_title', array(
		'default'           => esc_html__('Top Rated', 'uku'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_shoptoprated_title', array(
		'type'              => 'text',
		'label'             => esc_html__('Top Rated products title', 'uku'),
		'section'           => 'uku_shop_front_toprated',
		'priority'          => 3,
	) );

	// On Sale Products
	$wp_customize->add_setting('uku_shopsale_activate', array(
		'default'           => '',
		'sanitize_callback' => 'uku_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'uku_shopsale_activate', array(
		'type'              => 'checkbox',
		'label'             => esc_html__('Show On Sale products', 'uku'),
		'section'           => 'uku_shop_front_sale',
		'priority'          => 1,
	) );

	$wp_customize->add_setting( 'uku_shopsale_number', array(
	'sanitize_callback'   => 'absint',
	'default'             => '4'
	) );

	$wp_customize->add_control( 'uku_shopsale_number', array(
		'type'              => 'number',
		'label'             => esc_html__('Number of On Sale products', 'uku'),
		'section'           => 'uku_shop_front_sale',
		'priority'          => 2,
	) );

	$wp_customize->add_setting('uku_shopsale_title', array(
		'default'           => esc_html__('On Sale', 'uku'),
		'sanitize_callback' => 'wp_kses_post',
	) );

	$wp_customize->add_control( 'uku_shopsale_title', array(
		'type'              => 'text',
		'label'             => esc_html__('On Sale products title', 'uku'),
		'section'           => 'uku_shop_front_sale',
		'priority'          => 3,
	) );

}
add_action( 'customize_register', 'uku_customize_register' );


/**
 * Add Custom Customizer Controls - Category Dropdown
 */
if (class_exists('WP_Customize_Control')) {
		class WP_Customize_Category_Control extends WP_Customize_Control {

				public function render_content() {
						$dropdown = wp_dropdown_categories(
								array(
										'name'              => '_customize-dropdown-categories-' . $this->id,
										'echo'              => 0,
										'orderby'           => 'name',
										'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'uku' ),

										'option_none_value' => '',
										'selected'          => $this->value(),
								)
						);

						$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

						printf(
								'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
								$this->label,
								$dropdown
						);
				}
		}
}

/**
 * Add Custom Customizer Controls - Tag Dropdown
 */
if (class_exists('WP_Customize_Control')) {
		class WP_Customize_Tag_Control extends WP_Customize_Control {

				public function render_content() {
						$dropdown = wp_dropdown_categories(
								array(
										'name'              => '_customize-dropdown-tags-' . $this->id,
										'echo'              => 0,
										'orderby'           => 'name',
										'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'uku' ),

										'option_none_value' => '',
										'taxonomy'           => 'post_tag',
										'selected'          => $this->value(),
								)
						);

						$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

						printf(
								'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
								$this->label,
								$dropdown
						);
				}
		}
}

/**
 * Sanitize Checkboxes.
 */
function uku_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Sanitize Main Design Style
 */
function uku_sanitize_main_design( $uku_main_design ) {
	if ( ! in_array( $uku_main_design, array( 'standard', 'neo', 'serif' ) ) ) {
		$uku_main_design = 'standard';
	}
	return $uku_main_design;
}

/**
 * Sanitize Sidebar Position.
 */
function uku_sanitize_sidebar( $uku_sidebar ) {
	if ( ! in_array( $uku_sidebar, array( 'sidebar-right', 'sidebar-left' ) ) ) {
		$uku_sidebar = 'sidebar-right';
	}
	return $uku_sidebar;
}

/**
 * Sanitize Sidebar Visibility Settings.
 */
function uku_sanitize_sidebar_hide( $uku_sidebar_hide ) {
	if ( ! in_array( $uku_sidebar_hide, array( 'sidebar-show', 'sidebar-no', 'sidebar-no-single', 'sidebar-no-front' ) ) ) {
		$uku_sidebar_hide = 'sidebar-show';
	}
	return $uku_sidebar_hide;
}

/**
 * Sanitize Featured Slider Style.
 */
function uku_sanitize_sliderstyle( $uku_sliderstyle ) {
	if ( ! in_array( $uku_sliderstyle, array( 'slider-fullwidth', 'slider-boxed', 'slider-fullscreen' ) ) ) {
		$uku_sliderstyle = 'slider-fullwidth';
	}
	return $uku_sliderstyle;
}

/**
 * Sanitize Featured Slider image animation.
 */
function uku_sanitize_slideranimation( $uku_slideranimation ) {
	if ( ! in_array( $uku_slideranimation, array( 'slider-slide', 'slider-fade' ) ) ) {
		$uku_slideranimation = 'slider-slide';
	}
	return $uku_slideranimation;
}

/**
 * Sanitize Custom Header Image Style.
 */
function uku_sanitize_headerstyle( $uku_headerstyle ) {
	if ( ! in_array( $uku_headerstyle, array( 'header-fullwidth', 'header-boxed', 'header-fullscreen' ) ) ) {
		$uku_headerstyle = 'header-fullwidth';
	}
	return $uku_headerstyle;
}

/**
 * Sanitize Custom Fix-positioned header style.
 */
function uku_sanitize_fixedheader_style( $uku_fixedheader_style ) {
	if ( ! in_array( $uku_fixedheader_style, array( 'light', 'dark' ) ) ) {
		$uku_fixedheader_style = 'light';
	}
	return $uku_fixedheader_style;
}

/**
 * Sanitize header font.
 */
function uku_sanitize_header_font( $uku_header_font ) {
	if ( ! in_array( $uku_header_font, array( 'light', 'dark' ) ) ) {
		$uku_header_font = 'dark';
	}
	return $uku_header_font;
}

/**
 * Sanitize the image font.
 */
function uku_sanitize_image_font( $uku_image_font ) {
	if ( ! in_array( $uku_image_font, array( 'light', 'dark' ) ) ) {
		$uku_image_font = 'light';
	}
	return $uku_image_font;
}

/**
 * Sanitize Image Transition Transparency.
 */
function uku_sanitize_imggradient( $uku_imggradient ) {
	if ( ! in_array( $uku_imggradient, array( '0','0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '0.99' ) ) ) {
		$uku_imggradient = '0.7';
	}
	return $uku_imggradient;
}

/**
 * Sanitize Image Overlay Transparency.
 */
function uku_sanitize_imgoverlay_transparency( $uku_imgoverlay_transparency ) {
	if ( ! in_array( $uku_imgoverlay_transparency, array( '0','0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1' ) ) ) {
		$uku_imgoverlay_transparency = '0';
	}
	return $uku_imgoverlay_transparency;
}

/**
 * Sanitize Blog Layouts
 */
function uku_sanitize_bloglayout( $uku_bloglayout ) {
	if ( ! in_array( $uku_bloglayout, array( 'default', 'fourthhighlighted', 'classic', 'threecolumns', 'fourcolumns' ) ) ) {
		$uku_bloglayout = 'classic';
	}
	return $uku_bloglayout;
}
