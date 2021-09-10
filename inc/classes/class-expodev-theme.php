<?php
/**
 * Bootstraps the theme
 * 
 * @package Expodev
 */

namespace EXPODEV_THEME\Inc;

use EXPODEV_THEME\Inc\Traits\Singleton;

class EXPODEV_THEME {
    use Singleton;

    protected function __construct() {
        // load other classes
        Assets::get_instance();
        Menus::get_instance();
		Meta_Boxes::get_instance();
		Sidebars::get_instance();
        
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions
         */
        add_action("after_setup_theme", [ $this, "setup_theme"]);
    }

    public function setup_theme() {

        // This is for the <title></title>
        add_theme_support( 'title-tag' );

        // This is for the logo
        add_theme_support( 'custom-logo', [
            'height'               => 100,
            'width'                => 100,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true, 
        ]);

        // This is for a background banner image or color
        add_theme_support( 'custom-background', [
            'default-color' => 'fff',
            'default-image' => '',
        ]);

        // This is the descriptive image for posts
        add_theme_support( 'post-thumbnails' );
		
		/**
		 * Register image sizes.
		 * 
		 * V34
		*/
		add_image_size( 'featured-thumbnail', 416, 233, true); 
		
		add_image_size( 'post-page-custom-thumbnail', 1024, 720, true); 

        /*
         * Add theme support for selective refresh for widgets
		 * WordPress 4.5 includes a new Customizer framework called selective refresh
		 *
		 * Selective refresh is a hybrid preview mechanism that has the performance benefit of not having to refresh the entire preview window.
		 *
		 * @link https://make.wordpress.org/core/2016/03/22/implementing-selective-refresh-support-for-widgets/
		*/
        add_theme_support( 'customize_selective_refresh-widgets' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /**
		 * Switch default core markup for search form, comment form, comment-list, gallery, caption, script and style
		 * to output valid HTML5.
		 */
        add_theme_support( 'html5', [
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'style',
            'script' 
        ]);


        // Gutenberg theme support.

		/**
		 * Some blocks in Gutenberg like tables, quotes, separator benefit from structural styles (margin, padding, border etc…)
		 * They are applied visually only in the editor (back-end) but not on the front-end to avoid the risk of conflicts with the styles wanted in the theme.
		 * If you want to display them on front to have a base to work with, in this case, you can add support for wp-block-styles, as done below.
		 * @see Theme Styles.
		 * @link https://make.wordpress.org/core/2018/06/05/whats-new-in-gutenberg-5th-june/, https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles
		 */
		add_theme_support( 'wp-block-styles' );

		/**
		 * Some blocks such as the image block have the possibility to define
		 * a “wide” or “full” alignment by adding the corresponding classname
		 * to the block’s wrapper ( alignwide or alignfull ). A theme can opt-in for this feature by calling
		 * add_theme_support( 'align-wide' ), like we have done below.
		 *
		 * @see Wide Alignment
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#wide-alignment
		 */
		add_theme_support( 'align-wide' );

		/**
		 * Loads the editor styles in the Gutenberg editor.
		 *
		 * Editor Styles allow you to provide the CSS used by WordPress’ Visual Editor so that it can match the frontend styling.
		 * If we don't add this, the editor styles will only load in the classic editor ( tiny mice )
		 *
		 * @see https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
		 */
		add_theme_support( 'editor-styles' );
		/**
		 *
		 * Path to our custom editor style.
		 * It allows you to link a custom stylesheet file to the TinyMCE editor within the post edit screen.
		 *
		 * Since we are not passing any parameter to the function,
		 * it will by default, link the editor-style.css file located directly under the current theme directory.
		 * In our case since we are passing 'assets/build/css/editor.css' path it will use that.
		 * You can change the name of the file or path and replace the path here.
		 *
		 * @see add_editor_style(
		 * @link https://developer.wordpress.org/reference/functions/add_editor_style/
		 */
		add_editor_style( 'assets/build/css/editor.css' );


        // Remove the core block patterns
		remove_theme_support( 'core-block-patterns' );

		/**
		 * Set the maximum allowed width for any content in the theme,
		 * like oEmbeds and images added to posts
		 *
		 * @see Content Width
		 * @link https://codex.wordpress.org/Content_Width
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1240;
		}
    }
}