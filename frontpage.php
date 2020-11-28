<?php
/**
 * Template Name: Home Page
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

$homepage = Xbox::get('home_intro_page');
?>

		<?php 
		if (have_posts()) : the_post(); 
			$post_id = get_the_ID();
			$single = true;
		?>
			<div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
				<div class="xl:-mx-8">
					<div class="py-16">
					<div>
						<h1 class="text-4xl mb-8 text-center">
							<?= $homepage->get_field_value('home_tagline');?>
						</h1>
						<p class="mx-auto leading-relaxed md:w-3/4 xl:w-3/5 md:text-center">
						<?= $homepage->get_field_value('home_deskripsi');?>
						</p>
					</div>
					</div>
				</div>
				</div>
				<div class="bg-cover bg-center" style="background-image: url(<?= $homepage->get_field_value('bg_unit');?>)">
      <div class="bg-green-900 bg-opacity-75 text-green-100">
        <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
          <div class="xl:-mx-8">
            <div class="pt-24 pb-12 relative">
              <div class="twibbon twibbon-yellow-alt absolute z-10" style="top: -1rem; left: 50%; transform: translateX(-50%)">
                Unit Usaha
              </div>

				
              <div class="md:flex md:justify-center md:flex-wrap md:-ml-6">
			  <?php 
					$unit_usaha = $homepage->get_field_value('home_unit');
					$i = 1;
					foreach($unit_usaha as $unit):
						$i++;
					$class = ($i == 1) ? 'xl:w-1/4' : '';
				?>
                <div class="flex items-center mb-6 md:w-1/3 md:ml-6 xl:w-1/4">
                  <a href="<?= $unit['link_unit_home']; ?>" class="flex-none">
                    <div class="w-16 h-16 bg-yellow-500 rounded-full relative">
                      <img src="<?= $unit['icon_unit_home']; ?>" class="h-10 w-10 absolute-center">
                    </div>
                  </a>
                  <p class="ml-4"><?= $unit['nama_unit_home']; ?></p>
                </div>
					<?php endforeach; ?>
    
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
		<?php  
				$query = array(
					'post_type'		=> 'post',
					'post_status'	=> 'publish',
					'posts_per_page'=> 3,
					'suppress_filters'=> false	
				);

				$results = query_posts( $query );

				if (have_posts()) :
			?>
          <div>
            <h1 class="text-4xl mb-8 text-center"><?php _e('Berita', 'ptumb'); ?></h1>

            <div class="md:flex md:flex-wrap md:-ml-6 xl:-ml-8">
			<?php while (have_posts()) : the_post(); ?>
              <a href="<?php the_permalink() ?>" class="w-full md:w-1/2 xl:w-1/3">
                <div class="mb-6 md:pl-6 xl:pl-8">
                  <div class="h-32 bg-gray-300 mb-4 text-gray-100 overflow-hidden">
				  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('full', array('class' => 'object-cover h-48 w-full')); } else {?>
									<img  src="<?php bloginfo('template_directory');?>/assets/images/no.png" />
								<?php } ?>
                  </div>
                  <p class="overflow-hidden" style="max-height: 4.8rem;"><?php the_title(); ?></p>
                </div>
              </a>  
			  <?php endwhile; ?>
              
            </div>
          </div>
		  <?php  
				endif;
				wp_reset_query();
			?>
        </div>
		
      </div>
    </div>
			
		<?php 
		endif; 
		?>
<?php
get_footer();
