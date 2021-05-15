<?php
/**
 * Class for Header Options Page.
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Admin\OptionsPages;

/**
 * Register options page for example
 */
class HeaderOptions {

	/**
	 * Class constructor
	 */
	public function __construct() {
		acf_add_options_page(
			array(
				'page_title'  => 'Header Options',
				'menu_title'  => 'Header Options',
			)
		);
	}
}
