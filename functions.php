<?php
/**
 * Theme functions
 * 
 * @package Expodev
*/

if( !defined( 'EXPODEV_DIR_PATH' ) ) {
    define( 'EXPODEV_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( !defined( 'EXPODEV_DIR_URI')) {
    define( 'EXPODEV_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

if ( !defined( 'EXPODEV_BUILD_URI')) {
    define( 'EXPODEV_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' );
}

if ( !defined( 'EXPODEV_BUILD_PATH')) {
    define( 'EXPODEV_BUILD_PATH', untrailingslashit( get_template_directory() ) . '/assets/build' );
}

//Javascript
if ( !defined( 'EXPODEV_BUILD_JS_URI')) {
    define( 'EXPODEV_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' );
}

if ( !defined( 'EXPODEV_BUILD_JS_DIR_PATH')) {
    define( 'EXPODEV_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' );
}


//Images
if ( !defined( 'EXPODEV_BUILD_IMG_URI')) {
    define( 'EXPODEV_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/src/img' );
}


//Css
if ( !defined( 'EXPODEV_BUILD_CSS_URI')) {
    define( 'EXPODEV_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' );
}

if ( !defined( 'EXPODEV_BUILD_CSS_DIR_PATH')) {
    define( 'EXPODEV_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' );
}


//excevute the auto loaders
require_once EXPODEV_DIR_PATH .'/inc/helpers/autoloader.php';
require_once EXPODEV_DIR_PATH .'/inc/helpers/template-tags.php';

//exceute the first singleton instance
function expodev_get_theme_instance() {
    \EXPODEV_THEME\Inc\EXPODEV_THEME::get_instance();
}
expodev_get_theme_instance();

?>
