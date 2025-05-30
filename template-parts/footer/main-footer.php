<?php
$logo_url = get_template_directory_uri() . '/assets/images/cozy-logo.png';
$store    = Theme_Manager::get_instance()->get_store_information();
?>
<footer class="footer">
  <div class="container footer__container">
    <div class="footer__info">
      <div class="footer__logo">
        <img src="<?php echo esc_url( $logo_url ); ?>" alt="Cozy Canine Cottage" />
      </div>
      <div class="footer__business-info">
        <strong><?php echo esc_html( $store['name'] ); ?></strong><br>
        <span><?php echo esc_html( $store['address'] ); ?></span><br>
        <span><?php echo Theme_Manager::get_instance()->format_phone( $store['phone'] ); ?></span><br>
        <span><?php echo esc_html( $store['hours'] ); ?></span>
      </div>
    </div>
    <div class="footer__links">
      <?php get_template_part('template-parts/footer/main-menu'); ?>
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
</footer>
