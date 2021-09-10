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
<div class="container my-5">
    <div class="row">
        <div class="col-12 col-sm-9">
            <?php
                if (have_posts()) :
                    if( is_home() && !is_front_page() ) {
                    ?>
                        <!-- <header class="col-12">
                            <h1 class="mt-4 mb-4">
                                <?php #single_post_title() ?>
                            </h1>
                        </header> -->
                    <?php
                    }

                    while (have_posts()) : the_post();
                        get_template_part('template-parts/components/single-post/post-content');
                    endwhile;

                else:
                    get_template_part( 'template-parts/components/content-none' );
                endif;
            ?>
        </div>

        <div class="col-12 col-sm-3">
            <?php get_sidebar(); ?>
        </div>

    </div>
</div>

<?php get_footer();
