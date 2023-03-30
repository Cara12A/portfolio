<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function professional_cv_resume_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'professional-cv-resume' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	professional_cv_resume_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'professional_cv_resume_register_recommended_plugins' );