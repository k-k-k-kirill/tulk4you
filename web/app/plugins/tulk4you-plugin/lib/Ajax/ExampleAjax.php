<?php
/**
 * Class for ExampleAjax
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Ajax;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Tulk4You Example Ajax class
 */
class ExampleAjax {

	/**
	 * Ajax endpoint name.
	 */
	const AJAX_ENDPOINT = 'example_endpoint';

	/**
	 * Nonce name used for this endpoint.
	 * Register Nonces in theme & include them in request.
	 */
	const NONCE_NAME = 'example_nonce';

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Register endpoints.
		add_action( 'wp_ajax_nopriv_' . self::AJAX_ENDPOINT, array( $this, 'handle_request' ) );
		add_action( 'wp_ajax_' . self::AJAX_ENDPOINT, array( $this, 'handle_request' ) );
	}

	/**
	 * Handle AJAX request.
	 */
	public function handle_request() {

		/**
		 * Access data with $_REQUEST array.
		 * Verify nonce from theme
		 * Send json reply
		 */

		// Nonce verification.
		if ( isset( $_REQUEST['nonce'] ) &&
			wp_verify_nonce( sanitize_key( $_REQUEST['nonce'] ), self::NONCE_NAME ) ) :

			// Business logic.
			wp_send_json( 'ok' );
		else :
			// Error handling.
			wp_send_json( 'not ok' );
		endif;
	}

}
