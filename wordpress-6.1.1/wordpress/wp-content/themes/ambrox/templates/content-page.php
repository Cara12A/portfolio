<?php
/**
 * @Packge     : Ambrox
 * @Version    : 1.0
 * @Author     : Ambrox
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if (!defined('ABSPATH')) {
    exit;
}
?>
<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 

	/**
	 * page content 
	 * Comments Template
	 * @Hook  ambrox_page_content
	 *
	 * @Hooked ambrox_page_content_cb
	 * 
	 *
	 */
	do_action( 'ambrox_page_content' );
	?>
</div>