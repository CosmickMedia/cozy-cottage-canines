<?php

wp_nav_menu([
    'theme_location' => 'main_menu',
    'fallback_cb' => false,
    'menu_class' => 'mainNav__list',
    'container' => false,
    'depth' => 2,
    'menu_id' => 'petland-main-menu'
]);

?>