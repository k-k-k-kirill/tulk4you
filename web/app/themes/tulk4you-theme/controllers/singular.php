<?php
/**
 * The Template for displaying all single items of content.
 *
 * @package  WordPress
 * @subpackage  PixelsTheme
 */

use Pixels\Theme\Controllers\PostController;
use Pixels\Tulk4You\App;

global $post;

// Set up Controller instance.
$controller = new PostController();

// Set templates.
$controller->set_templates( array( 'single/single-' . $post->ID . '.twig', 'single/single-' . $post->post_type . '.twig', 'single/single.twig' ) );

if ($post->post_type === 'post') {
	$blogService = App::get_service('Blog');

	$controller->add_context('blog_contact_form', get_field('blog_contact_form', 'option'));
	$controller->add_context('blog_form_title', get_field('blog_form_title', 'option'));
	$controller->add_context('related_post', $blogService->getRelatedPost($post->ID));
}

// If this is a password protected page we render the single password template.
if ( post_password_required( $post->ID ) ) {
	$controller->set_templates( array( 'single/single-password.twig' ) );
}

// Render the twig.
$controller->render();
