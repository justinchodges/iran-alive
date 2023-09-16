<?php
$page_title = get_the_title();
$newsletter_pdf = get_field( 'newsletter_pdf' );
$hero_image = get_field( 'hero_image' );
$title = get_field( 'title' );
$body = get_field( 'body' );
$prayer_points = get_field( 'prayer_points' );
$form_id = get_field( 'form_id' );
$form_template = get_field( 'form_template');

get_header( 'light' );
?>
<style>
    .newsletter blockquote {
        font-family: "Crimson Text",Times New Roman,serif;
        font-size: 2rem !important;
        color: var(--wp--preset--color--tan) !important;
        font-style: italic;
        font-weight: 500;
        text-align: center;
    }

    .newsletter blockquote p {
        font-size: 1em !important;
        line-height: 1.3em;
    }

    @media (min-width: 45.5rem) {
        .newsletter blockquote {
            font-size: 2.5rem !important;
        }
    }
</style>
<div class="hero hero-auto">
    <div class="hero__background">
        <img class="hero__background-image" src="<?= $hero_image['url']; ?>" alt="" />
    </div>
    <div class="hero__content">
        <div class="container-xl">
            <div class="row">
                <div class="column-12 column-md-7 has-white-color">
                    <h1 class="text-transform-uppercase has-lg-font-size has-gold-color"><?= $page_title; ?> Newsletter</h1>
                    <h2 class="has-4-xl-font-size"><?= $title; ?></h2>
                    <a class="wp-block-button__link has-white-color has-gold-background-color has-text-color has-background" href="<?= $newsletter_pdf['url']; ?>" download>DOWNLOAD THIS MONTH'S ISSUE</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="newsletter">
    <div class="container-lg p-y-5 p-lg-y-8">
        <?= $body; ?>
    </div>
    <div class="container-sm p-b-5 p-lg-b-8">
        <?php DonateForm( array(
            'form_id'   => $form_id,
            'form_template' => $form_template,
        ) ); ?>
    </div>
    <div class="bg-tan-light p-y-5 p-lg-y-8">
        <div class="container-lg">
            <h2 class="has-2-xl-font-size has-tan-color">Prayer Points</h2>
            <div class="list">
                <ul>
                    <?php
                        while ( have_rows( 'prayer_points' ) ) {
                            the_row();
                            $prayer_point_content = get_sub_field( 'prayer_point_content' );
                    ?>
                            <li><?= $prayer_point_content; ?></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="p-y-5 p-lg-y-8">
        <div class="container-sm text-align-center">
            <a class="has-tan-color align-items-center justify-content center p-b-1 has-md-font-size" href="/newsletters/" style="display:inline-flex;gap:.5rem;text-decoration:none;border-bottom:1px solid;font-weight:bold;">View more newsletters <img src="/wp-content/themes/iran-alive/assets/images/icon-arrow-tan.svg" height="10px" alt="" /></a>
        </div>
    </div>
</div>
<?php
get_footer();
