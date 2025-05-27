<?php
/**
 * Template Name: FAQ
 */
?>

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<div class="masthead">
		<picture class="masthead__picture">
			<source media="(min-width:597px)" srcset="<?php echo THEME_URL; ?>/styles/assets/images/hero-faq-desktop.png">
			<img src="<?php echo THEME_URL; ?>/styles/assets/images/hero-faq-mobile.jpg" alt="">
		</picture>

		<div class="masthead__content--internal masthead__content--bg-text container container--reduce">
			<div class="masthead__row masthead__row--fluid">
				<h1 class="masthead__title pl-md-4">
					<span>Faq</span>
				</h1>
			</div>
		</div>
	</div>

	<div class="container container--reduce">
		<section class="about faq">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 faq__col">
					<div class="about__card faq__card">
						<h2 class="about__title">Will my puppy be registered?</h2>
						<p class="about__text">
							<strong>A:</strong> There are several canine registries (The American Kennel Club, (AKC), APR,
							ACA, UKC) and others. Most of our puppies are registered. You will be given the opportunity to
							register your new puppy at the time of purchase.
						</p>

					</div>
					<div class="about__card faq__card">
						<h2 class="about__title">What does it mean to have a registered puppy?</h2>
						<p class="about__text">
							<strong>A: </strong>Buying a registered, purebred puppy means that its family tree is documented
							as being exclusively one breed. Buying a registered dog does not necessarily mean that the dog
							will be healthier than a non-registered dog. It means that its parents are of the same breed and
							that the dog comes from a purebred line. AKC (American Kennel Club) is the most familiar
							purebred dog registry in the country. There are several other dog registries such as ACA, APR,
							UKC that also register purebred dogs.
						</p>

					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 faq__col">
					<div class="about__card faq__card">
						<h2 class="about__title">Will my puppy be microchipped?</h2>
						<p class="about__text">
							<strong>A:</strong> Yes, all of our puppies are microchipped before purchase. You will be given
							the opportunity to register it at the time of purchase. It is extremely important to register
							your puppies microchip. If your puppy should ever become lost, there is a good chance that your
							puppy will be recovered if it has a registered microchip. In a pets lifetime, one out of three
							will become lost. Without enrollment registration and identification about ninety percent will
							not be recovered.
						</p>

					</div>
					<div class="about__card faq__card">
						<h2 class="about__title">What breeds
							are best for people
							who have allergies?</h2>
						<p class="about__text">
							<strong>A: </strong>People who have allergies should consider dogs that are hypoallergenic.
							Breeds to consider are: Bedlington Terrier, Bichon Frise, Chinese Crested, Irish Water Spaniel,
							Kelly Blue Terrier, Maltese, Poodle, Schnauzer, Soft Coated Wheaten Terrier.
						</p>

					</div>
				</div>
			</div>
		</section>
	</div>

<?php endwhile; ?>


<?php get_footer(); ?>