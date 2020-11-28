<?php
add_action( 'xbox_init', 'meta_slide');
function meta_slide(){

$slider_post = array(
	'id' => 'slider_post',//Must be unique for each metabox that is created with xbox.
	'title' => 'Slider Post',
	'post_types' => array('slider'),
);

$slider = xbox_new_metabox($slider_post);


$slider->add_field(array(
	'id' => 'gambar_slide',
	'name' => __( 'Gambar Slide', 'theme_admin' ),
	'type' => 'file',
	'desc' => 'Ukuran 1920 x 560',
));

$slider->add_field(array(
	'id' => 'slide_link',
	'name' => __( 'Link', 'theme_admin' ),
	'type' => 'text',
	'desc' => 'Gunakan http:// or https://',
));


}
