var file_frame;

// "mca_tray_button" is the ID of my button that opens the Media window
jQuery('#upload_image_button').live('click', function( event ){

  event.preventDefault();

	if ( file_frame ) {
		file_frame.open();
		return;
	}

	file_frame = wp.media.frames.file_frame = wp.media({
		title: jQuery( this ).data( 'uploader_title' ),
		button: {
			text: jQuery( this ).data( 'uploader_button_text' ),
		},
		multiple: false  
	});

	file_frame.on( 'select', function() {

		attachment = file_frame.state().get('selection').first().toJSON();

		// "mca_features_tray" is the ID of my text field that will receive the image
		// I'm getting the ID rather than the URL:
		jQuery("#meta-image-id").val(attachment.id);
		
		// and you can change "thumbnail" to get other image sizes
		
		jQuery("#meta-image-prev").attr('src', attachment.sizes.thumbnail.url);

	});

	file_frame.open();

});


var file_frame_2;

// "mca_tray_button" is the ID of my button that opens the Media window
jQuery('#upload_image_button_2').live('click', function( event ){

  event.preventDefault();

	if ( file_frame_2 ) {
		file_frame_2.open();
		return;
	}

	file_frame_2 = wp.media.frames.file_frame_2 = wp.media({
		title: jQuery( this ).data( 'uploader_title' ),
		button: {
			text: jQuery( this ).data( 'uploader_button_text' ),
		},
		multiple: false  
	});

	file_frame_2.on( 'select', function() {

		attachment = file_frame_2.state().get('selection').first().toJSON();

		// "mca_features_tray" is the ID of my text field that will receive the image
		// I'm getting the ID rather than the URL:
		jQuery("#meta-image-id_2").val(attachment.id);
		
		// and you can change "thumbnail" to get other image sizes
		
		jQuery("#meta-image-prev_2").attr('src', attachment.sizes.thumbnail.url);

	});

	file_frame_2.open();

});

var file_frame_3;

// "mca_tray_button" is the ID of my button that opens the Media window
jQuery('#upload_image_button_3').live('click', function( event ){

  event.preventDefault();

	if ( file_frame_3 ) {
		file_frame_3.open();
		return;
	}

	file_frame_3 = wp.media.frames.file_frame_3 = wp.media({
		title: jQuery( this ).data( 'uploader_title' ),
		button: {
			text: jQuery( this ).data( 'uploader_button_text' ),
		},
		multiple: false  
	});

	file_frame_3.on( 'select', function() {

		attachment = file_frame_3.state().get('selection').first().toJSON();

		// "mca_features_tray" is the ID of my text field that will receive the image
		// I'm getting the ID rather than the URL:
		jQuery("#meta-image-id_3").val(attachment.id);
		
		// and you can change "thumbnail" to get other image sizes
		
		jQuery("#meta-image-prev_3").attr('src', attachment.sizes.thumbnail.url);

	});

	file_frame_3.open();

});

var file_frame_4;

// "mca_tray_button" is the ID of my button that opens the Media window
jQuery('#upload_image_button_4').live('click', function( event ){

  event.preventDefault();

	if ( file_frame_4 ) {
		file_frame_4.open();
		return;
	}

	file_frame_4 = wp.media.frames.file_frame_4 = wp.media({
		title: jQuery( this ).data( 'uploader_title' ),
		button: {
			text: jQuery( this ).data( 'uploader_button_text' ),
		},
		multiple: false  
	});

	file_frame_4.on( 'select', function() {

		attachment = file_frame_4.state().get('selection').first().toJSON();

		// "mca_features_tray" is the ID of my text field that will receive the image
		// I'm getting the ID rather than the URL:
		jQuery("#meta-image-id_4").val(attachment.id);
		
		// and you can change "thumbnail" to get other image sizes
		
		jQuery("#meta-image-prev_4").attr('src', attachment.sizes.thumbnail.url);

	});

	file_frame_4.open();

});

var file_frame_5;

// "mca_tray_button" is the ID of my button that opens the Media window
jQuery('#upload_image_button_5').live('click', function( event ){

  event.preventDefault();

	if ( file_frame_5 ) {
		file_frame_5.open();
		return;
	}

	file_frame_5 = wp.media.frames.file_frame_5 = wp.media({
		title: jQuery( this ).data( 'uploader_title' ),
		button: {
			text: jQuery( this ).data( 'uploader_button_text' ),
		},
		multiple: false  
	});

	file_frame_5.on( 'select', function() {

		attachment = file_frame_5.state().get('selection').first().toJSON();

		// "mca_features_tray" is the ID of my text field that will receive the image
		// I'm getting the ID rather than the URL:
		jQuery("#meta-image-id_5").val(attachment.id);
		
		// and you can change "thumbnail" to get other image sizes
		
		jQuery("#meta-image-prev_5").attr('src', attachment.sizes.thumbnail.url);

	});

	file_frame_5.open();

});


var file_frame_6;

// "mca_tray_button" is the ID of my button that opens the Media window
jQuery('#upload_image_button_6').live('click', function( event ){

  event.preventDefault();

	if ( file_frame_6 ) {
		file_frame_6.open();
		return;
	}

	file_frame_6 = wp.media.frames.file_frame_6 = wp.media({
		title: jQuery( this ).data( 'uploader_title' ),
		button: {
			text: jQuery( this ).data( 'uploader_button_text' ),
		},
		multiple: false  
	});

	file_frame_6.on( 'select', function() {

		attachment = file_frame_6.state().get('selection').first().toJSON();

		// "mca_features_tray" is the ID of my text field that will receive the image
		// I'm getting the ID rather than the URL:
		jQuery("#meta-image-id_6").val(attachment.id);
		
		// and you can change "thumbnail" to get other image sizes
		
		jQuery("#meta-image-prev_6").attr('src', attachment.sizes.thumbnail.url);

	});

	file_frame_6.open();

});

