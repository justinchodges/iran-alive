<?php
get_header( 'dark' );

$defaultThumbnail = 'https://iranalive.org/wp-content/uploads/2023/05/story-cover.jpg';
?>
<div class="container-xl p-y-5 p-xl-y-6">
    <h1>Newsletters</h1>
    <div class="d-grid grid-gap-3 grid-cols-1 grid-cols-md-2 grid-cols-lg-3">
        <?php while ( have_posts() ) : the_post(); ?>
            <?php
            $thumbnail = get_field( 'hero_image', $post->ID );

            StoryCard( array(
                'image' => $thumbnail ? $thumbnail['url'] : $defaultThumbnail,
                'imageAlt'  => get_the_title(),
                'link'      => get_the_permalink(),
                'title'     => get_the_title(),
                'summary'   => '<p>' . get_the_excerpt() . '</p>'
            ) );
            ?>
        <?php endwhile; ?>
    </div>
    <div class="text-align-center m-t-5">
        <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
    </div>
</div>
<?php

get_footer();
