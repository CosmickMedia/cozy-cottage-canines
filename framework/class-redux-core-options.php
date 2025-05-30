<?php

require_once 'redux-framework/ReduxCore/framework.php';

class Redux_Core_Options
{

    private $redux;
    private $theme_locale;
    private $sections;
    private $args = [];

    public function __construct($theme_locale)
    {
        $this->theme_locale = $theme_locale;
        add_action('init', [$this, 'init_settings']);
    }

    public function init_settings()
    {
        $this->set_redux_args();
        $this->set_redux_sections();

        $this->redux = new ReduxFramework($this->sections, $this->args);
    }

    private function set_redux_args()
    {
        $theme = wp_get_theme();
        $theme_name = $theme->get('Name');
        $theme_version = $theme->get('Version');

        $this->args = [
            'opt_name' => "{$this->theme_locale}-settings",
            'display_name' => $theme_name,
            'display_version' => $theme_version,
            'menu_type' => 'menu',
            'allow_sub_menu' => true,
            'menu_title' => sprintf(__('%s Settings'), $theme_name),
            'page_title' => sprintf(__('%s Settings'), $theme_name),
            'admin_bar' => true,
            'admin_bar_icon' => 'dashicons-portfolio',
            'dev_mode' => WP_DEBUG,
            'customizer' => true
        ];
    }

    private function set_redux_sections()
    {
        $this->add_social_networks();
        $this->add_theme_settings();
        $this->add_petkey_options();
        $this->add_k9_options();
        $this->add_footer_options();
    }

    private function add_social_networks()
    {
        $this->sections[] = [
            'title' => __('Social Networks', $this->theme_locale),
            'desc' => __('', $this->theme_locale),
            'icon' => 'el el-network',
            'fields' => [
                [
                    'id' => 'facebook',
                    'type' => 'text',
                    'title' => __('Facebook', $this->theme_locale),
                    'desc' => __('Include http://...', $this->theme_locale)
                ],
                [
                    'id' => 'google_plus',
                    'type' => 'text',
                    'title' => __('Google +', $this->theme_locale),
                    'desc' => __('Include http://...', $this->theme_locale)
                ],
                [
                    'id' => 'pinterest',
                    'type' => 'text',
                    'title' => __('Pinterest', $this->theme_locale),
                    'desc' => __('Include http://...', $this->theme_locale)
                ],
                [
                    'id' => 'instagram',
                    'type' => 'text',
                    'title' => __('Instagram', $this->theme_locale),
                    'desc' => __('Include http://...', $this->theme_locale)
                ],
                [
                    'id' => 'youtube',
                    'type' => 'text',
                    'title' => __('Youtube', $this->theme_locale),
                    'desc' => __('Include http://...', $this->theme_locale)
                ],
                [
                    'id' => 'twitter',
                    'type' => 'text',
                    'title' => __('Twitter', $this->theme_locale),
                    'desc' => __('Include http://...', $this->theme_locale)
                ],
            ]
        ];
    }

    private function add_theme_settings()
    {
        $this->sections[] = [
            'title' => __('Theme Settings', $this->theme_locale),
            'desc' => __('Settings', $this->theme_locale),
            'icon' => 'el el-cog',
            'fields' => [
                [
                    'id' => 'header',
                    'type' => 'media',
                    'title' => __('Header Logo', $this->theme_locale),
                ],
                [
                    'id' => 'info_mail',
                    'type' => 'text',
                    'title' => __('Info e-mail', $this->theme_locale),
                    'desc' => __('Introduce an e-mail to show in the page', $this->theme_locale)
                ],
                [
                    'id' => 'contact_us_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Contact Us Page', $this->theme_locale),
                ],
                [
                    'id' => 'products_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Products Page', $this->theme_locale),
                ],
                [
                    'id' => 'puppies_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Puppies Page', $this->theme_locale),
                ],
                [
                    'id' => 'financing_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Financing Page', $this->theme_locale),
                ],
                [
                    'id' => 'privacy_policy_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Privacy Policy Page', $this->theme_locale),
                ],
                [
                    'id' => 'terms_and_conditions_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Terms & conditions Page', $this->theme_locale),
                ],
                [
                    'id' => 'thank_you_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Thank You Page', $this->theme_locale),
                ],
                [
                    'id' => 'thank_you_app_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Thank You App Page', $this->theme_locale),
                ],
                [
                    'id' => 'available_puppies_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Available Puppies Page', $this->theme_locale),
                ],
                [
                    'id' => 'why_petland_content_page',
                    'type' => 'select',
                    'data' => 'pages',
                    'title' => __('Why Cozy Canine Cottage Content Page', $this->theme_locale),
                ],
                [
                    'id' => 'blog_desktop_bg',
                    'type' => 'media',
                    'title' => __('Blog Desktop Image', $this->theme_locale),
                ],
                [
                    'id' => 'blog_description',
                    'type' => 'textarea',
                    'title' => __('Intro blog description', $this->theme_locale),
                ],
                [
                    'id' => 'before_closing_header_scripts',
                    'type' => 'textarea',
                    'title' => __('Before Closing Header Scripts', $this->theme_locale),
                ],
                [
                    'id' => 'after_closing_header_scripts',
                    'type' => 'textarea',
                    'title' => __('After Closing Header Scripts', $this->theme_locale),
                ],
                [
                    'id' => 'before_closing_footer_scripts',
                    'type' => 'textarea',
                    'title' => __('Before Closing Footer Scripts', $this->theme_locale),
                ],
                [
                    'id' => 'thank_you_page_script',
                    'type' => 'textarea',
                    'title' => __('Thank You Page Script', $this->theme_locale),
                ],
                [
                    'id' => 'form_blurb_message',
                    'type' => 'editor',
                    'title' => __('Form Blurb Message', $this->theme_locale),
                ],
                [
                    'id' => 'employment_form_receipts',
                    'type' => 'multi_text',
                    'title' => __('Employment Form Recipients', $this->theme_locale),
                ],
                [
                    'id' => 'employment_form_subject',
                    'type' => 'text',
                    'title' => __('Employment Form Subject', $this->theme_locale),
                ]
            ]
        ];
    }

    private function add_petkey_options()
    {
        $this->sections[] = [
            'title' => __('PetKey', $this->theme_locale),
            'desc' => __('PetKey', $this->theme_locale),
            'icon' => 'el el-cog',
            'fields' => [
                [
                    'id' => 'petkey_api_key',
                    'type' => 'multi_text',
                    'title' => 'PetKey API Keys',
                    'desc' => 'Use this format LOCATION_NAME|API_KEY|SHOPWINDOW_ACCOUNT|SHOPWINDOW_FORM_ID'
                ],
                [
                    'id' => 'petkey_pet_types',
                    'type' => 'multi_text',
                    'title' => 'PetKey Pet Types',
                    'desc' => 'Use this format PET_KEY_VALUE|PET_TYPE_NAME'
                ],
                [
                    'id' => 'petkey_genders',
                    'type' => 'multi_text',
                    'title' => 'PetKey Pet Genders',
                    'desc' => 'Use this format PET_KEY_VALUE|PET_GENDER_NAME'
                ],
                [
                    'id' => 'shopwindow_contact_form',
                    'type' => 'text',
                    'title' => __('Shopwindow Contact Form', $this->theme_locale),
                    'desc' => 'Use this format SHOPWINDOW_ACCOUNT|SHOPWINDOW_FORM_ID'
                ],
                [
                    'id' => 'shopwindow_use',
                    'type' => 'text',
                    'title' => __('Use Shopwindow', $this->theme_locale),
                    'default'  => ''
                ]
            ]
        ];
    }

    private function add_footer_options()
    {
        $this->sections[] = [
            'title' => __('Footer', $this->theme_locale),
            'desc' => __('Footer', $this->theme_locale),
            'icon' => 'el el-cog',
            'fields' => [
                [
                    'id' => 'footer_location',
                    'type' => 'multi_text',
                    'title' => 'Locations',
                    'desc' => 'Use this format LOCATION_NAME|LOCATION_ADDRESS|LOCATION_HOURS'
                ]
            ]
        ];
    }

    private function add_k9_options()
    {
        $this->sections[] = [
            'title' => __('K9 Genetics', $this->theme_locale),
            'desc' => __('', $this->theme_locale),
            'icon' => 'el el-cog',
            'fields' => [
                [
                    'id' => 'k9_api_key',
                    'type' => 'text',
                    'title' => 'K9 API Key',
                ],
                [
                    'id' => 'k9_api_url',
                    'type' => 'text',
                    'title' => 'K9 Genetics API Url'
                ]
            ]
        ];
    }
}