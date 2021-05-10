<?php
/**
 * Class for Ajax
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You;

// AJAX controllers.
use Pixels\Tulk4You\Ajax\ExampleAjax;

/**
 * Ajax class
 *
 * --> Create handler instances Ajax endpoints
 */
class Ajax {

	/**
	 * ExampleAjax instance
	 *
	 * @var ExampleAjax
	 */
	private $example_ajax;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Initialize individual Ajax endpoints.
		$this->example_ajax = new ExampleAjax();

	}
}
