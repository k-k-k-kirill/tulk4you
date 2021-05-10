<?php
/**
 * Class for ExampleController
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\RestControllers;

use \WP_REST_Request;

// Services controllers use.
// use \Pixels\Tulk4You\Services\ExampleService;.


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Tulk4You Example Controller class
 * Handle /example/ rest endpoints
 */
class ExampleController {

	/**
	 * GET request to /Tulk4You/v1/example
	 *
	 * @param \WP_REST_Request $request content of the request.
	 * @return array $response to return.
	 */
	public function get( WP_REST_Request $request ) {
		$response = array();

		/**
		 * Handle GET endpoint
		 * Use Services for further business logic
		 */

		return $response;
	}

	/**
	 * POST request to /Tulk4You/v1/example
	 *
	 * @param \WP_REST_Request $request content of the request.
	 * @return array $response to return.
	 */
	public function post( WP_REST_Request $request ) {
		$response = array();

		/**
		 * Handle POST endpoint
		 * Use Services for further business logic
		 */

		return $response;
	}

}
