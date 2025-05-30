<?php

define('THEME_LOCALE', 'petland');
define('THEME_URL', get_template_directory_uri());
define('THEME_ROUTE', get_template_directory());

include_once 'framework/class-theme-manager.php';

Theme_Manager::get_instance();
