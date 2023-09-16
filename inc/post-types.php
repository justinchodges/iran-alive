<?php
add_action( 'init', 'custom_post_type' );

function custom_post_type() {
    register_post_type( 'newsletter',
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
            'supports'  => array( 'title', 'thumbnail', 'excerpt' )
        )
    );
}