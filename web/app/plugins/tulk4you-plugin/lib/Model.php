<?php
/**
 * Class for Model
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You;

// Contracts.
use Pixels\Tulk4You\Model\PostTypes\Contracts\PostTypeInterface;
use Pixels\Tulk4You\Model\Taxonomies\Contracts\TaxonomyInterface;

use Pixels\Tulk4You\Model\Meta\ACF as ACFSetup;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Tulk4You Model class
 * --> Handle custom post types
 * --> Handle taxonomies
 * --> Handle meta fields
 *
 * @since 1.0
 * @author Pixels
 */
class Model {

	/**
	 * Post types.
	 *
	 * @var array.
	 */
	private $post_types = array();

	/**
	 * Taxonomies
	 *
	 * @var array.
	 */
	private $taxonomies = array();

	/**
	 * Meta fields.
	 */
	private $meta_example;

	/**
	 * Common ACF.
	 *
	 * @var ACFSetup
	 */
	private $acf;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Custom post types.
		$this->add_post_type( 'example', new Model\PostTypes\Example() );

		// Taxonomies.
		$this->add_taxonomy( 'example_taxonomy', new Model\Taxonomies\ExampleTaxonomy() );

		// Fields.
		$this->meta_example = new Model\Meta\Fields\Example();

		// Misc.
		$this->acf = new ACFSetup();
	}

	/**
	 * Add Post Type.
	 *
	 * @param string $name
	 * @param PostTypeInterface $post_type
	 */
	public function add_post_type( string $name, PostTypeInterface $post_type ) {
		$this->post_types[ $name ] = $post_type;
	}

	/**
	 * Add Post Type.
	 *
	 * @param string $name
	 * @param TaxonomyInterface $taxonomy
	 */
	public function add_taxonomy( string $name, TaxonomyInterface $taxonomy ) {
		$this->taxonomies[ $name ] = $taxonomy;
	}

}
