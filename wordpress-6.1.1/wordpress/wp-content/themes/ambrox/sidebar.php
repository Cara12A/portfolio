<?php

/**
 * @Packge     : Ambrox
 * @Version    : 1.0
 * @Author     : Ambrox
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */


// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit;
}

if ( ! is_active_sidebar( 'ambrox-blog-sidebar' ) ) {
    return;
}
?>

<div class="sidebar col-lg-4 col-md-12">
	<aside>
    <?php dynamic_sidebar( 'ambrox-blog-sidebar' ); ?>
</aside>
</div>