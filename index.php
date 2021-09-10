<?php

/**
 * Main template file.
 * 
 * In this case is the blog posts page because i'm not using home.php V27
 * 
 * @packege Expodev
 */
get_header();
?>
<div class="container">
    <div class="row">
    <?php
        if (have_posts()) :
            if( is_home() && !is_front_page() ) {
            ?>
                <header class="col-12">
                    <h1 class="mt-4 mb-4">
                        <?php single_post_title() ?>
                    </h1>
                </header>
            <?php
            }

            while (have_posts()) : the_post();
                get_template_part('template-parts/components/blog/content');
            endwhile;
            expodev_pagination();
        else:
            get_template_part( 'template-parts/components/content-none' );
        endif;
?>
    </div>
</div>

<?php get_footer();
