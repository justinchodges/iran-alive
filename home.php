<?php
get_header( 'dark' );
?>
<div class="post p-t-9 p-xl-t-10">
    <div class="container-lg p-b-5 p-xl-y-6">
        <h1 class="text-align-center font-size-6 font-size-lg-8">Stories</h1>
        <?php while ( have_posts() ) : the_post(); ?>
            <article class="post-card bg-white p-4 m-y-4" style="border-radius:.5rem;border:1px solid #ddd;box-shadow:0 0 .5rem rgba(0,0,0,.1);">
                <h2 class="post-card__title font-size-5"><?php the_title(); ?></h2>
                <div class="post-card__content">
                    <?php the_excerpt(); ?>
                </div>
                <a class="button button-sm button-primary d-inline-block" href="<?php the_permalink(); ?>">Read more</a>
            </article>
        <?php endwhile; ?>
    </div>
</div>
<?php
get_footer();
