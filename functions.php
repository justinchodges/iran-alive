<?php
wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/assets/styles/main.css' );
wp_enqueue_script( 'header-script', get_template_directory_uri() . '/assets/javascripts/dist/header.js', null, null, true );

require_once __DIR__ . '/inc/blocks.php';
require_once __DIR__ . '/inc/custom-fields.php';
require_once __DIR__ . '/inc/theme-functions.php';