<?php
/**
 * @Packge     : Ambrox
 * @Version    : 1.0
 * @Author     : Ambrox
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Include File
 *
 */

// Constants
require_once get_parent_theme_file_path() . '/inc/ambrox-constants.php';

//theme setup
require_once AMBROX_DIR_PATH_INC . 'theme-setup.php';

//essential scripts
require_once AMBROX_DIR_PATH_INC . 'essential-scripts.php';

//NavWalker
require_once AMBROX_DIR_PATH_INC . 'ambrox-navwalker.php';

// plugin activation
require_once AMBROX_DIR_PATH_FRAM . 'plugins-activation/ambrox-active-plugins.php';

// meta options
require_once AMBROX_DIR_PATH_FRAM . 'ambrox-meta/ambrox-config.php';

// page breadcrumbs
require_once AMBROX_DIR_PATH_INC . 'ambrox-breadcrumbs.php';

// sidebar register
require_once AMBROX_DIR_PATH_INC . 'ambrox-widgets-reg.php';

//essential functions
require_once AMBROX_DIR_PATH_INC . 'ambrox-functions.php';

// theme dynamic css
require_once AMBROX_DIR_PATH_INC . 'ambrox-commoncss.php';

// helper function
require_once AMBROX_DIR_PATH_INC . 'wp-html-helper.php';

// Demo Data
require_once AMBROX_DEMO_DIR_PATH . 'demo-import.php';

// ambrox options
require_once AMBROX_DIR_PATH_FRAM . 'ambrox-options/ambrox-options.php';

// hooks
require_once AMBROX_DIR_PATH_HOOKS . 'hooks.php';

// hooks funtion
require_once AMBROX_DIR_PATH_HOOKS . 'hooks-functions.php';