<!--header-->
<header class="header" id="petHeader">
	<div class="container">
		<div class="header__row">

            <div class="brandLogo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/logo.png" alt="" class="brandLogo__dark">
                    <img src="<?php echo THEME_URL; ?>/styles/assets/images/shared/logo_red.png" alt="" class="brandLogo__light">
                </a>
            </div>

			<div class="mainNav" id="navBar">
				<div class="mainNav__content">

					<?php get_template_part('template-parts/header/main-menu'); ?>

					<div class="mainNav__close d-lg-none">
						<a onclick="toogleMenu()">&times;</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>