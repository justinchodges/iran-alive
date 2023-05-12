<?php
get_header();

$defaultThumbnail = 'https://iranalive.org/wp-content/uploads/2023/05/story-cover.jpg';
?>
<style>
    .post-card__content p {
        font-size: 1rem;
    }

    .pagination .nav-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .pagination .page-numbers:first-child {
        border-top-left-radius: .5rem;
        border-bottom-left-radius: .5rem;
    }

    .pagination .page-numbers {
        display: inline-block;
        padding: .75rem 1rem;
        border: 1px solid #8a6f4f;
        border-right: 0;
        text-decoration: none;
        color: #8a6f4f;
    }

    .pagination .page-numbers.current {
        background: #8a6f4f;
        color: #fff;
        font-weight: bold;
    }

    .pagination .page-numbers:last-child {
        border-top-right-radius: .5rem;
        border-bottom-right-radius: .5rem;
        border-right: 1px solid #8a6f4f;
    }

    .story-card {
        position: relative;
        border-radius: .5rem;
        border: 1px solid #ddd;
        box-shadow: 0 0 1rem rgba(0,0,0,.1);
        aspect-ratio: 1 / 1.25;
        overflow: hidden;
        color: inherit;
        text-decoration: none;
    }

    .story-card__image {
        position: absolute;
        inset: 0;
        z-index: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        background: #333;
    }

    .story-card__info {
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 1;
        width: 100%;
        max-height: 100%;
        overflow: auto;
        background: #FFFFFF;
    }

    .story-card__title {
        padding: 1rem;
        font-size: 1.75rem;
    }

    .story-card__summary {
        display: none;
        padding: 0 1rem 1rem;
        line-height: 1.25em;
    }

    .story-card__summary > p {
        font-size: 1rem;
    }

    .story-card__summary > *:last-child {
        margin-bottom: 0;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<?php
$count = 0;

while ( have_posts() ) : the_post(); 
    if ( $count === 0 ) {
        $thumbnail = get_the_post_thumbnail_url( $post->ID, 'large' );
?>
        <div class="hero"> 
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
                            <h2 class="has-text-color has-4-xl-font-size">
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
            ?>
                <a class="story-card" href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                    <?php 
                        if ( $thumbnail ) {
                            the_post_thumbnail( 'full', array('class' => 'story-card__image' ) );
                        } else {
                    ?>
                            <img class="story-card__image" src="<?= $defaultThumbnail; ?>" alt="" />
                    <?php
                        } 
                    ?>
                    <div class="story-card__info">
                        <div class="story-card__title font-family-serif font-size-4"><?php the_title(); ?></div>
                        <div class="story-card__summary">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </a>
            <?php 
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
<script type="text/javascript">
    (function() {
        function StoryCard(element) {
            var $card = $(element);
            var $summary = $card.find('.story-card__summary');

            $card.hover(
                function() {
                    $summary.slideDown(200);
                },
                function() {
                    $summary.slideUp(200);
                }
            );
        }

        var storyCards = document.querySelectorAll('.story-card');
        storyCards.forEach(function(card) {
            new StoryCard(card);
        });
    })();
</script>
<?php
get_footer();
