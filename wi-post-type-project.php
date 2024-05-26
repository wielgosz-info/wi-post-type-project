<?php
/**
 * Plugin Name:     WI Post Type Project
 * Plugin URI:      https://github.com/wielgosz-info/wi-post-type-project
 * Description:     'Project' custom post type.
 * Author:          Urszula Wielgosz
 * Author URI:      https://urszula.wielgosz.info
 * Text Domain:     wi-post-type-project
 * Domain Path:     /languages
 * Version:         0.2.0
 *
 * @package         WI\PostType\Project
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


define( 'WI_POST_TYPE_PROJECT_DEFAULT_META_ITEMS_COUNT', 5 );

require_once plugin_dir_path( __FILE__ ) . 'includes/register-post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/register-meta.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/handle-settings.php';
