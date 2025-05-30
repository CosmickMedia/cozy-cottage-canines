<?php
/**
 * Template Name: Careers
 */
?>

<?php get_header(); ?>

<!-- Start: "Join the Team" Masthead -->
<div class="wp-block-petland-header-inner-title masthead">
    <div class="container masthead__container">
        <div class="masthead__box">
            <h1 class="heading heading--h1">JOIN THE TEAM</h1>
            <p>
                Petland Cleveland is always searching for highly motivated people with a strong love
                for animals. Interviews will be conducted as positions become available at our locations
                in Parma and Strongsville, OH. <br><br>
                If you are interested in being employed at Petland Cleveland, please complete and submit
                the application below. If you are selected to attend an interview, we will contact you as
                soon as possible.
            </p>
        </div>

        <!-- Masthead hero image -->
        <div class="masthead__hero">
            <img
                    src="https://www.petlandcleveland.com/wp-content/uploads/2022/03/join-the-team-1.jpg"
                    alt="Join the Team"
                    decoding="async"
            />
        </div>
    </div>
</div>
<!-- End: "Join the Team" Masthead -->

<div class="container container--reduce careers-container">
    <!-- Section Title -->
    <div class="wp-block-petland-title-block-container title-block mb-2">
        <h4 class="wp-block-heading">AVAILABLE POSITIONS</h4>
    </div>

    <p class="mb-5">
        Petland Cleveland has two locations in Parma and Strongsville. We are constantly seeking
        animal-loving individuals to join our dedicated staff. Boasting an international presence,
        the Petland brand has provided entry-level jobs to people around the world since 1967.
    </p>

    <!-- Grid Wrapper (matches your site’s .grid, .grid__row, etc.) -->
    <div class="wp-block-petland-petland-grid grid">
        <div class="grid__row grid__row--col-1 grid__row--col-sm-1 grid__row--col-xs-1 grid__row--col-md-2 grid__row--col-lg-2 grid__row--col-xl-2 grid__row--gap-4 grid__row--gap-xl-0 grid__row--gap-md-0 grid__row--gap-lg-0 grid__row--gap-sm-0 grid__row--gap-xs-0">

            <!-- 1. Cashier -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Cashier</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_cashier" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_cashier">
                    <div class="career__description">
                        <p>The Cashier is responsible for running the cash register while providing a warm and courteous experience for our customers.</p>
                    </div>
                    <!-- Gravity Form ID 13 -->
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 2. Assistant Manager -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Assistant Manager</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_assistant_manager" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_assistant_manager">
                    <div class="career__description">
                        <p>The Assistant Manager is responsible for aspects of store operation, including inventory management, small animal sales, and community relations. In the absence of the Manager, the Assistant Manager assumes that role.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 3. Inventory Control Manager -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Inventory Control Manager</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_ic_manager" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_ic_manager">
                    <div class="career__description">
                        <p>The Inventory Control Manager is responsible for maximizing the profitability and optimizing inventory turns related to pet supply inventory.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 4. Pet Counselors -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Pet Counselors</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_pet_counselors" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_pet_counselors">
                    <div class="career__description">
                        <p>Pet Counselors are dedicated to matching the right pet with the right customer and meeting the needs of both. They enhance knowledge and enjoyment of the human-animal bond, and Lead Pet Counselors also provide training and coaching to others.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 5. Sales Manager -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Sales Manager</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_sales_manager" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_sales_manager">
                    <div class="career__description">
                        <p>The Sales Manager is responsible for developing a positive Petland culture on the sales floor, guiding a team of Pet Counselors to deliver the Petland Mission.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 6. Kennel Manager -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Kennel Manager</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_kennel_manager" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_kennel_manager">
                    <div class="career__description">
                        <p>The Kennel Manager is responsible for providing excellent care for pets at Petland by following systems and procedures to ensure the pet’s four basic needs are met.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 7. Head Pet Care Technician -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Head Pet Care Technician</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_head_petcare_tech" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_head_petcare_tech">
                    <div class="career__description">
                        <p>The Head Pet Care Technician oversees and supports daily pet care tasks, ensuring a safe and healthy environment for all pets.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 8. Animal Care Technician -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Animal Care Technician</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_animal_care_tech" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_animal_care_tech">
                    <div class="career__description">
                        <p>The Animal Care Technician is responsible for feeding, grooming, sanitizing enclosures, and general welfare of animals in our care.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 9. Groomer -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Groomer</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_groomer" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_groomer">
                    <div class="career__description">
                        <p>The Pet Groomer provides exceptional grooming services to a variety of dog breeds, using proper techniques and styling.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 10. Photographer -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Photographer</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_photographer" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_photographer">
                    <div class="career__description">
                        <p>The Photographer uses photographic techniques, equipment, and editing software to produce quality images of puppies and Pet Counselors, ensuring best practices while working around pets.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

            <!-- 11. Sales Associate -->
            <div class="wp-block-petland-careers-card career">
                <div class="career__head">
                    <h2 class="heading__title">Sales Associate</h2>
                    <i class="icon icon--arrow-right-single"></i>
                    <a class="career__drop" data-target="#career_sales_associate" rel="noopener noreferrer"></a>
                </div>
                <div class="career__expand" id="career_sales_associate">
                    <div class="career__description">
                        <p>The Sales Associate assists customers with product inquiries, maintains store organization, and fosters a positive shopping experience.</p>
                    </div>
                    <?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]'); ?>
                </div>
            </div>

        </div><!-- /.grid__row -->
    </div><!-- /.wp-block-petland-petland-grid -->

</div><!-- /.container.container--reduce -->

<?php get_footer(); ?>
