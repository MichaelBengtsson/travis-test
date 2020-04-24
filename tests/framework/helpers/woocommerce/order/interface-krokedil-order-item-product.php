<?php // phpcs:ignore
/**
 * Helper order class
 */

/**
 * This is the class just for testing purpose
 *
 * @package Krokedil/tests
 */
/**
 * Krokedil helper class.
 */
interface Krokedil_Order_Status {

	/**
	 * List of order statuses
	 */
	const STATUSES = [
		self::PENDING,
		self::ON_HOLD,
		self::FAILED,
		self::PROCESSING,
		self::CANCELLED,
		self::COMPLETED,
		self::REFUNDED,
	];

	const PENDING    = 'pending';
	const ON_HOLD    = 'on-Hold';
	const FAILED     = 'failed';
	const PROCESSING = 'processing';
	const CANCELLED  = 'cancelled';
	const COMPLETED  = 'completed';
	const REFUNDED   = 'refunded';

	/**
	 * Returns order statuses
	 *
	 * @return array order statuses
	 */
	public function get_statuses() : array;

}
