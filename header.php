<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php wp_title('|', true, 'right'); ?></title>
        <meta name="description" content="">

        <?php bp_head_before(); ?>

        <?php wp_head(); ?>

        <?php bp_head_after(); ?>
    </head>
    <body <?php body_class(); ?>>

        <?php get_template_part('template-parts/header'); ?>

        <main id="main" class="c-main">