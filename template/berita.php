<?php
get_header(); ?>


<div class="px-6 max-w-screen-md mx-auto md:px-8 xl:max-w-screen-lg">
      <div class="xl:-mx-8">
        <div class="py-16">
          <div>
            <h1 class="text-2xl font-bold border-b-2 border-gray-900 pb-2 mb-8"><?php _e('Hit News', 'ptumb'); ?></h1>
            <div class="md:flex md:flex-wrap md:-ml-6">
            <?php					
                $load = 3;
                $the_query = null;
                $the_query = new WP_Query('post_status=publish&post_type=post&category__not_in=2order=desc&posts_per_page='.$load); 
                while ( $the_query->have_posts() ) : $the_query->the_post();
              ?>
              <a href="<?php the_permalink() ?>" class="w-full md:w-1/3">
                <div class="mb-6 md:pl-6">
                  <div class="h-48 bg-gray-300 mb-4 text-gray-100 overflow-hidden">
                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('full', array('class' => 'object-cover h-48 w-full')); } else {?>
									<img  src="<?php bloginfo('template_directory');?>/assets/images/no.png" class="object-cover h-48 w-full" />
								<?php } ?>
                                
                  </div>
                  <p class="overflow-hidden" style="max-height: 4.8rem;"><?php the_title(); ?></p>
                </div>
              </a>
              <?php  endwhile; ?>  
              
            </div>
          </div>

          <div>
            <div class="md:flex md:-ml-6 xl:-ml-8">
              <div class="mb-10 md:w-2/3 md:ml-6 md:mb-0 xl:ml-8">
                <div class="mb-10">
                  <h1 class="text-2xl font-bold mb-8">Video</h1>
                  <?php  
				$query = array(
					'post_type'		=> 'post',
					'post_status'	=> 'publish',
                    'posts_per_page'=> 1,
                    'cat' => 2,
					'suppress_filters'=> false	
				);
                $bvideo = Xbox::get('video_post');
                // var_dump($bvideo);
				$results = query_posts( $query );

				if (have_posts()) :
			?>
                        <iframe class="w-full" width="420" height="345"
            src="https://www.youtube.com/embed/<?= $bvideo->get_field_value('post_video');?>">
            </iframe>
                  
                  <?php  
				endif;
				wp_reset_query();
			?>
                </div>

                <div class="mb-10">
                  <h1 class="text-2xl font-bold border-b-2 border-gray-900 pb-2 mb-8">Trending</h1>
                
                  <div>
                    <?php					
                $load = 3;
                $the_query = null;
                $the_query = new WP_Query('post_status=publish&meta_key=post_views_count&category__not_in=2&orderby=meta_value_num&order=desc&posts_per_page='.$load); 
                while ( $the_query->have_posts() ) : $the_query->the_post();
              ?>
                    <div class="w-full mb-6 xl:flex">
                      <a href="<?php the_permalink() ?>" class="xl:w-64">
					  
                        <div class="h-32 bg-gray-300 mb-4 text-gray-100 overflow-hidden">
                          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('full', array('class' => 'object-cover h-48 w-full')); } else {?>
									<img  src="<?php bloginfo('template_directory');?>/assets/images/no.png" class="object-cover h-48 w-full" />
								<?php } ?>
                        </div>
                      </a>
                      <p class="overflow-hidden xl:ml-6" style="max-height: 4.8rem;"><?php the_title(); ?></p>
                    </div>
                <?php  endwhile; ?> 
                
                    
                  </div>
                
                  <div class="flex items-center">
                    <div class="h-1 bg-gray-300 flex-grow"></div>
                    <a href="" class="block flex-none italic ml-4 text-blue-500">Halaman berikutnya &rsaquo;</a>
                  </div>
                </div>

                <div>
                  <h1 class="text-2xl font-bold border-b-2 border-gray-900 pb-2 mb-8">Berita lain</h1>
  
                  <div class="mb-6 xl:flex xl:flex-wrap xl:-ml-6">
				  <?php					
                $load = 8;
                $the_query = null;
                $the_query = new WP_Query('post_status=publish&post_type=post&category__not_in=2order=asc&posts_per_page='.$load); 
                while ( $the_query->have_posts() ) : $the_query->the_post();
              ?>
				<p class="overflow-hidden mb-4 w-64 xl:pl-6 xl:flex-none xl:w-1/2" style="max-height: 4.8rem;">
                      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </p>
              
              <?php  endwhile; ?>  
                    
					
                    
                  </div>
  
                  <div class="flex items-center">
                    <div class="h-1 bg-gray-300 flex-grow"></div>
                    <a href="" class="block flex-none italic ml-4 text-blue-500">Halaman berikutnya &rsaquo;</a>
                  </div>
                </div>
              </div>

              <div class="md:ml-6 xl:ml-8">
                <div>
                  <h1 class="text-2xl font-bold border-b-2 border-gray-900 pb-2 mb-8">Berita Unit Bisnis</h1>
                  <div>
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/persewaan-gedung-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">Persewaan Gedung</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/ltc-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">UB Language Training Center</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/klinik-firdaus-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">Klinik Firdaus</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/autocare-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">Autocare</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/tirta-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">UMY Tirta</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/utc-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">UMB Techno Creative</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/boga-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">UMB Boga</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/armada-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">Armada</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/apotik-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">UB Apotik</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/kantin-pertokoan-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">Kantin & Pertokoan</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/bmt-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">BMT UMY</p>
                      </div>
                    </a>
                  
                    <a href="#">
                      <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex-none relative">
                          <img src="<?php echo THEME_STYLE_URI; ?>/icons/units/uct-icon.svg" class="h-8 w-8 absolute-center">
                        </div>
                        <p class="ml-4">UB UMB Construction & Trading</p>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



<?php
get_footer();
?>