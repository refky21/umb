<?php
add_action( 'xbox_init', 'meta_unit_kerja');
function meta_unit_kerja(){
	$options = array(
		'id' => 'unit_kerja',//Must be unique for each metabox that is created with xbox.
		'title' => 'Unit Kerja Advanced',
		'post_types' => array('unit_kerja'),
	);
	$slider = xbox_new_metabox( $options );
	
	$slider->add_field(array(
		'id' => 'dokumen',
		'name' => __( 'File Dokumen', 'lp3m' ),
		'type' => 'file',
	));
}