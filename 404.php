<?php get_header(); ?>


    <div class="masthead">
        <picture class="masthead__picture">
            <source media="(min-width:597px)" srcset="<?php echo THEME_URL; ?>/styles/assets/images/hero-breeds-desktop.jpg">
            <img src="<?php echo THEME_URL; ?>/styles/assets/images/hero-breeds-mobile.jpg" alt="">
        </picture>

        <div class="masthead__content--internal masthead__content--bg-text container container--reduce">
            <div class="masthead__row">
                <h1 class="masthead__title">
                </h1>
            </div>
        </div>
    </div>

    <div class="container container--reduce text-center">
        <h1>404 - Page not found</h1>
        <h6>Oops, the page you were looking for could not be found</h6>
        <br><br>
        <a class="btn btn-primary btn-lg" href="<?php echo home_url(); ?>">Go home</a>
        <br><br>
    </div>

<?php get_footer(); ?>