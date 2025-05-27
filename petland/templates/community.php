<?php
/**
 * Template Name: Community
 */
?>

<?php get_header(); ?>

<!--masthead-->
<div class="masthead">
	<picture class="masthead__picture">
		<source media="(min-width:597px)" srcset="<?php echo THEME_URL; ?>/styles/assets/images/hero-community.jpg">
		<img src="<?php echo THEME_URL; ?>/styles/assets/images/hero-community-mobile.jpg" alt="">
	</picture>

	<div class="masthead__content--internal masthead__content--bg-text container container--reduce">
		<div class="masthead__row masthead__row--fluid">
			<h1 class="masthead__title pl-md-4">
				<small>OUR</small>
				<span>COMMUNITY</span>
			</h1>
		</div>
	</div>
</div>

<div class="container container--reduce">
	<section class="event" id="sectionAccordion">
		<div class="event__card">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__specs">
						<h6 class="event__label">HOURS AND DATES</h6>
						<h4>Saturday 5 Nov. at 10:00 am</h4>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__specs">
						<h6 class="event__label">PLACE</h6>
						<h4>Palais des congres</h4>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__button text-right">
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#event_01"
						        aria-expanded="true" aria-controls="collapseOne">more
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="collapse" id="event_01" data-parent="#sectionAccordion">
			<div class="event__expand">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="event__head">
							<h6 class="event__label">About</h6>
							<h2 class="event__title">EVENT TITLE HERE</h2>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="d-none d-md-block col-3">
						<div class="event__image">
							<img src="https://picsum.photos/320/220?image=1062" alt="">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<div class="event__content">
							<h6 class="event__label">PRACTICAL INFORMATION</h6>
							<div class="event__info">
								<div class="event__date">
									<h2 class="mb-0">05</h2>
									<h4 class="mb-0">Nov</h4>
								</div>
								<div class="event__more">
									<p>sat. 10:00-6:00</p>
									<p>Palais des congres</p>
								</div>
							</div>
							<p class="event__description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet arcu eget velit
								elementum posuere vitae non ligula. Pellentesque habitant morbi tristique senectus et netus
								et malesuada fames ac turpis egestas. Phasellus dignissim ligula eu arcu ultricies
								vulputate. Cras sit amet turpis dapibus, eleifend purus ac, facilisis felis. Morbi sit amet
								erat sed augue vehicula venenatis. Etiam eget hendrerit arcu. Curabitur faucibus nulla ac
								nisl aliquet, et porta diam mollis. Nam ornare quis leo eget tempor. Duis in tincidunt
								libero, a vestibulum ex. Integer pulvinar neque ut dolor accumsan porta. Proin volutpat
								vitae mi ut pharetra. Suspendisse tellus libero, eleifend at consequat ut, tempor quis
								lacus. Ut bibendum maximus iaculis. Phasellus nisl velit, imperdiet a pretium condimentum,
								iaculis et libero. Sed faucibus lectus lorem, non posuere erat aliquet nec.

							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="event__card">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__specs">
						<h6 class="event__label">HOURS AND DATES</h6>
						<h4>Saturday 5 Nov. at 10:00 am</h4>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__specs">
						<h6 class="event__label">PLACE</h6>
						<h4>Palais des congres</h4>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__button text-right">
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#event_02"
						        aria-expanded="true" aria-controls="event_02">more
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="collapse" id="event_02" data-parent="#sectionAccordion">
			<div class="event__expand">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="event__head">
							<h6 class="event__label">About</h6>
							<h2 class="event__title">EVENT TITLE HERE</h2>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="d-none d-md-block col-3">
						<div class="event__image">
							<img src="https://picsum.photos/320/220?image=1062" alt="">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<div class="event__content">
							<h6 class="event__label">PRACTICAL INFORMATION</h6>
							<div class="event__info">
								<div class="event__date">
									<h2 class="mb-0">05</h2>
									<h4 class="mb-0">Nov</h4>
								</div>
								<div class="event__more">
									<p>sat. 10:00-6:00</p>
									<p>Palais des congres</p>
								</div>
							</div>
							<p class="event__description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet arcu eget velit
								elementum posuere vitae non ligula. Pellentesque habitant morbi tristique senectus et netus
								et malesuada fames ac turpis egestas. Phasellus dignissim ligula eu arcu ultricies
								vulputate. Cras sit amet turpis dapibus, eleifend purus ac, facilisis felis. Morbi sit amet
								erat sed augue vehicula venenatis. Etiam eget hendrerit arcu. Curabitur faucibus nulla ac
								nisl aliquet, et porta diam mollis. Nam ornare quis leo eget tempor. Duis in tincidunt
								libero, a vestibulum ex. Integer pulvinar neque ut dolor accumsan porta. Proin volutpat
								vitae mi ut pharetra. Suspendisse tellus libero, eleifend at consequat ut, tempor quis
								lacus. Ut bibendum maximus iaculis. Phasellus nisl velit, imperdiet a pretium condimentum,
								iaculis et libero. Sed faucibus lectus lorem, non posuere erat aliquet nec.

							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="event__card">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__specs">
						<h6 class="event__label">HOURS AND DATES</h6>
						<h4>Saturday 5 Nov. at 10:00 am</h4>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__specs">
						<h6 class="event__label">PLACE</h6>
						<h4>Palais des congres</h4>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__button text-right">
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#event_03"
						        aria-expanded="true" aria-controls="event_03">more
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="collapse" id="event_03" data-parent="#sectionAccordion">
			<div class="event__expand">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="event__head">
							<h6 class="event__label">About</h6>
							<h2 class="event__title">EVENT TITLE HERE</h2>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="d-none d-md-block col-3">
						<div class="event__image">
							<img src="https://picsum.photos/320/220?image=1062" alt="">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<div class="event__content">
							<h6 class="event__label">PRACTICAL INFORMATION</h6>
							<div class="event__info">
								<div class="event__date">
									<h2 class="mb-0">05</h2>
									<h4 class="mb-0">Nov</h4>
								</div>
								<div class="event__more">
									<p>sat. 10:00-6:00</p>
									<p>Palais des congres</p>
								</div>
							</div>
							<p class="event__description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet arcu eget velit
								elementum posuere vitae non ligula. Pellentesque habitant morbi tristique senectus et netus
								et malesuada fames ac turpis egestas. Phasellus dignissim ligula eu arcu ultricies
								vulputate. Cras sit amet turpis dapibus, eleifend purus ac, facilisis felis. Morbi sit amet
								erat sed augue vehicula venenatis. Etiam eget hendrerit arcu. Curabitur faucibus nulla ac
								nisl aliquet, et porta diam mollis. Nam ornare quis leo eget tempor. Duis in tincidunt
								libero, a vestibulum ex. Integer pulvinar neque ut dolor accumsan porta. Proin volutpat
								vitae mi ut pharetra. Suspendisse tellus libero, eleifend at consequat ut, tempor quis
								lacus. Ut bibendum maximus iaculis. Phasellus nisl velit, imperdiet a pretium condimentum,
								iaculis et libero. Sed faucibus lectus lorem, non posuere erat aliquet nec.

							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="event__card">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__specs">
						<h6 class="event__label">HOURS AND DATES</h6>
						<h4>Saturday 5 Nov. at 10:00 am</h4>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__specs">
						<h6 class="event__label">PLACE</h6>
						<h4>Palais des congres</h4>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="event__button text-right">
						<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#event_04"
						        aria-expanded="true" aria-controls="event_04">more
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="collapse" id="event_04" data-parent="#sectionAccordion">
			<div class="event__expand">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="event__head">
							<h6 class="event__label">About</h6>
							<h2 class="event__title">EVENT TITLE HERE</h2>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="d-none d-md-block col-3">
						<div class="event__image">
							<img src="https://picsum.photos/320/220?image=1062" alt="">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<div class="event__content">
							<h6 class="event__label">PRACTICAL INFORMATION</h6>
							<div class="event__info">
								<div class="event__date">
									<h2 class="mb-0">05</h2>
									<h4 class="mb-0">Nov</h4>
								</div>
								<div class="event__more">
									<p>sat. 10:00-6:00</p>
									<p>Palais des congres</p>
								</div>
							</div>
							<p class="event__description">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sit amet arcu eget velit
								elementum posuere vitae non ligula. Pellentesque habitant morbi tristique senectus et netus
								et malesuada fames ac turpis egestas. Phasellus dignissim ligula eu arcu ultricies
								vulputate. Cras sit amet turpis dapibus, eleifend purus ac, facilisis felis. Morbi sit amet
								erat sed augue vehicula venenatis. Etiam eget hendrerit arcu. Curabitur faucibus nulla ac
								nisl aliquet, et porta diam mollis. Nam ornare quis leo eget tempor. Duis in tincidunt
								libero, a vestibulum ex. Integer pulvinar neque ut dolor accumsan porta. Proin volutpat
								vitae mi ut pharetra. Suspendisse tellus libero, eleifend at consequat ut, tempor quis
								lacus. Ut bibendum maximus iaculis. Phasellus nisl velit, imperdiet a pretium condimentum,
								iaculis et libero. Sed faucibus lectus lorem, non posuere erat aliquet nec.

							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>

