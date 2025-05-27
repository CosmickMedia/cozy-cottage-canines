<?php
/**
 * Template Name: Thank You Page
 */
?>

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

<?php echo Theme_Manager::get_instance()->get_theme_option('thank_you_page_script'); ?>

<?php get_footer(); ?>

