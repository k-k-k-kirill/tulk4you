<?php
/**
 * Class for Options pages
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Admin;

use Pixels\Tulk4You\Admin\OptionsPages\CompanyInformation;
use Pixels\Tulk4You\Admin\OptionsPages\HeaderOptions;
use Pixels\Tulk4You\Admin\OptionsPages\FooterOptions;

/**
 * Instantiates individual options pages
 */
class OptionsPages {

	/**
	 * Company Information options page.
	 *
	 * @var CompanyInformation
	 */
	private $company_information;

	/**
	 * Header options page.
	 *
	 * @var HeaderOptions
	 */
	private $header_options;

	/**
	 * Footer options page.
	 *
	 * @var HeaderOptions
	 */
	private $footer_options;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Load ACF options pages.
		add_filter( 'acf/init', array( $this, 'load_acf_options_pages' ) );
	}

	/**
	 * Load individual options pages
	 *
	 * @since 1.0
	 */
	public function load_acf_options_pages() {

		// Load options pages.
		$this->company_information = new OptionsPages\CompanyInformation();
		$this->header_options = new OptionsPages\HeaderOptions();
		$this->footer_options = new OptionsPages\FooterOptions();
	}
}
