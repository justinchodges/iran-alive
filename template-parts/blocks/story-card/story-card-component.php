<?php
function StoryCard($props = array()) {
    wp_enqueue_script( 'google-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js', array(), null, true );
    wp_enqueue_script( 'story-card', get_template_directory_uri() . '/assets/javascripts/dist/story-card.js', array( 'google-jquery' ), $theme_version, true );

    $state = array(
        'image'     => null,
        'imageAlt'  => '',
        'link'      => null,
        'title'     => null,
        'summary'   => null
    );

    foreach ( $props as $key => $value )
    {
        if ( array_key_exists( $key, $state  ) )
        {
            $state[$key] = $value;
        }
    }
?>
    <a class="story-card" href="<?= $state['link']; ?>" title="<?= $state['title']; ?>">
        <img class="story-card__image" src="<?= $state['image']; ?>" alt="<?= $stage['imageAlt']; ?>" />
        <div class="story-card__info">
            <div class="story-card__title font-family-serif font-size-4">
                <?= $state['title']; ?>
            </div>
            <div class="story-card__summary">
                <?= $state['summary']; ?>
            </div>
        </div>
    </a>
<?php
}