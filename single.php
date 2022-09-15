<?php
get_header( 'dark' );
?>
<div class="post p-t-9 p-xl-t-10">
    <div class="container-lg p-b-5 p-xl-y-6">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <hr class="m-y-5" />
        <div class="text-align-center">
            <a class="button button-primary d-inline-block" href="/stories">Read more stories</a>
        </div>
    </div>
</div>
<?php
get_footer();
