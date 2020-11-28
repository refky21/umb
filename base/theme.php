<?php
class Theme {
	var $widgets;
	var $options;
	var $shortcodes;

	// Initialize theme.
	function init( $options ) {
		// Define theme's constants.
		$this->theme_config( $options );

		// Theme support.
		add_action( 'after_setup_theme', array( &$this, 'theme_support' ) );
		
		// Load theme's core.
		$this->theme_functions();
		
		// Theme's plugins.
		$this->theme_plugins();
		
		// Theme's shortcodes.
		$this->theme_shortcodes();
		
		// Theme's widgets.
		add_action( 'widgets_init', array( &$this, 'theme_widgets' ) );
		
		// Theme's sidebars
		$this->theme_sidebars();

		// Theme's post types
		$this->theme_types();

		$this->theme_metas();
		
		// Theme's scripts
		add_action( 'wp_enqueue_scripts', array( &$this, 'theme_fonts' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'theme_styles' ) );
		add_action( 'wp_enqueue_scripts', array( &$this, 'theme_scripts' ), 100 );
		add_action(	'wp_head', array(&$this, 'theme_custom_header'));

		// Theme's translation - Polylang
		$this->theme_translation();
		
		// Theme's admin.
		$this->theme_admin();
		
	}

	function theme_config( $options ) {
		$this->types = $options['theme_types'];
		$this->metas = $options['theme_custom_metas'];
		$this->menus = $options['theme_menus'];
		$this->sidebars = $options['theme_sidebars'];
		$this->options = $options['theme_options'];
		$this->plugins = $options['theme_plugins'];
		$this->shortcodes = $options['theme_shortcodes'];
		
		// Get Theme Data from style.css
		$theme_data = wp_get_theme(get_option('template'));
		
		// Core
		define( 'THEME_NAME', $options['theme_name'] );
		define( 'THEME_SLUG', $options['theme_slug'] );
		define( 'THEME_VERSION', $theme_data['Version'] );
		define( 'THEME_URI', get_template_directory_uri() );
		define( 'THEME_FRAMEWORK_URI', THEME_URI.'/base' );
		define( 'THEME_STYLE_URI', THEME_URI.'/assets' );
		define( 'THEME_DIR', get_template_directory() );
		define( 'THEME_FRAMEWORK_DIR', THEME_DIR.'/base' );
		define( 'THEME_TYPES_DIR', THEME_FRAMEWORK_DIR.'/types' );
		define( 'THEME_OPTIONS_DIR', THEME_FRAMEWORK_DIR.'/options' );
		define( 'THEME_FUNCTIONS_DIR', THEME_FRAMEWORK_DIR.'/functions' );
		define( 'THEME_PLUGINS_DIR', THEME_FRAMEWORK_DIR.'/plugins' );
		define( 'THEME_PLUGINS_URI', THEME_FRAMEWORK_URI.'/plugins' );
		define( 'THEME_SHORTCODES_DIR', THEME_FRAMEWORK_DIR.'/shortcodes' );
		define( 'THEME_WIDGETS_DIR', THEME_FRAMEWORK_DIR.'/widgets' );
		
		// Admin
		define( 'THEME_ADMIN_DIR', THEME_FRAMEWORK_DIR.'/admin' );
		define( 'THEME_ADMIN_FUNCTIONS_DIR', THEME_ADMIN_DIR.'/functions' );
		define( 'THEME_ADMIN_ASSETS_DIR', THEME_FRAMEWORK_DIR.'/assets' );
		define( 'THEME_ADMIN_ASSETS_URI', THEME_FRAMEWORK_URI.'/assets' );
		
		// Custom
		define( 'THEME_CUSTOM_DIR', THEME_FRAMEWORK_DIR.'/custom' );
		define( 'THEME_CUSTOM_URI', THEME_FRAMEWORK_URI.'/custom' );
		define( 'THEME_CUSTOM_ASSETS_URI', THEME_FRAMEWORK_URI.'/custom/assets' );
		
		// Styles
		define( 'THEME_ASSETS_STYLE', THEME_URI.'/assets/css');
		define( 'THEME_ASSETS_FONTS', THEME_URI.'/assets/fonts');
		
		// Javascript
		define( 'THEME_JS', THEME_URI.'/assets/js/');
		define( 'THEME_JS_LIBRARY', THEME_URI.'/assets/js/library');
		define( 'THEME_JS_PLUGINS', THEME_URI.'/assets/js/plugins');
	}

	function theme_support() {
		if( function_exists( 'add_theme_support' ) ) {
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * If you're building a theme based on afm, use a find and replace
			 * to change 'afm' to the name of your theme in all the template files.
			 */
			load_theme_textdomain( 'afm', THEME_FRAMEWORK_DIR . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support( 'title-tag' );

			// WordPress Navigation Menu
			register_nav_menus( $this->menus );
			/*$custom_sidebars = get_posts('post_type=custom_sidebar&orderby=menu_order&order=ASC&numberposts=-1');
			foreach ($custom_sidebars as $sidebar){
				$sidebar_name = get_post_meta($sidebar->ID, 'info_name', true);
				$sidebar_desc = get_post_meta($sidebar->ID, 'info_short_desc', true);
				$location = str_replace( ' ', '-', strtolower( $sidebar_name ) );
				$description = $sidebar_desc;
				register_nav_menu( $location, $description );
			}*/

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'afm_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			
		}
	}

	function theme_functions() {
		require_once( THEME_CUSTOM_DIR . '/custom-hook.php' );
		require_once( THEME_CUSTOM_DIR . '/custom-tags.php');
		require_once( THEME_CUSTOM_DIR . '/customizer.php' );
		
		require_once( THEME_FUNCTIONS_DIR . '/aq_resizer.php' );
		require_once( THEME_FUNCTIONS_DIR . '/general.php' );
		require_once( THEME_FUNCTIONS_DIR . '/walker.php' );

		if ( defined( 'JETPACK__VERSION' ) ) {
			require_once(THEME_FUNCTIONS_DIR . '/jetpack.php');
		}
	}

	function theme_plugins() {
		foreach ( $this->plugins as $plugin ) {
			require_once( THEME_PLUGINS_DIR . '/' . $plugin . '/' . $plugin . '.php' );
		}
	}

	function theme_shortcodes() {
		//require_once( THEME_SHORTCODES_DIR . '/fix.php' );			// Fix
		foreach ( $this->shortcodes as $shortcode ) {
			require_once( THEME_SHORTCODES_DIR . '/' . $shortcode . '.php' );
		}
	}

	function theme_widgets() {
	}

	function theme_sidebars() {
		foreach( $this->sidebars as $theme_sidebar ){
			register_sidebar($theme_sidebar);
		}

		$custom_widgets = get_posts('post_type=custom_widget&orderby=menu_order&order=ASC&numberposts=-1');
		foreach ($custom_widgets as $widget){
			$widget_name = get_post_meta($widget->ID, 'widget_name', true);
			$widget_desc = get_post_meta($widget->ID, 'widget_short_desc', true);
			$location = str_replace( ' ', '-', strtolower( $widget_name ) );
			$description = $widget_desc;
			register_sidebar( array(
				'name'          => __( $widget_name, 'theme_admin' ),
				'id'            => $location,
				'description'   => __( $description, 'theme_admin' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="widget-title">',
				'after_title'   => '</h4>',
			));
		}	
	}

	function theme_types() {
		foreach( $this->types as $type ) {
			require_once( THEME_TYPES_DIR . '/' . $type . '/register.php' );
			require_once( THEME_TYPES_DIR . '/' . $type . '/content.php' );
		}
	}
	function theme_metas() {
		foreach( $this->metas as $meta ) {
			require_once( THEME_TYPES_DIR . '/' . $meta . '/content.php' );
		}
	}
	

	function theme_scripts() {
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
			/////////// JS Libs

			// Jquery
			wp_enqueue_script( 'jquery' );
			// wp_enqueue_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', false, THEME_VERSION, false );

			// Modernizr
			// wp_enqueue_script( 'modernizr',  THEME_JS . 'modernizr.custom.js', false, THEME_VERSION, false );

			// Bootstrap
			// wp_enqueue_script( 'bootstrap', THEME_JS . 'bootstrap.min.js', false, THEME_VERSION, true );

			// Parallaax
			// wp_enqueue_script( 'parallax', THEME_JS . 'parallax.min.js', false, THEME_VERSION, true );
			
			// Skip Link
			// wp_enqueue_script( 'skip-link-focus', THEME_JS . 'skip-link-focus-fix.js', false, THEME_VERSION, true );

			// Owl Carousel
			// wp_enqueue_script( 'owl-carousel', THEME_JS . 'owl.carousel.min.js', false, THEME_VERSION, false );

			// Match Height
			// wp_enqueue_script( 'jquery-match-height', THEME_JS . 'jquery.matchHeight.js', false, THEME_VERSION, true );

			// Slide Menu
			// wp_enqueue_script( 'slide-menu', THEME_JS . 'slide-menu.min.js', false, THEME_VERSION, true );

			// JQCloud
			// wp_enqueue_script( 'jqcloud', THEME_JS . 'jqcloud.min.js', false, THEME_VERSION, true );

			// Fancybox
			// wp_enqueue_script( 'jquery-fancybox', THEME_JS . 'jquery.fancybox.min.js', false, THEME_VERSION, true );

			// Appear
			// wp_enqueue_script( 'jquery-appear', THEME_JS . 'jquery.appear.js', false, THEME_VERSION, true );

			// Sticky
			// wp_enqueue_script( 'jquery-sticky', THEME_JS .'jquery.sticky.js', false, THEME_VERSION, true );
			
			// Images Loaded
			// wp_enqueue_script( 'images-loaded', THEME_JS . 'imagesloaded.pkgd.min.js', false, THEME_VERSION, true );

			// Infinite Scroll
			// wp_enqueue_script( 'infinite-scroll', THEME_JS . 'infinite-scroll.pkgd.min.js', false, THEME_VERSION, true );

			// Isotope
			// wp_enqueue_script( 'isotope', THEME_JS . 'isotope.pkgd.min.js', false, THEME_VERSION, true );

			// Comment
			//wp_enqueue_script( 'comment' );
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
			
			// Theme App Scripts
			// wp_enqueue_script( 'theme-core-script',  THEME_JS . 'scripts.js', false, THEME_VERSION, 'all' );
		}
	}
	
	function theme_fonts() {
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
			// Fonts
			wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap', false, THEME_VERSION );
		}
	}

	function theme_styles() {
		if ( !is_admin() && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ){
			// Bootstrap
			wp_enqueue_style( 'style',  THEME_ASSETS_STYLE . '/style.css', false, THEME_VERSION );

			// Owl Carousel
			wp_enqueue_style( 'theme-styles', get_stylesheet_uri() , false, THEME_VERSION );
		}
	}

	function theme_custom_header() {
		include( THEME_CUSTOM_DIR . '/custom-header.php' );
	}

	function theme_translation(){
		if (defined('POLYLANG_VERSION')) {

		}
	}

	function theme_admin() {
		if ( is_admin() || ( in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ) ) ) ) {
			require_once( THEME_ADMIN_DIR . '/admin.php' );
			$admin = new Theme_admin();
			$admin->init( $this );
		}
	}
}
?>