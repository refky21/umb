<?php
/**
 * afm Theme Customizer
 *
 * @package umytheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function extend_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'extend_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'extend_customize_partial_blogdescription',
		) );
	}

	// SITE IDENTITY
	// $wp_customize->add_setting( 'site_identity_image_logo');
	// $wp_customize->add_control( new WP_Customize_Image_Control(
	// 	$wp_customize,
	// 	'site_identity_image_logo',
	// 	array(
	// 		'label'      	=> __( 'Header logo image', 'theme_name' ),
	// 		'section'    	=> 'title_tagline',
	// 		'settings'   	=> 'site_identity_image_logo',
	// 		'priority' 		=> 1,
	// 		'description'	=> __('', 'theme_admin')
	// 	)
    // ));

 //    $wp_customize->add_setting( 'site_identity_image_logo_mobile');
	// $wp_customize->add_control( new WP_Customize_Image_Control(
	// 	$wp_customize,
	// 	'site_identity_image_logo_mobile',
	// 	array(
	// 		'label'      	=> __( 'Header mobile logo image', 'theme_name' ),
	// 		'section'    	=> 'title_tagline',
	// 		'settings'   	=> 'site_identity_image_logo_mobile',
	// 		'priority' 		=> 1,
	// 		'description'	=> __('', 'theme_admin')
	// 	)
 //    ));


	// HEADER OPTIONS
	$wp_customize->add_section( 
		'extend_header_options', 
		array(
			'title'       => __( 'Header', 'theme_admin' ),
			'priority'    => 20, //(probably) make it the last item
			'capability'  => 'edit_theme_options'
		) 
	);

	$wp_customize->add_setting( 'header_logo');
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'header_logo',
		array(
			'label'      	=> __( 'Header logo image', 'theme_name' ),
			'section'    	=> 'extend_header_options',
			'settings'   	=> 'header_logo',
			'priority' 		=> 1,
			'description'	=> __('', 'theme_admin')
		)
	));

	$wp_customize->add_setting( 'header_logo_scroll');
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'header_logo_scroll',
		array(
			'label'      	=> __( 'Header logo image on scroll', 'theme_name' ),
			'section'    	=> 'extend_header_options',
			'settings'   	=> 'header_logo_scroll',
			'priority' 		=> 1,
			'description'	=> __('', 'theme_admin')
		)
	));

	// SOCIAL MEDIA OPTIONS
	$wp_customize->add_section( 
		'extend_social_options', 
		array(
			'title'       => __( 'Informasi Website', 'theme_admin' ),
			'priority'    => 20, //(probably) make it the last item
			'capability'  => 'edit_theme_options'
		) 
	);
	$wp_customize->add_setting( 'alamat_umb');
	$wp_customize->add_control( 'alamat_umb_control', 
		array(
			'label' 	=> __('Alamat', 'theme_admin'),
			'section' 	=> 'extend_social_options',
			'settings' 	=> 'alamat_umb',
			'priority' 	=> 10,
			'type' 		=> 'textarea'
		)
	);
	$wp_customize->add_setting( 'telp_umb');
	$wp_customize->add_control( 'telp_umb_control', 
		array(
			'label' 	=> __('Telpon', 'theme_admin'),
			'section' 	=> 'extend_social_options',
			'settings' 	=> 'telp_umb',
			'priority' 	=> 10,
			'type' 		=> 'text'
		)
	);
	$wp_customize->add_setting( 'fax_umb');
	$wp_customize->add_control( 'fax_umb_control', 
		array(
			'label' 	=> __('Fax', 'theme_admin'),
			'section' 	=> 'extend_social_options',
			'settings' 	=> 'fax_umb',
			'priority' 	=> 10,
			'type' 		=> 'text'
		)
	);
	$wp_customize->add_setting( 'email_umb');
	$wp_customize->add_control( 'email_umb_control', 
		array(
			'label' 	=> __('Email', 'theme_admin'),
			'section' 	=> 'extend_social_options',
			'settings' 	=> 'email_umb',
			'priority' 	=> 10,
			'type' 		=> 'text'
		)
	);
	$wp_customize->add_setting( 'social_media_facebook');
	$wp_customize->add_control( 'social_media_facebook_control', 
		array(
			'label' 	=> __('Facebook', 'theme_admin'),
			'section' 	=> 'extend_social_options',
			'settings' 	=> 'social_media_facebook',
			'priority' 	=> 10,
			'type' 		=> 'text'
		)
	);

	$wp_customize->add_setting( 'social_media_twitter');
	$wp_customize->add_control( 'social_media_twitter_control', 
		array(
			'label' 	=> __('Twitter', 'theme_admin'),
			'section' 	=> 'extend_social_options',
			'settings' 	=> 'social_media_twitter',
			'priority' 	=> 10,
			'type' 		=> 'text'
		)
	);

	$wp_customize->add_setting( 'social_media_instagram');
	$wp_customize->add_control( 'social_media_instagram_control', 
		array(
			'label' 	=> __('instagram', 'theme_admin'),
			'section' 	=> 'extend_social_options',
			'settings' 	=> 'social_media_instagram',
			'priority' 	=> 10,
			'type' 		=> 'text'
		)
	);	

	$wp_customize->add_setting( 'social_media_youtube');
	$wp_customize->add_control( 'social_media_youtube_control', 
		array(
			'label' 	=> __('Youtube', 'theme_admin'),
			'section' 	=> 'extend_social_options',
			'settings' 	=> 'social_media_youtube',
			'priority' 	=> 10,
			'type' 		=> 'text'
		)
	);	

	
	// FOOTER OPTIONS
	$wp_customize->add_section( 
		'extend_footer_options', 
		array(
			'title'       => __( 'Footer', 'theme_admin' ),
			'priority'    => 20, //(probably) make it the last item
			'capability'  => 'edit_theme_options'
		) 
	);

	$wp_customize->add_setting( 'footer_copyright');
	$wp_customize->add_control( 'footer_copyright_control', 
		array(
			'label' 	=> __('Copyright', 'theme_admin'),
			'section' 	=> 'extend_footer_options',
			'settings' 	=> 'footer_copyright',
			'priority' 	=> 10,
			'type' 		=> 'textarea'
		)
	);

	// COLORS OPTIONS
	// $wp_customize->add_setting('text_color', array(
	//     'default'   => '#000000'
	// ));
	/* Add a control to upload the logo */
	// $wp_customize->add_control( new WP_Customize_Color_Control( 
	// 	$wp_customize, 
	// 	'text_color', 
	// 	array(
	// 		'label'     => __( 'Text Color', 'theme_admin' ),
	// 		'section'   => 'colors',
	// 		'settings'  => 'text_color',
	// 		'priority'	=> 20
	// 	) 
	// ));
}
add_action( 'customize_register', 'extend_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function extend_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function extend_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function extend_customize_preview_js() {
	wp_enqueue_script( 'afm-customizer', get_template_directory_uri() . '/base/custom/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'extend_customize_preview_js' );
