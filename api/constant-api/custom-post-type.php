<?php

add_action( 'after_switch_theme', 'fs_flush_rewrite_rules' );

function fs_flush_rewrite_rules() {
	flush_rewrite_rules();
}

//-------------------------------------------------------------------
// CUSTOM POST TYPE: Artists
//-------------------------------------------------------------------

add_action( 'init', 'project_cpt' );

function project_cpt() {
  $labels = array(
    'name'               => _x( 'Projects', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Project', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Projects', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Projects', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Add New', 'Artist', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Add New Project', 'your-plugin-textdomain' ),
    'new_item'           => __( 'New Artist', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Edit Artist', 'your-plugin-textdomain' ),
    'view_item'          => __( 'View Artist', 'your-plugin-textdomain' ),
    'all_items'          => __( 'All Project', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Search Project', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Parent Artist:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'No Project found.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'No Project found in Trash.', 'your-plugin-textdomain' )
  );
  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'project' ),
    'capability_type'    => 'post',
    'taxonomies'         => array('category'),
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-smiley',
    'show_in_rest'       => true,
    'rest_base'          => 'project-api',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports'           => array( 'title', 'editor', 'author', 'page-attributes', 'thumbnail' )
  );
  register_post_type( 'project', $args );
}

add_action( 'init', 'artist_cpt' );

function artist_cpt() {
  $labels = array(
    'name'               => _x( 'Artists', 'post type general name', 'your-plugin-textdomain' ),
    'singular_name'      => _x( 'Artists', 'post type singular name', 'your-plugin-textdomain' ),
    'menu_name'          => _x( 'Artists', 'admin menu', 'your-plugin-textdomain' ),
    'name_admin_bar'     => _x( 'Artists', 'add new on admin bar', 'your-plugin-textdomain' ),
    'add_new'            => _x( 'Add New', 'Artists', 'your-plugin-textdomain' ),
    'add_new_item'       => __( 'Add New Artists', 'your-plugin-textdomain' ),
    'new_item'           => __( 'New Artists', 'your-plugin-textdomain' ),
    'edit_item'          => __( 'Edit Artists', 'your-plugin-textdomain' ),
    'view_item'          => __( 'View Artists', 'your-plugin-textdomain' ),
    'all_items'          => __( 'All Artists', 'your-plugin-textdomain' ),
    'search_items'       => __( 'Search Artists', 'your-plugin-textdomain' ),
    'parent_item_colon'  => __( 'Parent Artists:', 'your-plugin-textdomain' ),
    'not_found'          => __( 'No Artists found.', 'your-plugin-textdomain' ),
    'not_found_in_trash' => __( 'No Artists found in Trash.', 'your-plugin-textdomain' )
  );
  $args = array(
    'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'artist' ),
    'capability_type'    => 'post',
    'taxonomies'         => array('category'),
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-smiley',
    'show_in_rest'       => true,
    'rest_base'          => 'artist-api',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'supports'           => array( 'title', 'editor', 'author', 'page-attributes', 'thumbnail' )
  );
  register_post_type( 'artist', $args );
}


?>
