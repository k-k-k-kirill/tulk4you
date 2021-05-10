<?php
/**
 * Cron Controller Interface
 *
 * @package Tulk4You
 */

namespace Pixels\Tulk4You\Cron\Contracts;

/**
 * Cron Controller interface
 */
interface CronControllerInterface {

	public function register_crons();

	public function clear_crons();
}
