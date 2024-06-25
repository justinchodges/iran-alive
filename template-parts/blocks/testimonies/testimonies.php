<?php
$testimonies = get_field('testimony');
wp_enqueue_script( 'iran-alive-testimonies-js', get_template_directory_uri() . '/assets/javascripts/dist/testimonies.js', null, $theme_version, true );
?>
<div class="testimonies">
    <button class="testimonies__control testimonies__control--prev" disabled>
        <svg enable-background="new 0 0 15 26" version="1.1" viewBox="0 0 15 26" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon fill="#231F20" points="12.885,0.58 14.969,2.664 4.133,13.5 14.969,24.336 12.885,26.42 2.049,15.584 -0.035,13.5 "/></svg>
    </button>
    <div class="testimonies__window">
        <?php foreach ($testimonies as $testimony) { ?>
            <div class="testimonies__testimony">
                <img class="testimonies__image" src="<?= $testimony['image']['sizes']['thumbnail']; ?>" />
                <div class="testimonies__quote has-crimson-text-font-family">
                    <?= $testimony['quote']; ?>
                </div>
                <div class="testimonies__attribution">&mdash; <?= $testimony['attribution']; ?></div>
            </div>
        <?php } ?>
    </div>
    <button class="testimonies__control testimonies__control--next">
        <svg enable-background="new 0 0 15 26" version="1.1" viewBox="0 0 15 26" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon fill="#231F20" points="2.019,0.58 -0.035,2.634 10.646,13.316 -0.035,23.997 2.019,26.052 14.755,13.316 "/></svg>
    </button>
</div>