<?php
// Add specific CSS class by filter
add_filter('body_class','theme_class');
function theme_class($classes) {
	global $post;

	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	return $classes;
}

// Favicon
// add_action('wp_head', 'favicon', 1);
// add_action('admin_head', 'favicon', 1);
// function favicon() {
// 	$favicon = theme_get_attachment_src( theme_options('appearance', 'branding_favicon') );
// 	if( $favicon == '' ){
// 		$favicon = get_template_directory_uri() . '/assets/img/favicon.ico';
// 	}
// 	echo '<link rel="shortcut icon" type="image/x-icon" href="'.$favicon.'" />';
// }

// Hide Image in Blog Page
// add_filter('the_content','blog_content_filter');
function blog_content_filter($content){

    if ( is_home() ){
      $content = preg_replace("/<img[^>]+\>/i", "", $content);
    }

    return $content;
}

// Change Excerpt "More" text
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more( $more ) {
	global $post;
	return '<p><a href="'. get_permalink($post->ID) .'">' . theme_options('blog', 'read_more_text') . '</a></p>';
}


// Custom Password Required Template
// add_filter('the_password_form', 'base_password_form');
function base_password_form() {
    global $post;

    $label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);
    $output = '<form action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post" class="validate-form">
    <p>' . __('This post is password protected. Please fill the password:', 'theme_front') . '</p>
    <div class="form-input-item protected-password-input-item clearfix">
    <input name="post_password" class="input-text {required:true}" id="' . $label . '" type="password" size="20" value="" autocomplete="off" /><label for="' . $label . '">' . __('Password', 'theme_front') . ' <span class="required-star">*</span></label>
	</div>
	<div class="form-input-item clearfix">
	<button type="submit" name="Submit" class="button medium"><span>' . esc_attr__('Submit', 'theme_front') . '</span></button>
	</div>
    </form>';

    return $output;
}

add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
    return '<a class="more-link btn btn-default text-uppercase" href="' . get_permalink() . '">'.__('Read MOre', 'nourmand').'</a>';
}

if( !function_exists('id_fix_shortcodes') ) {
	add_filter('the_content', 'id_fix_shortcodes');
	add_filter('widget_text_conten', 'id_fix_shortcodes');
	function id_fix_shortcodes($content){
		$array = array (
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
}

add_filter( 'get_search_form', 'wpdocs_my_search_form' );
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" class="search-form" action="'.home_url( '/' ).'">
		<div class="form-group">
			<span class="screen-reader-text">'._x( 'Search for:', 'label' ).'</span>
			<input type="search" class="form-control search-field"
				placeholder="'.esc_attr_x( 'Cari ...', 'placeholder' ) .'"
				value="'.get_search_query().'" name="s"
				title="'.esc_attr_x( 'Search for:', 'label' ).'" />
			<button type="submit" class="btn btn-link search-submit"><span class="fa fa-search"></span></button>
		</div>
	</form>';
 
    return $form;
}

/**
 * Add a new line around paragraph links
 * @param string $content
 * @return string $content
 */
add_filter( 'the_content', 'my_autoembed_adjustments', 7 );
function my_autoembed_adjustments( $content ){
    $pattern = '|(?<!")(?<!"\s)(https?:\/\/[^\s"\[<]+)|im';    // your own pattern
    $to      = "<p>\n$1\n</p>";                          // your own pattern
    $content = preg_replace( $pattern, $to, $content );
    return $content;
}

add_filter( 'embed_oembed_html', 'mythemename_wrap_embeds', 10, 4 );
function mythemename_wrap_embeds( $html, $url, $attr, $post_id ) {
    return '<div class="embed-wrapper">' . $html . '</div>';
}

add_filter('nav_menu_css_class', 'custom_item_menu_class', 1, 3);
function custom_item_menu_class($classes, $item, $args) {
    if(property_exists($args, 'custom_item_menu_class')) {
        $classes[] = $args->custom_item_menu_class;
    }
    return $classes;
}

