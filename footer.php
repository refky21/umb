<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package umytheme
 */

$post_id = is_home() ? get_option('page_for_posts') : ( is_front_page() ? get_option('page_on_front') : get_the_id() );
$single = true;
?>

</main>

  <!-- Footer -->
  <footer>
    <div class="bg-green-900 text-green-100">
      <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
        <div class="xl:-mx-8">
          <div class="py-20 xl:flex xl:-ml-16">
            <div class="mb-10 font-bold text-lg text-center xl:text-left xl:flex-auto xl:mb-0 xl:ml-16">
              <!-- UMB Logo -->
              <a href="#">
                <div class="inline-block h-20 w-48 overflow-visible">
                  <img src="<?php echo THEME_STYLE_URI; ?>/logos/umb-logo-2.svg" alt="" class="w-full">
                </div>
              </a>
            </div>
    
            <div class="mb-10 xl:flex-auto xl:mb-0 xl:ml-16">
              <h1 class="font-bold mb-4">PT. Umat Mandiri Berkemajuan</h1>
              <p class="mb-4">Jalan Brawijaya, Tamantirto, Kasihan, Bantul, Yogyakarta</p>
              <ul>
                <li>Telp: (0274) 387656 Ext. 475</li>
                <li>Fax: (0274) 387656</li>
                <li>E-mail: umb.umy@gmail.com</li>
              </ul>
            </div>
    
            <div class="xl:flex-auto xl:ml-16">
              <!-- Social Media Icons -->
              <div class="flex mb-2 -ml-2">
                <a href="<?php echo get_theme_mod( 'social_media_facebook' ); ?>">  
                  <div class="h-8 w-8 inline-block ml-2 mb-2">
                    <img src="<?php echo THEME_STYLE_URI; ?>/icons/social-media/fb-icon.svg" alt="" class="h-8 w-8 object-cover">
                  </div>
                </a>
                <a href="<?php echo get_theme_mod( 'social_media_instagram' ); ?>">  
                  <div class="h-8 w-8 inline-block ml-2 mb-2">
                    <img src="<?php echo THEME_STYLE_URI; ?>/icons/social-media/ig-icon.svg" alt="" class="h-8 w-8 object-cover">
                  </div>
                </a>
                <a href="<?php echo get_theme_mod( 'social_media_youtube' ); ?>">  
                  <div class="h-8 w-8 inline-block ml-2 mb-2">
                    <img src="<?php echo THEME_STYLE_URI; ?>/icons/social-media/youtube-icon.svg" alt="" class="h-8 w-8 object-cover">
                  </div>
                </a>
              </div>

              <p class="mb-2">Langganan berita terbaru</p>
              <div class="mb-2">
                <input type="email" class="bg-white text-gray-900 w-full xl:w-64 py-2 px-3 outline-none" placeholder="E-mail kamu">
              </div>
              <button class="font-bold text-yellow-500 border-yellow-500 border-b-2 pb-2 outline-none" >Kirim</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-yellow-500 h-12 flex justify-center items-center">
      &copy; <?= date('Y');?> <?php echo get_theme_mod( 'footer_copyright' ); ?>
    </div>
  </footer>
  <?php if(is_front_page() || is_home()): ?>
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
        dots[i].classList.remove('bg-gray-100');
      }

      slides[slideIndex-1].classList.remove('hidden');  

      dots[slideIndex-1].classList.add('bg-gray-100');
    }
  </script>
  <?php endif; ?>
  <?php wp_footer(); ?>
</body>
</html>