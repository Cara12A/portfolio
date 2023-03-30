<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'professional_cv_resume_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'professional-cv-resume' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'professional_cv_resume_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'professional-cv-resume' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'professional_cv_resume_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'professional-cv-resume' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'professional-cv-resume' ),
			'off' => esc_html__( 'Disable', 'professional-cv-resume' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'professional_cv_resume_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'professional-cv-resume' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'professional-cv-resume' ),
			'off' => esc_html__( 'Disable', 'professional-cv-resume' ),
		],
	] );

	// PANEL

	Kirki::add_panel( 'professional_cv_resume_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'professional-cv-resume' ),
	) );

	// Scroll Top

	Kirki::add_section( 'professional_cv_resume_section_scroll', array(
	    'title'          => esc_html__( 'Additional Settings', 'professional-cv-resume' ),
	    'description'    => esc_html__( 'Scroll To Top', 'professional-cv-resume' ),
	    'panel'          => 'professional_cv_resume_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'professional_cv_resume_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_section_scroll',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_professional_cv_resume',
		'label'       => esc_html__( 'Menus Text Transform', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_section_scroll',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'professional-cv-resume' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'professional-cv-resume' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'professional-cv-resume' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'professional-cv-resume' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'professional_cv_resume_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_section_scroll',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );


	// POST SECTION

	Kirki::add_section( 'professional_cv_resume_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'professional-cv-resume' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'professional-cv-resume' ),
	    'panel'          => 'professional_cv_resume_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'professional_cv_resume_enable_post_heading',
		'section'     => 'professional_cv_resume_section_post',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Post Settings.', 'professional-cv-resume' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'professional_cv_resume_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'professional-cv-resume' ),
			'off' => esc_html__( 'Disable', 'professional-cv-resume' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'professional_cv_resume_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'professional-cv-resume' ),
			'off' => esc_html__( 'Disable', 'professional-cv-resume' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'professional_cv_resume_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'professional_cv_resume_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'professional-cv-resume' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'professional-cv-resume' ),
        'panel'          => 'professional_cv_resume_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'professional_cv_resume_enable_heading',
		'section'     => 'professional_cv_resume_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'professional-cv-resume' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'professional_cv_resume_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_blog_slide_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'professional-cv-resume' ),
			'off' => esc_html__( 'Disable', 'professional-cv-resume' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'professional_cv_resume_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'professional-cv-resume' ),
			'off' => esc_html__( 'Disable', 'professional-cv-resume' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'professional_cv_resume_button_unable_disable',
		'label'       => esc_html__( 'Slide Button Enable / Disable', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'professional-cv-resume' ),
			'off' => esc_html__( 'Disable', 'professional-cv-resume' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'professional_cv_resume_slider_heading',
		'section'     => 'professional_cv_resume_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'professional-cv-resume' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'professional_cv_resume_slider_extra_heading' ,
        'label'    => esc_html__( 'Extra Heading',  'professional-cv-resume' ),
        'section'  => 'professional_cv_resume_blog_slide_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'professional_cv_resume_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'professional_cv_resume_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'professional-cv-resume' ),
		'priority'    => 10,
		'choices'     => professional_cv_resume_get_categories_select(),
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'professional_cv_resume_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_blog_slide_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'professional-cv-resume' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'professional-cv-resume' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'professional-cv-resume' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'professional-cv-resume' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'professional_cv_resume_header_phone_number_heading',
		'section'     => 'professional_cv_resume_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Phone Number', 'professional-cv-resume' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Text', 'professional-cv-resume' ),
		'settings' => 'professional_cv_resume_header_phone_text',
		'section'  => 'professional_cv_resume_blog_slide_section',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Phone Number', 'professional-cv-resume' ),
		'settings' => 'professional_cv_resume_header_phone_number',
		'section'  => 'professional_cv_resume_blog_slide_section',
		'default'  => '',
		'sanitize_callback' => 'professional_cv_resume_sanitize_phone_number',
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'professional_cv_resume_enable_socail_link',
		'section'     => 'professional_cv_resume_blog_slide_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'professional-cv-resume' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'professional_cv_resume_blog_slide_section',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'professional-cv-resume' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'professional-cv-resume' ),
		'settings'     => 'professional_cv_resume_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'professional-cv-resume' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'professional-cv-resume' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'professional-cv-resume' ),
				'description' => esc_html__( 'Add the social icon url here.', 'professional-cv-resume' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

	//OUR SERVICES SECTION

	Kirki::add_section( 'professional_cv_resume_what_we_do_section', array(
	    'title'          => esc_html__( 'Our Servies Settings', 'professional-cv-resume' ),
	    'description'    => esc_html__( 'Here you can add services post.', 'professional-cv-resume' ),
	    'panel'          => 'professional_cv_resume_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'professional_cv_resume_enable_heading',
		'section'     => 'professional_cv_resume_what_we_do_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Our Services',  'professional-cv-resume' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'professional_cv_resume_what_we_do_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_what_we_do_section',
		'default'     => '0',
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'professional-cv-resume' ),
			'off' => esc_html__( 'Disable',  'professional-cv-resume' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'professional_cv_resume_what_we_do_short_heading' ,
        'label'    => esc_html__( 'Short Heading',  'professional-cv-resume' ),
        'section'  => 'professional_cv_resume_what_we_do_section',
    ] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'professional_cv_resume_what_we_do_heading' ,
        'label'    => esc_html__( 'Heading',  'professional-cv-resume' ),
        'section'  => 'professional_cv_resume_what_we_do_section',
    ] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'professional_cv_resume_what_we_do_left_number',
		'label'       => esc_html__( 'Number of post to show', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_what_we_do_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'professional_cv_resume_what_we_do_left_category',
		'label'       => esc_html__( 'Select the category to show post', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_what_we_do_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'professional-cv-resume' ),
		'priority'    => 10,
		'choices'     => professional_cv_resume_get_categories_select(),
	] );

	// FOOTER SECTION

	Kirki::add_section( 'professional_cv_resume_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'professional-cv-resume' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'professional-cv-resume' ),
        'panel'          => 'professional_cv_resume_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'professional_cv_resume_footer_text_heading',
		'section'     => 'professional_cv_resume_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'professional-cv-resume' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'professional_cv_resume_footer_text',
		'section'  => 'professional_cv_resume_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'professional_cv_resume_footer_enable_heading',
		'section'     => 'professional_cv_resume_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'professional-cv-resume' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'professional_cv_resume_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'professional-cv-resume' ),
		'section'     => 'professional_cv_resume_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'professional-cv-resume' ),
			'off' => esc_html__( 'Disable', 'professional-cv-resume' ),
		],
	] );
}
