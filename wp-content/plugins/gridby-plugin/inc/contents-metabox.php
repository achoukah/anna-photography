<?php
	
/* ------------------------------------------------------------------------- *
 *  Adds a box to the main column on the Content edit screens.
/* ------------------------------------------------------------------------- */


function fb_contents_add_custom_box() {

    $screens = array( 
    			'fb_contents', 					// The post type you want this to show up on, can be post, page, or custom post type
	            'normal', 						// The placement of your meta box, can be normal or side
	            'high' );						// The priority in which this will be displayed

    foreach ( $screens as $screen ) {

        add_meta_box(
            	'meta-box-cpt-fb-contents',
            	'Options',
            	'fb_contents_inner_custom_box',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'fb_contents_add_custom_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function fb_contents_inner_custom_box( $post ) {

  // Add an nonce field so we can check for it later.
  wp_nonce_field( 'fb_contents_inner_custom_box', 'fb_contents_inner_custom_box_nonce' );

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
 
	$meta_fb_contents = get_post_meta($post->ID);

	?>
		<div class="container-meta">
		
		
			<div class="el-metabox">
	   	    	 <label><strong><?php _e( 'Subtitle', 'gridby-plugin' ); ?> </strong> - <?php _e( 'Insert subtitle text, max 5/6 words.', 'gridby-plugin' ); ?> </label>
	   	    	 <textarea name="meta-textarea-subtit" id="meta-textarea-subtit"><?php if ( isset (  $meta_fb_contents['meta-textarea-subtit'] ) ) echo  $meta_fb_contents['meta-textarea-subtit'][0]; ?></textarea>
	   	    </div>
  
  		</div>
  <?php

}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function fb_contents_save_postdata( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['fb_contents_inner_custom_box_nonce'] ) )
    return $post_id;

  $nonce = $_POST['fb_contents_inner_custom_box_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'fb_contents_inner_custom_box' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;

  // Check the user's permissions.
  if ( 'fb_contents' == $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) )
        return $post_id;
  
  } else {

    if ( ! current_user_can( 'edit_post', $post_id ) )
        return $post_id;
  }
  

  /* OK, its safe for us to save the data now. */
    
     // Checks for input and saves if needed
	if( isset( $_POST[ 'meta-textarea-subtit' ] ) ) {
	    update_post_meta( $post_id, 'meta-textarea-subtit', $_POST[ 'meta-textarea-subtit' ] );
	}
    
    
    
       
}
add_action( 'save_post', 'fb_contents_save_postdata' );
?>