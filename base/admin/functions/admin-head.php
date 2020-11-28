<?php 
add_action('admin_head', 'theme_add_head');
add_action('customize_controls_enqueue_scripts', 'theme_add_head');
function theme_add_head() {
?>
	<style type="text/css">
		.customize-control-kirki-generic textarea{
		    min-width: auto !important;
		}
		<?php echo theme_options('custom', 'admin_style') ?>
	</style>
	<script type="text/javascript">
		var theme_admin_assets_uri = "<?php echo THEME_ADMIN_ASSETS_URI;?>";
		var post_id = "<?php @the_ID(); ?>";
		var ajax_url = '<?php echo home_url()."/wp-admin/admin-ajax.php" ?>';
		var current_city_id = '<?php echo get_post_meta(get_the_id(),"location_city", true); ?>';
	</script>
<?php
}

// Include JS
add_action('admin_enqueue_scripts', 'theme_admin_scripts');
function theme_admin_scripts( $page ) {

	if( !in_array( $page, array( 'edit.php', 'edit-tags.php', 'term.php', 'post.php', 'post-new.php', 'widget.php', 'widgets.php', 'toplevel_page_theme_setting') ) ) return;

	// jQuery
	wp_enqueue_script( 'jquery' );

	// jQuery UI - Sortable - Drag & Drop
	wp_enqueue_script( 'jquery-ui-sortable' );

	// jQuery Plugin
	wp_enqueue_script('jquery-plugin', THEME_ADMIN_ASSETS_URI . '/js/jquery.plugin.min.js', false, THEME_VERSION, false);
	
	//double check for WordPress version and function exists
  if(function_exists('wp_enqueue_media')) {
	 //call for new media manager
	 wp_enqueue_media();
	 wp_enqueue_script('media-upload-new', THEME_ADMIN_ASSETS_URI . '/js/media-upload.js', false, THEME_VERSION, false);
  }
  //old WP < 3.5
  else {
	 wp_enqueue_script('media-upload');
	 wp_enqueue_script('thickbox');
	 wp_enqueue_script('media-upload-old', THEME_ADMIN_ASSETS_URI . '/js/media-upload-old.js', false, THEME_VERSION, false);
  }

	// iPhone style checkbox
	wp_enqueue_script('iphone-style-checkboxes-script', THEME_ADMIN_ASSETS_URI . '/js/iphone-style-checkboxes.js', false, THEME_VERSION, false);
	wp_enqueue_script('iphone-style-tri-toggle', THEME_ADMIN_ASSETS_URI . '/js/iphone-style-tri-toggle.js', false, THEME_VERSION, false);
	
	// mColorPicker
	wp_enqueue_script('mcolor-picker-script', THEME_ADMIN_ASSETS_URI . '/js/mColorPicker.min.js', false, THEME_VERSION, false);
	
	// jQuery Colorbox
	wp_enqueue_script('jquery-colorbox', THEME_ADMIN_ASSETS_URI . '/js/colorbox/jquery.colorbox-min.js', false, THEME_VERSION, false);
	
	// jQuery Tools
	wp_enqueue_script('jquery-tools', THEME_ADMIN_ASSETS_URI . '/js/jquery.tools.min.js', false, THEME_VERSION, false);
	
	// jQuery Picker Date
	wp_enqueue_script('jquery-picker', THEME_ADMIN_ASSETS_URI. '/js/picker.js', false, THEME_VERSION, false);
	wp_enqueue_script('jquery-picker-date', THEME_ADMIN_ASSETS_URI. '/js/picker.date.js', false, THEME_VERSION, false);

	// jQuery Time Entry
	wp_enqueue_script('jquery-time-entry', THEME_ADMIN_ASSETS_URI . '/js/jquery.timeentry.js', false, THEME_VERSION, false);
	
	// jQuery Chosen
	wp_enqueue_script('jquery-chosen', THEME_ADMIN_ASSETS_URI . '/js/chosen.jquery.min.js', false, THEME_VERSION, false);

	// wp_register_script( 'radiotax', THEME_ADMIN_ASSETS_URI. '/js/radiotax.js', array('jquery'), null, true ); // We specify true here to tell WordPress this script needs to be loaded in the footer
    // wp_enqueue_script( 'radiotax' );
	
	// // Admin JS
	// wp_enqueue_script('theme-admin-script', THEME_ADMIN_ASSETS_URI . '/js/base-admin.js', false, THEME_VERSION, false);
	wp_enqueue_script('theme-custom-script', THEME_ADMIN_ASSETS_URI . '/js/custom-admin.js', false, THEME_VERSION, false);
	
	wp_enqueue_editor();
}

// Include CSS
add_action('admin_enqueue_scripts', 'theme_admin_styles');
function theme_admin_styles( $page ) {
	// Font Awesome
	wp_enqueue_style('font-awesome', THEME_URI . '/assets/css/font-awesome.min.css', false, THEME_VERSION);

	// Admin Style
	wp_enqueue_style('theme-admin-icons', THEME_ADMIN_ASSETS_URI . '/css/icons.css', false, THEME_VERSION);


	if( !in_array( $page, array( 'edit.php', 'edit-tags.php', 'term.php', 'post.php', 'post-new.php', 'widget.php', 'toplevel_page_theme_setting') ) ) return;
	// WordPress Media Upload
	wp_enqueue_style('thickbox');

	// jQuery Colorbox
	wp_enqueue_style('jquery-colorbox-style', THEME_ADMIN_ASSETS_URI . '/js/colorbox/colorbox.css', false, THEME_VERSION);

	// jQuery Chosen
	wp_enqueue_style('jquery-chosen-style', THEME_ADMIN_ASSETS_URI . '/css/chosen.css', false, THEME_VERSION);

	// Admin Style
	wp_enqueue_style('theme-admin-style', THEME_ADMIN_ASSETS_URI . '/css/stylesheet.css', false, THEME_VERSION);
}

?>