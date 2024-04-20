<?php
/**
 * Plugin Name:     WI Post Type Project
 * Plugin URI:      https://github.com/wielgosz-info/wi-post-type-project
 * Description:     'Project' custom post type.
 * Author:          Urszula Wielgosz
 * Author URI:      https://urszula.wielgosz.info
 * Text Domain:     wi-post-type-project
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         WI\PostType\Project
 */

namespace WI\PostType\Project;

/**
 * Registers a custom post type 'wi-project'.
 *
 * @since 0.1.0
 *
 * @return void
 */
function add_project_post_type() : void {
	$labels = [
		'name' => _x( 'Projects', 'Post Type General Name', 'wi-post-type-project' ),
		'singular_name' => _x( 'Project', 'Post Type Singular Name', 'wi-post-type-project' ),
		'menu_name' => __( 'Projects', 'wi-post-type-project' ),
		'name_admin_bar' => __( 'Projects', 'wi-post-type-project' ),
		'archives' => __( 'Projects Archives', 'wi-post-type-project' ),
		'attributes' => __( 'Projects Attributes', 'wi-post-type-project' ),
		'parent_item_colon' => __( 'Parent Project:', 'wi-post-type-project' ),
		'all_items' => __( 'All Projects', 'wi-post-type-project' ),
		'add_new_item' => __( 'Add New Project', 'wi-post-type-project' ),
		'add_new' => __( 'Add New', 'wi-post-type-project' ),
		'new_item' => __( 'New Project', 'wi-post-type-project' ),
		'edit_item' => __( 'Edit Project', 'wi-post-type-project' ),
		'update_item' => __( 'Update Project', 'wi-post-type-project' ),
		'view_item' => __( 'View Project', 'wi-post-type-project' ),
		'view_items' => __( 'View Projects', 'wi-post-type-project' ),
		'search_items' => __( 'Search Projects', 'wi-post-type-project' ),
		'not_found' => __( 'Project Not Found', 'wi-post-type-project' ),
		'not_found_in_trash' => __( 'Project Not Found in Trash', 'wi-post-type-project' ),
		'featured_image' => __( 'Featured Image', 'wi-post-type-project' ),
		'set_featured_image' => __( 'Set Featured Image', 'wi-post-type-project' ),
		'remove_featured_image' => __( 'Remove Featured Image', 'wi-post-type-project' ),
		'use_featured_image' => __( 'Use as Featured Image', 'wi-post-type-project' ),
		'insert_into_item' => __( 'Insert into Project', 'wi-post-type-project' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'wi-post-type-project' ),
		'items_list' => __( 'Projects List', 'wi-post-type-project' ),
		'items_list_navigation' => __( 'Projects List Navigation', 'wi-post-type-project' ),
		'filter_items_list' => __( 'Filter Projects List', 'wi-post-type-project' ),
	];
	$labels = apply_filters( 'wi-project-labels', $labels );

	$args = [
		'label' => __( 'Project', 'wi-post-type-project' ),
		'description' => __( 'Used to describe and organize projects/portfolio.', 'wi-post-type-project' ),
		'labels' => $labels,
		'supports' => [
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
			'custom-fields',
		],
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-art',
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'can_export' => true,
		'capability_type' => 'post',
		'show_in_rest' => true,
	];
	$args = apply_filters( 'wi-project-args', $args );

	register_post_type( 'wi-project', $args );
}
add_action( 'init', __NAMESPACE__ . '\add_project_post_type' );
