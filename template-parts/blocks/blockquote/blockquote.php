<?php
$image = get_field( 'image' );
$highlight = get_field( 'highlight' );
$quote = get_field( 'quote' );
$citation = get_field( 'citation' );
?>
<blockquote class="blockquote container-lg">
    <div class="row justify-content-center align-items-center">
        <?php if ( $image ) { ?>
            <div class="column-12 column-md-4">
                <img class="blockquote__image" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" />
            </div>
        <?php } ?>
        <div class="column-12 column-md-8">
            <div class="blockquote__quote">
                <img class="blockquote__quote-icon" src="<?= get_template_directory_uri(); ?>/assets/images/icon-quote-tan.svg" alt="" />
                <?php if ( $highlight ) { ?>
                    <div class="blockquote__highlight">
                        <?= $highlight; ?>
                    </div>
                <?php } ?>
                <?= $quote; ?>
            </div>
            <?php if ( $citation ) { ?>
                <div class="blockquote__citation">
                    &mdash; <?= $citation; ?>
                </div>
            <?php } ?>
        </div>
    </div>
</blockquote>