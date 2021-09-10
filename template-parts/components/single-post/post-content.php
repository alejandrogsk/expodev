<?php
/**
 * This file include all the files for the single blog post
 * 
 * @package Expodev
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
    <?php   
        get_template_part( 'template-parts/components/single-post/hero-image' );
        get_template_part( 'template-parts/components/single-post/post-main-content' );
        get_template_part( 'template-parts/components/single-post/post-footer' );
    ?>
</div>