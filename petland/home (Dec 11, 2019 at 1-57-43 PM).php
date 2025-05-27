<?php get_header(); ?>

<?php $image = Theme_Manager::get_instance()->get_theme_option('blog_desktop_bg'); ?>

<?php if ($image): ?>

	<?php $mobile_image = Theme_Manager::get_instance()->get_theme_option('blog_mobile_bg'); ?>

	<div class="masthead">
		<picture class="masthead__picture">
			<source media="(min-width:597px)" srcset="<?php echo $image['url']; ?>">

			<?php if ($mobile_image): ?>
				<img src="<?php echo $mobile_image['url']; ?>" alt="">
			<?php else: ?>
				<img src="<?php echo $image['url']; ?>" alt="">
			<?php endif; ?>

		</picture>

		<div class="masthead__content--internal masthead__content--bg-text container container--reduce">
			<div class="masthead__row">
				<h1 class="masthead__title">
					<small>Our</small>
					<span>blog</span>
				</h1>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="container container--reduce">
	<section class="blog">

		<div class="blog__list">
			<div class="row ">

				<?php while (have_posts()): the_post(); ?>

					<?php get_template_part('template-parts/posts/post-card'); ?>

				<?php endwhile; ?>

                <div class="col-12 text-center text-md-right">
                    <nav aria-label="..." class="d-inline-block">
                        <ul class="pagination text-right">

                            <?php if (get_previous_posts_link(__('prev'))): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo get_previous_posts_page_link(); ?>">
                                        <i class="fa fa-angle-left"></i></a>
                                </li>
                            <?php endif; ?>

	                        <?php if (get_next_posts_link(__('next'))): ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo get_next_posts_page_link(); ?>">
                                        <i class="fa fa-angle-right"></i></a>
                                </li>
	                        <?php endif; ?>

                        </ul>
                    </nav>
                </div>

			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>

