<?php
/**
 * Template Name: Unit Bisnis
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
$unit_bisnis = Xbox::get('unit_bisnis_page');
?>
<?php 
		if (have_posts()) : the_post(); 
			$post_id = get_the_ID();
            $single = true;
            
		?>

<main class="min-h-full">
    <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
        <?php if($unit_bisnis->get_field_value('logo_unit2') != null){
            ?>
        <div class="flex mb-16 justify-center">
            <div class="w-64">
              <img src="<?= $unit_bisnis->get_field_value('logo_unit'); ?>" class="h-32 w-full object-contain" />
            </div>
            <div class="w-64 ml-10">
              <img src="<?= $unit_bisnis->get_field_value('logo_unit2'); ?>" class="h-32 w-full object-contain" />
            </div>
          </div>
        <?php
        }else{
            ?>

            <div class="w-64 block mx-auto mb-16">
            <img src="<?= $unit_bisnis->get_field_value('logo_unit'); ?>" class="h-32 w-full object-contain" />
            </div>

            <?php
        }
        ?>

          <p class="text-justify leading-relaxed">
          <?php the_content(); ?>
           </p>
        </div>
      </div>
    </div>

    <div class="bg-gray-300 overflow-hidden" style="height: 480px;">
      <img src="<?= $unit_bisnis->get_field_value('banner_unit_bisnis'); ?>" class="w-full object-cover" style="max-width: 1920px; height: 500px;">
    </div>

    <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
        <p class="text-justify leading-relaxed mb-10">
        <?= $unit_bisnis->get_field_value('desc_unit'); ?>
          </p>
          <div class="grid grid-cols-2 gap-2 md:gap-4 mb-10">
          <?php
            $foto = $unit_bisnis->get_field_value('kegiatan_unit');
            $i = 0;
            if($foto != null){
            foreach($foto as $f):
                $i++;
                $class1 = ($i == 1) ? 'h-48 bg-gray-300 col-span-2 md:col-span-1' : 'bg-gray-300 h-48';
                // $class12 = ($i == 1) ? 'h-48 bg-gray-300' : '';
                $class2 = ($i == 2) ? 'md:col-span-1 md:h-full md:row-span-2 overflow-hidden' : '';
          ?>
            <div class="<?= $class1; ?> <?= $class2; ?> bg-cover bg-center" style="background-image: url(<?= $f['foto_kegiatan']; ?>);"></div>
            <?php endforeach; }?>
            </div>

            <?= $unit_bisnis->get_field_value('alamat'); ?>

        </div>
      </div>
    </div>
  </main>



<?php 
		endif; 
		?>
<?php 
get_footer(); ?>