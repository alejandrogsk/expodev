<?php
/**
 * Template fron entry footer
 * 
 * @package Expodev
 */

$the_post_id = get_the_ID();
$article_terms = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag'] );

if ( empty( $article_terms )  || !is_array( $article_terms ) ){
    return;
}
?>


<div class="my-5">
    <span class="">
        <?php echo __( 'Maybe you are interested - esto esta en post-footer.php', 'exodev' ) ?>
    </span>

    <?php 
        foreach ( $article_terms as $key => $article_term ) {
            ?>

            <button class="btn border border-secondary">
                <a 
                href="<?php echo esc_url( get_term_link( $article_term )); ?>" 
                class="text-black-50">
                    <?php esc_html_e( $article_term->name )?>
                </a>
            </button>
            <?php
        }
    ?>
</div>