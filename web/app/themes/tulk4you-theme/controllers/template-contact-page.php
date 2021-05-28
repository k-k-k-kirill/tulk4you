<?php
/**
 * Template Name: Contact Page
 *
 * @package  WordPress
 * @subpackage  PixelsTheme
 */

use Pixels\Theme\Controllers\PostController;

// Set up Controller instance.
$controller = new PostController();

// Set templates.
$controller->set_templates( 'template-contact-page/template-contact-page.twig' );

$cta = get_field('contact_page_cta');

if ( $cta ) {
  $controller->add_context('cta', $cta);
}

// Render the twig.
$controller->render();