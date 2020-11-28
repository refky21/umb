<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package umytheme
 */
 setPostViews(get_the_ID());
?>

<ul class="breadcrumb mb-10">
            <li>
              <a href="/">Berita</a>
            </li>
            <li><?php the_title(); ?></li>
          </ul>
          <div class="grid grid-cols-2 gap-2 mb-10 md:gap-4">
            <div class="bg-gray-300 h-40 bg-cover bg-center" style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);"></div>
          </div>

          <p class="leading-relaxed">
          <?php the_content(); ?>
          </p>