<?php 

/* ------------------------------------------------------------------------- *
 *   CUSTOM POST TYPE content
/* ------------------------------------------------------------------------- */	


add_action('init', 'create_fb_contents');
function create_fb_contents() {

    $labels = array(
        'name'               => __('Grid', 'gridby-plugin'),
        'singular_name'      => __('Content', 'gridby-plugin'),
        'add_new'            => __('Add Content', 'gridby-plugin'),
        'add_new_item'       => __('Add New Content', 'gridby-plugin'),
        'edit_item'          => __('Edit Content', 'gridby-plugin'),
        'new_item'           => __('New Content', 'gridby-plugin'),
        'all_items'          => __('All Contents', 'gridby-plugin'),
        'view_item'          => __('View Content', 'gridby-plugin'),
        'search_items'       => __('Search Content', 'gridby-plugin'),
        'not_found'          => __('No Contents found', 'gridby-plugin'),
        'not_found_in_trash' => __('No Contents found in the trash', 'gridby-plugin'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'rewrite'            => array('slug' => 'content'),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 21,
        'menu_icon' 		 => 'dashicons-schedule',
        'supports'           => array(
                                'title',
                                'editor',
                                'thumbnail',
                                'excerpt',
                                'page-attributes' 
                                ),

    );

   register_post_type('fb_contents', $args);
}

?>