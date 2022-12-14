<?php
$classes = array( 'card' );
$anchor = '';

if( !empty( $block['className'] ) ) $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['anchor'] ) ) $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$template = array(
    array('core/image', array(
		
	)),
	array('core/heading', array(
		'level'     => 1,
		'content'   => 'Title Goes Here',
        'fontSize'      => 'md',
        'textAlign'     => 'center'
	)),
    array( 'core/paragraph', array(
        'content' => 'Content goes here.',
    ) )
);
?>
<div class="<?= implode( ' ', $classes ); ?>"<?= $anchor; ?>> 
    <InnerBlocks template="<?= esc_attr( wp_json_encode( $template ) ); ?>" />
</div>