<?php

$config = array(
	'title' 		=> __('Example Custom Fields', 'theme_admin'),
	'group_id' 		=> 'example_custom_field',
	'context' 		=> 'normal',
	'priority' 		=> 'high',
	'types' 		=> array( 'example_post', 'example_page' ),
	'multi' 		=> false
);
$options = array(

	array(
		'type'			=> 'hidden',
		'id'			=> 'hidden_id',
		'title'			=> __( 'Hidden Title', 'theme_admin'),
		'description'	=> __( 'Hidden Description', 'theme_admin'),
		'default'		=> 'Default Text Hidden'
	),
	array(
		'type'			=> 'text',
		'id'			=> 'text_id',
		'title'			=> __( 'Text Title', 'theme_admin'),
		'description'	=> __( 'Text Description', 'theme_admin'),
		'default'		=> 'Default Text'
	),
	array(
		'type'			=> 'number',
		'id'			=> 'number_id',
		'title'			=> __( 'Number Title', 'theme_admin'),
		'description'	=> __( 'Number Description: Min 0 - Max 10 - Default 5', 'theme_admin'),
		'min'			=> 0,
		'max'			=> 10,
		'default'		=> 5
	),
	array(
		'type'			=> 'textarea',
		'id'			=> 'textarea_id',
		'title'			=> __( 'Textarea Title', 'theme_admin'),
		'description'	=> __( 'Textarea Description : Default Row - 5', 'theme_admin'),
		'row'			=> 5,
		'default'		=> 'Default Text'
	),
	array(
		'type'			=> 'editor',
		'id'			=> 'editor_id',
		'title'			=> __( 'Editor Title', 'theme_admin'),
		'description'	=> __( 'Editor Description : Default Setting', 'theme_admin'),
		'default'		=> 'Default Text'
	),
	array(
		'type'			=> 'editor',
		'id'			=> 'editor_advance_id',
		'title'			=> __( 'Editor Title', 'theme_admin'),
		'description'	=> __( 'Editor Description : Advance Setting', 'theme_admin'),
		'settings'		=> array(
			'media_buttons' => true,
			'tinymce' => array('theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,' .
            'bullist,blockquote,|,justifyleft,justifycenter' .
            ',justifyright,justifyfull,|,link,unlink,|' .
            ',spellchecker,wp_fullscreen,wp_adv')
		),
		'default'		=> 'Default Text'
	),
	array(
		'type'			=> 'radio',
		'id'			=> 'radio_id',
		'title'			=> __( 'Radio Title', 'theme_admin'),
		'description'	=> __( 'Radio Description', 'theme_admin'),
		'options'		=> array(
			'radio-1'	=> __('Radio 01', 'theme_admin'),
			'radio-2'	=> __('Radio 02', 'theme_admin'),
			'radio-3'	=> __('Radio 03', 'theme_admin')
		),
		'default'		=> 'radio-2'
	),
	array(
		'type'			=> 'checkbox',
		'id'			=> 'checkbox_id',
		'title'			=> __( 'Checkbox Title', 'theme_admin'),
		'description'	=> __( 'Checkbox Description', 'theme_admin'),
		'options'		=> array(
			'checkbox-1'	=> __('Checkbox 01', 'theme_admin'),
			'checkbox-2'	=> __('Checkbox 02', 'theme_admin'),
			'checkbox-3'	=> __('Checkbox 03', 'theme_admin')
		),
		'default'		=> array('checkbox-2')
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'select_id',
		'title' 		=> __('Select Title', 'theme_admin'),
		'description' 	=> __('Select Description', 'theme_admin'),
		'options' 		=> array(
			'option-1' 	=> __('Option 01', 'theme_admin'),
			'option-2' 	=> __('Option 02', 'theme_admin'),
			'option-3' 	=> __('Option 03', 'theme_admin')
		),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'select_post_type_id',
		'title' 		=> __('Select Title Post Type', 'theme_admin'),
		'description' 	=> __('Select Description Post Type', 'theme_admin'),
		'options'		=>	array(
			'0'			=>	'&mdash; Select &mdash;'
		),
		'source' 		=> array(
			'post_type' 	=> 'example_page'
		),
		'default' 		=> '0'
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'select_category_id',
		'title' 		=> __('Select Title Category', 'theme_admin'),
		'description' 	=> __('Select Description Category', 'theme_admin'),
		'options'		=>	array(
			'0'			=>	'&mdash; Select &mdash;'
		),
		'source' 		=> array(
			'category' 	=> 'category'
		),
		'default' 		=> '0'
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'select_taxonomy_id',
		'title' 		=> __('Select Title Taxonomy', 'theme_admin'),
		'description' 	=> __('Select Description Taxonomy', 'theme_admin'),
		'options'		=>	array(
			'0'			=>	'&mdash; Select &mdash;'
		),
		'source' 		=> array(
			'taxonomy' 	=> 'example_category'
		),
		'default' 		=> '0'
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'select_page_template_id',
		'title' 		=> __('Select Title Page Template', 'theme_admin'),
		'description' 	=> __('Select Description Page Template', 'theme_admin'),
		'options'		=>	array(
			'0'			=>	'&mdash; Select &mdash;'
		),
		'source' 		=> array(
			'page_template' 	=> 'example_category'
		),
		'default' 		=> '0'
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'select_multiple_id',
		'title' 		=> __('Select Title Multiple', 'theme_admin'),
		'description' 	=> __('Select Description Multiple', 'theme_admin'),
		'multiple'		=> 7,
		'options' 		=> array(
			'option-1' 	=> __('Option 01', 'theme_admin'),
			'option-2' 	=> __('Option 02', 'theme_admin'),
			'option-3' 	=> __('Option 03', 'theme_admin'),
			'option-4' 	=> __('Option 04', 'theme_admin'),
			'option-5' 	=> __('Option 05', 'theme_admin')
		),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'select_chosen_id',
		'title' 		=> __('Select Title Chosen', 'theme_admin'),
		'description' 	=> __('Select Description Chosen', 'theme_admin'),
		'class'			=> 'chosen-select',
		'options' 		=> array(
			'option-1' 	=> __('Option 01', 'theme_admin'),
			'option-2' 	=> __('Option 02', 'theme_admin'),
			'option-3' 	=> __('Option 03', 'theme_admin')
		),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'select',
		'id' 			=> 'select_multiple_chosen_id',
		'title' 		=> __('Select Title Multiple Chosen', 'theme_admin'),
		'description' 	=> __('Select Description Multiple Chosen', 'theme_admin'),
		'class'			=> 'chosen-select',
		'multiple'		=> 3,
		'options' 		=> array(
			'option-1' 	=> __('Option 01', 'theme_admin'),
			'option-2' 	=> __('Option 02', 'theme_admin'),
			'option-3' 	=> __('Option 03', 'theme_admin'),
			'option-4' 	=> __('Option 04', 'theme_admin'),
			'option-5' 	=> __('Option 05', 'theme_admin')
		),
		'default' 		=> ''
	),
	array(
		'type' 			=> 'input_file',
		'id' 			=> 'file_id',
		'title' 		=> __('Input File Title', 'theme_admin'),
		'description' 	=> __('Input File Description', 'theme_admin'),
		'extensions'	=> '', // ico, pdf, jpg
		'default' 		=> ''
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'image_id',
		'title' 		=> __('Input Image Title', 'theme_admin'),
		'description' 	=> __('Input Image Description', 'theme_admin'),
		'default'		=> ''
	),
	array(
		'type' 			=> 'images',
		'id' 			=> 'images_id',
		'title' 		=> __('Input Images Title', 'theme_admin'),
		'description' 	=> __('Input Images Description', 'theme_admin'),
		'default'		=> ''
	),
	array(
		'type'			=> 'separator',
		'title'			=> 'Custom Input Field'
	),
	array(
		'type'			=> 'date',
		'id'			=> 'date_id',
		'title'			=> __( 'Date Title', 'theme_admin'),
		'description'	=> __( 'Date Description', 'theme_admin'),
		'default'		=> '2016-01-03' // yyyy-mm-dd
	),
	array(
		'type'			=> 'time',
		'id'			=> 'time_id',
		'title'			=> __( 'Time Title', 'theme_admin'),
		'description'	=> __( 'Time Description', 'theme_admin'),
		'default'		=> '12:00AM'
	),
	array(
		'type'			=> 'range',
		'id'			=> 'range_id',
		'title'			=> __( 'Range Title', 'theme_admin'),
		'description'	=> __( 'Range Description : Step - 2', 'theme_admin'),
		'min'			=> 0,
		'max'			=> 10,
		'step'			=> 2,
		'default'		=> 2,
		'unit'			=> 'px'
	),
	array(
		'type'			=> 'color',
		'id'			=> 'color_id',
		'title'			=> __( 'Color Title', 'theme_admin'),
		'description'	=> __( 'Color Description', 'theme_admin'),
		'default'		=> '#000'
	),
	array(
		'type' 			=> 'on_off',
		'id' 			=> 'on_off_id',
		'title' 		=> __('On Off Title', 'theme_admin'),
		'description' 	=> __('On Off Description', 'theme_admin'),
		'default' 		=> 'on'
	),
	array(
		'type' 			=> 'yes_no',
		'id' 			=> 'yes_no_id',
		'title' 		=> __('Yes No Title', 'theme_admin'),
		'description' 	=> __('Yes No Description', 'theme_admin'),
		'default' 		=> 'no'
	),
	array(
		'type' 			=> 'radio_img',
		'id' 			=> 'radio_img_id',
		'title' 		=> __('Radio Image Title', 'theme_admin'),
		'description' 	=> __('Radio Image Description', 'theme_admin'),
		'options' 		=> array(
			'image' 		=> __('Image', 'theme_admin'),
			'color' 		=> __('Color', 'theme_admin'),
			'text' 			=> __('Text', 'theme_admin'),
		),
		'images' 		=> array(
			'image' 		=> 'branding-type/image.png',
			'color' 		=> 'branding-type/color.png',
			'text' 			=> 'branding-type/text.png',
		),
		'default' 		=> 'color',
	),
	array(
		'type' 			=> 'checkbox_img',
		'id' 			=> 'checkbox_img_id',
		'title' 		=> __('Checkbox Image Title', 'theme_admin'),
		'description' 	=> __('Checkbox Image Description', 'theme_admin'),
		'options' 		=> array(
			'image' 		=> __('Image', 'theme_admin'),
			'color' 		=> __('Color', 'theme_admin'),
			'text' 			=> __('Text', 'theme_admin'),
		),
		'images' 		=> array(
			'image' 		=> 'branding-type/image.png',
			'color' 		=> 'branding-type/color.png',
			'text' 			=> 'branding-type/text.png',
		),
		'default' 		=> array('image', 'text')
	),
	array(
		'type'			=> 'separator',
		'title'			=> 'Toggling Input Field'
	),
	array(
		'type' 			=> 'yes_no',
		'id' 			=> 'option_yes_no_id',
		'toggle' 		=> 'toggle-option',
		'title' 		=> __('Option Yes No Title', 'theme_admin'),
		'description' 	=> __('Change Option Yes No', 'theme_admin'),
		'default' 		=> 'no'
	),
	array(
		'type' 			=> 'radio_img',
		'id' 			=> 'option_radio_img_id',
		'toggle_group' 	=> 'toggle-option toggle-option-yes',
		'toggle' 		=> 'toggle-option-radio',
		'title' 		=> __('Option Radio Image Title', 'theme_admin'),
		'description' 	=> __('Change Radio Image', 'theme_admin'),
		'options' 		=> array(
			'image' 		=> __('Image', 'theme_admin'),
			'color' 		=> __('Color', 'theme_admin'),
			'text' 			=> __('Text', 'theme_admin'),
		),
		'images' 		=> array(
			'image' 		=> 'branding-type/image.png',
			'color' 		=> 'branding-type/color.png',
			'text' 			=> 'branding-type/text.png',
		),
		'default' 		=> 'color',
	),
	array(
		'type' 			=> 'image',
		'id' 			=> 'option_image_id',
		'toggle_group' 	=> 'toggle-option toggle-option-yes toggle-option-radio toggle-option-radio-image',
		'title' 		=> __('Input Image Title', 'theme_admin'),
		'description' 	=> __('Input Image Description', 'theme_admin'),
		'default'		=> ''
	),
	array(
		'type'			=> 'color',
		'id'			=> 'option_color_id',
		'toggle_group' 	=> 'toggle-option toggle-option-yes toggle-option-radio toggle-option-radio-color',
		'title'			=> __( 'Color Title', 'theme_admin'),
		'description'	=> __( 'Color Description', 'theme_admin'),
		'default'		=> '#000'
	),
	array(
		'type'			=> 'text',
		'id'			=> 'option_text_id',
		'toggle_group' 	=> 'toggle-option toggle-option-yes toggle-option-radio toggle-option-radio-text',
		'title'			=> __( 'Text Title', 'theme_admin'),
		'description'	=> __( 'Text Description', 'theme_admin'),
		'default'		=> 'Default Text'
	),
);
new metaboxes_tool($config,$options);

?>