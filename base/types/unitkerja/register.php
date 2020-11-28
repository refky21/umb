<?php

add_action('init','register_unit_kerja_post_type');
function register_unit_kerja_post_type() {
	register_post_type( 'unit_kerja',
		array(
			'labels' => array(
				'name' 					=> __('Unit Kerja', 'theme_admin' ),
				'singular_name' 		=> __('Unit Kerja', 'theme_admin' ),
				'add_new' 				=> __('Add New', 'theme_admin' ),
				'add_new_item' 			=> __('Add New Unit Kerja', 'theme_admin' ),
				'edit_item' 			=> __('Edit Unit Kerja', 'theme_admin' ),
				'new_item' 				=> __('New Unit Kerja', 'theme_admin' ),
				'view_item' 			=> __('View Unit Kerja', 'theme_admin' ),
				'search_items' 			=> __('Search Unit Kerja', 'theme_admin' ),
				'not_found' 			=> __('No Unit Kerja found', 'theme_admin' ),
				'not_found_in_trash' 	=> __('No Unit Kerja found in Trash', 'theme_admin' ), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 		=> __('Unit Kerja', 'theme_admin' ),
			'public' 				=> true,
			'exclude_from_search' 	=> false,
			'show_ui' 				=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,
			'rewrite' 				=> array( 'with_front' => false, 'slug' => '/unit_kerja' ),
			'query_var' 			=> false,
			'show_in_nav_menus'		=> false,
			'supports' 				=> array('title', 'editor', 'thumbnail'),
			'menu_position'			=> 7,
		)
	);

	//register taxonomy for directory
	// register_taxonomy('event_category','event',array(
	// 	'hierarchical' => true,
	// 	'labels' => array(
	// 		'name' 						=> __( 'Categories', 'theme_admin' ),
	// 		'singular_name' 			=> __( 'Categories', 'theme_admin' ),
	// 		'search_items' 				=>  __( 'Search Categories', 'theme_admin' ),
	// 		'popular_items' 			=> __( 'Popular Categories', 'theme_admin' ),
	// 		'all_items' 				=> __( 'All Categories', 'theme_admin' ),
	// 		'parent_item' 				=> null,
	// 		'parent_item_colon'			=> null,
	// 		'edit_item' 				=> __( 'Edit Categories', 'theme_admin' ), 
	// 		'update_item' 				=> __( 'Update Categories', 'theme_admin' ),
	// 		'add_new_item' 				=> __( 'Add New Categories', 'theme_admin' ),
	// 		'new_item_name' 			=> __( 'New Categories Name', 'theme_admin' ),
	// 		'separate_items_with_commas'=> __( 'Separate Categories with commas', 'theme_admin' ),
	// 		'add_or_remove_items' 		=> __( 'Add or remove Categories', 'theme_admin' ),
	// 		'choose_from_most_used' 	=> __( 'Choose from the most used Categories', 'theme_admin' ),
	// 		'menu_name' 				=> __( 'Categories', 'theme_admin' ),
	// 	),
	// 	'public' 			=> true,
	// 	'show_in_nav_menus' => true,
	// 	'show_ui' 			=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'query_var' 		=> false,
	// 	'rewrite'			=> array( 'slug' => 'event-category' )
	// ));

	// register_taxonomy('directory_tag', array('directory'), array(
	// 	'hierarchical' => false,
	// 	'labels' => array(
	// 		'name' 					=> __( 'Tag', 'theme_admin' ),
	// 		'singular_name' 		=> __( 'Tag', 'theme_admin' ),
	// 		'search_items' 			=> __( 'Search Tag', 'theme_admin' ),
	// 		'popular_items' 		=> __( 'Popular Tag', 'theme_admin' ),
	// 		'all_items' 			=> __( 'All Tag', 'theme_admin' ),
	// 		'parent_item' 			=> null,
	// 		'parent_item_colon' 	=> null,
	// 		'edit_item' 			=> __( 'Edit Tag', 'theme_admin' ), 
	// 		'update_item' 			=> __( 'Update Tag', 'theme_admin' ),
	// 		'add_new_item' 			=> __( 'Add New Tag', 'theme_admin' ),
	// 		'new_item_name' 		=> __( 'New Tag Name', 'theme_admin' ),
	// 		'separate_items_with_commas' => __( 'Separate Tag with commas', 'theme_admin' ),
	// 		'add_or_remove_items' 	=> __( 'Add or remove Tag', 'theme_admin' ),
	// 		'choose_from_most_used'	=> __( 'Choose from the most used Tag', 'theme_admin' ),
	// 		'menu_name' 			=> __( 'Tags', 'theme_admin' ),
	// 	),
	// 	'public' 			=> true,
	// 	'show_in_nav_menus' => true,
	// 	'show_ui' 			=> true,
	// 	'show_tagcloud' 	=> false,
	// 	'query_var' 		=> false,
	// 	'rewrite'			=> array( 'with_front' => false, 'slug' => 'directory-tag' )
	// ));
}

?>