<?php
add_action( 'init', 'custom_post_type' );

function custom_post_type() {
    register_post_type( 'php_newsletter',
        array(
            'labels' => array(
                'name' => __( 'Newsletters' ),
                'singular_name' => __( 'Newsletter' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'newsletters'),
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-media-document',
        )
    );

    register_post_type( 'donate_form',
        array(
            'labels' => array(
                'name' => __( 'Donate Forms' ),
                'singular_name' => __( 'Donate Form' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'donate-forms'),
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-cart',
        )
    );
}