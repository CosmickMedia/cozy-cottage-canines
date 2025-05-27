<?php if(Theme_Manager::get_instance()->get_social_network_url('facebook')): ?>
	<li class="social__item">
		<a target="_blank" rel="noopener" href="<?php echo Theme_Manager::get_instance()->get_social_network_url('facebook'); ?>">
			<img src="<?php Theme_Manager::get_instance()->get_shared_asset('i-facebook.svg'); ?>" alt="">
		</a>
	</li>
<?php endif; ?>

<?php if(Theme_Manager::get_instance()->get_social_network_url('google_plus')): ?>
	<li class="social__item">
		<a target="_blank" rel="noopener" href="<?php echo Theme_Manager::get_instance()->get_social_network_url('google_plus'); ?>">
			<img src="<?php Theme_Manager::get_instance()->get_shared_asset('i-google-plus.svg'); ?>" alt="">
		</a>
	</li>
<?php endif; ?>

<?php if(Theme_Manager::get_instance()->get_social_network_url('pinterest')): ?>
	<li class="social__item">
		<a target="_blank" rel="noopener" href="<?php echo Theme_Manager::get_instance()->get_social_network_url('pinterest'); ?>">
			<img src="<?php Theme_Manager::get_instance()->get_shared_asset('i-pinterest.svg'); ?>" alt="">
		</a>
	</li>
<?php endif; ?>

<?php if(Theme_Manager::get_instance()->get_social_network_url('instagram')): ?>
	<li class="social__item">
		<a target="_blank" rel="noopener" href="<?php echo Theme_Manager::get_instance()->get_social_network_url('instagram'); ?>">
			<img src="<?php Theme_Manager::get_instance()->get_shared_asset('i-instagram.svg'); ?>" alt="">
		</a>
	</li>
<?php endif; ?>

<?php if(Theme_Manager::get_instance()->get_social_network_url('youtube')): ?>
	<li class="social__item">
		<a target="_blank" rel="noopener" href="<?php echo Theme_Manager::get_instance()->get_social_network_url('youtube'); ?>">
			<img src="<?php Theme_Manager::get_instance()->get_shared_asset('i-youtube.svg'); ?>" alt="">
		</a>
	</li>
<?php endif; ?>

<?php if(Theme_Manager::get_instance()->get_social_network_url('twitter')): ?>
	<li class="social__item">
		<a target="_blank" rel="noopener" href="<?php echo Theme_Manager::get_instance()->get_social_network_url('twitter'); ?>">
            <i class="fa fa-twitter"></i>
		</a>
	</li>
<?php endif; ?>