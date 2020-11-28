<?php
/**
 * Template Name: Direksi UMB
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
 * @package ptumb
 */

get_header();

$direksi_page = Xbox::get('direksi_page');
?>

<?php 
		if (have_posts()) : the_post(); 
			$post_id = get_the_ID();
			$single = true;
		?>

    <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
          <p class="mx-auto text-xl leading-relaxed md:w-3/4 xl:w-3/5 md:text-center">
           <?php the_content(); ?>
          </p>
        </div>
      </div>
    </div>

    <div class="bg-gray-300">
    <?php 
        $fotodireksi = $direksi_page->get_field_value('foto_pimpinan_direksi');
        if($fotodireksi != null):
    ?>

      <img src="<?= $fotodireksi; ?>" class="w-full mx-auto" style="max-width: 1920px;">
        <?php else: ?>
            <img  src="<?php bloginfo('template_directory');?>/assets/images/no.png" class="w-full mx-auto" style="max-width: 1920px;" />
    <?php 
    endif;?>
    </div>
<?php 
		endif; 
		?>
        <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
          <div>

            <div class="mb-6">
              <div class="font-bold"><?= $direksi_page->get_field_value('jabatan_direktur_direksi'); ?></div>
              <p><?= $direksi_page->get_field_value('nama_direktur_direksi'); ?></p>
            </div>
          
            <div class="-ml-6 md:flex md:flex-wrap">
            <?php
                $direksi = $direksi_page->get_field_value('manajer_direksi');

                foreach($direksi as $unit):
            ?>
              <div class="pl-6 pb-6 md:w-1/2">
                <div class="font-bold"><?= $unit['jabatan_manajer_direksi'];?></div>
                <p><?= $unit['nama_manajer_direksi'];?></p>
              </div>
                <?php endforeach; ?>
          
              
            </div>
          </div>
        </div>
      </div>
    </div>



<?php
get_footer();

?>