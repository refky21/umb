<?php
add_action( 'xbox_init', 'meta_page');
function meta_page(){
	// Homepage
	$xbox2 = array(
		'id' => 'home_intro_page',//Must be unique for each metabox that is created with xbox.
		'title' => 'Hompage Advanced',
		'post_types' => array('page'),
	);


	$homepage = xbox_new_metabox($xbox2);

	$homepage->add_field(array(
		'id' => 'home_tagline',
		'name' => __( 'Homepage Tagline', 'theme_admin' ),
		'type' => 'text',
	));
	$homepage->add_field(array(
		'id' => 'home_deskripsi',
		'name' => __( 'Homepage Deskripsi', 'theme_admin' ),
		'type' => 'textarea',
	));

	$homepage->add_field(array(
		'id' => 'bg_unit',
		'name' => __( 'Background Unit Usaha', 'theme_admin' ),
		'type' => 'file',
	));

	$unit_home = $homepage->add_group([
		'name' => 'Unit Usaha',
		'id' => 'home_unit',
		'options' => array(
			'add_item_text' => __('Unit', 'theme_admin'),
			'show_name' => true,
		),
		'controls' => array(
			'name' => 'Unit #'
		)
	]);

	$unit_home->add_field( array(
		'name' => 'Icon Unit',
		'id' => 'icon_unit_home',
		'type' => 'icon_selector',
		'default' => 'fab fa-apple',
		'items' => array_merge(
			array(
				THEME_STYLE_URI .'/icons/units/apotik-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/apotik-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/armada-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/armada-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/autocare-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/autocare-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/bmt-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/bmt-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/boga-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/boga-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/kantin-pertokoan-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/kantin-pertokoan-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/klinik-firdaus-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/klinik-firdaus-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/ltc-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/ltc-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/persewaan-gedung-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/persewaan-gedung-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/tirta-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/tirta-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/uct-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/uct-icon.svg'>",
				THEME_STYLE_URI .'/icons/units/utc-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/utc-icon.svg'>",
			),
			XboxItems::icon_fonts()
		),
		'options' => array(
			'wrap_height'    => '220px',
			'size'           => '36px',
			'hide_search'    => false,
			'hide_buttons'   => false,
		),
	));

	$unit_home->add_field(array(
		'id' => 'nama_unit_home',
		'name' => __( 'Nama Unit', 'theme_admin' ),
		'type' => 'text',
	));
	$unit_home->add_field(array(
		'id' => 'link_unit_home',
		'name' => __( 'Link Unit', 'theme_admin' ),
		'type' => 'text',
		'desc' => 'Gunakan https:// atau http://',
	));

//Profile
$xbox = array(
	'id' => 'profile_page',//Must be unique for each metabox that is created with xbox.
	'title' => 'Profile Advanced',
	'post_types' => array('page'),
);
$profile = xbox_new_metabox( $xbox );

$profile->add_field(array(
	'id' => 'foto_visi',
	'name' => __( 'Thumbnail Visi', 'theme_admin' ),
	'type' => 'file',
));
$profile->add_field(array(
	'id' => 'visi_text',
	'name' => __( 'Deskripsi Visi', 'theme_admin' ),
	'type' => 'wp_editor',
));
$profile->add_field(array(
	'id' => 'misi_text',
	'name' => __( 'Deskripsi Misi', 'theme_admin' ),
	'type' => 'wp_editor',
));


// Unit Usaha

$unit_usaha = array(
	'id' => 'unit_usaha_page',//Must be unique for each metabox that is created with xbox.
	'title' => 'Unit Usaha Advanced',
	'post_types' => array('page'),
);

$unit = xbox_new_metabox($unit_usaha);

$unit_page = $unit->add_group([
	'name' => 'Unit Usaha',
	'id' => 'unitusaha_page',
	'options' => array(
		'add_item_text' => __('Unit', 'theme_admin'),
		'show_name' => true,
	),
	'controls' => array(
		'name' => 'Unit #'
	)
]);

$unit_page->add_field( array(
	'name' => 'Icon Unit',
	'id' => 'icon_unit_usaha',
	'type' => 'icon_selector',
	'default' => 'fab fa-apple',
	'items' => array_merge(
		array(
			THEME_STYLE_URI .'/icons/units/apotik-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/apotik-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/armada-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/armada-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/autocare-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/autocare-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/bmt-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/bmt-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/boga-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/boga-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/kantin-pertokoan-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/kantin-pertokoan-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/klinik-firdaus-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/klinik-firdaus-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/ltc-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/ltc-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/persewaan-gedung-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/persewaan-gedung-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/tirta-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/tirta-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/uct-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/uct-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/utc-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/utc-icon.svg'>",
		),
		XboxItems::icon_fonts()
	),
	'options' => array(
		'wrap_height'    => '220px',
		'size'           => '36px',
		'hide_search'    => false,
		'hide_buttons'   => false,
	),
));

$unit_page->add_field(array(
	'id' => 'nama_unit_usaha',
	'name' => __( 'Nama Unit', 'theme_admin' ),
	'type' => 'text',
));
$unit_page->add_field(array(
	'id' => 'link_unit_usaha',
	'name' => __( 'Link Unit', 'theme_admin' ),
	'type' => 'text',
	'desc' => 'Gunakan https:// atau http://',
));

// Direksi


$direksi_page = array(
	'id' => 'direksi_page',//Must be unique for each metabox that is created with xbox.
	'title' => 'Pimpinan UMB',
	'post_types' => array('page'),
);

$direksi = xbox_new_metabox($direksi_page);

$direksi->add_field(array(
	'id' => 'foto_pimpinan_direksi',
	'name' => __( 'Foto Background', 'theme_admin' ),
	'type' => 'file',
));

$direksi->add_field(array(
	'id' => 'jabatan_direktur_direksi',
	'name' => __( 'Jabatan Direksi', 'theme_admin' ),
	'type' => 'text',
	'default' => 'Direktur',
));
$direksi->add_field(array(
	'id' => 'nama_direktur_direksi',
	'name' => __( 'Nama Direktur', 'theme_admin' ),
	'type' => 'text',
));
	
$manajer_direksi = $direksi->add_group([
	'name' => 'Manajer Unit',
	'id' => 'manajer_direksi',
	'options' => array(
		'add_item_text' => __('Manajer', 'theme_admin'),
		'show_name' => true,
	),
	'controls' => array(
		'name' => 'Manager '
	)
]);


$manajer_direksi->add_field(array(
	'id' => 'jabatan_manajer_direksi',
	'name' => __( 'Nama Unit', 'theme_admin' ),
	'type' => 'text',
	'desc' => 'Ex : UMB Techno Creative'
));
$manajer_direksi->add_field(array(
	'id' => 'nama_manajer_direksi',
	'name' => __( 'Nama Manager', 'theme_admin' ),
	'type' => 'text',
));



// Struktur Organisasi

$struktur_page = array(
	'id' => 'struktur_page',//Must be unique for each metabox that is created with xbox.
	'title' => 'Struktur Organisasi',
	'post_types' => array('page'),
);

$struktur = xbox_new_metabox($struktur_page);


$struktur_unit = $struktur->add_group([
	'name' => 'Unit Usaha',
	'id' => 'unitusaha_page',
	'options' => array(
		'add_item_text' => __('Unit', 'theme_admin'),
		'show_name' => true,
	),
	'controls' => array(
		'name' => 'Unit #'
	)
]);

$struktur_unit->add_field( array(
	'name' => 'Icon Unit',
	'id' => 'icon_struktur',
	'type' => 'icon_selector',
	'default' => THEME_STYLE_URI .'/logos/umb-logo-1.svg',
	'items' => array_merge(
		array(
			THEME_STYLE_URI .'/logos/umb-logo-1.svg' => "<img src='".THEME_STYLE_URI ."/logos/umb-logo-1.svg'>",
			THEME_STYLE_URI .'/icons/units/apotik-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/apotik-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/armada-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/armada-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/autocare-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/autocare-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/bmt-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/bmt-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/boga-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/boga-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/kantin-pertokoan-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/kantin-pertokoan-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/klinik-firdaus-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/klinik-firdaus-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/ltc-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/ltc-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/persewaan-gedung-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/persewaan-gedung-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/tirta-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/tirta-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/uct-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/uct-icon.svg'>",
			THEME_STYLE_URI .'/icons/units/utc-icon.svg' => "<img src='".THEME_STYLE_URI ."/icons/units/utc-icon.svg'>",
		)
	),
	'options' => array(
		'wrap_height'    => '220px',
		'size'           => '36px',
		'hide_search'    => false,
		'hide_buttons'   => false,
	),
));

$struktur_unit->add_field(array(
	'id' => 'nama_unit_struktur',
	'name' => __( 'Nama Unit', 'theme_admin' ),
	'type' => 'text',
));

$struktur_unit->add_field(array(
	'id' => 'desc_unit_struktur',
	'name' => __( 'Deskripsi Unit / Konten', 'theme_admin' ),
	'type' => 'wp_editor',
));

//  Alur Kerja

$alur_page = array(
	'id' => 'alur_page',//Must be unique for each metabox that is created with xbox.
	'title' => 'Alur Kerja',
	'post_types' => array('page'),
);

$alur = xbox_new_metabox($alur_page);


$alur_kerja = $alur->add_group([
	'name' => 'Alur Kerja',
	'id' => 'unitusaha_page',
	'options' => array(
		'add_item_text' => __('Alur', 'theme_admin'),
		'show_name' => true,
	),
	'controls' => array(
		'name' => 'Unit #'
	)
]);

$alur_kerja->add_field(array(
	'id' => 'nama_alur_kerja',
	'name' => __( 'Nama Alur Kerja', 'theme_admin' ),
	'type' => 'text',
));

$alur_kerja->add_field(array(
	'id' => 'warna_alur_kerja',
	'name' => __( 'Warna Banner Alur', 'theme_admin' ),
	'type' => 'text',
	'desc' => 'Gunakan Default Theme : twibbon-yellow, twibbon-blue, twibbon-red, twibbon-green, twibbon-grey'
));

$alur_kerja->add_field(array(
	'id' => 'isi_alur_kerja',
	'name' => __( 'Isi Alur Kerja', 'theme_admin' ),
	'type' => 'wp_editor',
));


// Unit Bisnis

$unit_bisnis = array(
	'id' => 'unit_bisnis_page',//Must be unique for each metabox that is created with xbox.
	'title' => 'Unit Bisnis Page',
	'post_types' => array('page'),
);


$unit = xbox_new_metabox($unit_bisnis);

$unit->add_field(array(
	'id' => 'tagline',
	'name' => __( 'Tagline Judul', 'theme_admin' ),
	'type' => 'text',
));
$unit->add_field(array(
	'id' => 'logo_unit',
	'name' => __( 'Logo Unit Bisnis', 'theme_admin' ),
	'type' => 'file',
));
$unit->add_field(array(
	'id' => 'logo_unit2',
	'name' => __( 'Logo Unit 2', 'theme_admin' ),
	'type' => 'file',
	'desc' => 'Isi Jika 1 Unit Bisnis Bekerja Sama',
));
$unit->add_field(array(
	'id' => 'banner_unit_bisnis',
	'name' => __( 'Background Unit Bisnis', 'theme_admin' ),
	'type' => 'file',
	'desc' => 'Ukuran : 1920 x 500',
));


$unit->add_field(array(
	'id' => 'desc_unit',
	'name' => __( 'Desc Unit', 'theme_admin' ),
	'type' => 'wp_editor',
));
$unit2 = $unit->add_group([
	'name' => 'Foto Kegiatan',
	'id' => 'kegiatan_unit',
	'options' => array(
		'add_item_text' => __('Foto', 'theme_admin'),
		'show_name' => true,
	),
	'controls' => array(
		'name' => 'Foto Kegiatan'
	)
]);

$unit2->add_field(array(
	'id' => 'foto_kegiatan',
	'name' => __( 'Foto Kegiatan', 'theme_admin' ),
	'type' => 'file',
));

$unit->add_field(array(
	'id' => 'alamat',
	'name' => __( 'Alamat', 'theme_admin' ),
	'type' => 'wp_editor',
));














} // end meta



add_action('admin_enqueue_scripts','page_metafield_options');
function page_metafield_options(){
    wp_register_script( 'metafield', THEME_CUSTOM_ASSETS_URI. '/js/metafield.js', false, null, true ); // We specify true here to tell WordPress this script needs to be loaded in the footer
    wp_enqueue_script( 'metafield' );
}