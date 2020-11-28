<?php 
	// Add theme support feature image
	add_theme_support( 'post-thumbnails' );

	// Removing Some Menu in Dashboard
	if(!function_exists('remove_menus')){
		function remove_menus(){
			global $submenu;
			remove_menu_page ( 'index.php' );							//Dashboard
			remove_submenu_page ( 'index.php', 'update-core.php' );		//Dashboard->Updates
  			//remove_menu_page( 'edit.php' );							//Post
			remove_menu_page( 'upload.php' );               			//Media
  			//remove_menu_page( 'edit.php?post_type=page' );			//Pages
  			remove_menu_page( 'edit-comments.php' );					//Comments	
		}
		//add_action('admin_menu', 'remove_menus');
	}

	if(!function_exists('remove_admin_bar_links')){
		function remove_admin_bar_links() {
			global $wp_admin_bar;
			$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
			$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
			$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
			$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
			$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
			$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
			$wp_admin_bar->remove_menu('comments');   		// Remove Comments
			$wp_admin_bar->remove_menu('updates');     		// Remove Update Link
			//$wp_admin_bar->remove_menu('new-post');    		// Remove New Post
			$wp_admin_bar->remove_menu('new-media');   		// Remove New Page
			//$wp_admin_bar->remove_menu('new-page');     	// Remove New Media
		}
		//add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );
	}

	// Rename label Post
	if(!function_exists('change_post_label')){
		function change_post_label() {
		    global $menu;
		    global $submenu;
		    // $menu[5][0] = __('News', 'theme_admin');
		    // $submenu['edit.php'][5][0] = __('News', 'theme_admin');
		    // $submenu['edit.php'][10][0] = __('Add New', 'theme_admin');
		    // $submenu['edit.php'][16][0] = __('Tags', 'theme_admin');

		    $submenu['edit.php?post_type=dgl_event_sub'][5][0] = __('Submissions', 'theme_admin');
		    
		    echo '';
		}
		add_action( 'admin_menu', 'change_post_label' );
	}
	if(!function_exists('change_post_object')){
		function change_post_object() {
		    global $wp_post_types;
		    $labels = &$wp_post_types['post']->labels;
		    $labels->name = __('News', 'theme_admin');
		    $labels->singular_name = __('News', 'theme_admin');
		    $labels->add_new = __('Add New', 'theme_admin');
		    $labels->add_new_item = __('Add New', 'theme_admin');
		    $labels->edit_item = __('Edit News', 'theme_admin');
		    $labels->new_item = __('News', 'theme_admin');
		    $labels->view_item = __('View News', 'theme_admin');
		    $labels->search_items = __('Search News', 'theme_admin');
		    $labels->not_found = __('No News found', 'theme_admin');
		    $labels->not_found_in_trash = __('No News found in Trash', 'theme_admin');
		    $labels->all_items = __('All News', 'theme_admin');
		    $labels->menu_name = __('News', 'theme_admin');
		    $labels->name_admin_bar = __('News', 'theme_admin');
		}
	 	//add_action( 'init', 'change_post_object' );
	}

	if(!function_exists('change_comment_label')) {
		function change_comment_label(){
			global $menu;
		    $menu[25][0] = __('Ask Librarian', 'theme_admin');
		}
		//add_action( 'admin_menu', 'change_comment_label' );
	}

	// Modify Footer Credits
	if(!function_exists('modify_footer_admin')){
		function modify_footer_admin(){  
			_e('Developed by <a href="http://perpusnas.go.id" target="_blank">Perpusnas</a>', 'theme_admin');  
		}  
		//add_filter('admin_footer_text', 'modify_footer_admin');
	}

	if(!function_exists('replace_footer_version')){
		function replace_footer_version(){
		  return __('Perpusnas Theme 1.0', 'theme_admin');
		}
		//add_filter('update_footer', 'replace_footer_version', '1234');
	}

	//Custom Admin Logo Link
	if(!function_exists('change_wp_login_url')){
		function change_wp_login_url() {
			return home_url('/'); ;  // OR ECHO YOUR OWN URL
		}
		//add_filter('login_headerurl', 'change_wp_login_url');
	}
 
	// Custom Admin Logo & alt text
	if(!function_exists('change_wp_login_title')){
		function change_wp_login_title() {
			return __('Solusi Domba', 'theme_admin'); // OR ECHO YOUR OWN ALT TEXT
		}
		//add_filter('login_headertitle', 'change_wp_login_title');
	}

	if(!function_exists('custom_login_logo')){
		function custom_login_logo() { ?>
		    <style type="text/css">
		    	html{
		    		background: rgba(0,0,0,.7);
		    	}
		    	body.login{
		    		background: transparent;
		    	}
		        body.login div#login h1 a {
		            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-login.png);
		            background-size: 320px auto;
		            padding-bottom: 30px;
		            width: 320px;
		            height: 90px;
		        }
		        .login form{
		        	background: rgba(255,255,255,.1);
		        	border-radius: 3px;
		        }
		        .login label{
		        	color: #fff;
		        }
		        .wp-core-ui #loginform .button-primary{
		        	background: #e2963b;
		        	border: none;
		        	box-shadow: none;
		        	font-size: 16px;
		        	text-shadow: none;
		        }
		        .wp-core-ui #loginform .button-primary:hover,
		        .wp-core-ui #loginform .button-primary:focus{
		        	background: #cc7d1e;
		        }
		        .wp-core-ui .button-group.button-large .button, .wp-core-ui .button.button-large{
		        	height: 40px;
		        }
		    </style>
		<?php }
		//add_action( 'login_enqueue_scripts', 'custom_login_logo' );
	}


	// Disable Update
	if (!function_exists('disable_update')) {
		function disable_update(){
			remove_action( 'load-update-core.php', 'wp_update_themes' );
			add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );
			wp_clear_scheduled_hook( 'wp_update_themes' );

			//Disable Plugin Updates #3.0+
			remove_action( 'load-update-core.php', 'wp_update_plugins' );
			add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
			wp_clear_scheduled_hook( 'wp_update_plugins' );

			//Diasable Core Updates # 3.0+
			add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );
			wp_clear_scheduled_hook( 'wp_version_check' );
		}
	}

	// Custom Browser Title Admin
	if (!function_exists('my_admin_title')){
		function my_admin_title($admin_title, $title){
		    return get_bloginfo('name').' &bull; '.$title;
		}
		//add_filter('admin_title', 'my_admin_title', 10, 2);
	}

	// Add Toolbar Menu Item
	if (!function_exists('add_toolbar_items')){
		function add_toolbar_items($admin_bar){     
			$admin_bar->add_menu( array(         
				'id'    => 'help',         
				'title' => '<span class="ab-icon"></span><span class="ab-label">Bantuan</span>',         
				'href'  => home_url().'/help/',         
				'meta'  => array(             
					'title' 	=> __('Bantuan', 'theme_admin'),  
					'target'	=> '_blank'                   
				),     
			));   
		}
		//add_action('admin_bar_menu', 'add_toolbar_items', 100); 
	}

	
	// Add subtitle support
	//function add_wps_subtitle_work_support() {
	//    add_post_type_support( 'work', 'wps_subtitle' );
	//}
	//add_action( 'init', 'add_wps_subtitle_work_support' );

?>