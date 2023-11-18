<?php
$classes = array( 'thermometer' );
$anchor = '';

if( !empty( $block['className'] ) ) 
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );

if( !empty( $block['anchor'] ) ) 
    $anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$goal = get_field( 'goal' );
$raised =get_field( 'raised' );
$percent = floor(($raised / $goal) * 100);

if ($percent > 100)
    $percent = 100;

$template = array();
?>
<div class="<?= implode( ' ', $classes ); ?>"<?= $anchor; ?>>
    <div class="thermometer__details">
        <span class="thermometer__raised">$<?= number_format( $raised ); ?></span>
        <span class="thermometer__goal">raised of $<?= number_format( $goal ); ?> goal</span>
    </div>
    <div class="thermometer__slider">
        <div class="thermometer__progress" style="width:<?= $percent; ?>%;"></div>
    </div>
</div>