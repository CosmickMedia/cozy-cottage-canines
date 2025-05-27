<?php

$main_url = 'https://www.petlandflorida.com';
$current_url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$page_title = str_replace('#038;', '', get_the_title());

?>

<?php if (get_the_title() != "Home") : ?>
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

<?php endif; ?>


<?php get_header(); ?>


<?php while (have_posts()) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; ?>

<?php get_footer(); ?>