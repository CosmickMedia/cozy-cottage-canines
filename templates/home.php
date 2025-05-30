<?php
/**
 * Template Name: Home
 */
?>

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

    <?php the_content(); ?>

<?php endwhile; ?>

<!--masthead-->
<div class="masthead">
	<picture class="masthead__picture masthead__picture--fluid">
		<source media="(min-width:650px)"
		        srcset="<?php echo THEME_URL; ?>/styles//assets/images/main-hero-desktop.jpg">
		<img src="<?php echo THEME_URL; ?>/styles//assets/images/main-hero-mobile.jpg" alt="">
	</picture>

	<div class="masthead__content   ">
		<h1 class="masthead__title sr sr-translateL">
			Find your perfect match
		</h1>
		<p class="masthead__text sr sr-translateL">
			We are dedicated to matching the right pet with the right customer
		</p>
		<a href="" class="btn btn-primary sr sr-translateL">available puppies</a>
	</div>

</div>


<div class="container container--reduce container-fluid-sm">
    <section class="mainHome">
        <div class="mainHome__image sr sr-translateL">
            <img src="<?php echo THEME_URL; ?>/styles/assets/images/hero-dog.jpg" alt="">
        </div>
        <div class="mainHome__content">
            <h2 class="mainHome__title sr sr-translateR">
                <small>Schedule a</small>
                reservation
                save $100
            </h2>
            <p class="mainHome__text sr sr-expandB">
                <span class="strong">Visit our state of the art location!</span> We provide you and your family with a
                fun and a hands on approach
                to learning about pets and their required needs.
            </p>
            <div class="mainHome__button">
                <a href="" class="btn btn-primary sr sr-translateL">Reserve Now</a>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="features__row expand__container">
            <div class="features__col sr sr-expandB--group">
                <div class="feature">
                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/photo-vip-order.jpg" alt="" class="feature__image">
                    <h4 class="feature__title">Vip order</h4>
                </div>
                <div class="feature--hover">
                    <h4 class="feature__title">Vip order</h4>
                    <p class="feature__text">We are proud of our
                        commitment to animal welfare
                        and quality of our pets.</p>
                    <a href="" class="feature__cta">Learn More <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/next-arrow.svg" alt=""></a>
                </div>
            </div>

            <div class="features__col features__col--green sr sr-expandB--group">
                <div class="feature">
                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/photo-cares.jpg" alt="" class="feature__image">
                    <h4 class="feature__title">Cares</h4>
                </div>
                <div class="feature--hover">
                    <h4 class="feature__title">Cares</h4>
                    <p class="feature__text">We are proud of our
                        commitment to animal welfare
                        and quality of our pets.</p>
                    <a href="" class="feature__cta">Cozy Canine Cottage Cares <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/next-arrow.svg" alt=""></a>
                </div>
            </div>

            <div href="" class="features__col features__col--dark sr sr-expandB--group">
                <div class="feature">
                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/photo-perks.jpg" alt="" class="feature__image">
                    <h4 class="feature__title">Perks</h4>
                </div>
                <div class="feature--hover">
                    <h4 class="feature__title">Perks</h4>
                    <p class="feature__text">We are proud of our
                        commitment to animal welfare
                        and quality of our pets.</p>
                    <a href="" class="feature__cta">Learn More <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/next-arrow.svg" alt=""></a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
