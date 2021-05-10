<?php
/**
 * Class for Example Options Page.
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Admin\OptionsPages;

/**
 * Register options page for example
 */
class Example {

	/**
	 * Class constructor
	 */
	public function __construct() {
		acf_add_options_sub_page(
			array(
				'page_title'  => 'Example Settings',
				'menu_title'  => 'Example',
				'parent_slug' => 'themes.php',
			)
		);
	}

}
