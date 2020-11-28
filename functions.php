<?php
/**
 * afm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package umbtheme
 */
if( ! defined( 'XBOX_HIDE_DEMO' ) ){
	define( 'XBOX_HIDE_DEMO', true );
}
require_once( STYLESHEETPATH.'/base/theme.php' );
require_once( STYLESHEETPATH.'/base/config.php' );
require_once( STYLESHEETPATH.'/base/tgm.php' );


$theme = new Theme();
$theme->init( $theme_config );
function new_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class=" dropdown-menu " /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','new_submenu_class'); 


//Berita
add_action('init', 'foo_add_rewrite_rule');
function foo_add_rewrite_rule(){
    add_rewrite_rule('^berita?','index.php?is_berita_page=1&post_type=custom_post_type','top');
    //Customize this query string - keep is_foobar_page=1 intact
}

add_action('query_vars','foo_set_query_var');
function foo_set_query_var($vars) {
    array_push($vars, 'is_berita_page');
    return $vars;
}

add_filter('template_include', 'foo_include_template', 1000, 1);
function foo_include_template($template){
    if(get_query_var('is_berita_page')){
        $new_template = get_template_directory().'/template/berita.php';
        if(file_exists($new_template))
            $template = $new_template;
    }
    return $template;
}


function setPostViews($postID) {
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    }else{
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

require 'base/plugin/update/plugin-update-checker.php';
$MyUpdateChecker = PucFactory::buildUpdateChecker(
    'https://example.com/path/to/metadata.json',
    __FILE__,
    'your-chosen-slug'
);
