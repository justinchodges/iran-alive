<?php
function iranalive_blocktypes() {
    if ( function_exists( 'acf_register_block_type' ) ) {
         // BLOCKQUOTE
         acf_register_block_type( array(
            'name'              => 'blockquote',
            'title'             => __( 'Blockquote', 'iran-alive' ),
            'description'       => __( 'A blockquote block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/blockquote/blockquote.php',
            'category'          => 'layout',
            'keywords'          => array( 'section' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/blockquote/blockquote.css',
            'supports'		    => [
                'align'			    => true,
                'anchor'		    => true,
                'customClassName'   => true,
                'jsx' 			    => true,
            ]
        ) );

        // CARD
        acf_register_block_type( array(
            'name'              => 'card',
            'title'             => __( 'Card', 'iran-alive' ),
            'description'       => __( 'A card block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/card/card.php',
            'category'          => 'layout',
            'keywords'          => array( 'section' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/card/card.css',
            'supports'		    => [
                'align'			    => true,
                'anchor'		    => true,
                'customClassName'   => true,
                'jsx' 			    => true,
            ]
        ) );

        // DONATE FORM
        acf_register_block_type( array(
            'name'              => 'donate-form',
            'title'             => __( 'Donate Form', 'iran-alive' ),
            'description'       => __( 'A donate form block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/donate-form/donate-form.php',
            'category'          => 'layout',
            'keywords'          => array( 'section' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/donate-form/donate-form.css',
            'enqueue_script'     => get_template_directory_uri() . '/assets/javascripts/dist/donate-form.js'
        ) );

        // DONATION TIERS
        acf_register_block_type( array(
            'name'              => 'donation-tiers',
            'title'             => __( 'Donation Tiers', 'iran-alive' ),
            'description'       => __( 'A donation tier block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/donation-tiers/donation-tiers.php',
            'category'          => 'layout',
            'keywords'          => array( 'section' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/donation-tiers/donation-tiers.css',
        ) );

        // HERO
        acf_register_block_type( array(
            'name'              => 'hero',
            'title'             => __( 'Hero', 'iran-alive' ),
            'description'       => __( 'A hero content block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/hero/hero.php',
            'category'          => 'layout',
            'keywords'          => array( 'hero', 'featured' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/hero/hero.css',
            'supports'		    => [
                'align'			    => true,
                'anchor'		    => true,
                'customClassName'   => true,
                'jsx' 			    => true,
            ]
        ) );

        // HERO FULL
        acf_register_block_type( array(
            'name'              => 'hero-full',
            'title'             => __( 'Hero Full', 'iran-alive' ),
            'description'       => __( 'A hero full content block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/hero/hero-full.php',
            'category'          => 'layout',
            'keywords'          => array( 'hero', 'featured' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/hero/hero.css',
            'supports'		    => [
                'align'			    => true,
                'anchor'		    => true,
                'customClassName'   => true,
                'jsx' 			    => true,
            ]
        ) );

        // HERO SPLIT
        acf_register_block_type( array(
            'name'              => 'hero-split',
            'title'             => __( 'Hero Split', 'iran-alive' ),
            'description'       => __( 'A hero split content block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/hero/hero-split.php',
            'category'          => 'layout',
            'keywords'          => array( 'hero', 'featured' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/hero/hero.css',
            'supports'		    => [
                'align'			    => true,
                'anchor'		    => true,
                'customClassName'   => true,
                'jsx' 			    => true,
            ]
        ) );

        // LIST
        acf_register_block_type( array(
            'name'              => 'list',
            'title'             => __( 'List', 'iran-alive' ),
            'description'       => __( 'A list block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/list/list.php',
            'category'          => 'layout',
            'keywords'          => array( 'list', 'featured' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/list/list.css',
            'supports'		    => [
                'align'			    => true,
                'anchor'		    => true,
                'customClassName'   => true,
                'jsx' 			    => true,
            ]
        ) );

        // SECTION
        acf_register_block_type( array(
            'name'              => 'section',
            'title'             => __( 'Section', 'iran-alive' ),
            'description'       => __( 'A section block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/section/section.php',
            'category'          => 'layout',
            'keywords'          => array( 'section' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/section/section.css',
            'supports'		    => [
                'align'			    => true,
                'anchor'		    => true,
                'customClassName'   => true,
                'jsx' 			    => true,
            ]
        ) );

        // SIDE IMAGE
        acf_register_block_type( array(
            'name'              => 'side-image',
            'title'             => __( 'Side Image', 'iran-alive' ),
            'description'       => __( 'A side image block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/side-image/side-image.php',
            'category'          => 'layout',
            'keywords'          => array( 'section' ),
            'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/section/section.css',
            'supports'		    => [
                'align'			    => true,
                'anchor'		    => true,
                'customClassName'   => true,
                'jsx' 			    => true,
            ]
        ) );

        // STATISTIC
        acf_register_block_type( array(
            'name'              => 'statistic',
            'title'             => __( 'Statistic', 'iran-alive' ),
            'description'       => __( 'A statistic block', 'iran-alive' ),
            'render_template'   => 'template-parts/blocks/statistic/statistic.php',
            'category'          => 'layout',
            'keywords'          => array( 'statistic' ),
            'enqueue_script'     => get_template_directory_uri() . '/assets/javascripts/dist/statistic.js'
        ) );
    }
}

add_action( 'acf/init', 'iranalive_blocktypes' );