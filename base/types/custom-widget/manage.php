<?php

add_filter( 'manage_edit-custom_widget_columns', 'edit_custom_widget_columns' );
function edit_custom_widget_columns( $columns ) {
	$columns = array(
		'cb' 			=> '<input type="checkbox" />',
		'title' 		=> __('Name', 'theme_admin'),
		'short_desc' 	=> __('Description', 'theme_admin'),
	);

	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_widgets_columns' );
function manage_widgets_columns( $column ) {
	global $post;
	$name = get_post_meta($post->ID, 'widget_name', true);
	$short_desc = get_post_meta($post->ID, 'widget_short_desc', true);
	if ( $post->post_type == "custom_widget" ) {
		switch( $column ) {
			
			case 'short_desc':
				echo $short_desc;
				break;
			
			case 're-order':
				echo "<div class='reorder-handle'>handle</div><div class='ajax-load-icon'></div>";
				break;
		}
	}
}

function title_save_pre_custom_widget($title) {
	if ( isset( $_REQUEST['post_type'] ) && isset( $_REQUEST['action'] ) ) {
		if ( $_REQUEST['post_type'] == 'custom_widget' && $_REQUEST['action'] == 'editpost' ) {
			$sidebar_name = $_POST['widget']['name'];
			return $sidebar_name;
		}
	}
	return $title;
}
add_filter ('title_save_pre', 'title_save_pre_custom_widget');

?>