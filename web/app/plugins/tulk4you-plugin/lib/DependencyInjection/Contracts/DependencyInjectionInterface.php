<?php
/**
 * DI Interface
 *
 * @package Tulk4You
 */

namespace Pixels\Tulk4You\DependencyInjection\Contracts;

use Pixels\Tulk4You\Services\Contracts\ServiceInterface;

/**
 * DI interface
 */
interface DependencyInjectionInterface {

	public function get( string $key );
	public function set( string $key, ServiceInterface $service );
}
