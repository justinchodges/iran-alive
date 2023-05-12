<?php
$classes = ['section'];
$anchor = '';

if( !empty( $block['className'] ) ) $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['anchor'] ) ) $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$backgroundColor = get_field( 'background_color' );
$backgroundImage = get_field( 'background_image' );
$containerWidth = get_field( 'container_width' );
$content = get_field( 'content' );
$padding = get_field( 'padding' );

if ( $backgroundColor ) $classes[] = "bg-{$backgroundColor}";

switch ( $padding )
{
    case 'small':
        $classes[] = 'p-y-3';
        break;

    case 'medium':
        $classes[] = 'p-y-5';
        $classes[] = 'p-md-y-5';
        break;

    case 'large':
        $classes[] = 'p-y-7';
        $classes[] = 'p-md-y-10';
        break;
}

$template = array(
	array('core/heading', array(
		'level' => 1,
		'content' => 'Title Goes Here',
	)),
    array( 'core/paragraph', array(
        'content' => 'Content goes here.',
    ) )
);
?>
<div class="<?= implode( ' ', $classes ); ?>"<?= $anchor; ?>> 
    <?php if ( $backgroundImage ) { ?>
        <div class="section__background">
            <img class="section__background-image" src="<?= $backgroundImage['url']; ?>" alt="<?= $backgroundImage['alt']; ?>" srcset="<?= get_image_srcset( $backgroundImage ); ?>" />
        </div>
    <?php } ?>
    <div class="section__content container-<?= $containerWidth ? $containerWidth : 'lg'; ?>">
        <InnerBlocks template="<?= esc_attr( wp_json_encode( $template ) ); ?>" />
    </div>
</div>