<?php
$classes = array( 'featured-card' );
$anchor = '';

if( !empty( $block['className'] ) ) 
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );

if( !empty( $block['anchor'] ) ) 
    $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$image = get_field( 'image' );

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
    array( 'acf/thermometer', array(
        'data' => array(
            'raised' => 50,
            'goal' => 500
        )
    ) ),
    array( 'acf/donate-form', array(
        'data' => array(
            'form_id' => 'wrLmXjGlya',
            'form_template' => '<div id="wrLmXjGlya"><script type="text/javascript" src="https://default.salsalabs.org/api/widget/template/38cc5fcd-12b4-440d-b49b-2d0f0531b35b/?tId=wrLmXjGlya"></script></div>'
        )
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