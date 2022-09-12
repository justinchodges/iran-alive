<?php
add_theme_support( 'menus' );

add_action( 'after_setup_theme', 'register_primary_menu' );

function register_primary_menu() {
	register_nav_menu( 'primary', __( 'Primary Menu', 'iran-alive' ) );
}

wp_enqueue_style( 'main-styles', get_template_directory_uri() . '/assets/styles/main.css' );
wp_enqueue_script( 'header-script', get_template_directory_uri() . '/assets/javascripts/dist/header.js', null, null, true );


function get_nav() {
    $items = wp_get_nav_menu_items( 'Primary Menu' );
?>
    <nav class="main-nav">
        <div class="d-xl-flex g-lg-3 align-items-center">
            <?php 
            foreach ( $items as $item ) { 
                if ( $item->menu_item_parent === "0" ) {
                    $children = array();

                    foreach ( $items as $child ) {
                        if ( $child->menu_item_parent == $item->ID ) {
                            $children[] = $child;
                        }
                    }
            ?>
                    <div class="main-nav__item column-none<?= count( $children ) > 0 ? " has-children" : ""; ?>">
                        <a class="<?= $item->title === "Give" ? "button button-primary" : "main-nav__link"; ?>" href="<?= $item->url; ?>"><?= $item->title; ?></a>
                        <?php if ( count( $children ) > 0 ) { ?>
                            <div class="main-nav__children">
                                <?php foreach ( $children as $child ) { ?>
                                    <div class="main-nav__child">
                                        <a class="main-nav__child-link" href="<?= $child->url; ?>"><?= $child->title; ?></a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
            <?php 
                }
            } 
            ?>
        </div>
    </nav>
    <button class="hamburger" aria-label="Open navigation">
        <div class="hamburger__bar"></div>
        <div class="hamburger__bar"></div>
        <div class="hamburger__bar"></div>
    </button>
<?php
}

require_once __DIR__ . '/inc/blocks.php';
require_once __DIR__ . '/inc/custom-fields.php';
require_once __DIR__ . '/inc/theme-functions.php';