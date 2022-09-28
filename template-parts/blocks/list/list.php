<?php
$classes = ['list'];
$anchor = '';

if( !empty( $block['className'] ) ) $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['anchor'] ) ) $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$template = array(
	array('core/list', array(
		'placeholder' => 'List item goes here'
	))
);
?>
<div class="<?= implode( ' ', $classes ); ?>"<?= $anchor; ?>>
    <InnerBlocks template="<?= esc_attr( wp_json_encode( $template ) ); ?>" />
</div>