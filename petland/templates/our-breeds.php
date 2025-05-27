<?php
/**
 * Template Name: Our Breeds
 */
?>

<?php

$main_url = 'https://www.petlandflorida.com';
$current_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$page_title = get_the_title();

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

<?php get_header(); ?>

<?php while (have_posts()): the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>


<div id="reactBreeds" class="container"></div>


<?php get_footer(); ?>

