<?php

$context = Timber::context();
$context['posts'] = new Timber\PostQuery();
$templates = ['templates.index.twig'];

if (is_home()) {
    array_unshift($templates, 'templates.page-home.twig');
}

Timber::render($templates, $context);
