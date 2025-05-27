<?php
/**
 * Template Name: Puppies
 */

$puppies_page = Theme_Manager::get_instance()->get_available_puppies_page(); ?>

<?php if ($puppies_page->have_posts()):
    while($puppies_page->have_posts()): $puppies_page->the_post();


$main_url = 'https://www.petlandflorida.com';
$current_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$page_title = get_the_title(Theme_Manager::get_instance()->get_theme_option('available_puppies_page'));

?>
<script type="application/ld+json">
	<?php echo '
{
"@context": "https://schema.org/",
"@type": "BreadcrumbList",
"itemListElement": [{
"@type": "ListItem",
"position": 1,
"name": "Petland Florida",
"item": "' . $main_url . '"
},{
"@type": "ListItem",
"position": 2,
"name": "' . $page_title . '",
"item": "' . $current_url . '"
}]
}'
	?>
</script>

<?php endwhile;
endif;
wp_reset_postdata(); ?>

<?php get_header(); ?>

<div class="available-puppies">

    <?php $puppies_page = Theme_Manager::get_instance()->get_available_puppies_page(); ?>

    <?php if ($puppies_page->have_posts()): ?>
        <?php while($puppies_page->have_posts()): $puppies_page->the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

  <div id="reactAvailablePuppies" class="container"></div>
</div>

<?php get_footer(); ?>