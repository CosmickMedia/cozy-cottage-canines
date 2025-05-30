<?php
/**
 * Template Name: Our Breeds
 */
?>

<?php get_header(); ?>

<div class="breeds">
    <?php while (have_posts()): the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>


    <div id="reactBreeds"></div>
</div>



<?php get_footer(); ?>

