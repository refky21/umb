<?php

$config = array(
	'title' 		=> __('Widget Info', 'theme_admin'),
	'group_id' 		=> 'widget',
	'callback' 		=> '',
	'context' 		=> 'normal',
	'priority' 		=> 'high',
	'types' 		=> array( 'custom_widget' ),
	'multi' 		=> false
);
$options = array(
	
	array(
		'type' => 'text',
		'id' => 'name',
		'title' => __('Name', 'theme_admin'),
		'description' => __('Widget\'s name', 'theme_admin'),
	),
	
	array(
		'type' => 'text',
		'id' => 'short_desc',
		'title' => __('Description', 'theme_admin'),
		'description' => __('Widget\'s short description', 'theme_admin')
	),
	
);
new metaboxes_tool($config,$options);

?>