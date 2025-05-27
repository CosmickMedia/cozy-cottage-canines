<?php
include_once 'login-security.php';
define('THEME_LOCALE', 'petland');
define('THEME_URL', get_template_directory_uri());
define('THEME_ROUTE', get_template_directory());

include_once 'framework/class-theme-manager.php';

Theme_Manager::get_instance();

function fb_opengraph() {
        
    global $post;

    if(is_single()) {
        $img_src = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        $excerpt = get_the_content();
        print_r($post);
        ?>
    <!-- Start Facebook Open Graph Tags -->
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>
    <!-- End Facebook Open Graph Tags -->
    <?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);
