<?php
$tiers = get_field( 'tiers' );
$contentColor = get_field( 'content_color' );
$size = get_field( 'size' );
?>
<table class="donation-tiers<?= $contentColor ? " text-color-{$contentColor}" : ""; ?><?= $size ? " donation-tiers-" . $size : ""; ?>">
    <tbody>
        <?php foreach ( $tiers as $tier ) { ?>
            <tr>
                <th><?= $tier['amount']; ?></th>
                <td><?= $tier['description']; ?></th>
            </tr>
        <?php } ?>
    </tbody>
</table>