<?php
$number = get_field( 'number' );
$description = get_field( 'description' );
?>
<div class="statistic text-align-center">
    <div class="statistic__number text-color-gold font-size-5 font-size-md-7 font-family-serif line-height-2"><?= $number; ?></div>
    <div class="statistic__description text-color-white text-transform-uppercase font-size-1 font-size-md-4 letter-spacing-1"><?= $description; ?></div>
</div>