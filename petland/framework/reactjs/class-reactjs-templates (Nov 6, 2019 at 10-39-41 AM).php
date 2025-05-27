<?php

class ReactJs_Templates {

	protected $reactjs_url;
	protected $theme_url;
	protected $theme_locale;

	public function __construct() {
		$this->wp_hooks();
		$this->reactjs_url = THEME_URL.'/framework/reactjs';
		$this->theme_url= THEME_URL;
	}

	public function wp_hooks() {
		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
	}

	public function enqueue_scripts() {

		/**
		 * ReactJs Scripts
		 */
		wp_register_script('petland-reactjs', $this->get_reactjs_url('js/public.min.js'), ['jquery'], '2019-03-16', true);
		wp_enqueue_script('petland-reactjs');

		$script_vars = [
			'theme_url' => $this->theme_url,
			'thank_you_page_url' => Theme_Manager::get_instance()->get_theme_page_link('thank_you_page'),
			'thank_you_employment_page' => Theme_Manager::get_instance()->get_theme_page_link('thank_you_employment_page'),
			'pet_details_url' => home_url('pet/detail/:location/:petId'),
			'pet_breed_details_url' => home_url('pet/detail/:breedId/:location/:petId'),
			'breeds_details_url' => home_url('breeds/:breedId'),
			'is_pet_page' => Theme_Manager::get_instance()->is_pet_page(),
			'is_breed_page' => Theme_Manager::get_instance()->is_breed_page(),
			'is_available_puppies_page' =>
				Theme_Manager::get_instance()->is_available_puppies_filter_template()
				|| Theme_Manager::get_instance()->is_available_puppies_page_template(),
			'filters' => $this->get_filters(),
			'rest_url' => get_rest_url(null, 'petland/v1'),
			'k9_api_url' => Theme_Manager::get_instance()->get_theme_option('k9_api_url'),
			'i18n' => [
				'location' => __('Location', THEME_LOCALE),
				'all_locations' => __('All Locations', THEME_LOCALE),
				'pet_type' => __('Pet Type', THEME_LOCALE),
				'all_pet_types' => __('All Pet Types', THEME_LOCALE),
				'breed' => __('Breed', THEME_LOCALE),
				'all_breeds' => __('All Breeds', THEME_LOCALE),
				'gender' => __('Gender', THEME_LOCALE),
				'all_genders' => __('All Genders', THEME_LOCALE)
			]
		];

		if (Theme_Manager::get_instance()->is_pet_page()) {
			$script_vars['pet_details'] = [
				'pet_id' => get_query_var('pet_id'),
				'pet_location' => get_query_var('pet_location'),
			];
		}

		if (Theme_Manager::get_instance()->is_breed_page()) {
			$script_vars['breed_details'] = [
				'breed_id' => get_query_var('breed_id'),
			];
		}

		$filter_type = get_query_var('pet_filter_type');
		$script_vars['available_puppies'] = [
			'filter_type' => $filter_type,
			'location' => $this->get_custom_query_var('pet_location'),
			'breed' => $this->get_custom_query_var('pet_breed'),
			'gender' => $this->get_custom_query_var('pet_gender'),
			'type' => $this->get_custom_query_var('pet_type'),
		];

		wp_localize_script('petland-reactjs', 'wp_petland_reactjs', $script_vars);
	}

	private function get_custom_query_var($query_var) {
		return null !== get_query_var($query_var) && !empty(get_query_var($query_var)) ? get_query_var($query_var) : 'all';
	}

	/**
	 * @return array
	 */
	private function get_filters() {
		return [
			'locations' => $this->get_locations_without_api_keys(),
			'pet_types' => $this->get_pet_types(),
			'pet_genders' => $this->get_pet_genders()
		];
	}

	/**
	 * @return array
	 */
	private function get_pet_types() {
		$pet_types = Theme_Manager::get_instance()->get_theme_option('petkey_pet_types');
		$types = [];

		foreach ($pet_types as  $pet_type) {
			$explode_value = explode('|', $pet_type);
			$types[] = [
				'name' => $explode_value[1],
				'value' => $explode_value[0],
			];
		}

		return $types;
	}

	/**
	 * @return array
	 */
	private function get_pet_genders() {
		$pet_genders = Theme_Manager::get_instance()->get_theme_option('petkey_genders');
		$genders = [];

		foreach ($pet_genders as  $pet_gender) {
			$explode_value = explode('|', $pet_gender);
			$genders[] = [
				'name' => $explode_value[1],
				'value' => $explode_value[0],
			];
		}

		return $genders;
	}

	/**
	 * @return array
	 */
	private function get_locations_without_api_keys() {
		$api_keys = Petkey_Api::get_instance()->get_keys_object();
		$locations = [];

		foreach ($api_keys as $key => $value) {
			$locations[] = [
				'name' => $value['place'],
				'value' => $key
			];
		}

		return $locations;
	}

	/**
	 * Get Assets URL relative to the theme folder.
	 *
	 * @param $url
	 *
	 * @return string
	 */
	private function get_reactjs_url( $url ) {
		return "$this->reactjs_url/$url";
	}

}
