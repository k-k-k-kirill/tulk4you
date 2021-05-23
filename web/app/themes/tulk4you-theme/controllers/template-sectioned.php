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

// Set up Controller instance.
$controller = new PostController();

// Set templates.
$controller->set_templates( 'template-sectioned/template-sectioned.twig' );

// Get flexible fields.
$sections = get_field( 'sectioned_fields', get_the_id() );
$controller->add_context( 'sections', $sections );

if ($sectionedTemplateService->hasBlogFeedSection($sections)) {
  $blogFeedPosts = $sectionedTemplateService->getPostsForBlogFeed();

  if ($blogFeedPosts) {
    $controller->add_context( 'blog_feed_posts', $sectionedTemplateService->getPostsForBlogFeed() );
    $controller->add_context( 'blog_archive_url', $sectionedTemplateService->getPostsArchivePermalink() );
  }
}

// Render the twig.
$controller->render();
