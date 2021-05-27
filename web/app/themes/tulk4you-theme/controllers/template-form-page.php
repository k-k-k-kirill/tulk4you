<?php
/**
 * Template Name: Form Page
 *
 * @package  WordPress
 * @subpackage  PixelsTheme
 */

use Pixels\Theme\Controllers\PostController;

// Set up Controller instance.
$controller = new PostController();

// Set templates.
$controller->set_templates( 'template-form-page/template-form-page.twig' );

$contact_form = get_field('form_page_contact_form');

if ($contact_form) {
  $controller->add_context('contact_form', $contact_form);
}

// Render the twig.
$controller->render();