<?php
/**
 * Handles the settings for the plugin.
 *
 * @package WI\PostType\Project
 */

namespace WI\PostType\Project;

/**
 * Adds the settings page.
 *
 * @since 0.2.0
 *
 * @return void
 */
function add_settings_page(): void {
	add_submenu_page(
		'options-general.php',
		__( 'WI Post Type Project', 'wi-post-type-project' ),
		__( 'WI Post Type Project', 'wi-post-type-project' ),
		'manage_options',
		'wi-post-type-project',
		__NAMESPACE__ . '\settings_page_callback'
	);
}
add_action( 'admin_menu', __NAMESPACE__ . '\add_settings_page' );

/**
 * Outputs the content of the settings page.
 *
 * @since 0.2.0
 *
 * @return void
 */
function settings_page_callback(): void {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'WI Post Type Project', 'wi-post-type-project' ); ?></h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'wi-post-type-project' );
			do_settings_sections( 'wi-post-type-project' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Adds the settings section and fields.
 *
 * @since 0.2.0
 *
 * @return void
 */
function add_settings(): void {
	add_settings_section(
		'wi-post-type-project-settings',
		__( 'Project Post Type Settings', 'wi-post-type-project' ),
		__NAMESPACE__ . '\settings_section_callback',
		'wi-post-type-project'
	);

	register_setting(
		'wi-post-type-project',
		'wi-post-type-project-meta-item-count',
		array(
			'type'              => 'integer',
			'sanitize_callback' => 'absint',
			'default'           => 5,
		)
	);
	add_settings_field(
		'wi-post-type-project-settings-meta-items',
		__( 'Number of meta items', 'wi-post-type-project' ),
		__NAMESPACE__ . '\settings_field_meta_items_callback',
		'wi-post-type-project',
		'wi-post-type-project-settings'
	);
}
add_action( 'admin_init', __NAMESPACE__ . '\add_settings' );

/**
 * Outputs the description of the settings section.
 *
 * @return void
 */
function settings_section_callback(): void {}

/**
 * Outputs the content of the 'Number of meta items' field.
 *
 * @return void
 */
function settings_field_meta_items_callback(): void {
	$meta_items = get_option( 'wi-post-type-project-meta-item-count', 5 );
	?>
	<input type="number" name="wi-post-type-project-meta-item-count" value="<?php echo esc_attr( $meta_items ); ?>" />
	<?php
}

