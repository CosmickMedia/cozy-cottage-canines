<?php
// Always use the new Cozy Canine Cottage logo.
$logo_url = get_template_directory_uri() . '/assets/images/cozy-logo.png';
?>

<header class="main-header mdc-top-app-bar" id="topAppBar">
    <div class="mdc-top-app-bar__row container">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <div class="main-header__logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="Cozy Canine Cottage" title="Cozy Canine Cottage"/>
                </a>
            </div>
        </section><!-- ./ mdc-top-app-bar__section--align-start -->

        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end">
            <button id="topAppButton"
                    class="main-header__menu-button">
                <span></span>
                <span></span>
                <span></span>
            </button><!-- ./ main-header__menu-button -->

            <nav class="main-header__nav">
                <?php get_template_part('template-parts/header/main-menu'); ?>
            </nav>

            <div class="quick-links">
                <?php get_template_part('template-parts/header/quicklinks'); ?>
            </div><!-- ./ quick-links -->
        </section><!-- ./ mdc-top-app-bar__section--align-end -->
    </div><!-- ./mdc-top-app-bar__row -->
</header><!-- ./ header -->
<!--header-->