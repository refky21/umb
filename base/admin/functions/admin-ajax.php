<?php

add_action( 'wp_ajax_theme_ajax_action', 'theme_ajax_action' );
function theme_ajax_action() {
	$method = $_REQUEST['method'];
	call_user_func($method);
	die();
}

function save_option() {
	parse_str( stripslashes( $_REQUEST['options'] ), $options);

	// Flush Permarlink
	flush_rewrite_rules();
	
	// Import/Export Handle
	/*if( $options['advance']['theme_import_option'] != '' ) {
		$options = unserialize( base64_decode( $options['advance']['theme_import_option'] ) );
	}
	$options['advance']['theme_export_option'] = '';
	$options['advance']['theme_import_option'] = '';*/
	
	// Update Blog Page & Home Page
	/*if( $options['home']['home_type'] == 'page' ) {
		update_option( 'show_on_front', 'page' );
		if( $options['blog']['blog_page'] != 0 ) {
			update_option( 'page_for_posts', $options['blog']['blog_page'] );
		} else {
			delete_option( 'page_for_posts' );
		}
		if( $options['home']['home_page'] != 0 ) {
			update_option( 'page_on_front', $options['home']['home_page'] );
		} else {
			delete_option( 'page_on_front' );
		}
	} else if ( $options['home']['home_type'] == 'blog' ) {
		update_option( 'show_on_front', 'posts' );
		update_option( 'page_for_posts', '' );
		update_option( 'page_on_front', '' );
	} else if ( $options['home']['home_type'] == 'app' ) {
		update_option( 'show_on_front', 'page' );
		
		if( $options['blog']['blog_page'] == '0' ) {
			update_option( 'page_for_posts', '0' );
		} else {
			update_option( 'page_for_posts', $options['blog']['blog_page'] );
		} 
		
		update_option( 'page_on_front', '0' );
	}*/	
	
	update_option(THEME_SLUG . '_options', $options);
	
	// Return result
	$result = array('result' => 'ok', 'encodedOptions' => base64_encode( serialize( $options ) ));
	echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
}

function remove_meta() {
	$meta_tag = $_REQUEST['meta_tag'];
	$meta_index = $_REQUEST['meta_index'];
	$post_id = $_REQUEST['post_id'];
	
	$meta = get_post_meta( $post_id, $meta_tag, true);
	unset($meta[$meta_index]);
	update_post_meta($post_id, $meta_tag, $meta);
	
	// Return result
	$result = array('result' => 'ok');
	echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
}

function update_post_order() {
	
	global $wpdb;
	
	parse_str($_POST['post_order'], $data);
	
	if (is_array($data))
	foreach( $data['post'] as $position => $id ) 
	{
	    $wpdb->update( $wpdb->posts, array('menu_order' => $position), array('ID' => $id) );
	}
    
    // Return result
    $result = array('result' => 'ok', 'data' => $data);
    echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
}

function get_attachment_id_by_url() {
	$url = $_REQUEST['url'];

	global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$url'";
    $id = $wpdb->get_var($query);

    if($id != null) {
    	$result = array('result' => 'ok', 'data' => $id);
    } else {
    	$result = array('result' => 'ok', 'data' => $url);
    }

    // Return result
    echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
}

function get_resized_image_by_id() {
	$id = $_REQUEST['id'];
	$width = $_REQUEST['width'];
	$height = $_REQUEST['height'];
	
	$result = array('result' => 'ok', 'data' => theme_get_image($id, $width, $height, true));
	echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
}

if (!function_exists('get_city_by_country_id')) {
	function get_city_by_country_id() {
		$parent_id = $_REQUEST['country_id'];

		global $wpdb;
		$query = 'SELECT * FROM '.$wpdb->terms.' AS t INNER JOIN '.$wpdb->term_taxonomy.' AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy =  "event_location" AND tt.parent = '.$parent_id.' ORDER BY  t.slug ASC LIMIT 0 , 30';
		$city = $wpdb->get_results($query, ARRAY_A);

		// Return result
	    $result = array('result' => 'ok', 'data' => $city);
		echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);

		die();
	}
	add_action( 'wp_ajax_get_city_by_country_id', 'get_city_by_country_id' );
	add_action( 'wp_ajax_nopriv_get_city_by_country_id', 'get_city_by_country_id' );
}