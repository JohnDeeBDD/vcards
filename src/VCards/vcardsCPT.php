<?php

// Register Custom Post Type
function vcards() {

	$labels = array(
		'name'                  => _x( 'Cards', 'Post Type General Name', 'vcards' ),
		'singular_name'         => _x( 'Card', 'Post Type Singular Name', 'vcards' ),
		'menu_name'             => __( 'Cards', 'vcards' ),
		'name_admin_bar'        => __( 'Card', 'vcards' ),
		'archives'              => __( 'Card Archives', 'vcards' ),
		'attributes'            => __( 'Card Attributes', 'vcards' ),
		'parent_item_colon'     => __( 'Parent Card:', 'vcards' ),
		'all_items'             => __( 'All Cards', 'vcards' ),
		'add_new_item'          => __( 'Add New Card', 'vcards' ),
		'add_new'               => __( 'Add New', 'vcards' ),
		'new_item'              => __( 'New Card', 'vcards' ),
		'edit_item'             => __( 'Edit Card', 'vcards' ),
		'update_item'           => __( 'Update Card', 'vcards' ),
		'view_item'             => __( 'View Card', 'vcards' ),
		'view_items'            => __( 'View Cards', 'vcards' ),
		'search_items'          => __( 'Search Card', 'vcards' ),
		'not_found'             => __( 'Not found', 'vcards' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'vcards' ),
		'featured_image'        => __( 'Featured Image', 'vcards' ),
		'set_featured_image'    => __( 'Set featured image', 'vcards' ),
		'remove_featured_image' => __( 'Remove featured image', 'vcards' ),
		'use_featured_image'    => __( 'Use as featured image', 'vcards' ),
		'insert_into_item'      => __( 'Insert into card', 'vcards' ),
		'uploaded_to_this_item' => __( 'Uploaded to this card', 'vcards' ),
		'items_list'            => __( 'Cards list', 'vcards' ),
		'items_list_navigation' => __( 'Cards list navigation', 'vcards' ),
		'filter_items_list'     => __( 'Filter cards list', 'vcards' ),
	);
	$args = array(
		'label'                 => __( 'Card', 'vcards' ),
		'description'           => __( 'Custom Cards', 'vcards' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'revisions', 'custom-fields', 'author' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-media-spreadsheet',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'vcard', $args );

}
add_action( 'init', 'vcards', 0 );
