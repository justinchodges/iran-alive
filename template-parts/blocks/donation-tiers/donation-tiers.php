<?php
global $theme_version;

wp_enqueue_style( 'donation-tiers-css', get_template_directory_uri() . '/template-parts/blocks/donation-tiers/donation-tiers.css', null, $theme_version );

$tiers = get_field( 'tiers' );
$contentColor = get_field( 'content_color' );
?>
<table class="donation-tiers<?= $contentColor ? " text-color-{$contentColor}" : ""; ?>">
    <tbody>
        <?php foreach ( $tiers as $tier ) { ?>
            <tr>
                <th><?= $tier['amount']; ?></th>
                <td><?= $tier['description']; ?></th>
            </tr>
        <?php } ?>
    </tbody>
</table>