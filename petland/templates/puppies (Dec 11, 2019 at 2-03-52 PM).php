<?php
/**
 * Template Name: Puppies
 */
?>

<?php get_header(); ?>

<!--masthead-->
<div class="masthead">
	<picture class="masthead__picture">
		<source media="(min-width:597px)" srcset="<?php echo THEME_URL; ?>/assets/images/available-puppies-desktop.jpg">
		<img src="<?php echo THEME_URL; ?>/assets/images/available-puppies-mobile.jpg" alt="">
	</picture>

	<div class="masthead__content--internal masthead__content--bg-text container container--reduce">
		<div class="masthead__row">
			<h1 class="masthead__title">
				<small><?php _e('AVAILABLE', THEME_LOCALE); ?></small>
				<span><?php _e('PUPPIES', THEME_LOCALE); ?></span>
			</h1>
		</div>
	</div>
</div>

<div id="reactAvailablePuppies" class="container container--reduce container-fluid-sm"></div>

<?php get_footer(); ?>

