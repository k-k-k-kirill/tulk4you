<?php
/**
 * Class for Blog Options Page.
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Admin\OptionsPages;

/**
 * Register options page for blog
 */
class BlogOptions {

	/**
	 * Class constructor
	 */
	public function __construct() {
		acf_add_options_page(
			array(
				'page_title'  => 'Blog Options',
				'menu_title'  => 'Blog Options',
			)
		);
	}

}
