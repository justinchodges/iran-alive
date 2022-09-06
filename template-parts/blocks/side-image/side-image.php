<?php
$classes = ['section'];
$anchor = '';

if( !empty( $block['className'] ) ) $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['anchor'] ) ) $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$backgroundColor = get_field( 'background_color' );
$backgroundImage = get_field( 'background_image' );
$sideImage = get_field( 'side_image' );
$sideImagePosition = get_field( 'side_image_position' );
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
    <?php if ( $backgroundImage || $sideImage ) { ?>
        <div class="section__background">
            <?php if ( $backgroundImage ) { ?>
                <img class="section__background-image" src="<?= $backgroundImage['url']; ?>" alt="<?= $backgroundImage['alt']; ?>" srcset="<?= get_image_srcset( $backgroundImage ); ?>" />
            <?php } ?>
            <img class="section__side-image section__side-image--<?= $sideImagePosition; ?> d-none d-md-block" src="<?= $sideImage['url']; ?>" alt="<?= $sideImage['alt']; ?>" />
        </div>
    <?php } ?>
    <div class="section__content container-lg">
        <div class="row<?= $sideImagePosition === 'left' ? ' justify-content-end' : ''; ?>">
            <div class="column-12 column-md-7">
                <img class="d-md-none m-b-3" src="<?= $sideImage['url']; ?>" alt="<?= $sideImage['alt']; ?>" srcset="<?= get_image_srcset( $sideImage ); ?>" />
                <InnerBlocks template="<?= esc_attr( wp_json_encode( $template ) ); ?>" />
            </div>
        </div>
    </div>
</div>