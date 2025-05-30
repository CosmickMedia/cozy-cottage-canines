<?php
/**
 * Template Name: Cozy Canine Cottage Cares
 */
?>

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>


<div class="container container--reduce cares">

	<section class="cares__slide">

		<div class="info info--fluid">
			<h2 class="info__title">Cozy Canine Cottage pets make life better</h2>
			<div class="info__text"></div>
		</div>

		<div class="swiper-container  swiper-only-mobile">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="cares__card">
						<div class="cares__image">
							<img src="<?php echo THEME_URL; ?>/styles/assets/images/card-from-where.jpg" alt="">
						</div>
						<button class="cares__button" data-toggle="modal" data-target="#modal_card_01">
							<i class="fa fa-angle-right"></i>
						</button>


					</div>
				</div>

				<div class="swiper-slide">
					<div class="cares__card">
						<div class="cares__image">
							<img src="<?php echo THEME_URL; ?>/styles/assets/images/card-where-americans.jpg" alt="">
						</div>
						<button class="cares__button" data-toggle="modal" data-target="#modal_card_02">
							<i class="fa fa-angle-right"></i>
						</button>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="cares__card">
						<div class="cares__image">
							<img src="<?php echo THEME_URL; ?>/styles/assets/images/card-makes-life.jpg" alt="">
						</div>
						<button class="cares__button" data-toggle="modal" data-target="#modal_card_03">
							<i class="fa fa-angle-right"></i>
						</button>
					</div>
				</div>

				<div class="swiper-slide">
					<div class="cares__card">
						<div class="cares__image">
							<img src="<?php echo THEME_URL; ?>/styles/assets/images/card-petland-puppys.jpg" alt="">
						</div>
						<button class="cares__button" data-toggle="modal" data-target="#modal_card_04">
							<i class="fa fa-angle-right"></i>
						</button>
					</div>
				</div>

			</div>
			<!-- Add Pagination -->
			<div class="swiper-pagination"></div>
		</div>

        <div class="modal fade" id="modal_card_01" role="dialog" aria-labelledby="modal_card_01" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-dialog-fluid" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="article">

                            <h1 class="article__title">From where are coming our pets?</h1>
                            <div class="article__content">
                                <h6>Our Commitment</h6>
                                <p>Our mission is to enhance the human-animal bond and provide life-long companions for our
                                    customers. We’ve created strict requirements to help us follow that mission. Cozy Canine Cottage is
                                    dedicated to improving conditions for all dogs in the communities we serve. We do this
                                    by setting an excellent example for the entire pet industry and encouraging highest
                                    standards of pet care.
                                </p>
                                <div class="article__video">
                                    <iframe src="https://www.youtube.com/embed/mbn_3uRyHcs?rel=0" frameborder="0"
                                            allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                                <p>Cozy Canine Cottage is proud of its commitment to animal welfare and quality of our pets. Cozy Canine Cottage
                                    stores are independently owned and operated, and each operator is responsible for
                                    choosing healthy pets offered to Cozy Canine Cottage customers. Our stores establish relationships
                                    with pet providers and are charged with visiting the facilities from which they purchase
                                    puppies for their stores.</p>

                                <h6>Where do Cozy Canine Cottage puppies come from?</h6>

                                <p>Our puppies are happy and healthy family pets. our puppies come from: <br> <br>

                                    USDA licensed breeders and distributors with no direct violations within the last 2
                                    years and who have a veterinarian-documented socialization and exercise program and
                                    follow veterinarian protocol for skin, coat, nail and dental hygiene. They also cannot
                                    have a specific indirect violation on their Most Recent inspection report.
                                    Hobby breeders as defined by the Animal Welfare Act. These are breeders who raise their
                                    dogs in a humane manner. <br>
                                    Local adoption pets that are vet-checked. Additionally, some of our puppies and kittens
                                    come from local animal shelters or from members of the local community as part of
                                    Our Adopt-A-Pet program, dedicated to finding homes for accidental litters. In
                                    this program, our store operators work with local animal shelters and with members
                                    of the community to find homes for homeless pets. Through Our Adopt-A-Pet program,
                                    hundreds of thousands of shelter and community animals have been placed with caring
                                    families. <br>
                                    The USDA is the agency that regulates the food we feed our families, and we trust its
                                    oversight to keep us safe. According to the USDA, there are approximately 120 field
                                    inspectors who conduct inspections at the roughly 1,700 licensed kennels.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
	</section>


	<section class=" cares__cards">
		<div class="info info--fluid">
			<h2 class="info__title">Our Breeders</h2>
			<div class="info__text"></div>
		</div>
		<div class="heading__card">
			<div class="heading__bar"></div>
			<div class="heading__head heading__head--row">
				<h2 class="heading__title">American Asociation of Dogs</h2>
				<p class="heading__text">
					Lorem Ipsum dolor sit.
				</p>
			</div>
		</div>

		<div class="heading__card">
			<div class="heading__bar" style="background: #96a550;"></div>
			<div class="heading__head heading__head--row">
				<h2 class="heading__title">Pedigree Society</h2>
				<p class="heading__text">
					Lorem Ipsum dolor sit.
				</p>
			</div>
		</div>

		<div class="heading__card">
			<div class="heading__bar" style="background: #45515d;"></div>
			<div class="heading__head heading__head--row">
				<h2 class="heading__title">Florida Pet Society</h2>
				<p class="heading__text">
					Lorem Ipsum dolor sit.
				</p>
			</div>
		</div>

		<div class="heading__card">
			<div class="heading__bar"></div>
			<div class="heading__head heading__head--row">
				<h2 class="heading__title">Great America Society of pets</h2>
				<p class="heading__text">
					Lorem Ipsum dolor sit.
				</p>
			</div>
		</div>

	</section>
	<section class="client">
		<div class="info">
			<h2 class="info__title">Client Stories</h2>
			<div class="info__text"></div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="client__card">
					<div class="client__image">
						<img src="https://picsum.photos/322/163?image=685" alt="">
					</div>
					<div class="client__chat">
						<h6 class="client__date">
							July 2018
						</h6>
						<p class="client__message">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac rhoncus ipsum, eget
							suscipit elit. Nam consectetur maximus nisi nec aliquet.
						</p>
					</div>
					<div class="client__info">
						<h4 class="client__name">
							Michael Morrison</h4>
						<h6 class="client__job">Entrepreneur & CEO Maxim</h6>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="client__card  client__card--white">
					<div class="client__image">
						<img src="https://picsum.photos/322/163?image=1005" alt="">
					</div>
					<div class="client__chat">
						<h6 class="client__date">
							July 2018
						</h6>
						<p class="client__message">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac rhoncus ipsum, eget
							suscipit elit. Nam consectetur maximus nisi nec aliquet.
						</p>
					</div>
					<div class="client__info">
						<h4 class="client__name">
							Dennis Ecklessay</h4>
						<h6 class="client__job">Fitnes Owner & CEO </h6>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="client__card">
					<div class="client__image">
						<img src="https://picsum.photos/322/163?image=513" alt="">
					</div>
					<div class="client__chat">
						<h6 class="client__date">
							July 2018
						</h6>
						<p class="client__message">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac rhoncus ipsum, eget
							suscipit elit. Nam consectetur maximus nisi nec aliquet.
						</p>
					</div>
					<div class="client__info">
						<h4 class="client__name">
							Richard Roberts</h4>
						<h6 class="client__job">IT Director & lead</h6>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Modals Section-->



</div>

	<?php get_footer(); ?>
