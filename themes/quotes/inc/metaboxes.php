<?php
/**
 * Custom metaboxes for this theme using CMB2.
 *
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

if ( file_exists( get_template_directory() . '/inc/cmb2/init.php' ) ) {
	require_once( get_template_directory() . '/inc/cmb2/init.php' );
}

/**
 * Add metaboxes.
 */

function qod_register_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	// $prefix = '_qod_';

	$quote_meta = new_cmb2_box( array(
		'id'            => 'quote_metabox',
		'title'         => 'Quotes Meta',
		'object_types'  => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_in_rest' => WP_REST_Server::ALLMETHODS,
		'show_names' => true, // Show field names on the left
	) );

   $quote_meta->add_field( array(
		'name' => 'Quote Source',
		'desc' => 'Where did we find this quote?',
		'id'   => 'quote_source',
		'type' => 'text',
		'show_in_rest' => WP_REST_Server::ALLMETHODS // Allow field to be both read and written to via REST API.
	) );

   $quote_meta->add_field( array(
		'name' => 'Source URL',
		'desc' => 'What\'s the URL of the source, if available?',
		'id'   => 'quote_source_url',
		'type' => 'text_url',
		'show_in_rest' => WP_REST_Server::ALLMETHODS // Allow field to be both read and written to via REST API.
	) );
}

add_action( 'cmb2_admin_init', 'qod_register_metaboxes' );
