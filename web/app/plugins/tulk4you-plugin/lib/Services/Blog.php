<?php
/**
 * Class for Blog Service
 *
 * @package Tulk4You.
 */

namespace Pixels\Tulk4You\Services;

// Repositories
use Pixels\Tulk4You\Repositories\Post as PostRepository;

// Contracts.
use Pixels\Tulk4You\Services\Contracts\ServiceInterface;

use \WP_Post;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Serve blog related data
 */
class Blog implements ServiceInterface {
	/**
	 * Post Repository.
	 *
	 * @param PostRepository;
	 */
	protected $postRepository;

	/**
	 * Class constructor.
	 *
	 * @param PostRepository $examples instance.
	 */
	public function __construct( PostRepository $postRepository ) {
		$this->postRepository = $postRepository;
	}

  public function getPostsForBlogFeed(): array {
    $posts = null;

    $posts = $this->postsToTimberPosts($this->postRepository->getNumberOfLatestPosts(3));
  
    return $posts;
  }

  public function getPostsArchivePermalink(): string {
    return get_permalink( get_option( 'page_for_posts' ));
  }

  public function postsToTimberPosts(array $posts): array {
    $timberPosts = array();

    foreach ($posts as $post) {
      $timberPosts[] = new \TimberPost($post);
    }

    return $timberPosts;
  }
}
