<?php
/**
 * Template Name: Puppies
 */
?>

<?php get_header(); ?>

<?php $puppies_page = Theme_Manager::get_instance()->get_available_puppies_page(); ?>


<?php if ($puppies_page->have_posts()): ?>
    <?php while($puppies_page->have_posts()): $puppies_page->the_post(); ?>

        <?php the_content(); ?>

    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>


<div id="reactAvailablePuppies"
     class="container"></div>

<?php get_footer(); ?>

