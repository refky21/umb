<?php

add_action('init','register_example_custom_post_type');
function register_example_custom_post_type() {
	register_post_type( 'example_post',
		array(
			'labels' => array(
				'name' 					=> __('Custom Posts', 'theme_admin' ),
				'singular_name' 		=> __('Custom Post', 'theme_admin' ),
				'add_new' 				=> __('Add New', 'theme_admin' ),
				'add_new_item' 			=> __('Add New Custom Post', 'theme_admin' ),
				'edit_item' 			=> __('Edit Custom Post', 'theme_admin' ),
				'new_item' 				=> __('New Custom Post', 'theme_admin' ),
				'view_item' 			=> __('View Custom Post', 'theme_admin' ),
				'search_items' 			=> __('Search Custom Post', 'theme_admin' ),
				'not_found' 			=> __('No Custom Post found', 'theme_admin' ),
				'not_found_in_trash' 	=> __('No Custom Post found in Trash', 'theme_admin' ), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 		=> __('Custom Posts', 'theme_admin' ),
			'public' 				=> true,
			'exclude_from_search' 	=> false,
			'show_ui' 				=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 			=> false,
			'rewrite' 				=> array( 'with_front' => false, 'slug' => '/custom-post' ),
			'query_var' 			=> 'example_post',
			'_builtin' 				=> false,
			'supports' 				=> array('title', 'editor', 'thumbnail', 'author'),
			'show_in_menu' 			=> true,
			'has_archive'			=> false,
			'menu_position'			=> 48,
		)
	);

	register_post_type( 'example_page',
		array(
			'labels' => array(
				'name' 					=> __('Custom Pages', 'theme_admin' ),
				'singular_name' 		=> __('Custom Page', 'theme_admin' ),
				'add_new' 				=> __('Add New', 'theme_admin' ),
				'add_new_item' 			=> __('Add New Custom Page', 'theme_admin' ),
				'edit_item' 			=> __('Edit Custom Page', 'theme_admin' ),
				'new_item' 				=> __('New Custom Page', 'theme_admin' ),
				'view_item' 			=> __('View Custom Page', 'theme_admin' ),
				'search_items' 			=> __('Search Custom Page', 'theme_admin' ),
				'not_found' 			=> __('No Custom Page found', 'theme_admin' ),
				'not_found_in_trash' 	=> __('No Custom Page found in Trash', 'theme_admin' ), 
				'parent_item_colon' 	=> '',
			),
			'singular_label' 		=> __('Custom Pages', 'theme_admin' ),
			'public' 				=> true,
			'exclude_from_search' 	=> false,
			'show_ui' 				=> true,
			'capability_type' 		=> 'post',
			'hierarchical' 			=> true,
			'rewrite' 				=> array( 'with_front' => false, 'slug' => '/custom-page' ),
			'query_var' 			=> 'example_page',
			'_builtin' 				=> false,
			'supports' 				=> array('title', 'editor', 'thumbnail', 'author', 'page-attributes'),
			'show_in_menu' 			=> true,
			'has_archive'			=> false,
			'show_in_menu' 			=> 'edit.php?post_type=example_post'
		)
	);

	register_taxonomy('example_category',array('example_post'),array(
		'hierarchical' => true,
		'labels' => array(
			'name' 					=> __( 'Example Category', 'theme_admin' ),
			'singular_name' 		=> __( 'Example Category', 'theme_admin' ),
			'search_items' 			=> __( 'Search Example Category', 'theme_admin' ),
			'popular_items' 		=> __( 'Popular Example Category', 'theme_admin' ),
			'all_items' 			=> __( 'All Example Category', 'theme_admin' ),
			'parent_item' 			=> null,
			'parent_item_colon' 	=> null,
			'edit_item' 			=> __( 'Edit Example Category', 'theme_admin' ), 
			'update_item' 			=> __( 'Update Example Category', 'theme_admin' ),
			'add_new_item' 			=> __( 'Add New Example Category', 'theme_admin' ),
			'new_item_name' 		=> __( 'New Example Category Name', 'theme_admin' ),
			'separate_items_with_commas' => __( 'Separate Example Category with commas', 'theme_admin' ),
			'add_or_remove_items' 	=> __( 'Add or remove Example Category', 'theme_admin' ),
			'choose_from_most_used'	=> __( 'Choose from the most used Example Category', 'theme_admin' ),
			'menu_name' 			=> __( 'Example Categories', 'theme_admin' ),
		),
		'public' 			=> true,
		'show_in_nav_menus' => true,
		'show_ui' 			=> true,
		'show_tagcloud' 	=> false,
		'query_var' 		=> false,
		'rewrite'			=> array( 'with_front' => false, 'slug' => 'example-category' )
	));

	register_taxonomy('example_tag',array('example_post'),array(
		'hierarchical' => false,
		'labels' => array(
			'name' 					=> __( 'Example Tag', 'theme_admin' ),
			'singular_name' 		=> __( 'Example Tag', 'theme_admin' ),
			'search_items' 			=> __( 'Search Example Tag', 'theme_admin' ),
			'popular_items' 		=> __( 'Popular Example Tag', 'theme_admin' ),
			'all_items' 			=> __( 'All Example Tag', 'theme_admin' ),
			'parent_item' 			=> null,
			'parent_item_colon' 	=> null,
			'edit_item' 			=> __( 'Edit Example Tag', 'theme_admin' ), 
			'update_item' 			=> __( 'Update Example Tag', 'theme_admin' ),
			'add_new_item' 			=> __( 'Add New Example Tag', 'theme_admin' ),
			'new_item_name' 		=> __( 'New Example Tag Name', 'theme_admin' ),
			'separate_items_with_commas' => __( 'Separate Example Tag with commas', 'theme_admin' ),
			'add_or_remove_items' 	=> __( 'Add or remove Example Tag', 'theme_admin' ),
			'choose_from_most_used'	=> __( 'Choose from the most used Example Tag', 'theme_admin' ),
			'menu_name' 			=> __( 'Example Tags', 'theme_admin' ),
		),
		'public' 			=> true,
		'show_in_nav_menus' => true,
		'show_ui' 			=> true,
		'show_tagcloud' 	=> false,
		'query_var' 		=> false,
		'rewrite'			=> array( 'with_front' => false, 'slug' => 'example-tag' )
	));

	register_taxonomy('example_radio_category',array('example_post'),array(
		'hierarchical' => true,
		'labels' => array(
			'name' 					=> __( 'Example Radio Category', 'theme_admin' ),
			'singular_name' 		=> __( 'Example Radio Category', 'theme_admin' ),
			'search_items' 			=> __( 'Search Example Radio Category', 'theme_admin' ),
			'popular_items' 		=> __( 'Popular Example Radio Category', 'theme_admin' ),
			'all_items' 			=> __( 'All Example Radio Category', 'theme_admin' ),
			'parent_item' 			=> null,
			'parent_item_colon' 	=> null,
			'edit_item' 			=> __( 'Edit Example Radio Category', 'theme_admin' ), 
			'update_item' 			=> __( 'Update Example Radio Category', 'theme_admin' ),
			'add_new_item' 			=> __( 'Add New Example Radio Category', 'theme_admin' ),
			'new_item_name' 		=> __( 'New Example Radio Category Name', 'theme_admin' ),
			'separate_items_with_commas' => __( 'Separate Example Radio Category with commas', 'theme_admin' ),
			'add_or_remove_items' 	=> __( 'Add or remove Example Radio Category', 'theme_admin' ),
			'choose_from_most_used'	=> __( 'Choose from the most used Example Category', 'theme_admin' ),
			'menu_name' 			=> __( 'Example Radio Categories', 'theme_admin' ),
		),
		'public' 			=> true,
		'show_in_nav_menus' => true,
		'show_ui' 			=> true,
		'show_tagcloud' 	=> false,
		'query_var' 		=> false,
		'rewrite'			=> array( 'with_front' => false, 'slug' => 'example-radio-category' )
	));
}

// Remove Taxonomy Meta Box
//add_action( 'admin_menu' , 'remove_radio_category_boxes' );
function remove_radio_category_boxes() {
    remove_meta_box( 'example_radio_category'.'div' , 'example_post' , 'normal' ); 
}
