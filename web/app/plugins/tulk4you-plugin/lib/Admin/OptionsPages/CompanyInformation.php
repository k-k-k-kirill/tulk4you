<?php
/**
 * Class for Company Information Options Page.
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Admin\OptionsPages;

/**
 * Register options page for example
 */
class CompanyInformation {

	/**
	 * Class constructor
	 */
	public function __construct() {
		acf_add_options_page(
			array(
				'page_title'  => 'Company Information',
				'menu_title'  => 'Company Information',
                'icon_url'   => 'dashicons-store'
			)
		);
	}

}
