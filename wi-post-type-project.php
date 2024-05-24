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
function wi_post_type_project_add_post_type(): void {
	$labels = [
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
	];
	$labels = apply_filters( 'wi-project-labels', $labels );

	$args = [
		'label'               => __( 'Project', 'wi-post-type-project' ),
		'description'         => __( 'Used to describe and organize projects/portfolio.', 'wi-post-type-project' ),
		'labels'              => $labels,
		'supports'            => [
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
			'custom-fields',
		],
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
	];
	$args = apply_filters( 'wi-project-args', $args );

	register_post_type( 'wi-project', $args );
}
add_action( 'init', __NAMESPACE__ . '\wi_post_type_project_add_post_type' );

/**
 * Registers the 'wi-project-category' taxonomy.
 *
 * @return void
 */
function wi_post_type_project_add_categories(): void {
	$labels = [
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
	];

	$args = [
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => false,
		'show_in_rest'      => true,
	];

	register_taxonomy( 'wi-project-category', [ 'wi-project' ], $args );
}
add_action( 'init', __NAMESPACE__ . '\wi_post_type_project_add_categories' );

define( 'WI_PROJECT_META_ITEM_COUNT', 5 );

/**
 * Registers very simple custom fields for the 'wi-project' post type.
 * Intended to be used with the WordPress 6.5 Block Bindings API.
 *
 * @see https://make.wordpress.org/core/2024/03/06/new-feature-the-block-bindings-api/
 *
 * @return void
 */
function wi_post_type_project_add_meta_fields() {
	for ( $i = 0; $i < WI_PROJECT_META_ITEM_COUNT; $i++ ) {
		register_meta(
			'post',
			"wi-post-type-project-meta-item-$i",
			array(
				'object_subtype' => 'wi-project',
				'show_in_rest'   => true,
				'single'         => true,
				'type'           => 'string',
			)
		);
	}

	// CTA Button: label, URL & open in new tab.
	register_meta(
		'post',
		'wi-post-type-project-cta-label',
		array(
			'object_subtype' => 'wi-project',
			'show_in_rest'   => true,
			'single'         => true,
			'type'           => 'string',
			'default'        => __( 'View project', 'wi-post-type-project' ),
		)
	);

	register_meta(
		'post',
		'wi-post-type-project-cta-url',
		array(
			'object_subtype' => 'wi-project',
			'show_in_rest'   => true,
			'single'         => true,
			'type'           => 'string',
			'default'        => '',
		)
	);

	register_meta(
		'post',
		'wi-post-type-project-cta-new-tab',
		array(
			'object_subtype' => 'wi-project',
			'show_in_rest'   => true,
			'single'         => true,
			'type'           => 'boolean',
			'default'        => true,
		)
	);
}
add_action( 'init', __NAMESPACE__ . '\wi_post_type_project_add_meta_fields' );

/**
 * Registers a custom meta box for the 'wi-project' post type.
 *
 * @return void
 */
function wi_post_type_project_add_meta_box() {
	add_meta_box(
		'wi-post-type-project-meta-box',
		__( 'Project Details', 'wi-post-type-project' ),
		__NAMESPACE__ . '\wi_post_type_project_meta_box_callback',
		'wi-project',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', __NAMESPACE__ . '\wi_post_type_project_add_meta_box' );

/**
 * Outputs the content of the 'wi-project' post type meta box.
 *
 * @param \WP_Post $post The current post object.
 *
 * @return void
 */
function wi_post_type_project_meta_box_callback( \WP_Post $post ) {
	wp_nonce_field( 'wi-post-type-project-meta-box', 'wi-post-type-project-meta-box-nonce' );

	$meta_items = [];
	for ( $i = 0; $i < WI_PROJECT_META_ITEM_COUNT; $i++ ) {
		$meta_items[ $i ] = get_post_meta( $post->ID, "wi-post-type-project-meta-item-$i", true );
	}

	?>
	<h3><?php esc_html_e( 'Meta items', 'wi-post-type-project' ); ?></h3>
	<p><?php esc_html_e( 'Add details for the project. The fields accept limited HTML.', 'wi-post-type-project' ); ?></p>
	<table class="form-table">
		<tbody>
			<?php foreach ( $meta_items as $i => $meta_item ) : ?>
				<tr>
					<th scope="row">
						<label for="wi-post-type-project-meta-item-<?php echo esc_attr( $i ); ?>">
							<?php esc_html_e( 'Item', 'wi-post-type-project' ); ?> 		<?php echo intval( $i ); ?>
						</label>
					</th>
					<td>
						<textarea id="wi-post-type-project-meta-item-<?php echo esc_attr( $i ); ?>"
							name="wi-post-type-project-meta-item-<?php echo esc_attr( $i ); ?>" class="large-text" placeholder="<?php esc_attr_e( sprintf( '<strong>%1s %2d:</strong> %3s',
								 	__( 'Label', 'wi-post-type-project' ),
								 	$i,
								 	__( 'Value(s)', 'wi-post-type-project' )
								 ) ); ?>"><?php echo esc_textarea( $meta_item ); ?></textarea>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<h3><?php esc_html_e( 'CTA Button', 'wi-post-type-project' ); ?></h3>
	<p><?php esc_html_e( 'Add link that should be featured on project page, e.g. to live demo or code.', 'wi-post-type-project' ); ?>
	</p>
	<table class="form-table">
		<tbody>
			<tr>
				<th scope="row">
					<label for="wi-post-type-project-cta-label">
						<?php esc_html_e( 'Label', 'wi-post-type-project' ); ?>
					</label>
				</th>
				<td>
					<input type="text" id="wi-post-type-project-cta-label" name="wi-post-type-project-cta-label"
						value="<?php echo esc_attr( get_post_meta( $post->ID, 'wi-post-type-project-cta-label', true ) ); ?>"
						class="regular-text">
				</td>
			</tr>
			<tr>
				<th scope="row">
					<label for="wi-post-type-project-cta-url">
						<?php esc_html_e( 'URL', 'wi-post-type-project' ); ?>
					</label>
				</th>
				<td>
					<input type="url" id="wi-post-type-project-cta-url" name="wi-post-type-project-cta-url"
						value="<?php echo esc_url( get_post_meta( $post->ID, 'wi-post-type-project-cta-url', true ) ); ?>"
						class="regular-text">
				</td>
			</tr>
			<tr>
				<td class="td-full">
					<label for="wi-post-type-project-cta-new-tab">
						<input type="checkbox" id="wi-post-type-project-cta-new-tab" name="wi-post-type-project-cta-new-tab"
							<?php checked( '_blank' === get_post_meta( $post->ID, 'wi-post-type-project-cta-new-tab', true ) ); ?>>
						<?php esc_html_e( 'Open in new tab', 'wi-post-type-project' ); ?>
					</label>
				</td>
		</tbody>
	</table>
	<?php
}

/**
 * Saves the custom meta fields for the 'wi-project' post type.
 *
 * @param int $post_id The current post ID.
 *
 * @return void
 */
function wi_post_type_project_save_meta_fields( int $post_id ) {
	if ( ! isset( $_POST['wi-post-type-project-meta-box-nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['wi-post-type-project-meta-box-nonce'], 'wi-post-type-project-meta-box' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	for ( $i = 0; $i < WI_PROJECT_META_ITEM_COUNT; $i++ ) {
		if ( isset( $_POST[ "wi-post-type-project-meta-item-$i" ] ) ) {
			update_post_meta( $post_id, "wi-post-type-project-meta-item-$i", wp_kses( $_POST[ "wi-post-type-project-meta-item-$i" ], 'data' ) );
		}
	}

	if ( isset( $_POST['wi-post-type-project-cta-label'] ) ) {
		update_post_meta( $post_id, 'wi-post-type-project-cta-label', sanitize_text_field( $_POST['wi-post-type-project-cta-label'] ) );
	}

	if ( isset( $_POST['wi-post-type-project-cta-url'] ) ) {
		update_post_meta( $post_id, 'wi-post-type-project-cta-url', sanitize_url( $_POST['wi-post-type-project-cta-url'] ) );
	}

	if ( isset( $_POST['wi-post-type-project-cta-new-tab'] ) ) {
		update_post_meta( $post_id, 'wi-post-type-project-cta-new-tab', '_blank' );
	} else {
		delete_post_meta( $post_id, 'wi-post-type-project-cta-new-tab' );
	}
}
add_action( 'save_post', __NAMESPACE__ . '\wi_post_type_project_save_meta_fields' );
