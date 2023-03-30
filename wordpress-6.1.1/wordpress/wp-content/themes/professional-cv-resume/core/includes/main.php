<?php

add_action( 'admin_menu', 'professional_cv_resume_getting_started' );
function professional_cv_resume_getting_started() {
	add_theme_page( esc_html__('Get Started', 'professional-cv-resume'), esc_html__('Get Started', 'professional-cv-resume'), 'edit_theme_options', 'professional-cv-resume-guide-page', 'professional_cv_resume_test_guide');
}

function professional_cv_resume_admin_enqueue_scripts() {
	wp_enqueue_style( 'professional-cv-resume-admin-style',get_template_directory_uri().'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'professional_cv_resume_admin_enqueue_scripts' );

if ( ! defined( 'PROFESSIONAL_CV_RESUME_DOCS_FREE' ) ) {
define('PROFESSIONAL_CV_RESUME_DOCS_FREE',__('https://www.misbahwp.com/docs/professional-cv-resume-free-docs/','professional-cv-resume'));
}
if ( ! defined( 'PROFESSIONAL_CV_RESUME_DOCS_PRO' ) ) {
define('PROFESSIONAL_CV_RESUME_DOCS_PRO',__('https://www.misbahwp.com/docs/professional-cv-resume-pro-docs','professional-cv-resume'));
}
if ( ! defined( 'PROFESSIONAL_CV_RESUME_BUY_NOW' ) ) {
define('PROFESSIONAL_CV_RESUME_BUY_NOW',__('https://www.misbahwp.com/themes/resume-cv-wordpress-theme/','professional-cv-resume'));
}
if ( ! defined( 'PROFESSIONAL_CV_RESUME_SUPPORT_FREE' ) ) {
define('PROFESSIONAL_CV_RESUME_SUPPORT_FREE',__('https://wordpress.org/support/theme/professional-cv-resume','professional-cv-resume'));
}
if ( ! defined( 'PROFESSIONAL_CV_RESUME_REVIEW_FREE' ) ) {
define('PROFESSIONAL_CV_RESUME_REVIEW_FREE',__('https://wordpress.org/support/theme/professional-cv-resume/reviews/#new-post','professional-cv-resume'));
}
if ( ! defined( 'PROFESSIONAL_CV_RESUME_DEMO_PRO' ) ) {
define('PROFESSIONAL_CV_RESUME_DEMO_PRO',__('https://www.misbahwp.com/demo/professional-cv-resume/','professional-cv-resume'));
}

function professional_cv_resume_test_guide() { ?>
	<?php $professional_cv_resume_theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( PROFESSIONAL_CV_RESUME_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'professional-cv-resume' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'professional-cv-resume' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( PROFESSIONAL_CV_RESUME_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'professional-cv-resume' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( PROFESSIONAL_CV_RESUME_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'professional-cv-resume' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','professional-cv-resume'); ?><?php echo esc_html( $professional_cv_resume_theme ); ?>  <span><?php esc_html_e('Version: ', 'professional-cv-resume'); ?><?php echo esc_html($professional_cv_resume_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width:100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div id="description-inside">
					<?php
						$professional_cv_resume_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $professional_cv_resume_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postbox donate">
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','professional-cv-resume'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','professional-cv-resume'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','professional-cv-resume'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','professional-cv-resume'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'professional-cv-resume' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','professional-cv-resume'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( PROFESSIONAL_CV_RESUME_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'professional-cv-resume' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( PROFESSIONAL_CV_RESUME_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'professional-cv-resume' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( PROFESSIONAL_CV_RESUME_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'professional-cv-resume' ) ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>
