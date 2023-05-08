<?php
get_header( 'dark' );
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
        border-radius: .5rem;
    }

    .story-card__info {
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 1;
        width: 100%;
        background: #FFFFFF;
        border-bottom-right-radius: .5rem;
        border-bottom-left-radius: .5rem;
    }

    .story-card__title {
        padding: 1rem;
    }

    .story-card__summary {
        display: none;
        padding: 0 1rem 1rem;
        line-height: 1.25em;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<?php
while ( have_posts() ) : the_post(); 
    $count = 0;

    if ( $count === 0 ) {
?>
        <div class="hero"> 
            <div class="hero__background">
                <img class="hero__background-image" src="https://iranalive.org/wp-content/uploads/2022/09/parastoo-maleki-mWPug8R-cv4-unsplash-1.jpg" alt="" srcset="https://iranalive.org/wp-content/uploads/2022/09/parastoo-maleki-mWPug8R-cv4-unsplash-1-300x213.jpg 300w,https://iranalive.org/wp-content/uploads/2022/09/parastoo-maleki-mWPug8R-cv4-unsplash-1-768x546.jpg 768w,https://iranalive.org/wp-content/uploads/2022/09/parastoo-maleki-mWPug8R-cv4-unsplash-1-1024x728.jpg 1024w,https://iranalive.org/wp-content/uploads/2022/09/parastoo-maleki-mWPug8R-cv4-unsplash-1.jpg 1600w">
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
endwhile; 
?>
<div class="post p-t-9 p-xl-t-10">
    <div class="container-xl p-b-5 p-xl-y-6">
        <div class="d-grid grid-gap-3 grid-cols-1 grid-cols-md-2 grid-cols-lg-3">
            <?php 
                $count = 0;
                while ( have_posts() ) : the_post(); 

                    if ( $count > 0 ) {
            ?>
                <a class="story-card" href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                    <img class="story-card__image" src="https://iranalive.org/wp-content/uploads/2022/09/Group-65.jpg" alt="" />
                    <div class="story-card__info">
                        <div class="story-card__title font-family-serif font-size-4"><?php the_title(); ?></div>
                        <div class="story-card__summary">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </a>
                <!--
                <article class="post-card bg-white p-2 p-lg-4 m-y-4" style="border-radius:.5rem;border:1px solid #ddd;box-shadow:0 0 .5rem rgba(0,0,0,.1);">
                    <h2 class="post-card__title font-size-4 font-size-lg-5"><a class="text-color-black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-card__content">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="text-align-center text-align-md-left">
                        <a class="text-color-tan d-inline-block font-family-serif font-size-3" href="<?php the_permalink(); ?>" style="font-weight:semi-bold;">Read more &gt;</a>
                    </div>
                </article>
                -->
            <?php 
                    }

                    $count++;
                endwhile; 
            ?>
        </div>
        <div class="text-align-center">
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

        var $storyCards = $('.story-card');

        $storyCards.each(function() {
            StoryCard(this);
        });
    })();
</script>
<?php
get_footer();
