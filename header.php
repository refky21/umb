<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package umytheme
 */

$post_id = is_home() ? get_option('page_for_posts') : ( is_front_page() ? get_option('page_on_front') : get_the_id() );

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="description" content="<?php bloginfo('description') ;?>">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

</head>

<body class="text-gray-900">
  <header class="bg-gray-300 relative">
    <nav class="h-20 absolute inset-y-0 top-0 w-full">
      <div class="navbar mx-auto h-full xl:max-w-screen-lg relative">
        <div class="max-w-screen-md w-full mx-auto lg:px-8 xl:max-w-screen-lg xl:px-0">
          <div class="flex items-center w-full justify-between">
            <!-- Logo -->
            <a href="<?php bloginfo('url') ;?>/" class="h-12 w-32 mr-10">
              <img src="<?php echo THEME_STYLE_URI; ?>/logos/umb-logo-1.svg" alt="UMB Logo" class="w-full object-center">
            </a>

            <button class="xl:hidden" id="navBtn">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-8 h-8 text-gray-900">
                <path d="M0 0h24v24H0z" fill="none"/>
                <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
              </svg>
            </button>

            <div class="hidden text-lg absolute top-0 inset-x-0 mt-20 bg-gray-200 z-10 py-4 xl:flex xl:relative xl:mt-0 xl:py-0 xl:bg-transparent" id="navMenu">
              <a href="<?php bloginfo('url');?>/profile-umb" class="block px-6 py-4 xl:mr-8 xl:p-0">PROFIL</a>
              <a href="<?php bloginfo('url');?>/unit-usaha" class="block px-6 py-4 xl:mr-8 xl:p-0">UNIT USAHA</a>
              <a href="<?php bloginfo('url');?>/milestone" class="block px-6 py-4 xl:mr-8 xl:p-0">MILESTONE</a>
              <a href="<?php bloginfo('url');?>/direksi" class="block px-6 py-4 xl:mr-8 xl:p-0">DIREKSI</a>
              <a href="<?php bloginfo('url');?>/berita" class="block px-6 py-4 xl:mr-8 xl:p-0">BERITA</a>
              <a href="<?php bloginfo('url');?>/contact" class="block px-6 py-4 xl:p-0">KONTAK</a>
            </div>
          </div>
        </div>
      </div>
    </nav>

<?php if(is_front_page() || is_home()): ?>
  <?php  
				$query = array(
					'post_type'		=> 'slider',
					'post_status'	=> 'publish',
					'posts_per_page'=> 3,
				);
        $i = 0 ;
				$results = query_posts( $query );
				if (have_posts()) :
          $slide = Xbox::get('slider_post');
?>
    <div class="overflow-hidden" style="height: 560px; max-height: 560px;">
    <?php while (have_posts()) : the_post(); 
      $i++;
      $class1 = ($i == 1) ? '' : 'hidden';
    ?>
      <div class="slides <?= $class1; ?> overflow-hidden">
         <img src="<?php echo $slide->get_field_value('gambar_slide'); ?>" alt="" class="w-full object-cover" style="height: 560px;">

        <div class="text-gray-100 absolute inset-x-0 bottom-0 py-16 text-5xl bg-gradient-to-t from-gray-900">
          <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
            <div class="xl:-mx-8">
              <p class="mb-2 leading-tight"><a href="<?php echo $slide->get_field_value('slide_link'); ?>"><?php the_title(); ?></a></p>
              <div class="border border-gray-100 w-64"></div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      
      <button class="hidden absolute top-0 left-0 outline-none focus:outline-none md:block bg-gray-900 rounded-r-md opacity-75" style="top: 50%; transform: translateY(-50%);" onclick="plusSlides(-1)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-10 h-10 text-gray-100 xl:w-12 xl:h-12">
          <path d="M0 0h24v24H0z" fill="none"/>
          <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
        </svg>
      </button>

      <button class="hidden absolute right-0 outline-none focus:outline-none md:block bg-gray-900 rounded-l-md opacity-75" style="top: 50%; transform: translateY(-50%);" onclick="plusSlides(1)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current w-10 h-10 text-gray-100 xl:w-12 xl:h-12">
          <path d="M0 0h24v24H0z" fill="none"/>
          <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
        </svg>
      </button>
    </div>
    <?php  
			
?>
    <div class="absolute bottom-0 inset-x-0 flex justify-center py-4 -ml-2">
    
    <?php 
    	$query = array(
        'post_type'		=> 'slider',
        'post_status'	=> 'publish',
        'posts_per_page'=> 3,
      );
      $i = 0 ;
      $results = query_posts( $query );
      if (have_posts()) :
    
    while (have_posts()) : the_post(); 
      $i++;
      $class1 = ($i == 1) ? 'bg-gray-100' : '';
    ?>
      <a href="javascript:void(0)" class="dots w-3 h-3 border border-gray-100 <?= $class1; ?> rounded-full ml-2" onclick="currentSlide(<?= $i;?>)"></a>
      <?php endwhile; 
      	endif;
				wp_reset_query();
      ?>

      
    <?php  
				endif;
				wp_reset_query();
			?>
      
    <?php
    elseif (is_page_template('template/berita.php')):?>
<div class="overflow-hidden" style="height: 560px; max-height: 560px;">
    	<img  src="<?php bloginfo('template_directory');?>/img/no.jpg" class="w-full object-cover" style="height: 560px;"/>
      <div class="text-gray-100 absolute inset-x-0 bottom-0 py-16 text-5xl bg-gradient-to-t from-gray-900 md:text-center">
        <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
          <div class="xl:-mx-8 leading-tight">
            <?php the_title(); ?>
          </div>
        </div>
      </div>
    </div>

    

    <?php
    else :
    ?>
<div class="overflow-hidden" style="height: 560px; max-height: 560px;">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail('blog', array('class' => '"w-full object-cover','style' => 'height: 560px;' )); } else {?>
									<img  src="<?php bloginfo('template_directory');?>/img/no.jpg" class="w-full object-cover" style="height: 560px;"/>
	<?php } ?>

      <div class="text-gray-100 absolute inset-x-0 bottom-0 py-16 text-5xl bg-gradient-to-t from-gray-900 md:text-center">
        <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
          <div class="xl:-mx-8 leading-tight">
            <?php the_title(); ?>
          </div>
        </div>
      </div>
    </div>
<?php endif; ?>
  </header>

  <main class="min-h-full">