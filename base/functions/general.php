<?php

// Add .last to last menu item
// add_filter('wp_nav_menu','add_last_item_class');
function add_last_item_class($menuHTML) {
    $last_items_ids  = array();

    // Get all custom menus
    $menus = wp_get_nav_menus();
    
    // For each menu find last items
    foreach ( $menus as $menu_maybe ) {

        // Get items of specific menu
        if ( $menu_items = wp_get_nav_menu_items($menu_maybe->term_id) ) {

            $items = array();
            foreach ( $menu_items as $menu_item ) {
               $items[$menu_item->menu_item_parent][] .= $menu_item->ID;
            }

            // Find IDs of last items
            foreach ( $items as $item ) {
                $last_items_ids[] .= end($item);
            }
        }
    }

    foreach( $last_items_ids as $last_item_id ) {
        $items_add_class[] .= ' menu-item-'.$last_item_id;
        $replacement[]     .= ' menu-item-'.$last_item_id . ' last';
    }

    $menuHTML = str_replace($items_add_class, $replacement, $menuHTML);
    return $menuHTML;
}

function theme_options( $section = '', $field = '' ) {
	$theme_options = get_option( THEME_SLUG . '_options' );
	
	if ( !isset( $theme_options ) ) return null;
	
	if ( '' != $section && '' != $field ) return ( isset( $theme_options[$section][$field] ) ) ? $theme_options[$section][$field] : null;
	elseif ( '' != $section ) return ( isset( $theme_options[$section] ) ) ? $theme_options[$section] : null;
	else return ( isset( $theme_options ) ) ? $theme_options : null;
}

function theme_reset_options() {
	delete_option( THEME_SLUG . '_options' );
}

function getContrastYIQ( $hexcolor ){
	$r = hexdec( substr ( $hexcolor, 1, 2 ) );
	$g = hexdec( substr( $hexcolor, 3, 2 ) );
	$b = hexdec( substr( $hexcolor, 5, 2 ) );
	$yiq = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;
	return ( $yiq >= 128 ) ? '#333' : '#FFF';
}

function getDarkLightYIQ( $hexcolor ){
	$r = hexdec( substr ( $hexcolor, 1, 2 ) );
	$g = hexdec( substr( $hexcolor, 3, 2 ) );
	$b = hexdec( substr( $hexcolor, 5, 2 ) );
	$yiq = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;
	return ( $yiq >= 128 ) ? 'light' : 'dark';
}

function adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
}

function theme_get_attachment_src( $attachment_id ) {
	if( wp_get_attachment_url( $attachment_id ) ) return str_replace( ' ', '%20', wp_get_attachment_url( $attachment_id ) );
	else return $attachment_id;
}

function theme_get_image( $attachment_id, $width = null, $height = null, $crop = false ) {
    if( filter_var($attachment_id, FILTER_VALIDATE_URL) ) $image_url = $attachment_id;
    else $image_url = wp_get_attachment_url( $attachment_id );
   
    if( $width != null || $height != null ) {
        // $resized_image = fImg::resize( $image_url, $width, $height, $crop );
        $resized_image = aq_resize( $image_url, $width, $height, $crop, true );
        if($resized_image) {
            return $resized_image;
        } else {
            return $image_url;
        }
    } else {
        return $image_url;
    }
}

function theme_breadcrumnb() {
    if ( function_exists('yoast_breadcrumb') ) {
    ?>
    <div class="site-breadcrumbs">
        <div class="container">
            <?php yoast_breadcrumb('<div class="breadcrumbs">','</div>'); ?>
        </div>
    </div>
    <?php
    } 
}

function theme_navigation() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation text-center mb-50"><ul class="list-inline d-inline-block">' . "\n";

    /** On the first page, don't put the First page link */
    if ( $paged != 1 )
        echo '<li class="list-inline-item nav-arrow first-page"><a href='.get_pagenum_link(1).'><i class="fas fa-step-backward"></i></a></li>';
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="list-inline-item nav-arrow prev-post">%s</li>' . "\n", get_previous_posts_link('<i class="fas fa-chevron-left"></i>') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="list-inline-item active"' : ' class="list-inline-item"';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="list-inline-item active"' : ' class="list-inline-item"';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="list-inline-item active"' : ' class="list-inline-item"';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="list-inline-item nav-arrow next-post">%s</li>' . "\n", get_next_posts_link('<i class="fas fa-chevron-right"></i>') );

    /** On the last page, don't put the Last page link */
    if ( $paged != $max )
        echo '<li class="list-inline-item nav-arrow last-page"><a href='.get_pagenum_link($max).'><i class="fas fa-step-forward"></i></a></li>';
 
    echo '</ul></div>' . "\n";
 
}