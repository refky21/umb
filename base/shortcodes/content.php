<?php  
	add_shortcode( 'contact-us', 'contact_us_shortcode' );
	function contact_us_shortcode( $atts, $content = null ) {

		extract(shortcode_atts( array(
        ), $atts ));

        $address = get_theme_mod('alamat_umb');
        $fax = get_theme_mod('fax_umb');
        $phone = get_theme_mod('telp_umb');
        $email = get_theme_mod('email_umb');
        
        $content = '
        <div class="md:flex md:justify-between md:-ml-8">
        <div class="w-full flex-none mb-10 md:pl-8 md:w-1/2 xl:w-1/3">
        <div class="w-full h-32 mb-4 inline-block mb-8">
          <img src="'.THEME_STYLE_URI.'/logos/umb-logo-1.svg" class="h-32 w-full object-contain" />
        </div>
        <div>
          <p class="mb-4">'.wpautop($address).'</p>
          <ul>
            <li>'.__('Phone', 'nourmand').': '.$phone.'. 475</li>
            <li>'.__('FAX', 'nourmand').': '.$fax.'</li>
            <li>'.__('E-mail', 'nourmand').': '.$email.'</li>
          </ul>
        </div>
      </div>

      <div class="w-full md:pl-8 md:w-1/2">
      <form>
        <div class="mb-4">
          <label for="name" class="block mb-1">Nama</label>
          <input type="text" id="name" class="bg-gray-300 text-gray-900 w-full py-2 px-3 outline-none">
        </div>
      
        <div class="mb-4">
          <label for="email" class="block mb-1">E-mail</label>
          <input type="text" id="email" class="bg-gray-300 text-gray-900 w-full py-2 px-3 outline-none">
        </div>
      
        <div class="mb-4">
          <label for="phone" class="block mb-1">No. Telepon</label>
          <input type="tel" id="phone" class="bg-gray-300 text-gray-900 w-full py-2 px-3 outline-none">
        </div>
      
        <div class="mb-4">
          <label for="message" class="block mb-1">Pesan</label>
          <textarea id="message" class="bg-gray-300 text-gray-900 w-full py-2 px-3 outline-none h-56"></textarea>
        </div>
      
        <div class="text-right">
          <button type="submit" class="font-bold border-yellow-500 border-b-2 pb-2 outline-none">Kirim</button>
        </div>
      </form>
    </div>
    </div>
        ';

        return apply_filters( 'uds_shortcode_out_filter', $content );
    }

    add_shortcode( 'social-network', 'social_network_shortcode' );
	function social_network_shortcode( $atts, $content = null ) {

		extract(shortcode_atts( array(
            'text'          => '',
            'custom_class'	=> ''
        ), $atts ));
         
        $content = '<ul class="list-unstyled social-network '.$custom_class.'">'.do_shortcode($content).'</ul>';

        return apply_filters( 'uds_shortcode_out_filter', $content );
    }
    
    add_shortcode( 'social-netwok-item', 'social_network_item_shortcode' );
	function social_network_item_shortcode( $atts, $content = null ) {

		extract(shortcode_atts( array(
            'url'       => '',
            'target'    => ''
        ), $atts ));
         
        $content = '<li><a href="'.$url.'" target="'.$target.'" class="social-netwok-item"></a></li>';

        return apply_filters( 'uds_shortcode_out_filter', $content );
    }
    
    add_shortcode( 'grid-button', 'grid_button_shortcode' );
	function grid_button_shortcode( $atts, $content = null ) {

		extract(shortcode_atts( array(
            'text'          => __('en savoir plus', 'riaumont'),
            'url'           => '',
            'custom_class'	=> ''
        ), $atts ));
         
        $content =  '   
        <div class="grid-button">
            <a href="'.$url.'" class="btn '.$custom_class.'">'.$text.'</a>
        </div>
        ';

        return apply_filters( 'uds_shortcode_out_filter', $content );
	}
?>
