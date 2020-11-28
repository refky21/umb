<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package umytheme
 */

get_header();
?>
<main class="min-h-full">
    <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'template-parts/content', get_post_type() );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() ) :
		// comments_template();
	endif; ?>
<?php endwhile; // End of the loop. ?>
	
</div>
      </div>
    </div>
  </main>
<?php
get_footer();
