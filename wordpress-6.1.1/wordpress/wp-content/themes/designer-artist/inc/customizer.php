<?php
/**
 * Designer Artist Theme Customizer
 *
 * @package Designer Artist
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function designer_artist_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'designer_artist_custom_controls' );

function designer_artist_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'designer_artist_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'designer_artist_Customize_partial_blogdescription',
	));

	//Homepage Settings
	$wp_customize->add_panel( 'designer_artist_homepage_panel', array(
		'title' => esc_html__( 'Homepage Settings', 'designer-artist' ),
		'panel' => 'designer_artist_panel_id',
		'priority' => 20,
	));

	//Topbar
	$wp_customize->add_section( 'designer_artist_header_section' , array(
  	'title' => __( 'Header Section', 'designer-artist' ),
		'panel' => 'designer_artist_homepage_panel'
	) );

	$wp_customize->add_setting( 'designer_artist_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'designer_artist_switch_sanitization'
    ));  
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','designer-artist' ),
      'section' => 'designer_artist_header_section'
    )));

	$wp_customize->add_setting('designer_artist_email_address',array(
	    'default'=> '',
	    'sanitize_callback' => 'sanitize_email'
  	)); 
  	$wp_customize->add_control('designer_artist_email_address',array(
	    'label' => esc_html__('Email Address','designer-artist'),
	    'input_attrs' => array(
	            'placeholder' => esc_html__( 'example@gmail.com', 'designer-artist' ),
	        ),
	    'section'=> 'designer_artist_header_section',
	    'type'=> 'Email'
 	 ));

  	$wp_customize->add_setting('designer_artist_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'designer_artist_sanitize_phone_number'
	));
	$wp_customize->add_control('designer_artist_phone_number',array(
		'label'	=> esc_html__('Add Phone Number','designer-artist'),
		'input_attrs' => array(
      'placeholder' => esc_html__( '1234567890', 'designer-artist' ),
    ),
		'section'=> 'designer_artist_header_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('designer_artist_cart_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_cart_button_text',array(
		'label'	=> esc_html__('Add Button Text','designer-artist'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Cart', 'designer-artist' ),
    ),
		'section'=> 'designer_artist_header_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('designer_artist_cart_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('designer_artist_cart_button_link',array(
		'label'	=> esc_html__('Add Button Link','designer-artist'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'www.example-info.com', 'designer-artist' ),
    ),
		'section'=> 'designer_artist_header_section',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'designer_artist_search_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'designer_artist_switch_sanitization'
    ));  
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_search_hide_show',array(
      'label' => esc_html__( 'Show / Hide Search','designer-artist' ),
      'section' => 'designer_artist_header_section'
    )));

	$wp_customize->add_setting('designer_artist_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'designer_artist_header_menus_color', array(
		'label'    => __('Menus Color', 'designer-artist'),
		'section'  => 'designer_artist_header_section',
	)));

	$wp_customize->add_setting('designer_artist_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'designer_artist_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'designer-artist'),
		'section'  => 'designer_artist_header_section',
	)));

	$wp_customize->add_setting('designer_artist_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'designer_artist_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'designer-artist'),
		'section'  => 'designer_artist_header_section',
	)));

	$wp_customize->add_setting('designer_artist_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'designer_artist_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'designer-artist'),
		'section'  => 'designer_artist_header_section',
	)));

	//Slider
	$wp_customize->add_section( 'designer_artist_slidersettings' , array(
  	'title'      => __( 'Slider Settings', 'designer-artist' ),
	'panel' => 'designer_artist_homepage_panel'
	) );

	$wp_customize->add_setting( 'designer_artist_slider_hide_show',array(
    'default' => 0,
    'transport' => 'refresh',
    'sanitize_callback' => 'designer_artist_switch_sanitization'
	));  
	$wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_slider_hide_show',array(
	'label' => esc_html__( 'Show / Hide Slider','designer-artist' ),
	'section' => 'designer_artist_slidersettings'
	)));

   	//Selective Refresh
 	$wp_customize->selective_refresh->add_partial('designer_artist_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'designer_artist_customize_partial_designer_artist_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'designer_artist_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'designer_artist_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'designer_artist_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'designer-artist' ),
			'description' => __('Slider image size (1400 x 550)','designer-artist'),
			'section'  => 'designer_artist_slidersettings',
			'type'     => 'dropdown-pages',
		) );
	}

	$wp_customize->add_setting( 'designer_artist_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'designer_artist_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','designer-artist'),
		'section' => 'designer_artist_slidersettings',
		'type'  => 'text',
	) );

	//Slider height
	$wp_customize->add_setting('designer_artist_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_slider_height',array(
		'label'	=> __('Slider Height','designer-artist'),
		'description'	=> __('Specify the slider height (px).','designer-artist'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'designer-artist' ),
        ),
		'section'=> 'designer_artist_slidersettings',
		'type'=> 'text',
	));

	// Products Section
	$wp_customize->add_section( 'designer_artist_product_section' , array(
    	'title'      => __( 'Products Section', 'designer-artist' ),
		'priority'   => null,
		'panel' => 'designer_artist_homepage_panel'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'designer_artist_product_settings', array( 
		'selector' => '#bakery-product h2', 
		'render_callback' => 'designer_artist_customize_partial_designer_artist_product_settings',
	));

	$wp_customize->add_setting( 'designer_artist_product_hide_show',array(
	    'default' => 0,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'designer_artist_switch_sanitization'
	));  
	$wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_product_hide_show',array(
		'label' => esc_html__( 'Show / Hide Product Section','designer-artist' ),
		'section' => 'designer_artist_product_section'
	)));

	$wp_customize->add_setting('designer_artist_product_heading_product',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_product_heading_product',array(
		'label'	=> __('Add Text','designer-artist'),
		'input_attrs' => array(
            'placeholder' => __( 'Add Heading Text', 'designer-artist' ),
        ),
		'section'=> 'designer_artist_product_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('designer_artist_product_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_product_title',array(
		'label'	=> __('Add Text','designer-artist'),
		'input_attrs' => array(
            'placeholder' => __( 'Add Small Text', 'designer-artist' ),
        ),
		'section'=> 'designer_artist_product_section',
		'type'=> 'text'
	));

	$args = array(
		'type'         => 'product',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'term_group',
		'order'        => 'ASC',
		'hide_empty'   => false,
		'hierarchical' => 1,
		'number'       => '',
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false
	);
 	$categories = get_categories( $args );
	$cat_posts = array();
	$i = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name; 
	}

	$wp_customize->add_setting('designer_artist_product_settings',array(
		'default'	=> 'select',
		'sanitize_callback' => 'designer_artist_sanitize_choices',
	));
	$wp_customize->add_control('designer_artist_product_settings',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Products','designer-artist'),
		'section' => 'designer_artist_product_section',
	));


	//Footer Text
	$wp_customize->add_section('designer_artist_footer',array(
		'title'	=> esc_html__('Footer Settings','designer-artist'),
		'panel' => 'designer_artist_homepage_panel',
	));	

	$wp_customize->add_setting('designer_artist_footer_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'designer_artist_footer_background_color', array(
		'label'    => __('Footer Background Color', 'designer-artist'),
		'section'  => 'designer_artist_footer',
	)));

	$wp_customize->add_setting('designer_artist_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'designer_artist_footer_background_image',array(
        'label' => __('Footer Background Image','designer-artist'),
        'section' => 'designer_artist_footer'
	)));

	$wp_customize->add_setting('designer_artist_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control('designer_artist_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','designer-artist'),
        'section' => 'designer_artist_footer',
        'choices' => array(
        	'Left' => __('Left','designer-artist'),
            'Center' => __('Center','designer-artist'),
            'Right' => __('Right','designer-artist')
        ),
	) );

	$wp_customize->add_setting('designer_artist_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control('designer_artist_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','designer-artist'),
        'section' => 'designer_artist_footer',
        'choices' => array(
        	'Left' => __('Left','designer-artist'),
            'Center' => __('Center','designer-artist'),
            'Right' => __('Right','designer-artist')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('designer_artist_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','designer-artist'),
		'description'	=> __('Enter a value in pixels. Example:20px','designer-artist'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'designer-artist' ),
    ),
		'section'=> 'designer_artist_footer',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('designer_artist_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'designer_artist_Customize_partial_designer_artist_footer_text', 
	));
	
	$wp_customize->add_setting('designer_artist_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('designer_artist_footer_text',array(
		'label'	=> esc_html__('Copyright Text','designer-artist'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2021, .....', 'designer-artist' ),
        ),
		'section'=> 'designer_artist_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('designer_artist_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control(new Designer_Artist_Image_Radio_Control($wp_customize, 'designer_artist_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','designer-artist'),
        'section' => 'designer_artist_footer',
        'settings' => 'designer_artist_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'designer_artist_hide_show_scroll',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
	));  
	$wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_hide_show_scroll',array(
		'label' => esc_html__( 'Show / Hide Scroll to Top','designer-artist' ),
		'section' => 'designer_artist_footer'
	)));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('designer_artist_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'designer_artist_Customize_partial_designer_artist_scroll_to_top_icon', 
	));

  	$wp_customize->add_setting('designer_artist_scroll_top_alignment',array(
    'default' => 'Right',
    'sanitize_callback' => 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control(new Designer_Artist_Image_Radio_Control($wp_customize, 'designer_artist_scroll_top_alignment', array(
    'type' => 'select',
    'label' => esc_html__('Scroll To Top','designer-artist'),
    'section' => 'designer_artist_footer',
    'settings' => 'designer_artist_scroll_top_alignment',
    'choices' => array(
        'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
        'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
        'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( 'designer_artist_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'designer-artist' ),
		'panel' => 'designer_artist_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'designer_artist_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'designer-artist' ),
		'panel' => 'designer_artist_blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('designer_artist_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'designer_artist_sanitize_choices'
    ));
    $wp_customize->add_control(new Designer_Artist_Image_Radio_Control($wp_customize, 'designer_artist_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Post Layouts','designer-artist'),
        'section' => 'designer_artist_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('designer_artist_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'designer_artist_Customize_partial_designer_artist_toggle_postdate', 
	));

	$wp_customize->add_setting( 'designer_artist_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','designer-artist' ),
        'section' => 'designer_artist_post_settings'
    )));

    $wp_customize->add_setting( 'designer_artist_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_toggle_author',array(
		'label' => esc_html__( 'Author','designer-artist' ),
		'section' => 'designer_artist_post_settings'
    )));

    $wp_customize->add_setting( 'designer_artist_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_toggle_comments',array(
		'label' => esc_html__( 'Comments','designer-artist' ),
		'section' => 'designer_artist_post_settings'
    )));

    $wp_customize->add_setting( 'designer_artist_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_toggle_time',array(
		'label' => esc_html__( 'Time','designer-artist' ),
		'section' => 'designer_artist_post_settings'
    )));

    $wp_customize->add_setting( 'designer_artist_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
	));
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','designer-artist' ),
		'section' => 'designer_artist_post_settings'
    )));

    $wp_customize->add_setting( 'designer_artist_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
	));
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_toggle_tags', array(
		'label' => esc_html__( 'Tags','designer-artist' ),
		'section' => 'designer_artist_post_settings'
    )));

    $wp_customize->add_setting( 'designer_artist_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'designer_artist_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'designer_artist_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','designer-artist' ),
		'section'     => 'designer_artist_post_settings',
		'type'        => 'range',
		'settings'    => 'designer_artist_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('designer_artist_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','designer-artist'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','designer-artist'),
		'section'=> 'designer_artist_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('designer_artist_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control('designer_artist_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','designer-artist'),
        'section' => 'designer_artist_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','designer-artist'),
            'Excerpt' => esc_html__('Excerpt','designer-artist'),
            'No Content' => esc_html__('No Content','designer-artist')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'designer_artist_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'designer-artist' ),
		'panel' => 'designer_artist_blog_post_parent_panel',
	));

	$wp_customize->add_setting('designer_artist_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_button_padding_top_bottom',array(
		'label'	=> esc_html__('Padding Top Bottom','designer-artist'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','designer-artist'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'designer-artist' ),
        ),
		'section' => 'designer_artist_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('designer_artist_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_button_padding_left_right',array(
		'label'	=> esc_html__('Padding Left Right','designer-artist'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','designer-artist'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'designer-artist' ),
        ),
		'section' => 'designer_artist_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting( 'designer_artist_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'designer_artist_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'designer_artist_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','designer-artist' ),
		'section'     => 'designer_artist_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// font size button
	$wp_customize->add_setting('designer_artist_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_button_font_size',array(
		'label'	=> __('Button Font Size','designer-artist'),
		'description'	=> __('Enter a value in pixels. Example:20px','designer-artist'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'designer-artist' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'designer_artist_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('designer_artist_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control('designer_artist_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','designer-artist'),
		'choices' => array(
            'Uppercase' => __('Uppercase','designer-artist'),
            'Capitalize' => __('Capitalize','designer-artist'),
            'Lowercase' => __('Lowercase','designer-artist'),
        ),
		'section'=> 'designer_artist_button_settings',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('designer_artist_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'designer_artist_Customize_partial_designer_artist_button_text', 
	));

    $wp_customize->add_setting('designer_artist_button_text',array(
		'default'=> esc_html__('Read More','designer-artist'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_button_text',array(
		'label'	=> esc_html__('Add Button Text','designer-artist'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Read More', 'designer-artist' ),
        ),
		'section'=> 'designer_artist_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'designer_artist_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'designer-artist' ),
		'panel' => 'designer_artist_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('designer_artist_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'designer_artist_Customize_partial_designer_artist_related_post_title', 
	));

    $wp_customize->add_setting( 'designer_artist_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_related_post',array(
		'label' => esc_html__( 'Related Post','designer-artist' ),
		'section' => 'designer_artist_related_posts_settings'
    )));

    $wp_customize->add_setting('designer_artist_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('designer_artist_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','designer-artist'),
		'input_attrs' => array(
        'placeholder' => esc_html__( 'Related Post', 'designer-artist' ),
        ),
		'section'=> 'designer_artist_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('designer_artist_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'designer_artist_sanitize_number_absint'
	));
	$wp_customize->add_control('designer_artist_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','designer-artist'),
		'input_attrs' => array(
        'placeholder' => esc_html__( '3', 'designer-artist' ),
        ),
		'section'=> 'designer_artist_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'designer_artist_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'designer-artist' ),
		'panel' => 'designer_artist_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'designer_artist_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
  $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_single_post_breadcrumb',array(
		'label' => esc_html__( 'Single Post Breadcrumb','designer-artist' ),
		'section' => 'designer_artist_single_blog_settings'
  )));

  // Single Posts Category
  $wp_customize->add_setting( 'designer_artist_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
  $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_single_post_category',array(
		'label' => esc_html__( 'Single Post Category','designer-artist' ),
		'section' => 'designer_artist_single_blog_settings'
   )));

  // Grid layout setting
	$wp_customize->add_section( 'designer_artist_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'designer-artist' ),
		'panel' => 'designer_artist_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'designer_artist_grid_postdate',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
  $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_grid_postdate',array(
      'label' => esc_html__( 'Post Date','designer-artist' ),
      'section' => 'designer_artist_grid_layout_settings'
   )));

  $wp_customize->add_setting( 'designer_artist_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
  $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_grid_author',array(
		'label' => esc_html__( 'Author','designer-artist' ),
		'section' => 'designer_artist_grid_layout_settings'
  )));

  $wp_customize->add_setting( 'designer_artist_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
  ) );
  $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_grid_comments',array(
		'label' => esc_html__( 'Comments','designer-artist' ),
		'section' => 'designer_artist_grid_layout_settings'
  )));

	//Others Settings
	$wp_customize->add_panel( 'designer_artist_others_panel', array(
		'title' => esc_html__( 'Others Settings', 'designer-artist' ),
		'panel' => 'designer_artist_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'designer_artist_left_right', array(
    	'title' => esc_html__('General Settings', 'designer-artist'),
		'panel' => 'designer_artist_others_panel'
	) );

	$wp_customize->add_setting('designer_artist_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control(new Designer_Artist_Image_Radio_Control($wp_customize, 'designer_artist_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','designer-artist'),
        'description' => esc_html__('Here you can change the width layout of Website.','designer-artist'),
        'section' => 'designer_artist_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('designer_artist_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control('designer_artist_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','designer-artist'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','designer-artist'),
        'section' => 'designer_artist_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','designer-artist'),
            'Right Sidebar' => esc_html__('Right Sidebar','designer-artist'),
            'One Column' => esc_html__('One Column','designer-artist'),
            'Grid Layout' => esc_html__('Grid Layout','designer-artist')
        ),
	) );

	$wp_customize->add_setting('designer_artist_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control('designer_artist_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','designer-artist'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','designer-artist'),
        'section' => 'designer_artist_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','designer-artist'),
            'Right_Sidebar' => esc_html__('Right Sidebar','designer-artist'),
            'One_Column' => esc_html__('One Column','designer-artist')
        ),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('designer_artist_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','designer-artist'),
		'panel' => 'designer_artist_others_panel',
	));

	$wp_customize->add_setting('designer_artist_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'designer_artist_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'designer-artist'),
		'section'  => 'designer_artist_responsive_media',
	)));

    $wp_customize->add_setting( 'designer_artist_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'designer_artist_switch_sanitization'
    ));  
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','designer-artist' ),
      	'section' => 'designer_artist_responsive_media'
    )));

    $wp_customize->add_setting( 'designer_artist_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ));  
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','designer-artist' ),
      	'section' => 'designer_artist_responsive_media'
    )));

    $wp_customize->add_setting( 'designer_artist_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ));  
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','designer-artist' ),
      	'section' => 'designer_artist_responsive_media'
    )));

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'designer_artist_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'designer_artist_customize_partial_designer_artist_woocommerce_shop_page_sidebar', ) );

  // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'designer_artist_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
  $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','designer-artist' ),
		'section' => 'designer_artist_left_right'
  )));

  $wp_customize->add_setting('designer_artist_shop_page_layout',array(
      'default' => 'Right Sidebar',
      'sanitize_callback' => 'designer_artist_sanitize_choices'
	));
	$wp_customize->add_control('designer_artist_shop_page_layout',array(
      'type' => 'select',
      'label' => __('Shop Page Sidebar Layout','designer-artist'),
      'section' => 'designer_artist_left_right',
      'choices' => array(
          'Left Sidebar' => __('Left Sidebar','designer-artist'),
          'Right Sidebar' => __('Right Sidebar','designer-artist'),
        ),
	) );

  // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'designer_artist_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'designer_artist_customize_partial_designer_artist_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'designer_artist_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','designer-artist' ),
		'section' => 'designer_artist_left_right'
    )));

    $wp_customize->add_setting( 'designer_artist_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_single_page_breadcrumb',array(
		'label' => esc_html__( 'Single Page Breadcrumb','designer-artist' ),
		'section' => 'designer_artist_left_right'
    )));

    //Wow Animation
	$wp_customize->add_setting( 'designer_artist_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'designer_artist_switch_sanitization'
    ));
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_animation',array(
        'label' => esc_html__( 'Animations','designer-artist' ),
        'description' => __('Here you can disable overall site animation effect','designer-artist'),
        'section' => 'designer_artist_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'designer_artist_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'designer_artist_switch_sanitization'
    ) );
    $wp_customize->add_control( new Designer_Artist_Toggle_Switch_Custom_Control( $wp_customize, 'designer_artist_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','designer-artist' ),
        'section' => 'designer_artist_left_right'
    )));

	$wp_customize->add_setting('designer_artist_preloader_bg_color', array(
		'default'           => '#f8c273',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'designer_artist_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'designer-artist'),
		'section'  => 'designer_artist_left_right',
	)));

	$wp_customize->add_setting('designer_artist_preloader_border_color', array(
		'default'           => '#e04539',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'designer_artist_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'designer-artist'),
		'section'  => 'designer_artist_left_right',
	)));

}

add_action( 'customize_register', 'designer_artist_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Designer_Artist_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Designer_Artist_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Designer_Artist_Customize_Section_Pro( $manager,'designer_artist_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Designer Artist PRO', 'designer-artist' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'designer-artist' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/designer-portfolio-wordpress-theme/'),
		) )	);
	}


	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'designer-artist-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'designer-artist-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Designer_Artist_Customize::get_instance();