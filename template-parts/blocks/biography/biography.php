<?php
$name = get_field( 'name' );
$content = get_field( 'content' );
$image = get_field( 'image' );
?>
<div class="grid grid-cols-1 grid-cols-md-[1fr,3fr] grid-gap-y-3 grid-gap-x-5 m-y-8">
    <div>
        <?php if ( $image ) { ?>
            <div class="aspect-ratio-square">
                <img src="<?= $image['sizes']['medium_large']; ?>" alt="<?= $name; ?>" />
            </div>
        <?php } ?>
    </div>
    <div>
        <div class="text-transform-uppercase text-color-tan font-weight-500 has-lg-font-size m-b-2" style="font-weight:600;"><?= $name; ?></div>
        <div><?= $content; ?></div>
    </div>
</div>