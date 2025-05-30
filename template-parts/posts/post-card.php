<div class="card">
    <div class="card__image">
        <?php if (has_post_thumbnail()): ?>
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-thumbnail') ?>"
                 alt="">
        <?php else: ?>
            <img src="<?php echo THEME_URL; ?>/assets/images/no-available.png" alt="">
        <?php endif; ?>
    </div>
    <div class="card__content">
        <div class="card__title">
            <h4 class="heading heading--h4 heading--primary"><?php the_title(); ?></h4>
        </div>
        <div class="card__info">
            <p><?php the_excerpt(); ?></p>
        </div>

        <div class="tags">
            <?php foreach (wp_get_post_tags(get_the_ID()) as $tag): ?>

                <div class="tag">
                    <span><?php echo $tag->name; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="card__actions">
        <a href="<?php the_permalink(); ?>" class="mdc-button mdc-button--raised mdc-button--flex">
            <?php _e('read more', THEME_LOCALE); ?>
            <i class="icon icon--on-button icon--arrow-white"></i>
        </a>
    </div>
</div>