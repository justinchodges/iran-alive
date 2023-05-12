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
</style>
<div class="post p-t-9 p-xl-t-10">
    <div class="container-lg p-b-5 p-xl-y-6">
        <h1 class="text-align-center font-size-6 font-size-lg-8">Stories</h1>
        <?php while ( have_posts() ) : the_post(); ?>
            <article class="post-card bg-white p-2 p-lg-4 m-y-4" style="border-radius:.5rem;border:1px solid #ddd;box-shadow:0 0 .5rem rgba(0,0,0,.1);">
                <h2 class="post-card__title font-size-4 font-size-lg-5"><a class="text-color-black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="post-card__content">
                    <?php the_excerpt(); ?>
                </div>
                <div class="text-align-center text-align-md-left">
                    <a class="text-color-tan d-inline-block font-family-serif font-size-3" href="<?php the_permalink(); ?>" style="font-weight:semi-bold;">Read more &gt;</a>
                </div>
            </article>
        <?php endwhile; ?>
        <div class="text-align-center">
            <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
        </div>
    </div>
</div>
<?php
get_footer();
