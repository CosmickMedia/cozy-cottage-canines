<?php
/**
 * Template Name: Careers
 */
?>

<?php get_header(); ?>

<!--masthead-->
<div class="masthead">
	<picture class="masthead__picture">
		<source media="(min-width:597px)" srcset="<?php echo THEME_URL; ?>/styles/assets/images/hero-careers.jpg">
		<img src="<?php echo THEME_URL; ?>/styles/assets/images/hero-careers-mobile.jpg" alt="">
	</picture>

	<div class="masthead__content--internal masthead__content--bg-text container container--reduce">
		<div class="masthead__row masthead__row--fluid">
			<h1 class="masthead__title">
				<small>Join the</small>
				<span>team</span>
			</h1>
		</div>
	</div>
</div>

<div class="container container--reduce">

    <div class="info info">
        <h2 class="info__title">Available positions</h2>
        <p class="info__text">Serving as a pet store , Petland constantly seeks animal-loving staff. Boasting an
            international presence, the pet supplies retailer remains an entry-level job supplier for people around the
            world.

        </p>
    </div>

    <section class="career" id="sectionAccordion">
        <div class="career__card">
            <div class="career__bar"></div>
            <div class="career__head">
                <h2 class="career__title">Cashier</h2>
                <div class="career__icon">
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
            <a class="career__drop" data-toggle="collapse" data-target="#career_01"
               aria-expanded="true" aria-controls="collapseOne"></a>
        </div>
        <div class="collapse" id="career_01" data-parent="#sectionAccordion">
            <div class="career__expand">
                <form>
                    <div class="form-row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="name"></label>
                                <input type="text" class="form-control" id="name" placeholder="Your name">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastName"></label>
                                <input type="text" class="form-control" id="lastName" placeholder="your last name">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" class="form-control" id="email"
                                       placeholder="e-mail">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_1"></label>
                                <input type="text" class="form-control" id="address_1" placeholder="street address">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_2"></label>
                                <input type="text" class="form-control" id="address_2" placeholder="address line 2">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="city"></label>
                                <input type="text" class="form-control" id="city" placeholder="city">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state"></label>
                                <input type="text" class="form-control" id="state"
                                       placeholder="state / province / region">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country"></label>
                                <input type="text" class="form-control" id="country" placeholder="country">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form__add">
                                    <label class="form__add--item" for="resume">+</label>
                                </div>
                                <input type="text" class="form-control" id="resume" placeholder="resume">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-left">
                        <button type="submit" class="btn btn-primary btn-lg d-block d-md-inline">apply this job</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="career__card">
            <div class="career__bar"></div>
            <div class="career__head">
                <h2 class="career__title">Assistant Manager</h2>
                <div class="career__icon">
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
            <a class="career__drop" data-toggle="collapse" data-target="#career_02"
               aria-expanded="true" aria-controls="career_02"></a>
        </div>
        <div class="collapse" id="career_02" data-parent="#sectionAccordion">
            <div class="career__expand">
                <form>
                    <div class="form-row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="name"></label>
                                <input type="text" class="form-control" id="name" placeholder="Your name">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastName"></label>
                                <input type="text" class="form-control" id="lastName" placeholder="your last name">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" class="form-control" id="email"
                                       placeholder="e-mail">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_1"></label>
                                <input type="text" class="form-control" id="address_1" placeholder="street address">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_2"></label>
                                <input type="text" class="form-control" id="address_2" placeholder="address line 2">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="city"></label>
                                <input type="text" class="form-control" id="city" placeholder="city">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state"></label>
                                <input type="text" class="form-control" id="state"
                                       placeholder="state / province / region">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country"></label>
                                <input type="text" class="form-control" id="country" placeholder="country">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form__add">
                                    <label class="form__add--item" for="resume">+</label>
                                </div>
                                <input type="text" class="form-control" id="resume" placeholder="resume">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-left">
                        <button type="submit" class="btn btn-primary btn-lg d-block d-md-inline">apply this job</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="career__card">
            <div class="career__bar"></div>
            <div class="career__head">
                <h2 class="career__title">Inventory Control Manager</h2>
                <div class="career__icon">
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
            <a class="career__drop" data-toggle="collapse" data-target="#career_03"
               aria-expanded="true" aria-controls="career_03"></a>
        </div>
        <div class="collapse" id="career_03" data-parent="#sectionAccordion">
            <div class="career__expand">
                <form>
                    <div class="form-row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="name"></label>
                                <input type="text" class="form-control" id="name" placeholder="Your name">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastName"></label>
                                <input type="text" class="form-control" id="lastName" placeholder="your last name">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" class="form-control" id="email"
                                       placeholder="e-mail">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_1"></label>
                                <input type="text" class="form-control" id="address_1" placeholder="street address">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address_2"></label>
                                <input type="text" class="form-control" id="address_2" placeholder="address line 2">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="city"></label>
                                <input type="text" class="form-control" id="city" placeholder="city">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="state"></label>
                                <input type="text" class="form-control" id="state"
                                       placeholder="state / province / region">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country"></label>
                                <input type="text" class="form-control" id="country" placeholder="country">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form__add">
                                    <label class="form__add--item" for="resume">+</label>
                                </div>
                                <input type="text" class="form-control" id="resume" placeholder="resume">
                                <div class="invalid-feedback">
                                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/form-error.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-left">
                        <button type="submit" class="btn btn-primary btn-lg d-block d-md-inline">apply this job</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <div class="info info">
        <h2 class="info__title">Facts About Working at Petland</h2>
        <p class="info__text">
            Petland Florida Hours of Operation: <br>
            Mon-Sun: 10:00 AM-9:00 PM
            <br><br>

            Petland Florida always accepts applications for employment. Interviews are conducted as positions become
            available. Those invited to attend an interview are selected from applications already completed and
            submitted. If you are interested in a position with Petland Florida , please complete the application below
            and submit. If you are selected to attend an interview, you will be contacted.
        </p>
    </div>
</div>
<?php get_footer(); ?>

