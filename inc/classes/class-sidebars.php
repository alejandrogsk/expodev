<?php
/**
 * Register mulitple sidebars
 * 
 * @package Expodev
 */
namespace EXPODEV_THEME\Inc;

use EXPODEV_THEME\Inc\Traits\Singleton;

class Sidebars {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
        add_action( 'widgets_init', [ $this, 'register_clock_widget' ] );
    }

    public function register_sidebars() {
        register_sidebar( [
            'name'          => __( 'Primary Sidebar', 'expodev' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'This is my first sidebar', 'expodev' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );

        register_sidebar( [
            'name'          => __( 'Secondary Sidebar', 'expodev' ),
            'id'            => 'sidebar-2',
            'description'   => __( 'This is my second widget', 'expodev' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ] );
    }


    public function register_clock_widget() {
        register_widget( 'EXPODEV_THEME\Inc\Clock_Widget' );
    }
}