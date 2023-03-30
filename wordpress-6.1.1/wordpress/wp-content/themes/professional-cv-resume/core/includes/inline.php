<?php


$professional_cv_resume_custom_css = '';

	/*---------------------------text-transform-------------------*/

	$professional_cv_resume_text_transform = get_theme_mod( 'menu_text_transform_professional_cv_resume','CAPITALISE');
    if($professional_cv_resume_text_transform == 'CAPITALISE'){

		$professional_cv_resume_custom_css .='#main-menu ul li a{';

			$professional_cv_resume_custom_css .='text-transform: capitalize ; font-size: 15px;';

		$professional_cv_resume_custom_css .='}';

	}else if($professional_cv_resume_text_transform == 'UPPERCASE'){

		$professional_cv_resume_custom_css .='#main-menu ul li a{';

			$professional_cv_resume_custom_css .='text-transform: uppercase ; font-size: 15px;';

		$professional_cv_resume_custom_css .='}';

	}else if($professional_cv_resume_text_transform == 'LOWERCASE'){

		$professional_cv_resume_custom_css .='#main-menu ul li a{';

			$professional_cv_resume_custom_css .='text-transform: lowercase ; font-size: 15px;';

		$professional_cv_resume_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

$professional_cv_resume_container_width = get_theme_mod('professional_cv_resume_container_width');

		$professional_cv_resume_custom_css .='body{';

			$professional_cv_resume_custom_css .='width: '.esc_attr($professional_cv_resume_container_width).'%; margin: auto';

		$professional_cv_resume_custom_css .='}';


	/*---------------------------Slider-content-alignment-------------------*/

$professional_cv_resume_slider_content_alignment = get_theme_mod( 'professional_cv_resume_slider_content_alignment','LEFT-ALIGN');

 if($professional_cv_resume_slider_content_alignment == 'LEFT-ALIGN'){

		$professional_cv_resume_custom_css .='.blog_box{';

			$professional_cv_resume_custom_css .='text-align:left;';

		$professional_cv_resume_custom_css .='}';


	}else if($professional_cv_resume_slider_content_alignment == 'CENTER-ALIGN'){

		$professional_cv_resume_custom_css .='.blog_box{';

			$professional_cv_resume_custom_css .='text-align:center;';

		$professional_cv_resume_custom_css .='}';


	}else if($professional_cv_resume_slider_content_alignment == 'RIGHT-ALIGN'){

		$professional_cv_resume_custom_css .='.blog_box{';

			$professional_cv_resume_custom_css .='text-align:right;';

		$professional_cv_resume_custom_css .='}';

	}
