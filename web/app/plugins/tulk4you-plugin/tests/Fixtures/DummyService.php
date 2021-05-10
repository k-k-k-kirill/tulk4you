<?php
/**
 * Class for Test Service
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Tests\Fixtures;

// Contracts.
use Pixels\Tulk4You\Services\Contracts\ServiceInterface;

use \WP_Post;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Test service for unit tests.
 */
class DummyService implements ServiceInterface {
}
