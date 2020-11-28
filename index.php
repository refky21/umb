<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package umytheme
 */

get_header();

?>
<div id="content" class="col-md-8 col-md-push-1 sidebar-right">
<?php if (have_posts()) : ?>
	<ul class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
		<li typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="<?php echo home_url('/'); ?>">Beranda</a></li>
		<li class="active"><?= the_title(); ?></li>
	</ul>
	
	<div class="section-header">
		<span>Hasil Pencarian :</span>
		<h2 class="section-title"><?= the_title(); ?></h2>
	</div>
	
	<?php while ( have_posts() ) : the_post(); ?>
	<article class="post" id="<?php the_ID(); ?>" <?php post_class('mb-30') ?>>
	<div class="row">
		<div class="col-md-4 col-sm-4 post-img">
			<a href="<?php the_permalink(); ?>">
			<img width="270" height="182" src="<?php the_post_thumbnail_url( 'full' ); ?>" class="attachment-ugm-archive-thumbnail-small size-ugm-archive-thumbnail-small wp-post-image" alt="" srcset="http://csps.ugm.ac.id/wp-content/uploads/sites/331/2017/12/jasa-Riset-270x182.png 270w, http://csps.ugm.ac.id/wp-content/uploads/sites/331/2017/12/jasa-Riset-360x242.png 360w, http://csps.ugm.ac.id/wp-content/uploads/sites/331/2017/12/jasa-Riset-560x376.png 560w" sizes="(max-width: 270px) 100vw, 270px" />			
							</a>
		</div>
		<div class="col-md-8 col-sm-8 post-content">
			<div class="post-title">
				<h3>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?></a>
				</h3>
				<p class="post-meta">
																<span class="post-category">
							<?php echo sprintf('%1s, %2s: <a href="%3s">%4s</a>', get_the_date(), __('oleh', 'umy'), get_author_posts_url(get_the_author_meta( 'ID' )), get_the_author_meta( 'display_name' )) ?>
				</p>
			</div>
			<div class="entry-content">
				<div class="ecae" style=""><?php the_excerpt(); ?></div>
		</div>
	</div>
</article>
	<?php endwhile;  ?>
	
	<?php
				theme_navigation();
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

</div>
<?php get_template_part( 'template-parts/sidebar'); ?>

<?php
get_footer();
