<?php
/**
 * Handles the registration of simple custom meta fields and metabox for the 'wi-project' post type.
 *
 * @package WI\PostType\Project
 */

namespace WI\PostType\Project;

/**
 * Registers very simple custom fields for the 'wi-project' post type.
 * Intended to be used with the WordPress 6.5 Block Bindings API.
 *
 * @see https://make.wordpress.org/core/2024/03/06/new-feature-the-block-bindings-api/
 * @since 0.2.0
 *
 * @return void
 */
function add_meta_fields() {
	$meta_items_count = get_option( 'wi-post-type-project-meta-item-count', WI_POST_TYPE_PROJECT_DEFAULT_META_ITEMS_COUNT );
	for ( $i = 0; $i < $meta_items_count; $i++ ) {
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
add_action( 'init', __NAMESPACE__ . '\add_meta_fields' );

/**
 * Registers a custom meta box for the 'wi-project' post type.
 *
 * @since 0.2.0
 *
 * @return void
 */
function add_meta_box() {
	\add_meta_box(
		'wi-post-type-project-meta-box',
		__( 'Project Details', 'wi-post-type-project' ),
		__NAMESPACE__ . '\meta_box_callback',
		'wi-project',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', __NAMESPACE__ . '\add_meta_box' );

/**
 * Outputs the content of the 'wi-project' post type meta box.
 *
 * @param \WP_Post $post The current post object.
 *
 * @return void
 */
function meta_box_callback( \WP_Post $post ) {
	wp_nonce_field( 'wi-post-type-project-meta-box', 'wi-post-type-project-meta-box-nonce' );

	$meta_items       = array();
	$meta_items_count = get_option( 'wi-post-type-project-meta-item-count', WI_POST_TYPE_PROJECT_DEFAULT_META_ITEMS_COUNT );
	for ( $i = 0; $i < $meta_items_count; $i++ ) {
		$meta_items[ $i ] = get_post_meta( $post->ID, "wi-post-type-project-meta-item-$i", true );
	}
	$placeholder = sprintf(
		'<strong>%1s:</strong> %2s',
		__( 'Label', 'wi-post-type-project' ),
		__( 'Value(s)', 'wi-post-type-project' )
	);

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
							name="wi-post-type-project-meta-item-<?php echo esc_attr( $i ); ?>"
							class="large-text"
							placeholder="<?php echo esc_attr( $placeholder ); ?>"><?php echo esc_textarea( $meta_item ); ?></textarea>
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
 * @since 0.2.0
 *
 * @param int $post_id The current post ID.
 *
 * @return void
 */
function save_meta_fields( int $post_id ) {
	if ( ! isset( $_POST['wi-post-type-project-meta-box-nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( sanitize_key( wp_unslash( $_POST['wi-post-type-project-meta-box-nonce'] ) ), 'wi-post-type-project-meta-box' ) ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$meta_items_count = get_option( 'wi-post-type-project-meta-item-count', WI_POST_TYPE_PROJECT_DEFAULT_META_ITEMS_COUNT );
	for ( $i = 0; $i < $meta_items_count; $i++ ) {
		if ( isset( $_POST[ "wi-post-type-project-meta-item-$i" ] ) ) {
			update_post_meta( $post_id, "wi-post-type-project-meta-item-$i", wp_kses( wp_unslash( $_POST[ "wi-post-type-project-meta-item-$i" ] ), 'data' ) );
		}
	}

	if ( isset( $_POST['wi-post-type-project-cta-label'] ) ) {
		update_post_meta( $post_id, 'wi-post-type-project-cta-label', sanitize_text_field( wp_unslash( $_POST['wi-post-type-project-cta-label'] ) ) );
	}

	if ( isset( $_POST['wi-post-type-project-cta-url'] ) ) {
		// phpcs:disable WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.WP.DeprecatedFunctions.sanitize_urlFound
		update_post_meta( $post_id, 'wi-post-type-project-cta-url', sanitize_url( wp_unslash( $_POST['wi-post-type-project-cta-url'] ) ) );
		// phpcs:enable WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.WP.DeprecatedFunctions.sanitize_urlFound
	}

	if ( isset( $_POST['wi-post-type-project-cta-new-tab'] ) ) {
		update_post_meta( $post_id, 'wi-post-type-project-cta-new-tab', '_blank' );
	} else {
		delete_post_meta( $post_id, 'wi-post-type-project-cta-new-tab' );
	}
}
add_action( 'save_post', __NAMESPACE__ . '\save_meta_fields' );
