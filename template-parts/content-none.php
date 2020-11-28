<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package umytheme
 */

?>

	<ul class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
		<li typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="<?php echo home_url('/'); ?>">Home</a></li>
		<li class="active"><?php esc_html_e( 'Tidak ketemu', 'umy' ); ?></li>
	</ul>
	<div class="section-header">
		<span>Halaman / Arsip:</span>
		<h2 class="section-title"><?php esc_html_e( 'Tidak ketemu', 'umy' ); ?></h2>
	</div>
	
	<article class="no-results">
	<div class="page-content">
		<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'umy' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			elseif ( is_search() ) :
				?>

				<p><?php esc_html_e( 'Maaf, tidak ada yang sesuai dengan kata kunci pencarian. Silakan coba lagi dengan kata kunci pencarian yang lain.', 'umy' ); ?></p>
				<div class="input-group btn-group">
					<?php
					get_search_form();
					?>
				</div>
				
			<?php

			else :
				?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'umy' ); ?></p>
				<div class="input-group btn-group">
					<?php
					get_search_form();
					?>
				</div>
				
			<?php

			endif;
			?>
</article>



