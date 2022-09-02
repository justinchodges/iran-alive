<?php
$classes = ['hero'];
$anchor = '';

if( !empty( $block['className'] ) ) $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['anchor'] ) ) $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$backgroundImage = get_field( 'background_image' );
$backgroundImageMobile = get_field( 'background_image_mobile' );
$title = get_field( 'title' );
$titleAs = get_field( 'title_as' ) ? get_field( 'title_as' ) : 'h1';
$content = get_field( 'content' );
$contentColor = get_field( 'content_color' );

if ( $contentColor ) $classes[] = $contentColor;

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
    <div class="hero__background">
        <img class="hero__background-image<?= $backgroundImageMobile ? " d-none d-md-block" : ""; ?>" src="<?= $backgroundImage['url']; ?>" alt="<?= $backgroundImage['alt']; ?>" srcset="<?= get_image_srcset( $backgroundImage ); ?>" />
        <?php if ( $backgroundImageMobile ) { ?>
            <img class="hero__background-image<?= $backgroundImageMobile ? " d-md-none" : ""; ?>" src="<?= $backgroundImageMobile['url']; ?>" alt="<?= $backgroundImageMobile['alt']; ?>" srcset="<?= get_image_srcset( $backgroundImageMobile ); ?>" />
        <?php } ?>
    </div>
    <div class="hero__content">
        <div class="container-xl">
            <div class="row">
                <div class="column-8 column-md-7">
                   <InnerBlocks template="<?= esc_attr( wp_json_encode( $template ) ); ?>" />
                </div>
            </div>
        </div>
    </div>
</div>