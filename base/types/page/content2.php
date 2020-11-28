<?php
// General Meta
$config = array(
	'title' 	=> 'Sidebar Options',
	'group_id' 	=> 'general_side',
	'callback' 	=> '',
	'context' 	=> 'side',
	'priority' 	=> 'low',
	'types' 	=> array( 'page' ),
	'multi' 	=> false
);
$options = array(
	// array(
	// 	'type' 			=> 'select',
	// 	'id' 			=> 'custom_sidebar',
	// 	'title' 		=> 'Custom Menu',
	// 	'description' 	=> '',
	// 	'default' 		=> '',
	// 	'source'		=> array( 
	// 		'post_type' => 'custom_sidebar'
	// 	),
	// 	'options' 		=> array(
	// 		'' 			=> 'choose ...'
	// 	)
	// ),
	array(
		'type' 			=> 'select',
		'id' 			=> 'custom_widget',
		'title' 		=> 'Custom Widget',
		'description' 	=> '',
		'default' 		=> '',
		'source'		=> array( 
			'post_type' => 'custom_widget'
		),
		'options' 		=> array(
			'' 			=> 'choose ...'
		)
	),
);
// new metaboxes_tool($config,$options);

$config = array(
	'title' 	=> __('Post Options', 'theme_admin'),
	'group_id' 	=> 'post_options',
	'callback' 	=> '',
	'context' 	=> 'side',
	'priority' 	=> 'low',
	'types' 	=> array( 'post' ),
	'multi' 	=> false
);
$options = array(
	
	array(
		'type' 			=> 'yes_no',
		'id' 			=> 'featured_status',
		'title' 		=> __('Featured post', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> 'no'
	),
	array(
		'type' 			=> 'yes_no',
		'id' 			=> 'top_story_status',
		'title' 		=> __('Top stories', 'theme_admin'),
		'description' 	=> __('', 'theme_admin'),
		'default' 		=> 'no'
	),

);
// new metaboxes_tool($config,$options);

if(function_exists('add_magic_meta_box')){ 
	// Home Page
	add_magic_meta_box('home_intro_page', array( 
	    'title'     => __('Opsi Bagian Intro ', 'theme_admin'), 
	    'context'   => 'normal', 
	    'priority'  => 'high',  
	    'pages'     => array( 'page' ), 
	    'fields'    => array(
	        array( 
				'type' 			=> 'repeat', 
				'id' 			=> 'home_intro_slider', 
				'name' 			=> __('Hero Slider', 'theme_admin'), 
				'desc' 			=> '', 
				'repeat_fields' => array( 
					array(             
						'type' 			=> 'image',             
						'id' 			=> 'image',             
						'name' 			=> __('Gambar', 'theme_admin'),             
						'desc' 			=> __('', 'theme_admin'),            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'title',             
						'name' 			=> __('Judul', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'textarea',             
						'id' 			=> 'content',             
						'name' 			=> __('Konten', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'link',             
						'name' 			=> __('Link', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
						'std'			=> '#'
					)
				) 
			),
		) 
	)); 
	add_magic_meta_box('home_lecture_service', array( 
	    'title'     => __('Opsi layanan dosen', 'theme_admin'), 
	    'context'   => 'normal', 
	    'priority'  => 'high',  
	    'pages'     => array( 'page' ), 
	    'fields'    => array(
			array(             
				'type' 			=> 'textarea',             
				'id' 			=> 'home_lecture_service_desc',             
				'name' 			=> __('Deskripsi', 'theme_admin'),             
				'desc' 			=> __('', 'theme_admin'),            
				'placeholder' 	=> '',
			),
			array(             
				'type' 			=> 'image',             
				'id' 			=> 'home_lecture_service_image',             
				'name' 			=> __('Gambar latar belakang', 'theme_admin'),             
				'desc' 			=> __('', 'theme_admin'),            
				'placeholder' 	=> '',
			),
	        array( 
				'type' 			=> 'repeat', 
				'id' 			=> 'home_lecture_service_items', 
				'name' 			=> __('Details', 'theme_admin'), 
				'desc' 			=> '', 
				'repeat_fields' => array( 
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'title',             
						'name' 			=> __('Judul', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'image',             
						'id' 			=> 'icon',             
						'name' 			=> __('Ikon', 'theme_admin'),             
						'desc' 			=> __('', 'theme_admin'),            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'link',             
						'name' 			=> __('Link', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
				) 
			),
		) 
	)); 
	add_magic_meta_box('home_student_service', array( 
	    'title'     => __('Opsi layanan mahasiswa', 'theme_admin'), 
	    'context'   => 'normal', 
	    'priority'  => 'high',  
	    'pages'     => array( 'page' ), 
	    'fields'    => array(
			array(             
				'type' 			=> 'textarea',             
				'id' 			=> 'home_student_service_desc',             
				'name' 			=> __('Deskripsi', 'theme_admin'),             
				'desc' 			=> __('', 'theme_admin'),            
				'placeholder' 	=> '',
			),
			array(             
				'type' 			=> 'image',             
				'id' 			=> 'home_student_service_image',             
				'name' 			=> __('Gambar latar belakang', 'theme_admin'),             
				'desc' 			=> __('', 'theme_admin'),            
				'placeholder' 	=> '',
			),
	        array( 
				'type' 			=> 'repeat', 
				'id' 			=> 'home_student_service_items', 
				'name' 			=> __('Details', 'theme_admin'), 
				'desc' 			=> '', 
				'repeat_fields' => array( 
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'title',             
						'name' 			=> __('Judul', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'image',             
						'id' 			=> 'icon',             
						'name' 			=> __('Ikon', 'theme_admin'),             
						'desc' 			=> __('', 'theme_admin'),            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'link',             
						'name' 			=> __('Link', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
				) 
			),
		) 
	)); 
	add_magic_meta_box('home_division', array( 
	    'title'     => __('Opsi Divisi', 'theme_admin'), 
	    'context'   => 'normal', 
	    'priority'  => 'high',  
	    'pages'     => array( 'page' ), 
	    'fields'    => array(
			array(             
				'type' 			=> 'textarea',             
				'id' 			=> 'home_division_desc',             
				'name' 			=> __('Deskripsi', 'theme_admin'),             
				'desc' 			=> __('', 'theme_admin'),            
				'placeholder' 	=> '',
			),
			array(             
				'type' 			=> 'image',             
				'id' 			=> 'home_division_image',             
				'name' 			=> __('Gambar latar belakang', 'theme_admin'),             
				'desc' 			=> __('', 'theme_admin'),            
				'placeholder' 	=> '',
			),
	        array( 
				'type' 			=> 'repeat', 
				'id' 			=> 'home_division_items', 
				'name' 			=> __('Details', 'theme_admin'), 
				'desc' 			=> '', 
				'repeat_fields' => array( 
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'title',             
						'name' 			=> __('Judul', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'image',             
						'id' 			=> 'icon',             
						'name' 			=> __('Ikon', 'theme_admin'),             
						'desc' 			=> __('', 'theme_admin'),            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'link',             
						'name' 			=> __('Link', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
				) 
			),
		) 
	)); 

	// Profile Page
	add_magic_meta_box('profile_identity_page', array( 
	    'title'     => __('Opsi Identitas', 'theme_admin'), 
	    'context'   => 'normal', 
	    'priority'  => 'high',  
	    'pages'     => array( 'page' ), 
	    'fields'    => array(
	        array( 
				'type' 			=> 'repeat', 
				'id' 			=> 'profile_identity', 
				'name' 			=> __('Identitas', 'theme_admin'), 
				'desc' 			=> '', 
				'repeat_fields' => array( 
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'title',             
						'name' 			=> __('Judul', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'textarea',             
						'id' 			=> 'content',             
						'name' 			=> __('Konten', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
				) 
			),
		) 
	)); 
	add_magic_meta_box('profile_direction_page', array( 
	    'title'     => __('Opsi Pengelola', 'theme_admin'), 
	    'context'   => 'normal', 
	    'priority'  => 'high',  
	    'pages'     => array( 'page' ), 
	    'fields'    => array(
	    	array(             
				'type' 			=> 'image',             
				'id' 			=> 'profile_direction_image',             
				'name' 			=> __('Gambar Kepala', 'theme_admin'),             
				'desc' 			=> __('', 'theme_admin'),            
				'placeholder' 	=> '',
			),
			array(             
				'type' 			=> 'text',             
				'id' 			=> 'profile_direction_title',             
				'name' 			=> __('Nama Kepala', 'theme_admin'),             
				'desc' 			=> '',            
				'placeholder' 	=> '',
			),
			array(             
				'type' 			=> 'textarea',             
				'id' 			=> 'profile_direction_content',             
				'name' 			=> __('Keterangan Kepala', 'theme_admin'),             
				'desc' 			=> '',            
				'placeholder' 	=> '',
			),
			array( 
				'type' 			=> 'repeat', 
				'id' 			=> 'profile_advisors', 
				'name' 			=> __('Penasehat', 'theme_admin'), 
				'desc' 			=> '', 
				'repeat_fields' => array( 
					array(             
						'type' 			=> 'image',             
						'id' 			=> 'image',             
						'name' 			=> __('Gambar', 'theme_admin'),             
						'desc' 			=> __('', 'theme_admin'),            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'title',             
						'name' 			=> __('Nama', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'textarea',             
						'id' 			=> 'content',             
						'name' 			=> __('Keterangan', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
				) 
			),
			array( 
				'type' 			=> 'repeat', 
				'id' 			=> 'profile_directions', 
				'name' 			=> __('Divisi', 'theme_admin'), 
				'desc' 			=> '', 
				'repeat_fields' => array( 
					array(             
						'type' 			=> 'image',             
						'id' 			=> 'image',             
						'name' 			=> __('Gambar', 'theme_admin'),             
						'desc' 			=> __('', 'theme_admin'),            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'position',             
						'name' 			=> __('Jabatan', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'text',             
						'id' 			=> 'title',             
						'name' 			=> __('Nama', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
					array(             
						'type' 			=> 'textarea',             
						'id' 			=> 'content',             
						'name' 			=> __('Keterangan', 'theme_admin'),             
						'desc' 			=> '',            
						'placeholder' 	=> '',
					),
				) 
			),
		) 
	)); 
} 

add_action('admin_enqueue_scripts','page_metafield_options');
function page_metafield_options(){
    wp_register_script( 'metafield', THEME_CUSTOM_ASSETS_URI. '/js/metafield.js', false, null, true ); // We specify true here to tell WordPress this script needs to be loaded in the footer
    wp_enqueue_script( 'metafield' );
}

?>