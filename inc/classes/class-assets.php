<?php

/**
 * Enque theme assets
 * 
 * @package Expodev
 */

namespace EXPODEV_THEME\Inc;

use EXPODEV_THEME\Inc\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /**
         * Actions
         */
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        wp_register_style('bootstrap-styles', EXPODEV_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');
        wp_register_style('stylesheet', EXPODEV_BUILD_CSS_URI . '/main.css', [], filemtime(EXPODEV_BUILD_CSS_DIR_PATH . '/style.css'), 'all');


        wp_enqueue_style('bootstrap-styles');
        wp_enqueue_style('stylesheet');
    }

    public function register_scripts()
    {
        wp_register_script('bootstrap-js', EXPODEV_DIR_URI . '/assets/src/library/js/bootstrap.min.js', [], true);
        wp_register_script('main-js', EXPODEV_BUILD_JS_URI . '/main.js', [], filemtime(EXPODEV_BUILD_JS_DIR_PATH . '/main.js'), true);

        wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('main-js');
    }
}
