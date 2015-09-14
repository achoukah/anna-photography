<?php 
	
/* ------------------------------------------------------------------------- *
 *  Video Metabox Post
/* ------------------------------------------------------------------------- */	

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function post_video_add_custom_box() {

    $screens = array( 
    			'post', 						// The post type you want this to show up on, can be post, page, or custom post type
	            'normal', 						// The placement of your meta box, can be normal or side
	            'high' );						// The priority in which this will be displayed

    foreach ( $screens as $screen ) {

        add_meta_box(
            	'meta-box-post', 							// ID, should be a string
	            __('Youtube & Vimeo - Video','gridby'), 	// Meta Box Title
	            'post_video_inner_custom_box', 				// Your call back function, this is where your form field will go
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'post_video_add_custom_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function post_video_inner_custom_box( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'post_video_inner_custom_box', 'post_video_inner_custom_box_nonce' );

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
 
	 $fb_video = get_post_meta($post->ID, 'fb_video', true);  
	
	?>

		<p><?php _e('To show a video in the article paste the link of a <strong>YouTube</strong> or <strong>Vimeo</strong> video in the box below.', 'gridby-plugin'); ?> <br/><input name="fb_video" id="fb_video" value="<?php echo $fb_video; ?>" style="border: 1px solid #ccc; margin: 10px 10px 0 0; width:100%"/> </p>
	    <p style="border-top:1px solid #eee; padding-top:10px"><?php _e('To set an <strong>Image as a Preview</strong> of the video use the <strong>Featured Image</strong> oh the right.', 'gridby-plugin'); ?></p>
	      
  <?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function post_video_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['post_video_inner_custom_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['post_video_inner_custom_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'post_video_inner_custom_box' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'post_video' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
  $mydata = sanitize_text_field( $_POST['fb_video'] );
 

  // Update the meta field in the database.
  update_post_meta( $post_id, 'fb_video', $mydata );

     
}
add_action( 'save_post', 'post_video_save_postdata' );


/* ------------------------------------------------------------------------- *
 *  Video Metabox Content Grid
/* ------------------------------------------------------------------------- */	

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function content_video_contents_add_custom_box() {

    $screens = array( 
    			'fb_contents', 					// The post type you want this to show up on, can be post, page, or custom post type
	            'normal', 						// The placement of your meta box, can be normal or side
	            'high' );						// The priority in which this will be displayed

    foreach ( $screens as $screen ) {

        add_meta_box(
            	'meta-box-contents', 				// ID, should be a string
	            __('Youtube & Vimeo - Video','gridby'), 		// Meta Box Title
	            'content_video_contents_inner_custom_box', 	// Your call back function, this is where your form field will go
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'content_video_contents_add_custom_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function content_video_contents_inner_custom_box( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'content_video_contents_inner_custom_box', 'content_video_contents_inner_custom_box_nonce' );

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
 
	 $fb_video = get_post_meta($post->ID, 'fb_video', true);  
	
	?>

		<p><?php _e('To show a video in the article paste the link of a <strong>YouTube</strong> or <strong>Vimeo</strong> video in the box below.', 'gridby-plugin'); ?> <br/><input name="fb_video" id="fb_video" value="<?php echo $fb_video; ?>" style="border: 1px solid #ccc; margin: 10px 10px 0 0; width:100%"/> </p>
	    <p style="border-top:1px solid #eee; padding-top:10px"><?php _e('To set an <strong>Image as a Preview</strong> of the video use the <strong>Featured Image</strong> oh the right.', 'gridby-plugin'); ?></p>
	      
  <?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function content_video_contents_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['content_video_contents_inner_custom_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['content_video_contents_inner_custom_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'content_video_contents_inner_custom_box' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'content_video_contents' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }

  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
  $mydata = sanitize_text_field( $_POST['fb_video'] );
 

  // Update the meta field in the database.
  update_post_meta( $post_id, 'fb_video', $mydata );

     
}
add_action( 'save_post', 'content_video_contents_save_postdata' );


/* ------------------------------------------------------------------------- *
 *  Video Functions
/* ------------------------------------------------------------------------- */	

/*  display url image big youtube and vimeo
/* ------------------------------------ */

if ( !function_exists('video_image') ) {

	function video_image($url, $size){ 
	
		$image_url = parse_url($url);
		
		if($size == 'small') {
			
			if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
				$array = explode("&", $image_url['query']);
				return "http://img.youtube.com/vi/".substr($array[0], 2)."/1.jpg";
				
			} else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
				$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".substr($image_url['path'], 1).".php"));
				return $hash[0]["thumbnail_small"];
			}
		
		} else if($size == 'hd') {
		
			if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
				$array = explode("&", $image_url['query']);
				return "http://img.youtube.com/vi/".substr($array[0], 2)."/hqdefault.jpg";
				
			} else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
				$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/".substr($image_url['path'], 1).".php"));
				return $hash[0]["thumbnail_large"];
			}
		}
		
	}

}

/*  display iframe of youtube and vimeo
/* ------------------------------------ */

if ( !function_exists('video_player') ) {

	function video_player($url, $autoplay){ 
	
		$image_url = parse_url($url);
		
		if($autoplay == '1') {
			
			if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
				$array = explode("&", $image_url['query']);
				return "<iframe title='YouTube video player' width='400' height='275' src='http://www.youtube.com/embed/".substr($array[0], 2)."?wmode=trasparent&autoplay=1' frameborder='0' wmode='opaque' allowfullscreen></iframe>";
				
			} else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
				
				return "<iframe src='http://player.vimeo.com/video/".substr($image_url['path'], 1)."?autoplay=true' width='400' height='275' frameborder='0' allowfullscreen'></iframe>";
			}
			
		} else {
			
			if($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com'){
				$array = explode("&", $image_url['query']);
				return "<iframe title='YouTube video player' width='400' height='275' src='http://www.youtube.com/embed/".substr($array[0], 2)."?wmode=trasparent' frameborder='0' wmode='opaque' allowfullscreen></iframe>";
				
			} else if($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com'){
				
				return "<iframe src='http://player.vimeo.com/video/".substr($image_url['path'], 1)."' width='400' height='275' frameborder='0' allowfullscreen'></iframe>";
			}
	
		}
		
	}

}


/* ------------------------------------------------------------------------- *
 *  Filter Thumbnail
/* ------------------------------------------------------------------------- */	

add_filter( 'post_thumbnail_html', 'post_thumbnail_html', 10, 3 );

	function post_thumbnail_html( $html, $post_id, $post_image_id) { 
		
		$video = get_post_meta( $post_id, 'fb_video', true );
		
		if ($html) { /* If have thumbnail image set */
			
			if ($video != '') {
			
				if (is_single()){ /* Show playe on single page */
					
					if( function_exists('video_player')) { 
						
					?>
	
						<div class='video-container'><?php echo video_player($video, 0); ?></div>
						
					<?php 
						
					}
					
				} else { 

					echo '<i class="fa fa-play-circle fa-4x"></i>'. $html;
	
				}
							
			} else {
				
				echo $html;
				
			}
				
		} else { /* If haven't thumbnail image set */
		
			if ($video != '') {
			
				if (is_single()){ /* Show playe on single page */
					
					if( function_exists('video_player')) { 
						
					?>
	
						<div class='video-container'><?php echo video_player($video, 0); ?></div>
						
					<?php 
						
					}
					
				} else { 

					echo '<i class="fa fa-play-circle fa-4x"></i><img class="img-res" src="'. video_image($video, 'hd').'" alt="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '" />';

				}
							
			} 
									
		}

	}



?>
