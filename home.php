<?php
get_header();

$defaultThumbnail = 'https://iranalive.org/wp-content/uploads/2023/05/story-cover.jpg';
$count = 0;

while ( have_posts() ) : the_post(); 
    if ( $count === 0 ) {
        $thumbnail = get_the_post_thumbnail_url( $post->ID, 'large' );
?>
        <style>
            .hero.hero--featured-story {
                min-height: auto;
            }

            .hero.hero--featured-story p {
                font-size: 20px;
            }
        </style>
        <div class="hero hero--featured-story"> 
            <div class="hero__background">
                <?php 
                    if ( $thumbnail ) {
                        the_post_thumbnail( 'full', array('class' => 'hero__background-image' ) );
                    } else {
                ?>
                        <img class="hero__background-image" src="<?= $defaultThumbnail; ?>" alt="" />
                <?php
                    } 
                ?>
                <?php the_post_thumbnail( 'full', array('class' => 'hero__background-image' ) ); ?>
            </div>
            <div class="hero__content">
                <div class="container-xl">
                    <div class="row">
                        <div class="column-8 column-md-7 has-white-color">
                            <h1 class="has-gold-color m-b-0 font-family-sans" style="text-transform:uppercase;">Stories</h1>
                            <h2 class="has-text-color has-2-xl-font-size">
                                <a class="has-white-color" style="text-decoration:none;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <?php the_excerpt(); ?>
                            <div class="wp-container-1 wp-block-buttons">
                                <div class="wp-block-button">
                                    <a class="wp-block-button__link has-white-color has-gold-background-color has-text-color has-background" href="<?php the_permalink(); ?>">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }

    $count += 1;
endwhile; 
?>
<div class="post">
    <div class="container-xl p-y-5 p-xl-y-6">
        <div class="d-grid grid-gap-3 grid-cols-1 grid-cols-md-2 grid-cols-lg-3">
            <?php 
                $count = 0;

                while ( have_posts() ) : the_post(); 

                    if ( $count > 0 ) {
                        $thumbnail = get_the_post_thumbnail_url( $post->ID, 'large' );

                        StoryCard( array(
                            'image' => $thumbnail ? $thumbnail : $defaultThumbnail,
                            'imageAlt'  => get_the_title(),
                            'link'      => get_the_permalink(),
                            'title'     => get_the_title(),
                            'summary'   => '<p>' . get_the_excerpt() . '</p>'
                        ) );
                    }

                    $count++;
                endwhile; 
            ?>
        </div>
        <div class="text-align-center m-t-5">
            <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
        </div>
    </div>
</div>
<?php
get_footer();
