<?php
namespace AIOSEO\Plugin\Common\Traits\Helpers;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Contains Action Scheduler specific helper methods.
 *
 * @since 4.0.13
 */
trait ActionScheduler {
	/**
	 * The action scheduler group.
	 *
	 * @since 4.1.5
	 *
	 * @var string
	 */
	private $actionSchedulerGroup = 'aioseo';

	/**
	 * Schedules a single action at a specific time in the future.
	 *
	 * @since 4.0.13
	 *
	 * @param  string  $actionName The action name.
	 * @param  int     $time       The time to add to the current time.
	 * @param  array   $args       Args passed down to the action.
	 * @return boolean             Whether the action was scheduled.
	 */
	public function scheduleSingleAction( $actionName, $time, $args = [] ) {
		try {
			if ( ! $this->isScheduledAction( $actionName ) ) {
				as_schedule_single_action( time() + $time, $actionName, $args, $this->actionSchedulerGroup );

				return true;
			}
		} catch ( \RuntimeException $e ) {
			// Nothing needs to happen.
		}

		return false;
	}

	/**
	 * Checks if a given action is already scheduled.
	 *
	 * @since 4.0.13
	 *
	 * @param  string  $actionName The action name.
	 * @param  array   $args       Args passed down to the action.
	 * @return boolean             Whether the action is already scheduled.
	 */
	public function isScheduledAction( $actionName, $args = [] ) {
		// We need to check for pending actions specifically since we otherwise cannot schedule another action while one is running (e.g. image and video sitemap scans).
		$actions = as_get_scheduled_actions( [
			'hook'     => $actionName,
			'status'   => \ActionScheduler_Store::STATUS_PENDING,
			'per_page' => 1
		]);
		return ! empty( $actions );
	}

	/**
	 * Unschedule an action.
	 *
	 * @since 4.1.4
	 *
	 * @param  string $actionName The action name to unschedule.
	 * @param  array  $args       Args passed down to the action.
	 * @return void
	 */
	public function unscheduleAction( $actionName, $args = [] ) {
		try {
			if ( as_next_scheduled_action( $actionName ) ) {
				as_unschedule_action( $actionName, $args, $this->actionSchedulerGroup );
			}
		} catch ( \Exception $e ) {
			// Do nothing.
		}
	}

	/**
	 * Schedules a recurring action.
	 *
	 * @since 4.1.5
	 *
	 * @param  string  $actionName The action name.
	 * @param  int     $time       The seconds to add to the current time.
	 * @param  int     $interval   The interval in seconds.
	 * @param  array   $args       Args passed down to the action.
	 * @return boolean             Whether the action was scheduled.
	 */
	public function scheduleRecurrentAction( $actionName, $time, $interval = HOUR_IN_MINUTES, $args = [] ) {
		try {
			if ( ! $this->isScheduledAction( $actionName ) ) {
				as_schedule_recurring_action( time() + $time, $interval, $actionName, $args, $this->actionSchedulerGroup );
				return true;
			}
		} catch ( \RuntimeException $e ) {
			// Nothing needs to happen.
		}

		return false;
	}
}