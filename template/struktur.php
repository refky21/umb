<?php
/**
 * Template Name: Struktur Organisasi
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
$struktur_page = Xbox::get('struktur_page');
?>
    <?php 
        if (have_posts()) : the_post(); 
        $post_id = get_the_ID();
        $single = true;

    ?>
    <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
        <div class="xl:-mx-8">
            <div class="py-16">
                <div class="mb-12">
                <?php
                    $unit = $struktur_page->get_field_value('unitusaha_page');
                    $i = 0;
                    foreach($unit as $u):
                        $i++;
                        $class = ($i == 1) ? ' ' : 'hidden';
                ?>
                <div class="slides <?= $class; ?>">
                    <h1 class="uppercase font-bold text-2xl text-center mb-10 mx-auto" style="max-width: 420px;">
                    <?= $u['nama_unit_struktur'];?>
                    </h1>
        
                    <div>
                    <?= $u['desc_unit_struktur'];?>
                        <!-- <img src="assets/images/organization-structures/persewaan-gedung.png" alt="" class="w-full object-contain" style="height: 500px;"> -->
                    </div>
                </div>
                    <?php endforeach; ?>
                </div>
                <div class="shadow-card-top flex flex-wrap justify-center -ml-1">
                <?php
                    $unit = $struktur_page->get_field_value('unitusaha_page');
                    $ii = 0;
                    foreach($unit as $u):
                        $ii++;
                        $class = ($ii == 1) ? 'bg-yellow-500' : 'bg-gray-300';
                ?>
            <a href="javascript:void(0)" class="tooltip ml-1 mb-4 relative" onclick="currentSlide(<?= $ii; ?>)">
              <div class="dots w-16 h-16 <?= $class; ?>  rounded-full relative">
                <img src=" <?= $u['icon_struktur'];?>" alt="" class="h-10 w-10 absolute-center">
              </div>
              <span class="tooltip-content"><?= $u['nama_unit_struktur'];?></span>
            </a>
            <?php endforeach; ?>
           
          </div>
            </div>
        </div>
    </div>




<?php 
		endif; 
		?>
<script>
    document.getElementById('navBtn').addEventListener('click', e => {
      document.getElementById('navMenu').classList.toggle('hidden')
    });

    let slideIndex = 1

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      const slides = document.getElementsByClassName('slides');
      const dots = document.getElementsByClassName('dots');

      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}

      for (i = 0; i < slides.length; i++) {
        slides[i].classList.add('hidden');
      }

      for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove('bg-yellow-500');
        dots[i].classList.add('bg-gray-300');
      }

      slides[slideIndex-1].classList.remove('hidden');

      dots[slideIndex-1].classList.add('bg-yellow-500');
    }
  </script>
<?php get_footer(); ?>