<?php
$classes = ['hero', 'hero-split'];
$anchor = '';

if( !empty( $block['className'] ) ) $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['anchor'] ) ) $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$backgroundImage = get_field( 'background_image' );
$backgroundImageMobile = get_field( 'background_image_mobile' );
$backgroundVideo = get_field( 'background_video' );
$anchorLink = get_field( 'anchor_link' );
$sideImage = get_field( 'side_image' );

$template = array();
?>
<div class="<?= implode( ' ', $classes ); ?>"<?= $anchor; ?>> 
    <div class="hero__background">
        <?php if ( $backgroundVideo ) { ?>
            <img class="hero__background-image<?= $backgroundImageMobile ? " d-none d-md-block d-lg-none" : ""; ?>" src="<?= $backgroundImage['url']; ?>" alt="<?= $backgroundImage['alt']; ?>" srcset="<?= get_image_srcset( $backgroundImage ); ?>" />
            <?php if ( $backgroundImageMobile ) { ?>
                <img class="hero__background-image<?= $backgroundImageMobile ? " d-md-none" : ""; ?>" src="<?= $backgroundImageMobile['url']; ?>" alt="<?= $backgroundImageMobile['alt']; ?>" srcset="<?= get_image_srcset( $backgroundImageMobile ); ?>" />
            <?php } ?>
            <video class="hero__background-video d-none d-lg-block" muted="muted" autoplay="autoplay" loop="loop">
                <source src="<?= $backgroundVideo['url']; ?>" type="<?= $backgroundVideo['mime_type']; ?>" />
            </video>
        <?php } else { ?>
            <img class="hero__background-image<?= $backgroundImageMobile ? " d-none d-md-block" : ""; ?>" src="<?= $backgroundImage['url']; ?>" alt="<?= $backgroundImage['alt']; ?>" srcset="<?= get_image_srcset( $backgroundImage ); ?>" />
            <?php if ( $backgroundImageMobile ) { ?>
                <img class="hero__background-image<?= $backgroundImageMobile ? " d-md-none" : ""; ?>" src="<?= $backgroundImageMobile['url']; ?>" alt="<?= $backgroundImageMobile['alt']; ?>" srcset="<?= get_image_srcset( $backgroundImageMobile ); ?>" />
            <?php } ?>
        <?php } ?>
        <img class="hero__background-split" src="<?= $sideImage['url']; ?>" alt="<?= $sideImage['alt']; ?>" />
    </div>
    <div class="hero__content">
        <div class="container-xl">
            <div class="row">
                <div class="column-12 column-md-7">
                    <InnerBlocks template="<?= esc_attr( wp_json_encode( $template ) ); ?>" />
                </div>
            </div>
        </div>
    </div>
    <?php if ( $anchorLink ) { ?>
        <div class="hero__anchor">
            <a href="#<?= $anchorLink; ?>" title="click to advance to next section">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/icon-arrow-gold.svg" alt="" />
            </a>
        </div>
    <?php } ?>
</div>