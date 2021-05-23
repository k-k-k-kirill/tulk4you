<?php
/**
 * Class for Footer Options Page.
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Admin\OptionsPages;

/**
 * Register options page for footer.
 */
class FooterOptions {

	/**
	 * Class constructor
	 */
	public function __construct() {
		acf_add_options_page(
			array(
				'page_title'  => 'Footer Options',
				'menu_title'  => 'Footer Options',
			)
		);
	}
}
