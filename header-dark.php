<!doctype HTML>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title><?php the_title(); ?></title>
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="app">
            <header class="header header-dark">
                <div class="container p-lg-x-5">
                    <div class="row align-items-center g-lg-3">
                        <div class="column">
                            <a href="/">
                                <img class="header__logo" src="/wp-content/themes/iran-alive/assets/images/iran-alive.png" alt="Iran Alive logo" />
                            </a>
                        </div>
                        <div class="column-none justify-self-end">
                            <?php get_nav(); ?>
                        </div>
                    </div>
                </div>
            </header>
            <div class="page">
