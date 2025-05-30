<?php
/**
 * Template Name: birds
 */
?>

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

    <?php the_content(); ?>

<?php endwhile; ?>


<div id="reactAvailableBirds" class="container"></div>

<?php get_footer(); ?>

