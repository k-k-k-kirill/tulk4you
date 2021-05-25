<?php
/**
 * Class for Post Repository
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Repositories;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use \WP_Post;

/**
 * Repository for accessing Post related data.
 */
class Post {

	/**
	 * Content type this Repository deals with.
	 *
	 * @var string.
	 */
	const POST_TYPE = 'post';

	/**
	 * Get all posts.
	 */
	public function getAll() : array {
		$args = array(
			'post_type'      => self::POST_TYPE,
			'post_status'    => 'publish',
			'posts_per_page' => -1,
		);

		$posts = get_posts( $args );

		return $posts;
	}

	/**
	 * Get post by id.
	 */
	public function get( int $id ) : ?WP_Post {
		return get_post( $id );
	}

	public function getRelatedPost( int $currentPostId ): ?\WP_Post {
		$args = array(
			'post_type' => self::POST_TYPE,
			'post_status' => 'publish',
			'posts_per_page' => 1,
			'post__not_in' => array($currentPostId),
			'orderby' => 'rand'
		);

		$post = get_posts( $args );

		if(sizeof($post) === 0) return null;

		return $post[0];
	}

  public function getNumberOfLatestPosts(int $quantity = -1) : array {
    $args = array(
      'post_type' => self::POST_TYPE,
      'post_status' => 'publish',
      'posts_per_page' => $quantity
    );

    $posts = get_posts($args);

    return $posts;
  }
}
