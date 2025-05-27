<?php

/**
 * Template Name: About
 */
?>
<?php



$main_url = 'https://www.petlandflorida.com';
$current_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];








?>


<script type="application/ld+json">
	<?php echo '
{
"@context": "https://schema.org/",
"@type": "BreadcrumbList",
"itemListElement": [{
"@type": "ListItem",
"position": 1,
"name": "Petland Florida",
"item": "' . $main_url . '"
},{
"@type": "ListItem",
"position": 2,
"name": "About Us",
"item": "' . $current_url . '"
}]
}'
	?>
</script>



<?php get_header(); ?>


<?php while (have_posts()) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

<div class="container container--reduce">
	<section class="about">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="about__card">
					<h2 class="about__title">Great Reputation</h2>
					<p class="about__text">
						We have built our reputation since 1967 helping thousands of families adopt new pets into their
						homes. We are committed to making your new relationship with your pet the best that it can be.
					</p>
					<ul class="about__list">
						<li class="about__item">Our staff receives intensive training.</li>
						<li class="about__item">We have the best husbandry program in the market, healthier pets.</li>
						<li class="about__item">We have the most comprehensive guarantees in the market.</li>
					</ul>
				</div>
			</div>
			<div class="separator d-md-none"></div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="about__card">
					<h2 class="about__title">Professional Staff</h2>
					<p class="about__text">
						We are proud of our Pet Counselors, they receive periodic training, and they love what they do.
						It is this aspect as well as product quality, selection and a real love of animals that gives
						Petland it’s reputation.
					</p>
					<p class="about__text"> A major focus of our Pet Counselors is to educate people about pets. This
						information assists
						customers in making informed choices that improves the quality of the their lives and the lives
						of their pets.</p>
				</div>
			</div>
			<div class="separator d-md-none"></div>
		</div>

		<div class="row  flex-column-reverse flex-md-row">
			<div class="pl-md-0 col-xs-12 col-sm-12 col-md-6 col-lg-6 bg-md-dark-gray">
				<div class="about__card about__card--dark rounded-top">
					<h2 class="about__title">Buying a Puppy</h2>
					<p class="about__text">
						Buying a puppy can be one of the most joyful experiences of your life. That’s why we’re
						here.</p>
					<p class="about__text">
						Petland puppies must meet standards before they can become Petland puppies.
					</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
				<div class="about__card">
					<h2 class="about__title">We’re Happy To Help</h2>
					<p class="about__text">
						Every year thousands of unplanned and unwanted puppies and kittens are born. We recommend having
						your pet spayed or neutered. Ask for our free brochure on this important subject.
					</p>
					<p> If you would prefer to take in a pet from the local shelter, we will be happy to refer you. No
						matter where you acquire your pet, we will be proud to counsel and assist you.</p>
				</div>
			</div>
		</div>

		<div class="row bg-light bg-md-dark-gray">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div class="about__card">
					<h4 class="about__subtitle">Our Program:</h4>
					<p class="about__text">
						A Petland puppy is provided with significant veterinarian care and vaccinations before it is
						placed in your home.</p>
					<ul class="about__list">
						<li class="about__item">We use high quality food.</li>
						<li class="about__item">We weigh them daily and take their temperatures often.</li>
						<li class="about__item">We groom each puppy daily; including bathing, nail trimming and
							brushing.
						</li>
						<li class="about__item">Socialization with adults and children including lots of play.</li>
						<li class="about__item">Daily Exercise.</li>
					</ul>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
				<div class="about__card">
					<h4 class="about__subtitle">Your Benefits:</h4>
					<p class="about__text">
						Petland offers many different breeds, we will help match you with the right breed for your
						personality and lifestyle.</p>
					<ul class="about__list">
						<li class="about__item">We provide a Health Certificate, and the vaccines up to date.</li>
						<li class="about__item">Our Puppies come with a Microchip ready for activation.</li>
						<li class="about__item">3 Generations Pedigree.
							Registration Papers.
						</li>
						<li class="about__item">Petland provides all customers with a comprehensive ten (10) year
							hereditary and congenital warranty with their puppy.
						</li>
						<li class="about__item">Pets for a Lifetime Resources Kit (with a training video).</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>