<?php
/**
 * Template Name: Single Breed
 */

global $wc_petkey_settings;

$phone = get_field( 'locations_0_phone', 'option' );
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

$breed_data_exists = isset($data['data']['breed']);

if ($breed_data_exists) :
    $breedName = $data['data']['breed']['name'];
    $breedDescription = $data['data']['breed']['description'];
    $breedImage = '';

    if (isset($data['data']['breed']['images'])) {
        $properties = array_keys($data['data']['breed']['images']);
        $dynamicKey = $properties[0];
        $breedImage = $data['data']['breed']['images'][$dynamicKey]['optimizedUrl'];
    }
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
	<?php
    echo '
{
    "@context": "https://schema.org/",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Petland Florida",
            "item": "https://www.petlandflorida.com/"
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Breeds",
            "item": "https://www.petlandflorida.com/breeds/"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "' . $breedName . '",
            "item": "' . $current_url . '"
        }
    ]
}
        ';
    endif;
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

<div class="container container--reduce container-fluid-sm detail">
    <section class="detail__head" style="margin-top: 0;">
        <div class="detail__container">
            <section class="form">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="form__info">
                            <h2 class="form__title">INTERESTED IN THIS BREED?</h2>
                            <?php if ( ! empty( $phone ) && ! empty( $wc_petkey_settings->show_contact_num ) && $wc_petkey_settings->show_contact_num == 'Y' ) : ?>
                            <p class="form__text">Call us at <a href="tel:<?= $phone ?>"><b><?= $phone ?></b></a> or <b>fill out the form</b> and we'll get back to you shortly.</p>
                            <?php else : ?>
                            <p class="form__text"><b>Fill out the form</b> and we'll get back to you shortly.</p>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <?= do_shortcode( '[gravityform id="9" title="false" description="false" ajax="true"]' ) ?>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>

<?php get_footer(); ?>