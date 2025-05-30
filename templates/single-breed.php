<?php
/**
 * Template Name: Single Breed
 */
?>

<?php get_header(); ?>

<div class="breed" id="reactBreedDetails"></div>

<div class="container">
    <section class="form-section">
        <div class="form-section__container">
            <div class="form-section__text">
                <h3 class="heading heading--h3">INTERESTED IN THIS BREED?</h3>
                <p><strong>Fill out the form</strong> and we'll get back to you shortly.</p>
            </div>
            <div class="form">
                <?= do_shortcode( '[gravityform id="9" title="false" description="false" ajax="true"]' ) ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>

