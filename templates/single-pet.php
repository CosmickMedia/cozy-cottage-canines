<?php
/**
 * Template Name: Single Puppy
 */
?>

<?php get_header(); ?>
<div class="puppy">
    <div class="container">

        <section id="reactPetDetails"></section>

        <section id="reactPetBreedDetails"></section>

        <section class="petland-info" id="whyPetlandContent">
            <?php $posturl = Theme_Manager::get_instance()->get_theme_page_link('why_petland_content_page'); ?>
            <?php $postid = url_to_postid($posturl); ?>
            <div class="title-block">
                <h2 class="heading heading--h3">Why Cozy Canine Cottage</h2>
                <?php $post = get_post($postid); ?>
            </div>
            <div class="grid">
                <?php echo $post->post_content; ?>
            </div>
        </section>
        <section class="form-section" id="pet-info">
            <div id="reactPetInfoForm"></div>
        </section>
        <section id="reactPetSimilar"></section>

    </div>
</div>
<?php get_footer(); ?>

