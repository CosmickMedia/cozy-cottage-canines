<?php

class Petkey_Api {

	private $api_keys;
	private $api_keys_object = [];
	private static $class_instance;

	private $url = "https://api.petkey.org/V4/Partners/";

	public function __construct() {
		$this->api_keys = Theme_Manager::get_instance()->get_theme_option('petkey_api_key');
		$this->set_keys_object();
	}

	/**
	 * Singleton Instance
	 *
	 * @return Petkey_Api
	 */
	public static function get_instance() {
		if (self::$class_instance === null) {
			self::$class_instance = new self();
		}

		return self::$class_instance;
	}

	/**
	 * Prepare the api keys object
	 */
	private function set_keys_object() {

		foreach ($this->api_keys as $key) {
			$keys = explode('|', trim($key));

			$this->api_keys_object[sanitize_title($keys[0])] = [
				'place' => $keys[0],
				'key' => $keys[1]
			];
		}
	}

	/**
	 * @return array
	 */
	public function get_keys_object() {
		return $this->api_keys_object;
	}

	public function get_breed_list() {
		$list = [];

		foreach ($this->api_keys_object as $location => $api_key) {
			$breeds_response = $this->curl_request($api_key['key'], 'BreedList', 'GET');

			foreach ($breeds_response as $breed) {
				$list[$breed->BreedId] = $breed;
			}
		}

		return $list;
	}

	/**
	 * @param string $breed_id
	 * @param string $pet_type
	 * @param string $pet_status
	 *
	 * @return array
	 */
	public function get_pet_inventory( $breed_id = '', $pet_type = 'dog', $pet_status = 'available' ) {
		$pets = [];
		
		foreach ($this->api_keys_object as $location => $api_key) {
			$pets_response = $this->get_inventory_from_store($api_key['key'], $breed_id, $pet_type, $pet_status);

			if ($pets_response) {

				foreach ($pets_response as $pet) {
					$pet->Location = $location;
					$pets[] = $pet;
				}

			}
		}
		
		return $pets;
	}

	/**
	 * @param $api_key
	 * @param string $pet_type
	 * @param string $pet_status
	 * @param string $breed_id
	 *
	 * @return array|bool|mixed|object
	 */
	public function get_inventory_from_store( $api_key, $breed_id, $pet_type, $pet_status ) {
		$data = [
			'Status' => $pet_status,
			'PetType' => $pet_type
		];

		if ($breed_id) {
			$data['BreedId'] = $breed_id;
		}

		return $this->curl_request($api_key, 'Search', 'POST', $data);
	}

	/**
	 * @param $petId
	 * @param $location
	 *
	 * @return array|bool|mixed|object
	 */
	public function get_pet_details( $petId, $location ) {
		return $this->curl_request(
			$this->api_keys_object[$location]['key'],
			"Pet/{$petId}",
			'GET');
	}

	/**
	 * @param $api_key
	 * @param $endpoint
	 * @param $type
	 * @param null $data
	 *
	 * @return array|bool|mixed|object
	 */
	public function curl_request($api_key, $endpoint, $type, $data = null) {
		
		$curl = curl_init();
		$url = $this->url.$endpoint;

		$options = [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST=> $type,
			CURLOPT_HTTPHEADER => [
				"Authorization: PETKEY-AUTH {$api_key}",
				'Content-Type: application/json'
			],
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_SSL_VERIFYPEER => 0
		];

		if($data) {
			$options[CURLOPT_POSTFIELDS] = json_encode($data);
		}

		curl_setopt_array($curl, $options);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return false;
		} else {
			return json_decode($response);
		}
	}

}
