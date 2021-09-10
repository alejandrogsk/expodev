<?php
/**
 * Content template
 * 
 * This is used inside index.php for the blog post grid
 * 
 * @package Expodev
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6 col-lg-4' ); ?>>
    <div class="card-box">
        <?php 
            get_template_part( 'template-parts/components/blog/entry-header' );
            get_template_part( 'template-parts/components/blog/entry-meta' );
            get_template_part( 'template-parts/components/blog/entry-content' );
            get_template_part( 'template-parts/components/blog/entry-footer' );
        
            
        ?>

        
    </div>
</article>