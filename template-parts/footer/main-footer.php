<footer class="footer">
  <div class="container footer__container">
    <div class="footer__links">
      <img src="<?php Theme_Manager::get_instance()->get_image_assets('petland-logo.svg'); ?>" alt="">
      <h5 class="heading heading--h5">Our Company</h5>
        <?php get_template_part('template-parts/footer/main-menu'); ?>
    </div>
    <div class="footer__locations">
      <h5 class="heading heading--h5">Locations</h5>
        <?php foreach (Theme_Manager::get_instance()->get_footer_locations() as $location): ?>
          <div class="location">
            <h6 class="heading heading--h6"><?php echo $location['name'] ?></h6>
            <ul class="location__items">
              <li>
                <a
                    target="_blank"
                    href="https://www.google.com/maps/place/<?php echo preg_replace('/\s+/', '+', $location['address']) ?>"
                >
                    <?php echo $location['address'] ?>
                </a>
              </li>
              <li>
                <a href="tel:<?php echo $location['phone'] ?>">
                    <?php echo Theme_Manager::get_instance()->format_phone($location['phone']); ?>
                </a>
              </li>
            </ul>
            <span class="location__hour"><?php echo $location['hours'] ?></span>
            <div class="location__social">
                <?php if ($location['Facebook']) : ?>
                  <a href="<?php echo $location['Facebook'] ?>" target="_blank" class="social-link" rel="noopener">
                    <i class="icon icon--facebook"></i>
                  </a>
                <?php endif; ?>
                <?php if ($location['Pinterest']) : ?>
                  <a href="<?php echo $location['Pinterest'] ?>" target="_blank" class="social-link" rel="noopener">
                    <i class="icon icon--pinterest"></i>
                  </a>
                <?php endif; ?>
                <?php if ($location['Instagram']) : ?>
                  <a href="<?php echo $location['Instagram'] ?>" target="_blank" class="social-link" rel="noopener">
                    <i class="icon icon--instagram"></i>
                  </a>
                <?php endif; ?>
                <?php if ($location['Youtube']) : ?>
                  <a href="<?php echo $location['Youtube'] ?>" target="_blank" class="social-link" rel="noopener">
                    <i class="icon icon--youtube"></i>
                  </a>
                <?php endif; ?>
                <?php if ($location['twitter']) : ?>
                  <a href="<?php echo $location['twitter'] ?>" target="_blank" class="social-link" rel="noopener">
                    <i class="icon icon--twitter"></i>
                  </a>
                <?php endif; ?>
                <?php if ($location['Tiktok']) : ?>
                  <a href="<?php echo $location['Tiktok'] ?>" target="_blank" class="social-link" rel="noopener">
                    <i class="icon icon--tik-tok"></i>
                  </a>
                <?php endif; ?>
				
            </div>
			  
          </div>
        <?php endforeach; ?>
    </div>
	  <img src="https://www.petlandflorida.com/wp-content/uploads/2024/11/petland-franchise.png" width="200" alt="Petland">
    <div class="footer__social">
        <?php get_template_part('template-parts/common/social-links'); ?>
    </div>
    
    </div>
    <div class="footer__legal">
      <div class="footer__payments">
        <img src="<?php Theme_Manager::get_instance()->get_image_assets('i-visa.png'); ?>" alt="">
        <img src="<?php Theme_Manager::get_instance()->get_image_assets('i-mastercard.png'); ?>" alt="">
        <img src="<?php Theme_Manager::get_instance()->get_image_assets('i-discover.png'); ?>" alt="">
        <img src="<?php Theme_Manager::get_instance()->get_image_assets('i-american-express.png'); ?>" alt="">
      </div>
      <span>
        <?php echo sprintf(__('© %s', THEME_LOCALE), date('Y')); ?>
        <a href="<?php echo Theme_Manager::get_instance()->get_theme_page_link('privacy_policy_page'); ?>">
            <?php _e('PRIVACY POLICY', THEME_LOCALE) ?>
        </a>
          <?php if (Theme_Manager::get_instance()->get_theme_page_link('terms_and_conditions_page')): ?>
            <span> - </span>
            <a href="<?php echo Theme_Manager::get_instance()->get_theme_page_link('terms_and_conditions_page'); ?>">
              <?php _e('TERMS AND CONDITIONS', THEME_LOCALE) ?>
            </a>
          <?php endif; ?>
      </span>
    </div>
  </div>
</footer>