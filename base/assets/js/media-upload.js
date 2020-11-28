// Upload
	var current_upload;
	var current_upload_file;
	var current_upload_image;
	var current_upload_images;
	var upload_type;
	var upload_type_file;
	var upload_type_image;
	var upload_type_images;
	var current_input_name;
	var current_input_name_file;
	var current_input_name_image;
	var current_input_name_images;
	var file_frame;
	var file_frame_file;
	var file_frame_image;
	var file_frame_images;
	//var wp_media_post_id = wp.media.model.settings.post.id;
	//var set_to_post_id = 0;

	// File Upload
	jQuery('.upload-file-bt').live('click',function(event) {
		event.preventDefault();

		formfield = jQuery('#upload_image').attr('name');
		current_upload_file = jQuery(this).parents('.input-field');
		upload_type_file = 'file';
		current_input_name_file = jQuery('.dummy-input', current_upload_file).attr('name');

		// If the media frame already exists, reopen it.
		if(file_frame_file){
			// Set the post ID to what we want
      //file_frame.uploader.uploader.param( 'post_id', set_to_post_id  );
      // Open frame
			file_frame_file.open();
			return;
		}else{
			// Set the wp.media post id so the uploader grabs the ID we want when initialised
      //wp.media.model.settings.post.id = set_to_post_id;
		}
		
		// Create the media frame.
		file_frame_file = wp.media.frames.file_frame = wp.media({
			title: jQuery(this).data('uploader_title'),
			button: {
				text: jQuery(this).data('uploader_button_text')
			},
			multiple: false
		});

		// When an image is selected, run a callback.
		file_frame_file.on('select',function(){
			// We set multiple to false so only get one image from the uploader
			attachment = file_frame_file.state().get('selection').first().toJSON();
			
			// Do something with attachment.id and/or attachment.url here
			jQuery('.uploaded-file-container', current_upload_file).html('<div class="uploaded-file">'+attachment.url +'<a class="remove" href="#">remove</a><input type="hidden" value="'+ attachment.id +'" name="'+ current_input_name_file +'" /></div>');
		
			// Restore the main post ID
      //wp.media.model.settings.post.id = wp_media_post_id;
		});
		
		// Finally, open the modal
    	file_frame_file.open();
		
		//window.send_to_editor = newSendToEditor;

		return false;
	});

	// Image Upload
	jQuery('.upload-image-bt').live('click',function(event) {
		event.preventDefault();

		formfield = jQuery('#upload_image').attr('name');
		//tb_show('Upload Image', 'media-upload.php?theme_upload=1&post_id='+post_id+'&type=image&TB_iframe=true');

		current_upload_image = jQuery(this).parents('.input-field');
		upload_type_image = 'image';
		current_input_name_image = jQuery('.dummy-input', current_upload_image).attr('name');

		// If the media frame already exists, reopen it.
		if(file_frame_image){
			// Set the post ID to what we want
      //file_frame.uploader.uploader.param( 'post_id', set_to_post_id  );
      // Open frame
			file_frame_image.open();
			return;
		}else{
			// Set the wp.media post id so the uploader grabs the ID we want when initialised
      //wp.media.model.settings.post.id = set_to_post_id;
		}
		
		// Create the media frame.
		file_frame_image = wp.media.frames.file_frame = wp.media({
			title: jQuery(this).data('uploader_title'),
			button: {
				text: jQuery(this).data('uploader_button_text')
			},
			multiple: false
		});

		// When an image is selected, run a callback.
		file_frame_image.on('select',function(){
			// We set multiple to false so only get one image from the uploader
			attachment = file_frame_image.state().get('selection').first().toJSON();
			
			// Do something with attachment.id and/or attachment.url here
			// Get resized image
			var data = {
				action: 'theme_ajax_action',
				method: 'get_resized_image_by_id',
				id: attachment.id,
				width: 80,
				height: 80
			};
			jQuery.post(ajaxurl, data, function(get_resized_response) {
				jQuery('.uploaded-image-container', jQuery(current_upload_image)).html('<div class="uploaded-image"><img  src="'+ get_resized_response.data +'" /><a class="remove" href="#">remove</a><input type="hidden" value="'+ attachment.id +'" name="'+ current_input_name_image +'" /></div>');
			}, 'json');

			// Restore the main post ID
      //wp.media.model.settings.post.id = wp_media_post_id;
		});
		
		// Finally, open the modal
    	file_frame_image.open();
		
		//window.send_to_editor = newSendToEditor;

		return false;
	});

	// Images Upload
	jQuery('.upload-images-bt').live('click', function(event) {
		event.preventDefault();

		formfield = jQuery('#upload_image').attr('name');
		//tb_show('Upload Image', 'media-upload.php?theme_upload=1&post_id='+post_id+'&type=image&TB_iframe=true');

		current_upload_images = jQuery(this).parents('.input-field');
		upload_type_images = 'images';
		current_input_name_images = jQuery('.dummy-input', current_upload_images).attr('name');

		// If the media frame already exists, reopen it.
		if(file_frame_images){
			// Set the post ID to what we want
      //file_frame.uploader.uploader.param( 'post_id', set_to_post_id  );
      // Open frame
			file_frame_images.open();
			return;
		}else{
			// Set the wp.media post id so the uploader grabs the ID we want when initialised
      //wp.media.model.settings.post.id = set_to_post_id;
		}
		
		// Create the media frame.
		file_frame_images = wp.media.frames.file_frame = wp.media({
			title: jQuery(this).data('uploader_title'),
			button: {
				text: jQuery(this).data('uploader_button_text')
			},
			multiple: true
		});

		// When an image is selected, run a callback.
		file_frame_images.on('select',function(){
			var selection = file_frame_images.state().get('selection');
			selection.map( function( attachment ) {
 
	      attachment = attachment.toJSON();
				// Do something with attachment.id and/or attachment.url here
				var data = {
					action: 'theme_ajax_action',
					method: 'get_resized_image_by_id',
					id: attachment.id,
					width: 80,
					height: 80
				};
				jQuery.post(ajaxurl, data, function(get_resized_response) {
					jQuery('.uploaded-images-container', jQuery(current_upload_images)).append('<div class="uploaded-image"><img  src="'+ get_resized_response.data +'" /><a class="remove" href="#">remove</a><input type="hidden" value="'+ attachment.id +'" name="'+ current_input_name_images +'[]" /></div>');
				}, 'json');

				// Restore the main post ID
      	//wp.media.model.settings.post.id = wp_media_post_id;
			});
		});
		
		// Finally, open the modal
    	file_frame_images.open();
		
		//window.send_to_editor = newSendToEditor;

		return false;
	});

	jQuery('.uploaded-image .remove, .uploaded-file .remove').live('click', function(e){
		e.preventDefault();
		jQuery(this).parent().fadeOut(function(){
			jQuery(this).remove();
		});
	});

	// Restore the main ID when the add media button is pressed
  jQuery('a.add_media').on('click', function() {
    wp.media.model.settings.post.id = wp_media_post_id;
  });