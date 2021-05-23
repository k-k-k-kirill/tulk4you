<?php
/**
 * Class for Sectioned Template Service
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
 * Serve sectioned template related data
 */
class SectionedTemplate implements ServiceInterface {
	/**
	 * Examples Repository.
	 *
	 * @param PostRepository;
	 */
	protected $postRepository;

	/**
	 * Class constructor.
	 *
	 * @param ExampleRepository $examples instance.
	 */
	public function __construct( PostRepository $postRepository ) {
		$this->postRepository = $postRepository;
	}

  public function hasBlogFeedSection(array $templateSections): bool {
    $hasBlogFeedSection = false;

    foreach ( $templateSections as $section ) {
      if ( $section['acf_fc_layout'] === 'blog-feed' ) {
        $hasBlogFeedSection = true;
      }
    }

    return $hasBlogFeedSection;
  }

  public function getPostsForBlogFeed(): array {
    $posts = null;

    $posts = $this->postsToTimberPost($this->postRepository->getNumberOfLatestPosts(3));
  
    return $posts;
  }

  public function getPostsArchivePermalink(): string {
    return get_permalink( get_option( 'page_for_posts' ));
  }

  public function postsToTimberPost(array $posts): array {
    $timberPosts = array();

    foreach ($posts as $post) {
      $timberPosts[] = new \TimberPost($post);
    }

    return $timberPosts;
  }
}
