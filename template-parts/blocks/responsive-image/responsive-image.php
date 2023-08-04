<?php
$classes = array( 'responsive-image', 'grid', 'grid-gap-4', 'grid-cols-1' );
$anchor = '';

if( !empty( $block['className'] ) ) 
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );

if( !empty( $block['anchor'] ) ) 
    $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$image = get_field( 'image' );
$imageWidth = get_field( 'image_width');
$imagePosition = get_field( 'image_position' ) === 'left' ? 0 : 1;

switch ( $imageWidth ) {
    case '1/2':
        $classes[] = 'grid-cols-md-' . (!$imagePosition ? '[1fr,1fr]' : '[1fr,1fr]');
        break;

    case '1/3':
        $classes[] = 'grid-cols-md-' . (!$imagePosition ? '[1fr,2fr]' : '[2fr,1fr]');
        break;

    case '1/4':
        $classes[] = 'grid-cols-md-' . (!$imagePosition ? '[1fr,3fr]' : '[3fr,1fr]');
        break;

    case '1/5':
        $classes[] = 'grid-cols-md-' . (!$imagePosition ? '[1fr,4fr]' : '[4fr,1fr]');
        break;
}

$template = array(
    array('core/heading', array(
		'level' => 2,
		'content' => 'Title Goes Here',
        'className' => 'has-xl-font-size',
        'size' => 'xl'
	)),
    array( 'core/paragraph', array(
        'content' => 'Content goes here.',
    ) ),
);
?>
<div class="<?= implode( ' ', $classes ); ?>"<?= $anchor; ?>>
    <div class="aspect-landscape aspect-ratio-md-responsive order-<?= $imagePosition; ?>">
        <img src="<?= $image['url']; ?>" alt="" />
    </div>
    <div>
        <InnerBlocks template="<?= esc_attr( wp_json_encode( $template ) ); ?>" />
    </div>
</div>