<?php
$classes = array( 'featured-card' );
$anchor = '';

if( !empty( $block['className'] ) ) 
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );

if( !empty( $block['anchor'] ) ) 
    $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$image = get_field( 'image' );

$template = array(
    array( 'core/heading', array(
        'level'     => 2,
        'content'   => 'Title goes here',
        'fontSize'  => '2xl'
    ) ),
    array( 'core/paragraph', array(
        'content'   => 'Content goes here.'
    ) )
);
?>
<div class="<?= implode( ' ', $classes ); ?>"<?= $anchor; ?>> 
    <div class="featured-card__content">
        <InnerBlocks template="<?= esc_attr( wp_json_encode( $template ) ); ?>" />
    </div>
    <?php if ( $image ) { ?>
        <div class="featured-card__image-holder">
            <img class="featured-card__image" src="<?= $image['url']; ?>" srcset="<?= get_image_srcset( $image ); ?>" alt="<?= $image['alt']; ?>" />
        </div>
    <?php } ?>
</div>