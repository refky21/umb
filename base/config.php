<?php



$theme_config = array(

	'theme_name' 	=> __('PT Umat Mandiri Berkemajuan', 'theme_admin'), 
	'theme_slug' 	=> 'ptumb',

	// Theme Types
	'theme_types' => array(
		'slider',
		// 'unitkerja'
	),

	// Theme Custom Meta
	'theme_custom_metas' => array( 
		'page',
		'post'
	),

	// Theme Menus
	'theme_menus' => array(
		'left-menu' 	=> __('Left Menu', 'theme_admin'),
		'right-menu' 	=> __('Right Menu', 'theme_admin'),
		'top-left-menu'	=> __('Top Left Menu', 'theme_admin'),
		'top-right-menu'=> __('Top Right Menu', 'theme_admin'),
		'mobile-menu' 	=> __('Mobile Menu', 'theme_admin'),
	),

	// Theme Sidebar
 	'theme_sidebars' => array(
 		// Sidebar
 		array(
			'id' 			=> 'header-widget-left',
			'name' 			=> __('Header Top Left', 'theme_admin'),
			'description' 	=> __('Widget Header Top Left', 'theme_admin'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>'
		),
 		array(
			'id' 			=> 'footer-widget-1',
			'name' 			=> __('Footer 1st', 'theme_admin'),
			'description' 	=> __('Widget Footer 1st', 'theme_admin'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>'
		),
		array(
			'id' 			=> 'footer-widget-2',
			'name' 			=> __('Footer 2nd', 'theme_admin'),
			'description' 	=> __('Widget Footer 2nd', 'theme_admin'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>'
		),
		array(
			'id' 			=> 'footer-widget-3',
			'name' 			=> __('Footer 3rd', 'theme_admin'),
			'description' 	=> __('Widget Footer 3rd', 'theme_admin'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>'
		),
	),


	// Theme Plugin
	'theme_plugins' => array(
		'magic-metabox',
		'xbox'
	),

	// Theme Shortcode
	'theme_shortcodes' => array(
		'content'
	),

	// Theme Options
	'theme_options' => array(),

	

);