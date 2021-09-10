<?php
/**
 * Register menus
 * 
 * @package Expodev
 */
namespace EXPODEV_THEME\Inc;

use EXPODEV_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action( 'init', [ $this, 'register_my_menus' ] );
    }

    public function register_my_menus() {
        register_nav_menus([
            'expodev-header-menu' => esc_html__( 'Header Menu', 'expodev'),
            'expodev-footer-menu' => esc_html__( 'Footer Menu', 'expodev')
        ]);
    }


    public function get_menu_id( $location ){
        //Gat all the locations
        $locations = get_nav_menu_locations();
  
        //Get the id for the location that i need
        $menu_id = $locations[$location];   
    
        return ! empty( $menu_id ) ? $menu_id : '';
    }

    public function get_child_menu_items( $menu_array, $parent_id) {
        
        $child_menus = [];

        if( ! empty( $menu_array) && is_array( $menu_array ) ) {
            foreach( $menu_array as $menu ) {
                if( intval( $menu->menu_item_parent ) === $parent_id ) {
                    array_push( $child_menus, $menu);
                }
            }
        }

        return $child_menus;
    }

}