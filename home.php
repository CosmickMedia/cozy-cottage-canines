<?php get_header(); ?>

<?php $image = Theme_Manager::get_instance()->get_theme_option('blog_desktop_bg'); ?>

<?php if ($image): ?>
    <section class="masthead">
        <div class="container masthead__container">
            <div class="masthead__box">
                <h1 class="heading heading--h1">Our Blog</h1>
                <p><?php echo Theme_Manager::get_instance()->get_theme_option('blog_description'); ?></p>
            </div>
            <div class="masthead__hero">
                <img src="<?php echo $image['url']; ?>"
                     alt="">
            </div>
        </div>
    </section><!-- ./ masthead -->
<?php endif; ?>

<div class="container articles">
    <div class="filter-section">
        <div class="filter-section__intro">
            <i class="icon icon--filter"></i>
            <span>Filter by Tags:</span>
        </div>
        <div class="filter-section__group">
            <div class="filter-section__item">
                <div class="filter">
                    <div class="filter__action">
                        <div class="filter__extra">
                            <i class="icon icon--filter"></i>
                            <span>Filter by Tags:</span>
                        </div>
                        <button data-target="filterLocation" class="filter-button">
                            <span>All Tags</span>
                            <i class="icon icon--dropdown"></i>
                        </button>
                    </div>
                    <div class="filter__options" id="filterLocation">
                        <div class="filter__group">
                            <ul class="filter__list">
                                <?php $tags = get_tags(); ?>
                                <?php if ($tags): ?>

                                    <?php foreach ($tags as $tag): ?>
                                        <li class="filter__item">
                                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
                                                <label for="location1">
                                                    <?php echo $tag->name ?>
                                                    <i class="icon icon--checked"></i>
                                                </label>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="filter__extra">
                            <span>select one tag</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid">
        <div class="grid__row grid__row--col-sm-2 grid__row--col-md-3 grid__row--gap-6">
            <?php while (have_posts()): the_post(); ?>

                <?php get_template_part('template-parts/posts/post-card'); ?>

            <?php endwhile; ?>
        </div>
    </div>

    <div class="pagination">
        <?php if (get_previous_posts_link()): ?>
            <a class="mdc-button mdc-button--flex mdc-button--raised"
               href="<?php echo get_previous_posts_page_link(); ?>">
                <i class="icon icon--on-button icon--slider-prev icon--rev-button"></i>
                Previous page
            </a>
        <?php else: ?>
            <div class="spacer"></div>
        <?php endif; ?>

        <?php if (get_next_posts_link()): ?>
            <a class="mdc-button mdc-button--flex mdc-button--raised"
               href="<?php echo get_next_posts_page_link(); ?>">
                next page
                <i class="icon icon--on-button icon--slider-next"></i>
            </a>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>

