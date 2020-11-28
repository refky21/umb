<?php

add_filter( 'manage_edit-example_post_columns', 'edit_example_columns' );
add_filter( 'manage_edit-example_page_columns', 'edit_example_columns' );
function edit_example_columns( $columns ) {
	$columns = array(
		'cb' 		=> '<input type="checkbox" />',
		'title' 	=> __( 'Title', 'theme_admin' ),
		'image' 	=> __( 'Image', 'theme_admin' ),
		'category'	=> __( 'Category', 'theme_admin'),
		'date' 		=> __( 'Date', 'theme_admin'),
	);
	return $columns;
}

add_action( 'manage_posts_custom_column', 'manage_example_post_columns' );
function manage_example_post_columns( $column ) {
	global $post;
	$image = theme_get_attachment_src( get_post_meta($post->ID, 'collection_featured_image', true) );
	$categories = wp_get_post_terms( $post->ID, 'collection_category',  array('orderby' => 'term_order', 'order' => 'ASC', 'fields' => 'names'));
	
	if ( $post->post_type == "example_post" ) {
		switch( $column ) {

			case 'image':
				if( $image != '' ) {
					$resized_image_src = theme_get_image( $image, 60, 35, true );
					echo '<a rel="fancy" href="'.$image.'"><img src="' . $resized_image_src . '" /></a>';
				}
				break;

			case 'category':
				echo implode( ', ', $categories );
				break;
		}
	}
}

add_action( 'manage_pages_custom_column', 'manage_example_pages_columns' );
function manage_example_pages_columns( $column ) {
	global $post;
	$image = theme_get_attachment_src( get_post_meta($post->ID, 'collection_featured_image', true) );
	$categories = wp_get_post_terms( $post->ID, 'collection_category',  array('orderby' => 'term_order', 'order' => 'ASC', 'fields' => 'names'));
	
	if ( $post->post_type == "example_page" ) {
		switch( $column ) {

			case 'image':
				if( $image != '' ) {
					$resized_image_src = theme_get_image( $image, 60, 35, true );
					echo '<a rel="fancy" href="'.$image.'"><img src="' . $resized_image_src . '" /></a>';
				}
				break;

			case 'category':
				echo implode( ', ', $categories );
				break;
		}
	}
}

function title_save_pre_example($title) {
	if ( isset( $_REQUEST['post_type'] ) && isset( $_REQUEST['action'] ) ) {
		if ( $_REQUEST['post_type'] == 'example' && $_REQUEST['action'] == 'editpost' ) {
			$example_name = $_POST['example']['name'];
			return $example_name;
		}
	}
	return $title;
}
//add_filter ('title_save_pre', 'title_save_pre_collection');

/**
 * Change Display Category from Checkbox to Radio Button
 */

//Remove taxonomy meta box
add_action( 'admin_menu', 'myprefix_remove_meta_box');
function myprefix_remove_meta_box(){
   remove_meta_box('example_radio_category'.'div', 'example_post', 'side');
}

//Add new taxonomy meta box
add_action( 'add_meta_boxes', 'myprefix_add_meta_box');
function myprefix_add_meta_box() {
	add_meta_box( 'example_radio_category'.'_radio', 'Example Radio Categories', 'myprefix_mytaxonomy_metabox', 'example_post' , 'side', 'core');
}
 
function myprefix_mytaxonomy_metabox( $post ) {
	//Get taxonomy and terms
    $taxonomy = 'example_radio_category';
 
    //Set up the taxonomy object and get terms
    $tax = get_taxonomy($taxonomy);
    $terms = get_terms($taxonomy,array('hide_empty' => 0));
 
    //Name of the form
    $name = 'tax_input[' . $taxonomy . ']';
 
    //Get current and popular terms
    $popular = get_terms( $taxonomy, array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 10, 'hierarchical' => false ) );
    $postterms = get_the_terms( $post->ID,$taxonomy );
    $current = ($postterms ? array_pop($postterms) : false);
    $current = ($current ? $current->term_id : 0);
    ?>
 
    <div id="taxonomy-<?php echo $taxonomy; ?>" class="categorydiv">
 
        <!-- Display tabs-->
        <ul id="<?php echo $taxonomy; ?>-tabs" class="category-tabs">
            <li class="tabs"><a href="#<?php echo $taxonomy; ?>-all" tabindex="3"><?php echo $tax->labels->all_items; ?></a></li>
            <li class="hide-if-no-js"><a href="#<?php echo $taxonomy; ?>-pop" tabindex="3"><?php _e( 'Most Used' ); ?></a></li>
        </ul>
 
        <!-- Display taxonomy terms -->
        <div id="<?php echo $taxonomy; ?>-all" class="tabs-panel">
            <ul id="<?php echo $taxonomy; ?>checklist" class="list:<?php echo $taxonomy?> categorychecklist form-no-clear">
                <?php   foreach($terms as $term){
                    $id = $taxonomy.'-'.$term->term_id;
                    echo "<li id='$id'><label class='selectit'>";
                    echo "<input type='radio' id='in-$id' name='{$name}'".checked($current,$term->term_id,false)."value='$term->term_id' />$term->name<br />";
                   echo "</label></li>";
                }?>
           </ul>
        </div>
 
        <!-- Display popular taxonomy terms -->
        <div id="<?php echo $taxonomy; ?>-pop" class="tabs-panel" style="display: none;">
            <ul id="<?php echo $taxonomy; ?>checklist-pop" class="categorychecklist form-no-clear" >
                <?php   foreach($popular as $term){
                    $id = 'popular-'.$taxonomy.'-'.$term->term_id;
                    echo "<li id='$id'><label class='selectit'>";
                    echo "<input type='radio' id='in-$id'".checked($current,$term->term_id,false)."value='$term->term_id' />$term->name<br />";
                    echo "</label></li>";
                }?>
           </ul>
       </div>
 
    </div>
    <?php
}

add_action('admin_enqueue_scripts','myprefix_radiotax_javascript');
function myprefix_radiotax_javascript(){
    wp_register_script( 'radiotax', THEME_ADMIN_ASSETS_URI. '/js/radiotax.js', array('jquery'), null, true ); // We specify true here to tell WordPress this script needs to be loaded in the footer
    wp_enqueue_script( 'radiotax' );
}

?>