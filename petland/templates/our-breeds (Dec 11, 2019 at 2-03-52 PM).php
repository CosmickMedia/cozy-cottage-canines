<?php
/**
 * Template Name: Our Breeds
 */
?>

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>


<div id="reactBreeds" class="container container--reduce container-fluid-sm"></div>


<?php get_footer(); ?>

