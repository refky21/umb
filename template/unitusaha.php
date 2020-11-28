<?php
/**
 * Template Name: Unit Usaha
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
$unit_usaha = Xbox::get('profile_page');
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

          <div class="md:flex md:justify-center md:flex-wrap md:-ml-6">

        <?php
            $unitusaha = $unit_usaha->get_field_value('unitusaha_page');
                foreach($unitusaha as $unit):
        ?>
            <div class="flex items-center mb-6 md:w-1/3 md:ml-6 xl:w-1/4">
              <a href="<?= $unit['link_unit_usaha'];?>" class="flex-none">
                <div class="w-16 h-16 bg-yellow-500 rounded-full relative">
                  <img src="<?= $unit['icon_unit_usaha'];?>" class="h-10 w-10 absolute-center">
                </div>
              </a>
              <p class="ml-4"><?= $unit['nama_unit_usaha'];?></p>
            </div>
                <?php endforeach; ?>
            
          </div>
        </div>
      </div>
    </div>
    <?php 
		endif; 
		?>



<?php 
get_footer(); ?>