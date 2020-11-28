<?php
add_action( 'xbox_init', 'meta_video');
function meta_video(){

$video_post = array(
	'id' => 'video_post',//Must be unique for each metabox that is created with xbox.
	'title' => 'Video Post',
	'post_types' => array('post'),
);

$video = xbox_new_metabox($video_post);

$video->add_field(array(
    'id' => 'video',
    'name' => __( 'Gunakan Template Video', 'theme_admin' ),
    'type' => 'radio',
    'default' => 'tidak',
    'items' => array(
        'ya' => 'Iya',
        'tidak' => 'Tidak'
    ),
));

$video->add_field(array(
	'id' => 'thumbnail_video',
	'name' => __( 'Thumbnail Video', 'theme_admin' ),
    'type' => 'file',
    'options' => array(
        'show_name' => true,
        'show_if' => array( 'video', 'ya' )
    ),
));

$video->add_field(array(
	'id' => 'post_video',
	'name' => __( 'Embed Video', 'theme_admin' ),
    'type' => 'text',
    'options' => array(
        'show_name' => true,
        'show_if' => array( 'video', 'ya' )
    ),
	'desc' => 'Gunakan Youtube ID Ex:  CQgD9EeA-fU',
));


}
