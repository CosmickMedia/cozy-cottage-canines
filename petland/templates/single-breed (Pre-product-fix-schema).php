<?php

/**
 * Template Name: Single Breed
 */
?>
<?php
$api_url = Theme_Manager::get_instance()->get_theme_option('k9_api_url');
$breedId = get_query_var('breed_id');
$url = "$api_url/breed/$breedId";

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_RETURNTRANSFER => 1,
	CURLOPT_URL => $url,
]);
$response = curl_exec($curl);
$data = json_decode($response, true);
curl_close($curl);
$breedName = $data['data']['breed']['name'];
$breedDescription = $data['data']['breed']['description'];

$properties = array_keys($data['data']['breed']['images']);
$dynamicKey = $properties[0];
$breedImage = $data['data']['breed']['images'][$dynamicKey]['optimizedUrl'];

?>

<script type="application/ld+json">
	<?php echo '
{
	  "@context": "https://schema.org/",
	  "@type": "Product",
	  "name": "' . $breedName . '",
	  "image": "' . $breedImage . '",
	  "description": "' . $breedDescription . '",
	  "brand": {
		"@type": "Organization",
		"name": "Petland Florida"
	  }
	}'
	?>
</script>
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
"item": "https://www.petlandflorida.com/"
},{
"@type": "ListItem",
"position": 2,
"name": "Breeds",
"item": "https://www.petlandflorida.com/breeds/"
},{
"@type": "ListItem",
"position": 3,
"name": "' . $breedName . '",
"item": "' . $current_url . '"
}]
}
'
	?>
</script>
<?php get_header(); ?>


<!--masthead-->
<div class="masthead masthead--cut d-none d-md-block">
	<div class="masthead__picture">
		<img src="<?php echo THEME_URL; ?>/styles/assets/images/main-hero-desktop.jpg" alt="">
	</div>
</div>

<div id="reactBreedDetails"></div>

<?php get_footer(); ?>