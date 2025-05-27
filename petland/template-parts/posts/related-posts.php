<?php $similar_posts = Theme_Manager::get_instance()->get_similar_posts(get_the_ID()); ?>
<?php if ($similar_posts and $similar_posts->have_posts()): ?>
    <aside class="blog col-xs-12 col-sm-12 col-md-4 col-lg-4">

        <!--===================================-->
        <!--blog List-->
        <!--===================================-->
        <div class="blog__description">
            <div class="blog__list">

                <div class="blog__heading">
                    <h4><?php _e('RELATED ENTRIES', THEME_LOCALE); ?></h4>
                </div>

                <?php while ($similar_posts->have_posts()): $similar_posts->the_post(); ?>
                <div class="blog__card">

	                <?php if (has_post_thumbnail()): ?>
                        <div class="blog__image">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-thumbnail'); ?>" alt="" />
                        </div>
	                <?php endif; ?>

                    <div class="blog__content">
                        <div class="blog__title">
                            <h4><?php the_title(); ?></h4>
                        </div>
                        <div class="blog__tags">
	                        <?php foreach (wp_get_post_tags(get_the_ID()) as $tag): ?>
                                <span><?php echo $tag->name; ?></span>
	                        <?php endforeach; ?>
                        </div>
                        <div class="blog__text">
	                        <?php the_excerpt(); ?>
                        </div>
                        <div class="blog__btn">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">
	                            <?php _e('read more', THEME_LOCALE); ?><i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>

            </div>
        </div>

    </aside>
<?php endif; ?>