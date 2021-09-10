<?php
/**
 * Register meta boxes
 * 
 * @package Expodev
 */
namespace EXPODEV_THEME\Inc;

use EXPODEV_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
        */
        add_action( 'add_meta_boxes', [ $this, 'add_custom_meta_box' ] );
        add_action( 'save_post', [ $this, 'save_post_meta_data' ] );
    }

    //Create the meta box
    public function add_custom_meta_box($post) {
        $screens = [ 'post' ];

        foreach ( $screens as $screen ) {
            add_meta_box(
                'hide-page-title',          // Unique ID
                __( 'Hide page title', 'expodev' ), // Box title
                [ $this, 'custom_meta_box_html' ],   // Content callback, must be of type callable
                $screen,                  // Post type
                'side'
            );
        }
    }

    //Add the html for the metabox
    function custom_meta_box_html( $post ) {
        $value = get_post_meta( $post->ID, '_hide_page_title', true );

        /**
         * Using wp nonce for verification
        */
        wp_nonce_field( plugin_basename(__FILE__), 'hide_text_meta_box_nonce_name');

        ?>
        <label for="expodev_hide_title_field"><?php esc_html_e( 'Hide the page title', 'expodev' ); ?></label>
        <select name="expodev_hide_title_field" id="expodev_hide_title_field" class="postbox">
            <option value=""><?php esc_html_e( 'Select', 'expodev' ); ?></option>
            <option value="yes" <?php selected( $value, "yes" ); ?>>
                <?php esc_html_e( 'yes', 'expodev' ); ?>
            </option>
            <option value="no" <?php selected( $value, "no" ); ?>>
                <?php esc_html_e( 'no', 'expodev' ); ?>
            </option>
        </select>
        <?php
    }

    //Save the data for metabox
    function save_post_meta_data( $post_id ) {
        /**
         * When the post is saved or updated we get $_POST available
         * Check if the current user is authorized
        */

        if( !current_user_can( 'edit_post', $post_id ) ) {
            return;
        }

        /**
         * Check if the nonce value we recived is the same we created
        */
        if( ! isset( $_POST[ 'hide_text_meta_box_nonce_name' ] ) || 
            ! wp_verify_nonce( $_POST[ 'hide_text_meta_box_nonce_name' ], plugin_basename(__FILE__) )    
        ) {
            return;
        }

        if ( array_key_exists( 'expodev_hide_title_field', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['expodev_hide_title_field']
            );
        }
    }
    

}