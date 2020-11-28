
<div id="sidebar" class="col-md-3 col-md-offset-1">
	<div class="row">
<?php  
				$query = array(
					'post_type'		=> get_post_type(),
					'post_status'	=> 'publish',
					'posts_per_page'=> 5,
					'post__not_in' 	=> array(get_the_ID()),
					'suppress_filters'=> false	
				);

				$results = query_posts( $query );

				if (have_posts()) :
			?>
		<div id="recent-posts-2" class="col-md-12 widget widget-recent"><div class="widget-header"><h2 class="widget-title">Recent Posts</h2></div>
		<ul id="recent-post-list" class="post-list">
							<?php while (have_posts()) : the_post(); ?>
					<li>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</li>
				<?php endwhile; ?>
					</ul>

		</div>
		<?php  
				endif;
				wp_reset_query();
			?>
	</div> <!-- widget-area -->
</div> <!-- side-bar -->
<?php if (have_posts()) : ?>
<div id="sidebar" class="col-md-3 col-md-offset-1">
	<div class="row">
<?php
				$categories = get_categories( array(
					'taxonomy'		=> get_post_type() == 'post' ? 'category' : 'event_category',
					'hide_empty'	=> 0,
				    'orderby' 		=> 'name',
				    'order'   		=> 'ASC'
				) );

				if (!empty($categories)) :
 			?>
		<div id="recent-posts-2" class="col-md-12 widget widget-recent"><div class="widget-header"><h2 class="widget-title"><?php _e('Kategori', 'umy'); ?></h2></div>
		<ul id="recent-post-list" class="post-list">
							<?php  foreach( $categories as $category ) :
				    $category_link = sprintf( 
				        '<a href="%1$s" alt="%2$s">%3$s</a>',
				        esc_url( get_category_link( $category->term_id ) ),
				        esc_attr( sprintf( __( '%s', 'umy' ), $category->name ) ),
				        esc_html( $category->name )
				    );
				 ?>
					<li><?php echo $category_link; ?></li>
				<?php endforeach; ?>
					</ul>

		</div>
		<?php  
				endif;
				wp_reset_query();
			?>
	</div> <!-- widget-area -->
</div> <!-- side-bar -->
<?php endif; ?>