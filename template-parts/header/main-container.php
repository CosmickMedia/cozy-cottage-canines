<?php $image = Theme_Manager::get_instance()->get_theme_option('header'); ?>

<header class="main-header mdc-top-app-bar" id="topAppBar">
    <div class="mdc-top-app-bar__row container">
        <section class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <div class="main-header__logo">
                <?php if ($image): ?>
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo $image['url']; ?>" alt="petland" title="PETLAND KANSAS"/>
                    </a>
                <?php endif; ?>
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