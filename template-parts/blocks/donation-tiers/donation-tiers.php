<?php
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