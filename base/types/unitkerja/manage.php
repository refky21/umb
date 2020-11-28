<?php

add_filter( 'manage_edit-unit_kerja_columns', 'edit_unit_kerja_columns' );
function edit_unit_kerja_columns( $columns ) {
	// $columns = array(
	// 	'cb' 		=> '<input type="checkbox" />',
	// 	'title' 	=> __( 'Title', 'theme_admin' ),
 //        'image'    	=> __( 'Icon', 'theme_admin' ),
 //        'featured'  => __( 'Featured', 'theme_admin' )
	// );

	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_unit_kerja_columns' );
function manage_unit_kerja_columns( $column ) {
	global $post;
	$image = theme_get_image(get_post_meta( $post->ID, 'unit_kerja_logo', true ),'35','35',true);
    $category = wp_get_post_terms($post->ID, 'unit_kerja_category', array("fields" => "names"));
	
	if ( $post->post_type == "unit_kerja" ) {
		switch( $column ) {

			case 'image':
				if( $image != '' ) {
					echo '<img src="' .$image. '" />';
				}
				break;
			case 'category':
				echo implode( ', ', $category );
				break;
			case 'featured':
				echo get_post_meta( $post->ID, 'unit_kerja_featured', true ) == 'yes' ? __('Featured', 'umy') : __('', 'umy');
				break;
		}
	}
}

function title_save_pre_unit_kerja($title) {
	if ( isset( $_REQUEST['post_type'] ) && isset( $_REQUEST['action'] ) ) {
		if ( $_REQUEST['post_type'] == 'unit_kerja' && $_REQUEST['action'] == 'editpost' ) {
			$unit_kerja_name = $_POST['unit_kerja']['name'];
			return $event_name;
		}
	}
	return $title;
}
//add_filter ('title_save_pre', 'title_save_pre_event');

?>