<?php 

// Load theme languages
load_theme_textdomain( 'gridby', get_template_directory().'/languages' );


/* ------------------------------------------------------------------------- *
 *  Include Functional File
/* ------------------------------------------------------------------------- */	
		
	require_once('functions/wp_bootstrap_navwalker.php');   	// script for bootstrap menu 
	
	require_once('functions/theme-customizer.php'); 			// influence index.php, single.php


		

/* ------------------------------------------------------------------------- *
 *  Base functionality
/* ------------------------------------------------------------------------- */	


	// Content width
	if ( !isset( $content_width ) ) { $content_width = 720; }
	

/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'fb_setup' ) ) {
	
	function fb_setup() {	
		
		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );
		
		// Enable title tag
		add_theme_support( "title-tag" );
		
		// Enable featured image
		add_theme_support( 'post-thumbnails' );
		
		// Enable post format support
		//add_theme_support( 'post-formats', array( 'audio', 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
		
		// Declare WooCommerce support
		//add_theme_support( 'woocommerce' );
		
		// Thumbnail sizes
		add_image_size( 'single', 800, 493, true ); //(cropped)
		add_image_size( 'big', 1400, 928, true ); 	//(cropped)
		
		add_image_size( 'quad', 466, 466, true ); //(cropped)
		add_image_size( 'horizontal', 932, 466, true ); //(cropped)
		add_image_size( 'vertical', 466, 932, true ); //(cropped)
		

		// Custom menu areas
		register_nav_menus( array(
			'main' => 'Main',
			//'header' => 'Header',
			'footer' => 'Footer',
		) );
	}
	
}
add_action( 'after_setup_theme', 'fb_setup' );



/*  Register sidebars
/* ------------------------------------ */	
if ( ! function_exists( 'fb_sidebars' ) ) {
	

	function fb_sidebars()	{
		register_sidebar(array( 'name' => 'Primary','id' => 'primary','description' => "Normal full width sidebar", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		/*register_sidebar(array( 'name' => 'Secondary','id' => 'secondary','description' => "Normal full width sidebar", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		if ( ot_get_option('footer-widgets') >= '1' ) { register_sidebar(array( 'name' => 'Footer 1','id' => 'footer-1', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>')); }
		if ( ot_get_option('footer-widgets') >= '2' ) { register_sidebar(array( 'name' => 'Footer 2','id' => 'footer-2', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>')); }
		if ( ot_get_option('footer-widgets') >= '3' ) { register_sidebar(array( 'name' => 'Footer 3','id' => 'footer-3', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>')); }
		if ( ot_get_option('footer-widgets') >= '4' ) { register_sidebar(array( 'name' => 'Footer 4','id' => 'footer-4', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>')); }*/
	}
	
}
add_action( 'widgets_init', 'fb_sidebars' );


/*  Enqueue javascript
/* ------------------------------------ */	
if ( ! function_exists( 'fb_scripts' ) ) {
	
	function fb_scripts() {
		
		// all script
		wp_enqueue_script('jquery');
		
		wp_enqueue_script( 'jquery-mobile', get_template_directory_uri() . '/js/jquery.mobile.touch.min.js', array( 'jquery' ), null, true );
		
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
		
		wp_enqueue_script( 'gallery-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery' ),null,true );
		
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ),null,true );
		
		wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/script.js', array( 'jquery' ),'', true );
		
		if ( is_singular() && get_option( 'thread_comments' ) )	{ wp_enqueue_script( 'comment-reply' ); }
	}  
	
}
add_action( 'wp_enqueue_scripts', 'fb_scripts' ); 


/*  Enqueue css
/* ------------------------------------ */	
if ( ! function_exists( 'fb_styles' ) ) {
	
	function fb_styles() {
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
		wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/fonts/font-awesome/css/font-awesome.min.css');
		wp_enqueue_style( 'screen', get_template_directory_uri().'/style.css');
		wp_enqueue_style( 'gallery-popup', get_template_directory_uri().'/css/magnific-popup.css');
		wp_enqueue_style( 'sourcesanspro','http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900,300,200,100');
		
	}
	
}
add_action( 'wp_enqueue_scripts', 'fb_styles' );




/* ------------------------------------------------------------------------- *
 *  Excerpt
/* ------------------------------------------------------------------------- */	


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/* ------------------------------------------------------------------------- *
 *  TGM plugin activation
/* ------------------------------------------------------------------------- */	

require_once dirname( __FILE__ ) . '/functions/class-tgm-plugin-activation.php';

if ( ! function_exists( 'my_theme_register_required_plugins' ) ) {
	
	function my_theme_register_required_plugins() {
		
		// Add the following plugins
		$plugins = array(
			array(
				'name' 				=> 'GRIDBY Plugin Bundle',
				'slug' 				=> 'gridby-plugin',
				'source'			=> get_template_directory() . '/functions/gridby-plugin.zip',
				'required'			=> true,
				'force_activation' 	=> false,
				'force_deactivation'=> false,
			)
		);	
		tgmpa( $plugins );
	}
	
}

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );


/* ------------------------------------------------------------------------- *
 *  General 
/* ------------------------------------------------------------------------- */	


	/*  Enable hr button tiny MCE
	/* ------------------------------------ */	
	function enable_more_buttons($buttons) {
	  $buttons[] = 'hr';
	  return $buttons;
	}
	add_filter("mce_buttons", "enable_more_buttons");
	
	
	/*  Remove P in description output
	/* ------------------------------------ */	
	remove_filter('term_description','wpautop');
	
	
	/*  Add Excerpt on Pages for Seo description
	/* ------------------------------------ */	
	add_action( 'init', 'fb_add_excerpts_to_pages' );
	function fb_add_excerpts_to_pages() {
	     add_post_type_support( 'page', 'excerpt' );
	}
	
	
	/* Add images to RSS Feed
	/* ------------------------------------ */	
	function rss_post_thumbnail($content) {
		
		global $post;
		
		if(has_post_thumbnail($post->ID)) {
		
			$content = '<p>' . get_the_post_thumbnail($post->ID, 'single') . '</p>' . get_the_content();
			$content = preg_replace("/\[caption.*\[\/caption\]/", '',$content);
			
		}
		
		return $content;
	}
	add_filter('the_excerpt_rss', 'rss_post_thumbnail');
	add_filter('the_content_feed', 'rss_post_thumbnail');

?>