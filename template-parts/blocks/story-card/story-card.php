<?php
$classes = ['story-card'];
$anchor = '';

if( !empty( $block['className'] ) ) $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['anchor'] ) ) $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$image = get_field( 'image' );

StoryCard( array(
    'image'     => $image['url'],
    'imageAlt'  => $image['alt'],
    'link'      => get_field( 'link' ),
    'title'     => get_field( 'title' ),
    'summary'   => get_field( 'summary' )
) );
