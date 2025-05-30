<?php
/**
 * Template Name: Finance
 */
?>

<?php get_header(); ?>

<!--masthead-->
<div class="masthead bg-md-dark-gray">
	<picture class="masthead__picture">
		<source media="(min-width:597px)" srcset="<?php echo THEME_URL; ?>/styles//assets/images/hero-breeds-desktop.jpg">
		<img src="<?php echo THEME_URL; ?>/styles/assets/images/hero-mobile-financing.jpg" alt="">
	</picture>
	<div class="masthead__content--internal masthead__content--bg-text container container--reduce">
		<div class="masthead__row masthead__row--fluid">
			<h1 class="masthead__title pl-md-4">
				<span>Financing</span>
			</h1>
		</div>
	</div>
</div>

<div class="container container--reduce container-fluid-sm  pt-md-3 pb-md-3 finance">
	<div class="finance__content">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="finance__card">
					<div class="finance__image">
						<img src="<?php echo THEME_URL; ?>/styles/assets/images/financing-my-pet.jpg" alt="">
					</div>
					<div class="finance__description">
						<ul>
							<li>Early buyout options</li>
							<li>Builds customer credit with successful monthly payments</li>
							<li>Flexible payment plans</li>
							<li>No Credit - No Problem</li>
						</ul>
					</div>
					<div class="finance__button">
						<a href="" class="btn btn-block btn-outline-dark-gray">apply here</a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="finance__card">
					<div class="finance__image">
						<img src="<?php echo THEME_URL; ?>/styles/assets/images/financing-out.jpg" alt="">
					</div>
					<div class="finance__description">
						<ul>
							<li>Low Payment Plans</li>
							<li>Early Payoff Discounts</li>
							<li>Skip-A-Payment Option</li>
							<li>Simple and Easy to Use</li>
						</ul>
					</div>
					<div class="finance__button">
						<a href="" class="btn btn-block btn-outline-dark-gray">apply here</a>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="finance__card finance__card--last">
					<div class="finance__image">
						<img src="<?php echo THEME_URL; ?>/styles/assets/images/financing-paypal.jpg" alt="">
					</div>
					<div class="finance__description">
						<ul>
							<li>Get No Payments +</li>
							<li>No Interest if paid in</li>
							<li>full in 6 months.</li>
						</ul>
					</div>
					<div class="finance__button finance__button--last ">
						<a href="" class="btn btn-block btn-outline-dark-gray">apply here</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php get_footer(); ?>

