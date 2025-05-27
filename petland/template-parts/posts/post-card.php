<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
	<div class="blog__card">
		<?php if (has_post_thumbnail()): ?>
			<a class="blog__image" href="<?php the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-thumbnail') ?>" alt="">
			</a>
		<?php endif; ?>

		<div class="blog__content">
			<a class="blog__title" href="<?php the_permalink(); ?>">
				<h4><?php the_title(); ?></h4>
			</a>
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
</div>