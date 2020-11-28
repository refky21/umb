<?php
/**
 * Template Name: Profil UMB
 *
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
$profile = Xbox::get('profile_page');
?>
<?php 
		if (have_posts()) : the_post(); 
			$post_id = get_the_ID();
            $single = true;
            
		?>
    <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
         <?php the_content(); ?>
        </div>
      </div>
    </div>

    <div class="bg-cover bg-center relative" style="background-image: url(<?= $profile->get_field_value('foto_visi');?>)">
      <div class="px-6 max-w-screen-md mx-auto relative z-20 md:px-8 xl:max-w-screen-lg">
        <div class="xl:-mx-8">
          <div class="py-16 xl:flex xl:justify-end">
            <div class="text-2xl text-gray-100 xl:w-1/2 xl:pl-8">
            <?= $profile->get_field_value('visi_text');?>
             </div>
          </div>
        </div>
      </div>
    
      <div class="inset-y-0 right-0 absolute bg-black bg-opacity-75 z-10 w-full xl:w-1/2 xl:h-full"></div>
    </div>

    <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
          <div class="mb-10">
          <?= $profile->get_field_value('misi_text');?>
        </div>
      </div>
    </div>
    <?php 
		endif; 
		?>
<?php
get_footer();
