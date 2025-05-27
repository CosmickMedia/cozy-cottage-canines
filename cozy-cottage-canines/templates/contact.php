<?php
/**
 * Template Name: Contact
 */
?>

<?php get_header(); ?>

<!--masthead-->
<div class="masthead">
	<picture class="masthead__picture">
		<source media="(min-width:597px)" srcset="<?php echo THEME_URL; ?>/styles//assets/images/hero-contact-us.jpg">
		<img src="<?php echo THEME_URL; ?>/styles/assets/images/hero-mobile-contact-us.jpg" alt="">
	</picture>

	<div class="masthead__content--internal masthead__content--bg-text container container--reduce">
		<div class="masthead__row masthead__row--fluid">
			<h1 class="masthead__title">
				<span>Contact us</span>
			</h1>
		</div>
	</div>
</div>

<div class="container container--reduce">
	<section class="contact">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="contact__info">
					<div class="contact__item">
						<h4>Phone:</h4>
						<p>954-442-3106</p>
					</div>
					<div class="contact__item">
						<h4>Fax:</h4>
						<p>954-639-7832</p>
					</div>
					<div class="contact__item">
						<h4>Email:</h4>
						<p>info@petlandflorida.com</p>
					</div>
					<div class="contact__item">
						<h4>Hours:</h4>
						<p>Monday – Sunday</p>
						<p>10:00 am – 9:00 pm</p>
					</div>
				</div>
			</div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div class="row contact__location">
					<div class="col-xs-12 col-sm-12 col-md-6 location__group">
						<h5 class="location__city"><img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/map-marker.svg" alt="">Pembroke
							Pines</h5>
						<p class="location__address">
							356 N University Drive
							Pembroke Pines, FL 33024</p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 location__group">
						<h5 class="location__city"><img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/map-marker.svg" alt="">Plantation
						</h5>
						<p class="location__address">
							801 South University Drive Suite #C-106
							Plantation, FL 33324</p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 location__group">
						<h5 class="location__city"><img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/map-marker.svg" alt="">Davie</h5>
						<p class="location__address">
							11482 W State Road 84 Davie, FL 33325</p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 location__group">
						<h5 class="location__city"><img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/map-marker.svg" alt="">Kendall</h5>
						<p class="location__address">
							Kendall 8236 Mills Drive
							Miami, FL 33183</p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 location__group">
						<h5 class="location__city"><img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/map-marker.svg" alt="">Largo</h5>
						<p class="location__address">
                            10289 Ulmerton Rd
                            Largo, FL 33771</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="form">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="form__info">
					<h2 class="form__title">
						Fill out the below form and we’ll get back to you as soon as possible.
					</h2>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
				<form>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="name"></label>
							<input type="text" class="form-control" id="name" placeholder="Your name">
							<div class="invalid-feedback">
								<img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="lastName"></label>
							<input type="text" class="form-control" id="lastName" placeholder="your last name">
							<div class="invalid-feedback">
								<img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
							</div>
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="email"></label>
							<input type="email" class="form-control " id="email"
							       placeholder="your e-mail">
							<div class="invalid-feedback">
								<img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="phone"></label>
							<input type="number" class="form-control" id="phone" placeholder="phone">
							<div class="invalid-feedback">
								<img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="message"></label>
						<textarea class="form-control" id="message" rows="20" placeholder="message"></textarea>
						<div class="invalid-feedback">
							<img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
						</div>
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary btn--icon">submit <i class="fa fa-angle-right"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>

