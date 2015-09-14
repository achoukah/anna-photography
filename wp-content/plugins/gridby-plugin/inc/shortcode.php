<?php 
	
/* ------------------------------------------------------------------------- *
 *  Shortcode System 
/* ------------------------------------------------------------------------- */	
	

/*  Youtube
/* ------------------------------------ */    

function fb_video_shortcode( $atts ) {
    extract( shortcode_atts( array (
        'url' => ''
    ), $atts ) );
    return '<div class="videoWrapper video-st-embed"><div class="video-container">'. video_player($url, 0). '</div></div>';
}
add_shortcode ('youtube-video', 'fb_video_shortcode' );


/*  Button
/* ------------------------------------ */    

function fb_button_shortcode( $atts ) {
    extract( shortcode_atts( array (
        'url' => '',
        'text' => ''
    ), $atts ) );
    return '<a href="'.$url.'" class="btn btn-primary  outline animate">'. $text. '</a>';
}
add_shortcode ('button-link', 'fb_button_shortcode' );
 

/*  Tiny mce button (tnx GavikcPro)
 *	https://github.com/GavickPro/TinyMCE-4-own-buttons
/* ------------------------------------ */

add_action('admin_head', 'fb_add_my_tc_button');

function fb_add_my_tc_button() {
    global $typenow;
    
    // se utente ha i permessi
    
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }
    
    // rendo visibile solo nel post type
   
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "fb_add_tinymce_plugin");
		add_filter('mce_buttons', 'fb_register_my_tc_button');
	}
}

function fb_add_tinymce_plugin($plugin_array) {
   	$plugin_array['fb_tc_button'] = plugin_dir_url(__FILE__) . '../js/shortcode-button-tinymce.js';    // Print all plugin js path
   	return $plugin_array;
}

function fb_register_my_tc_button($buttons) {
   array_push($buttons, "youtube-video",  "button-link");
   return $buttons;
}

?>