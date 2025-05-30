<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

    <section class="masthead">
        <div class="container masthead__container">
            <div class="masthead__box">
                <h1 class="heading heading--h1"><?php the_title(); ?></h1>
                <p><?php the_excerpt(); ?></p>

                <?php $next_post = get_next_post();
                if (!empty($next_post)): ?>
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"
                       class="mdc-button mt-2 mdc-button--raised mdc-theme--secondary-bg mdc-button--flex">
                        next article
                        <i class="icon icon--on-button icon--arrow-white"></i>
                    </a>
                <?php endif; ?>
            </div>
            <div class="masthead__hero">
                <?php if (has_post_thumbnail()): ?>
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>"
                         alt="<?php echo get_the_post_thumbnail_caption(get_the_ID()) ?>"/>
                    <?php else: ?>
                    <img src="<?php echo THEME_URL; ?>/assets/images/no-available.png" alt="">
                <?php endif; ?>
            </div>
        </div>
    </section><!-- ./ masthead -->

    <article class="article">
        <div class="container">
            <?php the_content(); ?>
            <?php $next_post = get_next_post();
            if (!empty($next_post)): ?>
            <div class="article__next">
                <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>"
                   class="mdc-button mt-2 mdc-button--raised mdc-theme--secondary-bg mdc-button--inline-flex">
                    next article
                    <i class="icon icon--on-button icon--arrow-white"></i>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </article>
<?php endwhile; ?>

<?php get_footer(); ?>