<?php
/**
 * Class for ExampleTaxonomy
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Model\Taxonomies;

// Contracts.
use Pixels\Tulk4You\Model\Taxonomies\Contracts\AbstractTaxonomy;
use Pixels\Tulk4You\Model\Taxonomies\Contracts\TaxonomyInterface;

/**
 * Registers ExampleTaxonomy tax
 */
class ExampleTaxonomy extends AbstractTaxonomy implements TaxonomyInterface {

	/**
	 * Constant do define if post labels should be translatable
	 * --> If true, define labels as translatable strings
	 * --> If false, autocreate labels from one word
	 */
	const TRANSLATE_LABELS = false;

	/**
	 * Class constructor
	 */
	public function __construct() {

		// Set up tax.
		$this->set_name( 'example_category' );
		$this->set_post_type( 'example' );

		// Set labels.
		$this->prepare_labels();

		$this->set_args( $this->define_args() );

		// Hook up example taxonomy.
		add_action( 'init', array( $this, 'create' ) );
	}

	/**
	 * Prepare base labels to props.
	 * Behavior depends on TRANSLATE_LABELS const.
	 */
	public function prepare_labels() {

		if ( self::TRANSLATE_LABELS ) :
			// If you need to translate labels.
			$singular = __( 'Example Category', 'tulk4you-plugin' );
			$plural   = __( 'Example Categories', 'tulk4you-plugin' );

			$this->set_manual_labels( $singular, $plural );
		else :
			// Automatically generate labels from one word.
			$this->set_automatic_labels( 'Example Category' );
		endif;

	}

	/**
	 * Get arguments for tax registration
	 *
	 * @return array $labels
	 */
	public function define_args() {

		// Check if we're using manual or automatic labels.
		if ( null === $this->tax_label_singular && null === $this->tax_label_plural ) :
			$labels = $this->define_labels();
		else :
			$labels = $this->get_labels();
		endif;

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'has_archive'       => true,
			'rewrite'           => array(
				'slug'       => 'examples',
				'with_front' => true,
			),
		);

		return $args;
	}

	/**
	 * OPTIONAL: Set labels manually for registration
	 * If you need to set everything manually,
	 * comment out the prepare_labels() in constructor
	 *
	 * @return array $labels
	 */
	public function define_labels() {

		$labels = array(
			'name'              => _x( 'Example Tax', 'taxonomy general name', 'tulk4you-plugin' ),
			'singular_name'     => _x( 'Example Tax', 'taxonomy singular name', 'tulk4you-plugin' ),
			'search_items'      => __( 'Search Example ', 'tulk4you-plugin' ),
			'all_items'         => __( 'All Examples', 'tulk4you-plugin' ),
			'parent_item'       => __( 'Parent Examples', 'tulk4you-plugin' ),
			'parent_item_colon' => __( 'Parent Example:', 'tulk4you-plugin' ),
			'edit_item'         => __( 'Edit Example', 'tulk4you-plugin' ),
			'update_item'       => __( 'Update Example', 'tulk4you-plugin' ),
			'add_new_item'      => __( 'Add New Example', 'tulk4you-plugin' ),
			'delete_item'       => __( 'Delete item', 'tulk4you-plugin' ),
			'new_item_name'     => __( 'New Example', 'tulk4you-plugin' ),
		);

		return $labels;
	}

}
