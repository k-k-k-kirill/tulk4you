<?php
/**
 * Class for Sectioned Template Service
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Services;

// Contracts.
use Pixels\Tulk4You\Services\Contracts\ServiceInterface;

use \WP_Post;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Serve sectioned template related data
 */
class SectionedTemplate implements ServiceInterface {

  public function hasSection(array $templateSections, string $sectionKey): bool {
    $hasSection = false;

    foreach ( $templateSections as $section ) {
      if ( $section['acf_fc_layout'] === $sectionKey ) {
        $hasSection = true;
      }
    }

    return $hasSection;
  }
}
