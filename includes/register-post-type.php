<?php
/**
 * Handles the registration of the 'wi-project' post type and its taxonomies.
 *
 * @package WI\PostType\Project
 */

namespace WI\PostType\Project;

/**
 * Registers a custom post type 'wi-project'.
 *
 * @since 0.1.0
 *
 * @return void
 */
function add_post_type(): void {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'wi-post-type-project' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'wi-post-type-project' ),
		'menu_name'             => __( 'Projects', 'wi-post-type-project' ),
		'name_admin_bar'        => __( 'Projects', 'wi-post-type-project' ),
		'archives'              => __( 'Projects Archives', 'wi-post-type-project' ),
		'attributes'            => __( 'Projects Attributes', 'wi-post-type-project' ),
		'parent_item_colon'     => __( 'Parent Project:', 'wi-post-type-project' ),
		'all_items'             => __( 'All Projects', 'wi-post-type-project' ),
		'add_new_item'          => __( 'Add New Project', 'wi-post-type-project' ),
		'add_new'               => __( 'Add New', 'wi-post-type-project' ),
		'new_item'              => __( 'New Project', 'wi-post-type-project' ),
		'edit_item'             => __( 'Edit Project', 'wi-post-type-project' ),
		'update_item'           => __( 'Update Project', 'wi-post-type-project' ),
		'view_item'             => __( 'View Project', 'wi-post-type-project' ),
		'view_items'            => __( 'View Projects', 'wi-post-type-project' ),
		'search_items'          => __( 'Search Projects', 'wi-post-type-project' ),
		'not_found'             => __( 'Project Not Found', 'wi-post-type-project' ),
		'not_found_in_trash'    => __( 'Project Not Found in Trash', 'wi-post-type-project' ),
		'featured_image'        => __( 'Featured Image', 'wi-post-type-project' ),
		'set_featured_image'    => __( 'Set Featured Image', 'wi-post-type-project' ),
		'remove_featured_image' => __( 'Remove Featured Image', 'wi-post-type-project' ),
		'use_featured_image'    => __( 'Use as Featured Image', 'wi-post-type-project' ),
		'insert_into_item'      => __( 'Insert into Project', 'wi-post-type-project' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'wi-post-type-project' ),
		'items_list'            => __( 'Projects List', 'wi-post-type-project' ),
		'items_list_navigation' => __( 'Projects List Navigation', 'wi-post-type-project' ),
		'filter_items_list'     => __( 'Filter Projects List', 'wi-post-type-project' ),
	);
	$labels = apply_filters( 'wi_post_type_project_labels', $labels );

	$args = array(
		'label'               => __( 'Project', 'wi-post-type-project' ),
		'description'         => __( 'Used to describe and organize projects/portfolio.', 'wi-post-type-project' ),
		'labels'              => $labels,
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
			'custom-fields',
		),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-art',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'can_export'          => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	$args = apply_filters( 'wi_post_type_project_args', $args );

	register_post_type( 'wi-project', $args );
}
add_action( 'init', __NAMESPACE__ . '\add_post_type' );

/**
 * Registers the 'wi-project-category' taxonomy.
 *
 * @return void
 */
function add_categories(): void {
	$labels = array(
		'name'                  => _x( 'Project Categories', 'Taxonomy Name', 'wi-post-type-project' ),
		'singular_name'         => _x( 'Project Category', 'Taxonomy Singular Name', 'wi-post-type-project' ),
		'menu_name'             => __( 'Project Categories ', 'wi-post-type-project' ),
		'all_items'             => __( 'All Project Categories ', 'wi-post-type-project' ),
		'parent_item'           => __( 'Parent Project Category ', 'wi-post-type-project' ),
		'parent_item_colon'     => __( 'Parent Project Category: ', 'wi-post-type-project' ),
		'new_item_name'         => __( 'New Project Category ', 'wi-post-type-project' ),
		'add_new_item'          => __( 'Add New Project Category ', 'wi-post-type-project' ),
		'edit_item'             => __( 'Edit Project Category ', 'wi-post-type-project' ),
		'update_item'           => __( 'Update Project Category ', 'wi-post-type-project' ),
		'view_item'             => __( 'View Project Category ', 'wi-post-type-project' ),
		'add_or_remove_items'   => __( 'Add or Remove Project Categories ', 'wi-post-type-project' ),
		'choose_from_most_used' => __( 'Choose from most used Project Categories ', 'wi-post-type-project' ),
		'popular_items'         => __( 'Popular Project Categories ', 'wi-post-type-project' ),
		'search_items'          => __( 'Search Project Categories ', 'wi-post-type-project' ),
		'not_found'             => __( 'Not Found ', 'wi-post-type-project' ),
		'no_terms'              => __( 'No Project Categories ', 'wi-post-type-project' ),
		'items_list'            => __( 'Project Categories List ', 'wi-post-type-project' ),
		'items_list_navigation' => __( 'Project Categories List Navigation ', 'wi-post-type-project' ),
		'back_to_items'         => __( '← Go to Project Categories ', 'wi-post-type-project' ),
		'item_link'             => __( 'Project Category Link ', 'wi-post-type-project' ),
		'item_link_description' => __( 'A link to a Project Category ', 'wi-post-type-project' ),
	);

	$args = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'show_in_rest'      => true,
	);

	register_taxonomy( 'wi-project-category', array( 'wi-project' ), $args );
}
add_action( 'init', __NAMESPACE__ . '\add_categories' );
