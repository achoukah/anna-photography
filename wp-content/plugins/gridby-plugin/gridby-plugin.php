<?php
	
/**
 * Plugin Name: GRIDBY Plugin Bundle
 * Plugin URI: http://themeforest.net/user/afmarchetti
 * Description: This is a plugin bundle for Gridby Theme.
 * Author: afmarchetti
 * Author URI:  http://themeforest.net/user/afmarchetti
 * Version: 1
 */

	
	//CUSTOM POST TYPE SETTING
	
	include('inc/contents-custom-post-type.php');
	
	include('inc/contents-metabox.php');
	
	include('inc/video-support.php');
	
	include('inc/shortcode.php');
	
	
	

//plugin translation
function fb_plugin_setup() {
    load_plugin_textdomain('gridby-plugin', false, dirname(plugin_basename(__FILE__)) . '/lang/');
} // end custom_theme_setup
add_action('after_setup_theme', 'fb_plugin_setup');


/*  Enqueue admin css
/* ------------------------------------ */
if ( ! function_exists( 'fb_plugin_admin_styles' ) ) {
	
	function fb_plugin_admin_styles(){
	    /* global $typenow;
	    if( $typenow == 'post' ) { */
	         wp_enqueue_style( 'admincss', plugins_url( '/css/admin.css' , __FILE__ ));
	    /* } */
	}
	
}
add_action( 'admin_print_styles', 'fb_plugin_admin_styles' );


/*  Enqueue admin image script
/* ------------------------------------ */
if ( ! function_exists( 'fb_plugin_admin_scripts' ) ) {

	function fb_plugin_admin_scripts() {
	        
			wp_register_script('upload-image',   plugin_dir_url(__FILE__)  .'/js/upload-image.js', array('jquery','media-upload','thickbox'));
			wp_enqueue_script('upload-image');
	}
	
}
add_action( 'admin_enqueue_scripts', 'fb_plugin_admin_scripts' );


