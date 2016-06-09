<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Register SeaTalk Custom Post Type
function simres_seatalk_cpt() {

	$labels = array(
		'name'                  => 'SeaTalks',
		'singular_name'         => 'SeaTalk',
		'menu_name'             => 'SeaTalks',
		'name_admin_bar'        => 'SeaTalk',
		'archives'              => 'SeaTalk Archives',
		'parent_item_colon'     => 'Parent SeaTalk:',
		'all_items'             => 'All SeaTalks',
		'add_new_item'          => 'Add New SeaTalk',
		'add_new'               => 'Add New',
		'new_item'              => 'New SeaTalk',
		'edit_item'             => 'Edit SeaTalk',
		'update_item'           => 'Update SeaTalk',
		'view_item'             => 'View SeaTalk',
		'search_items'          => 'Search SeaTalk',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into seatalk',
		'uploaded_to_this_item' => 'Uploaded to this seatalk',
		'items_list'            => 'SeaTalks list',
		'items_list_navigation' => 'SeaTalks list navigation',
		'filter_items_list'     => 'Filter seatalks list',
	);
	$args = array(
		'label'                 => 'SeaTalk',
		'description'           => 'SeaTalk Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'author', 'thumbnail', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'seatalks',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'seatalk', $args );

}
add_action( 'init', 'simres_seatalk_cpt', 0 );

// Register Directors CPT
// Register Custom Post Type
function simres_directors_cpt() {

	$labels = array(
		'name'                  => 'Directors',
		'singular_name'         => 'Director',
		'menu_name'             => 'Directors',
		'name_admin_bar'        => 'Director',
		'archives'              => 'Director Archives',
		'parent_item_colon'     => 'Parent Director:',
		'all_items'             => 'All Directors',
		'add_new_item'          => 'Add New Director',
		'add_new'               => 'Add New',
		'new_item'              => 'New Director',
		'edit_item'             => 'Edit Director',
		'update_item'           => 'Update Director',
		'view_item'             => 'View Director',
		'search_items'          => 'Search Director',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into director',
		'uploaded_to_this_item' => 'Uploaded to this director',
		'items_list'            => 'Directors list',
		'items_list_navigation' => 'Directors list navigation',
		'filter_items_list'     => 'Filter directors list',
	);
	$args = array(
		'label'                 => 'director',
		'description'           => 'Director Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'directors',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'directors', $args );

}
add_action( 'init', 'simres_directors_cpt', 0 );
