<?php
/**
 * @Packge     : Ambrox
 * @Version    : 1.0
 * @Author     : Ambrox
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */

// Block direct access
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'AMBROX_DIR_URI' ) ) {
    define('AMBROX_DIR_URI', get_parent_theme_file_uri().'/' );
}

// Assist URI
if ( ! defined( 'AMBROX_DIR_ASSIST_URI' ) ) {
    define( 'AMBROX_DIR_ASSIST_URI', get_theme_file_uri('/assets/') );
}


// Css File URI
if ( ! defined( 'AMBROX_DIR_CSS_URI' ) ) {
    define( 'AMBROX_DIR_CSS_URI', get_theme_file_uri('/assets/css/') );
}

// Skin Css File
if ( ! defined( 'AMBROX_DIR_SKIN_CSS_URI' ) ) {
    define( 'AMBROX_DIR_SKIN_CSS_URI', get_theme_file_uri('/assets/css/skins/') );
}


// Js File URI
if (!defined('AMBROX_DIR_JS_URI')) {
    define('AMBROX_DIR_JS_URI', get_theme_file_uri('/assets/js/'));
}


// External PLugin File URI
if (!defined('AMBROX_DIR_PLUGIN_URI')) {
    define('AMBROX_DIR_PLUGIN_URI', get_theme_file_uri( '/assets/plugins/'));
}

// Base Directory
if (!defined('AMBROX_DIR_PATH')) {
    define('AMBROX_DIR_PATH', get_parent_theme_file_path() . '/');
}

//Inc Folder Directory
if (!defined('AMBROX_DIR_PATH_INC')) {
    define('AMBROX_DIR_PATH_INC', AMBROX_DIR_PATH . 'inc/');
}

//AMBROX framework Folder Directory
if (!defined('AMBROX_DIR_PATH_FRAM')) {
    define('AMBROX_DIR_PATH_FRAM', AMBROX_DIR_PATH_INC . 'ambrox-framework/');
}

//Classes Folder Directory
if (!defined('AMBROX_DIR_PATH_CLASSES')) {
    define('AMBROX_DIR_PATH_CLASSES', AMBROX_DIR_PATH_INC . 'classes/');
}

//Hooks Folder Directory
if (!defined('AMBROX_DIR_PATH_HOOKS')) {
    define('AMBROX_DIR_PATH_HOOKS', AMBROX_DIR_PATH_INC . 'hooks/');
}

//Demo Data Folder Directory Path
if( !defined( 'AMBROX_DEMO_DIR_PATH' ) ){
    define( 'AMBROX_DEMO_DIR_PATH', AMBROX_DIR_PATH_INC.'demo-data/' );
}
    
//Demo Data Folder Directory URI
if( !defined( 'AMBROX_DEMO_DIR_URI' ) ){
    define( 'AMBROX_DEMO_DIR_URI', AMBROX_DIR_URI.'inc/demo-data/' );
}