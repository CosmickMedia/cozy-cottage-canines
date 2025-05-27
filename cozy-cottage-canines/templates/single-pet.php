<?php
/**
 * Template Name: Single Puppy
 */
?>

<?php get_header(); ?>

<!--masthead-->
<div class="masthead masthead--cut d-none d-md-block">
	<div class="masthead__picture">
		<img src="<?php echo THEME_URL; ?>/styles/assets/images/main-hero-desktop.jpg" alt="">
	</div>
</div>

<div class="container container--reduce container-fluid-sm detail">

    <section id="reactPetDetails" class="detail__head detail__head--fluid"></section>


	<div class="detail__container">

    <section id="reactPetBreedDetails"></section>
		<section id="whyPetlandContent">
			<?php $posturl = Theme_Manager::get_instance()->get_theme_page_link('why_petland_content_page'); ?>
			<?php $postid = url_to_postid( $posturl ); ?>
			<div class="detail__subtitle detail__subtitle--lg">
				<h2>WHY PETLAND</h2>
				<?php $post = get_post($postid); ?>
			</div>
			<div class="row why-petland">
				<?php echo $post->post_content; ?>
			</div>
		</section>
		<section class="form" id="pet-info">
            <div id="reactPetInfoForm"></div>

		</section>
		<section id="reactPetSimilar"></section>
	</div>
</div>
<?php get_footer(); ?>
