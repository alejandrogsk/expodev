<?php
// Title
if ( is_single() || is_page() ) {
    printf(
        '<h1 class="text-dark %1$s">%1$s</h1>',
        wp_kses_post( get_the_title() )
    );
}

the_content();

//this is for pagination
wp_link_pages([
    'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'expodev'),
    'after' => '</div>',
])

?>