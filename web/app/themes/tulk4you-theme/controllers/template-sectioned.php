<?php
/**
 * Template Name: Sectioned Page
 *
 * @package  WordPress
 * @subpackage  PixelsTheme
 */

use Pixels\Theme\Controllers\PostController;
use Pixels\Tulk4You\App;

// Services
$sectionedTemplateService = App::get_service('SectionedTemplate');
$blogService = App::get_service('Blog');

// Set up Controller instance.
$controller = new PostController();

// Set templates.
$controller->set_templates( 'template-sectioned/template-sectioned.twig' );

// Get flexible fields.
$sections = get_field( 'sectioned_fields', get_the_id() );
$controller->add_context( 'sections', $sections );

if ($sectionedTemplateService->hasSection($sections, 'blog-feed')) {
  $blogFeedPosts = $blogService->getPostsForBlogFeed();

  if ($blogFeedPosts) {
    $controller->add_context( 'blog_feed_posts', $blogFeedPosts );
    $controller->add_context( 'blog_archive_url', $blogService->getPostsArchivePermalink() );
  }
}

// Render the twig.
$controller->render();
