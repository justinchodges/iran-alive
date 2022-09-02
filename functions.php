<?php
wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/assets/styles/main.css' );
wp_enqueue_script( 'header-script', get_template_directory_uri() . '/assets/javascripts/dist/header.js', null, null, true );

require_once __DIR__ . '/inc/blocks.php';
require_once __DIR__ . '/inc/theme-functions.php';

if ( is_admin() ) {
	require_once 'inc/updater.php';

    $updater = new ThemeUpdater( __FILE__ );
    $updater->set_username( 'justinchodges' ); // set username
    $updater->set_repository( 'iran-alive' ); // set repo
    $updater->initialize();
}