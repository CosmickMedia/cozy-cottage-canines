<?php

wp_nav_menu([
    'theme_location' => 'footer_menu',
    'fallback_cb' => false,
    'menu_class' => 'footNav__list',
    'container' => false,
    'depth' => 1,
    'menu_id' => 'petland-main-menu'
]);

?>