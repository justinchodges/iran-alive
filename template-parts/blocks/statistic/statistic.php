<?php
global $theme_version;

wp_enqueue_script( 'statistic-js', get_template_directory_uri() . '/assets/javascripts/dist/statistic.js', null, $theme_version );

$number = get_field( 'number' );
$description = get_field( 'description' );
?>
<div class="statistic text-align-center">
   
    <div class="text-color-gold font-size-5 font-size-md-7 font-family-serif line-height-2"><div class="statistic__number " style="display: inline-block;"  data-target="<?= $number; ?>">0</div></div>
 
    <div class="statistic__description text-color-white text-transform-uppercase font-size-1 font-size-md-4 letter-spacing-1"><?= $description; ?></div>
</div>