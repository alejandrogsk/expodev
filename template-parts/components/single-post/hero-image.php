<?php
/**
 * Template for the main image in the post page
 * 
 * @package Expodev
*/
$the_post_id   = get_the_ID();

$my_post_thumbnail = get_the_post_thumbnail( $the_post_id ); 


//first check if thumbnail photo exists
if($my_post_thumbnail){
    the_post_custom_thumbnail(
        $the_post_id,
        'post-page-custom-thumbnail',
        [
            'class' => 'thumbnail-image-post-page'
        ]
    );
}
?>
