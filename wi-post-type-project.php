<?php
/**
 * Plugin Name:     WI Post Type Service
 * Plugin URI:      https://github.com/wielgosz-info/wi-post-type-project
 * Description:     'Service' custom post type.
 * Author:          Urszula Wielgosz
 * Author URI:      https://urszula.wielgosz.info
 * Text Domain:     wi-post-type-project
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         WI\PostTypeService
 */

namespace WI\PostTypeService;

function add_service_post_type() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Post Type General Name', 'wi-post-type-project' ),
		'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'wi-post-type-project' ),
	);

	register_post_type( 'wi-project', array(
		'labels'                => $labels,
		'description'           => __( 'Used to describe and organize projects/portfolio.', 'wi-post-type-project' ),
		'public'                => true,
		'show_in_rest'          => true,
		'menu_icon'             => 'dashicons-interactive',
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields' ),
		'has_archive'           => true,
		'delete_with_user'      => false,
	) );
}
add_action( 'init', __NAMESPACE__ . '\add_service_post_type' );
