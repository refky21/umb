<?php

add_filter( 'manage_edit-partner_columns', 'edit_partner_columns' );
function edit_partner_columns( $columns ) {
	$columns = array(
		'cb' 		=> '<input type="checkbox" />',
		'title' 	=> __( 'Title', 'theme_admin' ),
        'image'    	=> __( 'Icon', 'theme_admin' ),
        'featured'  => __( 'Featured', 'theme_admin' )
	);

	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_partner_columns' );
function manage_partner_columns( $column ) {
	global $post;
	$image = theme_get_image(get_post_meta( $post->ID, 'partner_logo', true ),'35','35',true);
    $category = wp_get_post_terms($post->ID, 'partner_category', array("fields" => "names"));
	
	if ( $post->post_type == "partner" ) {
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
				echo get_post_meta( $post->ID, 'partner_featured', true ) == 'yes' ? __('Featured', 'umy') : __('', 'umy');
				break;
		}
	}
}

function title_save_pre_partner($title) {
	if ( isset( $_REQUEST['post_type'] ) && isset( $_REQUEST['action'] ) ) {
		if ( $_REQUEST['post_type'] == 'partner' && $_REQUEST['action'] == 'editpost' ) {
			$partner_name = $_POST['partner']['name'];
			return $partner_name;
		}
	}
	return $title;
}
//add_filter ('title_save_pre', 'title_save_pre_partner');

?>