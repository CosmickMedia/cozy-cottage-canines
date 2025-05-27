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
	  "name": "'.$breedName.'",
	  "image": "'.$breedImage.'",
	  "description": "'.$breedDescription.'",
	  "brand": {
		"@type": "Organization",
		"name": "Petland Florida"
	  }
	}'
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