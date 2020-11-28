<?php
/**
 * Template Name: Alur Kerja
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
$alur_page = Xbox::get('alur_page');
?>
<?php 
        if (have_posts()) : the_post(); 
        $post_id = get_the_ID();
        $single = true;

    ?>


<div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
          <ul class="workflow-list mb-16">
          <?php
            $alur = $alur_page->get_field_value('unitusaha_page');
            $i = 0;
            foreach($alur as $a):
                $i++;
                $class1 = ($i == 1) ? '' : 'rounded-2xl';
                $class2 = ($i == 1) ? 'bg-yellow-500' : 'bg-gray-300';
                $class3 = ($i == 1) ? '' : 'md:ml-10';
          ?>
            <li class="dots relative w-16 py-1 ml-4 rounded-2xl <?= $class1;?> text-xs text-center uppercase font-bold <?= $class2;?> md:w-32 md:py-1 <?= $class3;?> md:text-base" onclick="currentSlide(<?= $i;?>)">
              <a href="javascript:void(0)"><?= $a['nama_alur_kerja']; ?></a>
            </li>
            <?php endforeach; ?>
           
          </ul>

          <div class="shadow-card mb-16" style="min-height: 34rem;">
            <div class="absolute uppercase z-10" style="top: -1rem; left: 50%; transform: translateX(-50%)">
            <?php
            $alur = $alur_page->get_field_value('unitusaha_page');
            $ii = 0;
            foreach($alur as $a):
                $ii++;
                $class = ($ii == 1) ? '' : 'hidden';
            ?>
             <div class="titles twibbon <?= $a['warna_alur_kerja']; ?> <?= $class;?>">
             <?= $a['nama_alur_kerja']; ?>
              </div>
            <?php endforeach; ?>
          
            </div>

            <button class="hidden absolute top-0 left-0 md:block" style="top: 50%; transform: translateY(-50%);" onclick="plusSlides(-1)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-10 h-10 text-gray-600 xl:w-16 xl:h-16">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
              </svg>
            </button>

            <button class="hidden absolute right-0 md:block" style="top: 50%; transform: translateY(-50%);" onclick="plusSlides(1)">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-10 h-10 text-gray-600 xl:w-16 xl:h-16">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
              </svg>
            </button>

            <div class="mx-auto max-w-screen-sm">

            <?php
            $alur = $alur_page->get_field_value('unitusaha_page');
            $ii = 0;
            foreach($alur as $a):
                $iii++;
                $class = ($iii == 1) ? '' : 'hidden';
            ?>
            <div class="slides <?= $class;?>">
            <?= $a['isi_alur_kerja']; ?>
             </div>
             
            <?php endforeach; ?>
              

              
            </div>
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
      const titles = document.getElementsByClassName('titles');
      const dots = document.getElementsByClassName('dots');

      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}

      for (i = 0; i < slides.length; i++) {
        slides[i].classList.add('hidden');
        titles[i].classList.add('hidden');
      }

      for (i = 0; i < dots.length; i++) {
        dots[i].classList.remove('bg-yellow-500');
        dots[i].classList.add('bg-gray-300');
      }

      slides[slideIndex-1].classList.remove('hidden');  
      titles[slideIndex-1].classList.remove('hidden');  

      dots[slideIndex-1].classList.add('bg-yellow-500');
    }
  </script>
<?php 
get_footer();
?>