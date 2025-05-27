<!--footer-->
<footer class="footer">
  <div class="container container--reduce">
    <div class="footer__row">
      <div class="footer__col location">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 d-lg-none">
            <div class="text-center mb-3">
              <img src="<?php Theme_Manager::get_instance()->get_shared_asset('location.svg'); ?>"
                   alt="">
            </div>
          </div>

            <?php foreach (Theme_Manager::get_instance()->get_footer_locations() as $location): ?>
              <div class="col-xs-12 col-sm-12 col-md-4 location__group">
                <h5 class="location__city">
                  <img src="<?php Theme_Manager::get_instance()->get_shared_asset('map-marker.svg'); ?>"
                       alt=""/>
                    <?php echo $location['name'] ?>
                </h5>
                <ul class="social__list text-center text-lg-left">
                    <?php if ($location['Facebook']) : ?>
                      <li class="social__item">
                        <a target="_blank" rel="noopener"
                           href="<?php echo $location['Facebook'] ?>">
                          <img style="max-height: 14px;"
                               src="<?php Theme_Manager::get_instance()->get_shared_asset('i-facebook.svg') ?>"
                               alt="">
                        </a>
                      </li>
                    <?php endif; ?>

                    <?php if ($location['Pinterest']) : ?>
                      <li class="social__item">
                        <a target="_blank" rel="noopener"
                           href="<?php echo $location['Pinterest'] ?>">
                          <img style="max-height: 14px;"
                               src="<?php Theme_Manager::get_instance()->get_shared_asset('i-pinterest.svg') ?>"
                               alt="">
                        </a>
                      </li>
                    <?php endif; ?>

                    <?php if ($location['Instagram']) : ?>
                      <li class="social__item">
                        <a target="_blank" rel="noopener"
                           href="<?php echo $location['Instagram'] ?>">
                          <img style="max-height: 14px;"
                               src="<?php Theme_Manager::get_instance()->get_shared_asset('i-instagram.svg') ?>"
                               alt="">
                        </a>
                      </li>
                    <?php endif; ?>

                    <?php if ($location['Youtube']) : ?>
                      <li class="social__item">
                        <a target="_blank" rel="noopener"
                           href="<?php echo $location['Youtube'] ?>">
                          <img style="max-height: 14px;"
                               src="<?php Theme_Manager::get_instance()->get_shared_asset('i-youtube.svg') ?>"
                               alt="">
                        </a>
                      </li>
                    <?php endif; ?>

                    <?php if ($location['Twitter']) : ?>
                      <li class="social__item">
                        <a target="_blank" rel="noopener"
                           href="https://twitter.com/petlandflorida">
                          <i class="fa fa-twitter" style="font-size: 16px; margin-top: -2px;"></i>
                        </a>
                      </li>
                    <?php endif; ?>

                    <?php if ($location['Tiktok']) : ?>
                      <li class="social__item">
                        <a target="_blank" rel="noopener"
                           href="<?php echo $location['Tiktok'] ?>">
                          <i class="icon icon--tik-tok"></i>
                        </a>
                      </li>
                    <?php endif; ?>
                </ul>

                  <?php if ($location['address']): ?>
                    <p style="padding-left: 0;"
                       class="location__address"><a
                          href="https://www.google.com/maps/place/<?php echo preg_replace('/\s+/', '+', $location['address']) ?>"> <?php echo $location['address'] ?> </a>
                    </p>
                  <?php endif; ?>

                  <?php if ($location['phone']): ?>
                    <p style="padding-left: 0;" class="location__address">
                      <a href="tel:<?php echo $location['phone'] ?>">
                          <?php echo Theme_Manager::get_instance()->format_phone($location['phone']); ?>
                      </a>
                    </p>
                  <?php endif; ?>

                  <?php if ($location['hours']): ?>
                    <p class="location__hours">
                        <?php echo $location['days']; ?>
                      <br>
                      <img
                          src="https://www.petlandflorida.com/wp-content/themes/petland/styles/assets/images/shared/clock.svg"
                          alt=""> <?php echo $location['hours']; ?></p>
                  <?php endif; ?>

                  <?php if ($location['permit_number']): ?>
                    <p style="padding-left: 0; font-size: 0.625rem;" class="location__address">
                        <?php echo sprintf(__('Permit Number: %s', THEME_LOCALE), $location['permit_number']); ?>
                    </p>
                  <?php endif; ?>
              </div>
            <?php endforeach; ?>
          <div class="col-xs-12 col-sm-12 col-md-4 location__group">
            <h4 class="footNav__title">Our Company</h4>
              <?php get_template_part('template-parts/footer/main-menu'); ?>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="footer__sub">
    <div class="container container--reduce">
      <div class="footer__row--sb   text-center text-lg-lef">
        <h6 class="footer__privacy"><?php echo sprintf(__('© %s PETLAND FLORIDA', THEME_LOCALE), date('Y')); ?>
          <a href="<?php echo Theme_Manager::get_instance()->get_theme_page_link('privacy_policy_page'); ?>">
              <?php _e('PRIVACY POLICY', THEME_LOCALE) ?>
          </a>

            <?php if (Theme_Manager::get_instance()->get_theme_page_link('terms_and_conditions_page')): ?>
            <span> - </span>
              <a href="<?php echo Theme_Manager::get_instance()->get_theme_page_link('terms_and_conditions_page'); ?>">
                  <?php _e('TERMS AND CONDITIONS', THEME_LOCALE) ?>
              </a>
            <?php endif; ?>
        </h6>
        <img class="footer__image 	d-none d-lg-block"
             src="<?php Theme_Manager::get_instance()->get_shared_asset('logo-black.svg'); ?>" alt="">
      </div>

      <ul class="credit-card-logos">
        <li><img src="<?php echo THEME_URL; ?>/assets/images/Visa-2.png" alt=""></li>
        <li><img src="<?php echo THEME_URL; ?>/assets/images/Master-Card-2.png" alt=""></li>
        <li><img src="<?php echo THEME_URL; ?>/assets/images/Discover-2.png" alt=""></li>
        <li><img src="<?php echo THEME_URL; ?>/assets/images/AMEX-2.png" alt=""></li>
      </ul>
    </div>
  </div>
</footer>
