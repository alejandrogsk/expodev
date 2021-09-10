<?php
/**
 * Template for entry content
 * To be used inside Wordpres the loop
 * 
 * @package expodev
 */

?>
<div>
    <?php 


    if( is_single() ) {
        the_content(
            sprintf(
                wp_kses(
                    __( 'Continue reading %s <span>&rarr</span>', 'expodev'  ),
                    [
                        'span'=> []
                    ]
                    ),
                    the_title('<span>', '</span>', false)
            )
        );
    } else {
        expodev_the_excerpt(150);
        expodev_excerpt_more();
    }
    ?>
</div>