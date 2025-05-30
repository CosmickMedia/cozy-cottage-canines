<?php

require_once 'reactjs/class-reactjs-templates.php';
require_once 'class-petkey-api.php';
require_once 'class-shopwindow-api.php';
require_once 'class-redux-core-options.php';
require_once 'class-theme-rest-api.php';

class Theme_Manager
{

    private static $class_instance;
    protected $theme_locale;
    protected $theme_url;
    protected $theme_path;

    private $existing_categories;
    private $remote_categories;

    private $existing_tags;
    private $remote_tags;

    public function __construct()
    {
        $this->theme_path = THEME_ROUTE;
        $this->theme_locale = THEME_LOCALE;
        $this->theme_url = THEME_URL;

        $this->custom_actions();
        $this->zoho_auth_callback();
        $this->theme_hooks();
        $this->initialize_helper_classes();
    }

    /**
     * Singleton Instance
     *
     * @return Theme_Manager
     */
    public static function get_instance()
    {

        if (self::$class_instance === null) {
            self::$class_instance = new self();
        }

        return self::$class_instance;
    }

    private function initialize_helper_classes()
    {
        new ReactJs_Templates();
        new Redux_Core_Options($this->theme_locale);
        new Theme_Rest_Api();
    }

    /**
     * @param $option
     *
     * @return mixed
     */
    public function get_theme_option($option)
    {
        global ${"{$this->theme_locale}_settings"};
        $settings = ${"{$this->theme_locale}_settings"};

        if (isset($settings[$option])) {
            return $settings[$option];
        }

        return false;
    }

    public function get_theme_page_link($page)
    {
        $page_id = $this->get_theme_option($page);
        if ($page_id) {
            return get_the_permalink($page_id);
        }

        return null;
    }

    /**
     * Register Required Theme Hooks
     */
    private function theme_hooks()
    {

        add_action('after_setup_theme', [$this, 'theme_setup']);

        add_action('init', [$this, 'register_query_vars'], 10);
        add_action('init', [$this, 'rewrite_rules'], 10);

        add_filter('template_include', [$this, 'pet_template']);
        add_filter('template_include', [$this, 'breed_template']);
        add_filter('template_include', [$this, 'available_puppies_filter_template']);

        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_front_scripts']);

        add_filter('nav_menu_submenu_css_class', [$this, 'sub_menu_custom_item_class'], 10, 3);
        add_filter('nav_menu_css_class', [$this, 'menu_item_class'], 10, 4);
    }

    /**
     * Temp actions to fill
     */
    private function custom_actions()
    {
        if (
            isset($_REQUEST['custom_action'])
            && $_REQUEST['custom_action']) {
            switch ($_REQUEST['custom_action']) {
                case 'import_posts':
                    add_action('init', [$this, 'import_posts']);
                    break;
                case 'import_categories':
                    add_action('init', [$this, 'import_categories']);
                    break;
                case 'import_tags':
                    add_action('init', [$this, 'import_tags']);
                    break;
            }

        }
    }

    private function zoho_auth_callback()
    {
        if (isset($_REQUEST['zoho_auth_callback'])) {
            ZCRMRestClient::initialize();
            $oAuthClient = ZohoOAuth::getClientInstance();
            $grantToken = $_REQUEST['code'];
            $oAuthTokens = $oAuthClient->generateAccessToken($grantToken);
            echo '<pre>';
            print_r($oAuthTokens);
            die();
        }
    }

    public function import_tags()
    {
        set_time_limit(0);
        echo '<pre>';
        require_once(ABSPATH . '/wp-admin/includes/taxonomy.php');

        $this->get_remote_tags();
        $tags_added = [];
        foreach ($this->remote_tags as $tag) {

            $tags_added[] = wp_insert_category([
                'category_nicename' => $tag->slug,
                'cat_name' => $tag->name,
                'taxonomy' => 'post_tag',
            ]);

        }

        print_r($tags_added);

        die();
    }

    public function import_categories()
    {
        set_time_limit(0);
        echo '<pre>';
        require_once(ABSPATH . '/wp-admin/includes/taxonomy.php');

        $this->get_remote_categories();
        $cats_added = [];
        foreach ($this->remote_categories as $category) {

            if ($category->slug != 'uncategorized') {
                $cats_added[] = wp_insert_category([
                    'category_nicename' => $category->slug,
                    'cat_name' => $category->name,
                    'taxonomy' => 'category',
                ]);
            }

        }

        print_r($cats_added);

        die();
    }

    public function import_posts()
    {
        set_time_limit(0);
        echo '<pre>';

        $response = $this->curl_request('https://petstorekansas.com/wp-json/wp/v2/posts', 'GET');

        $posts = $response['body'];

        $header_items = [];
        $headers = explode("\n", $response['headers']);

        foreach ($headers as $line) {
            $item = explode(':', $line, 2);
            $header_items[$item[0]] = isset($item[1]) ? $item[1] : '';
        }

        if ($header_items['X-WP-TotalPages'] > 1) {
            $total_pages = $header_items['X-WP-TotalPages'];
            for ($page = 2; $page <= $total_pages; $page++) {
                $page_response = $this->curl_request("https://petstorekansas.com/wp-json/wp/v2/posts?page={$page}", 'GET');
                $posts = array_merge($posts, $page_response['body']);
            }
        }

        $this->existing_tags = get_terms([
            'taxonomy' => 'post_tag',
            'hide_empty' => false,
        ]);

        $this->existing_categories = get_terms([
            'taxonomy' => 'category',
            'hide_empty' => false,
        ]);

        $this->get_remote_categories();
        $this->get_remote_tags();

        $posts_info = [];
        foreach ($posts as $post) {

            $has_categories = count($post->categories);
            $has_tags = count($post->tags);
            $has_image = !!$post->featured_media;

            $posts_info[] = [
                'slug' => $post->slug,
                'date' => $post->date,
                'date_gmt' => $post->date_gmt,
                'title' => $post->title->rendered,
                'excerpt' => $post->excerpt->rendered,
                'content' => preg_replace('/<img[^>]+\>/i', '', $post->content->rendered),
                'categories' => $has_categories ? $this->get_post_categories($post->categories) : [],
                'tags' => $has_tags ? $this->get_post_tags($post->tags) : [],
                'image' => $has_image ? $this->get_post_image($post->featured_media) : '',
            ];
        }

        foreach ($posts_info as $post) {
            $this->insert_or_update_post($post);
        }

        die();
    }

    private function insert_or_update_post($post)
    {
        $existing_post = $this->get_post_by_slug($post['slug']);

        if ($existing_post) {
            $post_id = $existing_post->ID;
            wp_update_post([
                'ID' => $existing_post['ID'],
                'post_title' => $post['title'],
                'post_date' => $post['date'],
                'post_date_gmt' => $post['date_gmt'],
                'post_content' => $post['content'],
                'post_excerpt' => $post['excerpt'],
                'post_status' => 'publish',
                'comment_status' => 'closed',
                'post_name' => $post['slug'],
                'post_category' => $post['categories'],
                'tags_input' => $post['tags'],
            ]);

        } else {
            $post_id = wp_insert_post([
                'post_title' => $post['title'],
                'post_date' => $post['date'],
                'post_date_gmt' => $post['date_gmt'],
                'post_content' => $post['content'],
                'post_excerpt' => $post['excerpt'],
                'post_status' => 'publish',
                'comment_status' => 'closed',
                'post_name' => $post['slug'],
                'post_category' => $post['categories'],
                'tags_input' => $post['tags'],
            ]);
        }

        if ($post_id && $post['image']) {
            $this->add_post_thumbnail($post_id, $post['image'], $post['title']);
        }

        echo "{$post['title']} added";
    }

    private function add_post_thumbnail($post_id, $image_url, $title)
    {
        if (!has_post_thumbnail($post_id)) {

            if (!function_exists('media_sideload_image')) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/media.php');
            }

            $attachment_id = media_sideload_image($image_url, $post_id, $title, 'id');

            if (!is_wp_error($attachment_id)) {
                set_post_thumbnail($post_id, $attachment_id);
            }
        }
    }

    private function get_post_by_slug($slug)
    {
        $posts = get_posts([
            'name' => $slug,
            'post_type' => 'post',
            'post_status' => 'publish',
            'numberposts' => 1
        ]);

        return $posts ? $posts[0] : null;
    }

    private function get_remote_categories()
    {
        $categories = $this->curl_request("https://petstorekansas.com/wp-json/wp/v2/categories?per_page=100", 'GET');

        $this->remote_categories = $categories['body'];
    }

    private function get_remote_tags()
    {
        $tags = $this->curl_request("https://petstorekansas.com/wp-json/wp/v2/tags?per_page=100", 'GET');

        $this->remote_tags = $tags['body'];
    }

    private function get_post_categories($category_ids)
    {
        $categories = [];
        $local_categories = [];

        foreach ($this->remote_categories as $cat) {
            if (in_array($cat->id, $category_ids)) {
                $categories[] = $cat->slug;
            }
        }

        foreach ($this->existing_categories as $existing_category) {
            if (in_array($existing_category->slug, $categories)) {
                $local_categories[] = $existing_category->term_id;
            }
        }

        return $local_categories;
    }

    private function get_post_tags($tag_ids)
    {
        $tags = [];
        $local_tags = [];

        foreach ($this->remote_tags as $tag) {
            if (in_array($tag->id, $tag_ids)) {
                $tags[] = $tag->slug;
            }
        }

        foreach ($this->existing_tags as $existing_tag) {
            if (in_array($existing_tag->slug, $tags)) {
                $local_tags[] = $existing_tag->term_id;
            }
        }

        return $local_tags;
    }

    private function get_post_image($media_id)
    {
        $response = $this->curl_request("https://petstorekansas.com/wp-json/wp/v2/media/{$media_id}", 'GET');

        $image = $response['body'];

        return $image->guid->rendered;
    }

    public function curl_request($url, $type, $data = null)
    {
        $curl = curl_init();

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_VERBOSE => true,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ]
        ];

        if ($data) {
            $options[CURLOPT_POSTFIELDS] = json_encode($data);
        }

        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        list($header, $body) = explode("\r\n\r\n", $response, 2);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            return [
                'headers' => $header,
                'body' => json_decode($body)
            ];
        }
    }

    public function get_similar_posts($post_id)
    {
        $categories = wp_get_post_categories($post_id);
        if ($categories) {
            $args = [
                'category__in' => $categories,
                'category__not_in' => get_option('default_category'),
                'post__not_in' => [$post_id],
            ];
            return $this->find_posts_by_post_type('post', 3, $args);
        }
    }

    /**
     * @param $phone
     * @return string
     */
    public function format_phone($phone)
    {
        $phone = str_replace(" ", "", $phone);
        return substr($phone, 0, 3) . "-" . substr($phone, 3, 3) . "-" . substr($phone, 6);
    }


    /**
     * Check if requested url if for pet details
     *
     * @param $template
     *
     * @return string
     */
    public function pet_template($template)
    {
        if ($this->is_pet_page()) {
            return $this->get_theme_path('templates/single-pet');
        }

        return $template;
    }

    /**
     * Check if requested url if for breed details
     *
     * @param $template
     *
     * @return string
     */
    public function breed_template($template)
    {
        if ($this->is_breed_page()) {
            return $this->get_theme_path('templates/single-breed');
        }

        return $template;
    }

    /**
     * Check if requested url if for available puppies
     *
     * @param $template
     *
     * @return string
     */
    public function available_puppies_filter_template($template)
    {

        if ($this->is_available_puppies_filter_template()) {
            $filter_type = get_query_var('pet_filter_type');


            if (in_array($filter_type, ['location', 'breed', 'gender', 'type', 'multiple'])) {
                return $this->get_theme_path('templates/puppies');
            }
        }

        return $template;
    }

    public function available_puppies_page_query($query)
    {
        if ($this->is_available_puppies_filter_template()) {
            $filter_type = get_query_var('pet_filter_type');

            if (in_array($filter_type, ['location', 'breed', 'gender', 'type', 'multiple'])) {

                $query->set('p', Theme_Manager::get_instance()->get_theme_option('available_puppies_page'));
                $query->set('post_type', 'page');
            }
        }
    }

    public function get_available_puppies_page(): WP_Query {
        $page_id = Theme_Manager::get_instance()->get_theme_option('available_puppies_page');

        return new WP_Query(['p' => $page_id,  'post_type' => 'page']);
    }

    /**
     * @return bool
     */
    public function is_pet_page()
    {
        return !!get_query_var("single_pet");
    }

    /**
     * @return bool
     */
    public function is_breed_page()
    {
        return !!get_query_var("single_breed");
    }

    /**
     * @return bool
     */
    public function is_available_puppies_filter_template()
    {
        return !!get_query_var('pet_filter');
    }

    /**
     * Register needed query vars for out custom templates
     */
    public function register_query_vars()
    {
        /**
         * Pet details Vars
         */
        add_rewrite_tag('%single_pet%', '([^&]+)');
        add_rewrite_tag('%pet_id%', '([^&]+)');
        add_rewrite_tag('%pet_location%', '([^&]+)');

        /**
         * Available Puppies per breed id
         */
        add_rewrite_tag('%breed_filter%', '([^&]+)');

        /**
         * Available Puppies Vars
         */
        add_rewrite_tag('%pet_filter%', '([^&]+)');
        add_rewrite_tag('%pet_filter_type%', '([^&]+)');
        add_rewrite_tag('%pet_filter_value%', '([^&]+)');
        add_rewrite_tag('%pet_location%', '([^&]+)');
        add_rewrite_tag('%pet_type%', '([^&]+)');
        add_rewrite_tag('%pet_breed%', '([^&]+)');
        add_rewrite_tag('%pet_gender%', '([^&]+)');

        /**
         * Breed Details
         */
        add_rewrite_tag('%single_breed%', '([^&]+)');
        add_rewrite_tag('%breed_id%', '([^&]+)');
    }

    /**
     * Add rewrite rules for out templates
     */
    public function rewrite_rules()
    {
        /**
         * Pet details rewrite rules
         */
        add_rewrite_rule(
            "pet/detail/([^/]*)/([0-9]+)/?",
            'index.php?single_pet=true&pet_location=$matches[1]&pet_id=$matches[2]',
            'top'
        );

        /**
         * The next one is add the breed to the URL
         */
        //add_rewrite_rule("pet/detail/([^/]*)/([^/]*)/([0-9]+)/?", 'index.php?single_pet=true&pet_location=$matches[2]&pet_id=$matches[3]', 'top');

        /**
         * Available puppies by breed and status
         */
        add_rewrite_rule("found-home-puppies/([^/]*)/?", 'index.php?breed_filter=true&breed_id=$matches[1]', 'top');

        /**
         * Rewrite rule for breed details
         */
        add_rewrite_rule("breeds/([^/]*)/?", 'index.php?single_breed=true&breed_id=$matches[1]', 'top');


        $this->available_puppies_rewrite_rules();
    }

    public function available_puppies_rewrite_rules()
    {
        /**
         * Location Filter
         */
        add_rewrite_rule(
            'available-puppies/location/([^/]*)/?',
            'index.php?pet_filter=true&pet_filter_type=location&pet_location=$matches[1]',
            'top'
        );

        /**
         * Breed Filter
         */
        add_rewrite_rule(
            'available-puppies/breed/([^/]*)/?',
            'index.php?pet_filter=true&pet_filter_type=breed&pet_breed=$matches[1]',
            'top'
        );

        /**
         * Gender Filter
         */
        add_rewrite_rule(
            'available-puppies/gender/([^/]*)/?',
            'index.php?pet_filter=true&pet_filter_type=gender&pet_gender=$matches[1]',
            'top'
        );

        /**
         * Pet Type Filter
         */
        add_rewrite_rule(
            'available-puppies/pet-type/([^/]*)/?',
            'index.php?pet_filter=true&pet_filter_type=type&pet_type=$matches[1]',
            'top'
        );

        /**
         * Multiple Filter
         */
        add_rewrite_rule(
            'available-puppies/([^/]*)/([^/]*)/([^/]*)/([^/]*)/?',
            'index.php?pet_filter=true&pet_filter_type=multiple&pet_location=$matches[1]&pet_type=$matches[2]&pet_breed=$matches[3]&pet_gender=$matches[4]',
            'top'
        );

        /**
         * Multiple Filter
         */
        add_rewrite_rule(
            'available-puppies/([^/]*)/([^/]*)/([^/]*)/?',
            'index.php?pet_filter=true&pet_filter_type=multiple&pet_location=$matches[1]&pet_type=$matches[2]&pet_breed=$matches[3]',
            'top'
        );

        /**
         * Multiple Filter
         */
        add_rewrite_rule(
            'available-puppies/([^/]*)/([^/]*)/?',
            'index.php?pet_filter=true&pet_filter_type=multiple&pet_location=$matches[1]&pet_type=$matches[2]',
            'top'
        );

        /**
         * Multiple Filter
         */
        add_rewrite_rule(
            'available-puppies/([^/]*)/?',
            'index.php?pet_filter=true&pet_filter_type=multiple&pet_location=$matches[1]',
            'top'
        );
    }

    /**
     * @param $classes
     * @param $args
     * @param $depth
     *
     * @return array
     */
    public function sub_menu_custom_item_class($classes, $args, $depth)
    {
        $classes[] = 'mainNav__sub';
        return $classes;
    }

    /**
     * @param $classes
     * @param $item
     * @param $args
     * @param $depth
     *
     * @return array
     */
    public function menu_item_class($classes, $item, $args, $depth)
    {
        if ($depth === 0) {
            $classes[] = 'mainNav__item';
        } elseif ($depth === 3) {
            $classes[] = 'footNav__item';
        }
        return $classes;
    }

    /**
     * Add Styles and Scripts used in the Wordpress Admin
     */
    public function enqueue_admin_scripts()
    {

        wp_register_style('theme-admin-style', $this->get_theme_url('assets/css/admin-styles.css'));
        wp_enqueue_style('theme-admin-style');

        wp_register_script('theme-admin-script', $this->get_theme_url('assets/js/admin-script.js'), ['jquery'], '1.0', true);
        wp_enqueue_script('theme-admin-script');

        $theme_admin_vars = [
            'get_vars' => $_GET,
            'post_vars' => $_POST,
            'screen' => get_current_screen(),
        ];

        wp_localize_script('theme-admin-script', 'petland_admin_vars', $theme_admin_vars);
    }

    /**
     * Add styles and scripts used by the theme
     */
    public function enqueue_front_scripts()
    {

        $this->enqueue_styles();
        $this->enqueue_scripts();
    }

    /**
     * Add styles used by the theme
     */
    private function enqueue_styles()
    {

        wp_register_style(
            'main-theme-style',
            $this->get_theme_url('style.css'),
            null,
            '2023-12-04'
        );
        wp_enqueue_style('main-theme-style');

        wp_register_style('theme-style', $this->get_theme_url('styles/dist/main.css'), null, '2023-12-10');
        wp_enqueue_style('theme-style');
    }

    /**
     * Add scripts and styles used by the theme
     */
    private function enqueue_scripts()
    {
        /**
         * Main Theme Script
         */
        wp_register_script('main-script-js', $this->get_theme_url('styles/dist/main.js'), null, '2019-08-22');
        wp_enqueue_script('main-script-js');
    }

    public function get_finance_content()
    {
        $finance_page = $this->get_theme_option('financing_page');
        $page = get_post((int)$finance_page);
        remove_filter('the_content', 'wpautop');
        $content = apply_filters("the_content", $page->post_content);
        add_filter('the_content', 'wpautop');
        return $content;
    }

    public function get_footer_locations()
    {
        $locations_raw = $this->get_theme_option('footer_location');
        $locations = [];

        if (is_array($locations_raw) || is_object($locations_raw)) {
            foreach ($locations_raw as $location) {
                $exploded_value = explode('|', $location);
                $locations[] = [
                    'name' => $exploded_value[0],
                    'address' => $exploded_value[1],
                    'phone' => $exploded_value[2],
                    'hours' => $exploded_value[3],
                    'Facebook' => isset($exploded_value[4]) ? $exploded_value[4] : '',
                    'Pinterest' => isset($exploded_value[5]) ? $exploded_value[5] : '',
                    'Instagram' => isset($exploded_value[6]) ? $exploded_value[6] : '',
                    'Youtube' => isset($exploded_value[7]) ? $exploded_value[7] : '',
                    'twitter' => isset($exploded_value[8]) ? $exploded_value[8] : '',
                    'Tiktok' => isset($exploded_value[9]) ? $exploded_value[9] : '',
                ];
            }
        }

        return $locations;
    }

    /**
     * Retrieve WooCommerce store details or return placeholder information.
     *
     * @return array
     */
    public function get_store_information()
    {
        $store = [];

        $store['name'] = get_bloginfo('name');

        $address_parts   = [];
        $address_1       = get_option('woocommerce_store_address');
        $address_2       = get_option('woocommerce_store_address_2');
        $city            = get_option('woocommerce_store_city');
        $state           = get_option('woocommerce_store_state');
        $postcode        = get_option('woocommerce_store_postcode');

        if ($address_1) {
            $address_parts[] = $address_1;
        }
        if ($address_2) {
            $address_parts[] = $address_2;
        }

        $city_line = trim("$city $state $postcode");
        if ($city_line) {
            $address_parts[] = $city_line;
        }

        $store['address'] = $address_parts ? implode(', ', $address_parts) : '1234 Placeholder St, City, ST 00000';

        $store['phone'] = get_option('woocommerce_store_phone');
        if (!$store['phone']) {
            $store['phone'] = '5555555555';
        }

        $store['hours'] = 'Mon - Fri: 9am - 5pm';

        return $store;
    }

    public function get_social_network_url($social_network)
    {
        return $this->get_theme_option($social_network);
    }

    /**
     * Get Assets URL relative to the theme folder.
     *
     * @param $url
     *
     * @return string
     */
    private function get_theme_url($url)
    {
        return "$this->theme_url/$url";
    }

    /**
     * Get Assets URL relative to the theme folder.
     *
     * @param $url
     *
     * @return string
     */
    private function get_theme_path($file)
    {
        return "{$this->theme_path}/{$file}.php";
    }

    /**
     * @param $image_name
     */
    public function get_image_assets($image_name)
    {
        echo "{$this->get_theme_url('styles/assets/images')}/{$image_name}";
    }

    /**
     * @param $file_name
     */
    public function get_icon_asset($file_name)
    {
        echo "{$this->get_theme_url('styles/assets/images/icons')}/$file_name";
    }

    /**
     * @param $post_type
     * @param null $posts_per_page
     * @param null $additional_args
     *
     * @return WP_Query
     */
    public function find_posts_by_post_type($post_type, $posts_per_page = null, $additional_args = null)
    {
        global $paged;

        if (empty($paged)) {
            $paged = 1;
        }

        $query = array(
            'post_type' => $post_type
        );

        if ($paged > 1) {
            $query['paged'] = $paged;
        }

        if ($posts_per_page != null) {
            $query['posts_per_page'] = $posts_per_page;
        }

        if ($additional_args != null) {
            $query = array_merge($query, $additional_args);
        }

        $result = new WP_Query($query);
        return $result;
    }

    /**
     * @param $post_id
     *
     * @return WP_Query
     */
    public function get_related_pots($post_id)
    {

        $categories = wp_get_post_categories($post_id);

        if ($categories) {

            $args = [
                "category__in" => $categories,
                "category__not_in" => get_option("default_category"),
                "post__not_in" => [$post_id],
            ];

            return $this->find_posts_by_post_type("post", 3, $args);
        }
    }

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    public function theme_setup()
    {

        /**
         * Make theme available for translation.
         */
        load_theme_textdomain($this->theme_locale);

        /**
         * Add default posts and comments RSS feed links to head.
         */
        add_theme_support('automatic-feed-links');

        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /**
         * Enable support for Post Thumbnails on posts and pages.
         */
        add_theme_support('post-thumbnails');
        add_image_size('blog-thumbnail', 510, 261, true);
        add_image_size('blog-featured-image', 1050, 250, false);

        /**
         * Register Navigation Menus
         */
        register_nav_menus([
            'main_menu' => __('Main Menu', $this->theme_locale),
            'footer_menu' => __('Footer Menu', $this->theme_locale),
        ]);

        /**
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        /**
         * Add theme support for Custom Logo.
         *
         * @todo Put real values here.
         */
        add_theme_support('custom-logo', [
            'width' => 250,
            'height' => 250,
            'flex-width' => 250,
        ]);

        /**
         * Add theme support for selective refresh for widgets.
         */
        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('align-wide');
    }
}
