<?php
/**
 * @package Register_Instruments_Post_Type
 * @version 1
 */
/*
Plugin Name: Register Instruments Post Type
Plugin URI: http://mzoo.org
Description:
Author: Mike iLL
Version: 1
// Our custom post type function
function create_posttype() {

	register_post_type( 'instruments',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Instruments' ),
				'singular_name' => __( 'Instrument' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'instruments'),
			'menu_icon'   => 'dashicons-star-empty',
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init',  __NAMESPACE__ . '\\create_posttype' );

/*
* Create Custom Post Type
*/

function custom_post_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Instruments', 'Post Type General Name', 'sage' ),
		'singular_name'       => _x( 'Instrument', 'Post Type Singular Name', 'sage' ),
		'menu_name'           => __( 'Instruments', 'sage' ),
		'parent_item_colon'   => __( 'Parent Instrument', 'sage' ),
		'all_items'           => __( 'All Instruments', 'sage' ),
		'view_item'           => __( 'View Instrument', 'sage' ),
		'add_new_item'        => __( 'Add New Instrument', 'sage' ),
		'add_new'             => __( 'Add New', 'sage' ),
		'edit_item'           => __( 'Edit Instrument', 'sage' ),
		'update_item'         => __( 'Update Instrument', 'sage' ),
		'search_items'        => __( 'Search Instrument', 'sage' ),
		'not_found'           => __( 'Not Found', 'sage' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'sage' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'instruments', 'sage' ),
		'description'         => __( 'New instruments to showcase', 'sage' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		// You can associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'genres' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	
	// Registering your Custom Post Type
	register_post_type( 'instruments', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action( 'init',  __NAMESPACE__ . '\\custom_post_type', 0 );

add_action( 'pre_get_posts', __NAMESPACE__ . '\\add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'instruments' ) );
	return $query;
}

